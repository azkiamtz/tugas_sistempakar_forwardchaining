<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        $title = "Data Pasien";
        $active = "patient";
        $data = User::where("role","USR")->orderBy('name','asc')->get();
        return view("patient.index",compact("title","active","data"));
    }
    
    public function create(){        
        $title = "Tambah Data Pasien";
        $active = "patient";
        $type = "create";
        return view("patient.forms",compact("title","active","type"));
    }
    
    public function edit($id){
        $user = User::find($id);
        $title = "Edit Data Pasien";
        $active = "patient";
        $type = "edit";
        return view("patient.forms",compact("title","active","type", "user"));
    }

    public function store(Request $request){
        $data = $this->validate($request,$this->rules(),$this->messages(),$this->attributes());
        $data["password"] = bcrypt($request->password);
        $data["role"] = "USR";
        User::create($request->all());
        return redirect(route('patient.index'))->with('success',"Berhasil menambahkan data pasien");
    }

    public function update(Request $request,$id){
        $user = User::find($id);    
        $rules = $this->rules();
        $rules["email"] = "required|unique:users,email,".$user->id;
        $rules["password"] = "";
        $this->validate($request,$rules,$this->messages(),$this->attributes());
        $data = $request->all();
        $data["password"] = ($request->password) ? bcrypt($request->password) : $user->password;
        $user->update($data);
        return redirect(route('patient.index'))->with('success',"Berhasil memperbaharui data pasien");
    }

    public function destroy($id){
        $user = User::find($id);        
        $user->delete();
        return redirect(route('patient.index'))->with('success',"Berhasil menghapus data pasien");
    }

    private function rules(){
        return [
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required",
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
            "name" => "Nama pasien",
            "email" => "Email pasien",
            "password" => "Password pasien",
        ];
    }
    
}