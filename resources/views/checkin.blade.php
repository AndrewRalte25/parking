<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CHECK IN') }}
        </h2>
    </x-slot>

    <form action="/checkin" method="POST" enctype="multipart/form-data" id="checkinForm">
        @csrf
        <div class="mb-3" style="width: 50%; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <label for="vehicleSelect" class="form-label">SELECT PARKING SPOT</label>
                <select name="spot_name" class="form-select" id="SpotSelect" aria-describedby="SpotSelect">
                    @foreach ($bookiespot as $spt)
                        <option value="{{ $spt->name }}" data-location="{{ $spt->location }}">{{ $spt->name }}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        <div>
          
            <input type="hidden" name="spot_location" id="spotLocation" value="">
            <input type="file" name="qr_code_image">
            <button type="submit">Upload QR Code</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var spotSelect = document.getElementById('SpotSelect');
            var spotLocationInput = document.getElementById('spotLocation');

            function updateSpotLocation() {
                var selectedOption = spotSelect.options[spotSelect.selectedIndex];
                var location = selectedOption ? selectedOption.getAttribute('data-location') : '';
                spotLocationInput.value = location;
            }
            updateSpotLocation();
            spotSelect.addEventListener('change', updateSpotLocation);
        });
    </script>
</x-app-layout>
