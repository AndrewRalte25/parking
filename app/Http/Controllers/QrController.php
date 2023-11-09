<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

use BaconQrCode\Writer;

use App\Models\Vehicle; // Ensure that the model class name is correctly capitalized

class QrController extends Controller
{
    public function generateQRCode(Request $request)
{
    // Get the user's ID and name
    $userId = auth()->user()->id;
    $userName = auth()->user()->name;
    // dd($request);
    // Get the selected vehicle's registration number from the request
    $registration = $request->input('registration');
    
    // Create a QR code content string with the required information
    $qrCodeContent = "User ID: $userId\nUser Name: $userName\nRegistration: $registration";
    dd($qrCodeContent);

    // Set up the QR code renderer and style
    $renderer = new ImageRenderer(
        new RendererStyle(400),
        new SvgImageBackEnd()
    );

    // Create a QR code writer
    $writer = new Writer($renderer);

    // Generate the QR code as an image
    $image = $writer->writeString($qrCodeContent);

    return view('qrshow', ['image' => $image]);
}

}
