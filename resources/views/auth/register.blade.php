<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-center my-6 mt-3">
            <a href="{{ route('home') }}">
                <img src="img/icon.png" alt="Logo" class="w-40 h-20">
            </a>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-700" style="color:white"/>
            <x-text-input id="name" class="block mt-1 w-full bg-gray-100 border-gray-300 rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-700" style="color:white" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-100 border-gray-300 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Profile Image -->
        {{-- <div class="mt-4">
            <x-input-label for="image" :value="__('Profile Image')" class="text-gray-700" />
            <x-text-input id="image" class="block mt-1 w-full bg-gray-100 border-gray-300 rounded-md shadow-sm" type="file" name="image" accept="image/*" />
            <x-input-error :messages="$errors->get('image')" class="mt-2 text-red-600" />
        </div> --}}

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700" style="color:white" />
            <x-text-input id="password" class="block mt-1 w-full bg-gray-100 border-gray-300 rounded-md shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700" style="color:white" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-100 border-gray-300 rounded-md shadow-sm"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
