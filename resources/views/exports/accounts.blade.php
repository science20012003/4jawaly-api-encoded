<table>
    <thead>
    <tr>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">ID</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">Title</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">Mobile</th>
        <th style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $v)
        {{ \Illuminate\Support\Facades\Log::info($v) }}
        <tr>
            <td style="text-align: center;">{{ $v["id"] }}</td>
            <td style="direction: rtl;text-align: right;" >{{ $v["title"] }}</td>
            <td style="text-align: center;font-weight: bold;background-color: #5D6975;color: white;">{{ $v["mobile"] }}</td>
            <td style="text-align: center; font-weight: bold;background-color: #5D6975;color: white;">{{ $v["email"] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
