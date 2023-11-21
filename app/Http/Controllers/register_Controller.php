<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Professions;
class register_Controller extends Controller
{
    public function dropdown_content(){
        $roles = Roles::all();
        $professions = Professions::all();
        $countriesJson = file_get_contents(resource_path('json/countries.json'));
        $countries = json_decode($countriesJson, true)['countries'];
        return view("auth.register", compact("roles","professions","countries"));
    }
}
