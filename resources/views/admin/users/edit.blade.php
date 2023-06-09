@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-rocket text-2xl"></span>
        <h2 class="text-xl">Building</h2>
    </div>
    <form action="{{ route('buildings.update', $building->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mt-4 bg-white">
            <div class="bg-blue-500  p-2">
                <h2 class="text-white">Edit Building</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 p-2 gap-2 md:p-4">
                <div>
                    <h3 class="p-1">Type</h3>
                    <input type="text" placeholder="Type" name="type" value="{{ $building->type }}" class="w-80">
                    @error('type')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">How Own</h3>
                    <input type="text" placeholder="How Own" name="how_own" value="{{ $building->how_own }}"
                        class="w-80">
                    @error('how_own')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Property Image</h3>
                    <label for="preview1Input" class="relative">
                        <img src="{{ $building->property_image }}" alt="image" class="rounded-md w-10 h-10">
                        <img id="preview1" src="#" alt="Preview"
                            class="absolute inset-0 w-10 h-10 object-cover rounded-md opacity-0">
                        <input type="file" id="preview1Input" name="property_image" accept="image/*" class="hidden"
                            onchange="previewImage1(this);">
                    </label>
                    @error('property_image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">From When</h3>
                    <input type="text" placeholder="From When" name="from_when" value="{{ $building->from_when }}"
                        class="w-80">
                    @error('from_when')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Room Number</h3>
                    <input type="text" placeholder="Room Number" name="room_number" value="{{ $building->room_number }}"
                        class="w-80">
                    @error('room_number')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Area</h3>
                    <input type="text" placeholder="Area" name="area" value="{{ $building->area }}" class="w-80">
                    @error('area')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Dimensions</h3>
                    <input type="text" placeholder="Dimensions" name="dimensions" value="{{ $building->dimensions }}"
                        class="w-80">
                    @error('dimensions')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">State</h3>
                    <input type="text" placeholder="State" name="state" value="{{ $building->state }}" class="w-80">
                    @error('state')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Resotration Date</h3>
                    <input type="date" placeholder="Restoration Date" name="restoration_date"
                        value="{{ $building->restoration_date }}" class="w-80">
                    @error('restoration_date')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Image</h3>
                    <label for="avatar" class="relative">
                        <img src="{{ $building->image }}" alt="image" class="rounded-md w-10 h-10">
                        <img id="preview" src="#" alt="Preview"
                            class="absolute inset-0 w-10 h-10 object-cover rounded-md opacity-0">
                        <input type="file" id="avatar" name="image" accept="image/*" class="hidden"
                            onchange="previewImage(event)">
                    </label>
                    @error('image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">City</h3>
                    <input type="text" placeholder="City" name="city" value="{{ $building->city }}"
                        class="w-80">
                    @error('city')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Building State</h3>
                    <input type="text" placeholder="Building State" name="building_status"
                        value="{{ $building->building_status }}" class="w-80">
                    @error('building_status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Neighborhood</h3>
                    <input type="text" placeholder="Neighborhood" name="neighborhood"
                        value="{{ $building->neighborhood }}" class="w-80">
                    @error('neighborhood')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Status</h3>
                    <input type="text" placeholder="Status" name="status" value="{{ $building->status }}"
                        class="w-80">
                    @error('status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Village</h3>
                    <input type="text" placeholder="Village" name="village" value="{{ $building->village }}"
                        class="w-80">
                    @error('village')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Location</h3>
                    <input type="text" placeholder="Location" name="location" value="{{ $building->location }}"
                        class="w-80">
                    @error('location')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="p-4 flex justify-end">
                <button type="submit" class="bg-blue-400 p-2 rounded-md text-white">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        function previewImage1(event) {
            const preview = document.getElementById('preview1');
            var file = $("#preview1Input").get(0).files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    $("#preview1").attr("src", reader.result);
                    $("#preview1").addClass('opacity-100');
                });
                reader.readAsDataURL(file);
            }
        }

        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    preview.setAttribute('src', reader.result);
                    preview.classList.add('opacity-100');
                });
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
