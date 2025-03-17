  @if($status==1) 
<div class="success alert d-flex p-5" role="alert">
    <div class="message d-flex align-items-center">
        <i class="fas fa-2x  fa-check-circle"></i>
        <p class="mx-3"><span class="font-weight-bolder">
             لقد قام المالك بقبول طلبك
                @if($admin_commint)
                   تعليق المالك
                   {{$admin_commint}}
                 @endif
    </span></p>
    </div>
  @else
</div><div class="danger alert d-flex p-5" role="alert">
    <div class="message d-flex align-items-center">
        <i class="fas fa-2x  fa-check-circle"></i>
        <p class="mx-3"><span class="font-weight-bolder">
             لقد قام المالك برفض طلبك
                @if($admin_commint)
                   تعليق المالك
                   {{$admin_commint}}
                 @endif
    </span></p>
    </div>

</div>
  @endif
