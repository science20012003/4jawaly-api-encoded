<?php echo $__env->make('emails.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <table border="0" cellpadding="20" cellspacing="0" width="100%" style="padding-bottom:10px;">
                                            <tr>
                                                <td valign="top" style="padding-bottom:1rem;border-collapse:collapse;" class="mainContainer">
                                                    <div style="text-align:center;color:#505050;font-family:Arial;font-size:14px;line-height:150%;">
                                                        <h1 class="h1" style="color:#5c6bc0;display:block;font-family:cursive;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;"> اضافة حساب فرعى لحسابكم  لموقع فورجوالي </h1>
                                                        <h2 class="h1" style="color:#5c6bc0;display:block;font-family:Arial;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">Adding a sub-account to your account . </h2>
                                                        <p style="margin-bottom: 0; font-weight: 800; font-family: cursive;direction: rtl;">
                                                        عملينا العزيز <?php echo e($name); ?>

                                                            تم اضافة حساب فرعى لحسابكم باسم <?php echo e($data->name); ?> ورقم جوال <?php echo e($data->mobile); ?>

                                                        </p>
                                                        <p style="margin-top: 0;direction: ltr;">Dear valued customer <?php echo e($name); ?>,

                                                            A sub-account has been added to your account with the name <?php echo e($data->name); ?> and mobile number <?php echo e($data->mobile); ?>.</p>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>
<?php echo $__env->make('emails.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/php/resources/views/emails/sub_account_invitation/alert.blade.php ENDPATH**/ ?>