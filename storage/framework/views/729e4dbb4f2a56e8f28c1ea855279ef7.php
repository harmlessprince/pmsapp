<footer
    class="flex flex-row max-mobile:flex-col items-start bg-col3 px-[15%] max-about:px-[5%] pt-[3%] max-mobile:py-[10%] pb-[3.5%] text-[#fff] gap-10">
    <div class="w-[19em] max-mobile:w-full">
        <div class="flex flex-row items-center">
            <img src="<?php echo e(asset('/assets/landing_images/logo2.svg')); ?>" class="w-[40px] h-[54px] mr-1" alt="perfraka logo">
            <img src="<?php echo e(asset('/assets/landing_images/logo_name2.png')); ?>" class="w-[103px] h-[11px]" alt="perfraka logo_name">
        </div>
        <div class="font-normal text-[#fff] text-normal">
            At PERFTRAKA, we specialize in providing cutting-edge Location Capture, Attendance.
        </div>
    </div>
    <div class="flex-1 max-mobile:w-full">
        <header class="font-bigger text-size1">Quick Links</header>
        <div class="grid grid-cols-2 gap-x-6 gap-y-2 py-2 font-normal text-size1 max-mobile:grid-cols-1">
            <a href="<?php echo e(route('welcome')); ?>"><span>Home</span></a>
            <a href="<?php echo e(route('about')); ?>"><span>About us</span></a>
            <a href="<?php echo e(route('faq')); ?>"><span>FAQ</span></a>
            <a href="<?php echo e(route('welcome')); ?>#getInTouch"><span>Contact us</span></a>
            <a href="<?php echo e(route('privacy-policy')); ?>"><span>Privacy Policy</span></a>
            <a href="<?php echo e(route('terms-and-conditions')); ?>"><span>Terms and Conditions</span></a>
            <a href="<?php echo e(route('account-deletion')); ?>"><span>Account Deletion</span></a>
        </div>
    </div>
    <div class="w-[6.5em] max-mobile:w-[10em]">
        <header class="text-center font-bigger text-size1">Our socials</header>
        <div class="flex flex-row justify-around py-1 font-normal text-size1">
            <a href="https://www.linkedin.com/company/perftraka/" target="_blank" rel="noopener" class="">
                <img src="<?php echo e(asset('/assets/landing_images/linkedin.png')); ?>" class="" alt="linkedin">
            </a>
            <a href="https://www.facebook.com/share/1EJwoCg6b7/" target="_blank" rel="noopener" class="">
                <img src="<?php echo e(asset('/assets/landing_images/facebook.png')); ?>" class="" alt="facebook">
            </a>
            <a href="https://x.com/PerfTraka" target="_blank" rel="noopener" class="">
                <img src="<?php echo e(asset('/assets/landing_images/twitter.png')); ?>" class="w-[18px] h-[18px]" alt="twitter">
            </a>
        </div>
    </div>
</footer>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/public-footer.blade.php ENDPATH**/ ?>