<?php echo $__env->make('emails.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<h1>عزيزى <?php echo e($name); ?></h1>

<p>
    تم تسجيل الدخول من خلال الاى بى  <?php echo e(\request()->ip()); ?>  من خلال
    <br />
    متصفح  : <?php echo e($browser); ?> <?php if($browser_version): ?> (اصدار: <?php echo e($browser_version); ?>) <?php endif; ?> <br>
    نظام تشغيل  : <?php echo e($platform); ?> <?php if($platform_version): ?> (اصدار: <?php echo e($platform_version); ?>) <?php endif; ?> <br>
    <br />
    من فضلك قم باهمال هذة الرسالة لو لم تقم بعمل هذة الرسالة <br />

     كود التفعيل هو <?php echo e($code); ?>

    <br />
    شكرا
</p>
<?php echo $__env->make('emails.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/php/resources/views/emails/verify/email_two_step_verify.blade.php ENDPATH**/ ?>