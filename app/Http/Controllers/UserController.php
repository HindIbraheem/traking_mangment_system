<?php

namespace App\Http\Controllers;

use App\Models\Committe;
use App\Models\Shoukur;
use App\Models\Vacations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){


        $user_id=Auth::user()->id;
        $total_committe =  Committe::where('user_id', $user_id)->count();
        $total_wazer =  Shoukur::where('user_id', $user_id)->where('book_destination' , 'معالي الوزير')->count();
        $total_wakel =  Shoukur::where('user_id', $user_id)->where('book_destination' , 'السيد الوكيل الوزير')->count();
        $total_moder =  Shoukur::where('user_id', $user_id)->where('book_destination' , 'المدير العام')->count();
        $total_vacation =  Vacations::where('user_id', $user_id)->get()->groupBy('vacation_type_id');
        return view('dashboards.users.index', compact('total_committe' , 'total_wazer' , 'total_wakel' , 'total_moder' ,'total_vacation'));

    }

    public function employes()
    {
        // $divition =  Department::all();
        // return view('Circles.divition', compact('divition'));
       return view('Employes.employeForm');

    }
}
