<?php echo $__env->make('emails.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
رقم الاصدار :<?php echo e($ver); ?> <br/>

الحدث:
<?php echo $content; ?>


<?php echo $__env->make('emails.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/php/resources/views/emails/release/index.blade.php ENDPATH**/ ?>