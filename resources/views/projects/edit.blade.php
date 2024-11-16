<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl flex justify-between items-center text-gray-800 leading-tight">
            {{ __('Project Create') }}
            <a href="{{ route('projects.index') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Back</a>
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('projects.update', $project) }}">
                        @csrf
                        @method('PUT')
                
                        <div class="flex space-x-5">
                            <!-- Title -->
                            <div class="w-full">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $project->title)" required autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <!-- description -->
                            <div class="w-full">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea name="description" class="block mt-1 w-full rounded-md border-gray-300" id="description">{{ old('description', $project->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                           </div>
                        </div>
                
                        <div class="flex space-x-5 mt-5">
                            <!-- deadline_at -->
                            <div class="w-full">
                                <x-input-label for="deadline_at" :value="__('Deadline')" />
                                <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at" :value="old('deadline_at', $project->deadline_at)" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                            </div>
                            <!-- Assigned users -->
                            <div class="w-full">
                                <x-input-label for="user_id" :value="__('Assigned Users')" />
                                <select name="user_id" id="user_id" class="block w-full rounded-md border-gray-300">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @selected(old('user_id', $project->user_id) == $user->id)>{{ $user->first_name.' '.$user->last_name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex space-x-5 mt-5">
                            <!-- Assigned clients -->
                            <div class="w-full">
                                <x-input-label for="client_id" :value="__('Clients')" />
                                <select name="client_id" id="client_id" class="block w-full rounded-md border-gray-300">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" @selected(old('client_id', $project->client_id) == $client->id)>{{ $client->company_name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                            </div>
                            <!-- Project Status -->
                            <div class="w-full">
                                <x-input-label for="status" :value="__('Project Status')" />
                                <select name="status" id="status" class="block w-full rounded-md border-gray-300">
                                    @foreach (\App\ProjectStatus::cases() as $status)
                                        <option value="{{ $status->value }}" @selected(old('status', $project->status->value) == $status->value)>{{ $status->value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
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
