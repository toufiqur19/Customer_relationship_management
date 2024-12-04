<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl flex justify-between items-center text-gray-800 leading-tight">
            {{ __('Blogs Create') }}
            <a href="{{ route('blogs.index') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Back</a>
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                        @csrf
                
                        <div class="flex space-x-5">
                            <!-- title -->
                            <div class="w-full">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <!-- Name -->
                            <div class="w-full">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                           </div>
                        </div>

                        <div class="flex space-x-5 mt-5">
                            <!-- tags -->
                            <div class="w-full">
                                <x-input-label for="tags" :value="__('Tags')" />
                                <x-text-input id="input" class="block mt-1 w-full" type="text" name="tags[]" :value="old('tags')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                            </div>
                            <!-- published_at -->
                            <div class="w-full">
                                <x-input-label for="published_at" :value="__('Published At')" />
                                <x-text-input id="published_at" class="block mt-1 w-full" type="date" name="published_at" :value="old('published_at')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                            </div>
                        </div>
                
                        <div class="flex space-x-5 mt-5">
                            <!-- Description -->
                            <div class="w-full">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="block mt-1 w-full rounded-md border-gray-300" name="description" id="" >{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <!-- Category -->
                            <div class="w-full">
                                <x-input-label for="category" :value="__('Category')" />
                                <select name="category" id="category" class="block w-full rounded-md border-gray-300">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>
                        </div>
                        <!-- Image -->
                        <div class="w-full mt-5">
                            <x-input-label for="image" :value="__('Image')" />
                            <input type="file" name="image">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
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
<script>
    $("#input").tagsinput();
</script>
