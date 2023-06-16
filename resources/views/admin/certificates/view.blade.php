@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-rocket text-2xl"></span>
        <h2 class="text-xl">Buildings</h2>
    </div>
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2">
            <h2 class="text-white">Building</h2>
        </div>
        <div class="px-4 pb-2">
            <table class="min-w-full divide-y divide-gray-200">
                @foreach ($model->getAttributes() as $key => $value)
                    <tbody>
                        @if (str_contains($key, 'deleted_at'))
                        @else
                            <tr>
                                <th>{{ __('label.' . $key) }}</th>
                                <td>
                                    @if (str_contains($key, 'image'))
                                        <a href="{{ $value }}">
                                            <img src="{{ $value }}" alt="" srcset=""
                                                class="w-20 h-20 object-cover">
                                        </a>
                                    @else
                                        {{ $value }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
