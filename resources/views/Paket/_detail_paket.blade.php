
<div class="card shadow" style="font-family:Roboto">

        <div class="card-body" style="font-size:13px, sans-serif;padding:2%">
            <div class="mt-2 ml-2">
               <h5>Detail Paket</h5>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="detail_table">
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

            <h6>Detail Pekerjaan</h6>
            @if ($hps->isEmpty())
            <span><small class="text text-sm text-muted">Data persiapan belum dibuat oleh PPK</small></span>
            @if (auth()->user()->person->id==$paket->ppk_id)
            <p><a class="badge badge-info" href="{{route('paket.persiapan',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Buat Persiapan Pengadaan</small></a></p>
            
            @endif
           
            @else
                <small class="text-muted ">Dokumen persiapan telah dibuat <a href="{{route('paket.persiapan',[$paket->id])}}">edit dokumen?</a></small>
            @endif
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
                        @else
                            <p>test</p>
                        @endif

                    </tbody>
                </table>



            </div>

            <a href="" class="badge badge-info">Buat permohonan pengadaan</a>





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
            <br>

            <hr>


            <h6 class="">Data Penyedia</h6>

             
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
                                    <tr>
                                        <th>Nama</th>
                                        <th>npwp</th>
                                        <th>alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$penyedia->nama}}</td>
                                        <td>{{$penyedia->npwp}}</td>
                                    <td>{{$penyedia->alamat}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                            <small class="text-sm text-muted">Penyedia belum ditentukan</small>
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
                            <a class="btn btn-outline-info btn-sm float-right" href="{{route('upload.penawaran.index',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Upload Dok. Penawaran</small></a>

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
    font-size: 12px;
}
</style>