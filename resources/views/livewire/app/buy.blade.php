<div>
    <form wire:submit.prevent="buy">
        <div class="-mx-2.5 flex flex-wrap gap-y-5">
            <!-- Amount Input -->
            <div class="w-full px-2.5">
                <div class="relative">
                    <span class="absolute text-gray-500 -translate-y-1/2 left-4 top-1/2 dark:text-gray-400">
                        $
                    </span>

                    <input type="number" wire:model="amount" placeholder="Enter amount"
                        class="w-full px-4 py-3 text-sm text-gray-800 bg-transparent border border-gray-300 rounded-lg dark:bg-dark-900 h-11 pl-11 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                </div>
                @error('amount')
                <p style="color:rgb(235, 66, 66); font-size:12px; margin-top:4px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Box with Preview -->
            <div class="w-full px-2.5">
                <label for="depositImage"
                    class="cursor-pointer flex items-center justify-center border border-dashed border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition"
                    style="display: flex; align-items: center; justify-content: center; height: 150px; width: 100%; overflow: hidden;">

                    @if ($proof)
                    <!-- Image fills the whole box -->
                    <img src="{{ $proof->temporaryUrl() }}" alt="Preview"
                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                    @else
                    <!-- Text stays centered in the box -->
                    <span style="color: gray; font-size: 14px;">Click to upload image</span>
                    @endif
                </label>

                <input type="file" id="depositImage" wire:model="proof" class="hidden" accept="image/*">

                @error('proof')
                <p style="color:rgb(235, 66, 66); font-size:12px; margin-top:4px;">{{ $message }}</p>
                @enderror
            </div>


            <!-- Submit Button -->
            <div class="w-full px-2.5">
                <x-button text="Submit" type="submit"
                    class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600" />
            </div>
        </div>
    </form>
</div>