<?php

namespace App\Http\Controllers\Employes;

use App\Http\Controllers\Controller;
use App\Models\Shoukur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Expectation;

class ShoukurController extends Controller
{


    public function shoukurAll(Request $request)
    {
        $user_id=Auth::user()->id;
         $Shoukur =  Shoukur::where('user_id' , '=' , $user_id)->get();
        return view('dashboards.employes.ShoukurAll', compact('Shoukur'));
    }


    public function shoukurData(Request $request)
    {
        return view('dashboards.employes.ShoukurData');

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


public function destroy($id)
{
  $post = Shoukur::find($id);
  $post->delete();
  return redirect()->route('posts.index')
    ->with('success', 'Post deleted successfully');
}
}
