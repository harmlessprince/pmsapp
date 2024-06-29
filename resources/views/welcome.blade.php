<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PERFTRAKA Welcome page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/images/favicon_io/site.webmanifest')}}">

    <style>
        /* this style is for the frequently used summary tag */
        .questions {
            width: 100%;
            background-color: #226F65;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-weight: 500;
            font-size: 18px;
            cursor: pointer;
            color: #fff;
            padding: 0.5rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center
        }

        .faq {
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            font-weight: 500;
            font-size: 18px;
            cursor: pointer;
            color: #000;
            padding: 1rem 0.5rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-primary">
<main>
    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{config('app.url')}}" class="flex items-center space-x-3 rtl:space-x-reverse md:ml-[5%]">
                <img src="{{asset('/assets/landing_images/logo.png')}}" class="h-8" alt="perfraka logo">
                <img src="{{asset('/assets/landing_images/logo_name.png')}}" class="" alt="perfraka logo_name">
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{route('login')}}">
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
                        <a href="{{route('welcome')}}"
                           class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-2 font-normal">Home</a>
                    </li>
                    <li>
                        <a href="{{route('about')}}"
                           class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-2 font-normal">About
                            us</a>
                    </li>
                    <li>
                        <a href="{{route('faq')}}"
                           class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-2 font-normal">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-col4 text-center relative mt-[60px] pb-[12em] max-mobile:pb-[7em] relative">
        <div
            class="h-[15px] w-[15px] rounded-full bg-[#1A544D] absolute top-[45px] max-mobile:top-[20%] left-[12%] max-mobile:left-[10%]"></div>
        <div class="h-[13px] w-[13px] rounded-full bg-[#1A544D] absolute top-[40px] left-[40%]"></div>
        <div class="h-[15px] w-[15px] rounded-full bg-[#268AE6] absolute top-[40px] right-[15%]"></div>
        <div
            class="h-[15px] w-[15px] rounded-full bg-[#E63026] absolute top-[145px] right-[36%] max-mobile:right-[25%]"></div>
        <div class="h-[13px] w-[13px] rounded-full bg-[#1A544D] absolute top-[235px] right-[36%]"></div>
        <div class="h-[13px] w-[13px] rounded-full bg-[#26E6A1] absolute bottom-[200px] right-[26%]"></div>

        <div class="absolute bottom-[100px] right-[15%] w-[70%] flex flex-row justify-between max-mobile:hidden">
            <img src="{{asset('/assets/landing_images/plan1.png')}}" class="w-[227px] h-[269px]" alt="plan1">
            <img src="{{asset('/assets/landing_images/plan2.png')}}" class="w-[227px] h-[269px]" alt="plan1">
        </div>

        {{-- circle --}}
        <div class="absolute top-[45px] max-mobile:top-[40%] left-0 w-full">
            <img src="{{asset('/assets/landing_images/round.png')}}"
                 class="mx-auto w-[31em] h-[31em] max-mobile:w-[20.25em] max-mobile:h-[20.25em]" alt="perfraka logo">
        </div>
        <div
            class="font-bigger text-[3em] max-mobile:text-[2.25em] text-col1 pt-[2em] w-[60%] max-mobile:w-[90%] mx-auto">
            Take Control of Security Management with <span class="text-col3">PERFTRAKA</span>
        </div>
        <div class="w-[32em] max-mobile:w-[90%] mx-auto text-[1.125em] text-[#54576F] font-normal">
            Manage security tasks seamlessly, from record-keeping to attendance tracking.
        </div>

        <div class="relative mt-5 z-10">
            <a href="#askedQuestions">
                <button
                    class="cursor-pointer rounded-[8px] px-4 py-1 border border-[#E63026] h-[2.75em] mr-5 text-[#E63026] text-size1 font-[600]">
                    Learn more
                </button>
            </a>
            <a href="#getInTouch">
                <span class="cursor-pointer text-[#C52216] text-[1em] font-[600] text-size1">Request for Demo</span>
            </a>
        </div>

        {{-- desktop image --}}
        <div class="absolute -bottom-[30%] left-0 w-full flex flex-row justify-center max-mobile:hidden">
            <img src="{{asset('/assets/landing_images/mobile2.png')}}" class="" alt="mobile">
            {{-- <img src="/assets/landing_images/mobile.png" class="max-mobile:w-[80%] max-mobile:h-[205px] mobile:hidden" alt="mobile"> --}}
        </div>
        {{-- mobile view --}}
        <div class="absolute -bottom-[12%] left-0 w-full flex flex-row justify-center mobile:hidden">
            <img src="{{asset('/assets/landing_images/mobile.png')}}" class="max-mobile:w-[19em] max-mobile:h-[160px]" alt="mobile">
        </div>
    </section>
    <section class="w-full h-[11em] max-mobile:h-[7.3em] bg-col3">
    </section>

    {{-- about --}}
    <section class="pt-[5%] px-[15%] max-mobile:px-[5%] bg-col4">
        <div class="text-center text-normal font-[500] text-col5">Learn about PERFTRAKA</div>
        <header class="font-[700] text-header max-mobile:text-[2em] text-col3 text-center">
            <span
                class="px-1 pb-2 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-[8px] after:w-full after:bg-[#E63026] after:rounded-[4px]">About Us</span>
        </header>
        <div class="pt-[1em] flex flex-row max-mobile:flex-col">
            <div class="pt-[5%] text-size1 font-normal">
                <p>
                    PERFTRAKA is a cloud based technology that provides cutting-edge Location Capture, 
                    Security Patrol Monitoring and Employee & Contractor Attendance Management solutions 
                    tailored to meet the diverse needs of businesses across various industries.
                </p>
                <p class="py-[5%]">
                    Using our innovative platform, security agencies and businesses can easily track security patrol, employee and contractor 
                    attendance in real-time. Whether you are managing a single location or multiple sites, our platform offers the flexibility 
                    and scalability to meet your unique requirements.
                </p>
                <p>
                    With QR codes installed at respective location sites or simply by pre-configuring 
                    the longitudinal and latitudinal co-ordinates of locations on the application, 
                    data is captured and written to the cloud where the administrator/supervisor/HR 
                    can monitor all security patrols and employee & contractor attendance in real time.
                </p>
                <a href="{{route('about')}}">
                    <button
                        class="cursor-pointer rounded-[8px] px-4 py-1 border border-[#E63026] mt-[1em] h-[2.75em] text-[#E63026] text-size1 font-[600]">
                        Read more
                    </button>
                </a>
            </div>
            <img src="{{asset('/assets/landing_images/mobile3.png')}}"
                 class="mt-[3.5em] w-[26em] h-[29.2em] ml-[5em] max-mobile:ml-0" alt="perfraka mobile">
        </div>

       
    </section>

    {{-- features --}}
    <section class="py-[5%] px-[15%] max-mobile:px-[5%]">
        <div class="text-center text-normal font-[500] text-col5">What’s special on our App</div>
        <header class="font-[700] text-header max-mobile:text-[2rem]  text-col3 text-center">
            <span
                class="px-1 pb-2 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-[8px] after:w-full after:bg-[#E63026] after:rounded-[4px]">Features </span>
        </header>

            <div class="ml-[1px] max-mobile:ml-0 w-full py-[2em]">
                <div class="flex flex-row max-mobile:flex-col justify-between w-full">
                    <div class="max-w-[49%] max-mobile:max-w-full m-h-[26.5em] py-5 px-3 rounded-[8px] border border-[#E7E8E7]">
                        <div class="rounded-full w-[50px] h-[50px] bg-col3 flex flex-row items-center justify-center">
                            <span class="material-symbols-outlined text-[#fff] w-[24px] h-[24px]">phone_iphone</span>
                        </div>

                        <div class="text-eighteen font-bigger mt-1 mb-2">
                            Mobile Application for Performance Management
                        </div>

                        <div class="text-normal font-normal text-[#8C8C8C]">
                            <p>
                                With PERFTRAKA you have real time reports of patrols by your security personnel and of the 
                                attendance of your employees and contractors i.e., 
                                field sales executives, cleaners, cooks, drivers,
                                 etcetera at all location sites regardless of geographical location.
                            </p>

                            <p class="pt-[1em]">
                                Whilst the QR code scanning feature ensures that security personnel patrol the assigned beats as required,
                                 it also verifies patrol routes and control access points quickly and accurately, 
                                 enhancing accountability and accuracy in their work.
                            </p>

                            <p class="pt-[1em]">
                                The attendance monitoring feature ensures that employees and contractors 
                                hired for specific tasks are available at the assigned locations sites at 
                                agreed times and actually worked for the length of time assigned.
                            </p>

                            <p class="pt-[1em]">
                                All these features enhances higher productivity and work performance.
                            </p>
                        </div>
                    </div>

                    <div
                        class="max-w-[49%]  max-mobile:max-w-full min-h-[26.5em] py-5 px-3 rounded-[8px] border border-[#E7E8E7] ml-4  max-mobile:ml-0  max-mobile:mt-5">
                        <div class="rounded-full w-[50px] h-[50px] bg-col3 flex flex-row items-center justify-center">
                            <span class="material-symbols-outlined text-[#fff] w-[24px] h-[24px]">monitoring</span>
                        </div>

                        <div class="text-eighteen font-bigger mt-1 mb-2">
                            Reports and Analytics tools
                        </div>

                        <div class="text-normal font-normal text-[#8C8C8C]">
                            <p>
                                Our robust reporting tools and dashboard provide insights on security patrol and employee attendance frequencies, gaps,
                                 lateness at work, response times, incident trends and many more through clear and easy to understand tabular and graphical reports.
                            </p>

                            <p class="pt-[1em]">
                                These insights help identify patterns and areas for improvement. 
                                They enable data-driven decisions to optimize security operations and work performance.
                            </p>

                            <p class="pt-[1em]">
                                Our reports are easily exportable to an excel file for storage and further distribution to other parties for better decision making.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- flex2 --}}
                <div class="flex flex-row max-mobile:flex-col justify-between w-full mt-4  max-mobile:mt-5">
                    <div class="max-w-[49%] max-mobile:max-w-full min-h-[26.5em] py-5 px-3 rounded-[8px] border border-[#E7E8E7]">
                        <div class="rounded-full w-[50px] h-[50px] bg-col3 flex flex-row items-center justify-center">
                            <span class="material-symbols-outlined text-[#fff] w-[24px] h-[24px]">sell</span>
                        </div>

                        <div class="text-eighteen font-bigger mt-1 mb-2">
                            Admin management 
                        </div>

                        <div class="text-normal font-normal text-[#8C8C8C]">
                            <p>
                                Unique and encrypted QR codes for each location or beat help manage access and track activities of security personnel efficiently.
                            </p>

                            <p class="pt-[1em]">
                                By capturing location and other information through the scanning of the QR code tags in real-time,
                                 the administrator/supervisor/HR can monitor all security patrols and employee attendance effectively. 
                            </p>
                        </div>
                    </div>

                    <div
                        class="max-w-[49%] max-mobile:max-w-full min-h-[26.5em] py-5 px-3 rounded-[8px] border border-[#E7E8E7] ml-4 max-mobile:ml-0 max-mobile:mt-5">
                        <div class="rounded-full w-[50px] h-[50px] bg-col3 flex flex-row items-center justify-center">
                            <span class="material-symbols-outlined text-[#fff] w-[24px] h-[24px]">wifi_off</span>
                        </div>

                        <div class="text-eighteen font-bigger mt-1 mb-2">
                            Offline Mode for the Mobile application
                        </div>

                        <div class="text-normal font-normal text-[#8C8C8C]">
                            <p>
                                The mobile app works offline and this enables security patrol, 
                                employee and contractor attendance monitoring to continue without internet connectivity.
                            </p>

                            <p class="pt-[1em]">
                                All data and activities are stored on the mobile phone and these are synced into the cloud 
                                based databases once the internet comes back up. 
                            </p>

                            <p class="pt-[1em]">
                                This functionality is crucial in areas with poor connectivity.  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- benefits --}}
    <section class="pt-[1rem] pb-[5rem] px-[15%]  max-mobile:px-[5%] bg-col4">
        <div class="text-center text-normal font-[500] text-col5">Benefits you get</div>
        <header class="font-[700] text-header max-mobile:text-[1.97rem] text-col3 text-center">
            <span
                class="px-1 pb-2 relative after:content-[''] after:absolute after:bottom-0 after:left-[25%] after:h-[8px] after:w-[50%] after:bg-[#E63026] after:rounded-[4px]">PERFTRAKA Benefits</span>
        </header>

        <div class="flex flex-row max-mobile:flex-col justify-between items-center mt-[4em]">
            <div class="max-w-[29%] max-mobile:max-w-full min-h-[40rem] border border-[#1A544D] rounded-[10px]">
            <div class="text-center w-full min-h-[20rem] justify-center pt-[3em] px-1 border border-[#647270] border-x-0 border-b-1 border-t-0 ">
                <img src="{{asset('/assets/landing_images/support.png')}}" class="w-[5.625] mx-auto" alt="24/7">    
                <div class="text-[28px] text-[#1A544D] font-[500]">
                    Security patrol, employee & contractor attendance monitoring
                </div>
            </div>
            <div class="text-center w-full min-h-[20rem] justify-center pt-[3em]">
                <img src="{{asset('/assets/landing_images/no-fee.png')}}" class="w-[5.625] mx-auto" alt="24/7">
                <div class="text-[28px] text-[#1A544D] font-[500]">
                    Cloud based with no additional cost of infrastructure
                </div>
            </div>
            </div>

            <div class="w-[40%] h-[47rem] max-mobile:hidden">
                <img src="{{asset('/assets/landing_images/benefit_phone.png')}}" class="w-full h-[100%]" alt="24/7">
            </div>

            <div class="max-w-[29%] max-mobile:max-w-full min-h-[40rem] border border-[#1A544D] rounded-[10px]">
                <div class="text-center w-full min-h-[20rem] justify-center pt-[3em] px-1 border border-[#647270] border-x-0 border-b-1 border-t-0 ">
                    <img src="{{asset('/assets/landing_images/use.png')}}" class="w-[5.625] mx-auto" alt="24/7">
                    <div class="text-[28px] text-[#1A544D] font-[500]">
                        Affordable, simple & Easy to install in 5Min.
                    </div>
                </div>
                <div class="text-center w-full min-h-[20rem] justify-center pt-[3em] px-1">
                    <img src="{{asset('/assets/landing_images/trial.png')}}" class="w-[5.625] mx-auto" alt="24/7">
                    <div class="text-[28px] text-[#1A544D] font-[500]">
                        1Month free trial
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="max-w-[28.5rem] max-mobile:hidden max-h-[20px] bg-[#DCDCDC] rounded-[50%] mx-auto text-col4 mt-[2rem]">
        .
        </div>
            
    </section>

    {{-- control and manage --}}
    <section class="bg-col4 w-full h-[23.5em] max-mobile:h-[100%] max-mobile:h-[100%]  max-mobile:pb-5">
        <div
            class="w-full flex flex-row  max-mobile:flex-col justify-between pl-[15%]  max-mobile:pl-0  pr-[8%]  max-mobile:pr-0 bg-col3">
            <div class="w-[55%]  max-mobile:w-full  max-mobile:px-[5%] text-[#ffffff] py-[2em]">
                <div class="font-bigger text-[2.25em]">
                    Control and manage all your operations from one convenient hub With &#160; PERFTRAKA
                </div>
                <div class="mt-5">
                    <a href="#getInTouch">
                    <button class="h-[44px] px-3 bg-[#E63026] rounded-[8px] text-size1 font-big">Contact us</button>
                    </a>
                </div>
            </div>
            <div class="relative max-mobile:px-[5%] max-mobile:pb-5">
                <img src="{{asset('/assets/landing_images/macbook.png')}}"
                     class="w-[31.3125em] max-mobile:w-[22.25em] h-[20.875em] max-mobile:h-[15.625em]" alt="mackbook">
                <img src="{{asset('/assets/landing_images/mobile4.png')}}"
                     class="absolute bottom-0  max-mobile:bottom-[13%] left-0  max-mobile:left-[5%] w-[93px] max-mobile:w-[4.2em] h-[199px] max-mobile:h-[8.875em]"
                     alt="mobile4">
            </div>
        </div>
    </section>

    {{-- get in touch --}}
    <section id="getInTouch" class="py-[5%] px-[15%]  max-mobile:px-[5%]">
        <header class="font-[800] text-[2.25em] text-center">Get In touch with us</header>
        <div class="text-center font-normal text-[#667085]">We’d love to hear from you. Please fill out this form.</div>

        <form class="mt-5" action="{{route('contact-us')}}" method="POST">
            @csrf
            <div class="flex flex-row justify-between mb-5">
                <div class="w-[48%]">
                    <label class="block text-[#344054] font-big text-normal">First name</label>
                    <input
                        type="text"
                        class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                        placeholder="First name" name="first_name" value="" required/>
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2"/> --}}
                </div>
                <div class="w-[48%]">
                    <label class="block text-[#344054] font-big text-normal">Last name</label>
                    <input
                        type="text"
                        class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                        placeholder="Last name" name="last_name" value="" required/>
                </div>
            </div>

            <div class="mb-5">
                <div class="w-full">
                    <label class="block text-[#344054] font-big text-normal">Email</label>
                    <input
                        type="email"
                        class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                        placeholder="you@company.com" name="email" value="" required/>
                </div>
            </div>

            <div class="mb-5">
                <div class="w-full">
                    <label class="block text-[#344054] font-big text-normal">Message</label>
                    <textarea id="message" rows="5"
                              class="outline-none block bg-transparent px-2 py-1 w-full text-[#667085] font-normal text-normal placeholder-color rounded-lg border border-[#D0D5DD]
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        " name="message" required></textarea>
                </div>
            </div>

            <button type="submit" class="bg-[#C52216] w-full h-[60px] rounded-[10px] text-size1 font-[600] text-[#ffffff]">Submit
            </button>
        </form>
    </section>

    {{-- frequently asked --}}
    <section id="askedQuestions" class="bg-col4 py-[5%] px-[15%]  max-mobile:px-[5%]">
        <header class="font-bigger text-header text-center">Frequently Asked <span
                class="text-[#C52216]">Questions</span></header>
        <form class="relative w-full my-5" action="{{route('faq')}}" method="GET">
            <input type="search" placeholder="Type your Questions"
                   class="w-full pr-[75px] bg-[#fff] text-eighteen font-big h-[3.75em] rounded-[10px] outline-none border border-[#838383]"
                   name="search"
                   value="{{request()->query('search')}}"
            />
            <button
            type="submit"
                class="flex flex-row items-center justify-center absolute top-[1px] right-0 bg-col3 w-[64px] h-[66px] rounded-tr-[10px] rounded-br-[10px]">
                <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#fff] ">Search</span>
        </button>
        </form>
        @foreach($faqs as $faq)
            <div class="group my-5">
                <div id="{{$faq->id}}" class="questions faq">
                    <span class="font-[500]">{{$faq->question}}</span>
                    <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#000]">expand_more</span>
                </div>
                <article class="article hidden bg-[#fff] text-[#000] px-2 pt-5 pb-10 text-eighteen font-normal text-left">
                   {{$faq->answer}}
                </article>
            </div>
        @endforeach
    </section>

    <footer
        class="flex flex-row  max-mobile:flex-col items-end bg-col3 px-[15%]  max-mobile:px-[5%] pt-[3%] max-mobile:py-[10%] pb-[3.5%] text-[#fff]">
        <div class="w-[19em] max-mobile:w-full">
            <div class="flex flex-row items-center">
                <img src="{{asset('/assets/landing_images/logo2.svg')}}" class="w-[40px] h-[54px] mr-1" alt="perfraka logo">
                <img src="{{asset('/assets/landing_images/logo_name2.png')}}" class="w-[103px] h-[11px]" alt="perfraka logo_name">
            </div>
            <div class="font-normal text-[#fff] text-normal">
                At PERFTRAKA, we specialize
                in providing cutting-edge Location Capture, Attendance.
            </div>
        </div>
        <div class="w-[23em]  max-mobile:w-full mx-20 max-mobile:mx-0  max-mobile:my-10">
            <header class="text-center font-bigger text-size1">Quick Links</header>
            <div class="flex flex-row justify-around  max-mobile:justify-between py-1 font-normal text-size1">
                <a href="{{route('welcome')}}">
                    <span>Home</span>
                </a>
                <a href="{{route('about')}}">
                    <span>About us</span>
                </a>
                <a href="{{route('faq')}}">
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
                    <img src="{{asset('/assets/landing_images/linkedin.png')}}" class="" alt="linkedin">
                </a>
                <a href="#" class="">
                    <img src="{{asset('/assets/landing_images/facebook.png')}}" class="" alt="facebook">
                </a>
                <a href="#" class="">
                    <img src="{{asset('/assets/landing_images/twitter.png')}}" class="w-[18px] h-[18px]" alt="twitter">
                </a>
            </div>
        </div>
    </footer>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>

    const faq = document.getElementsByClassName("faq");
    const ques = document.getElementsByClassName("questions");
    let i;

    for (i = 0; i < faq.length; i++) {
        faq[i].addEventListener("click", function () {
            // change all summary to white
            for (var k = 0; k < ques.length; k++) {
                ques[k].classList.add("faq")
            }
            this.classList.remove("faq");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                this.classList.add("faq");
                content.style.display = "none";
            } else {
                // First, close all other collapsibles
                var allContent = document.getElementsByClassName("article");
                for (var j = 0; j < allContent.length; j++) {
                    allContent[j].style.display = "none";
                }
                // Then, open this collapsible
                content.style.display = "block";

            }
        });
    }


</script>
</body>
</html>
