<?php

namespace App\Http\Controllers\Departments;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\Vacations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;

class DepartmentController extends Controller
{
    function index(){
        return view('dashboards.departments.index');
    }
    function VacationRequest(){




        $Vacations= Vacations::join('employes','vacationes.user_id','=','employes.id')->select('employes.*','vacationes.*')->where('vacationes.dep_id', '=', Auth::user()->dep_id)
        // ->where('vactaions.user_id', '=', 'empoloye_details.user_id')
        ->get();







    // $vacation_type = Vacations::whereMonth('created_at' , Carbon::today()->month)->count();
    $vacation_type = Vacations::groupBy('vacation_type_id')->select('vacation_type_id', DB::raw('count(*) as total'))->get();

        return view('dashboards.departments.VacationRequest' ,compact( 'Vacations' ,'vacation_type' ));
    }

    function RequesSubmit(Request $request , $id){


        $data = $request->input();
        try {

            $data = $request->input();

            $device = Vacations::find($id);
            $device->update([
                'mag_department_aprove' =>  $data['mag_department_aprove']
            ]);
            return redirect()->back()->with('success', " تم قبول طلب الاجازة بنجاح ");
        } catch (Expectation $e) {
            return redirect()->back()->with('failed', "لم يتم قبول طلب الاجازة بنجاح ");
        }

    }


}
