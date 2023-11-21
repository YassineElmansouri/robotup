<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
class RolesController extends Controller
{
    public function afficher_roles(){
        $roles = Roles::all();
        return view("admin.roles.roles", compact("roles"));
    }
    public function ajouter_role(Request $request){
        $roles = new Roles();
        $roles->label = $request->input("label");
        $roles->save();
        return redirect()->back();
    }

    public function edit_role($id){
        $role = Roles::find($id);  
        return view("admin.roles.edit_role", compact("role"));
    }

    public function update_role(Request $request, $id){
        $role = Roles::find($id);
        $role->label = $request->input("label");
        $role->save();
        return redirect()->route("afficher_roles");
    }   

    public function Delete_role($id){
        $role = Roles::find($id);
        $role->delete();
        return redirect()->route("afficher_roles");
    }
}
