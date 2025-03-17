@include('emails.parts.header')
<table border="0" cellpadding="20" cellspacing="0" width="100%" style="padding-bottom:10px;">
    <tr>
        <td valign="top" style="padding-bottom:1rem;border-collapse:collapse;" class="mainContainer">
            <div style="text-align:center;color:#505050;font-family:Arial;font-size:14px;line-height:150%;">
                <h1 class="h1"
                    style="color:#5c6bc0;display:block;font-family:cursive;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">
                تاكيد ارسال رسالة
                </h1>
                <h2 class="h1"
                    style="color:#5c6bc0;display:block;font-family:Arial;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">
                    SMS verification</h2>
                <p style="margin-bottom: 0; font-weight: 800; font-family: Arial;text-align: right;"> عملينا العزيز {{ $account->name }}:
                    تم ارسال رسالة من المستخدم الفرعى الذى بياناته كالتالي<br>
                    الاسم:{{$sub_account->name}} <br >
                    رقم الجوال:{{$sub_account->mobile}} <br />
                    تفاصيل الارسالية:<br>
                    نوع الارسالية:{{$text_array["type_txt"]}}<br />
                    عدد الارقام المرسل اليها:{{$text_array["numbers"]}}<br />
                    نص الرسالة:
                    {{$text_array["text"]}}

                </p>

            </div>
        </td>
    </tr>
    <tr>
        <td align="center" style="border-collapse:collapse;">
            <table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:10px;">
                <tbody>
                    <tr align="center">
                        <td align="center" valign="middle" style="border-collapse:collapse;">
                            <div style="display: inline-block;">
                                <a class="buttonText" href="{{ $accept }}" target="_blank"
                                    style="color: #70c05c; text-decoration: none; font-weight: normal; display: inline-block; border: 2px solid #5c6bc0; padding: 10px 40px; font-weight: 800; font-family: Arial; margin-right: 10px;">
                                    موافقه </a>
                                <a class="buttonText" href="{{ $cancel }}" target="_blank"
                                    style="color: #c05c75; text-decoration: none; font-weight: normal; display: inline-block; border: 2px solid #5c6bc0; padding: 10px 40px; font-weight: 800; font-family: Arial;">
                                    رفض </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
@include('emails.parts.footer')
