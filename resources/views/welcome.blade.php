<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thesoilverse.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 04:44:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geo Kranti | Virtual Real Estate</title>
    <link rel="shortcut icon" href="{{ asset('geokrantilogo-removebg.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assetsfront/front_web/fonts/font.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsfront/front_web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsfront/front_web/css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsfront/front_web/css/aos.css') }}"
        media='screen and (min-width: 576px)'>
    <link rel="stylesheet" href="{{ asset('assetsfront/site-assets.fontawesome.com/releases/v6.7.1/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsfront/front_web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsfront/front_web/css/responsive.css') }}">
    {{-- <link href="{{ asset('assetsfront/cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel='stylesheet' href="cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <script>
        var base_url = "index.html";
        var bscScan_url = "https://bscscan.com/";
    </script>
</head>

<body class="p-0">

    <style>
        .form-group.has-error small {
            color: red;
        }

        .btn.disabled,
        .btn:disabled,
        fieldset:disabled .btn {
            background: #4031D2;
            color: #fff;
        }

        #loaderCall {
            opacity: 999;
            -webkit-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            -ms-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
        }

        #loaderCall {
            left: 30%;
            position: relative;
            /* height: 100vh; */
            width: 200px;
            height: 200px;
            z-index: 1001;
            text-align: center;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        #loaderCall:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #BE2F92;
            -webkit-animation: spin 3s linear infinite;
            animation: spin 3s linear infinite;
        }

        #loaderCall:after {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #F2F2F3;
            -webkit-animation: spin 1.5s linear infinite;
            animation: spin 1.5s linear infinite;
        }
    </style>
    <div id="showLoaderAjax" class="loader-overlay" style="display: none;">
        <div class="loader-content loader-center text-center">

            <div id="loaderCall"> <img src="{{ asset('assetsfront/front_web/images/loader.png') }}" class="img-fluid"
                    alt="loader-logo" width="145" height="145"></div>
            <div class="loader-center loader-text">Do not close or reload the page</div>
        </div>
    </div>
    <!-- =========== loader =========== -->
    <div id="loader-wrapper" class="page-loading">
        <div id="preloader">
            <div id="loader">
                <img src="{{ asset('geokrantilogo-removebg.png') }}" class="img-fluid" alt="loader-logo" width="165"
                    height="165">
            </div>
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <style>
        .logo-container {
            display: flex;
            align-items: center;
            gap: 0;
        }

        .logo-container img {
            display: block;
            margin-right: 0;
        }

        .logo-container h1 {
            margin-left: 0;
            padding-left: 0;
        }
    </style>

    <header class="w-100" id="header">
        <nav class="navbar p-0">
            <div class="container d-flex align-items-center justify-content-between">

                <!-- Logo + Heading wrapper -->

                <div class="logo-container">
                    <a href="{{ '/' }}" class="p-0 m-0">
                        <img src="{{ asset('geokrantilogo-removebg.png') }}" alt="img" width="75px;"
                            height="72px;">
                    </a>
                    <h1 class="m-0 h5 d-none d-md-block">Geo Kranti</h1>
                </div>


                <!-- Right Side: Login/Register -->
                <div class="d-flex align-items-center gap-sm-3 gap-2">
                    <a href="{{ route('auth.login') }}"
                        class="d-sm-flex d-none align-items-center gap-2 download_app_btn">
                        <img src="{{ asset('assetsfront/front_web/images/download_app.png') }}" alt="img"
                            class="img-fluid" width="24" height="24">
                        <span class="d-none d-md-block">Login</span>
                    </a>
                    <a href="{{ route('auth.register') }}" class="btn btn_primary d-none d-sm-block">Create
                        Account</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- =========== header section end =========== -->
    <!--========= TSV Celebrating Day Modal end ==========-->
    <style>
        #tsvCelebratingday .modal-body,
        #tsvAnnouncement .modal-body {
            padding: 0px !important;
        }

        #tsvCelebratingday .btn-close,
        #tsvAnnouncement .btn-close {
            position: absolute;
            right: 5px;
            top: 5px;
            z-index: 9999;
            color: #fff;
            background-color: #fff;
            padding: 4px;
            background-size: 10px;
        }
    </style>
    <!--========= TSV Popup Modal start ==========-->
    <!-- =========== banner section =========== -->
    <section class="main_banner_section position-relative">
        <div class="wgl-canvas-outer">
            <canvas id="wgl-webgl-fluid"></canvas>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 z-1">
                    <h6 class="text-white">The Future of Virtual Land Investment</h6>
                    <h1 class="gradient_text">Geo Kranti !</h1>
                    <p class="text-white py-2">
                        Step into the future of geospatial innovation with Geo Kranti, where technology empowers land
                        management and environmental awareness.
                        Our dynamic platform bridges digital solutions with real-world impact, making land data more
                        accessible, transparent, and community-focused for everyone.
                    </p>
                    <a class="btn btn_primary arrow_btn" href="{{ route('auth.register') }}">Get Started</a>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 text-center">
                    <div class="banner_right_vector position-absolute">
                    </div>
                </div>
                <div class="col-12">
                    <ul
                        class="banner_sub_data flex-column flex-sm-row d-flex gap-md-4 gap-2 mt-sm-5 pt-5 text-white align-items-center justify-content-sm-start justify-content-center">
                        <li class="d-flex gap-2 align-items-center">
                            <h2 class="inter_font m-0 fs-4">200K+</h2>
                            Community Members
                        </li>
                        <li class="banner_content_seprator d-none d-sm-block">|</li>
                        <li class="d-flex gap-2 align-items-center">
                            <h2 class="inter_font m-0 fs-4">5+</h2>
                            Over Market Experience
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== banner section end =========== -->

    <!-- =========== banner sub section =========== -->
    <section class="banner_sub_section common_section">
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-1 gy-4 gy-lg-0 gx-xxl-5">
                <div class="col position-relative d-flex justify-content-between align-items-start gap-2"
                    data-aos="zoom-in" data-aos-duration="300">
                    <div>
                        <h3 class="text-white fw-light fs-5">Vision and Mission</h3>
                        <p class="m-0">
                            🌿 Vision Statement (Future-Oriented, Inspirational)
                            "To lead the world toward a healthier planet by making organic living accessible,
                            sustainable, and a natural choice for all."
                            <br>
                            <br class="d-none d-lg-block">
                            🌱 Mission Statement (Present-Focused, Action-Oriented)
                            "To provide high-quality, certified organic products that promote wellness,
                            protect the environment, and support ethical farming communities."
                            {{-- Help redefine how we manage natural resources with transparency, innovation, and impact. --}}
                        </p>

                    </div>
                    <img src="{{ asset('assetsfront/front_web/images/banner_sub_ing_1.png') }}" alt="img"
                        class="img-fluid" width="40" height="40">
                </div>
                <div class="col position-relative d-flex justify-content-between align-items-start gap-2"
                    data-aos="zoom-in" data-aos-duration="300">
                    <div>
                        <h4 class="text-white fw-light fs-5">BENEFITS OF ORGANIC FARMING
                        </h4>
                        <p class="m-0">
                            🌿 More Nutrients Available For Crops. NO Pollution, Improves Soil Properties. Contains PGR
                            And
                            Enzymes. Generates Employments .Better Use of Waste, Best for Enviornment, Earth, Human and
                            Animals
                            <br>
                            <br class="d-none d-lg-block">
                            🌱 Improves soil health through crop rotation, compost, and natural fertilizers. Reduces
                            pollution avoids chemical runoff into water bodies.
                        </p>

                    </div>
                    <img src="{{ asset('assetsfront/front_web/images/banner_sub_ing_2.png') }}" alt="img"
                        class="img-fluid" width="40" height="40">
                </div>
                <div class="col d-flex justify-content-between align-items-start gap-2" data-aos="zoom-in"
                    data-aos-duration="300">
                    <div>
                        <h5 class="text-white fw-light">Unique Selling Point</h5>
                        <p class="m-0">
                            🌿 Collaborate with change-makers to build a more informed and sustainable future. Eco
                            friendly, Highly Qualified Management, Noble vision & Mission, Promote Healthy life,
                            Promote chemical free farming
                            <br class="d-none d-lg-block">
                            <br>
                            🌱 Protect us from dangerous diseases, Helps in geological balance, Total Transparency,
                            Nominee facility & KYC, Land became organic Free of cost.


                        </p>

                    </div>
                    <img src="{{ asset('assetsfront/front_web/images/banner_sub_ing_3.png') }}" alt="img"
                        class="img-fluid" width="40" height="40">
                </div>
            </div>
        </div>
    </section>
    <!-- =========== banner sub section end =========== -->

    <!-- =========== the concept section =========== -->
    {{-- <section class="common_section" id="about">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="color_purple">Redefining Land Empowerment</h3>
                    <h4 class="color_theme_dark fs-2">
                        Explore the limitless potential of geospatial technology<br> to transform land use, access, and
                        governance.
                    </h4>

                    <ul class="nav nav-pills concept_section_tabs gap-4 mt-5" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-duration="200">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab"
                                aria-controls="pills-home" aria-selected="true">
                                Virtual lands
                            </button>
                        </li>
                        <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-duration="300">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">
                                Transforming Ownership
                            </button>
                        </li>
                        <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-duration="400">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">
                                Selling and purchasing
                            </button>
                        </li>
                        <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-duration="500">
                            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-disabled" type="button" role="tab"
                                aria-controls="pills-disabled" aria-selected="false">
                                Inclusive Accessibility
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content concept_section_tabs_content mt-4 pt-2" id="pills-tabContent"
                        data-aos="fade-up" data-aos-duration="400">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6 col-12 slider_img_col slide_1">
                                    </div>
                                    <div class="col-lg-6 col-12 p-sm-5 p-4">
                                        <h4 class="color_theme_dark">Explore transformative opportunities in land and
                                            environmental innovation.</h4>

                                        <p class="paragraph_purple_color fw-normal pt-2">
                                            Land is the foundation of sustainable development — from agriculture to
                                            resource management. Geo Kranti empowers communities with modern tools and
                                            data to make informed land-related decisions.
                                        </p>

                                        <p class="paragraph_purple_color fw-normal">
                                            As digital mapping and geospatial technologies evolve, so do the
                                            opportunities for smarter planning, transparency, and rural growth. Be part
                                            of a mission that puts land, people, and progress at the center of
                                            innovation.
                                        </p>

                                        <a class="btn btn_primary arrow_btn mt-3"
                                            href="{{ route('auth.login') }}">Get Started</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6 col-12 slider_img_col slide_2">
                                    </div>
                                    <div class="col-lg-6 col-12 p-sm-5 p-4">
                                        <h4 class="color_theme_dark">A secure and innovative approach to land
                                            empowerment.</h4>

                                        <p class="paragraph_purple_color fw-normal pt-2">
                                            Geo Kranti brings transparency and trust to land-related processes through
                                            digital innovation. With secure record-keeping and modern mapping tools,
                                            land data becomes more accessible, verifiable, and conflict-free.
                                        </p>

                                        <p class="paragraph_purple_color fw-normal">
                                            Our platform breaks down traditional barriers by making land insights
                                            available to all — empowering individuals, communities, and policymakers
                                            with real-time access and clarity.
                                        </p>

                                        <a class="btn btn_primary arrow_btn mt-3"
                                            href="{{ route('auth.login') }}">Get Started</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6 col-12 slider_img_col slide_3">
                                    </div>
                                    <div class="col-lg-6 col-12 p-sm-5 p-4">
                                        <h4 class="color_theme_dark">Seamless and secure access to land-related
                                            information.</h4>

                                        <p class="paragraph_purple_color fw-normal pt-2">
                                            Geo Kranti simplifies how individuals, communities, and institutions
                                            interact with land data — enabling smooth, efficient, and transparent access
                                            to ownership records and geospatial insights.
                                        </p>

                                        <p class="paragraph_purple_color fw-normal">
                                            Our system ensures data integrity and security, building trust without the
                                            need for intermediaries. Whether accessing records or verifying ownership,
                                            Geo Kranti brings confidence and clarity to every transaction.
                                        </p>

                                        <a class="btn btn_primary arrow_btn mt-3"
                                            href="{{ route('auth.login') }}">Get Started</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                            aria-labelledby="pills-disabled-tab" tabindex="0">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6 col-12 slider_img_col slide_4">
                                    </div>
                                    <div class="col-lg-6 col-12 p-sm-5 p-4">
                                        <h4 class="color_theme_dark">Breaking barriers to land access for everyone.
                                        </h4>

                                        <p class="paragraph_purple_color fw-normal pt-2">
                                            Traditional land systems often favor the privileged, but Geo Kranti is built
                                            for inclusivity. With digital tools and transparent processes, we empower
                                            individuals from all backgrounds to understand and engage with land
                                            ownership.
                                        </p>

                                        <p class="paragraph_purple_color fw-normal">
                                            Our platform makes land information accessible, easy to navigate, and
                                            affordable. Whether you're a farmer, student, entrepreneur, or policymaker —
                                            Geo Kranti opens the door to informed, equitable land participation.
                                        </p>

                                        <a class="btn btn_primary arrow_btn mt-3"
                                            href="{{ route('auth.login') }}">Get Started</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="common_section" id="about">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="color_purple">Empowering Agriculture through Organic Innovation</h3>
                    <h4 class="color_theme_dark fs-2">
                        Join Geo Kranti's mission to build a healthier planet through sustainable farming,<br>
                        ethical land practices, and inclusive community development.
                    </h4>

                    <ul class="nav nav-pills concept_section_tabs gap-4 mt-5" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-duration="200">
                            <button class="nav-link active" id="pills-vision-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-vision" type="button" role="tab"
                                aria-controls="pills-vision" aria-selected="true">
                                Our Silver Packege
                            </button>
                        </li>
                        <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-duration="300">
                            <button class="nav-link" id="pills-benefits-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-benefits" type="button" role="tab"
                                aria-controls="pills-benefits" aria-selected="false">
                                Our Golden Packege
                            </button>
                        </li>
                        <li class="nav-item" role="presentation" data-aos="fade-right" data-aos-duration="400">
                            <button class="nav-link" id="pills-usp-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-usp" type="button" role="tab" aria-controls="pills-usp"
                                aria-selected="false">
                                Why Choose Us
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content concept_section_tabs_content mt-4 pt-2" id="pills-tabContent"
                        data-aos="fade-up" data-aos-duration="400">

                        <!-- Vision & Mission -->
                        <div class="tab-pane fade show active" id="pills-vision" role="tabpanel"
                            aria-labelledby="pills-vision-tab" tabindex="0">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6 col-12 slider_img_col slide_1"></div>
                                    <div class="col-lg-6 col-12 p-sm-5 p-4">
                                        <h4 class="color_theme_dark">SILVER PACKAGE - 100 Beds</h4>

                                        <p class="paragraph_purple_color fw-normal">
                                        <h5> REQUIREMENT- </h5>
                                        <div class="text" style="margin-left: 30px;">
                                            1. Amount-10 Lakhs.<br>
                                            2. 1 Acre Land.<br>
                                            3. Water Source & Covered Farm.<br>
                                            4. Accommodation For Workers.<br>
                                            5. Dung Availability.<br>
                                            6. Ground level must be High.<br>
                                            7. Boundary Security.
                                        </div>

                                        </p>

                                        <a class="btn btn_primary arrow_btn mt-3"
                                            href="{{ route('auth.login') }}">Join the Mission</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="pills-benefits" role="tabpanel"
                            aria-labelledby="pills-benefits-tab" tabindex="0">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6 col-12 slider_img_col slide_2"></div>
                                    <div class="col-lg-6 col-12 p-sm-5 p-4">
                                        <h4 class="color_theme_dark">Golden Packege - 200 Beds</h4>
                                        <p class="paragraph_purple_color fw-normal">
                                        <h5> REQUIREMENT- </h5>
                                        <div class="text" style="margin-left: 30px;">
                                            1. Amount-20 Lakhs.<br>
                                            2. 2 Acre Land.<br>
                                            3. Water Source & Covered Farm.<br>
                                            4. Accommodation For Workers.<br>
                                            5. Dung Availability.<br>
                                            6. Ground level must be High.<br>
                                            7. Boundary Security.
                                        </div>

                                        </p>
                                        <a class="btn btn_primary arrow_btn mt-3"
                                            href="{{ route('auth.login') }}">Join the Mission</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Unique Selling Points -->
                        <div class="tab-pane fade" id="pills-usp" role="tabpanel" aria-labelledby="pills-usp-tab"
                            tabindex="0">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6 col-12 slider_img_col slide_3"></div>
                                    <div class="col-lg-6 col-12 p-sm-5 p-4">
                                        <h4 class="color_theme_dark">What Sets Geo Kranti Apart</h4>
                                        <ul class="paragraph_purple_color fw-normal pt-2">
                                            <li>Eco-friendly and sustainable approach</li>
                                            <li>Focus on chemical-free farming practices</li>
                                            <li>Supports healthy lifestyles and disease prevention</li>
                                            <li>Transparent operations with total clarity</li>
                                            <li>Qualified and ethical leadership team</li>
                                            <li>Land becomes organic at zero cost</li>
                                            <li>Nominee and KYC facilities for members</li>
                                            <li>Strong community support and employment generation</li>
                                        </ul>
                                        <a class="btn btn_primary arrow_btn mt-3" href="{{ route('auth.login') }}">Be
                                            a Changemaker</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- tab content -->
                </div>
            </div>
        </div>
    </section>

    <!-- =========== the concept section end =========== -->

    <!-- =========== real estate section =========== -->


    {{-- <section class="common_section real_estate_section position-relative overflow-hidden">
        <div class="wgl-canvas-outer">
            <canvas id="wgl-webgl-fluid_2"></canvas>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-6 col-12 position-relative z-1">
                    <h3 class="color_purple">Geo Kranti & Organic Agriculture</h3>
                    <h2 class="text-white">Unlocking Rural Prosperity</h2>
                    <p class="text-white pt-2">
                        Geo Kranti is transforming traditional farming with modern, sustainable, and chemical-free
                        methods.
                        We aim to create a healthier planet while opening doors for employment, rural empowerment, and
                        ethical land use — all through the power of organic farming.
                    </p>
                    <div class="card card_type_1 mt-sm-5" data-aos="fade-up" data-aos-duration="400">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="text-white fs-5">Sustainable & Transparent Farming</h3>
                            <img src="{{ asset('assetsfront/front_web/images/banner_sub_ing_1.png') }}"
                                alt="img" class="img-fluid" width="40" height="40">
                        </div>
                        <p class="text-white pt-2">
                            Say goodbye to chemical-laden farming. Geo Kranti promotes eco-friendly cultivation that
                            improves soil,
                            reduces pollution, and respects the planet. All while creating transparency in land
                            ownership and food production.
                        </p>
                    </div>
                    <div class="card card_type_1 mt-4" data-aos="fade-up" data-aos-duration="400">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="text-white fs-5">Income & Employment for All</h3>
                            <img src="{{ asset('assetsfront/front_web/images/banner_sub_ing_1.png') }}"
                                alt="img" class="img-fluid" width="40" height="40">
                        </div>
                        <p class="text-white pt-2">
                            Our organic farm initiatives generate rural jobs, support local economies, and offer income
                            through multi-level farming models. Whether you're a farmer, investor, or entrepreneur — Geo
                            Kranti is
                            your opportunity for lifelong financial freedom and social impact.
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-12 d-flex align-items-end justify-content-center">
                    <div class="realestate_custom_outer position-relative">
                        <img src="{{ asset('assetsfront/front_web/images/organic-farming.jpg') }}" alt="img"
                            width="700" height="580" class="img-fluid" loading="lazy">
                        <div class="gradient_card"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="common_section real_estate_section position-relative overflow-hidden">
        <div class="wgl-canvas-outer">
            <canvas id="wgl-webgl-fluid_2"></canvas>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-12 position-relative z-1">
                    <h3 class="color_purple">Geo Kranti & Organic Agriculture</h3>
                    <h2 class="text-white">Unlocking Rural Prosperity</h2>
                    <p class="text-white pt-2">
                        Geo Kranti is transforming traditional farming with modern, sustainable, and chemical-free
                        methods.
                        We aim to create a healthier planet while opening doors for employment, rural empowerment, and
                        ethical land use — all through the power of organic farming.
                    </p>

                    <div class="row mt-5 gap-4 flex-md-nowrap flex-wrap">
                        <!-- Card 1 -->
                        <div class="col-md-6 col-12 card card_type_1" data-aos="fade-up" data-aos-duration="400">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="text-white fs-5">Sustainable & Transparent Farming</h3>
                            </div>
                            <p class="text-white pt-2">
                                Say goodbye to chemical-laden farming. Geo Kranti promotes eco-friendly cultivation that
                                improves soil,
                                reduces pollution, and respects the planet. All while creating transparency in land
                                ownership and food production.
                            </p>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-6 col-12 card card_type_1" data-aos="fade-up" data-aos-duration="400">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="text-white fs-5">Income & Employment for All</h3>
                            </div>
                            <p class="text-white pt-2">
                                Our organic farm initiatives generate rural jobs, support local economies, and offer
                                income
                                through multi-level farming models. Whether you're a farmer, investor, or entrepreneur —
                                Geo Kranti is
                                your opportunity for lifelong financial freedom and social impact.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- =========== real estate section end =========== -->

    <!-- =========== investors section =========== -->
    <section class="common_section border-bottom">
        <div class="container">
            <div class="row row-cols-xl-2 row-cols-1">
                <div class="col" data-aos="fade-right" data-aos-duration="400">
                    <h3 class="color_purple">INVESTORS</h3>
                    <h2 class="color_theme_dark">
                        Real-world land innovation is<br> an emerging frontier for investors.
                    </h2>
                    <p class="fw-normal pt-2">
                        Geo Kranti opens up a new landscape for impact-driven investment — focusing on sustainable land
                        use, digital infrastructure, and geospatial solutions. As land data becomes more accessible and
                        transparent, opportunities for meaningful, long-term investment grow.
                    </p>
                    <p class="fw-normal">
                        From smart agriculture and rural digitization to environmental management, Geo Kranti invites
                        visionary investors to be part of a future-ready ecosystem that values real-world impact
                        alongside economic growth.
                    </p>
                    <a class="btn btn_primary arrow_btn mt-sm-3" href="{{ route('auth.login') }}">Get Started</a>
                </div>

                <div class="col position-relative d-none d-xl-block" data-aos="zoom-in" data-aos-duration="400">
                    <div class="phone_2_bg_div"></div>
                    <div class="phone_2"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== investors section end =========== -->

    <!-- =========== explor lands section =========== -->
    <section class="common_section">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col text-center">
                    <h3 class="color_purple">Explore Lands</h3>
                    <h2 class="color_theme_dark">
                        Discover Verified Land Opportunities to Build
                        <br class="d-none d-lg-block">
                        a Smarter and Sustainable Future!
                    </h2>
                    <div id="carouselExampleFade" class="carousel explore_lands_slider slide mt-5"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="carousel-indicators mt-3 m-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== explor lands section end =========== -->

    <!-- =========== the future section =========== -->
    <section class="common_section the_future_section">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-1 gy-3">
                <div class="col">
                    <h3 class="color_purple">THE FUTURE</h3>
                    <h2 class="text-white">Transforming India Through Geo-Enabled Land Innovation</h2>
                    <p class="text-white position-relative z-2 pt-2">
                        Geo Kranti is not just a platform — it’s a movement toward redefining land governance,
                        empowering communities,
                        and bringing technological innovation to the grassroots. By integrating satellite mapping, GIS
                        intelligence,
                        and land record digitization, Geo Kranti aims to bring transparency and opportunity to every
                        corner of the nation.
                    </p>
                    <p class="text-white position-relative z-2">
                        In the near future, Geo Kranti will collaborate with government bodies, private developers, and
                        local communities
                        to build smart rural and urban landscapes. Our mission is to create a connected ecosystem where
                        land utilization
                        is data-driven, community-centered, and future-ready — empowering citizens and driving national
                        progress.
                    </p>

                    <a class="btn btn_primary arrow_btn my-3" href="login.html">Get Started</a>
                </div>
                <div
                    class="col d-flex flex-column justify-content-center align-items-lg-end align-items-center position-relative z-2 gap-4 pe-lg-5">
                    <img src="{{ asset('assetsfront/front_web/images/character.png') }}" alt="img"
                        class="img-fluid position-relative z-1 character" width="250" height="262"
                        loading="lazy">
                    <img src="{{ asset('assetsfront/front_web/images/character_bottom.png') }}" alt="img"
                        class="img-fluid position-relative z-1 character_bottom" width="300" height="96"
                        loading="lazy">
                    <img src="{{ asset('assetsfront/front_web/images/aeroplane_img.png') }}" alt="img"
                        class="img-fluid airplane" id="airplane_animate" width="150" height="177">
                </div>
            </div>
        </div>
    </section>
    <!-- =========== the future section end =========== -->


    <!-- =========== get in touch section =========== -->
    <section class="common_section get_in_touch_section" id="contact">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="card">
                        <div class="row row-cols-lg-2 row-cols-1 align-items-center">
                            <div class="col" data-aos="fade-right" data-aos-duration="400">
                                <h3 class="color_purple">GET IN TOUCH</h3>
                                <h2 class="color_theme_dark fw-semibold">
                                    Need help? Contact our support team for assistance.
                                </h2>
                                <p class="fw-normal fs-14 pe-md-5 fw-medium">
                                    We are here to provide you with the support you need. Feel free to reach out to us
                                    for any queries or concerns.
                                </p>
                                <h3 class="color_purple mt-lg-5 fs-4">We are always happy to help you!</h3>
                                <!-- <h4 class="color_theme_dark fw-semibold fs-5"><a href="cdn-cgi/l/email-protection.html"
                                        class="__cf_email__"
                                        data-cfemail="54272124243b262014203c31273b3d3822312627317a373b39">[email&#160;protected]</a>
                                </h4> -->
                                <h4 class="color_theme_dark fw-semibold fs-5">
                                    geokranti@gmail.com
                                </h4>
                            </div>
                            <div class="col">
                                {{-- <form class="row g-3 pt-md-0 pt-4" method="POST" id="contactform">
                                    <input name="csrf_name" value="" type="hidden">
                                    <div class="col-12 form-group">
                                        <input type="text" placeholder="Your name" class="form-control"
                                            id="name" name="name">
                                    </div>
                                    <div class="col-sm-6 col-12 form-group">
                                        <input type="email" placeholder="Your email" class="form-control"
                                            id="email" name="email">
                                    </div>
                                    <div class="col-sm-6 col-12 form-group">
                                        <input type="number" placeholder="Your phone" class="form-control"
                                            id="uphone" name="uphone">
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea placeholder="Your message" rows="5" class="form-control" id="message" name="message"></textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <button type="submit" class="btn btn_primary">Send Message</button>
                                    </div>
                                </form> --}}
                                <form class="row g-3 pt-md-0 pt-4" method="POST"
                                    action="{{ route('contact.send') }}">
                                    @csrf
                                    <div class="col-12 form-group">
                                        <input type="text" placeholder="Your name" class="form-control"
                                            name="name" required>
                                    </div>
                                    <div class="col-sm-6 col-12 form-group">
                                        <input type="email" placeholder="Your email" class="form-control"
                                            name="email" required>
                                    </div>
                                    <div class="col-sm-6 col-12 form-group">
                                        <input type="number" placeholder="Your phone" class="form-control"
                                            name="uphone" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea placeholder="Your message" rows="5" class="form-control" name="message" required></textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <button type="submit" class="btn btn_primary">Send Message</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== get in touch section end =========== -->

    <!-- =========== footer card section =========== -->
    {{-- <section class="footer_card_section pb-4 pt-0">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="card footer_card">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-sm-8 col-12">
                                <h2>Download our app</h2>
                                <p class="pt-sm-3 fw-normal fs-14">
                                    Experience the best of The Soilverse at your fingertips. Download our app today
                                    <br class="d-none d-xl-block">
                                    to explore, manage, and grow your virtual land seamlessly.
                                </p>
                                <div class="d-flex align-items-center gap-2 pt-md-4">
                                    <a href="https://play.google.com/store/apps/details?id=app.thesoilverse.wallet"
                                        class="app_link">
                                        <img src="{{ asset('assetsfront/front_web/images/google_play.png') }}"
                                            alt="img" class="img-fluid" width="200" height="59">
                                    </a>
                                    <a href="https://apps.apple.com/in/app/the-soilverse-app/id6458190350"
                                        class="app_link">
                                        <img src="{{ asset('assetsfront/front_web/images/app_store.png') }}"
                                            alt="img" class="img-fluid" width="200" height="59">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-4 col-12 text-center" data-aos="zoom-in"
                                data-aos-duration="400">
                                <img src="{{ asset('assetsfront/front_web/images/footer_phone_img.gif') }}"
                                    alt="img" class="img-fluid footer_phone_img" width="450" height="463"
                                    loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- =========== footer card section end =========== -->

    <script>
        window.onload = () => {

            $('.openNotification').first().modal('show');

            $(".closeModal").on('click', function(event) {
                $('.openNotification').modal('hide');
                var counter = $(this).data('length') + 1;
                $(`.openNotification:eq(${counter})`).modal('show');
            });

        }
    </script>
    <!-- =========== footer section =========== -->
    <footer>
        <div class="container">
            <div class="row pb-4 gy-4 gy-lg-0 fs-14 border-bottom position-relative z-1">
                <div class="col-lg-4 col-12">
                    <a href="{{ '/' }}">
                        <img src="{{ asset('geokrantilogo-removebg.png') }}" alt="img" class="iimg-fluid"
                            style="    width: 50%;
    height: 169px;">
                    </a>
                    <p class="pt-3 fw-light footer_main_para">
                        Embark on your journey today and unlock the boundless opportunities of virtual real estate with
                        TheSoilverse. Create, innovate, invest, and prosper within the ever-expanding metaverse.
                    </p>

                </div>

                <div class="col-md-4 col-12 mt-4">
                    <div class="ruf" style="    width: 50%;
    height: 169px;"></div>
                    <div class="w-max-content mx-auto">

                        <h4 class="text-white pb-sm-4 pb-2 fs-5">Contact Us</h4>
                        <div class="d-flex gap-4 align-items-start">
                            <img src="{{ asset('assetsfront/front_web/images/footer_address_icon.png') }}"
                                alt="img" class="img-fluid" width="20" height="18">
                            <span class="fw-light">Ganaur,
                                <br>
                                India
                            </span>
                        </div>
                        <div class="d-flex gap-4 align-items-start pt-3">
                            <img src="{{ asset('assetsfront/front_web/images/mail_icon.png') }}" alt="img"
                                class="img-fluid" width="20" height="20">
                            <span class="fw-light">
                                geokranti@gmail.com
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 py-3">
                <div class="col text-center">
                    <small class="fw-light">&copy; 2024 Geo Kranti. All Rights Reserved.</small>
                </div>
            </div>
        </div>
    </footer>
    <!-- =========== footer section end =========== -->
    <!-- <script src="https://thesoilverse.com/assets/front_web/js/jquery.js" defer></script>  -->
    {{-- <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{ asset('assetsfront/code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assetsfront/front_web/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assetsfront/front_web/js/aos.js') }}" defer></script>
    <script src="{{ asset('assetsfront/front_web/js/script.js') }}" defer></script>
    <script src="{{ asset('assetsfront/front_web/js/loader.js') }}"></script>
    <!-- <script src="https://thesoilverse.com/assets/front_web/js/cursor-animation.js" defer></script> -->
    <script defer>
        $(document).ready(function() {
            function checkWidth() {
                if (screen.width > 575) {
                    // Dynamically load and execute the external script
                    $.getScript("assets/front_web/js/cursor-animation.js")
                        .done(function(script, textStatus) {})
                        .fail(function(jqxhr, settings, exception) {
                            console.error("Error loading the script.");
                        });
                }
            }
            checkWidth(); // Check on page load
        });
    </script>
    <script defer>
        var b = 0;

        function fly() {
            let oTop2 = $("#airplane_animate").offset().top - window.innerHeight;
            if (b == 0 && $(window).scrollTop() > oTop2) {
                let plane = document.getElementById('airplane_animate');
                plane.classList.add('fly')
                b = 1;
            }
        }
        $(window).scroll(function() {
            fly();
        });
        window.addEventListener("load", fly);
    </script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js') }}">
    </script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script> -->
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#contactform').bootstrapValidator({
                excluded: ':disabled',
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Name'
                            }
                        }
                    },
                    uphone: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Mobile No'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Email'
                            },
                            //  regexp: {
                            //      regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            //      message: 'Please enter valid email format.'
                            //  }
                        }
                    },
                    message: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Message'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {
                e.preventDefault();
                var form = $(e.target);
                var mydata = form.serialize();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: base_url + "contactSubmit",
                    data: mydata,
                    success: function(data) {
                        if (data.status == 0) {
                            toastr.error(data.message);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.success(data.message);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error: function(xhr, textStatus) {
                        toastr.error('Something went wrong, try again later.');
                    }
                });
            });
            $('#newsform').bootstrapValidator({
                excluded: ':disabled',
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Please Enter Email'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'Please enter valid email format.'
                            }
                        }
                    }
                }
            }).on('success.form.bv', function(e) {
                e.preventDefault();
                var form = $(e.target);
                var mydata = form.serialize();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: base_url + "subscriptionSubmit",
                    data: mydata,
                    success: function(data) {
                        if (data.status == 0) {
                            toastr.error(data.message);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.success(data.message);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error: function(xhr, textStatus) {
                        toastr.error('Something went wrong, try again later.');
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('assetsfront/js/jquery-guard%401.12502.js?v=1.1.15') }}"></script>
</body>

<!-- Mirrored from thesoilverse.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 04:45:07 GMT -->

</html>
