<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
    body {
        background: linear-gradient(135deg, #0a0a0a, #0f172a, #1e3a8a);
        color: #e5e7eb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-wrapper {
        max-width: 700px;
        margin: 3rem auto;
        background: rgba(15, 23, 42, 0.8);
        padding: 2rem;
        border-radius: 1rem;
        border: 1px solid rgba(100, 116, 139, 0.3);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 2rem;
        font-weight: bold;
        color: #60a5fa;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: #e2e8f0;
        font-weight: 600;
    }

    input[type="text"],
    input[type="datetime-local"],
    textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        background: rgba(15, 23, 42, 0.7);
        border: 1px solid rgba(100, 116, 139, 0.5);
        border-radius: 0.5rem;
        color: #f9fafb;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: #3b82f6;
    }

    .submit-btn {
        background: linear-gradient(to right, #1e40af, #1e3a8a);
        color: white;
        padding: 0.75rem 1.5rem;
        font-weight: bold;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        float: right;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background: linear-gradient(to right, #1e3a8a, #1e40af);
    }

    .flatpickr-calendar {
        background-color: #0f172a !important;
        color: #f8fafc !important;
        border-radius: 1rem;
        padding: 0.5rem;
        border: 1px solid #1e40af;
    }

    .flatpickr-months,
    .flatpickr-weekdays,
    .flatpickr-month,
    .flatpickr-current-month,
    .flatpickr-weekday {
        color: #f8fafc !important;
        font-weight: 600;
    }

    .flatpickr-day {
        color: #f8fafc !important;
        font-weight: 500;
        border-radius: 6px;
    }

    .flatpickr-day:hover {
        background: rgba(59, 130, 246, 0.2) !important;
    }

    .flatpickr-day.selected,
    .flatpickr-day.startRange,
    .flatpickr-day.endRange {
        background: #1e40af !important;
        color: white !important;
        font-weight: bold;
    }

    .flatpickr-time input,
    .flatpickr-time {
        background-color: #0f172a;
        color: #f8fafc !important;
        border: none;
        border-radius: 6px;
    }

    .error-box {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid #ef4444;
        color: #f87171;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
    }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-200 leading-tight">
            📅 Create Booking
        </h2>
    </x-slot>

    <div class="min-h-screen py-12 px-4">
        <div class="form-wrapper">
            <h1 class="form-title">📅 Create Booking</h1>

            @if ($errors->any())
                <div class="error-box">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <!-- Title -->
                <div class="mb-4">
                    <label for="title">Booking Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="e.g. Conference Room"
                    >
                </div>

                <!-- Booking Date & Time -->
                <div class="mb-6">
                    <label for="booking_date">📅 Booking Date & Time</label>
                    <input type="hidden" name="booking_date" id="booking_date">
                    <div id="calendarBox" class="rounded-2xl mt-4"></div>
                </div>

                <!-- Notes -->
                <div class="mb-6">
                    <label for="notes">Notes (Optional)</label>
                    <textarea
                        name="notes"
                        id="notes"
                        rows="4"
                        placeholder="Add any extra notes..."
                    >{{ old('notes') }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit" class="submit-btn">➕ Submit Booking</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    flatpickr("#calendarBox", {
        inline: true,
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        defaultDate: new Date(),
        time_24hr: false,
        minuteIncrement: 1,
        onChange: function(selectedDates, dateStr, instance) {
            document.getElementById("booking_date").value = dateStr;
        }
    });
    </script>
</x-app-layout>