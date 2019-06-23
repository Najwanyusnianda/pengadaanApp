<div class="card">
     <div class="card-header">
            Data Penyedia
     </div>
     <div class="card-body">
           <table class="table">
                  <tr>
                        <th>Penyedia</th>
                        <td>
                                    @if (!empty($penyedia))
                                    : {{$penyedia->nama}}
                                    @else
                                    <small class="text-sm text-muted">Penyedia belum ditentukan</small>
                                    <p><a href="{{route('paket.detail.penyedia',['id'=>$paket->id])}}" class="badge badge-info">Pilih Penyedia?</a></p>
                                    
                                    @endif
                        </td>
                  </tr>
                  <tr>
                        <th> Jadwal Kegiatan Pengadaan Langsung</th>
                        <td>   
                              @if ($jadwalPenawaran->isEmpty())
                              <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}" class="badge badge-info">Buat jadwal</a>
                              @else
                              <a href="#" id="lihat_jadwal_penawaran" class="btn btn-info btn-sm shadow"><i class="fas fa-calendar-alt"></i> Lihat Jadwal</a>
                              @endif                                  
                        </td>       
                   </tr>
                   
           </table>

     </div>
</div>
      