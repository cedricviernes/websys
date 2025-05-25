<x-guest-layout>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fef8f6;
            margin: 0;
            padding: 0;
        }

        .miniso-container {
            background-color: #fff;
            padding: 2rem 3rem;
            border-radius: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
            margin: 3rem auto;
        }

        .miniso-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .miniso-header h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #ff6f61;
            margin: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
        }

        .form-group input {
            border-radius: 1.5rem;
            border: 1px solid #ccc;
            padding: 0.75rem 1rem;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus {
            border-color: #ff6f61;
            box-shadow: 0 0 8px rgba(255,111,97,0.3);
        }

        .form-error {
            color: #e74c3c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .miniso-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .miniso-link {
            font-size: 0.9rem;
            color: #777;
            text-decoration: underline;
        }

        .miniso-button {
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

        .miniso-button:hover {
            background-color: #e65a50;
            transform: scale(1.02);
        }
    </style>

    <div class="miniso-container">
        <div class="miniso-header">
            <h2>Create Account</h2>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="mt-1 w-full" />
                <x-input-error :messages="$errors->get('name')" class="form-error" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="mt-1 w-full" />
                <x-input-error :messages="$errors->get('email')" class="form-error" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" class="mt-1 w-full" />
                <x-input-error :messages="$errors->get('password')" class="form-error" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="mt-1 w-full" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="form-error" />
            </div>

            <div class="miniso-actions mt-4">
                <a class="miniso-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="miniso-button">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
