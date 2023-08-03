@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-gift text-2xl"></span>
        <h2 class="text-xl">Sells</h2>
    </div>
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2">
            <h2 class="text-white">Sells</h2>
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
                                    @elseif (str_contains($key, 'from'))
                                        {{ $model->userFrom->name ?? ($model->organizationFrom->name ?? '') }}
                                    @elseif (str_contains($key, 'to'))
                                        {{ $model->userTo->name ?? ($model->organizationTo->name ?? '') }}
                                    @elseif (str_contains($key, 'item_id'))
                                        {{ $model->item->common_name ?? '' }}
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
