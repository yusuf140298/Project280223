<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4 px-4 py-2 bg-gray-100">
                                <table class="no-border w-full bg-gray-100 px-4 py-4 rounded-md">
                                    <tr class="py-6">
                                        <td class="font-bold">Name</td>
                                        <td class="px-4">:</td>
                                        <td>{{$a}}</td>
                                    </tr>
                                    <tr class="py-6">
                                        <td class="font-bold">Cost</td>
                                        <td class="px-4">:</td>
                                        <td>Rp. {{$b}}</td>
                                    </tr>
                                    <tr class="py-6">
                                        <td class="font-bold">Date Submission</td>
                                        <td class="px-4">:</td>
                                        <td>{{$d}}</td>
                                    </tr>
                                    <tr class="py-6">
                                        <td class="font-bold">Information Reimbursement</td>
                                        <td class="px-4">:</td>
                                        <td>{{$c}}</td>
                                    </tr>
                                    <tr class="py-6">
                                        <td class="font-bold">Status Payment</td>
                                        <td class="px-4">:</td>
                                        <td>@if($e == 1)<span class="text-blue-500">confirmed</span>@elseif($e == 2) <span class="text-red-500">Reject</span>@else <span class="text-yellow-500">Waiting</span> @endif</td>
                                    </tr>
                                    <tr class="py-6">
                                        <td class="font-bold">Information Payment</td>
                                        <td class="px-4">:</td>
                                        <td>{{$f}}</td>
                                    </tr>
                                    <tr class="py-6">
                                        <td class="font-bold">evidence of transfer</td>
                                        <td class="px-4">:</td>
                                        <td align="center"><img src="{{ url('storage/'.$g) }}" class="img-thumbnail" style="width:80px; height:80px"/></td>
                                    </tr>
                                </table>
                            <!-- <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="status">
                                <option value="">-- Select --</option>
                                <option value="1">accept</option>
                                <option value="2">reject</option>
                            </select>
                            @error('status') <span class="text-red-500">{{ $message }}</span>@enderror -->
                        </div>
                    </div>
                </div>
    
                <div class="bg-gray-50 px- py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto px-2">
                        <button wire:click="CloseModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Cancel
                        </button>
                    </span>
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-cyan-400 px-4 py-2 bg-cyan-400 text-white leading-6 font-medium text-white-700 shadow-sm hover:text-white-500 focus:outline-none focus:border-cyan-700 hover:bg-cyan-700 focus:shadow-outline-cyan transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Claim
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>