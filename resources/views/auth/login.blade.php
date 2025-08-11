<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Nomor Telepon -->
        <div>
            <x-input-label for="telepon" :value="__('Nomor Telepon')" />
            <x-text-input id="telepon" class="block mt-1 w-full" type="text" name="telepon" :value="old('telepon')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Captcha -->
        <div class="mt-4">
            <x-input-label for="captcha" :value="__('Captcha')" />
            <x-text-input id="captcha" class="block mt-1 w-full" type="text" name="captcha" required autocomplete="off" />
            <p class="text-sm text-gray-600 mt-1">Masukkan kode: <strong>{{ session('captcha_login') }}</strong></p>
            <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        {{-- <div class="mt-4">
    <a href="{{ route('google.login') }}"
       class="w-full flex items-center justify-center bg-red-500 text-white p-2 rounded hover:bg-red-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 48 48">
            <path fill="#EA4335" d="M24 9.5c3.54 0 6.7 1.22 9.19 3.6l6.85-6.85C35.34 2.38 29.99 0 24 0 14.64 0 6.4 5.64 2.56 13.77l7.94 6.18C12.22 13.35 17.61 9.5 24 9.5z"/>
            <path fill="#4285F4" d="M46.08 24.55c0-1.52-.14-2.99-.4-4.41H24v8.36h12.44c-.54 2.91-2.14 5.37-4.56 7.01l7.14 5.53C43.34 37.3 46.08 31.4 46.08 24.55z"/>
            <path fill="#FBBC05" d="M10.5 28.82c-1.09-3.17-1.09-6.56 0-9.73l-7.94-6.18C.88 17.93 0 20.9 0 24s.88 6.07 2.56 8.09l7.94-6.18z"/>
            <path fill="#34A853" d="M24 48c6.48 0 11.92-2.14 15.89-5.82l-7.14-5.53C30.59 38.82 27.44 39.5 24 39.5c-6.39 0-11.78-3.85-13.5-9.45l-7.94 6.18C6.4 42.36 14.64 48 24 48z"/>
        </svg>
        Login dengan Google
    </a>
</div> --}}

    </form>
</x-guest-layout>
