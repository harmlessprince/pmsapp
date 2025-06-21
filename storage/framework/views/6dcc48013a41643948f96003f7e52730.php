<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['disabled' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['disabled' => false]); ?>
<?php foreach (array_filter((['disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<input <?php echo e($disabled ? 'disabled' : ''); ?> <?php echo $attributes->merge(['class' => 'w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                            placeholder-color font-normal text-normal
                            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                     ']); ?>>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/components/text-input.blade.php ENDPATH**/ ?>