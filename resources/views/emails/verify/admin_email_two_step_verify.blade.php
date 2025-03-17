@include('emails.parts.header')
<div style="text-align: center;">
    <h1>عزيزى {{$name}}</h1>

    <p>
        تم تسجيل الدخول من خلال الاى بى  {{ \request()->ip() }}  من خلال
        <br />
        متصفح  : {{ $browser }} @if($browser_version) (اصدار: {{ $browser_version }}) @endif <br>
        نظام تشغيل  : {{ $platform }} @if($platform_version) (اصدار: {{ $platform_version }}) @endif <br>
        <br />
        من فضلك قم باهمال هذة الرسالة لو لم تقم بعمل هذة الرسالة <br />

         كود التفعيل هو {{ $code }}
        <br />
        شكرا
    </p>
</div>

