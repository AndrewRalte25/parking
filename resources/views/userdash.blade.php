<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (Reduced width to half) -->
            <nav id="sidebar" class="col-md-1 d-md-block bg-light text-white sidebar">
                <div class="position-sticky" style="height: 100vh;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/usernew">
                                REGISTER NEW VEHICLE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/userspot">
                               PARKING SPOTS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/qrgen">
                               GENERATE QR
                            </a>
                        </li>
                    
                        <!-- Add more sidebar links as needed -->
                    </ul>
                </div>
            </nav>
            
          
        </div>
    </div>
   
</x-app-layout>

<style>
    .sidebar {
        border-right: 1px solid black;
    }
</style>
