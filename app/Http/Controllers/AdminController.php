<?php

namespace App\Http\Controllers;

use App\Models\parkhistory;
use Illuminate\Support\Facades\Hash;
use App\Models\spot;
use App\Models\User;
use App\Models\vehicle;

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

   public function vehicles()
   {    
        $vehicle = vehicle::get();
        return view('adminvehicle', compact('vehicle'));
   }  

   public function history()
   {    
        $history = parkhistory::get();
        return view('adminhistory', compact('history'));
   }  
   public function edit($id)
   {    
        $spot = spot::find($id);
        $users = User::where('role',1)->get();
        return view('admineditspots', compact('spot','users'));
   }  
   public function createspot()
   {   
          $users = User::where('role',1)->get();
          return view('adminaddspot' ,compact('users'));
   }  
   public function adduser()
   {   
       return view('adminadduser');
   }  

   public function storespot(Request $request)
   {
      
       $data = new spot();
       $data->name = $request->name;
       $data->location = $request->location;
       $data->bookie_name = $request->bookie_name;
       $data->bookie_id = $request->bookie_id;
       $data->max_cap = $request->max_cap;
       $data->spaces = $request->max_cap;
       $data->save();
       
       return redirect('/adminspots')->with('success', 'Added Successfully');
   }
   public function storeuser(Request $request)
   {
      
     $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|unique:users',
          'role' => 'required|in:1,2',
          'password' => 'required|string|min:8',
      ]);
  
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->role = $request->role;
      $user->password = Hash::make($request->password);
      $user->save();
  
      return redirect('/adminusers')->with('success', 'User added successfully.');
   }
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect('/adminusers')->with('success', 'User deleted successfully.');
}
public function spotdestroy($id)
{
    $user = spot::findOrFail($id);
    $user->delete();
    return redirect('/adminspots')->with('success', 'Spot deleted successfully.');
}

public function vehicledestroy($id)
{
    $user = vehicle::findOrFail($id);
    $user->delete();
    return redirect('/adminvehicles')->with('success', 'Vehicle deleted successfully.');
}
public function historydestroy($id)
{
    $user = parkhistory::findOrFail($id);
    $user->delete();
    return redirect('/adminhistory')->with('success', 'History deleted successfully.');
}

public function update(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'bookie_name' => 'required|string',
            'bookie_id' => 'required|integer', 
        ]);
        $spot = spot::findOrFail($id);  
        $spot->update($validatedData);
        return redirect('/adminspots')->with('success', 'Spot updated successfully.');
    }
   
   
}
