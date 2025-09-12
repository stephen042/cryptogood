<div class="flex flex-col gap-6 max-w-md mx-auto">

    <form wire:submit.prevent="resetPassword" class="space-y-5">
        <!-- Email -->
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Email<span class="text-error-500">*</span>
            </label>
            <input type="email" wire:model.defer="email" placeholder="johndoe@gmail.com" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm
                      text-gray-800 shadow-theme-xs placeholder:text-gray-400
                      focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10
                      dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30
                      dark:focus:border-brand-800" required />
            @error('email')
            <span class="text-sm " style="color:rgb(235, 66, 66);">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Password<span class="text-error-500">*</span>
            </label>
            <input type="password" wire:model.defer="password" placeholder="Enter new password" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm
                      text-gray-800 shadow-theme-xs placeholder:text-gray-400
                      focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10
                      dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30
                      dark:focus:border-brand-800" required />
            @error('password')
            <span class="text-sm" style="color:rgb(235, 66, 66);">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Confirm Password<span class="text-error-500">*</span>
            </label>
            <input type="password" wire:model.defer="password_confirmation" placeholder="Confirm new password" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm
                      text-gray-800 shadow-theme-xs placeholder:text-gray-400
                      focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10
                      dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30
                      dark:focus:border-brand-800" required />
            @error('password_confirmation')
            <span class="text-sm " style="color:rgb(235, 66, 66);">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit -->
        <div>
            <x-button text="Reset Password" color="green" type="submit"
                class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600" />
        </div>
    </form>

</div>