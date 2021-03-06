<br>



<div class="card shadow " id="detail Pekerjaan" style="font-family:Roboto">
    <div class="card-header">
            <h6>Detail Pekerjaan</h6>
           
            @if ($hps->isEmpty())
            <span><small class="text text-sm text-muted">Data persiapan belum dibuat oleh PPK</small></span>
            @else
               
           
            @endif
            <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
            </div>
    </div>

       
        <div class="card-body" >
                @if (!$hps->isEmpty())
                <h6 class="text-center"><b>Spesifikasi dan HPS</b> </h6>
                <div class="table-responsive">
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th width="40%">Nama Barang/Pekerjaan</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan(HPS)</th> 
                                    <th>Jumlah HPS (+PPN 10%)</th>
                                    
                                    
                                
                                  
                                
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
                        <hr>

                       
                </div>
                @endif
                @if (!$nego->isEmpty())
                <h6 class="text-center"><b>Hasil Penawaran dan Negosiasi</b> </h6>
                <div class="table-responsive">
                        <table class="table table-condensed table-striped">
                                <thead>
                                        <tr>
                                            <th>#</th>
                                            <th  style="vertical-align : middle;text-align:center;">Harga Penawaran</th>
                                            <th style="vertical-align : middle;text-align:center;">Harga Negosiasi</th>
            
            
                                        </tr>
        
                                       
                                </thead>
                                <tbody>
                                    @if (!$nego->isEmpty())
                                        <tr>
                                                <td >Subtotal:</td>
                                                <td style="vertical-align : middle;text-align:center;"><b>Rp. {{number_format(((int)$paket->total_penawaran/(1.1)),0,',','.')}}</b></td>
                              
                                                <td style="vertical-align : middle;text-align:center;"><b>Rp. {{number_format(((int)$paket->total_negosiasi/(1.1)),0,',','.')}}</b></td>
                                               
                                        </tr>
                                        <tr>
                                                <td>PPN(10%):</td>
                                                <td style="vertical-align : middle;text-align:center;"><b>Rp. {{number_format(((int)$paket->total_penawaran/(1.1))*0.1,0,',','.')}}</b></td>
                                        
                                                <td style="vertical-align : middle;text-align:center;"><b>Rp. {{number_format(((int)$paket->total_negosiasi/(1.1))*0.1,0,',','.')}}</b></td>
                                               
                                          </tr>
                                          <tr>
                                                <td >Total</td>
                                                <td style="vertical-align : middle;text-align:center;"><b>Rp. {{number_format($paket->total_penawaran,0,',','.')}}</b></td>
                                      
                                                <td style="vertical-align : middle;text-align:center;"><b>Rp. {{number_format($paket->total_negosiasi,0,',','.')}}</b></td>
            
                                            </tr>
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
         
            @else
            <a class="btn btn-success btn-sm shadow {{ auth()->user()->person->id==$paket->pp_id ? '' : 'disabled'}}"  href="#" id="verify_pekerjaan" data-id="{{$paket->id}}" role="button" ><i class="fas fa-check-double"></i><small> Konfirmasi pekerjaan</small> </a> 
            <a class="btn btn-warning btn-sm shadow {{$paket->status=="diproses" ? 'disabled' : ''}}" href="{{route('paket.persiapan',[$paket->id])}}" role="button" ><i class="fas fa-pencil-alt"></i> <small>Edit Spesifikasi</small> </a> 
            
            @endif
            @endif
            
            <!--<button class="btn btn-primary btn-sm shadow float-right" id="lihat_dok"><i class="fas fa-file-download"></i> Generate Dokumen Persiapan</button>-->
            
            @else
            @if (auth()->user()->person->id==$paket->ppk_id)
            <p ><a class="btn btn-info btn-sm shadow" href="{{route('paket.persiapan',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Buat Spesifikasi</small></a></p>
            @endif
            @endif

        </div>
</div>

