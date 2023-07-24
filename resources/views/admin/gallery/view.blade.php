@extends('layouts.admin')
@section('content')
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2">
            <h2 class="text-white">{{ $model->common_name }}</h2>
        </div>
        <div class="px-4 pb-2">
            <table class="min-w-full divide-y divide-gray-200">
                @foreach ($model->itemImages as $item)
                    <tr>
                        <td>
                            <img src="{{ $item->image }}" alt="Image not found" srcset="" class="w-40 h-40 object-cover">
                        </td>
                        <td class="">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('gallery.edit', $item->id) }}"><span class="bi bi-pencil"></span></a>
                                <form action="{{ route('gallery.destroy', $item->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"><span class="bi bi-trash"></span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
