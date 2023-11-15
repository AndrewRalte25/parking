<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

 
   
     <!-- Check-In Button -->
     <a href="/checkin" class="btn btn-primary">Check-In</a>

     <!-- Check-Out Button -->
     <a href="/checkout" class="btn btn-primary">Check-Out</a>
</x-app-layout>

<h1>BOOKIE DASH</h1>