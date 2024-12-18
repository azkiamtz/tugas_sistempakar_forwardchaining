<?php

namespace App\Http\Controllers;

use App\Models\DiagnosisDetail;
use App\Models\DiagnosisResult;
use App\Models\Disease;
use App\Models\Indication;
use App\Models\Rule;
use Illuminate\Http\Request;

class DiagnosisResultController extends Controller
{
    public function consultation(){
        $indications = Indication::orderBy("code","ASC")->get();
        $code = $this->codeGenerate(); 
        return view("consultation.index",compact("indications","code"));
    }
    
    public function resultConsultation($code){
        $diagnosa = DiagnosisResult::with('detail.indication')->where('code',$code)->first();
        if (empty($diagnosa)) {
            return redirect(route('consul'))->withErrors(["error" => "Riwayat Diagnosa tidak ditemukan."]);
        }
        $possible = ($diagnosa->possible == null) ? [] : explode(",",$diagnosa->possible);
        return view("consultation.result",compact("diagnosa","possible"));
    }

    public function saveConsultation(Request $request){
        $data = $request->validate([
            "code" => "required",
            "email" => "required|email",
            "name" => "required",
        ]);
        $indications = Indication::select('id')->orderBy("code","ASC")->get();
        $result = [];
        $input = 0;
        foreach ($indications as $indication) {
            if ($request->has('gejala_'.$indication->id)) {
                $result[$indication->id] = $request->post('gejala_'.$indication->id);
                $input++;
            }
        }
        if ($input == 0) {
            return redirect()->back()->withErrors(["error" => "Tidak ada gejala yang dipilih!"]);
        }
        $result_yes = [];
        foreach ($result as $key => $value) {
            if ($value == 1) {
                array_push($result_yes,$key);
            }
        }     
        $diagnosis_results = $this->forwardChaining($result_yes);
        $diagnosis_results = ((empty($diagnosis_results))) ? null : implode(",",$diagnosis_results);
        $diagnosis_result = DiagnosisResult::create([
            "possible" => $diagnosis_results,
            "code" => $request->code,
            "name" => $request->name,
            "email" => $request->email
        ]);
        if ($diagnosis_result) {
            $diagnosis_result_detail = [];
            foreach ($result_yes as $key => $value) {
                $diagnosis_result_detail[$key] = [
                    "diagnosis_result_id" => $diagnosis_result->id,
                    "indication_id" => $value,
                    "valid" => true,
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            }
            DiagnosisDetail::insert($diagnosis_result_detail);
        }
        return redirect(route('consul.result',$diagnosis_result->code))->with('success',"Berikut adalah hasil diagnosa anda!");
    }

    public function forwardChaining($result_yes){
        $diseases = Disease::with('indications')->get();
        $diagnosis_results = [];
        foreach ($diseases as $disease) {
            $disease_indication = $disease->indications->pluck('id')->toArray();
            if (count(array_intersect($disease_indication, $result_yes)) == count($disease_indication)) {
                $diagnosis_results[] = $disease->name;
            }
        }
        return $diagnosis_results;
    }

    public function codeGenerate(){
        $max = DiagnosisResult::max('code');
        $maxID = ($max == null) ? 0 : substr($max,-1);
        $no = $maxID;
        $no++;
        return "DG".sprintf('%03s',$no);
    }
}
