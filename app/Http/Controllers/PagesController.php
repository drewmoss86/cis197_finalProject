<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        //updates the title for the main page
        $title = "Welcome to the CERT Incident Management Tool (CIMT)";
        return view('custom/login')->with('title', $title);
    }

    // public function incident()
    // {
    //     //updates the title for the incident page
    //     $title = "New Incident";
    //     return view('pages/incident')->with('title', $title);
    // }


}
