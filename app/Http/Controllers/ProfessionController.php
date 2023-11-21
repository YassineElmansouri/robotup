<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professions;
class ProfessionController extends Controller
{
    public function afficher_profession(){
        $profession = Professions::all();
        return view("admin.profession.profession", compact("profession"));
    }
    public function ajouter_profession(Request $request){
        $profession = new Professions();
        $profession->label = $request->input("label");
        $profession->save();
        return redirect()->back();
    }

    public function edit_profession($id){
        $profession = Professions::find($id);  
        return view("admin.profession.edit_profession", compact("profession"));
    }

    public function update_profession(Request $request, $id){
        $profession = Professions::find($id);
        $profession->label = $request->input("label");
        $profession->save();
        return redirect()->route("afficher_profession");
    }   

    public function Delete_profession($id){
        $profession = Professions::find($id);
        $profession->delete();
        return redirect()->route("afficher_profession");
    }
}
