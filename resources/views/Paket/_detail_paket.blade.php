
<div class="card shadow" style="font-family:Roboto">

        <div class="card-body" style="font-size:13px, sans-serif;padding:2%">
            <div class="mt-2 ml-2">
               <h5>Detail Paket</h5>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-condensed" id="detail_table">
                  <tr>
                    <th style="width:30%">Nama Paket</th>
                    <td>: {{$permintaan->judul}} </td>
                  </tr>
                  <tr>
                      <th style="width:30%">Jenis Pengadaan</th>
                      <td>: {{$permintaan->jenis_pengadaan}} </td>
                  </tr>
                  <tr>
                      <th style="width:30%">Nilai Anggaran</th>
                      <td>: Rp.{{ number_format($permintaan->nilai,0,',','.')}} </td>
                  </tr>
                  <tr>

                  </tr>
              
                </table>
            </div>

            <hr>
            <br>

           






            <!--<table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <th>status</th>
                </tr>
                <tr>
                    <td>
                        @if (!$hps->isEmpty())
                        <i class="fas fa-check"></i>
                        @endif
                        Data persiapan pengadaan
                    </td>
                    <td> 
                        @if ($hps->isEmpty())
                        <small class="text-sm text-muted">Data persiapan belum dibuat</small>
                        <p><a class="badge badge-info" href="{{route('paket.persiapan',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>isi data Dokumen Persiapan</small></a></p>
                        
                        @else
                            <small class="text-muted float-right">Dokumen persiapan telah dibuat <a href="{{route('paket.persiapan',[$paket->id])}}">edit dokumen?</a></small>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if (!empty($penyedia))
                            <i class="fas fa-check"></i>
                         @endif
                        Data Penyedia
                    </td>
                    <td>
                        @if (!empty($penyedia))
                        : {{$penyedia->nama}}
                        @else
                        <small class="text-sm text-muted">Penyedia belum ditentukan</small>
                        <p><a href="{{route('paket.detail.penyedia.pilih',['id'=>$paket->id])}}" class="badge badge-info">Pilih Penyedia?</a></p>
                       @endif 
                    </td>
                </tr>
                <tr>
                    <td> 
                            @if ( !($harga_penawaran->isEmpty() || $harga_nego->isEmpty()))
                            <i class="fas fa-check"></i>
                            @endif
                        Data Pembukaan, Evaluasi, klarifikasi dan Negosiasi Penawaran
                    </td>
                    <td> 
                        @if ($harga_penawaran->isEmpty() || $harga_nego->isEmpty())
                        <small class="text-sm text-muted">Data klarifikasi dan negosiasi belum dibuat</small>
                        <p><a class="badge badge-info" href="{{route('paket.pembukaan',['id'=>$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Buat klarifikasi dan Evaluasi penawaran</small></a></p>
                            @else
                        <small class="text-sm text-muted">Data telah dibuat</small>
                        @endif
                        
                    </td>
                </tr>
            </table>-->


        </div>
        <div class="card-footer">

        </div>

</div>

<div class="card shadow" id="detail Pekerjaan" style="font-family:Roboto">
    <div class="card-header">
            <h6>Detail Pekerjaan</h6>
           
            @if ($hps->isEmpty())
            <span><small class="text text-sm text-muted">Data persiapan belum dibuat oleh PPK</small></span>

           
            @else
               
           
            @endif
    </div>

       
        <div class="card-body">
                @if (!$hps->isEmpty())
                <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Nama Barang/Pekerjaan</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah (+PPN 10%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$hps->isEmpty())
                                    @foreach ($spesifikasi as $item)
                                    <tr>
                                            <td>{{$item->nama_item}}</td>
                                            <td>{{$item->volume}}</td>
                                            <td>{{$item->satuan}}</td>
                                            <td> Rp.{{ number_format($item->harga,0,',','.')}} </td>
                                            <td>Rp.{{ number_format($item->jumlah,0,',','.')}} </td>
                                    </tr>
            
                            
                                    @endforeach
                                    <tr>
                                           
                                            <td>
                                                    <b>Spesifikasi:</b>
                                                    <div>
                                                        {!!$spektek->spesifikasi!!}
                                                    </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                     <tr>
                                         <td colspan="4"><b>Total HPS:</b></td>
                                     <td><b>Rp. {{number_format($paket->total_hps,0,',','.')}}</b></td>
                                    </tr>   
                                @else
                                    <p>test</p>
                                @endif

                            </tbody>
                        </table>
            
                </div>
                @endif
        </div>
      




        <div class="card-footer">
            @if (!$hps->isEmpty())
            @if (auth()->user()->person->id==$paket->pp_id || auth()->user()->person->id==$paket->ppk_id)
            @if ($paket->status=="diproses")
            <a class="btn btn-info btn-sm shadow"  href="#" role="button" ><i class="fas fa-plus"></i> <small> Buat  Klarifikasi dan Negosiasi</small> </a> 
            @else
            <a class="btn btn-success btn-sm shadow {{$paket->status=="diproses" ? 'disabled' : ''}}"  href="#" id="verify_pekerjaan" data-id="{{$paket->id}}" role="button" ><i class="fas fa-check-double"></i><small> Konfirmasi pekerjaan</small> </a> 
            <a class="btn btn-warning btn-sm shadow {{$paket->status=="diproses" ? 'disabled' : ''}}" href="{{route('paket.persiapan',[$paket->id])}}" role="button" ><i class="fas fa-pencil-alt"></i> <small>Edit Spesifikasi</small> </a> 
            
            @endif
            @endif
            
            <button class="btn btn-primary btn-sm shadow float-right" id="lihat_dok"><i class="fas fa-file-download"></i> Generate Dokumen</button>
            
            @else
            @if (auth()->user()->person->id==$paket->ppk_id)
            <p ><a class="btn btn-info btn-sm shadow" href="{{route('paket.persiapan',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Buat Spesifikasi</small></a></p>
            @endif
            @endif

        </div>
