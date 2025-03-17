<table>
    <thead>
    <tr>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;font-size: 20px;font-weight: bold;">قائمة باسماء الارسال</th>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;">{{ Carbon\Carbon::now()->format("D d/m/Y") }}</th>
    </tr>
    <tr>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.client_name") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.customer_type_txt") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.start_date_txt") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.duration") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.cr_number") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.enterprise_unified_number") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.representative_email") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.representative_mobile") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.representative_name") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.is_already_exist") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.source") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.username") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.sender") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.types") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.other_emails") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.sender_status_last") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.status_txt") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.account")}}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.sent_to_zajel") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.sent_to_site") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.site_api_response") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.error_msg") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.full_response") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.agent_refuse_reason") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.last_refuse_by") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.last_refuse_at") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.hawsabah_refuse_reason") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.attachment1_path") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.attachment2_path") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.attachment3_path") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.ticket_id") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.created_at") }}</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ trans("export.updated_at") }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $v)
        <tr>
            <td>{{ $v["client_name"] }}</td>
            <td>{{ $v["customer_type_txt"] }}</td>
            <td>{{ $v["start_date_txt"] }}</td>
            <td>{{ $v["duration"] }}</td>
            <td>{{ $v["cr_number"] }}</td>
            <td>{{ $v["enterprise_unified_number"] }}</td>
            <td>{{ $v["representative_email"] }}</td>
            <td>{{ $v["representative_mobile"] }}</td>
            <td>{{ $v["representative_name"] }}</td>
            <td>{{ $v["is_already_exist"] }}</td>
            <td>{{ $v["source"] }}</td>
            <td>{{ $v["username"] }}</td>
            <td>{{ $v["sender"] }}</td>
            <td>{{ implode(",",array_column($v["types_txt"],"txt")) }}</td>
            <td>{{ $v["other_emails"] }}</td>
            <td>{{ $v["sender_status_last"] }}</td>
            <td>{{ $v["status_txt"] }}</td>
            <td>{{ $v["account"]["name"]??"" }}</td>
            <td>{{ $v["sent_to_zajel"] }}</td>
            <td>{{ $v["sent_to_site"] }}</td>
            <td>{{ $v["site_api_response"] }}</td>
            <td>{{ $v["error_msg"] }}</td>
            <td>{{ $v["full_response"] }}</td>
            <td>{{ $v["agent_refuse_reason"] }}</td>
            <td>{{ $v["refused_by"]["name"]??null }}</td>
            <td>{{ $v["last_refuse_at"] }}</td>
            <td>{{ $v["hawsabah_refuse_reason"] }}</td>
            <td style="text-align: center;">
                @if(!empty($v["attachment1_path"]))
                    <a href="{{ $v["hawsabah_sin_1"] }}">{{ $v["attachment1_name"] }}</a>
                @else
                    -
                @endif
            </td>
            <td style="text-align: center;">             @if(!empty($v["attachment2_path"]))
                    <a href="{{ $v["hawsabah_sin_1"] }}">{{ $v["attachment2_name"] }}</a>
                @else
                    -
                @endif</td>
            <td style="text-align: center;">             @if(!empty($v["attachment3_path"]))
                    <a href="{{ $v["hawsabah_sin_1"] }}">{{ $v["attachment3_name"] }}</a>
                @else
                    -
                @endif</td>
            <td>{{ $v["ticket_id"] }}</td>
            <td style="text-align: center;">{{ $v["created_at"] }}</td>
            <td style="text-align: center;">{{ $v["updated_at"] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
