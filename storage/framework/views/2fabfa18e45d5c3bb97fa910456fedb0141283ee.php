<table>
    <thead>
    <tr>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;font-size: 20px;font-weight: bold;"> ارشيف الرسائل    </th>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;"><?php echo e(Carbon\Carbon::now()->format("D d/m/Y")); ?></th>
    </tr>
    <tr>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.number")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.country_iso")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.text")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.type")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.sent_status")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.msg_id")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.status")); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($v["number"]); ?></td>
            <td><?php echo e($v["country_iso"]); ?></td>
            <td>
                
            </td>
            <td><?php echo e(trans("export.type_".$v["type"])); ?></td>
            <td><?php echo e(trans("export.s_type_".$v["sent_status"])); ?></td>
            <td><?php echo e($v["msg_id"]); ?></td>
            <td><?php echo e(trans("export.status_".$v["status"])); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /home/php/resources/views/exports/whatsapp.blade.php ENDPATH**/ ?>