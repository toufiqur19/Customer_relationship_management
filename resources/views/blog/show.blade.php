<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl flex justify-between items-center text-gray-800 leading-tight">
            {{ __('Blogs Show') }}
            <a href="{{ route('blogs.index') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Back</a>
        </h2>
    </x-slot>

    <div class="px-5">
        <div class="py-8 px-8 bg-white rounded-md shadow cursor-pointer">
            <div class="py-1 mb-3">
                <img class="w-full h-full rounded-md" src="{{ asset('uploads/posts/'.$blog->image) }}" class="w-[100%] h-[8rem]" alt="">
            </div>
            <div class="flex justify-between">
                <h3 class="text-sm"><i class="fa-solid fa-user mr-1 text-[#2A3F54]"></i>{{ $blog->name }}</h3>
                <p class="text-sm"><i class="fa-solid fa-calendar-days mr-1 text-[#2A3F54]"></i>{{  Carbon\Carbon::parse($blog->created_at)->format('d-M-Y') }}</p>
            </div>
            <div class="mt-3">
                <h1 class="font-medium">{{ $blog->title }}</h1>
                <p class="text-sm"><i class="fa-solid fa-tags mr-1 text-[#2A3F54]"></i>{{ implode(" ",$blog->tags) }}</p>
                <p class="text-sm mt-2 text-justify">{{ $blog->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>