<?php

namespace App\Http\Controllers;
use App\Models\spot;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
   {    
        $spot = spot::get();
        return view('adminspots', compact('spot'));
   }  

   public function indexuser()
   {    
        $user = User::get();
        return view('adminuser', compact('user'));
   }  
   public function createspot()
   {   
        $users = User::where('role',1)->get();
       return view('adminaddspot' ,compact('users'));
   }  

   public function storespot(Request $request)
   {
      
       $data = new spot();
       $data->name = $request->name;
       $data->location = $request->location;
       $data->bookie_name = $request->bookie_name;
       $data->max_cap = $request->max_cap;
       $data->spaces = $request->max_cap;
       $data->save();
       
       return redirect('/adminspots')->with('success', 'Added Successfully');
   }
   
}
