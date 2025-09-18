<x-layouts.auth>

    <!-- Form -->
    <div class="flex flex-col flex-1 w-full lg:w-1/2">
        <div class="w-full max-w-md pt-10 mx-auto">
            @auth
            <a href="{{ route('app.dashboard') }}"
                class="inline-flex items-center text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewbox="0 0 20 20" fill="none">
                    <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
                Back to dashboard
            </a>
            @endauth

        </div>
        <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
            <!-- Logo Section -->
            <div style="text-align:center; margin-bottom:20px;">
                <img src="{{ asset('assets/src/images/logo/favicon.png') }}" alt="Logo" width="80" height="80"
                    style="max-width:150px; display:inline-block;border-radius:50%;">
            </div>
            <div>
                <div class="mb-5 sm:mb-8">
                    <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                        Sign In
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Enter your email and password to sign in!
                    </p>
                </div>
                <div>
                    <livewire:auth.login />
                    <div class="mt-5">
                        <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                            Don't have an account?
                            <a href="{{ route('register') }}"
                                class="text-brand-500 hover:text-brand-600 dark:text-brand-400" wire:navigate>Sign
                                Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== Page Wrapper End ===== -->
</x-layouts.auth>