<?php

namespace App\Http\Controllers;
use App\Models\spot;
use App\Models\User;
use App\Models\vehicle;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userVehicles = Vehicle::where('owner_id', auth()->user()->id)->get();
        $spot = spot::get();
        return view('userspot', compact('spot', 'userVehicles'));
    }
    
    
    public function add()
    {    
         $userid = user::where('id',auth()->user()->id)->get();
         
         return view('useraddvehicle', compact('userid'));
    }  

    public function store(Request $request)
    {    
        
        $data = new vehicle();
        $data->registration = $request->reg;
        $data->type = $request->type;
        $data->owner_id = $request->ownerid;
     
        $data->save();
        
        return redirect('/userdash')->with('success', 'Added Successfully');
    }  


}