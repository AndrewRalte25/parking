<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PARKING SPOTS') }}
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
                        <!-- Add more sidebar links as needed -->
                    </ul>
                </div>
            </nav>

            <div id="page-content-wrapper" class="col-md-11">
                <div class="mb-3" style="width: 50%; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <label for="vehicleSelect" class="form-label">SELECT VEHICLE</label>
                        <select name="vehicle_id" class="form-select" id="vehicleSelect" aria-describedby="vehicleSelectHelp">
                            @foreach ($userVehicles as $vehicle)
                                <option value="{{ $vehicle->registration }}">{{ $vehicle->registration }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <a id="generateQRButton" class="btn btn-dark" role="button">GENERATE QR</a>
                    </div>
                    <script>
                        // Add a click event listener to the "GENERATE QR" button
                        document.getElementById('generateQRButton').addEventListener('click', function () {
                            // Get the selected vehicle's registration from the dropdown
                            var selectedRegistration = document.getElementById('vehicleSelect').value;

                            // Create the URL with the selected registration as a query parameter
                            var qrGenURL = "/qrgen?registration=" + selectedRegistration;

                            // Navigate to the QR generation page with the selected registration
                            window.location.href = qrGenURL;
                        });
                    </script>

                </div>
                <!-- Search Input -->
                <div class="mb-3">
                    <label for="searchInput" class="form-label">Search:</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Type to search...">
                </div>

                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th>NAME</th>
                                    <th>LOCATION</th>
                                    <th>BOOKIE NAME</th>
                                    <th>MAX CAPACITY</th>
                                    <th>FREE SPACE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spot as $spt)
                                    <tr>
                                     
                                        <td>{{ $spt->name }}</td>
                                        <td>{{ $spt->location }}</td>
                                        <td>{{ $spt->bookie_name }}</td>
                                        <td>{{ $spt->max_cap }}</td>
                                        <td>{{ $spt->spaces }}</td>
                                        <td>                                         
                                            <button>
                                                <a href="{{ '/hotels/' . $spt->name . '/edit' }}">BOOK</a>
                                            </button>     
                                        </td>
                                        <td>                                         
                                            <button>
                                                <a href="{{ '/hotels/' . $spt->name . '/edit' }}">GET DIRECTIONS</a>
                                            </button>     
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
