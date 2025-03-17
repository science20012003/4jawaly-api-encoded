<table>
    <thead>
    <tr>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;font-size: 20px;font-weight: bold;">قائمة باسماء الارسال</th>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;"><?php echo e(Carbon\Carbon::now()->format("D d/m/Y")); ?></th>
    </tr>
    <tr>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.client_name")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.customer_type_txt")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.start_date_txt")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.duration")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.cr_number")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.enterprise_unified_number")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.representative_email")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.representative_mobile")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.representative_name")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.is_already_exist")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.source")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.username")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.sender")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.types")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.other_emails")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.sender_status_last")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.status_txt")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.account")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.sent_to_zajel")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.sent_to_site")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.site_api_response")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.error_msg")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.full_response")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.agent_refuse_reason")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.last_refuse_by")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.last_refuse_at")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.hawsabah_refuse_reason")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.attachment1_path")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.attachment2_path")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.attachment3_path")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.ticket_id")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.created_at")); ?></th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"><?php echo e(trans("export.updated_at")); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($v["client_name"]); ?></td>
            <td><?php echo e($v["customer_type_txt"]); ?></td>
            <td><?php echo e($v["start_date_txt"]); ?></td>
            <td><?php echo e($v["duration"]); ?></td>
            <td><?php echo e($v["cr_number"]); ?></td>
            <td><?php echo e($v["enterprise_unified_number"]); ?></td>
            <td><?php echo e($v["representative_email"]); ?></td>
            <td><?php echo e($v["representative_mobile"]); ?></td>
            <td><?php echo e($v["representative_name"]); ?></td>
            <td><?php echo e($v["is_already_exist"]); ?></td>
            <td><?php echo e($v["source"]); ?></td>
            <td><?php echo e($v["username"]); ?></td>
            <td><?php echo e($v["sender"]); ?></td>
            <td><?php echo e(implode(",",array_column($v["types_txt"],"txt"))); ?></td>
            <td><?php echo e($v["other_emails"]); ?></td>
            <td><?php echo e($v["sender_status_last"]); ?></td>
            <td><?php echo e($v["status_txt"]); ?></td>
            <td><?php echo e($v["account"]["name"]??""); ?></td>
            <td><?php echo e($v["sent_to_zajel"]); ?></td>
            <td><?php echo e($v["sent_to_site"]); ?></td>
            <td><?php echo e($v["site_api_response"]); ?></td>
            <td><?php echo e($v["error_msg"]); ?></td>
            <td><?php echo e($v["full_response"]); ?></td>
            <td><?php echo e($v["agent_refuse_reason"]); ?></td>
            <td><?php echo e($v["refused_by"]["name"]??null); ?></td>
            <td><?php echo e($v["last_refuse_at"]); ?></td>
            <td><?php echo e($v["hawsabah_refuse_reason"]); ?></td>
            <td style="text-align: center;">
                <?php if(!empty($v["attachment1_path"])): ?>
                    <a href="<?php echo e($v["hawsabah_sin_1"]); ?>"><?php echo e($v["attachment1_name"]); ?></a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td style="text-align: center;">             <?php if(!empty($v["attachment2_path"])): ?>
                    <a href="<?php echo e($v["hawsabah_sin_1"]); ?>"><?php echo e($v["attachment2_name"]); ?></a>
                <?php else: ?>
                    -
                <?php endif; ?></td>
            <td style="text-align: center;">             <?php if(!empty($v["attachment3_path"])): ?>
                    <a href="<?php echo e($v["hawsabah_sin_1"]); ?>"><?php echo e($v["attachment3_name"]); ?></a>
                <?php else: ?>
                    -
                <?php endif; ?></td>
            <td><?php echo e($v["ticket_id"]); ?></td>
            <td style="text-align: center;"><?php echo e($v["created_at"]); ?></td>
            <td style="text-align: center;"><?php echo e($v["updated_at"]); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /home/php/resources/views/exports/hawsabah.blade.php ENDPATH**/ ?>