<?php

namespace App\Http\Controllers\Employes;

use App\Http\Controllers\Controller;
use App\Models\Clases;
use App\Models\Education;
use App\Models\employeDetails;
use App\Models\Shoukur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        return view('dashboards.employes.ShoukurData');

    }


    public function Committee(Request $request)
    {

        return view('dashboards.employes.Committee');

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



                return redirect()->back()->with('success', " تم اضافة البيانات  بنجاح ");
            } catch (Expectation $e) {
                return redirect()->back()->with('failed', "لم يتم اضافة البيانات ");
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


                $data = $request->input();
                $employes =  employeDetails::find($id);
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
                $employes->update();



                $ProductStocks = Education::where('user_id',Auth::user()->id)->pluck('id')->all();
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



    return redirect()->back()->with('success', " تم تحديث البيانات بنجاح    ");
} catch (Expectation $e) {
    return redirect()->back()->with('failed', "لم يتم  تحديث البيانات   ");
}
}
    }

    public function shoukurAll(Request $request)
    {
        $user_id=Auth::user()->id;
         $Shoukur =  Shoukur::where('user_id' , '=' , $user_id)->get();
        return view('dashboards.employes.ShoukurAll', compact('Shoukur'));
    }

    public function submit_shoukur(Request $request)
    {

        $user_id=Auth::user()->id;

       $rules = [
            'book_number' => 'required',
            'book_date' => 'required',
            'book_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {


            try {


                $imageName = time().'.'.$request->book_image->getClientOriginalExtension();


                // $imageName = time().'.'.$request->book_image->extension();

                $data = $request->input();
                $data_added = new Shoukur();
                $data_added->user_id  = $user_id;
                $data_added->book_number = $data['book_number'];
                $data_added->book_date = $data['book_date'];
                $data_added->book_destination = $data['book_destination'];
                $path = $request->book_image->move('assets/shoukurs/images', $imageName);
                $data_added->book_image =  $imageName;
                $data_added->save();

                // $path = 'assets/shoukurs/images/' . $imageName;
                // if (Storage::exists($path)) {
                //     Storage::delete($path);
                // }

    return redirect()->back()->with('success', " تم أضافة البيانات بنجاح    ");
} catch (Expectation $e) {
    return redirect()->back()->with('failed', "لم يتم  أضافة البيانات   ");
}
    }

}

}
