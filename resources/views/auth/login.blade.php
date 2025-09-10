<x-layouts.auth>
    <!-- ===== Page Wrapper Start ===== -->
    <div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
        <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
            <!-- Form -->
            <div class="flex flex-col flex-1 w-full lg:w-1/2">
                <div class="w-full max-w-md pt-10 mx-auto">
                    @auth
                    <a href="{{ route('app.dashboard') }}"
                        class="inline-flex items-center text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewbox="0 0 20 20" fill="none">
                            <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Back to dashboard
                    </a>
                    @endauth

                </div>
                <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                    <div>
                        <div class="mb-5 sm:mb-8">
                            <h1
                                class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                                Sign In
                            </h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Enter your email and password to sign in!
                            </p>
                        </div>
                        <div>
                            <livewire:auth.login />
                            <div class="mt-5">
                                <p
                                    class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                                    Don't have an account?
                                    <a href="{{ route('register') }}"
                                        class="text-brand-500 hover:text-brand-600 dark:text-brand-400"
                                        wire:navigate>Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative items-center hidden w-full h-full bg-brand-950 dark:bg-white/5 lg:grid lg:w-1/2">
                <div class="flex items-center justify-center z-1">
                    <!-- ===== Common Grid Shape Start ===== -->
                    <div class="absolute right-0 top-0 -z-1 w-full max-w-[250px] xl:max-w-[450px]">
                        <img src="{{ asset('assets/src/images/logo/banner.png') }}" alt="grid"
                            style="filter: blur(15px); opacity: 0.7;" />
                    </div>
                    <div class="absolute bottom-0 left-0 -z-1 w-full max-w-[250px] rotate-180 xl:max-w-[450px]">
                        <img src="{{ asset('assets/src/images/logo/banner.png') }}" alt="grid"
                            style="filter: blur(15px); opacity: 0.7;" />
                    </div>

                    <div class="flex flex-col items-center max-w-xs">
                        <a href="index.htm" class="block mb-4">
                            {{-- <img src="{{ asset('assets/src/images/logo/banner.png') }}" alt="Logo" /> --}}
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- ===== Page Wrapper End ===== -->
</x-layouts.auth>