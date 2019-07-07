<!--<div class="card">
        <div class="card-header">
                <h6> <i class="fas fa-tasks"></i> List Tugas</h6>
        </div>
        <div class="card-body">
            <div class="row" style="font-family:'Varela Round';font-size:13px;">
                @forelse ($jadwal_pengadaan as $key=>$jadwal)
                @if ($jadwal->nama_kegiatan_p =="Penetapan Spesifikasi Teknis")
                        <div class="col-md-3">
                        <div class="card card-primary card-outline">
    
                                <div class="card-body">
                                        Spesifikasi Teknis
                                        @if (!$spesifikasi->isEmpty())
                                        <i class="fas fa-check-circle fa-lg" style="color:#2ecc71"></i>
                                        @endif
                                        <p class="text text-muted"><small>Penetapan:{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small></p>
                                </div>
                                <div class="card-footer">
                                        @if ($spesifikasi->isEmpty())
                                        <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                                <i class="fas fa-arrow-circle-right "></i>  Buat            
                                        </a>  
                                        @else
                                        <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#e67e22">  
                                                <i class="fas fa-pencil-alt"></i> Edit           
                                        </a>
                                        <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                                <i class="fas fa-eye" ></i> view           
                                        </a>
                                        @endif
                                </div>
    
    
                        </div>
                </div>
                @endif
                @if ($jadwal->nama_kegiatan_p =="Penetapan HPS")
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
    
                                <div class="card-body">
                                        Harga Perkiraan Sementara
                                        @if (!$hps->isEmpty())
                                        <i class="fas fa-check-circle fa-lg" style="color:#2ecc71"></i>
                                        @endif
                                        <p class="text text-muted"><small>Penetapan:{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small></p>
                                </div>
                                <div class="card-footer">
                                        @if ($hps->isEmpty())
                                        <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                                <i class="fas fa-arrow-circle-right "></i>  Buat            
                                        </a>  
                                        @else
                                        <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#e67e22">  
                                                <i class="fas fa-pencil-alt"></i> Edit           
                                        </a>
                                        <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                                <i class="fas fa-eye" ></i> view           
                                        </a>
                                        @endif
                                </div>
    
    
                    </div>
                </div>
                @endif
                @if ($jadwal->nama_kegiatan_p =="Surat Permohonan Pengadaan")
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
    
                            <div class="card-body">
                                    Permohonan Pengadaan
                                    @if (!$hps->isEmpty())
                                    <i class="fas fa-check-circle fa-lg" style="color:#2ecc71"></i>
                                    @endif
                                    <p class="text text-muted"><small>Penetapan:{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small></p>
                            </div>
                            <div class="card-footer">
                                    @if (true)
                                    <a href="#" class="badge badge-primary" id="permohonan">  
                                            <i class="fas fa-arrow-circle-right "></i>  Sampaikan Permohonan Pengadaan
    
                                    </a>  
                                    @endif
                            </div>
    
    
                    </div>
                </div>
                @endif
                @if ($jadwal->nama_kegiatan_p =="Surat Undangan Pengadaan")
                <div class="col-md-3">
                    <div class="card card-success card-outline">
    
                            <div class="card-body">
                                    Penyedia
                                    @if ($penyedia)
                                    <i class="fas fa-check-circle fa-lg" style="color:#2ecc71"></i>
                                    @endif
                                    <p class="text text-muted"><small>Undangan:{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small></p>
                            </div>
                            <div class="card-footer">
                                    @if (!$penyedia)
                                    <a href="{{route('paket.detail.penyedia.pilih',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                            <i class="fas fa-arrow-circle-right "></i>  Tambahkan Penyedia            
                                    </a>  
                                    @else
                                    <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#e67e22">  
                                            <i class="fas fa-pencil-alt"></i> Edit           
                                    </a>
                                    <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                            <i class="fas fa-eye" ></i> view           
                                    </a>
                                    <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                            <i class="fas fa-eye" ></i> buat jadwal          
                                    </a>
                                    
                                    @endif
                            </div>
    
    
                    </div>
                </div>
                @endif
                @if ($jadwal->nama_kegiatan_p =="Berita Acara Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Penawaran")
                <div class="col-md-3">
                    <div class="card card-success card-outline">
    
                            <div class="card-body">
                                    Pembukaan dan Evaluasi Penyedia
                                    @if (true)
                                    <i class="fas fa-check-circle fa-lg" style="color:#2ecc71"></i>
                                    @endif
                                    <p class="text text-muted"><small>Penetapan:{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small></p>
                            </div>
                            <div class="card-footer">
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
                                    <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                            <i class="fas fa-eye" ></i> view           
                                    </a>
                                    @endif
                            </div>
    
    
                    </div>
                </div>
                @endif
                @if ($jadwal->nama_kegiatan_p =="Berita Acara klarifikasi dan Negosiasi Teknis Harga")
                <div class="col-md-3">
                    <div class="card card-success card-outline">
    
                            <div class="card-body">
                                    Penawaran dan Negosiasi Harga
                                    @if (!($harga_penawaran->isEmpty() || $harga_nego->isEmpty()))
                                    <i class="fas fa-check-circle fa-lg" style="color:#2ecc71"></i>
                                    @endif
                                    <p class="text text-muted"><small>{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small></p>
                            </div>
                            <div class="card-footer">
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
                            </div>
    
    
                    </div>
                </div>
                @endif
                @if ($jadwal->nama_kegiatan_p =="Berita Acara Hasil Pengadaan Langsung")
                <div class="col-md-3">
                    <div class="card card-success card-outline">
    
                            <div class="card-body">
                                    Berita Acara Hasil Pengadaan Langsung
                                    @if (!($harga_penawaran->isEmpty() || $harga_nego->isEmpty()))
                                    <i class="fas fa-check-circle fa-lg" style="color:#2ecc71"></i>
                                    @endif
                                    <p class="text text-muted"><small>Penetapan:{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d-F-Y')}}</small></p>
                            </div>
                            <div class="card-footer">
                                    @if (($harga_penawaran->isEmpty() || $harga_nego->isEmpty()))
    
                                    @else
    
                                    <a href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}" class="badge badge-primary ">  
                                            <i class="fas fa-arrow-circle-right "></i>  Sampaikan hasil pengadaan         
                                    </a>  
                                    <a href="{{route('paket.detail.klarifikasi_teknis',['id'=>$paket->id])}}" class="badge " style="color:white;background-color:#2980b9">  
                                            <i class="fas fa-eye" ></i> view           
                                    </a>
                                    @endif
                            </div>
    
    
                    </div>
                </div>
                @endif
    
                
                @empty
                    <p>belum ada jadwal</p>
                @endforelse
    
            </div>
    
        </div>
</div>-->


