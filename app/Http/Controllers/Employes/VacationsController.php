<?php

namespace App\Http\Controllers\Employes;

use App\Http\Controllers\Controller;
use App\Models\Vacations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Expectation;

class VacationsController extends Controller
{


    function VacationRecord(){

        $Vacations= Vacations::where('user_id', '=', Auth::user()->id)->get();
        return view('dashboards.Vacationes.VacationRecord' , compact('Vacations'));
    }

    function VacationRequest(){
        return view('dashboards.Vacationes.VacationRequest');
    }

    function normalVacationSubmit(Request $request){
        $rules = [

            'from_day' => 'required|date',
            'to_day' => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('failed', "يجب ادخال تاريخ ووقت صحيح");
        } else {

        $data = $request->input();
        try {

            $data = $request->input();

            $Vacations = new Vacations();
            $Vacations->user_id = Auth::user()->id;
            $Vacations->vacation_type = $data['vacation_type'];
            $Vacations->from_day = Carbon::parse($data['from_day'])->format('Y-m-d');
            $Vacations->to_day = Carbon::parse($data['to_day'])->format('Y-m-d');
            $Vacations->vacation_purpoes = $data['vacation_purpoes'];
            $Vacations->save();

            return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
        }
    }
    }

    function SickVacationSubmit(Request $request){
        $rules = [

            'from_day' => 'required|date',
            'to_day' => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('failed', "يجب ادخال تاريخ ووقت صحيح");
        } else {

        $data = $request->input();
        try {

            $data = $request->input();
            $Vacations = new Vacations();
            $Vacations->user_id = Auth::user()->id;
            $Vacations->vacation_type = $data['vacation_type'];
            $Vacations->from_day = Carbon::parse($data['from_day'])->format('Y-m-d');
            $Vacations->to_day = Carbon::parse($data['to_day'])->format('Y-m-d');
            $Vacations->vacation_purpoes = 'بسبب وعكة صحية';
            $Vacations->save();

            return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
        }
    }
    }


    function TimerVacationSubmit(Request $request){


        $data = $request->input();
        try {

            $data = $request->input();



            print_r($data['day'].' '.Carbon::parse($data['from_day'])->format('H:i:s'));

            $Vacations = new Vacations();
            $Vacations->user_id = Auth::user()->id;
            $Vacations->vacation_type = $data['vacation_type'];
            $Vacations->from_day =$data['day'].' '.Carbon::parse($data['from_day'])->format('H:i:s');
            $Vacations->to_day = $data['day'].' '.Carbon::parse($data['to_day'])->format('H:i:s');
            $Vacations->vacation_purpoes = $data['vacation_purpoes'];
            $Vacations->save();

            return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
        }

    }

}
