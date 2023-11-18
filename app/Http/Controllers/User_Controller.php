<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\Professions;
class User_Controller extends Controller
{
    public function afficher_users(Request $request){
        $user = User::all();
        $professions = Professions::all();
        return view("user.users", compact("user", "professions"));
    }

    public function ajouter_role(Request $request){
        $roles = new Roles();
        $roles->label = $request->input("label");
        $roles->save();
        return redirect()->route("afficher_users");
    }

    public function ajouter_profession(Request $request){
        $profession = new Professions();
        $profession->label = $request->input("label");
        $profession->save();
        return redirect()->route("afficher_users");
    }

    public function updatevalide($id, $status)
    {
        $item = User::find($id);

        if ($item) {
            $item->valide = ($status === 'true');
            $item->save();
        }

        return redirect()->route("afficher_users"); 
    }
}
