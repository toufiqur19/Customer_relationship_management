<x-app-layout>
    @session('success')
    <script>
        successToast("{{ session('success') }}");
    </script>
    @endsession
    @session('error')
    <script>
        errorToast("{{ session('error') }}");
    </script>
    @endsession
    <x-slot name="header">
        <h2 class="font-semibold text-xl flex justify-between items-center text-gray-800 leading-tight">
            {{ __('Blogs') }}
            <a href="{{ route('blogs.create') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Create</a>
        </h2>
    </x-slot>

  
    <div class="py-5 px-10 lg:grid grid-cols-2 gap-4">
        @foreach ($blogs as $blog)
            <div class="p-6 bg-white rounded-md shadow cursor-pointer hover:bg-gray-200 hover:shadow-xl duration-500">
                <div class="py-1 mb-3">
                    <img src="{{ asset('uploads/posts/'.$blog->image) }}" class="w-[100%] h-[8rem]" alt="">
                </div>
                <div class="flex justify-between">
                    <h3 class="text-sm"><i class="fa-solid fa-user mr-1 text-[#2A3F54]"></i>{{ $blog->name }}</h3>
                    <p class="text-sm"><i class="fa-solid fa-calendar-days mr-1 text-[#2A3F54]"></i>{{  Carbon\Carbon::parse($blog->created_at)->format('d-M-Y') }}</p>
                </div>
                <div class="mt-3">
                    <h1 class="font-medium">{{ $blog->title }}</h1>
                    <p class="text-sm"><i class="fa-solid fa-tags mr-1 text-[#2A3F54]"></i>{{ implode(" ",$blog->tags) }}</p>
                    <li class="text-sm mt-2 text-justify">{{ Str::limit($blog->description, 100) }}</li>
                </div>

                <div class="action space-x-2 mt-5">
                    <a class="bg-green-600 text-white px-2 py-1 rounded-md text-md" href="{{ route('blogs.show',$blog) }}"><i class="fa-solid fa-eye"></i></a>
                    <a class="bg-green-600 text-white px-2 py-1 rounded-md text-md" href="{{ route('blogs.edit',$blog) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{  route('blogs.destroy', $blog) }}" method="POST" class="inline-block">
                        @method('DELETE')
                        @csrf
                        <button onclick="deleteData(event)" class="bg-red-600 text-white px-2 py-1 rounded-md text-sm" type="submit"><i class="fa-solid fa-trash-can"></i></button> 
                    </form>
                </div>
            </div>
        @endforeach

    </div>
   
</x-app-layout>
<script>
    let table = new DataTable('#myTable');
</script>
<script>
    function deleteData(){
        return confirm('Are you sure?');
    }
</script>