@extends('layouts.app')

@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded shadow w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">🌱 Crop Advisory</h1>

        <!-- Form for Crop Selection -->
        <form id="crop-form" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Country</label>
                <select name="country" id="country" class="mt-1 block w-full p-2 border border-gray-300 rounded">
                    <option value="">-- Choose --</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->country }}">{{ $country->country }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">State</label>
                <select name="state" id="state" class="mt-1 block w-full p-2 border border-gray-300 rounded" disabled>
                    <option value="">-- Choose --</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">District</label>
                <select name="district" id="district" class="mt-1 block w-full p-2 border border-gray-300 rounded" disabled>
                    <option value="">-- Choose --</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Season</label>
                <select name="season" id="season" class="mt-1 block w-full p-2 border border-gray-300 rounded" disabled>
                    <option value="">-- Choose --</option>
                </select>
            </div>

            <div>
                <button type="button" id="get-crops" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700" disabled>
                    Get Suggestions
                </button>
            </div>
        </form>

        <!-- Display Crop Suggestions -->
        <div id="crop-results" class="mt-6 bg-green-50 p-4 rounded hidden">
            <h2 class="text-lg font-semibold mb-2">Recommended Crops:</h2>
            <ul id="crop-list" class="list-disc list-inside text-green-800"></ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const country = document.getElementById('country');
        const state = document.getElementById('state');
        const district = document.getElementById('district');
        const season = document.getElementById('season');
        const getCropsButton = document.getElementById('get-crops');
        const cropResults = document.getElementById('crop-results');
        const cropList = document.getElementById('crop-list');

        // Fetch states based on selected country
        country.addEventListener('change', function () {
            state.innerHTML = '<option value="">-- Choose --</option>';
            district.innerHTML = '<option value="">-- Choose --</option>';
            season.innerHTML = '<option value="">-- Choose --</option>';
            cropResults.classList.add('hidden');
            getCropsButton.disabled = true;

            if (this.value) {
                fetch('{{ route('get-states') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ country: this.value })
                })
                .then(response => response.json())
                .then(data => {
                    state.disabled = false;
                    data.forEach(item => {
                        state.innerHTML += `<option value="${item.state}">${item.state}</option>`;
                    });
                });
            } else {
                state.disabled = true;
                district.disabled = true;
                season.disabled = true;
            }
        });

        // Fetch districts based on selected state
        state.addEventListener('change', function () {
            district.innerHTML = '<option value="">-- Choose --</option>';
            season.innerHTML = '<option value="">-- Choose --</option>';
            cropResults.classList.add('hidden');
            getCropsButton.disabled = true;

            if (this.value) {
                fetch('{{ route('get-districts') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ state: this.value })
                })
                .then(response => response.json())
                .then(data => {
                    district.disabled = false;
                    data.forEach(item => {
                        district.innerHTML += `<option value="${item.district}">${item.district}</option>`;
                    });
                });
            } else {
                district.disabled = true;
                season.disabled = true;
            }
        });

        // Fetch seasons based on selected district
        district.addEventListener('change', function () {
            season.innerHTML = '<option value="">-- Choose --</option>';
            cropResults.classList.add('hidden');
            getCropsButton.disabled = true;

            if (this.value) {
                fetch('{{ route('get-seasons') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ district: this.value })
                })
                .then(response => response.json())
                .then(data => {
                    season.disabled = false;
                    data.forEach(item => {
                        season.innerHTML += `<option value="${item.season}">${item.season}</option>`;
                    });
                });
            } else {
                season.disabled = true;
            }
        });

        // Enable the "Get Suggestions" button when a season is selected
        season.addEventListener('change', function () {
            getCropsButton.disabled = !this.value;
        });

        // Fetch crops based on selected filters
        getCropsButton.addEventListener('click', function () {
            cropResults.classList.add('hidden');
            cropList.innerHTML = '';

            fetch('{{ route('get-crops') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    country: country.value,
                    state: state.value,
                    district: district.value,
                    season: season.value
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    cropResults.classList.remove('hidden');
                    data.forEach(item => {
                        cropList.innerHTML += `<li>${item.crop_name}</li>`;
                    });
                } else {
                    alert('No crops found for the selected filters.');
                }
            });
        });
    });
</script>
@endsection