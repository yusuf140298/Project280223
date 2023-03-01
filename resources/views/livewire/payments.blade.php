<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Payment
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-12 py-4">
                @if(session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div> 
                @endif
            <form wire:submit.prevent="submit" method="post" class="w-100 px-6 py-3" enctype="multipart/form-data">
                <div class="mt-0">
                    <x-label for="send" value="{{ __('Send To') }}"/>
                    <select name="send" id="send" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="send">
                        <option value="">-- Select --</option>
                        @forelse($reimbursements as $row)
                        <option value="{{$row->id_reimburs}}">{{$row->user}} - 001{{$row->id_reimburs}}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('send') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mt-4">
                    <x-label for="payment" value="{{ __('Payment') }}"/>
                    <x-input id="payment" class="block mt-1 w-full" type="text" name="payment" wire:model="payment" />
                    @error('payment') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mt-4">
                    <x-label for="information" value="{{ __('Information') }}" />
                    <textarea class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="information" id="information" autofocus wire:model="information">

                    </textarea>
                    @error('information') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mt-4">
                    <x-label for="image" value="{{ __('Upload Image') }}" />
                    <input id="image" class="py-1" type="file" name="image" :value="old('image')" wire:model="image"/>
                    @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="bg-white py-3 sm:px-0 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type=submit"" class="inline-flex justify-center w-80 rounded-md border border-transfarent px-6 py-2 bg-sky-600 text-white leading-6 font-medium shadow-sm hover:text-white focus:outline-none focus:border-blue-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Send
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">ID.</th>
                        <th class="px-4 py-2">Send To Reimburs</th>
                        <th class="px-4 py-2">Information</th>
                        <th class="px-4 py-2">Payment</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $row)
                        <tr>
                            <td class="border px-4 py-2">012{{ $row->id_payment }}</td>
                            <td class="border px-4 py-2">{{ $row->name }}</td>
                            <td class="border px-4 py-2">{{ $row->information_pay }}</td>
                            <td class="border px-4 py-2">Rp. {{ $row->payment }}</td>
                            <td class="border px-4 py-2" align="center"><img src="{{ url('storage/'.$row->image) }}" class="img-thumbnail" style="width:80px; height:80px"/></td>
                            <td class="border px-4 py-2">@if($row->status_payment == 1) <span class="text-blue-500">Claim</span> @else <span class="text-yellow-500">Waiting</span> @endif</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="edit({{ $row->id_payment }})" class="bg-purple-500 hover:bg-purple-700 text-white py-2 px-3">Detail</button>
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
