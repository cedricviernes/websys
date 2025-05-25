<x-guest-layout>
    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fef8f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 2rem 3rem;
            border-radius: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #ff6f61;
            margin: 0;
        }

        /* Form labels */
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #555;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            margin-top: 0.25rem;
            border-radius: 1.5rem;
            border: 1px solid #ccc;
            outline: none;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #ff6f61;
            box-shadow: 0 0 8px rgba(255,111,97,0.3);
        }

        /* Error messages */
        .error {
            color: #e74c3c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            margin-top: 1rem;
            color: #555;
        }

        .checkbox-label input[type="checkbox"] {
            margin-right: 0.75rem;
            accent-color: #ff6f61;
        }

        /* Buttons */
 .btn-primary {
            background-color: #ff6f61;
            color: #fff;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 2rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-primary:hover {
            background-color: #e65a50;
            transform: scale(1.02);
        }

        .forgot-link {
            font-size: 0.9rem;
            color: #777;
            text-decoration: underline;
            margin-top: 1rem;
            display: inline-block;
        }

        .session-status {
            text-align: center;
            margin-bottom: 1rem;
            color: #2ecc71;
        }
    </style>

    <!-- Your form layout -->
    <div class="container">
        <div class="header">
            <h2>Welcome Back!</h2>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="session-status" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="border-radius:1.5rem; border:1px solid #ccc; padding:0.75rem 1rem; width:100%;" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" style="border-radius:1.5rem; border:1px solid #ccc; padding:0.75rem 1rem; width:100%;" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="checkbox-label mt-4">
                <input id="remember_me" type="checkbox" style="width:20px; height:20px; accent-color:#ff6f61;" />
                <label for="remember_me">{{ __('Remember me') }}</label>
            </div>

            <!-- Actions -->
            <div class="mt-4" style="display:flex; justify-content:space-between; align-items:center;">
                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <button type="submit" class="btn-primary">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>