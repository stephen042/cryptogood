<div>
    <div x-data="{ open: false }" @open-modal.window="if($event.detail.id === 'passwordModal') open = true"
        x-show="open" class="fixed inset-0 flex items-center justify-center z-50 p-4" x-cloak
        style="backdrop-filter: blur(3px); background: rgba(0,0,0,0.7);">

        <div class="relative w-full max-w-sm sm:max-w-md p-5 rounded-xl shadow-lg"
            style="background-color: #1f2937; max-width: 500px; margin: 0 auto;">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 style="font-size: 1.125rem; font-weight: 600; color: #e5e7eb;">
                    Update Password
                </h3>
                <button @click="open = false" style="color: #9ca3af; font-size: 1.25rem; font-weight: bold;"
                    onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='#9ca3af'">×</button>
            </div>

            <!-- Body -->
            <form wire:submit.prevent="updatePassword" class="space-y-4">
                <div>
                    <label for="current_password" class="block text-sm text-gray-300 mb-1">Current Password</label>
                    <input type="password" wire:model="current_password" id="current_password"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white focus:outline-none">
                    @error('current_password') <span style="color: #f03a3a" class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="new_password" class="block text-sm text-gray-300 mb-1">New Password</label>
                    <input type="password" wire:model="new_password" id="new_password"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white focus:outline-none">
                    @error('new_password') <span style="color: #f03a3a" class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="new_password_confirmation" class="block text-sm text-gray-300 mb-1">Confirm New
                        Password</label>
                    <input type="password" wire:model="new_password_confirmation" id="new_password_confirmation"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white focus:outline-none">
                </div>

                <!-- Action Button -->
                <x-button type="submit" class="w-full" text="Update Password" style="background-color: #3b82f6;" />
            </form>
        </div>
    </div>

</div>