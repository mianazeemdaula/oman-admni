@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-bank text-2xl"></span>
        <h2 class="text-xl">Loans</h2>
    </div>
    <div class="mt-4 bg-white">
        <div class="bg-blue-500  p-2 flex justify-between">
            <h2 class="text-white">Loan Requests</h2>
            <a class="p-2 bg-white rounded-md text-xs" href="#">Add Loan</a>
        </div>
        <div class="px-4 pb-2">
            <div class="overflow-x-auto mt-2">
                <table class="min-w-full divide-y divide-gray-200 table-striped table-bordered" id="dataTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                From</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                To</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Start</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                End</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Item</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($collection as $item)
                            <tr class="border-b-2">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if ($item->userFrom)
                                        {{ $item->userFrom->name }}
                                    @elseif ($item->organizationFrom)
                                        {{ $item->organizationFrom->name }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if ($item->userTo)
                                        {{ $item->userTo->name }}
                                    @elseif ($item->organizationTo)
                                        {{ $item->organizationTo->name }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->start }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->end }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->status }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if ($item->item)
                                        {{ $item->item->common_name }}
                                    @endif
                                </td>
                                <td class="flex space-x-1">
                                    <form action="{{ route('loans.update', $item->id) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="status" value="accept">
                                        <button type="submit"><span class="bi bi-check"></span></button>
                                    </form>
                                    <form action="{{ route('loans.update', $item->id) }}" class="rejectForm" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="status" value="reject">
                                        <input type="hidden" name="reason" class="reason">
                                        <a class="submitButton"><span class="bi bi-x"></span></a>
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

            $( document ).on( "click", "a.submitButton", function(){
                Swal.fire({
                    title: 'Reason',
                    input: 'text',
                    inputPlaceholder: 'Enter the reason',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var $form = $(this).closest('form');
                        var $input = $form.find('.reason');
                        $input.val(result.value);
                        $form.submit();
                    }
                });
            });
        });
    </script>
@endsection
