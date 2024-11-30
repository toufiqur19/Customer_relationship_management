<nav x-data="{ open: false }" class="bg-[#2A3F54] z-50 fixed top-0 inset-x-0 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 px-5 lg:px-0">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                       <h1 class="text-[1.3rem] font-bold text-white"><i class="fa-solid fa-wand-magic-sparkles mr-1"></i>SmartTrackCRM</h1>
                    </a>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center lg:hidden">
                <i id="toggleSidebar" class="fa-solid fa-bars-staggered text-white font-bold text-2xl"></i>
                <i id="closeSidebar" class="fa-solid fa-xmark text-white font-bold text-2xl hidden"></i>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="">
                    <div id="notification_icon" class="text-white cursor-pointer pr-3">
                        <i class="fa-solid fa-bell relative"></i>
                        <span class="absolute flex items-center justify-center w-1 h-1 p-2 ml-[5px] top-[16px] text-xs bg-red-600 rounded-full">{{ auth()->user()->unreadNotifications->count() }}</span>
                    </div>
                    <div id="notification" class="absolute hidden top-[4.3rem] bg-white shadow-md right-32 text-[#2A3F54] rounded-md">
                        @foreach(auth()->user()->notifications as $notification)
                            <ul class="cursor-pointer border-b border-gray-200 py-2 px-5 hover:bg-gray-200 duration-500">
                                <a class="{{ $notification->read_at ? 'text-gray-400' : 'text-gray-900' }}" href="{{ route('markAsRead', $notification->id) }}">{{ $notification->data['company_name'] }}</a>   
                            </ul>   
                        @endforeach
                    </div>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->first_name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>

@section('script')
<script>
    const notification = document.getElementById('notification');
    const notification_icon = document.getElementById('notification_icon');

    notification_icon.addEventListener('click', () => {
        notification.classList.toggle('hidden');
    });
</script>
@endsection
