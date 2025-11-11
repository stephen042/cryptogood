<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta name="description"
        content="We are Leading global, FCA regulated broker, providing trading services in Forex, CFDs and Commodities. Trade with tight spreads and fast execution." />

    <!-- Open Graph for social media -->
    <meta property="og:title" content="Global FCA Regulated Broker | Trade Forex, CFDs & Commodities">
    <meta property="og:description"
        content="We are a leading global FCA-regulated broker, providing trading services in Forex, CFDs, and Commodities. Trade with tight spreads and fast execution.">
    <meta property="og:image" content="{{ asset('assets/src/images/logo/favicon.png') }}">
    <meta property="og:type" content="website">

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home - {{ config('app.name') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/src/images/logo/favicon.png') }}" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- INTERNAL CSS STARTS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fb;
            color: #111827;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding-top: 18px;
            padding-bottom: 18px;
            background: #ffffff;
            /* IMPORTANT: solid background */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            z-index: 1000;
        }


        #logo {
            font-weight: 700;
            color: #0010f7 !important;
        }

        .btn-primary2 {
            background: #0010f7;
            color: #fff;
            border-radius: 30px;
            padding: 10px 26px;
            border: none;
        }

        .btn-outline-primary2 {
            border: 2px solid #0010f7;
            border-radius: 30px;
            color: #0010f7;
            padding: 10px 26px;
        }

        .btn-outline-primary2:hover {
            background: #0010f7;
            color: #fff;
        }

        /* HERO */
        #hero {
            padding-top: 90px;
            padding-bottom: 90px;
        }

        #hero .h1 {
            font-weight: 700;
            font-size: 45px;
            line-height: 1.2;
        }

        #hero img {
            width: 250px;
            display: block;
            margin: auto;
            border-radius: 50px;
        }

        .text-primary2 {
            color: #0010f7 !important;
        }

        /* FEATURES */
        #features .card {
            border-radius: 22px;
            border: none;
            padding: 30px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
            transition: .25s;
        }

        #features .card:hover {
            transform: translateY(-6px);
        }


        /* ✅ SERVICE SECTION — MATCH THE SCREENSHOT'S DESIGN EXACTLY */
        #service {
            margin-top: 40px;
        }

        /* Top gradient block */
        #first {
            border-radius: 30px;
            background: linear-gradient(135deg, #fff7d9, #e2e6ff);
            padding: 70px 40px;
            border: none;
        }

        /* Inside white card */
        #first .card {
            border-radius: 25px;
            padding: 50px;
            border: none;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
        }

        /* Phone Image — larger and aligned like screenshot */
        #first img {
            width: 270px;
            max-width: 100%;
            display: block;
            margin-left: auto;
        }

        /* SECOND GRADIENT BLOCK (bottom section) */
        #second {
            border-radius: 30px;
            background: linear-gradient(135deg, #ffefc7, #c8ffcf);
            padding: 70px 40px;
            border: none;
            margin-top: 60px;
        }

        /* Inner white card on section 2 */
        #second .card {
            border-radius: 25px;
            border: none;
            padding: 50px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
        }

        /* Owner section image size */
        #second img {
            width: 300px;
            max-width: 100%;
            display: block;
            margin-left: auto;
        }

        /* ✅ THREE SECURITY CARDS BELOW – MATCH EXACT LAYOUT */
        #second .d-flex .card {
            width: 300px;
            min-height: 350px;
            border-radius: 25px;
            margin: 15px;
            padding: 30px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
        }

        #second .d-flex .card img {
            width: 150px;
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #second .d-flex .card p {
            margin-top: 20px;
        }

        /* Ensures the margin between items matches screenshot */
        @media (max-width: 768px) {

            #first img,
            #second img {
                margin: auto;
                width: 240px;
            }

            #first .card,
            #second .card {
                padding: 30px;
            }

            #second .d-flex .card {
                width: 100%;
            }
        }

        /* FOOTER */
        #footer {
            background: #f5f7fa;
            padding-top: 60px;
            padding-bottom: 60px;
            margin-top: 50px;
        }

        #footer a {
            text-decoration: none;
            color: #0010f7;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #hero .h1 {
                font-size: 32px;
            }
        }
    </style>

