<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Professions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class User_Controller extends Controller
{
    public function afficher_users(Request $request){
        $user = User::all();
        $professions = Professions::all();
        return view("admin.users", compact("user", "professions"));
    }

    public function updatevalide($id, $status)
    {
        $item = User::find($id);

        if ($item) {
            $item->valide = ($status === 'true');
            $currentUser = Auth::user();
            $item->validated_by = $currentUser->id;
            $item->save();
        }

        return redirect()->route("afficher_users"); 
    }

    public function Recherche_user(Request $request){
        $user_name = $request->input("user_name");
        if($user_name != ""){
            $user = User::where('name', [strtolower($user_name)])
             ->orWhere('prenom', [strtolower($user_name)])
             ->get();
        }else{
            $user = User::all();
        }
        
        if($user){
            $professions = Professions::all();
            return view("admin.users", compact("user", "professions"));
        }
    }
    public function edit_user($id){
        $user = User::find($id);
        $professions = Professions::all();
        $roles = Roles::all();
        $countriesJson = file_get_contents(resource_path('json/countries.json'));
        $countries = json_decode($countriesJson, true)['countries'];
        return view("admin.edit_user", compact("user", "professions", "roles", "countries"));
    }

    public function update_user(Request $request, $id){
        $user = User::find($id);
        if($request->input("password")){
            $user->name = $request->input("name");
            $user->prenom = $request->input("prenom");
            $country = $request->input("country");
            $telephone = $request->input("telephone");
            $number = $country . " " . $telephone;
            $user->telephone = $number;
            $user->professionID = $request->input("professionID");
            $user->roleID = $request->input("roleID");
            $user->email = $request->input("email");
            $user->password = Hash::make($request->input("password"));
        }else{
            $user->name = $request->input("name");
            $user->prenom = $request->input("prenom");
            $country = $request->input("country");
            $telephone = $request->input("telephone");
            $number = $country . " " . $telephone;
            $user->telephone = $number;
            $user->professionID = $request->input("professionID");
            $user->roleID = $request->input("roleID");
            $user->email = $request->input("email");
        }
        $user->save();
        return redirect()->route("afficher_users")->with("success");

    }

    public function updatesuspendue($id, $status)
    {
        $item = User::find($id);

        if ($item) {
            $item->suspended = ($status === 'true');
            $item->save();
        }

        return redirect()->route("afficher_users"); 
    }
}
