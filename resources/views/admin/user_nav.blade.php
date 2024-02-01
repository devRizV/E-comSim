<div class="dropdown">
    <!-- Settings Dropdown -->
    <div class="ml-3 dropdown">
        <a href="#" id="dropdownMenuButton" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            @else
                {{ Auth::user()->name }}
            @endif
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- Account Management -->
            <div class="dropdown-item">
                {{ __('Manage Account') }}
            </div>

            <a class="dropdown-item" href="{{ route('profile.show') }}">
                {{ __('Profile') }}
            </a>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                    {{ __('API Tokens') }}
                </a>
            @endif

            <div class="dropdown-divider"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item" type="submit">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover-bg-gray-100 focus:outline-none focus-bg-gray-100 focus-text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
