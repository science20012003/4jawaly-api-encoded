@if(isset($refuse_reason_id) || isset($other_reason))
   @if(!empty($other_reason))
        <div class="danger alert d-flex p-5" role="alert">
            <div class="message d-flex align-items-center flex-column">
                <div class="d-flex" >
                    <i class="fas fa-2x fa-times-circle"></i>
                    <p class="mx-3"><span class="font-weight-bolder">عميلنا العزيز نعتذر منكم لم نتمكن من الاستدلال علي الايداع ربما يعود ذلك الي  :</span> </p>
                </div>
                <ul class="mt-3">
                    <li>{!! nl2br($other_reason) !!}</li>
                </ul>
            </div>

        </div>
    @elseif(!empty($refuse_reason_id))
         <div class="danger alert d-flex p-5" role="alert">
             <div class="message d-flex align-items-center flex-column">
                 <div class="d-flex" >
                     <i class="fas fa-2x fa-times-circle"></i>
                     <p class="mx-3"><span class="font-weight-bolder">عميلنا العزيز نعتذر منكم لم نتمكن من الاستدلال علي الايداع ربما يعود ذلك الي  :</span> </p>
                 </div>
                 <ul class="mt-3">
                     <li>{{ \App\Model\RefuseReason::select(["reason"])->where("id",$refuse_reason_id)->first()->reason ?? "" }}</li>
                 </ul>
             </div>

         </div>
     @else
        <div class="danger alert d-flex p-5" role="alert">
            <div class="message d-flex align-items-center flex-column">
                <div class="d-flex" >
                    <i class="fas fa-2x fa-times-circle"></i>
                    <p class="mx-3"><span class="font-weight-bolder">عميلنا العزيز نعتذر منكم لم نتمكن من الاستدلال علي الايداع ربما يعود ذلك الي  :</span> </p>
                </div>
                <ul class="mt-3">
                    <li>خطأ في التحويل </li>
                    <li>لم يصل المبلغ الي حساب الشركه حتي الان </li>
                    <li>خطأ بالبيانات المرسلة</li>
                    <li>المبلغ المستلم اقل من المبلغ الموضح بالتذكرة - يجب فتح تذكره جديده بالمبلغ الصحيح</li>
                </ul>
            </div>

        </div>

    @endif

@else


<div class="danger alert d-flex p-5" role="alert">
    <div class="message d-flex align-items-center flex-column">
        <div class="d-flex" >
            <i class="fas fa-2x fa-times-circle"></i>
            <p class="mx-3"><span class="font-weight-bolder">عميلنا العزيز نعتذر منكم لم نتمكن من الاستدلال علي الايداع ربما يعود ذلك الي  :</span> </p>
        </div>
        <ul class="mt-3">
            <li>خطأ في التحويل </li>
            <li>لم يصل المبلغ الي حساب الشركه حتي الان </li>
            <li>خطأ بالبيانات المرسلة</li>
            <li>المبلغ المستلم اقل من المبلغ الموضح بالتذكرة - يجب فتح تذكره جديده بالمبلغ الصحيح</li>
        </ul>
    </div>

</div>


    @endif
