

<div class="card">
<div class="card-header">
    <h6>Jadwal Pengadaan</h6>

    @if ($jadwal_pengadaan->isEmpty())
    <span><small class="text text-sm text-muted">Jadwal Kegiatan pengadaan belum dibuat</small></span>
    @else
    @endif
</div>
<div class="card-body">

        <div class="table-responsive">
                @if (!$jadwal_pengadaan->isEmpty())
    
                <table class="table table-condensed" style="">
                  <thead>
                    <th>No.</th>
                    <th>Kegiatan </th>
                    <th>Tanggal pelaksanaan</th>
                  </thead>
                  <tbody>
                      @foreach ($jadwal_pengadaan as $key=>$jadwal)
                      <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$jadwal->nama_kegiatan_p}}  <small class="badge badge-info small ml-3" style="font-size: 61%;"> mulai {{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->diffForHumans()}}</small></td>
                      <td style="font-family:QuickSand">{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d F Y')}}</td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
    
        @else
   
        @endif
        </div>
</div>
<div class="card-footer">
    @if ($jadwal_pengadaan->isEmpty())

    <a class="btn btn-info btn-sm {{empty($pj) ? 'disabled' :  ''}}" href="{{route('paket.jadwal',['id'=>$paket->id])}}"><i class="fas fa-calendar-plus"></i> <small>Buat Jadwal Pengadaan</small></a>

    @else
    <a class="btn btn-warning btn-sm  {{empty($pj) ? 'disabled' :  ''}}" href="{{route('paket.jadwal',['id'=>$paket->id])}}"><i class="fas fa-pencil-alt"></i> <small>Edit Jadwal Pengadaan</small></a>
    @endif
</div>
</div>      



