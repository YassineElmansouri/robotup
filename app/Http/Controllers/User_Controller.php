<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Professions;
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
            $item->save();
        }

        return redirect()->route("afficher_users"); 
    }
}
