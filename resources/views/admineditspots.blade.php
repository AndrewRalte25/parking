<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('UPDATE PARKING SPOT') }}
        </h2>
    </x-slot>

    <div class="mt-3 d-flex align-items-center justify-content-center">
        <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary overflow-hidden shadow-lg sm:rounded-lg">
                <div class="container-fluid">
                    <form action="/adminupdatespot/{{ $spot->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updating -->

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Name</label>
                                    <input name="name" value="{{ old('name', $spot->name) }}" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="locationInput" class="form-label">Location</label>
                                    <input name="location" value="{{ old('location', $spot->location) }}" type="text" class="form-control" id="locationInput" aria-describedby="locationHelp">
                                    @error('location')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="bookieIdInput" class="form-label">Assign Bookie</label>
                                    <select name="bookie_name" class="form-select" id="bookieIdInput" aria-describedby="bookieIdHelp">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->name }}" data-user-id="{{ $user->id }}" {{ $spot->bookie_name == $user->name ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('bookie_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="bookieUserIdDisplay" class="form-label">Selected Bookie's ID</label>
                                    <input type="text" id="bookieUserIdDisplay" name="bookie_id" value="{{ old('bookie_id', $spot->bookie_id) }}" readonly>
                                </div>

                                <!-- Continue updating other fields with their respective values from $spot -->

                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add a script to update the display field when a bookie is selected
        document.getElementById('bookieIdInput').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var bookieUserIdDisplay = document.getElementById('bookieUserIdDisplay');
            bookieUserIdDisplay.value = selectedOption.dataset.userId;
        });
    </script>
</x-app-layout>
