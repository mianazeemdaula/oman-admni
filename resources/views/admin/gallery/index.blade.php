@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-bookmark-star-fill text-2xl"></span>
        <h2 class="text-xl">Banners</h2>
    </div>
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2 flex justify-between">
            <h2 class="text-white">Banners</h2>
            <a class="p-2 bg-white rounded-md text-xs" href="{{ route('banners.create') }}">Create Banner</a>
        </div>
        <div class="px-4 pb-2">
            <div class="overflow-x-auto mt-2">
                <table class="min-w-full divide-y divide-gray-200 table-striped table-bordered" id="dataTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Images</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($collection as $item)
                            <tr class="border-b-2">
                                <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                                    {{ $item->itemImages[0]->tittle ?? 'no-found' }}</td>
                                <td class="">
                                    <img src="{{ $item->itemImages[0]->image ?? 'na' }}" class="w-10 h-10 rounded-full"
                                        alt="" srcset="">
                                </td>
                                <td class="flex space-x-1">
                                    <a href="{{ route('gallery.show', $item->id) }}"><span class="bi bi-eye"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive:true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

        });
    </script>
@endsection
