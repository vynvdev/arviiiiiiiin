<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header">My Bookings</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-8 px-4">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($bookings->isEmpty())
            <div class="no-bookings">
                <p>You have no bookings yet. Click below to get started!</p>
            </div>
        @else
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y g:i A') }}</td>
                                <td>{{ $booking->notes ?? '-' }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('bookings.edit', $booking) }}" class="edit-btn">Edit</a>
                                    <form action="{{ route('bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="new-booking">
            <a href="{{ route('bookings.create') }}">+ New Booking</a>
        </div>
    </div>

    <style>
        .page-header {
            font-size: 2rem;
            font-weight: 700;
            color: #1a365d;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .alert-success {
            background-color: #2b6cb0;
            color: white;
            padding: 1rem;
            border-radius: 0.25rem;
            margin-bottom: 1.5rem;
            font-weight: bold;
            text-align: center;
        }

        .no-bookings {
            background: #ebf8ff;
            border: 1px solid #4299e1;
            padding: 2rem;
            border-radius: 0.25rem;
            text-align: center;
            color: #2b6cb0;
            font-size: 1.1rem;
        }

        .table-container {
            overflow-x: auto;
            background-color: #ffffff;
            border-radius: 0.25rem;
            border: 1px solid #e2e8f0;
            padding: 1rem;
            margin-top: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #1a202c;
            font-size: 0.95rem;
        }

        thead {
            background-color: #2c5282;
            color: white;
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        th, td {
            padding: 1rem;
            border-top: 1px solid #e2e8f0;
            text-align: left;
        }


        .action-buttons a,
        .action-buttons button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            font-size: 0.8rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            color: white;
            margin-right: 0.5rem;
        }

        .edit-btn {
            background-color: #3182ce;
        }

        .edit-btn:hover {
            background-color: #2c5282;
        }

        .delete-btn {
            background-color: #c53030;
        }

        .delete-btn:hover {
            background-color: #9b2c2c;
        }

        .new-booking {
            margin-top: 2.5rem;
            text-align: center;
        }

        .new-booking a {
            background-color: #2b6cb0;
            color: white;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 0.25rem;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .new-booking a:hover {
            background-color: #2c5282;
        }
    </style>
</x-app-layout>