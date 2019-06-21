@extends('Admin.layout')
@section('konten')
<style>
p{
    margin-bottom: 0px;
}
</style>
    <div class="container">
        <div class="col-md-8 mx-auto">
                <div class="card   mt-5">
                        <div class="list-group">
                            @forelse ($notif as $notifikasi)
                            @if ($notifikasi->type=="App\Notifications\PermintaanMasuk")
                            <a href="{{route('permintaan.list')}}" class="list-group-item list-group-item-action">
                                <!-- Message Start -->
                                <div class="media">
                        
                                  <div class="media-body">
                                        <span class="text-sm float-right badge badge-info" style="font-size:8px;" ><i class="fa fa-clock-o mr-1"></i> {{\Carbon\Carbon::parse($notifikasi->created_at)->diffForHumans()}}</span>
                                    <h3 class="dropdown-item-title" style="font-size:12px;">
                                       <strong>{{$notifikasi->data['bagian']}}</strong>  <span class="text-sm" style="font-size:12px;">Membuat Permintaan <strong style="color:cornflowerblue">{{$notifikasi->data['permintaan']['judul']}}</strong></span>
                                    </h3>
                                  
                                  </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            @endif
                                @if ($notifikasi->type=="App\Notifications\disposisiTerkirim")
                                <a href="/disposisi/masuk" class="list-group-item list-group-item-action">
                                <div class="media">

                                    <div class="media-body">
                                            <span class="text-sm float-right badge badge-info" style="font-size:8px;" ><i class="fa fa-clock-o mr-1"></i> {{\Carbon\Carbon::parse($notifikasi->created_at)->diffForHumans()}}</span>
                                    <h3 class="dropdown-item-title" style="font-size:12px;">
                                    <strong>{{$notifikasi->data['pengirim']}}</strong> <span class="text-sm" style="font-size:12px;">mengirim <strong style="color:cornflowerblue">{{$notifikasi->data['disposisi']['type']}}</strong> Permintaan</span>
                                    </h3>
                                    

                                    </div>
                                </div>
                                </a>  
                                @endif
                            @empty
                                
                            @endforelse
                        </div>
                        <div class="card-footer">
                                {{$notif->links()}}
                        </div>
                </div>

        </div>

    </div>
@endsection