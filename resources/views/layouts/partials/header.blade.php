<nav class="fixed z-30 w-full bg-primary text-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 text-gray-100 rounded cursor-pointer lg:hidden hover:text-gray-200 hover:bg-primary/80 focus:bg-primary/80 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-400 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <a href="{{ route('home') }}" class="flex ml-2 md:mr-24">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" class="h-8 mr-3" alt="FlowBite Logo">
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">{{ __('Portafolio') }}</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div>
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="user photo">
                            </button>
                        @else
                            <button class="" aria-expanded="false" data-dropdown-toggle="dropdown-2" >
                                {{ Auth::user()->name }}
                                <svg class="inline ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        @endif

                    </div>

                    <div class="z-50 hidden " id="dropdown-2" data-popper-placement="bottom">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ auth()->user()->email }}</div>
                            </li>
                            <li><hr class="dropdown-divider border-white/[0.08]"></li>
                            <li>
                                <a href="{{ route('profile.show') }}" class="dropdown-item hover:bg-white/5">
                                    {{ __('Profile') }}
                                </a>
                            </li>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <li>
                                    <a href="{{ route('api-tokens.index') }}" class="dropdown-item hover:bg-white/5" role="menuitem">
                                        {{ __('API Tokens') }}
                                    </a>
                                </li>
                            @endif
                            <li><hr class="dropdown-divider border-white/[0.08]"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="dropdown-item hover:bg-white/5">
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
