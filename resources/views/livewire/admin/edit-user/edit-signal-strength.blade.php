<div style="box-shadow: 0 4px 10px rgba(0,0,0,0.2); border-radius: 12px; padding: 20px; background: #1f2937;">
    <!-- Card Header -->
    <h3 style="font-size: 18px; font-weight: 600; color: white; margin-bottom: 16px;">Signal Strength</h3>

    <!-- Progress Bar -->
    <div style="border-top: 1px solid #6b7280; width: 100%; padding: 10px 0; margin: 20px 12px;">
        <div style="position: relative; width: 100%; background: #374151; border-radius: 9999px; height: 12px;">
            <!-- Dynamic Progress Bar -->
            <div style="background: #ef4444; height: 12px; border-radius: 9999px; transition: all 0.3s ease; position: relative; width: {{$user->signal_strength}}%;">
                <!-- Progress Value Text -->
                <span style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); font-size: 12px; font-weight: 600; color: white;">
                    {{$user->signal_strength}}%
                </span>
            </div>
        </div>
    </div>

    <!-- Input to Edit Progress with Button -->
    <form wire:submit.prevent="updateSignalStrength">
        <div style="margin-top: 16px;">
            <label for="progressInput" style="display: block; font-size: 14px; font-weight: 500; color: white; margin-bottom: 6px;">
                Edit Signal Strength
            </label>
            <div style="display: flex;">
                <input type="number" id="progressInput" wire:model="signal_strength"
                    placeholder="Enter progress percentage"
                    style="flex: 1; padding: 8px 12px; border: 1px solid #6b7280; border-right: none; border-radius: 6px 0 0 6px; outline: none; background: #374151; color: white;">
                <button type="submit"
                    style="padding: 8px 16px; background: #ef4444; color: white; font-weight: 600; border-radius: 0 6px 6px 0; border: none; cursor: pointer;">
                    Update
                </button>
            </div>
            @error('signal_strength')
                <span style="color: #ef4444; font-size: 14px; margin-top: 8px; display: block;">{{ $message }}</span>
            @enderror
        </div>
    </form>
</div>
