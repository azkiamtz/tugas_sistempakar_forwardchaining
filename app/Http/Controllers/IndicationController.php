<?php

namespace App\Http\Controllers;

use App\Models\Indication;
use Illuminate\Http\Request;

class IndicationController extends Controller
{
    public function index(){
        $title = "Data Gejala";
        $active = "indication";
        $data = Indication::orderBy('code','asc')->get();
        return view("indication.index",compact("title","active","data"));
    }
    
    public function create(){        
        $title = "Tambah Data Gejala";
        $active = "indication";
        $type = "create";
        $code = $this->codeGenerate();
        return view("indication.forms",compact("title",'code',"active","type"));
    }
    
    public function edit(Indication $indication){
        $title = "Edit Data Gejala";
        $active = "indication";
        $type = "edit";
        $code = $indication->code;
        return view("indication.forms",compact("title","active","type", "indication","code"));
    }

    public function store(Request $request){
        $this->validate($request,$this->rules(),$this->messages(),$this->attributes());
        Indication::create($request->all());
        return redirect(route('indication.index'))->with('success',"Berhasil menambahkan data gejala");
    }

    public function update(Request $request,Indication $indication){
        $rules = $this->rules();
        $rules["code"] = "required|unique:indications,code,".$indication->id;
        $rules["name"] = "required|unique:indications,name,".$indication->id;
        $this->validate($request,$rules,$this->messages(),$this->attributes());
        $indication->update($request->all());
        return redirect(route('indication.index'))->with('success',"Berhasil memperbaharui data gejala");
    }

    public function destroy(Indication $indication){
        $indication->delete();
        return redirect(route('indication.index'))->with('success',"Berhasil menghapus data gejala");
    }

    public function codeGenerate(){
        $max = Indication::max('code');
        $maxID = ($max == null) ? 0 : substr($max,-1);
        $no = $maxID;
        $no++;
        return "IND".sprintf('%03s',$no);
    }
                                                                                    
    private function rules(){
        return [
            "code" => "required|unique:indications,code",
            "name" => "required|unique:indications,name",
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
            "code" => "Kode gejala",
            "name" => "Nama gejala",
        ];
    }
    
}
