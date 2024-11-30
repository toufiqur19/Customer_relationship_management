<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl flex justify-between items-center text-gray-800 leading-tight">
            {{ __('Todo Create') }}
            <a href="{{ route('todos.index') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Back</a>
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('todos.update', $todos) }}">
                        @csrf
                        @method('PUT')
                        <div class="flex space-x-5">
                            <!-- Name -->
                            <div class="w-full">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $todos->name)" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <!-- Title -->
                            <div class="w-full">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $todos->title)" required autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            
                        </div>
                
                        <div class="flex space-x-5 mt-5">
                            <!-- description -->
                            <div class="w-full">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea name="description" class="block mt-1 w-full rounded-md border-gray-300" id="description">{{ old('description', $todos->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <!-- Due Date -->
                            <div class="w-full">
                                <x-input-label for="due_date" :value="__('Due Date')" />
                                <x-text-input id="due_date" class="block mt-1 w-full" type="date" name="due_date" :value="old('due_date',$todos->due_date)" required autofocus autocomplete="due_date" />
                                <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
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
