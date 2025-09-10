<div>
    @props([
    'color' => 'blue',
    'text' => 'Submit',
    'type' => 'button',
    ])

    <button type="{{ $type }}" {{ $attributes->merge([
        'class' => "flex items-center justify-center px-4 py-2 font-semibold text-white rounded-lg focus:outline-none
        transition duration-150 ease-in-out bg-$color-600 hover:bg-$color-700 disabled:opacity-50
        disabled:cursor-not-allowed"
        ]) }}
        wire:loading.attr="disabled"
        >
        <span wire:loading.remove>
            {{ $text }}
        </span>

        <span wire:loading.flex class="items-center gap-2">
            <svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
            Loading...
        </span>
    </button>

</div>