@include('emails.parts.header')
<table border="0" cellpadding="20" cellspacing="0" width="100%" style="padding-bottom:10px;">
    <tr>
        <td valign="top" style="padding-bottom:1rem;border-collapse:collapse;" class="mainContainer">
            <div style="text-align:center;color:#505050;font-family:Arial;font-size:14px;line-height:150%;">
                <h1 class="h1" style="color:#5c6bc0;display:block;font-family:cursive;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">تصدير ملف الارقام و المجموعات </h1>
                <h2 class="h1" style="color:#5c6bc0;display:block;font-family:Arial;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">Exporting file from numbers and groups</h2>
                <p style="margin-bottom: 0; font-weight: 800; font-family: cursive;">  عملينا العزيز {{$name}} تم الانتهاء من تصدير الملف

                    @if($sub_account instanceof \App\Model\SubAccount)
                        الخاص بالحساب الفرعى رقم {{$sub_account->mobile}}
                    @endif
                    :
                    <br />
               <a href="{!! $mmessage !!}">اضغط هنا للتحميل</a>
                    <br />
                    يرجى العلم اننا نقوم بارسال الرابط يكون صالح لمدة ساعة وذلك للخصوصية ويمكنك الذهاب للموقع لتحميل الملف من جديد
                </p>
                <p style="margin-top: 0;">Dear client {{$name}}:
                    File has been Exported successfully.</p>

                <br />
                <a href="{!! $mmessage !!}">download from here  </a>
                <br />
                url valid for one hour you can download it from website
            </div>
        </td>
    </tr>
    <tr>
        <td align="center" style="border-collapse:collapse;">
            <table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:10px;">
                <tbody>
                <tr align="center">
                    <td align="center" valign="middle" style="border-collapse:collapse;">

                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
@include('emails.parts.footer')
