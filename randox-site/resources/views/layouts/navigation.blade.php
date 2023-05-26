<nav x-data="{ open: false }" class="bg-slate-50 border-b lg:w-[30%] lg:min-h-screen border-gray-100 dark:border-gray-700">
    <!-- Settings Dropdown -->
    <div class="hidden bg-black rounded-b-lg sm:flex w-[80%] m-auto sm:items-center">
        <a href="{{  route('profile.edit') }}">Edit profil</a>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl lg:max-w-none lg:h-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 lg:h-full lg:flex-col">
            <div class="flex lg:flex-col">
                <!-- Logo -->
                <div class="shrink-0 flex items-center lg:flex-col lg:my-7 ">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 lg:space-x-0 lg:space-y-6 sm:-my-px sm:ml-10 sm:flex lg:m-0 lg:flex-col">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
                        {{ __('Utilisateurs') }}
                    </x-nav-link>
                    <x-nav-link :href="route('subscription')" :active="request()->routeIs('subscription')">
                        {{ __('Abonnements') }}
                        <x-nav-link :href="route('posts')" :active="request()->routeIs('posts')">
                            {{ __('Articles') }}
                        </x-nav-link>
                    </x-nav-link>
                </div>
                {{--                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">--}}
                {{--                    <x-nav-link :href="route('/')">--}}
                {{--                        {{ __('Voir le site') }}--}}
                {{--                    </x-nav-link>--}}
                {{--                </div>--}}


            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users')" :active="request()->routeIs('users')">
                {{ __('Utilisateurs') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('subscription')" :active="request()->routeIs('subscription')">
                {{ __('Abonnements') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('posts')" :active="request()->routeIs('posts')">
                {{ __('Articles') }}
            </x-responsive-nav-link>
        </div>


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
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
    </div>
</nav>
