<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl flex justify-between items-center text-gray-800 leading-tight">
            {{ __('Permissions Create') }}
            <a href="{{ route('permissions.index') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Back</a>
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                
                        <!-- Name -->
                        <div class="w-[50%]">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="flex items-center mt-4">
                           <x-primary-button>
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
