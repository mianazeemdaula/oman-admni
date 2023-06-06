@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-person text-2xl"></span>
        <h2 class="text-xl">Organizations</h2>
    </div>
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2 flex justify-between">
            <h2 class="text-white">Organization</h2>
            {{-- <a class="p-2 bg-white rounded-md text-xs" href="{{ route('buildings.create') }}">Create Building</a> --}}
        </div>
        <div class="px-4 pb-2">
            <div class="overflow-x-auto mt-2">
                <table class="min-w-full divide-y divide-gray-200 table-striped table-bordered" id="dataTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Phone
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Clan
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id Number
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                City
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                State
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Address</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($collection as $item)
                            <tr class="border-b-2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><img src="{{ $item->logo }}"
                                        alt="" srcset="" class="w-10 h-10 object-cover rounded-sm    "></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->phone }}</td>
                                <td class="px-6 py-4 whitespace-pre-line text-sm text-gray-500">{{ $item->clan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->id_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->city }}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->state }}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->address }}
                                </td>
                                <td class="flex space-x-1">
                                    <a href="{{ route('organizations.show', $item->id) }}"><span
                                            class="bi bi-eye"></span></a>
                                    {{-- <a href="{{ route('buildings.edit', $item->id) }}"><span
                                            class="bi bi-pencil"></span></a>
                                    <form action="{{ route('buildings.destroy', $item->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"><span class="bi bi-trash"></span></button>
                                    </form> --}}
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
