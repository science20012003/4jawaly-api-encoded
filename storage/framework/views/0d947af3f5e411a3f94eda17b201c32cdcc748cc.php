<div class="success alert d-flex p-5" role="alert">
    <div class="message d-flex align-items-center">
        <i class="fas fa-2x  fa-check-circle"></i>
        <p class="mx-3"><span class="font-weight-bolder">
 تم ارسال كود اعادة تعيين كلمة المرور على الجوال
                 <?php echo e($user->account->mobile); ?>

                حالة الوصول :
                <?php if($status): ?>
                    وصلت بنجاح
                <?php else: ?>
 لم يتم الوصول
                 <?php endif; ?>
    </span></p>
    </div>

</div>
<?php /**PATH /home/php/resources/views/tickets/creplies/reset_account_send_mobile_code.blade.php ENDPATH**/ ?>