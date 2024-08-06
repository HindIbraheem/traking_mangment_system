<?php

namespace App\Http\Controllers\Departments;

use App\Http\Controllers\Controller;
use App\Models\employeDetails;
use App\Models\Vacations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Expectation;

class AdminDepartmentController extends Controller
{
    function index(){
        return view('dashboards.AdminDepartments.index');
    }


    function TimerReport(Request $request){


        $today= date('Y-m-d');
        $yestrday= date("Y-m-d", strtotime("yesterday"));


        if($request->has('from_day')){
            $from =    Carbon::parse( $request->input('from_day'))->format('Y-m-d');
            $to =    Carbon::parse( $request->input('to_day'))->format('Y-m-d');

        //   print_r(  $yestrday);
        //   $Vacations= Vacations::join('employes','vacationes.user_id','=','employes.id')->select('employes.*','vacationes.*')->where('vacationes.dep_id', '=', Auth::user()->dep_id)->whereBetween('vacationes.from_day', [$from, $to])->get();
        $Vacations= Vacations::join('employes','vacationes.user_id','=','employes.id')->select('employes.*','vacationes.*')->where('vacationes.dep_id', '=', Auth::user()->dep_id)->where(DB::raw("(DATE_FORMAT(vacationes.from_day,'%Y-%m-%d'))"), ">=", $from)->where(DB::raw("(DATE_FORMAT(vacationes.to_day,'%Y-%m-%d'))"), "<=", $to)->get();


        //   print_r(  $now);

        }
        else{

            $Vacations= Vacations::join('employes','vacationes.user_id','=','employes.id')->select('employes.*','vacationes.*')->where('vacationes.dep_id', '=', Auth::user()->dep_id)->where(DB::raw("(DATE_FORMAT(vacationes.from_day,'%Y-%m-%d'))"), "<=", $today)->where(DB::raw("(DATE_FORMAT(vacationes.from_day,'%Y-%m-%d'))"), ">=", $yestrday)->get();


        }
        $employe=employeDetails::where('department_id', '=', Auth::user()->dep_id)->get();


    $vacation_type = Vacations::groupBy('vacation_type_id')->select('vacation_type_id', DB::raw('count(*) as total'))->get();






        return view('dashboards.AdminDepartments.TimerReport' ,compact( 'Vacations' ,'vacation_type' ,'employe' ));




    }








 function VacationRequest(){


    $Vacations= Vacations::join('employes','vacationes.user_id','=','employes.id')->select('employes.*','vacationes.*')->where('vacationes.dep_id', '=', Auth::user()->dep_id)
    ->get();


$vacation_type = Vacations::groupBy('vacation_type_id')->select('vacation_type_id', DB::raw('count(*) as total'))->get();

    return view('dashboards.AdminDepartments.VacationRequest' ,compact( 'Vacations' ,'vacation_type' ));
}





function CurrentStatus(){



  $employe=employeDetails::where('department_id', '=', Auth::user()->dep_id)->get();
    $Vacations= Vacations::join('employes','vacationes.user_id','=','employes.id')->select('employes.*','vacationes.*')->where('vacationes.dep_id', '=', Auth::user()->dep_id)
   ->get();


$vacation_type = Vacations::groupBy('vacation_type_id')->select('vacation_type_id', DB::raw('count(*) as total'))->get();

    return view('dashboards.AdminDepartments.CurrentStatus' ,compact( 'Vacations' ,'vacation_type' ,'employe' ));
}



    function Current_Status_Submit (Request $request){
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
            $Vacations->user_id = $data['user_id'];
            $Vacations->vacation_type_id = $data['vacation_type_id'];
            $Vacations->from_day = Carbon::parse($data['from_day'])->format('Y-m-d H:i:s');
            $Vacations->to_day = Carbon::parse($data['to_day'])->format('Y-m-d H:i:s');
            $Vacations->vacation_purpoes = $data['vacation_type_id'];
            $Vacations->dep_id = Auth::user()->dep_id;
            $Vacations->save();

            return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
        }


    }}




    public function deleteCurrent($id) {

        $Delete = Vacations::find($id)->delete();
        // $DeleteBrandLink = BrandLinks::where('brand_id', '=', $id)->delete();
        if ($Delete) {
            return redirect()->back()->with('failed', " تم حذف طلب الاجازة  ");
        }
        // else {
        //     return redirect()->back()->with('failed', "Brand not Deleted... ");
        // }



     }

function PastStatus(){


    $Vacations= Vacations::join('employes','vacationes.user_id','=','employes.id')->select('employes.*','vacationes.*')->where('vacationes.dep_id', '=', Auth::user()->dep_id)
    ->get();


$vacation_type = Vacations::groupBy('vacation_type_id')->select('vacation_type_id', DB::raw('count(*) as total'))->get();

    return view('dashboards.AdminDepartments.PastStatus' ,compact( 'Vacations' ,'vacation_type' ));
}


}
