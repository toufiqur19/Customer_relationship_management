<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl flex justify-between items-center text-gray-800 leading-tight">
            {{ __('Users') }}
            <a href="{{ route('users.create') }}" class="float-right bg-[#2A3F54] text-[#fff] px-4 py-2 rounded-md font-normal text-sm">Create</a>
        </h2>
    </x-slot>

    <div class="-z-40">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr class="font-semibold">
                                    <th scope="col" class="px-6 py-3">
                                        First Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Last Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-2">
                                        {{ $user->first_name }}
                                    </th>
                                    <td class="px-6 py-2">
                                        {{ $user->last_name }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-2 flex gap-2">
                                        <a class="bg-green-600 text-white px-2 py-1 rounded-md" href="{{ route('users.edit',$user) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{  route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline-block">
                                           @method('DELETE')
                                           @csrf
                                           <button class="bg-red-600 text-white px-2 py-1 rounded-md" type="submit"><i class="fa-solid fa-trash-can"></i></button> 
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-5">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>