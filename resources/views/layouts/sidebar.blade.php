<aside id="sidebar" class="lg:w-[22%] w-full lg:h-[100vh] pb-20 lg:pb-0 z-50 fixed top-[4rem] bg-[#2A3F54] lg:block hidden">
    <div class="navbar">
        <nav>
            <ul class="mt-5 text-[15px] leading-[3rem] cursor-pointer font-medium text-white text-center lg:text-start">
                <li class="hover:bg-gray-200 hover:text-[#2A3F54] w-full lg:w-[90%] cround duration-500 {{ Request::is('dashboard') ? 'bg-gray-200 w-full lg:w-[90%] cround text-[#2A3F54]' : '' }}"><a class="lg:ml-7" href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a></li>
                @can('view_permission')
                <li class="hover:bg-gray-200 hover:text-[#2A3F54] w-full lg:w-[90%] cround duration-500 {{ Request::is('permissions') ? 'bg-gray-200 w-full lg:w-[90%] cround text-[#2A3F54]' : '' }}"><a class="lg:ml-7" href="{{ route('permissions.index') }}"><i class="fa-solid fa-user-shield mr-2"></i>Permissions</a></li>
                @endcan
                @can('view_roles')
                <li class="hover:bg-gray-200 hover:text-[#2A3F54] w-full lg:w-[90%] cround duration-500 {{ Request::is('roles') ? 'bg-gray-200 w-full lg:w-[90%] cround text-[#2A3F54]' : '' }}"><a class="lg:ml-7" href="{{ route('roles.index') }}"><i class="fa-solid fa-gauge mr-2"></i>Roles</a></li>
                @endcan
                @can('view_users')
                <li class="hover:bg-gray-200 hover:text-[#2A3F54] w-full lg:w-[90%] cround duration-500 {{ Request::is('users') ? 'bg-gray-200 w-full lg:w-[90%] cround text-[#2A3F54]' : '' }}"><a class="lg:ml-7" href="{{ route('users.index') }}"><i class="fa-solid fa-user-group mr-2"></i>Users</a></li>
                @endcan
                @can('view_clients')
                <li class="hover:bg-gray-200 hover:text-[#2A3F54] w-full lg:w-[90%] cround duration-500 {{ Request::is('clients') ? 'bg-gray-200 w-full lg:w-[90%] cround text-[#2A3F54]' : '' }}"><a class="lg:ml-7" href="{{ route('clients.index') }}"><i class="fa-solid fa-clipboard-user mr-2"></i>Clients</a></li>
                @endcan
                @can('view_projects')
                <li class="hover:bg-gray-200 hover:text-[#2A3F54] w-full lg:w-[90%] cround duration-500 {{ Request::is('projects') ? 'bg-gray-200 w-full lg:w-[90%] cround text-[#2A3F54]' : '' }}"><a class="lg:ml-7" href="{{ route('projects.index') }}"><i class="fa-regular fa-rectangle-list mr-2"></i>Projects</a></li>
                @endcan
                @can('view_tasks')
                <li class="hover:bg-gray-200 hover:text-[#2A3F54] w-full lg:w-[90%] cround duration-500 {{ Request::is('tasks') ? 'bg-gray-200 w-full lg:w-[90%] cround text-[#2A3F54]' : '' }}"><a class="lg:ml-7" href="{{ route('tasks.index') }}"><i class="fa-solid fa-list-check mr-2"></i>Tasks</a></li>
                @endcan
                <li class="hover:bg-gray-200 hover:text-[#2A3F54] w-full lg:w-[90%] cround duration-500 {{ Request::is('todos') ? 'bg-gray-200 w-full lg:w-[90%] cround text-[#2A3F54]' : '' }}"><a class="lg:ml-7" href="{{ route('todos.index') }}"><i class="fa-regular fa-rectangle-list mr-2"></i>Todo List</a></li>
            </ul>
        </nav>
    </div>

    {{-- Profile --}}
    <div class="pt-4 pb-1 border-t border-gray-200 lg:hidden text-center text-white">
        <div class="px-4 space-y-4">
            <div class="font-medium text-base text-white">{{ Auth::user()->first_name }}</div>
            <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1 text-white text-center">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</aside>
 
 
 