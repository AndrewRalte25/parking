<?php
namespace App\Http\Controllers;

use App\Models\parkhistory;
use App\Models\spot;
use Illuminate\Http\Request;
use Libern\QRCodeReader\QRCodeReader; 

class BookieController extends Controller
{   

    public function index()
    {   
       

        return view('bookiedash');
    }

    public function checkin()
    {   
        $bookiespot = spot::where('bookie_id', auth()->user()->id)->get();

        return view('checkin',compact('bookiespot'));
    }
    
   
    public function fail()
    {
        return view('qrfailtest');
    }

    public function checkout()
    {   
        $bookiespot = spot::where('bookie_id', auth()->user()->id)->get();
        return view('checkout',compact('bookiespot'));
    }
    
    
    
    public function processQRCode(Request $request)
    {
        $request->validate([
            'qr_code_image' => 'required|image',
        ]);
    
        try {
            $image = $request->file('qr_code_image');
            $imagePath = $image->store('temp', 'public');
    
            $fullImagePath = public_path('storage/' . $imagePath);
            $QRCodeReader = new QRCodeReader();
            $qrcode_text = $QRCodeReader->decode($fullImagePath);
            $dataArray = json_decode($qrcode_text, true);
    
            $data = new parkhistory();
            $data->user_id = $dataArray['user_id'];
            $data->user_name = $dataArray['user_name'];
            $data->registration = $dataArray['registration'];
            $data->location = $request->spot_location;
            $data->spot_name = $request->spot_name;
            $data->created_at = now();
            $data->bookie_id = auth()->user()->id;
    
            $data->save();
    
            $spot = spot::where('name', $request->spot_name)
                ->where('location', $request->spot_location)
                ->first();
    
            if ($spot && $spot->spaces > 0) {
                $spot->decrement('spaces');
            }
    
            return redirect('bookiedash')->with('success', 'CHECKEDIN SUCCESSFULLY');


        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function processQRCodecheckout(Request $request)
    {
        $request->validate([
            'qr_code_image' => 'required|image',
        ]);
    
        try {
            $image = $request->file('qr_code_image');
            $imagePath = $image->store('temp', 'public');
    
            $fullImagePath = public_path('storage/' . $imagePath);
            $QRCodeReader = new QRCodeReader();
            $qrcode_text = $QRCodeReader->decode($fullImagePath);
            $dataArray = json_decode($qrcode_text, true);
    
            $data = new parkhistory();
            $data->user_id = $dataArray['user_id'];
            $data->user_name = $dataArray['user_name'];
            $data->registration = $dataArray['registration'];
            $data->status = 'checked-out';
            $data->location = $request->spot_location;
            $data->spot_name = $request->spot_name;
            $data->bookie_id = auth()->user()->id;
    
            $data->save();
    
            $spot = spot::where('name', $request->spot_name)
                ->where('location', $request->spot_location)
                ->first();
    
            if ($spot) {
                // Check if incrementing spaces would exceed max_cap
                $newSpaces = min($spot->spaces + 1, $spot->max_cap);
                $spot->spaces = $newSpaces;
                $spot->save();
            }
    
            return redirect('bookiedash')->with('success', 'CHECKEDOUT SUCCESSFULLY');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    
    
}
