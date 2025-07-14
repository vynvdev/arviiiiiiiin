<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #0a0a12;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
    }

    .login-container {
      background: rgba(10, 10, 20, 0.9);
      padding: 40px;
      width: 100%;
      max-width: 400px;
      border-radius: 12px;
      border: 1px solid #1a1a2e;
      box-shadow: 0 4px 12px rgba(0, 0, 30, 0.5);
    }

    h2 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 12px;
      color: #e0e0ff;
    }

    p.description {
      text-align: center;
      font-size: 14px;
      color: #a0a0c0;
      margin-bottom: 24px;
    }

    label {
      font-size: 14px;
      display: block;
      margin-bottom: 6px;
      color: #c0c0e0;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px 16px;
      border-radius: 8px;
      background-color: #151525;
      border: 1px solid #252538;
      color: #e0e0ff;
      margin-bottom: 16px;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #3a5a9a;
      outline: none;
    }

    .checkbox-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin-bottom: 20px;
      color: #a0a0c0;
    }

    .checkbox-container input[type="checkbox"] {
      margin-right: 6px;
    }

    .checkbox-container a {
      color: #4a7dff;
      text-decoration: none;
    }

    .checkbox-container a:hover {
      text-decoration: underline;
    }

    .submit-btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: bold;
      background: #1a3a8a;
      color: #fff;
      cursor: pointer;
      transition: background 0.2s ease;
    }

    .submit-btn:hover {
      background: #2248b0;
    }

    .footer-text {
      text-align: center;
      margin-top: 20px;
      font-size: 13px;
      color: #8080a0;
    }

    .footer-text a {
      color: #4a7dff;
      text-decoration: none;
      font-weight: bold;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    .session-status, .error-message {
      font-size: 13px;
      text-align: center;
      margin-bottom: 14px;
    }

    .session-status {
      color: #4aadff;
    }

    .error-message {
      color: #ff6b6b;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Welcome Back</h2>
    <p class="description">Please enter your credentials to sign in</p>

    <!-- Session Status -->
    @if (session('status'))
      <div class="session-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="you@example.com">
      @error('email')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required placeholder="••••••••">
      @error('password')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <div class="checkbox-container">
        <label><input type="checkbox" name="remember"> Remember me</label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">Forgot password?</a>
        @endif
      </div>

      <button type="submit" class="submit-btn">Log In</button>
    </form>

    <p class="footer-text">
      Don't have an account?
      <a href="{{ route('register') }}">Sign up</a>
    </p>
  </div>

</body>
</html>