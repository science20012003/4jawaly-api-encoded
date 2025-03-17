@include('emails.parts.header')
رقم الاصدار :{{$ver}} <br/>

الحدث:
{!! $content !!}

@include('emails.parts.footer')
