<table>
    <thead>
    <tr>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;font-size: 20px;font-weight: bold;"> ارشيف الرسائل    </th>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;">{{ Carbon\Carbon::now()->format("D d/m/Y") }}</th>
    </tr>
    <tr>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.number") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.country_iso") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.text") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.type") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.sent_status") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.msg_id") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.status") }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $v)
        <tr>
            <td>{{ $v["number"] }}</td>
            <td>{{ $v["country_iso"] }}</td>
            <td>
                {{-- $v["text"]->body??implode(",",$v["text"]) --}}
            </td>
            <td>{{ trans("export.type_".$v["type"]) }}</td>
            <td>{{ trans("export.s_type_".$v["sent_status"]) }}</td>
            <td>{{ $v["msg_id"] }}</td>
            <td>{{ trans("export.status_".$v["status"]) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
