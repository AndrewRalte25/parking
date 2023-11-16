<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('USERS') }}
        </h2>
    </x-slot>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (Reduced width to half) -->
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
            
            <div id="page-content-wrapper" class="col-md-11">
                <a class="btn btn-dark m-3" href="/adminadduser" role="button">ADD NEW USER</a>
                
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
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>ROLE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $spt)
                                    <tr>
                                        <td>{{ $spt->id }}</td>
                                        <td>{{ $spt->name }}</td>
                                        <td>{{ $spt->email }}</td>
                                        <td>{{ $spt->role }}</td>
                                        <td>
                                            <form action="{{ url('/adminuser/' . $spt->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
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

    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- jQuery for Filtering -->
    <script>
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                const value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</x-app-layout>
