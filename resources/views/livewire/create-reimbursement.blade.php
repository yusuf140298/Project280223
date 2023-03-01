<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Form Submission Of Funds
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-80 sm:px-12 md:px-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div>
                @if(session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <form wire:submit.prevent="submit" class="w-100 px-6 py-3" enctype="multipart/form-data">
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" />
                    @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mt-4">
                    <x-label for="cost" value="{{ __('Cost') }}" />
                    <x-input id="cost" class="block mt-1 w-full" type="text" name="cost" wire:model="cost" />
                    @error('cost') <span class="text-red-500">{{ $message }}</span>@enderror
                    
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