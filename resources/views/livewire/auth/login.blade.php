<div>
    <form wire:submit.prevent="login" class="space-y-5">
        <!-- Email -->
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Email<span class="text-error-500">*</span>
            </label>
            <input type="email" wire:model.defer="email" placeholder="info@gmail.com" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm 
                   text-gray-800 shadow-theme-xs placeholder:text-gray-400 
                   focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 
                   dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                   dark:focus:border-brand-800" />
            @error('email') <span class="text-sm text-red-500" style="color: rgb(239, 55, 55)">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Password<span class="text-error-500">*</span>
            </label>
            <div x-data="{ showPassword: false }" class="relative">
                <input :type="showPassword ? 'text' : 'password'" wire:model.defer="password"
                    placeholder="Enter your password" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-4 pr-11 text-sm 
                       text-gray-800 shadow-theme-xs placeholder:text-gray-400 
                       focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 
                       dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                       dark:focus:border-brand-800" />
                <span @click="showPassword = !showPassword"
                    class="absolute z-30 text-gray-500 -translate-y-1/2 cursor-pointer right-4 top-1/2 dark:text-gray-400">
                    👁
                </span>
            </div>
            @error('password') <span class="text-sm text-red-500" style="color: rgb(239, 55, 55)">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember me + Forgot password -->
        <div class="flex items-center justify-between">
            <label class="flex items-center text-sm font-normal text-gray-700 dark:text-gray-400 cursor-pointer">
                <input type="checkbox" wire:model="remember"
                    class="mr-2 rounded border-gray-300 text-brand-500 focus:ring-brand-500">
                Keep me logged in
            </label>
            <a href="/forgot-password" class="text-sm text-brand-500 hover:text-brand-600 dark:text-brand-400">
                Forgot password?
            </a>
        </div>

        <!-- Submit Button -->
        <div>
            <div>
                <x-button text="Login" color="green" type="submit"
                    class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600" />
            </div>
        </div>
    </form>
</div>