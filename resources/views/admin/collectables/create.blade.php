@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-rocket text-2xl"></span>
        <h2 class="text-xl">Collectables</h2>
    </div>
    <form action="{{ route('collectables.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mt-4 bg-white">
            <div class="bg-blue-500  p-2">
                <h2 class="text-white">Add Collectable</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 p-2 gap-2 md:p-4">
                <div>
                    <h3 class="p-1">Registration Number</h3>
                    <input type="text" placeholder="Registration Number" name="registration_number"
                        value="{{ old('registration_number') }}" class="w-80">
                    @error('registration_number')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Type</h3>
                    <input type="text" placeholder="Type" name="type" value="{{ old('type') }}" class="w-80">
                    @error('type')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Type Description</h3>
                    <input type="text" placeholder="Type Description" name="type_description"
                        value="{{ old('type_description') }}" class="w-80">
                    @error('type_description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Material</h3>
                    <input type="text" placeholder="Material" name="material" value="{{ old('material') }}"
                        class="w-80">
                    @error('material')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Common Name</h3>
                    <input type="text" placeholder="common_name" name="common_name" value="{{ old('common_name') }}"
                        class="w-80">
                    @error('common_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">description</h3>
                    <input type="text" placeholder="Description" name="description" value="{{ old('description') }}"
                        class="w-80">
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">State</h3>
                    <input type="text" placeholder="state" name="state" value="{{ old('state') }}" class="w-80">
                    @error('state')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Origin</h3>
                    <input type="text" placeholder="Origin" name="origin" value="{{ old('origin') }}" class="w-80">
                    @error('origin')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">How Own</h3>
                    <input type="text" placeholder="How Own" name="how_own" value="{{ old('how_own') }}" class="w-80">
                    @error('how_own')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Where Saved</h3>
                    <input type="text" placeholder="Where Saved" name="where_saved" value="{{ old('where_saved') }}"
                        class="w-80">
                    @error('where_saved')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">From When</h3>
                    <input type="text" placeholder="From When" name="from_when" value="{{ old('from_when') }}"
                        class="w-80">
                    @error('from_when')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Length</h3>
                    <input type="text" placeholder="Length" name="length" value="{{ old('length') }}" class="w-80">
                    @error('length')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Width</h3>
                    <input type="text" placeholder="Width" name="width" value="{{ old('width') }}" class="w-80">
                    @error('width')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Count</h3>
                    <input type="text" placeholder="Count" name="count" value="{{ old('count') }}"
                        class="w-80">
                    @error('count')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Time Details</h3>
                    <input type="text" placeholder="Time Details" name="time_details"
                        value="{{ old('time_details') }}" class="w-80">
                    @error('time_details')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Background Location</h3>
                    <input type="text" placeholder="Background Location" name="background_location"
                        value="{{ old('background_location') }}" class="w-80">
                    @error('background_location')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Special Item</h3>
                    <input type="text" placeholder="Special Item" name="special_item"
                        value="{{ old('special_item') }}" class="w-80">
                    @error('special_item')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <h3 class="p-1">Status</h3>
                    <input type="text" placeholder="Status" name="status" value="{{ old('status') }}"
                        class="w-80">
                    @error('status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">QR</h3>
                    <input type="text" placeholder="qr" name="qr" value="{{ old('qr') }}" class="w-80">
                    @error('qr')
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
