<!-- ===== Sidebar Start ===== -->
<aside x-cloak 
 :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed top-0 left-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-auto border-r border-gray-200 bg-white px-5 transition-all duration-300 lg:static lg:translate-x-0 dark:border-gray-800 dark:bg-black"
    @click.outside="sidebarToggle = false" >
    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="sidebar-header flex items-center gap-2 pt-8 pb-7">
        <a href="index.htm">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="dark:hidden" src="{{ asset('assets/src/images/logo/logo.svg') }}" alt="Logo" />
                <img class="hidden dark:block" src="{{ asset('assets/src/images/logo/logo-dark.svg') }}" alt="Logo" />
            </span>

            <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'"
                src="{{ asset('assets/src/images/logo/logo-icon.svg') }}" alt="Logo" />
        </a>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav x-data="{selected: $persist('Dashboard')}">

            <!-- Support Group -->
            <div>
                <h3 class="mb-4 text-xs leading-[20px] text-gray-400 uppercase">
                    <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                        ADMIN DASHBOARD
                    </span>

                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                        class="menu-group-icon mx-auto fill-current" width="24" height="24" viewbox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                            fill=""></path>
                    </svg>
                </h3>

                <ul class="mb-6 flex flex-col gap-4">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="menu-item group {{ Route::is('admin.dashboard') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            @if(Route::is('admin.dashboard'))
                            {{-- Active Dashboard Icon --}}
                            <svg class="menu-item-icon-active" width="24" height="24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 13h8V3H3v10Zm0 8h8v-6H3v6Zm10 0h8V11h-8v10Zm0-18v6h8V3h-8Z"
                                    fill="currentColor" />
                            </svg>
                            @else
                            {{-- Inactive Dashboard Icon --}}
                            <svg class="menu-item-icon-inactive" width="24" height="24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 13h8V3H3v10Zm0 8h8v-6H3v6Zm10 0h8V11h-8v10Zm0-18v6h8V3h-8Z"
                                    stroke="currentColor" />
                            </svg>
                            @endif

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <!-- Admin Wallets -->
                    <li>
                        <a href="{{ route('admin.admin-wallets') }}"
                            class="menu-item group {{ Route::is('admin.admin-wallets') ? 'menu-item-active' : 'menu-item-inactive' }}">
                            @if(Route::is('admin.admin-wallets'))
                            {{-- Active Wallet Icon --}}
                            <svg class="menu-item-icon-active" width="24" height="24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 7h20v12H2V7Zm2 0V5h16v2H4Z" fill="currentColor" />
                            </svg>
                            @else
                            {{-- Inactive Wallet Icon --}}
                            <svg class="menu-item-icon-inactive" width="24" height="24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 7h20v12H2V7Zm2 0V5h16v2H4Z" stroke="currentColor" />
                            </svg>
                            @endif

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Admin Wallets
                            </span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
        <!-- Sidebar Menu -->

    </div>
</aside>

<!-- ===== Sidebar End ===== -->