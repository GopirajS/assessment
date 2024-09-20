<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){

        return view('admin.dashboard');
    }

    public function usersList(Request $request){


        $users = User::where('role','0')->get();
        return view('admin.user-list',['users'=>$users]);
    }
    public function storeList(Request $request){

        $stores = Store::all();
        return view('admin.store-list',['stores'=>$stores]);

    }
}
