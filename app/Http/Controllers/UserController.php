<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    // function index(){
    //     return view('dashboards.users.index');
    // }
    // function profile(){
    //     return view('dashboards.users.profile');
    // }
    // function settings(){
    //     return view('dashboards.users.settings');
    // }

    public function employes()
    {
        // $divition =  Department::all();
        // return view('Circles.divition', compact('divition'));
       return view('Employes.employeForm');

    }
}
