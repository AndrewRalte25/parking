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
                            <a class "nav-link" href="#">
                                Page 2
                            </a>
                        </li>
                        <!-- Add more sidebar links as needed -->
                    </ul>
                </div>
            </nav>
            
            <div id="page-content-wrapper" class="col-md-11">
                <a class="btn btn-dark m-3" href="/adminaddspot" role="button">ADD PARKING SPOT</a>
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
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
                                        <td>{{ $spt->id }}</td>
                                        <td>{{ $spt->name }}</td>
                                        <td>{{ $spt->location }}</td>
                                        <td>{{ $spt->bookie_name }}</td>
                                        <td>{{ $spt->max_cap }}</td>
                                        <td>{{ $spt->spaces }}</td>
                                        <td>
                                            <form action="{{ '/hotels/' . $spt->name }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                            <button>
                                                <a href="{{ '/hotels/' . $spt->name . '/edit' }}">EDIT</a>
                                            </button>
                                            <button>
                                                <a href="{{ '/hotels/' . $spt->name }}/addroom">VIEW PARKED VEHICLES</a>
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
