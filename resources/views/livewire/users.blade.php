<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        User Information
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if($isModal)
                @include('livewire.create')
            @endif

            <!-- <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Add Account Employee</button> -->

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">ID.</th>
                        <th class="px-4 py-2">Name User</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Level</th>
                        <th class="px-4 py-2">Action</th>
                    </tr> 
                </thead>
                <tbody>
                    @forelse($user as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row->id }}</td>
                            <td class="border px-4 py-2">{{ $row->name }}</td>
                            <td class="border px-4 py-2">{{ $row->email }}</td>
                            <td class="border px-4 py-2">@if($row->level == 1) <span class='text-blue-500'>Owner</span> @else <span class='text-yellow-500'>Employee</span> @endif</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="edit({{ $row->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3">Update</button>
                                <button wire:click="delete({{ $row->id }})" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3">Delete</button>
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