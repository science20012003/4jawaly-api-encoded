<div class="success alert d-flex p-5" role="alert">
    <div class="message d-flex align-items-center">
        <i class="fas fa-2x  fa-check-circle"></i>
        <p class="mx-3"><span class="font-weight-bolder">
                تم ارسال كود التحقق  للبريد الاكترونى
                <?php echo e($user->account->email); ?>

                حالة الوصول :
                <?php if($status): ?>
                    وصلت بنجاح
                <?php else: ?>
 لم يتم الوصول
                 <?php endif; ?>
    </span></p>
    </div>

</div>
<?php /**PATH /home/php/resources/views/tickets/creplies/reset_pass_account_send_email_code.blade.php ENDPATH**/ ?>