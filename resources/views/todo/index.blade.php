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
            {{ __('Todos') }}
            <a href="{{ route('todos.create') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Create</a>
        </h2>
    </x-slot>

    <div class="py-5 px-10 lg:grid grid-cols-2 gap-4">
        @foreach ($todos as $todo)
            <div class="p-6 bg-white rounded-md shadow cursor-pointer hover:bg-gray-200 duration-500">
                <div class="border-b-2 border-gray-300 py-1 mb-3">
                    <h1 class="font-medium">{{ $todo->name }}</h1>
                </div>
                <h3>{{ $todo->title }}</h3>
                <li class="text-sm mt-1">{{ $todo->description }}</li>

                <div class="mt-4 flex justify-between">
                    <p><i class="fa-solid fa-calendar-days mr-1"></i>{{  $todo->due_date }}</p>
                    <div>
                        <a class="bg-green-600 text-white px-2 py-1 rounded-md" href="{{ route('todos.edit', $todo) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="bg-green-600 text-white px-2 py-1 rounded-md" href="{{ route('delete', $todo) }}"><i class="fa-regular fa-circle-check"></i></a>
                        <a class="bg-red-600 text-white px-2 py-1 rounded-md" href="{{ route('delete', $todo) }}"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

<script>
</script>