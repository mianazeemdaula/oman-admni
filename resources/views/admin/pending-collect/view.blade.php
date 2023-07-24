@extends('layouts.admin')
@section('content')
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2">
            <h2 class="text-white">{{ $title ?? '' }}</h2>
        </div>
        <div class="px-4 pb-2">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody>
                    <tr class="border-b-2">
                        <th class="w-60">ID</th>
                        <td class="px-4 ">{{ $model->id }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Registration Number</th>
                        <td class="px-4 ">{{ $model->registration_number }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Type</th>
                        <td class="px-4 ">{{ $model->type }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Type Description</th>
                        <td class="px-4 ">{{ $model->type_description }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Material</th>
                        <td class="px-4 ">{{ $model->material }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Common Name</th>
                        <td class="px-4 ">{{ $model->common_name }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Description</th>
                        <td class="px-4 ">{{ $model->description }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Origin</th>
                        <td class="px-4 ">{{ $model->origin }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">How Own</th>
                        <td class="px-4 ">{{ $model->how_own }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Where Saved</th>
                        <td class="px-4 ">{{ $model->where_saved }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">From when</th>
                        <td class="px-4 ">{{ $model->from_when }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Length</th>
                        <td class="px-4 ">{{ $model->length }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Width</th>
                        <td class="px-4 ">{{ $model->width }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Height</th>
                        <td class="px-4 ">{{ $model->hight }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Diameter</th>
                        <td class="px-4 ">{{ $model->diameter }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Weight</th>
                        <td class="px-4 ">{{ $model->weight }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Count</th>
                        <td class="px-4 ">{{ $model->count }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Time Details</th>
                        <td class="px-4 ">{{ $model->time_details }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Location</th>
                        <td class="px-4 ">{{ $model->background_location }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Special Item</th>
                        <td class="px-4 ">{{ $model->special_item }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Status</th>
                        <td class="px-4 ">{{ $model->status }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">User</th>
                        <td class="px-4 ">{{ $model->user->name ?? ($model->organization->name ?? '') }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">QR</th>
                        <td class="px-4 ">
                            @if ($model->qr)
                                {!! QrCode::size(100)->generate($model->qr) !!}
                            @endif
                        </td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Images</th>
                        <td class="px-4 ">
                            <div class="flex space-x-2">
                                @foreach ($model->itemImages as $img)
                                    <a href="{{ $img->image }}" target="_blank">
                                        <img src="{{ $img->image }}" class="w-12 h-12" alt="" srcset="">
                                    </a>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Created Time</th>
                        <td class="px-4 ">{{ $model->created_at }}</td>
                    </tr>
                    <tr class="border-b-2">
                        <th class="w-60">Updated Time</th>
                        <td class="px-4 ">{{ $model->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
