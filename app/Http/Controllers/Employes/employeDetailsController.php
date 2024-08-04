<?php

namespace App\Http\Controllers\Employes;

use App\Http\Controllers\Controller;
use App\Models\employeDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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



    public function submit_personalData(Request $request)
    {

        // $user=Auth::user()->id;
        // $workData =  employeDetails::where('user_id', $user)->get();
        // return view('dashboards.employes.workData', compact('workData'));

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

        $user=Auth::user()->id;
        $personalData =  employeDetails::where('user_id', $user)->get();
        return view('dashboards.employes.personalData', compact('personalData'));

        // $rules = [
        //     'fname' => 'required',
        //     'sname' => 'required',
        //     'thname' => 'required',
        //     'foname' => 'required',
        //     // 'lastname' => 'required',
        //     'f_m_name' => 'required',
        //     's_m_name' => 'required',
        //     'th_m_name' => 'required',
        //     'birth' => 'required',
        //     'job_tit' => 'required',
        //     'title_date' => 'required',
        //     'job_number' => 'required',
        //     'job_date' => 'required',
        //     'job_class' => 'required',
        //     'job_step' => 'required',
        //     'addMoreInputFields.*.uni' => 'required',
        //     'addMoreInputFields.*.specialty' => 'required',
        //     'addMoreInputFields.*.craductedDate' => 'required',
        //     'addMoreInputFields.*.craductedCountry' => 'required',


        // ];


        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator);
        // } else {


        //     try {

        //         $data = $request->input();
        //         $employes = new Employes();
        //         $employes->full_name = $data['fname'] . ' ' . $data['sname'] . ' ' . $data['thname'] . ' ' . $data['foname'] . ' ' . $data['lastname'];
        //         $employes->mother_name = $data['f_m_name'] . ' ' . $data['s_m_name'] . ' ' . $data['th_m_name'];
        //         $employes->marital_sta = $data['marital_sta'];
        //         $employes->birth = $data['birth'];
        //         $employes->gender = $data['gender'];
        //         $employes->circle = $data['circle'];
        //         $employes->dep = $data['dep'];
        //         $employes->divition = $data['divition'];
        //         $employes->job_tit = $data['job_tit'];
        //         $employes->title_date = $data['title_date'];
        //         $employes->scientific_title = $data['scientific_title'];
        //         $employes->scientific_date = $data['scientific_date'];
        //         $employes->position = $data['position'];
        //         $employes->position_place = $data['position_place'];
        //         $employes->position_date = $data['position_date'];
        //         $employes->job_number = $data['job_number'];
        //         $employes->job_date = $data['job_date'];
        //         $employes->rejob_date = $data['rejob_date'];
        //         $employes->transfer_date = $data['transfer_date'];
        //         $employes->old_ministry = $data['old_ministry'];
        //         $employes->job_type = $data['job_type'];
        //         $employes->job_category = $data['job_category'];
        //         $employes->service = $data['service'];
        //         $employes->job_class = $data['job_class'];
        //         $employes->job_step = $data['job_step'];
        //         $employes->save();

        //         $id  = Employes::latest()->lockForUpdate()->first()->id;


        //         foreach ($request->addMoreInputFields as $key => $value) {
        //             $certifications = new Certifications();
        //             $certifications->employe_id = $id;
        //             $certifications->degree = $value['degree'];
        //             $certifications->uni = $value['uni'];
        //             $certifications->specialty = $value['specialty'];
        //             $certifications->craductedCountry = $value['craductedCountry'];
        //             $certifications->craductedDate = $value['craductedDate'];
        //             $certifications->save();
        //         }



        //         return redirect()->back()->with('status', " تم أضافة البيانات بنجاح  ");
        //     } catch (Expectation $e) {
        //         return redirect()->back()->with('failed', "لم يتم أضافة البيانات ");
        //     }
        // }
    }
}


