<table>
    <thead>
    <tr>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;font-size: 20px;font-weight: bold;">قائمة باسماء الارسال</th>
        <th colspan="5" style="height: 40px;vertical-align: center;text-align: center;">{{ Carbon\Carbon::now()->format("D d/m/Y") }}</th>
    </tr>
    <tr>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">اسم المرسل</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">النوع</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">حالة الدفع</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> اسم المودع  </th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> بنك المودع  </th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> رقم المودع  </th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> تاريخ الإيداع  </th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> رقم الفاتورة  </th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> السعر  </th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> الضريبة  </th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> المجموع  </th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;"> الحالة  </th>
    </tr>
    </thead>
    <tbody>

    @foreach($items as $v)
        @if(array_key_exists("senders",$v))
            @foreach($v["senders"]  as $sender)
        <tr>
            <td>{{  trim(\App\Custom\Helpers::replaceLast("-AD", "", $sender["sender"]))}}</td>
            <td>{{ implode(",",array_column($sender["types_txt"],"txt")) }}</td>
            <td>{{ $sender["paid_status"] }}</td>
            @if ($loop->first)
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ $v["depositor_name"]??null }}</td>
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ $v["depositor_bank"]??null }}</td>
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ $v["depositor_number"]??null }}</td>
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ $v["deposit_date"]??null }}</td>
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ $v["invoice_id"]??null }}</td>
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ count($v["senders"]) * \App\Model\HawsabahPay::SENDER_PRICE }}</td>
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ count($v["senders"]) * \App\Model\HawsabahPay::SENDER_PRICE_TAX }}</td>
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ count($v["senders"]) * (\App\Model\HawsabahPay::SENDER_PRICE+\App\Model\HawsabahPay::SENDER_PRICE_TAX)}}</td>
            <td colspan="1" rowspan="{{ count($v["senders"]) }}" style="vertical-align: center;text-align: center;">{{ $v["status"]??null }}</td>
                @endif
        </tr>
            @endforeach
        @endif
    @endforeach
    </tbody>
</table>
