<?php if($paginator->hasPages()): ?>
    <div
        class="text-basic flex flex-row justify-between p-[2%] items-center max-lg:flex-col max-lg:items-start">
        <div class="text-normal font-big">
            <div>
                <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                    <?php echo __('Showing'); ?>

                    <?php if($paginator->firstItem()): ?>
                        <span class="font-medium"><?php echo e($paginator->firstItem()); ?></span>
                        <?php echo __('to'); ?>

                        <span class="font-medium"><?php echo e($paginator->lastItem()); ?></span>
                    <?php else: ?>
                        <?php echo e($paginator->count()); ?>

                    <?php endif; ?>
                    <?php echo __('of'); ?>

                    <span class="font-medium"><?php echo e($paginator->total()); ?></span>
                    <?php echo __('results'); ?>

                </p>
            </div>
        </div>
        <div>
            <div aria-label="Page navigation example" class="max-lg:hidden">
                <ul class="inline-flex -space-x-px text-normal font-big h-10 bg-db">
                    <li>
                        <?php if($paginator->onFirstPage()): ?>
                            <span
                                class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-s-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <img src="<?php echo e(asset('assets/images/arrow-left.png')); ?>" alt="arrow-left"
                                     class="mr-2 w-[20px] h-[20px]"/>
                                <span>Previous</span>
                            </span>
                        <?php else: ?>
                            <a href="<?php echo e($paginator->previousPageUrl()); ?>"
                               class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-s-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <img src="<?php echo e(asset('assets/images/arrow-left.png')); ?>" alt="arrow-left"
                                     class="mr-2 w-[20px] h-[20px]"/>
                                <span>Previous</span>
                            </a>
                        <?php endif; ?>

                    </li>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_string($element)): ?>
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-white border border-primary_color  cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600"><?php echo e($element); ?></span>
                            </span>
                        <?php endif; ?>

                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600"><?php echo e($page); ?></span>
                                    </span>
                                <?php else: ?>

                                    <li>
                                        <a href="<?php echo e($url); ?>"
                                           class="flex items-center justify-center px-4 h-10 leading-tight text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                            <?php echo e($page); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        
                        <?php if($paginator->hasMorePages()): ?>
                            <a href="<?php echo e($paginator->nextPageUrl()); ?>"
                               class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-e-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <span>Next</span>
                                <img src="<?php echo e(asset('assets/images/arrow-right.png')); ?>" alt="arrow-right" class="ml-2"/>
                            </a>
                        <?php else: ?>
                            <span
                                class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-e-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <span>Next</span>
                                <img src="<?php echo e(asset('assets/images/arrow-right.png')); ?>" alt="arrow-right" class="ml-2"/>
                            </span>
                        <?php endif; ?>

                    </li>
                </ul>
            </div>

            <!-- pagination for mobile -->
            <div aria-label="Page navigation example" class="lg:hidden mt-2">
                <ul class="inline-flex -space-x-px text-normal font-big h-10 bg-db">
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-s-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                            <img src="<?php echo e(asset('assets/images/arrow-left.png')); ?>" alt="arrow-left"
                                 class="mr-2 w-[20px] h-[20px]"/>
                            <span>Previous</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-4 h-10 leading-tight text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">1</a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-4 h-10 leading-tight text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">...</a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-4 h-10 leading-tight text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">10</a>
                    </li>
                    <li>
                        
                        <?php if($paginator->hasMorePages()): ?>
                            <a href="<?php echo e($paginator->nextPageUrl()); ?>"
                               class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-e-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <span>Next</span>
                                <img src="<?php echo e(asset('assets/images/arrow-right.png')); ?>" alt="arrow-right" class="ml-2"/>
                            </a>
                        <?php else: ?>
                            <span
                                class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-e-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <span>Next</span>
                                <img src="<?php echo e(asset('assets/images/arrow-right.png')); ?>" alt="arrow-right" class="ml-2"/>
                            </span>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/vendor/pagination/custom.blade.php ENDPATH**/ ?>