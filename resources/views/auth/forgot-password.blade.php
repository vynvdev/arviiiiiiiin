<x-guest-layout>
    <style>
        body {
            background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
            color: #e5e7eb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-container {
            background: rgba(31, 41, 55, 0.8);
            border: 1px solid #1e3a8a;
            border-radius: 0.5rem;
            padding: 2rem;
            max-width: 400px;
            margin: 3rem auto;
        }

        .label {
            font-weight: 600;
            color: #3b82f6;
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type="email"] {
            background: rgba(17, 24, 39, 0.8);
            border: 1px solid #1e40af;
            border-radius: 0.25rem;
            padding: 0.75rem;
            width: 100%;
            color: #fff;
            outline: none;
        }

        input[type="email"]:focus {
            border-color: #3b82f6;
        }

        .btn {
            background: #1e40af;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .btn:hover {
            background: #1e3a8a;
        }

        .description {
            margin-bottom: 1rem;
            color: #9ca3af;
            text-align: center;
        }
    </style>

    <div class="form-container">
        <div class="description text-sm">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="label">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>