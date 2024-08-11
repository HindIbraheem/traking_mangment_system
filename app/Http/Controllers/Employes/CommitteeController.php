<?php

namespace App\Http\Controllers\Employes;

use App\Http\Controllers\Controller;
use App\Models\Committe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Expectation;
class CommitteeController extends Controller
{
    public function committeeAll(Request $request)
    {
        $user_id=Auth::user()->id;
         $Committe =  Committe::where('user_id' , '=' , $user_id)->get();
        return view('dashboards.employes.CommitteeAll', compact('Committe'));
    }


    public function committeeData(Request $request)
    {
        return view('dashboards.employes.CommitteeData');

    }

    public function submit_committee(Request $request)
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
                $data = $request->input();
                $data_added = new Committe();
                $data_added->user_id  = $user_id;
                $data_added->book_number = $data['book_number'];
                $data_added->book_date = $data['book_date'];
                $data_added->book_type = $data['book_type'];
                $path = $request->book_image->move('assets/shoukurs/images', $imageName);
                $data_added->book_image =  $imageName;
                $data_added->save();


    return redirect()->back()->with('success', " تم أضافة البيانات بنجاح    ");
} catch (Expectation $e) {
    return redirect()->back()->with('failed', "لم يتم  أضافة البيانات   ");
}
    }

}


public function destroy($id)
{
    // $path = 'assets/shoukurs/images/' . $imageName;
                // if (Storage::exists($path)) {
                //     Storage::delete($path);
                // }

  $post = Committe::find($id);
  $post->delete();
  return redirect()->route('posts.index')
    ->with('success', 'Post deleted successfully');
}
}
