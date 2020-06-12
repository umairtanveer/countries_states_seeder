<?php

namespace App\Http\Controllers;

use App\Country;

class HomeController extends Controller
{
    public function countries(){
        $countries = Country::all();
        return view('countries',['countries'=>$countries]);
    }

    public function states(){
        $countries = Country::all();
        return view('states',['countries'=>$countries]);
    }
}
