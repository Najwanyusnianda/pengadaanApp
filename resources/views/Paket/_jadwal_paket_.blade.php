


<div class="card">
<div class="card-header">
    <h6>Jadwal Pengadaan</h6>

    @if ($jadwal_pengadaan->isEmpty())
    <span><small class="text text-sm text-muted">Jadwal Kegiatan pengadaan belum dibuat</small></span>
    @else
    @endif
</div>
<div class="card-body" style="font-size:13px !important;">

    <div class="col-md-10 mx-auto shadow">
        <div class="card p-2">
                <div class="card-body">
                        <h5 class="text-center"> Kegiatan Pengadaan</h5>

                        <div class="table-responsive">
                                <table class="table table-condensed">
                                        <thead>
                                                <tr>
                                                        <th>No</th>
                                                        <th>Kegiatan</th>
                                                        <th>Status</th>
                                                        <th>Tanggal Penetapan</th>
                                                        <th>Aksi</th>
                                                        <th>Generate Dok.</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @forelse ($jadwal_pengadaan as $key=>$jadwal)
                                                        @if ($jadwal->nama_kegiatan_p =="Penetapan Spesifikasi Teknis")
                                                            <tr>
                                                                <td>{{$key+1}}</td> 
                                                                <td>Penetapan Spesifikasi Teknis</td>
                                                                <td>
                                                                    <span class="badge badge-{{!$jadwal->status ? 'danger' : 'success'}}" >progress</span>
                                                                </td>
                                                                <td>
                                                                        <small>{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small>
                                                                </td>
                                                                <td>
                                                                                <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#e67e22">  
                                                                                                <i class="fas fa-pencil-alt"></i> Edit           
                                                                                        </a>
                                                                </td>
                                                                <td>
                                                                  <div class="btn-group">
                                                                     <!-- <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2980b9">  
                                                                          <i class="fas fa-eye" ></i>          
                                                                      </a>-->
                                                                      <a href="{{route('doc.spekTeknis',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2c3e50">  
                                                                          <i class="fas fa-download"></i>         
                                                                      </a>
                                                                  </div>

                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if ($jadwal->nama_kegiatan_p =="Penetapan HPS")
                                                        <tr>
                                                            <td>{{$key+1}}</td> 
                                                            <td>Penetapan HPS</td>
                                                            <td>
                                                                <span class="badge badge-{{!$jadwal->status ? 'danger' : 'success'}}" >progress</span>
                                                            </td>
                                                            <td>
                                                                    <small>{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small>
                                                            </td>
                                                            <td>
                                                                        @if ($hps->isEmpty())
                                                                        <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                                                                <i class="fas fa-arrow-circle-right "></i>  Buat            
                                                                        </a>  
                                                                        @else
                                                                        <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#e67e22">  
                                                                                <i class="fas fa-pencil-alt"></i> Edit           
                                                                        </a>

                                                                        @endif
                                                            </td>
                                                              <td>
                                                                <div class="btn-group">
                                                                   <!-- <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2980b9">  
                                                                        <i class="fas fa-eye" ></i>          
                                                                    </a>-->
                                                                    <a href="{{route('doc.hps',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2c3e50">  
                                                                        <i class="fas fa-download"></i>         
                                                                    </a>
                                                                </div>

                                                              </td>
                                                        </tr>
                                                        @endif
                                                        @if ($jadwal->nama_kegiatan_p =="Surat Permohonan Pengadaan")
                                                        <tr>
                                                            <td>{{$key+1}}</td> 
                                                            <td>Permohonan Pengadaan kepada PP</td>
                                                            <td>
                                                                <span class="badge badge-{{!$jadwal->status ? 'danger' : 'success'}}" >progress</span>
                                                            </td>
                                                            <td>
                                                                    <small>{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small>
                                                            </td>
                                                            <td>
                                                                        @if (true)
                                                                        <a href="#" class="badge badge-primary" id="permohonan">  
                                                                                <i class="fas fa-arrow-circle-right "></i>  kirim permohonan
                                        
                                                                        </a>  
                                                                        @endif
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <!-- <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2980b9">  
                                                                         <i class="fas fa-eye" ></i>          
                                                                     </a>-->
                                                                     <a href="{{route('doc.permohonan',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2c3e50">  
                                                                         <i class="fas fa-download"></i>         
                                                                     </a>
                                                                 </div>  
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if ($jadwal->nama_kegiatan_p =="Surat Undangan Pengadaan")
                                                        <tr>
                                                            <td>{{$key+1}}</td> 
                                                            <td>Undangan ke Penyedia</td>
                                                            <td>
                                                                <span class="badge badge-{{!$jadwal->status ? 'danger' : 'success'}}" >progress</span>
                                                            </td>
                                                            <td>
                                                                    <small>{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small>
                                                            </td>
                                                            <td>
                                                                        @if (!$penyedia)
                                                                        <a href="{{route('paket.detail.penyedia.pilih',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                                                                <i class="fas fa-arrow-circle-right "></i>  Tambahkan Penyedia            
                                                                        </a>  
                                                                        @else
                                                                        <a href="{{route('paket.detail.penyedia.pilih',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#e67e22">  
                                                                                <i class="fas fa-pencil-alt"></i> Ganti Penyedia          
                                                                        </a>
                                                                        <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                                                                <i class="fas fa-eye" ></i> buat jadwal          
                                                                        </a>
                                                                        
                                                                        @endif
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <!-- <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2980b9">  
                                                                         <i class="fas fa-eye" ></i>          
                                                                     </a>-->
                                                                     <a href="{{route('doc.undangan',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2c3e50">  
                                                                         <i class="fas fa-download"></i>         
                                                                     </a>
                                                                </div>     
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if ($jadwal->nama_kegiatan_p =="Berita Acara Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Penawaran")
                                                        <tr>
                                                            <td>{{$key+1}}</td> 
                                                            <td>Pembukaan dan Evaluasi Penyedia</td>
                                                            <td>
                                                                <span class="badge badge-{{!$jadwal->status ? 'danger' : 'success'}}" >progress</span>
                                                            </td>
                                                            <td>
                                                                    <small>{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small>
                                                            </td>
                                                            <td>
                                                                        @if (true)
                                                                        <a href="{{route('paket.detail.pembukaan_evaluasi',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                                                                <i class="fas fa-arrow-circle-right "></i>  Buat Pembukaan           
                                                                        </a>
                                                                        <a href="{{route('paket.detail.penawaran_evaluasi',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                                                                <i class="fas fa-arrow-circle-right "></i>  Buat Evauasi           
                                                                        </a>    
                                                                        @else
                                                                        <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#e67e22">  
                                                                                <i class="fas fa-pencil-alt"></i> Edit           
                                                                        </a>
                                                                        @endif
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <!-- <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2980b9">  
                                                                         <i class="fas fa-eye" ></i>          
                                                                     </a>-->
                                                                     <a href="{{route('doc.undangan',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2c3e50">  
                                                                         <i class="fas fa-download"></i>         
                                                                     </a>
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if ($jadwal->nama_kegiatan_p =="Berita Acara Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Penawaran")
                                                        <tr>
                                                            <td>{{$key+1}}</td> 
                                                            <td>Penawaran dan Negosiasi Harga</td>
                                                            <td>
                                                                <span class="badge badge-{{!$jadwal->status ? 'danger' : 'success'}}" >progress</span>
                                                            </td>
                                                            <td>
                                                                    <small>{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small>
                                                            </td>
                                                            <td>
                                                                        @if (($harga_penawaran->isEmpty() || $harga_nego->isEmpty()))
                                                                        <a href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                                                                <i class="fas fa-arrow-circle-right "></i>  buat            
                                                                        </a>  
                                                                        @else
                                                                        <a href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#e67e22">  
                                                                                <i class="fas fa-pencil-alt"></i> Edit           
                                                                        </a>
                                                                        <a href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                                                                <i class="fas fa-eye" ></i> view           
                                                                        </a>
                                                                        @endif
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <!-- <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2980b9">  
                                                                         <i class="fas fa-eye" ></i>          
                                                                     </a>-->
                                                                     <a href="{{route('doc.undangan',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2c3e50">  
                                                                         <i class="fas fa-download"></i>         
                                                                     </a>
                                                                </div>   
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if ($jadwal->nama_kegiatan_p =="Berita Acara Hasil Pengadaan Langsung")
                                                        <tr>
                                                            <td>{{$key+1}}</td> 
                                                            <td>Buat Berita Acara Hasil Pengadaan Langsung</td>
                                                            <td>
                                                                <span class="badge badge-{{!$jadwal->status ? 'danger' : 'success'}}" >progress</span>
                                                            </td>
                                                            <td>
                                                                    <small>{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small>
                                                            </td>
                                                            <td>
                                                                        @if (($harga_penawaran->isEmpty() || $harga_nego->isEmpty()))
    
                                                                        @else
                                        
                                                                        <a href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                                                                <i class="fas fa-arrow-circle-right "></i>  Sampaikan hasil pengadaan         
                                                                        </a>  
                                                                        <a href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                                                                <i class="fas fa-eye" ></i> view           
                                                                        </a>
                                                                        @endif
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <!-- <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2980b9">  
                                                                         <i class="fas fa-eye" ></i>          
                                                                     </a>-->
                                                                     <a href="{{route('doc.undangan',['id'=>$paket->id])}}" class="btn btn-sm " style="color:#2c3e50">  
                                                                         <i class="fas fa-download"></i>         
                                                                     </a>
                                                                </div>   
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        

                                                @empty
                                                    
                                                @endforelse
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
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



