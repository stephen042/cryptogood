<x-layouts.auth>
    <!-- Form -->
    <div class="flex flex-col flex-1 w-full lg:w-1/2 mb-10">
        <div class="w-full max-w-md pt-5 mx-auto sm:py-10">
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
            <div class="mb-5 sm:mb-8">
                <center>
                    <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                        Request A Call Back
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-100">
                        Enter the required details below to get a call back from our Team.
                    </p>
                </center>

            </div>
            <div>
                <livewire:auth.register />
                <div class="mt-5">
                    <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-brand-500 hover:text-brand-600 dark:text-brand-400"
                            wire:navigate>Sign
                            In</a>
                    </p>
                </div>
            </div>
            <hr class="my-10 border-gray-200 dark:border-gray-800" />
            <br>
        </div>
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script>
        window.addEventListener('reload-after-success', () => {
        setTimeout(() => {
            location.reload();
        }, 4000); // 4 seconds
    });
    </script>

</x-layouts.auth>