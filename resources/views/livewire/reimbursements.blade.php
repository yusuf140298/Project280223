<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Reimbursement Information
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">ID.</th>
                        <th class="px-4 py-2">Name User</th>
                        <th class="px-4 py-2">Information</th>
                        <th class="px-4 py-2">Cost</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reimbursement as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row->id }}</td>
                            <td class="border px-4 py-2">{{ $row->user }}</td>
                            <td class="border px-4 py-2">{{ $row->information }}</td>
                            <td class="border px-4 py-2">Rp. {{ $row->cost }}</td>
                            <td class="border px-4 py-2" align="center"><img src="{{ url('storage/'.$row->image) }}" class="img-thumbnail" style="width:80px; height:80px"/></td>
                            <td class="border px-4 py-2">@if($row->status == 1) <span class="text-green-500">Success</span>@elseif($row->status == 2) <span class="text-red-500">Failed</span>@else <span class="text-yellow-500">Waiting</span> @endif</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="edit({{ $row->id }})" class="bg-purple-500 hover:bg-purple-700 text-white py-2 px-3">Confirmation</button>
                                <!-- <button wire:click="delete({{ $row->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button> -->
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="5">No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>