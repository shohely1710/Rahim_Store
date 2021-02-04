<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function construct(){
//        $this->middleware('guest:admin');

        $this->middleware('auth');
    }
    public function index()
    {
//        $id= Auth::loginUsingId(1);
//        if (Auth::attempt('id' => $id) {
            // The user is active, not suspended, and exists.

            return view('backend.pages.dashboard.index');
    }

//
//
//        else{
//            return redirect()->intended('/home');
//        }
//
//    }



}
