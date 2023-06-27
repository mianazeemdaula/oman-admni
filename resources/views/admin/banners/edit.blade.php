@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-bookmark-star-fill text-2xl"></span>
        <h2 class="text-xl">Banner</h2>
    </div>
    <form action="{{ route('banners.update', $news->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mt-4 bg-white">
            <div class="bg-blue-500  p-2">
                <h2 class="text-white">Edit Banner</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 p-2 gap-2 md:p-4">
                <div>
                    <h3 class="p-1">Title</h3>
                    <input type="text" placeholder="tiltle" name="title" value="{{ $news->tittle }}" class="w-80">
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Image</h3>
                    <label for="avatar" class="relative">
                        <img src="{{ $news->image }}" alt="image" class="rounded-md w-32 h-20">
                        <img id="preview" src="#" alt="Preview"
                            class="absolute inset-0 w-32 h-20 object-cover rounded-md opacity-0">
                        <input type="file" id="avatar" name="image" accept="image/*" class="hidden"
                            onchange="previewImage(event)">
                    </label>
                    @error('image')
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
