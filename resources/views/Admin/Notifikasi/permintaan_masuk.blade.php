
<a href="{{route('permintaan.list')}}" class="dropdown-item">
    <!-- Message Start -->
    <div class="media">
    <img src="{{asset('img/user.png')}}" width="25%" alt="User Avatar" class="img-size-50 img-circle mr-3">
      <div class="media-body">
        <h3 class="dropdown-item-title" style="font-size:12px;">
           <strong>{{$notifikasi->data['bagian']}}</strong> 
          <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
        </h3>
        <p class="text-sm" style="font-size:12px;">Membuat Permintaan <strong style="color:cornflowerblue">{{$notifikasi->data['permintaan']['judul']}}</strong></p>
      <p class="text-sm text-muted" style="font-size:8px;" ><i class="fa fa-clock-o mr-1"></i> {{\Carbon\Carbon::parse($notifikasi->created_at)->diffForHumans()}}</p>
      </div>
    </div>
    <!-- Message End -->
</a>
<div class="dropdown-divider"></div>

