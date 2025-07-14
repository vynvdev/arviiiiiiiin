<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">
            Notifications
        </h2>
    </x-slot>

    <style>
        body {
            background-color: #0a0a1a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .text-white {
            color: #ffffff;
            text-align: center;
            margin-bottom: 30px;
        }

        .clear-button {
            background-color: #1a237e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .clear-button:hover {
            background-color: #0d47a1;
        }

        .notification-card {
            background: linear-gradient(135deg, #0d0d2b, #1a1a40);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            color: white;
            border: 1px solid #2d2d5a;
        }

        .notification-card h3 {
            font-size: 1.25rem;
            margin-bottom: 5px;
            color: #e6e6ff;
        }

        .notification-card p {
            margin: 3px 0;
            color: #b3b3ff;
        }

        .action-buttons button {
            background: none;
            border: none;
            font-size: 0.9rem;
            color: #7aa7ff;
            cursor: pointer;
            text-decoration: underline;
            margin-right: 15px;
        }

        .action-buttons button:hover {
            color: #4d8eff;
        }

        .delete-btn {
            color: #ff7d7d;
        }

        .delete-btn:hover {
            color: #ff5252;
        }

        .success-alert {
            background: #1b5e20;
            color: white;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .no-notif {
            color: #7a7aff;
            text-align: center;
            margin-top: 30px;
            font-size: 1.1rem;
        }
    </style>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('notifications.clear') }}">
            @csrf
            <button type="submit" class="clear-button mb-6">
                Clear All Notifications
            </button>
        </form>

        @forelse ($notifications as $notification)
            <div class="notification-card">
                <h3>{{ $notification->data['title'] }}</h3>
                <p>📅 {{ $notification->data['booking_date'] }}</p>
                <p>📝 {{ $notification->data['notes'] }}</p>

                <div class="action-buttons mt-3">
                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}" class="inline">
                        @csrf
                        <button>✔ Mark as Read</button>
                    </form>

                    <form method="POST" action="{{ route('notifications.delete', $notification->id) }}" class="inline ml-2">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn">🗑 Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="no-notif">No notifications found.</p>
        @endforelse
    </div>
</x-app-layout>