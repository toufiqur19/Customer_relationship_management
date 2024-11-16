<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl flex justify-between items-center text-gray-800 leading-tight">
            {{ __('Clients Edit') }}
            <a href="{{ route('clients.index') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Back</a>
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('clients.update', $clients->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="flex space-x-5">
                            <!-- Contact Name -->
                            <div class="w-full">
                                <x-input-label for="contact_name" :value="__('Contact Name')" />
                                <x-text-input id="contact_name" class="block mt-1 w-full" type="text" name="contact_name" :value="old('contact_name', $clients->contact_name)" required autofocus autocomplete="contact_name" />
                                <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                            </div>
                            <!-- contact_email -->
                            <div class="w-full">
                            <x-input-label for="contact_email" :value="__('Contact Email')" />
                            <x-text-input id="contact_email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email', $clients->contact_email)" required autofocus autocomplete="contact_email" />
                            <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                           </div>
                        </div>
                
                        <div class="flex space-x-5 mt-5">
                            <!-- contact_phone -->
                            <div class="w-full">
                                <x-input-label for="contact_phone" :value="__('Contact Phone')" />
                                <x-text-input id="contact_phone" class="block mt-1 w-full" type="text" name="contact_phone" :value="old('contact_phone', $clients->contact_phone)" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('contact_phone')" class="mt-2" />
                            </div>
                            <!-- company_name -->
                            <div class="w-full">
                                <x-input-label for="company_name" :value="__('Company Name')" />
                                <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name', $clients->company_name)" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex space-x-5 mt-5">
                            <!-- company_address -->
                            <div class="w-full">
                                <x-input-label for="company_address" :value="__('Company Address')" />
                                <x-text-input id="company_address" class="block mt-1 w-full" type="text" name="company_address" :value="old('company_address', $clients->company_address)" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                            </div>
                            <!-- company_city -->
                            <div class="w-full">
                                <x-input-label for="company_city" :value="__('Company City')" />
                                <x-text-input id="company_city" class="block mt-1 w-full" type="text" name="company_city" :value="old('company_city', $clients->company_city)" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                            </div>
                        </div>
                
                        <div class="flex space-x-5 mt-5">
                            <!-- company_zip -->
                            <div class="w-full">
                                <x-input-label for="company_zip" :value="__('Company Zip')" />
                                <x-text-input id="company_zip" class="block mt-1 w-full" type="text" name="company_zip" :value="old('company_zip', $clients->company_zip)" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                            </div>
                            <!-- company_vat -->
                            <div class="w-full">
                                <x-input-label for="company_vat" :value="__('Company Vat')" />
                                <x-text-input id="company_vat" class="block mt-1 w-full" type="text" name="company_vat" :value="old('company_vat', $clients->company_vat)" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                            </div>
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
