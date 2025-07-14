<x-guest-layout>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0a0f, #12121a, #0a0a0f);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        form {
            background-color: #1a1a24;
            padding: 2rem;
            border-radius: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 420px;
            border: 1px solid #2a2a3a;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            color: #e0e0e0;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.25rem;
            background-color: #252535;
            color: #fff;
            border: 1px solid #3a3a4a;
            border-radius: 0.6rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #4a6bff;
            outline: none;
        }

        .error {
            color: #ff6b6b;
            font-size: 0.85rem;
            margin-top: -1rem;
            margin-bottom: 1rem;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .form-footer a {
            font-size: 0.9rem;
            color: #a0a0c0;
            text-decoration: none;
        }

        .form-footer a:hover {
            color: #4a6bff;
            text-decoration: underline;
        }

        button {
            background: linear-gradient(135deg, #1a2a6c, #004a8f);
            color: white;
            padding: 0.7rem 1.4rem;
            border: none;
            border-radius: 0.6rem;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #1e3288, #0060b0);
            transform: scale(1.02);
        }
    </style>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @if ($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Email Address -->
        <div>
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @if ($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @if ($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            @if ($errors->has('password_confirmation'))
                <div class="error">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>

        <!-- Footer -->
        <div class="form-footer">
            <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
            <button type="submit">{{ __('Register') }}</button>
        </div>
    </form>
</x-guest-layout>