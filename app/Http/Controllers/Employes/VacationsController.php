<?php

namespace App\Http\Controllers\Employes;

use App\Http\Controllers\Controller;
use App\Models\Vacations;
use App\Models\vacationsType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Expectation;

class VacationsController extends Controller
{


    function VacationRecord(){
        $Vacations= Vacations::join('users','vacationes.user_id','=','users.id')->select('vacationes.*' , 'users.*')->where('users.id', '=', Auth::user()->id)->get();
        // $Vacations= Vacations::where('user_id', '=', Auth::user()->id)->get();
        return view('dashboards.Vacationes.VacationRecord' , compact('Vacations'));
    }

    function VacationRequest(){
        $Vacations_type= vacationsType::whereNotIn('id',[1,2,3])->get();
        return view('dashboards.Vacationes.VacationRequest' , compact('Vacations_type'));
    }

    function normalVacationSubmit(Request $request){
        $data = $request->input();
       $startDay= Carbon::parse($data['from_day'])->format('Y-m-d 00:00:00');
       $endDay= Carbon::parse($data['to_day'])->format('Y-m-d 00:00:00');
       $user=Auth::user()->id;

    //    print_r($startDay);
        $rules = [

            'from_day' => 'required|date',
            'to_day' => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('failed', "يجب ادخال تاريخ ووقت صحيح");
        } else {


        $now   = Carbon::now('UTC')->subDays(3);
        $nowDate  = $now->format('Y-m-d 00:00:00');
// print_r($nowDate);

if($startDay <= $nowDate){
    return redirect()->back()->with('failed', "التاريخ قديم وغير صالح للاستخدام");
}

elseif($startDay > $endDay){
    return redirect()->back()->with('failed', "خطا في ادخال التواريخ");
}

else{
if (DB::table('vacationes')->where('user_id', $user)
->whereDate('from_day','=', $startDay)->exists()) {
  return redirect()->back()->with('failed', "تاريخ طلب الاجازة مستخدم سابقا");

}
elseif (DB::table('vacationes')->where('user_id', $user)
->whereDate('from_day','>=', $startDay)
->whereDate('to_day','<=', $endDay)->exists()) {
  return redirect()->back()->with('failed', " طلب الاجازة موجود مسبقا ");

}


elseif (DB::table('vacationes')->where('user_id', $user)
->whereDate('to_day','>=', $startDay)->exists()) {
  return redirect()->back()->with('failed', "الاجازة السابقة غير منتهية للان ");

}

else{

        try {
            $Vacations = new Vacations();
            $Vacations->user_id = Auth::user()->id;
            $Vacations->vacation_type_id = '1';
            $Vacations->from_day = Carbon::parse($data['from_day'])->format('Y-m-d');
            $Vacations->to_day = Carbon::parse($data['to_day'])->format('Y-m-d');
            $Vacations->vacation_purpoes = $data['vacation_purpoes'];
            $Vacations->dep_id = Auth::user()->dep_id;
            $Vacations->save();
            return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
        }
    }
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
            $Vacations->vacation_type_id  = $data['vacation_type_id'];
            $Vacations->from_day = Carbon::parse($data['from_day'])->format('Y-m-d');
            $Vacations->to_day = Carbon::parse($data['to_day'])->format('Y-m-d');
            $Vacations->vacation_purpoes = 'بسبب وعكة صحية';
            $Vacations->dep_id = Auth::user()->dep_id;
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



            $day=Carbon::parse($data['day'])->format('Y-m-d');

            $Vacations = new Vacations();
            $Vacations->user_id = Auth::user()->id;
            $Vacations->vacation_type_id  = $data['vacation_type_id'];
            $Vacations->from_day =Carbon::parse($data['day'])->format('Y-m-d H:i:s');
            $Vacations->to_day = Carbon::parse($data['day'])->format('Y-m-d H:i:s');
            $Vacations->from_time =$day.' '.Carbon::parse($data['from_time'])->format('H:i:s');
            $Vacations->to_time = $day.' '.Carbon::parse($data['to_time'])->format('H:i:s');
            $Vacations->vacation_purpoes = $data['vacation_purpoes'];
            $Vacations->dep_id = Auth::user()->dep_id;
            $Vacations->save();

            return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
        }

    }

    function otherVacationSubmit(Request $request){
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
            $Vacations->vacation_type_id  = $data['vacation_type_id'];
            $Vacations->from_day =Carbon::parse($data['from_day'])->format('Y-m-d H:i:s');
            $Vacations->to_day = Carbon::parse($data['to_day'])->format('Y-m-d H:i:s');
            $Vacations->vacation_purpoes = $data['vacation_purpoes'];
            $Vacations->dep_id = Auth::user()->dep_id;
            $Vacations->save();

            return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
        }

    }
    }



}
