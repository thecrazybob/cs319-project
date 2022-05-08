<x-guest-layout>
    <x-jet-validation-errors class="mb-4" />

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <div class="flex min-h-screen">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <x-jet-authentication-card-logo />
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Or contact
                        <a href="mailto:help@bilheal.com" class="font-medium text-red-600 hover:text-red-500">
                            help@bilheal.com </a>
                        to register an account
                    </p>
                </div>

                <div class="mt-8">

                    <div class="w-full border-t border-gray-300"></div>


                    <div class="mt-6">
                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700">{{ __('Email address') }}</label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        :value="old('email')"
                                        value="{{\App\Models\User::where('staff', false)->first()->email}}"
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        value="password"
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember_me" name="remember" type="checkbox"
                                        class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                                    <label for="remember_me"
                                        class="ml-2 block text-sm text-gray-900">{{ __('Remember me') }}</label>
                                </div>

                                <div class="text-sm">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="font-medium text-red-600 hover:text-red-500">{{ __('Forgot your password?') }}</a>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                src="https://images.unsplash.com/photo-1583436959390-c6968f1356d1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80"
                alt="">
        </div>
    </div>

</x-guest-layout>
