@extends('layouts.public')

@section('title', 'perftraka about page')

@push('head')
    {!! RecaptchaV3::initJs() !!}
@endpush

@push('styles')
    <style>
        .grecaptcha-badge { visibility: hidden !important; }
    </style>
@endpush

@section('content')

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

    {{-- get in touch --}}
    <section id="getInTouch" class="py-[5%] px-[15%]  max-about:px-[5%]">
        <header class="font-[800] text-[2.25em] text-center">Get In touch with us</header>
        <div class="text-center font-normal text-[#667085]">We’d love to hear from you. Please fill out this form.</div>
        @include('contact-us-form')
    </section>

@endsection

@push('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function () {
        const contactusButton = document.getElementById("contactUsButton")
        contactusButton.disabled = true;
        contactusButton.innerText = 'Getting In touch...';
        contactusButton.style.backgroundColor = 'rgba(197, 34, 22, 0.8)';
    });
</script>
@endpush
