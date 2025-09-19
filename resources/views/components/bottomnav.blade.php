<!-- Page Wrapper -->
<div class="page-wrapper" style="padding-bottom:100px;">
    <!-- nav height + extra safe space -->

    <!-- Your page content here -->


    <!-- Bottom Navigation -->
    <div class="bottom-nav"
        style="position:fixed; bottom:0; left:0; right:0; height:70px; background:#ffffff; display:flex; align-items:center; justify-content:space-around; border-top:1px solid #e5e7eb; z-index:50;">

        <!-- Home -->
        <a href="{{ route('app.dashboard') }}"
            style="color:#4b5563; text-decoration:none; font-size:14px; display:flex; flex-direction:column; align-items:center;">
            <i class="fa-solid fa-house {{ request()->routeIs('app.dashboard') ? ' text-gray-600' : '' }}"
                style="font-size:20px; margin-bottom:4px;"></i>
            Home
        </a>

        <!-- Wallet -->
        <a href="{{ route('app.wallet') }}"
            style="color:#4b5563; text-decoration:none; font-size:14px; display:flex; flex-direction:column; align-items:center; margin-right:60px;">
            <i class="fa-solid fa-wallet {{ request()->routeIs('app.wallet') ? ' text-gray-600' : '' }}"
                style="font-size:20px; margin-bottom:4px;"></i>
            Wallet
        </a>

        <!-- Center logo with link -->
        <a href="{{ route('app.dashboard') }}"
            style="position:absolute; bottom:25px; left:50%; transform:translateX(-50%); text-decoration:none;"
            class="center-logo">
            <div
                style="width:70px; height:70px; border-radius:50%; background:#002065; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 6px rgba(0,0,0,0.2);">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="49" viewBox="0 0 25 29" fill="none">
                    <path d="M7.78603 6.46916H17.2091L18.3456 11.2731H6.69463L7.78603 6.46916Z" fill="white" />
                    <path
                        d="M14.5686 14.6805L15.574 11.9992H9.47461L10.5016 14.6805L10.1879 17.6904H12.5146L14.8607 17.6775L14.5686 14.6805Z"
                        fill="white" />
                    <path
                        d="M18.367 12.8973L15.6084 14.6934V17.8838L13.4986 19.9076V20.8594L15.531 22.7307H17.2305L21.5144 15.267L18.367 12.8973Z"
                        fill="white" />
                    <path
                        d="M9.46388 14.6934L6.67091 12.9188L3.51271 15.267L7.81818 22.7522H9.53908L11.5715 20.8594V19.9076L9.46388 17.8838V14.6934Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.0322266 7.26406L12.5039 0.0625L25.0078 7.28125V21.7166L12.5061 28.9375L12.4738 28.9203L0 21.7188V7.28125L0.0322266 7.26406ZM12.5039 1.53633L1.27832 8.02031V20.984L12.5039 27.4658L23.7316 20.984V8.02031L12.5039 1.53633Z"
                        fill="white" />
                </svg>
            </div>
        </a>

        <!-- Track -->
        <a href="{{ route('app.track') }}"
            style="color:#4b5563; text-decoration:none; font-size:14px; display:flex; flex-direction:column; align-items:center;">
            <i class="fa-solid fa-chart-line {{ request()->routeIs('app.track') ? ' text-gray-600' : '' }}"
                style="font-size:20px; margin-bottom:4px;"></i>
            Track
        </a>

        <!-- Logout -->
        <livewire:auth.logout />

        <style>
            @media (min-width: 1034px) {

                /* Large screens and up */
                .bottom-nav {
                    position: static !important;
                    height: auto !important;
                    border-top: none !important;
                    justify-content: center !important;
                    gap: 50px;
                    padding: 20px 0;
                }

                .center-logo {
                    position: static !important;
                    transform: none !important;
                    margin: 0 40px;
                }
            }
        </style>
    </div>
</div>
<style>
    /* Desktop screens */
    @media (min-width: 1034px) {
        .bottom-nav {
            height: 70px !important;
            /* keep same height */
            justify-content: center !important;
            gap: 50px;
            padding: 0 20px;
        }

        .center-logo {
            position: relative !important;
            bottom: 25px !important;
            left: 0% !important;
            transform: translateX(-50%) !important;
            margin: 0;
        }

        /* Remove extra padding on wrapper for desktop */
        .page-wrapper {
            padding-bottom: 0 !important;
        }
    }
</style>