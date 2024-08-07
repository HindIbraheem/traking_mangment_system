<?php

namespace App\Http\Controllers\Employes;

use App\Http\Controllers\Controller;
use App\Models\Clases;
use App\Models\Education;
use App\Models\employeDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Expectation;

class employeDetailsController extends Controller
{


    function index(){
        return view('dashboards.users.index');
    }
    function VacationRequest(){
        return view('dashboards.users.profile');
    }
    function settings(){
        return view('dashboards.users.settings');
    }
    function settingsTwo(){
        return view('dashboards.users.settings');
    }


    public function indexEmploye()
    {
        // $divition =  Department::all();
        // return view('Circles.divition', compact('divition'));
       return view('dashboards.Employes.employeForm');

    }



    public function shoukurData(Request $request)
    {

        $user=Auth::user()->id;
        $workData =  employeDetails::where('user_id', $user)->get();
        return view('dashboards.employes.ShoukurData', compact('workData'));

    }


    public function Committee(Request $request)
    {

        $user=Auth::user()->id;
        $workData =  employeDetails::where('user_id', $user)->get();
        return view('dashboards.employes.workData', compact('workData'));

    }



    public function personalData(Request $request)
    {


        $dep_id=Auth::user()->dep_id;
        $user_id=Auth::user()->id;
        $classData =  Clases::where('dep_id', $dep_id)->get();
        $check =  employeDetails::where('user_id', $user_id)->get();
        $education = Education::where('user_id', $user_id)->get();

        return view('dashboards.employes.personalData', compact('classData' ,'check' ,'education'));

    }

    public function submit_personalData(Request $request)
    {
        $dep_id=Auth::user()->dep_id;
        $user_id=Auth::user()->id;

       $rules = [
            'full_name' => 'required',
            'full_m_name' => 'required',
            'gender' => 'required',
            'marital_sta' => 'required',
            'class_id' => 'required',
            'birth' => 'required|date',
            'job_number' => 'required',
            'job_title' => 'required',
            'job_step' => 'required',
            'job_phase' => 'required',

            'addmore.*.uni' => 'required',
            'addmore.*.college' => 'required',
            'addmore.*.dep' => 'required',
            'addmore.*.craductedCountry' => 'required',
            'addmore.*.craductedDate' => 'required',



        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {


            try {

                $data = $request->input();
                $employes = new employeDetails();

                $employes->user_id  = $user_id;
                 $employes->full_name = $data['full_name'];
                 $employes->full_m_name = $data['full_m_name'];
                 $employes->gender = $data['gender'];
                 $employes->marital_sta = $data['marital_sta'];
                 $employes->class_id = $data['class_id'];
                 $employes->department_id  = $dep_id;
                 $employes->birth = date("Y-m-d", strtotime($data['birth']));
                 $employes->job_number = $data['job_number'];
                 $employes->job_title = $data['job_title'];
                $employes->job_step = $data['job_step'];
                $employes->job_phase = $data['job_phase'];
                $employes->ministry = 'دائرة الدراسات والتخطيط والمتابعة';
                $employes->position = $data['position'];
                $employes->old_ministry = $data['old_ministry'];
                $employes->job_date = date("Y-m-d", strtotime($data['job_date']));
                $employes->save();

                // $id  = employeDetails::latest()->lockForUpdate()->first()->id;


                foreach ($request->addmore as $key => $value) {
                    $certifications = new Education();
                    $certifications->user_id = $user_id;
                    $certifications->uni = $value['uni'];
                    $certifications->college = $value['college'];
                    $certifications->dep = $value['dep'];
                    $certifications->craductedCountry = $value['craductedCountry'];
                    $certifications->craductedDate = $value['craductedDate'];
                    $certifications->save();
                }



                return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
            } catch (Expectation $e) {
                return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
            }
        }

    }

    public function update_personalData(Request $request ,$id)
    {

        $dep_id=Auth::user()->dep_id;
        $user_id=Auth::user()->id;

       $rules = [
            'full_name' => 'required',
            'full_m_name' => 'required',
            'gender' => 'required',
            'marital_sta' => 'required',
            'class_id' => 'required',
            'birth' => 'required|date',
            'job_number' => 'required',
            'job_title' => 'required',
            'job_step' => 'required',
            'job_phase' => 'required',

            // 'addmore.*.uni' => 'required',
            // 'addmore.*.college' => 'required',
            // 'addmore.*.dep' => 'required',
            // 'addmore.*.craductedCountry' => 'required',
            // 'addmore.*.craductedDate' => 'required',



        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {


            try {

                $ProductStocks = Education::where('user_id',Auth::user()->id)->pluck('id')->all();



                // print_r($request->addMore);
                // print_r($request->addmore);
                // print_r($ProductStocks);
                foreach ($request->addMore as $key => $value) {



                    if(!is_null($value['id'])){
                        DB::table('educations')->where('id', $value['id'])->update($value);


                    }

                }


                    foreach ($request->addmore as $key1 => $value1) {



                        if (!is_null($value1['uni']) && !is_null($value1['college']) && !is_null($value1['dep']) && !is_null($value1['craductedCountry']) && !is_null($value1['craductedDate'])) {
                            $certifications = new Education();
                            $certifications->user_id = $user_id;
                            $certifications->uni = $value1['uni'];
                            $certifications->college = $value1['college'];
                            $certifications->dep = $value1['dep'];
                            $certifications->craductedCountry = $value1['craductedCountry'];
                            $certifications->craductedDate = $value1['craductedDate'];
                            $certifications->save();

                                }

                    }




                foreach($ProductStocks as $key => $value){

                    if (!in_array($value, array_keys($request->addMore))) {
                        DB::table('educations')->where('id', $value)-> delete($value);
                    }
                }

//  // Find the user by ID
//     $user = employeDetails::find($id);

//     // Update the user's personal data
//     $user->update([
//         'name' => $request->input('name'),
//         'email' => $request->input('email'),
//         // Add other fields as needed
//     ]);







    // return redirect()->back()->with('success', " تم تقديم طلب الاجازة بنجاح ");
} catch (Expectation $e) {
    // return redirect()->back()->with('failed', "لم يتم تقديم طلب الاجازة بنجاح ");
}
}
    }
}


