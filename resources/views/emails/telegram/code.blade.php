@include('emails.parts.header')
<table border="0" cellpadding="20" cellspacing="0" width="100%" style="padding-bottom:10px;">
    <tr>
        <td valign="top" style="padding-bottom:1rem;border-collapse:collapse;" class="mainContainer">
            <div style="text-align:center;color:#505050;font-family:Arial;font-size:14px;line-height:150%;">
                <h1 class="h1" style="color:#5c6bc0;display:block;font-family:cursive;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;"> طلب حساب</h1>
                <h2 class="h1" style="color:#5c6bc0;display:block;font-family:Arial;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">Account Request</h2>
                <p style="margin-bottom: 0; font-weight: 800; font-family: cursive;">  عملينا العزيز {{$name}}:  كود التفعيل الخاص بك هو {{$code}} </p>
                <p style="margin-top: 0;">Dear client {{$name}}:
                    Activation code is {{ $code }}.</p>
            </div>
        </td>
    </tr>
</table>

@include('emails.parts.footer')
