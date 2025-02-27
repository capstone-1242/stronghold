




<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['active' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<a class="<?php echo e($active ? 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white' : 'font-medium text-white'); ?>" 
   aria-current="<?php echo e($active ? 'page' : 'false'); ?>" 
   <?php echo e($attributes); ?>>
   <?php echo e($slot); ?>

</a>
<?php /**PATH C:\Users\User\Herd\example\resources\views/components/nav-link.blade.php ENDPATH**/ ?>