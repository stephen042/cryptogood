<header class="sticky top-0 z-50 flex w-full bg-gray-900 lg:border-b border-gray-800">
    <div class="flex grow items-center justify-between px-4 py-2 lg:px-5 lg:py-3">

        <!-- Left: Gear link (20% smaller) -->
        <a href="#settings" @click.prevent="$dispatch('open-modal', {id: 'passwordModal'})"
            class="flex h-10 w-10 items-center justify-center rounded-lg text-white lg:h-11 lg:w-11">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.89 3.317.884 2.427 2.427a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.89 1.543-.884 3.317-2.427 2.427a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.89-3.317-.884-2.427-2.427a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.89-1.543.884-3.317 2.427-2.427.987.57 2.22.142 2.573-1.066z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </a>

        <!-- Right: Missions link (20% smaller) -->
        <a href="#missions"
            class="flex items-center gap-2 rounded-full px-2 py-1 text-xs border border-blue-500 bg-blue-600 text-white">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="shrink-0 text-white">
                <path
                    d="M4.5 21V16M4.5 16V6.5C5.5 5.5 7 5 8.5 5C11.5 5 13.5 7.5 17.5 5.5V15.5C13.5 17.5 11.5 14.5 8.5 14.5C7.5 14.5 5.5 15 4.5 16Z"
                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="text-sm font-medium">Missions</span>
        </a>

    </div>
</header>