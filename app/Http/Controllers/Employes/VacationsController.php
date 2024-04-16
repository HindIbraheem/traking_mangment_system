<?php

namespace App\Http\Controllers\Employes;

use App\Http\Controllers\Controller;
use App\Models\Vacations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Expectation;

class VacationsController extends Controller
{

    function VacationRequest(){
        return view('dashboards.Vacationes.VacationRequest');
    }

    function requestVacationSubmit(Request $request){

        $data = $request->input();
        try {

            $data = $request->input();
            $Vacations = new Vacations();

            $Vacations->user_id = Auth::user()->id;
            $Vacations->vacation_type = $data['vacation_type'];
            $Vacations->from_day = date('d-m-Y', strtotime($data['from_day']));
            $Vacations->to_day = date('d-m-Y', strtotime($data['to_day']));
            $Vacations->vacation_purpoes = $data['vacation_purpoes'];
            $Vacations->save();

            return redirect()->back()->with('status', " تم أضافة البيانات بنجاح  ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم أضافة البيانات ");
        }
    }



}
