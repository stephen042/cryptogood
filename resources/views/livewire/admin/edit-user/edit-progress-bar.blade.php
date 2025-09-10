<div style="box-shadow: 0 4px 10px rgba(0,0,0,0.2); border-radius: 12px; padding: 20px; background: #1f2937;margin: 20px auto">
    <!-- Card Header -->
    <h3 style="font-size: 18px; font-weight: 600; color: white; margin-bottom: 16px;">Trade Progress</h3>

    <!-- Progress Bar -->
    <div style="border-top: 1px solid #6b7280; width: 100%; padding: 10px 0; margin: 20px 12px;">
        <div style="position: relative; width: 100%; background: #374151; border-radius: 9999px; height: 12px;">
            <!-- Dynamic Progress Bar -->
            <div style="background: #3b82f6; height: 12px; border-radius: 9999px; transition: all 0.3s ease; position: relative; width: {{$user->progress_bar_status}}%;">
                <!-- Progress Value Text -->
                <span style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); font-size: 12px; font-weight: 600; color: white;">
                    {{$user->progress_bar_status}}%
                </span>
            </div>
        </div>
    </div>

    <!-- Input to Edit Progress with Button -->
    <form wire:submit.prevent="updateProgressBar">
        <div style="margin-top: 16px;">
            <label for="progressInput" style="display: block; font-size: 14px; font-weight: 500; color: white; margin-bottom: 6px;">
                Edit Trade Progress
            </label>
            <div style="display: flex;">
                <input type="number" id="progressInput" wire:model="progress_bar_status"
                    placeholder="Enter progress percentage"
                    style="flex: 1; padding: 8px 12px; border: 1px solid #6b7280; border-right: none; border-radius: 6px 0 0 6px; outline: none; background: #374151; color: white;">
                <button type="submit"
                    style="padding: 8px 16px; background: #3b82f6; color: white; font-weight: 600; border-radius: 0 6px 6px 0; border: none; cursor: pointer;">
                    Update
                </button>
            </div>
            @error('progress_bar_status')
                <span style="color: #ef4444; font-size: 14px; margin-top: 8px; display: block;">{{ $message }}</span>
            @enderror
        </div>
    </form>
</div>
