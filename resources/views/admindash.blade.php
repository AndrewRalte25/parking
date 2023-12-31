<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 col-lg-1 d-md-block bg-light text-white sidebar">
                <div class="position-sticky" style="height: 100vh;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/adminusers">
                                USERS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/adminparking">
                               PARKING SPOTS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/adminvehicles">
                               VEHICLES
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/adminhistory">
                               HISTORY
                            </a>
                        </li>
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
