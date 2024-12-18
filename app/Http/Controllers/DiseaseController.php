<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Indication;
use App\Models\Rule;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index(){
        $title = "Data Penyakit";
        $active = "disease";
        $data = Disease::orderBy('code','asc')->get();
        return view("disease.index",compact("title","active","data"));
    }
    
    public function create(){        
        $title = "Tambah Data Penyakit";
        $active = "disease";
        $type = "create";
        $code = $this->codeGenerate();
        return view("disease.forms",compact("title",'code',"active","type"));
    }
    
    public function edit(Disease $disease){
        $title = "Edit Data Penyakit";
        $active = "disease";
        $type = "edit";
        $code = $disease->code;
        return view("disease.forms",compact("title","active","type", "disease","code"));
    }
    
    public function ruleSetting(Disease $disease){
        $title = "Atur Rule Penyakit - ". $disease->name;
        $active = "disease";
        $rules = Rule::select('indication_id')->where("disease_id",$disease->id)->get()->toArray();
        foreach ($rules as $key => $value) {
            $rules[$key] = $value["indication_id"];
        }
        $indications = Indication::select('id','name','code')->get();
        return view("disease.rule-setting",compact("title","active", "disease","indications","rules"));
    }

    public function updateRule(Request $request,Disease $disease){
        $request->validate([
            "indications" => 'required|array'
        ]);
        $rules = [];
        foreach ($request->indications as $key => $value) {
            $rules[$key] = [
                "disease_id" => $disease->id,
                "indication_id" => $value,
                "created_at" => now(),
                "updated_at" => now()
            ];
        }
        Rule::where('disease_id',$disease->id)->delete();
        Rule::insert($rules);
        return redirect()->back()->with('success','Rule berhasil di perbaharui');
    }

    public function store(Request $request){
        $this->validate($request,$this->rules(),$this->messages(),$this->attributes());
        Disease::create($request->all());
        return redirect(route('disease.index'))->with('success',"Berhasil menambahkan data penyakit");
    }

    public function update(Request $request,Disease $disease){
        $rules = $this->rules();
        $rules["code"] = "required|unique:diseases,code,".$disease->id;
        $rules["name"] = "required|unique:diseases,name,".$disease->id;
        $this->validate($request,$rules,$this->messages(),$this->attributes());
        $disease->update($request->all());
        return redirect(route('disease.index'))->with('success',"Berhasil memperbaharui data penyakit");
    }

    public function destroy(Disease $disease){
        $disease->delete();
        return redirect(route('disease.index'))->with('success',"Berhasil menghapus data penyakit");
    }

    public function codeGenerate(){
        $max = Disease::max('code');
        $maxID = ($max == null) ? 0 : substr($max,-1);
        $no = $maxID;
        $no++;
        return "DIS".sprintf('%03s',$no);
    }
                                                                                    
    private function rules(){
        return [
            "code" => "required|unique:diseases,code",
            "name" => "required|unique:diseases,name",
            "solution" => "required",
        ];
    }
    
    private function messages(){
        return [
            "required" => ":attribute harus diisi.",
            "unique" => ":attribute telah digunakan.",
        ];
    }
    
    private function attributes(){
        return [
            "code" => "Kode penyakit",
            "name" => "Nama penyakit",
            "solution" => "Solusi penyakit",
        ];
    }
    
}
