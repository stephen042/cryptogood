<x-layouts.auth>

    <!-- Form -->
    <div class="flex flex-col flex-1 w-full lg:w-1/2">
        <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
            <!-- Logo Section -->
            <div style="text-align:center; margin-bottom:20px;">
                <img src="{{ asset('assets/src/images/logo/favicon.png') }}" alt="Logo" width="80" height="80"
                    style="max-width:150px; display:inline-block;border-radius:50%;">
            </div>
            <div>
                <div class="mb-5 sm:mb-8">
                    <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                        Forgot Password
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Enter your email to receive a password reset link
                    </p>
                </div>
                <div>
                    <livewire:auth.forgot-password />
                    <div class="mt-5">
                        <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                            Or, return to
                            <a href="{{ route('login') }}"
                                class="text-brand-500 hover:text-brand-600 dark:text-brand-400" wire:navigate>Sign
                                in ?</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== Page Wrapper End ===== -->
</x-layouts.auth>