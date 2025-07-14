<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            ✨ Edit Booking
        </h2>
    </x-slot>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @push('styles')
    <style>
    .form-container {
        background: #0a192f;
        border-radius: 8px;
        padding: 2rem;
        border: 1px solid #1e3a8a;
        max-width: 700px;
        margin: 2rem auto;
        color: #e5e7eb;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: #93c5fd;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #1e3a8a;
        background-color: #0f172a;
        color: #e5e7eb;
        margin-bottom: 1.5rem;
        box-sizing: border-box;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: #3b82f6;
    }

    .calendar-wrapper {
        width: 100%;
        margin-bottom: 1.5rem;
    }

    #calendarBox {
        width: 100%;
        background-color: #0f172a;
        border-radius: 8px;
        padding: 1rem;
        border: 1px solid #1e3a8a;
        box-sizing: border-box;
    }

    .submit-button {
        background: #1e3a8a;
        color: white;
        padding: 12px 28px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .submit-button:hover {
        background: #3b82f6;
    }

    .back-link {
        font-size: 0.9rem;
        color: #93c5fd;
        text-decoration: none;
        transition: 0.3s;
    }

    .back-link:hover {
        color: #e5e7eb;
        text-decoration: underline;
    }

    /* Flatpickr custom theme */
    .flatpickr-calendar {
        background-color: #0f172a !important;
        color: #e5e7eb !important;
        border: 1px solid #1e3a8a;
    }

    .flatpickr-months,
    .flatpickr-weekdays,
    .flatpickr-month,
    .flatpickr-current-month,
    .flatpickr-weekday,
    .flatpickr-time,
    .flatpickr-time input {
        color: #e5e7eb !important;
        font-weight: 500;
    }

    .flatpickr-day {
        color: #e5e7eb !important;
    }

    .flatpickr-day.today {
        background: #1e3a8a !important;
        color: #fff !important;
        border-color: #3b82f6;
    }

    .flatpickr-day.selected,
    .flatpickr-day.startRange,
    .flatpickr-day.endRange {
        background: #1e3a8a !important;
        color: white !important;
        font-weight: bold;
        border-color: #3b82f6;
    }

    .flatpickr-day:hover {
        background-color: #1e3a8a !important;
        color: white !important;
    }

    /* Date and Time Inputs */
    input[type="date"],
    input[type="time"],
    .flatpickr-input {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #1e3a8a;
        background-color: #0f172a;
        color: #e5e7eb;
        font-size: 14px;
        margin-bottom: 1.5rem;
        box-sizing: border-box;
        transition: 0.3s ease;
    }

    input[type="date"]:focus,
    input[type="time"]:focus,
    .flatpickr-input:focus {
        outline: none;
        border-color: #3b82f6;
    }

    input::placeholder {
        color: #93c5fd;
    }
    </style>
    @endpush

    <div class="form-container">
        @if ($errors->any())
            <div class="bg-red-900 text-white p-4 mb-4 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title', $booking->title) }}" required>
            </div>

            <div>
                <label for="calendarBox">Booking Date & Time</label>
                <div class="calendar-wrapper">
                    <div id="calendarBox"></div>
                </div>
                <input type="hidden" name="booking_date" id="booking_date"
                       value="{{ old('booking_date', \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d H:i')) }}">
            </div>

            <div>
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" rows="4">{{ old('notes', $booking->notes) }}</textarea>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('bookings.index') }}" class="back-link">← Back to list</a>
                <button type="submit" class="submit-button">Update Booking</button>
            </div>
        </form>
    </div>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#calendarBox", {
            inline: true,
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            defaultDate: "{{ old('booking_date', \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d H:i')) }}",
            time_24hr: false,
            minuteIncrement: 1,
            onChange: function(selectedDates, dateStr, instance) {
                document.getElementById("booking_date").value = dateStr;
            }
        });
    </script>
</x-app-layout>