<div class="card shadow" id="data_penyedia">
        <div class="card-header">
                <h6 class="">Detail Penyedia</h6>
                @if (empty($penyedia))
                <span>
                    <small class="text text-sm text-muted">Penyedia belum ditentukan oleh PP</small></span>
    
              
                @else
                   
               
                @endif
                <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                </div>
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
                                        <tr>
                                            <th>Nama</th>
                                            <th>Pimpinan</th>
                                            <th>NPWP</th>
                                            <th>Email</th>
                                            <th>No.Telp</th>
                                            <th>Alamat</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$penyedia->nama}}</td>
                                            <td>{{$penyedia->nama_pimpinan}}</td>
                                            <td>{{$penyedia->npwp}}</td>
                                            <td>{{$penyedia->email}}</td>
                                            <td>{{$penyedia->telepon}}</td>
                                            <td>{{$penyedia->alamat}}</td>
                                            <td><a href="{{route('paket.detail.penyedia.pilih',['id'=>$paket->id])}}" class="btn btn-sm btn-warning shadow"><i class="fas fa-pencil-alt"></i>Ganti </a></td>
                                      
                                     
                                        </tr>

                                    </tbody>
                                </table>
                                @else
                                
                                @endif
                        </div>
                        <div class="tab-pane fade" id="jadwal_penawaran" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                                @if ($jadwalPenawaran->isEmpty())
                                <span class="text text-muted"><small>Jadwal pengadaan langsung dengan penyedia belum dibuat</small></span>
                                @else
                                <a href="#" id="lihat_jadwal_penawaran" class="btn btn-info btn-sm shadow"><i class="fas fa-calendar-alt"></i> Lihat Jadwal</a>
                                <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}" class="btn btn-warning btn-sm shadow"><i class="fas fa-pencil-alt"></i> Edit jadwal</a>
                                @endif  
                        </div>
                        <div class="tab-pane fade" id="dokumen_penawaran" role="tabpanel" aria-labelledby="contact-tab">
 
                               
            
                            
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
                                                @if ($dokumen->isEmpty())
                                                <a class="btn btn-info btn-sm shadow m-2" href="{{route('upload.penawaran.index',[$paket->id])}}" role="button"><i class="fas fa-file-upload"></i> Upload Surat Penawaran</a>
                                                @else
                                                    
                                                @endif
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
            @if (auth()->user()->person->id==$paket->pp_id)
                
         
            @if (!empty($penyedia))
            
            @else
            <a href="{{route('paket.detail.penyedia.pilih',['id'=>$paket->id])}}" class="btn btn-sm btn-info">Pilih Penyedia</a>
            @endif
              
            @if ($jadwalPenawaran->isEmpty())
            <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}" class="btn btn-info btn-sm shadow"><i class="fas fa-calendar-plus"></i> Buat jadwal</a>
            @else
            
            @endif

            @endif

            @if (!empty($penyedia))
           <!-- <a class="btn btn-primary btn-sm shadow float-right" href="{{route('doc.undangan',['id'=>$paket->id])}}" id="lihat_dok"><i class="fas fa-file-download"></i> Generate undangan pengadaan</a>
           -->
            @endif
        </div>
</div>



<!---
<div class="card shadow" id="hasil_Nego">
    <div class="card-header">
        <h6>Hasil Pengadaan Langsung </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-condensed">
                    <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Nama Item</th>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Volume</th>
                                <th colspan="2" style="vertical-align : middle;text-align:center;">Harga Penawaran</th>
                                <th colspan="2" style="vertical-align : middle;text-align:center;">Harga Negosiasi</th>


                            </tr>
                            <tr>
                                <th style="width:20%">Harga Satuan</th>
                                <th>Jumlah</th>
                                <th style="width:20%">Harga Satuan</th>
                                <th>Jumlah</th>
                                
                            </tr>
                           
                    </thead>
                    <tbody>
                        @if (!$nego->isEmpty())
                            @foreach ($spesifikasi  as $item)
                                <tr>
                                    <td>{{$item->nama_item}}</td>
                                    <td>{{$item->volume}}</td>
                                    <td> Rp.{{ number_format($item->harga_penawaran,0,',','.')}} </td>
                                    <td>Rp.{{ number_format($item->jumlah_penawaran,0,',','.')}} </td>
                                    <td>Rp.{{ number_format($item->harga_nego,0,',','.')}} </td>
                                    <td>Rp.{{ number_format($item->jumlah_nego,0,',','.')}} </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                    <td colspan="3">Subtotal:</td>
                                    <td><b>Rp. {{number_format(((int)$paket->total_penawaran/(1.1)),0,',','.')}}</b></td>
                                    <td></td>
                                    <td><b>Rp. {{number_format(((int)$paket->total_negosiasi/(1.1)),0,',','.')}}</b></td>
                                   
                            </tr>
                            <tr>
                                    <td colspan="3">PPN(10%):</td>
                                    <td><b>Rp. {{number_format(((int)$paket->total_penawaran/(1.1))*0.1,0,',','.')}}</b></td>
                                    <td></td>
                                    <td><b>Rp. {{number_format(((int)$paket->total_negosiasi/(1.1))*0.1,0,',','.')}}</b></td>
                                   
                              </tr>
                              <tr>
                                    <td colspan="3">Total</td>
                                    <td><b>Rp. {{number_format($paket->total_penawaran,0,',','.')}}</b></td>
                                    <td></td>
                                    <td><b>Rp. {{number_format($paket->total_negosiasi,0,',','.')}}</b></td>

                                </tr>
                        @endif
                    </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">

            <button class="btn btn-primary btn-sm shadow float-right" id="lihat_dok_hasil"><i class="fas fa-file-download"></i> Generate Dokumen Hasil Pengadaan</button>
            
    </div>
</div>
end-->
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
    font-family: 'Varela Round';
    font-size:13px;
}
th{
    font-size:13px;
}

</style>