<nav x-data="{ open: false }">
    <style>
        nav {
            background: #0a0a1a;
            border-bottom: 1px solid #1e3a8a;
            position: relative;
            z-index: 10;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .nav-left, .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-right {
            gap: 1rem;
        }

        .nav-logo svg {
            height: 40px;
            fill: #fff;
        }

        .nav-link {
            color: #e5e7eb;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0.75rem;
            border-radius: 4px;
            transition: background-color 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link:hover {
            background-color: #1e3a8a;
        }

        .nav-user-name {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
        }

        .hamburger {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            color: white;
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .nav-left > .nav-link,
            .nav-right {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .mobile-menu {
                display: flex;
                flex-direction: column;
                background: #0a0a1a;
                padding: 1rem;
                gap: 0.5rem;
                border-top: 1px solid #1e3a8a;
            }
            
            .mobile-menu .nav-link {
                padding: 0.75rem 1rem;
            }
        }
    </style>

    @php
        $unreadCount = Auth::user()->unreadNotifications->count();
    @endphp

    <!-- Top Navigation -->
    <div class="nav-container">
        <!-- Left Side -->
        <div class="nav-left">
            <a href="{{ route('dashboard') }}" class="nav-logo">
                <x-application-logo />
            </a>

            <a href="{{ route('dashboard') }}" class="nav-link">
                {{ __('Dashboard') }}
            </a>
        </div>

        <!-- Right Side -->
        <div class="nav-right">
            <span class="nav-user-name">
                👤 {{ Auth::user()->name }}
            </span>

            <!-- Notifications -->
            <a href="{{ route('notifications') }}" class="nav-link">
                🔔 Notifications
                @if ($unreadCount > 0)
                    <span class="bg-blue-600 text-white text-xs px-1.5 py-0.5 rounded-full ml-1">
                        {{ $unreadCount }}
                    </span>
                @endif
            </a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                   class="nav-link"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>

        <!-- Hamburger Icon -->
        <button @click="open = !open" class="hamburger">
            ☰
        </button>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="open" class="mobile-menu">
        <span class="nav-user-name">👤 {{ Auth::user()->name }}</span>

        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>

        <a href="{{ route('notifications') }}" class="nav-link">
            🔔 Notifications
            @if ($unreadCount > 0)
                <span class="bg-blue-600 text-white text-xs px-1.5 py-0.5 rounded-full ml-1">
                    {{ $unreadCount }}
                </span>
            @endif
        </a>

        <a href="{{ route('profile.edit') }}" class="nav-link">Profile</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
               class="nav-link"
               onclick="event.preventDefault(); this.closest('form').submit();">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                </svg>
                {{ __('Log Out') }}
            </a>
        </form>
    </div>
</nav>