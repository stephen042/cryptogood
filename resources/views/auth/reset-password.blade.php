<x-layouts.auth>
    <!-- Page Wrapper -->
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
                        Reset Password
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Enter your new password
                    </p>
                </div>

                <!-- Livewire Component -->
                <livewire:auth.reset-password :token="request()->route('token')" />
            </div>
        </div>
    </div>
</x-layouts.auth>