<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == '0') {
            return view('userdash');
        } elseif ($role == '1') {
            return view('bookiedash');
        } elseif ($role == '2') {
            return view('admindash');
        } 
    }
}