</head>

<body>

    <div class="container-fluid p-0 m-0">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" id="logo" href="#">{{ config('app.name')}}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navMenu">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                        <li class="nav-item"><a class="nav-link" href="#service">Service</a></li>
                    </ul>

                    <a href="/register" class="btn btn-primary2 me-2">Get Started</a>
                    <a href="/login" class="btn btn-outline-primary2">Login</a>
                </div>
            </div>
        </nav>

        <!-- HERO -->
        <section id="hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 mt-4">
                        <div class="h1">A secure and<br> powerful wallet.<br> Powerful Web3 experiences</div>
                        <p class="mt-3">
                            Unlock the power of your cryptocurrency assets.<br>
                            Buy, store, swap tokens & NFTs and explore the world of Web3.
                        </p>
                        <a href="/login" class="btn btn-primary2 mt-3">Get Started</a>
                    </div>

                    <div class="col-md-6 text-center mt-4">
                        <img src="{{asset('assets/home/img/Screenshot-mobile.png')}}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURES -->
        <section id="features">
            <div class="container">
                <div class="h5 text-center text-muted">POWERFUL</div>
                <div class="h1 fw-bold text-center">
                    Block rocking <span class="text-primary2">Power</span>
                </div>
                <p class="text-center">From Newcomer to Pro — powerful features constantly added to help you succeed.
                </p>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card text-center mt-4 p-4">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 512 512">
                                    <path fill="blue" d="M200.4 27.39L180.9 183h42.8l49.1-146.57zm91.7 8L242.7 183l149.7.1l34.3-102.61zM180 46.03l-71.9 7.84L122.2 183h40.7zM64 153c-11.5 0-19.18 8.8-21.27 17.2c-1.04 4.2-.45 7.6.73 9.5c1.17 1.8 2.79 3.3 8.54 3.3h52.1l-3.3-30zm357.4 0l-10 30h47.5c-2.6-5-3.7-10.3-3-15.6c.7-5.2 2.7-9.9 5.3-14.4zM41 201v246.9c0 5.1 2.79 11.1 7.37 15.7C52.96 468.2 59 471 64 471l384 .1c5 0 11-2.8 15.6-7.4s7.4-10.6 7.4-15.7v-71h-87c-44 0-44-82 0-82h87v-93.9zm343 112c-20 0-20 46 0 46h22.3c-9-3.8-15.3-12.7-15.3-23s6.3-19.2 15.3-23zm41.7 0c9
    3.8 15.3 12.7 15.3 23s-6.3 19.2-15.3 23H487v-46zm-9.7 16c-4 0-7 3-7 7s3 7 7 7s7-3 7-7s-3-7-7-7" />
                                </svg>
                            </div>
                            <h5>Buy, Send, Store & Swap</h5>
                            <p>Easily buy and manage all your tokens from both web and mobile.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center mt-4 p-4">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24">
                                    <path fill="#0011ff" d="M9 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-11l9.5 5.5v11L12 23l-9.5-5.5v-11zM4.5
                         7.653v8.694l2.372 1.373l8.073-5.92l4.555 2.734v-6.88L12 3.31z" />
                                </svg>
                            </div>
                            <h5>Manage your NFT collection</h5>
                            <p>Store NFTs safely, check floor prices, set profile pictures and more.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center mt-4 p-4">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24">
                                    <path fill="#0011ff"
                                        d="M18 11c1.49 0 2.87.47 4 1.26V8c0-1.11-.89-2-2-2h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h7.68A6.995 6.995 0 0 1 18 11m-8-7h4v2h-4z" />
                                    <path fill="#0011ff" d="M18 13c-2.76 0-5 2.24-5 5s2.24
                                            5 5 5s5-2.24 5-5s-2.24-5-5-5m1.65 7.35L17.5 18.2V15h1v2.79l1.85 1.85z" />
                                </svg>
                            </div>
                            <h5>Easy to read Activity History</h5>
                            <p>Understand your blockchain activity without being an expert.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICE SECTION (FULLY REBUILT) -->
        <section id="service">
            <div class="container">

                <!-- ✅ FIRST GRADIENT WRAPPER -->
                <div id="first" class="mt-5">
                    <h2 class="text-center fw-bold">Easy. Seamless.</h2>
                    <p class="text-center mt-2">
                        Enjoy a smooth mobile app and desktop experience with easy-to-use,<br>
                        powerful tools to support your entire Web3 journey.
                    </p>

                    <!-- ✅ INNER WHITE CARD -->
                    <div class="card mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-6 p-4 p-md-5">
                                <h4 class="fw-bold">Receive crypto easily from<br>exchanges</h4>
                                <p>
                                    Take control of your crypto. Avoid complicated steps and deposit
                                    directly to your wallet from exchanges like Binance, Bitget, Gate.io and Coinbase.
                                </p>
                                <a href="/login" class="btn btn-outline-primary2 mt-2">Get Started</a>
                            </div>

                            <div class="col-md-6 text-center">
                                <img src="{{asset('assets/home/img/mobile.png')}}" class="img-fluid" alt="Phone Display">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ✅ SECOND GRADIENT WRAPPER -->
                <div id="second" class="mt-5">
                    <h2 class="text-center fw-bold">Stay private and secure</h2>
                    <p class="text-center mt-2">
                        Enjoy a smooth mobile app and desktop experience with easy-to-use,<br>
                        powerful tools to support your entire Web3 journey.
                    </p>

                    <!-- ✅ INNER WHITE CARD -->
                    <div class="card mt-4">
                        <div class="row align-items-center">
                            <div class="col-md-6 p-4 p-md-5">
                                <h4 class="fw-bold">You are the owner of crypto assets</h4>
                                <p>
                                    We secure your wallet, but don't control or have access to your private
                                    keys or secret phrase – only you do.
                                </p>
                                <a href="/login" class="btn btn-primary2 mt-2">Get Started</a>
                            </div>

                            <div class="col-md-6 text-center">
                                <img src="{{{asset('assets/home/img/undraw_mobile_encryption_re_yw3o.svg')}}}" class="img-fluid"
                                    alt="Encryption Illustration">
                            </div>
                        </div>
                    </div>

                    <!-- ✅ THREE SECURITY FEATURE CARDS (PERFECT GRID) -->
                    <div class="d-flex flex-wrap justify-content-center mt-4 mb-3">

                        <!-- card 1 -->
                        <div class="card text-center">
                            <h4 class="fw-bold">Zero personal tracking</h4>
                            <img src="{{asset('assets/home/img/undraw_developer_activity_re_39tg.svg')}}" class="img-fluid mt-3"
                                alt="">
                            <p class="mt-3">
                                We don't track any personal information,
                                including your IP address or balances.
                            </p>
                        </div>

                        <!-- card 2 -->
                        <div class="card text-center">
                            <h4 class="fw-bold">Added security with encryption</h4>
                            <img src="{{asset('assets/home/img/undraw_safe_re_kiil.svg')}}" class="img-fluid mt-3" alt="">
                            <p class="mt-3">
                                Use our Encrypted Cloud Backup for increased wallet security.
                            </p>
                        </div>

                        <!-- card 3 -->
                        <div class="card text-center">
                            <h4 class="fw-bold">Proactive alerts for risky transactions</h4>
                            <img src="{{asset('assets/home/img/undraw_light_the_fire_gt58.svg')}}" class="img-fluid mt-3" alt="">
                            <p class="mt-3">
                                Stay safe with alerts for risky address and dApp connections.
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- FOOTER -->
        <section id="footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <h5 class="fw-bold">{{ config('app.name') }}</h5>
                        <p class="mt-3">
                            We are consistently rated among the most secure exchanges.
                            Full reserves, strong banking relationships and strict legal compliance.
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h6 class="fw-bold">Useful Links</h6>
                        <a href="/">Home</a><br><br>
                        <a href="#features">Features</a><br><br>
                        <a href="#service">Service</a>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-4 mt-3">
                        <h6 class="fw-bold">Legal</h6>
                        <a href="#">Terms & Conditions</a><br><br>
                        <a href="#">Privacy Policy</a>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
