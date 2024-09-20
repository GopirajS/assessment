<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    public function index()
    {
        $store = Store::where('user_id',Auth::user()->id)->get();
        return view('store.index', compact('store'));
    }

    public function create()
    {
        return view('store.form');
    }

    public function store(Request $request)
    {

        $validator = [
           'title' => 'required',
           'description' => 'required',
           'address' => 'required',
           'profile_image' => 'required',
        ];
   
        
        $request->validate($validator);


        $store = new Store;
        $store->user_id = Auth::user()->id;
        $store->title = $request->input('title');
        $store->description = $request->input('description');
        $store->address = $request->input('address');


        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/store/', $filename);
            $store->profile_image = $filename;
        }
        $store->save();
        return redirect()->route('dashboard')->with('status','Store Added Successfully');
    }

    public function edit($id)
    {
        $store = Store::find($id);
        return view('store.form', compact('store'));
    }

    public function update(Request $request, $id)
    {

        $validator = [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            ];
        $request->validate($validator);
 
        $store = Store::find($id);
        $store->title = $request->input('title');
        $store->description = $request->input('description');
        $store->address = $request->input('address');

        if($request->hasfile('profile_image'))
        {
            $destination = 'uploads/store/'.$store->profile_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/store/', $filename);
            $store->profile_image = $filename;
        }

        $store->update();
        return redirect()->back()->with('status','Store Updated Successfully');
    }

    public function destroy($id)
    {
        $store = Store::find($id);
        $destination = 'uploads/store/'.$store->profile_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $store->delete();
        return redirect()->back()->with('status','Store Deleted Successfully');
    }
}
