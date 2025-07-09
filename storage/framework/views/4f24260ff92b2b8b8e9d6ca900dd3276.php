<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>perftraka about page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/images/favicon_io/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/images/favicon_io/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/images/favicon_io/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('assets/images/favicon_io/site.webmanifest')); ?>">
    <?php echo RecaptchaV3::initJs(); ?>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        .grecaptcha-badge { visibility: hidden !important; }
    </style>
</head>
<body class="font-primary">
<main>
    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="<?php echo e(config('app.url')); ?>" class="flex items-center space-x-3 rtl:space-x-reverse md:ml-[5%]">
                <img src="<?php echo e(asset('/assets/landing_images/logo.png')); ?>" class="h-8" alt="perfraka logo">
                <img src="<?php echo e(asset('/assets/landing_images/logo_name.png')); ?>" class="" alt="perfraka logo_name">
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="<?php echo e(route('login')); ?>">
                    <button type="button"
                            class="text-[#ffffff] bg-col2 outline-none focus:outline-none font-normal rounded-lg text-size1 px-5 py-2 text-center">
                        Login
                    </button>
                </a>
                <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden  focus:outline-none "
                        aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="<?php echo e(route('welcome')); ?>"
                           class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-2  font-normal">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('about')); ?>"
                           class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-2  font-normal">About
                            us</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('faq')); ?>"
                           class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-2 font-normal">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div
        class="mt-[1.5em] h-[30vh] w-full flex flex-row items-center justify-center font-bigger text-[#fff] text-[3em] bg-col3">
        ABOUT US
    </div>

    <section class="pt-[5%] px-[15%] max-about:px-[5%] about:max-bigger:px-[10%] bg-col4">
        <div class="text-center text-normal font-[500] text-col5">Learn about PERFTRAKA</div>
        <header class="font-[700] text-header max-mobile:text-[2em] text-col3 text-center">
            <span
                class="px-1 pb-2 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-[8px] after:w-full after:bg-[#E63026] after:rounded-[4px]">About Us</span>
        </header>
        <div class="pt-[1em] flex flex-row max-mobile:flex-col">
            <div class="pt-[5%] text-size1 font-normal">
                <p>
                    PERFTRAKA is a cloud based technology that provides cutting-edge Location Capture,
                    Security Patrol Monitoring and Employee &
                    Contractor Attendance Management solutions tailored to meet the diverse needs of businesses across
                    various industries.
                </p>
                <p class="pt-[1em]">
                    Using our innovative platform, security agencies and businesses can easily track security patrol,
                    employee and contractor attendance in real-time. Whether you are managing a
                    single location or multiple sites, our platform offers the flexibility and
                    scalability to meet your unique requirements.
                </p>
                <p class="pt-[1em]">
                    With QR codes installed at respective location sites or simply by pre-configuring the
                    longitudinal and latitudinal co-ordinates of locations on the application, data is captured and
                    written to the cloud where
                    the administrator/supervisor/HR can monitor all security patrols and employee & contractor
                    attendance in real time.
                </p>

                <p class="pt-[1em]">
                    PERFTRAKA provide you with real time reports of patrols by your security personnel and the
                    attendance of your
                    employees and contractors i.e.,
                    field sales executives, cleaners, cooks, drivers, etcetera at all location sites regardless of their
                    geographical
                    location.
                </p>

                <p class="pt-[1em]">
                    So say goodbye to manual tracking methods and inefficiencies – with PERFTRAKA,
                    you can centralize your operations and gain full visibility into all activities,
                    empowering you to make informed decisions and drive business success.
                </p>

            </div>
            <img src="/assets/landing_images/mobile3.png"
                 class="mobile:mt-[3.5em] w-[26em] min-h-[29.2em] max-mobile:h-[23em] ml-[5em] max-mobile:ml-0"
                 alt="perfraka mobile">
        </div>
    </section>

    
    <section id="getInTouch" class="py-[5%] px-[15%]  max-about:px-[5%]">
        <header class="font-[800] text-[2.25em] text-center">Get In touch with us</header>
        <div class="text-center font-normal text-[#667085]">We’d love to hear from you. Please fill out this form.</div>
        <?php echo $__env->make('contact-us-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <footer
        class="flex flex-row  max-mobile:flex-col items-end bg-col3 px-[15%]  max-about:px-[5%] pt-[3%] max-mobile:py-[10%] pb-[3.5%] text-[#fff]">
        <div class="w-[19em] max-mobile:w-full">
            <div class="flex flex-row items-center">
                <img src="/assets/landing_images/logo2.svg" class="w-[40px] h-[54px] mr-1" alt="perfraka logo">
                <img src="/assets/landing_images/logo_name2.png" class="w-[103px] h-[11px]" alt="perfraka logo_name">
            </div>
            <div class="font-normal text-[#fff] text-normal">
                At PERFTRAKA, we specialize
                in providing cutting-edge Location Capture, Attendance.
            </div>
        </div>
        <div class="w-[23em]  max-mobile:w-full mx-20 max-mobile:mx-0  max-mobile:my-10">
            <header class="text-center font-bigger text-size1">Quick Links</header>
            <div class="flex flex-row justify-around  max-mobile:justify-between py-1 font-normal text-size1">
                <a href="<?php echo e(route('welcome')); ?>">
                    <span>Home</span>
                </a>
                <a href="<?php echo e(route('about')); ?>">
                    <span>About us</span>
                </a>
                <a href="<?php echo e(route('faq')); ?>">
                    <span>FAQ</span>
                </a>
                <a href="#getInTouch">
                    <span>Contact us</span>
                </a>
            </div>
        </div>
        <div class="w-[6.5em] max-mobile:w-[10em] max-mobile:mx-auto">
            <header class="text-center font-bigger text-size1">Our socials</header>
            <div class="flex flex-row justify-around py-1 font-normal text-size1">
                <a href="#" class="">
                    <img src="<?php echo e(asset('/assets/landing_images/linkedin.png')); ?>" class="" alt="linkedin">
                </a>
                <a href="#" class="">
                    <img src="<?php echo e(asset('/assets/landing_images/facebook.png')); ?>" class="" alt="facebook">
                </a>
                <a href="#" class="">
                    <img src="<?php echo e(asset('/assets/landing_images/twitter.pn')); ?>g" class="w-[18px] h-[18px]" alt="twitter">
                </a>
            </div>
        </div>
    </footer>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
    document.getElementById('contactForm').addEventListener('submit', function () {
        const contactusButton = document.getElementById("contactUsButton")
        contactusButton.disabled = true;
        contactusButton.innerText = 'Getting In touch...';
        contactusButton.style.backgroundColor = 'rgba(197, 34, 22, 0.8)';
    });
</script>

</body>
</html>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/about.blade.php ENDPATH**/ ?>