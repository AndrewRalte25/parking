<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <form action="/checkin" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="qr_code_image">
        <button type="submit">Upload QR Code</button>
    </form>
    
    
</x-app-layout>