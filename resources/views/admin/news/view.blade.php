@extends('layouts.admin')
@section('content')
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2">
            <h2 class="text-white">{{ $title ?? '' }}</h2>
        </div>
        <div class="px-4 pb-2">
            <table class="min-w-full divide-y divide-gray-200">
                @foreach ($model->getAttributes() as $key => $value)
                    <tbody>
                        @if (str_contains($key, 'deleted_at') || str_contains($key, 'password'))
                        @else
                            <tr>
                                <th class="w-60">{{ __('label.' . $key) }}</th>
                                <td class="px-4 ">
                                    @if (str_contains($key, 'image') || str_contains($key, 'picture') || str_contains($key, 'logo'))
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
