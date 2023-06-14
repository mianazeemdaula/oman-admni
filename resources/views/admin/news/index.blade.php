@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-rocket text-2xl"></span>
        <h2 class="text-xl">News</h2>
    </div>
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2 flex justify-between">
            <h2 class="text-white">News</h2>
            <a class="p-2 bg-white rounded-md text-xs" href="{{ route('news.create') }}">Create News</a>
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
                                Body
                            </th>
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
                                <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">{{ $item->tittle }}</td>
                                <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">{{ $item->body }}</td>
                                <td class="">
                                    <div class="relative h-12">
                                        @foreach ($item->newsImages as $img)
                                            <img src="{{ $img->image }}"
                                                class="w-10 h-10 rounded-full absolute ml-{{ $loop->index * 4 }}"
                                                alt="" srcset="">
                                        @endforeach
                                    </div>
                                </td>
                                <td class="flex space-x-1">
                                    <a href="{{ route('news.show', $item->id) }}"><span class="bi bi-eye"></span></a>
                                    <a href="{{ route('news.edit', $item->id) }}"><span class="bi bi-pencil"></span></a>
                                    <form action="{{ route('news.destroy', $item->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"><span class="bi bi-trash"></span></button>
                                    </form>
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
