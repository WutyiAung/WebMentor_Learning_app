<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="flex justify-center my-6">
        <a href="{{ route('home') }}">
            <img src="img/icon.png" alt="" class="w-40 h-20" style="color-white">
        </a>
    </div>
    
    <div class="max-w-sm mx-auto p-6 bg-black bg-opacity-70 shadow-lg rounded-lg">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-white font-bold" style="color:white"/>
                <x-text-input id="email" class="block mt-1 w-full h-12 text-lg bg-transparent text-blue-300 border-gray-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-blue-400 font-bold" style="color:white"/>
                <x-text-input id="password" class="block mt-1 w-full h-12 text-lg bg-transparent  border-gray-600"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded bg-transparent border-gray-600 text-indigo-400 focus:ring-indigo-400 focus:ring-offset-gray-800" name="remember" style="background: lightblue" >
                    <span class="ml-2 text-sm text-white font-bold">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-white font-bold hover:text-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400 focus:ring-offset-gray-800" href="{{ route('register') }}">
                    {{ __('Don\'t have an account? Register') }}
                </a>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white font-bold hover:text-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400 focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex justify-end mt-6">
                <x-primary-button class=" text-sm bg-indigo-500 hover:bg-indigo-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400 flex items-center justify-center " style="background:lightblue; color:black">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
            
            
        </form>
    </div>
</x-guest-layout>
