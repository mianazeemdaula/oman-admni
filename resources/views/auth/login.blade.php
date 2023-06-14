@extends('layouts.guest')
@section('content')
    <div class="">
        <div class="flex items-center justify-center">
            <span class="bi bi-bag text-4xl"></span>
        </div>
        <form action="{{ url('login') }}" method="post">
            @csrf
            <div class="mt-4 bg-white">
                <div class="bg-blue-500  p-2">
                    <h2 class="text-white">Login</h2>
                </div>
                @if ($errors->any())
                    {!! implode('', $errors->all('<p class="text-red-500 text-xs italic">{{ $message }}</p>')) !!}
                @endif
                <div class="grid grid-cols-1 md:grid-cols-1 p-2 gap-2 md:p-4">
                    <div>
                        <h3 class="p-1">Username</h3>
                        <input type="text" placeholder="Username" name="username" value="{{ old('username') }}"
                            class="w-80">
                        @error('username')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <h3 class="p-1">Password</h3>
                        <input type="password" placeholder="Password" name="password" value="{{ old('password') }}"
                            class="w-80">
                        @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="px-6 py-4 flex justify-end">
                    <button type="submit" class="bg-blue-400 p-2 rounded-md text-white">Login</button>
                </div>
            </div>
        </form>
    </div>
@endsection
