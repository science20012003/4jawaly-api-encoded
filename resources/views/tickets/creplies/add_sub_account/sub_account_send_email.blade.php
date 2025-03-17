<div class="success alert d-flex p-5" role="alert">
    <div class="message d-flex align-items-center">
        <i class="fas fa-2x  fa-check-circle"></i>
        <p class="mx-3"><span class="font-weight-bolder">
                تم ارسال تنبية  للبريد الاكترونى
                {{$email}}
                حالة الوصول :
                @if($status)
                    وصلت بنجاح
                @else
 لم يتم الوصول
                 @endif
    </span></p>
    </div>

</div>
