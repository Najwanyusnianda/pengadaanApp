

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
                    <th width="40%">Kegiatan </th>
                    <th>Tanggal pelaksanaan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Generate</th>
                  </thead>
                  <tbody>
                      @foreach ($jadwal_pengadaan as $key=>$jadwal)
                      <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$jadwal->nama_kegiatan_p}}</td>
                      <td style="font-family:QuickSand">{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d F Y')}}</td>
                      <td></td>  
                      <td>
                          @if ($jadwal->nama_kegiatan_p =="Penetapan Spesifikasi Teknis")
                          @if ($spesifikasi->isEmpty())
                            <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="badge badge-secondary btn-sm ">  
                              Buat                        
                            </a> 
                          @else
                             <small class="text text-muted">sudah dibuat</small> 
                          @endif

                          @endif
                          @if ($jadwal->nama_kegiatan_p =="Penetapan HPS")

                          <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge badge-secondary btn-sm ">
                            Buat
                                  
                          </a>
                          @endif
                          @if ($jadwal->nama_kegiatan_p =="Berita Acara klarifikasi dan Negosiasi Teknis Harga")
                          <a  class="badge badge-secondary btn-sm" href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}">
                              Buat
                          </a>
                          
                          @endif
                          @if ($jadwal->nama_kegiatan_p =="Surat Undangan Pengadaan")
                          <a  class="badge badge-secondary btn-sm" href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}">
                              Pilih Penyedia
                          </a>
                          <a  class="badge badge-info btn-sm" href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}">
                              Buat Jadwal Penawaran
                          </a>
                          
                          @endif
                        </td>
                        <td>
                            @if ($jadwal->nama_kegiatan_p =="Penetapan Spesifikasi Teknis")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Penetapan HPS")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Surat Permohonan Pengadaan")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Surat Undangan Pengadaan")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Berita Acara klarifikasi dan Negosiasi Teknis Harga")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Berita Acara Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Penawaran")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Berita Acara Hasil Pengadaan Langsung")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Surat Perintah Menawarkan (SPMH)")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Surat Perintah Kerja (SPK)")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif
                            @if ($jadwal->nama_kegiatan_p =="Surat Perintah Mulai Kerja(SPMK)")
                            <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word"></i> </a>
                            @endif

                        </td>
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