</div>

<div class="card" id="data_penyedia">
        <div class="card-header">
                <h6 class="">Detail Penyedia</h6>
                @if (empty($penyedia))
                <span><small class="text text-sm text-muted">Penyedia belum ditentukan oleh PP</small></span>
    
              
                @else
                   
               
                @endif
        </div>
        

        <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#penyedia" role="tab" aria-controls="home" aria-selected="true">Detail Penyedia</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#jadwal_penawaran" role="tab" aria-controls="profile" aria-selected="false">Jadwal Pengadaan Langsung</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#dokumen_penawaran" role="tab" aria-controls="contact" aria-selected="false">Dokumen Penawaran</a>
                        </li>
                    </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="penyedia" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                                @if (!empty($penyedia))
                         
                                <table class="table table-condensed">
                                    <thead>
            
                                    </thead>
                                    <tbody>
                                        <tr>
                                                <th>Nama</th>
                                            <td>{{$penyedia->nama}}</td>
                                           
                                        <td></td>
                                        </tr>
                                        <tr>
                                                <th>npwp</th>
                                                <td>{{$penyedia->npwp}}</td>
                                        </tr>
                                        <tr>
                                            <th>alamat</th>
                                            <td>{{$penyedia->alamat}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @else
                               
                                <p><a href="{{route('paket.detail.penyedia',['id'=>$paket->id])}}" class="badge badge-info">Pilih Penyedia</a></p>
                                
                                @endif
                        </div>
                        <div class="tab-pane fade" id="jadwal_penawaran" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                                @if ($jadwalPenawaran->isEmpty())
                                <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}" class="badge badge-info">Buat jadwal</a>
                                @else
                                <a href="#" id="lihat_jadwal_penawaran" class="btn btn-info btn-sm shadow"><i class="fas fa-calendar-alt"></i> Lihat Jadwal</a>
                                @endif  
                        </div>
                        <div class="tab-pane fade" id="dokumen_penawaran" role="tabpanel" aria-labelledby="contact-tab">
                            <br>
                                <a class="badge badge-info" href="{{route('upload.penawaran.index',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Upload Dok. Penawaran</small></a>
            
                                <br>
                                @if (!empty($dokumen))
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>lihat</th>
                                                <th>Waktu Upload</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dokumen as $file)
                                                <tr>
                                                    <td>{{ $file->subject }}</td>
                                                   <!-- <td>{{ $file->document_file }}</td>-->
                                                    <td>
                                                        <a href="{{ Storage::url($file->document_file) }} " class="badge badge-success">
                                                         lihat
                                                        </a>
                                                    </td>
                                                    <td> <span class="badge badge-info">{{ $file->created_at->diffForHumans() }}</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                        </div>
                      </div>
        </div>     
        <div class="card-footer">

        </div>
</div>

<style>
th{
    color: ;
    font-family:'Arial';
    font-weight: 600;

}

.badge.badge-info{
    font-size: 11px;
    font-family:'Roboto'
}

td{
    font-family: 'QuickSand';
    font-size:15px;
}
th{
    font-size:15px;
}
</style>