

<div class="card">
<div class="card-header">
    Jadwal Pengadaan 
     
    @if (empty($jadwal_pengadaan))
    <a class="badge badge-info float-right {{empty($pj) ? 'disabled' :  ''}}" href="{{route('paket.jadwal',['id'=>$paket->id])}}"><i class="fas fa-calendar-plus"></i> <small>Buat Jadwal Pengadaan</small></a>

    @else
    <a class="badge badge-warning float-right {{empty($pj) ? 'disabled' :  ''}}" href="{{route('paket.jadwal',['id'=>$paket->id])}}"><i class="fas fa-pencil-alt"></i> <small>Edit Jadwal Pengadaan</small></a>
    @endif
</div>
<div class="card-body">
    @if (empty($jadwal_pengadaan))
        <div class="alert alert-info alert-dismissible m-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5 style="font-family:roboto"><i class="icon fas fa-info"></i> Info!</h5>
            <span style="font-size:13px;font-family:roboto"> <b style="">Penanggungjawab</b>  belum ditentukan</span>
        </div>
    @else
        <a href="#" id="lihat_jadwal" class="btn btn-info btn-sm shadow"><i class="fas fa-calendar-alt"></i> Lihat Jadwal</a>
    @endif
</div>
</div>      

