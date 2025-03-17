<table>
    <thead>
    <tr>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;font-size: 20px;font-weight: bold;"> ارشيف الرسائل    </th>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;">{{ Carbon\Carbon::now()->format("D d/m/Y") }}</th>
    </tr>
    <tr>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.text") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.type") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.sent_status") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.total") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.queued_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.failed_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.in_queued_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.ready_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.no_package_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.service_sent_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.sent_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.delivered_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.viewed_count") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.read_count") }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $v)
        <tr>
            <td>{{ $v["text"]["body"]??implode(",",$v["text"]) }}</td>
            <td>{{ $v["type"] }}</td>
            <td>{{ $v["sent_status"] }}</td>
            <td>{{ $v["total"] }}</td>
            <td>{{ $v["queued_count"] }}</td>
            <td>{{ $v["failed_count"] }}</td>
            <td>{{ $v["in_queued_count"] }}</td>
            <td>{{ $v["ready_count"] }}</td>
            <td>{{ $v["no_package_count"] }}</td>
            <td>{{ $v["service_sent_count"] }}</td>
            <td>{{ $v["sent_count"] }}</td>
            <td>{{ $v["delivered_count"] }}</td>
            <td>{{ $v["viewed_count"] }}</td>
            <td>{{ $v["read_count"] }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
