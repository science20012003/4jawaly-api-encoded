@include('emails.parts.header')
<table border="0" cellpadding="20" cellspacing="0" width="100%" style="padding-bottom:10px;">
    <tr>
        <td valign="top" style="padding-bottom:1rem;border-collapse:collapse;" class="mainContainer">
            <div style="text-align:center;color:#505050;font-family:Arial;font-size:14px;line-height:150%;">
                <h1 class="h1" style="color:#5c6bc0;display:block;font-family:cursive;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;"> تجديد اسم مرسل  </h1>
                <h2 class="h1" style="color:#5c6bc0;display:block;font-family:Arial;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">Sender renew</h2>
                <p style="margin-bottom: 0; font-weight: 800; font-family: Arial;">  عملينا العزيز {{$name}}:  برجاء الضغط على الزر التالي لتجديد اسم المرسل {{$sender}} </p>
                <p style="margin-bottom: 0; font-weight: 800; font-family: Arial;">  {{$sender}} </p>
                <p style="margin-top: 0;">Dear client {{$name}}:
                    please click the following button to complete sender renew </p>
                     <p style="margin-top: 0;">{{ $sender }}.</p>
            </div>
        </td>
    </tr>
    <tr>
        <td align="center" style="border-collapse:collapse;">
            <table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:10px;">
                <tbody>
                <tr align="center">
                    <td align="center" valign="middle" style="border-collapse:collapse;">
                        <a class="buttonText" href="{{ $link }}" target="_blank" style="color: #5c6bc0;text-decoration: none;font-weight: normal;display: block;border: 2px solid #5c6bc0;padding: 10px 80px;font-weight: 800; font-family: cursive;">  اضفط هنا   </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
@include('emails.parts.footer')
