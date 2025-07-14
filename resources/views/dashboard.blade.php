<x-app-layout>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0a0a1a, #12122b, #0a0a1a);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f8fafc;
        }

        .dashboard-container {
            min-height: 100vh;
            padding: 3rem 1rem;
            max-width: 1200px;
            margin: auto;
        }

        .dashboard-header h1 {
            font-size: 2.8rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #f8fafc;
        }

        .dashboard-header p {
            color: #94a3b8;
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .card-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .card-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .card {
            position: relative;
            background-color: #1a1a2e;
            border-radius: 1rem;
            padding: 2rem;
            overflow: hidden;
            z-index: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #1e3a8a;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            background-color: #1e1e3a;
        }

        .card h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #e2e8f0;
        }

        .card p {
            font-size: 0.95rem;
            color: #94a3b8;
        }

        .drawer-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 100;
            background: #1e3a8a;
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.5rem;
            border: 1px solid #3b82f6;
        }

        .drawer {
            position: fixed;
            top: 0;
            left: -260px;
            width: 240px;
            height: 100%;
            background-color: #0f172a;
            border-right: 1px solid #1e3a8a;
            padding: 2rem 1rem;
            transition: left 0.3s ease;
            z-index: 99;
            display: flex;
            flex-direction: column;
        }

        .drawer.open {
            left: 0;
        }

        .drawer-links {
            margin-top: 35%;
            display: flex;
            flex-direction: column;
        }

        .drawer a {
            display: block;
            margin-bottom: 1rem;
            color: #e0f2fe;
            background: #1e3a8a;
            padding: 0.7rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid #3b82f6;
        }

        .drawer a:hover {
            background: #1e40af;
        }
    </style>

    <!-- ☰ Toggle Button -->
    <div class="drawer-toggle" onclick="document.querySelector('.drawer').classList.toggle('open')">☰</div>

    <!-- 📗 Sidebar Drawer -->
    <div class="drawer">
        <div class="drawer-links">
            <a href="{{ url('/bookings/create') }}">➕ Create Booking</a>
            <a href="{{ url('/bookings') }}">📖 View Bookings</a>
            <a href="{{ url('/profile') }}">👥 User Management</a>
        </div>
    </div>

    <!-- 🔥 Main Dashboard -->
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>📗 Booking Dashboard</h1>
            <p>Manage your platform efficiently</p>
        </header>

        <section class="card-grid">
            <!-- Total Bookings -->
            <div class="card">
                <h2>📊 Total Bookings</h2>
                <p>You currently have <strong>{{ $totalBookings }}</strong> booking{{ $totalBookings !== 1 ? 's' : '' }}.</p>
            </div>

            <!-- Total Users -->
            <div class="card">
                <h2>👥 Total Users</h2>
                <p>There {{ $totalUsers === 1 ? 'is' : 'are' }} <strong>{{ $totalUsers }}</strong> registered user{{ $totalUsers !== 1 ? 's' : '' }}.</p>
            </div>
        </section>
    </div>

    <script>
        window.addEventListener('click', function (e) {
            const drawer = document.querySelector('.drawer');
            const toggle = document.querySelector('.drawer-toggle');
            if (!drawer.contains(e.target) && !toggle.contains(e.target)) {
                drawer.classList.remove('open');
            }
        });
    </script>
</x-app-layout>