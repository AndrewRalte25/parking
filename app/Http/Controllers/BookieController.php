<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Libern\QRCodeReader\QRCodeReader; 

class BookieController extends Controller
{   

    public function checkin()
    {
        return view('checkin');
    }
    
    public function checkinsucess()
    {
        return view('checkinsucess');
    }

    public function checkout()
    {
        return view('checkout');
    }
    public function processQRCode(Request $request)
    {
        $request->validate([
            'qr_code_image' => 'required|image',
        ]);
    
        try {
            $image = $request->file('qr_code_image');
            $imagePath = $image->store('temp', 'public');
            // dd($imagePath);
            $fullImagePath = public_path('storage/' . $imagePath);
            dd($fullImagePath);
            $QRCodeReader = new QRCodeReader();
            $qrcode_text = $QRCodeReader->decode($fullImagePath);
          
            return view('checkinsucess', compact('qrcode_text'));
        } catch (\Exception $e) {
            // return redirect('/checkin')->with('error', 'Invalid QR code image');
        }
    }
}
