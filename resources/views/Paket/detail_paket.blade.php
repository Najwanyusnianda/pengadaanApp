@extends('Admin.layout')
@section('link_bread')
<li class="breadcrumb-item "><a href="{{route('paket.index')}}" class="text-light">Paket</a></li>
       
   
<li class="breadcrumb-item text-light active" aria-current="page">Detail Paket</li>

@endsection
@section('konten')
    <div class="container">

      <div class="row-md-8">
        <div class="card" style="font-family:Roboto">
          <div class="card-header ">
            Detail Paket
          </div>
          <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;">
              <div class="div">
                  <table class="table table-condensed ">
                    <tr>
                      <th style="width:30%">Nama Paket</th>
                      <td> Fullboard Pengadaan Mantap </td>
                    </tr>
                    <tr>
                      <th>Penanggung Jawab</th>
                      <td>
                        @if (auth()->user()->person->role->id==6)
                          <div class="col-md-8">  
                            <a class="btn btn-outline-info btn-sm" href="{{route('paket.pj',[$paket->id])}}" role="button" ><i class="fas fa-user-plus"></i> <small>PenanggungJawab</small> </a>       
                            </div> 
                        @endif

                        <br>
                        @if (!empty($pj))
                            <table class="table table-condensed">
                              <tr>
                               
                                <th colspan="2">Nama</th>
                        
                                <th>#</th>
                                
                              </tr>

                              <tr>
                                  <td width=20px;>
                                      <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="40px" height="40px">
                                  </td> 
                                  <td style="vertical-align:middle">
                                      {{$pj->nama_ppk}}
                                  <small class="d-block">NIP.{{$pj->nip_ppk}}</small>
                                  </td>
                                  <td style="vertical-align:middle"> 
                                    <span class="badge badge-info">PPK</span>
                                    
                                  </td>
                                  
                              </tr>    
                              <tr>
                                  <td width=20px;>
                                      <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="40px" height="40px">
                                  </td> 
                                  <td style="vertical-align:middle">
                                      {{$pj->nama_pp}}
                                  <small class="d-block">NIP.{{$pj->nip_pp}}</small>
                                  </td>
                                  <td style="vertical-align:middle"> 
                                    <span class="badge badge-info">PP</span>
                                    
                                  </td>
                              </tr>
                            </table>
                        @else
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-info"></i> Alert!</h5>
                            PenanggungJawab belum ditentukan
                          </div>
                        @endif
                        
                      </td>
                    </tr>
                    <tr>
                      <th>Jadwal Kegiatan Pengadaan</th>
                      <td>
                        <div class="col-md-8">
                        <a class="btn btn-outline-info btn-sm {{empty($pj) ? 'disabled' :  ''}}" href="{{route('paket.jadwal',['id'=>$paket->id])}}" role="button"><i class="fas fa-calendar-plus"></i> <small>Buat Jadwal</small></a>
                        <hr>
                        @if (!empty($jadwal_pengadaan))
                        <button class="btn btn-outline-secondary btn-sm shadow"> lihat jadwal </button>
                        @else
                            <small style="color:gray">jadwal belum dibuat</small>
                        @endif
                        
                        </div>
                         
                      </td>
                    </tr>
                  </table>
              </div>
          </div>

        </div>
      </div>
<!-- Dokumen Persiapan-->
      <div class="row-md-8">
          <div class="card" style="font-family:Roboto">
            <div class="card-header ">
              Dokumen Persiapan Pengadaan 
            </div>
            <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;">
                <div class="div">
                    <a class="btn btn-outline-info btn-sm mb-2" href="{{route('paket.persiapan',[$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Buat Dokumen Persiapan</small></a>
                    
                    <table class="table table-condensed table-hover">
                      <thead>
                        <tr>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>

                      </thead>
                      <tbody>
                        <tr>
                          <td>Spesifikasi Teknis</td>
                          <td>
                            <button class="btn btn-outline-secondary btn-sm shadow"> Preview </button>
                            <a class="btn btn-outline-secondary btn-sm shadow" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}">Download </a>
                          </td>
                        </tr>
                          <tr>
                            <td>Berita Acara HPS</td>
                            <td>
                              <button class="btn btn-outline-secondary btn-sm shadow"> Preview </button>
                              <a class="btn btn-outline-secondary btn-sm shadow" href={{route('doc.bahps',['id'=>$paket->id])}}>Download </a>
                            </td>
                          </tr>
                          <tr>
                              <td>HPS</td>
                              <td>
                                <button class="btn btn-outline-secondary btn-sm shadow"> Preview </button>
                                <a class="btn btn-outline-secondary btn-sm shadow" href={{route('doc.hps',['id'=>$paket->id])}}>Download </a>
                              </td>
                            </tr>
                      </tbody>
                    </table>
                </div>
            </div>
  
          </div>
      </div>
<!-- Dokumen Pengadaan-->
      <div class="row-md-8">
          <div class="card" style="font-family:Roboto">
            <div class="card-header ">
              Dokumen Pengadaan 
            </div>
            <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;color:#566787;">
                <div class="div">
                    <a class="btn btn-outline-info btn-sm mb-2" href="#" role="button"><i class="fas fa-plus"></i> <small>Buat Dokumen Pengadaan</small></a>
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover">
                            <thead>
                              <tr>
                                  <th>Dokumen</th>
                                  <th>Aksi</th>
                              </tr>
      
                            </thead>
                            <tbody>
                              <tr>
                                <td>Undangan Pengadaan Langsung</td>
                                <td>
                                  <button class="btn btn-outline-secondary btn-sm shadow"> Preview </button>
                                  <button class="btn btn-outline-secondary btn-sm shadow">Download </button>
                                </td>
                              </tr>
                                <tr>
                                  <td>Instruksi Kepada Peserta (IKP)</td>
                                  <td>
                                    <button class="btn btn-outline-secondary btn-sm shadow"> Preview </button>
                                    <button class="btn btn-outline-secondary btn-sm shadow">Download </button>
                                  </td>
                                </tr>
                                <tr>
                                    <td>Lembar Data Pengadaan (LDP)</td>
                                    <td>
                                      <button class="btn btn-outline-secondary btn-sm shadow"> Preview </button>
                                      <button class="btn btn-outline-secondary btn-sm shadow">Download </button>
                                    </td>
                                  </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
  
          </div>
      </div>

  <!-- Dokumen Penawaran-->
      <div class="row-md-8">
          <div class="card" style="font-family:Roboto">
            <div class="card-header ">
              Dokumen Penawaran
            </div>
            <div class="card-body" style="font-size:13px;font-family:'Varela Round'">
                <div class="div">
                    <a class="btn btn-outline-info btn-sm " href="#" role="button"><i class="fas fa-plus"></i> <small>Upload Dokumen Penawaran</small></a>
                    <a href="{{route('paket.detail.penyedia',['id'=>$paket->id])}}" class="badge badge-info">Pilih Calon Penyedia</a>
                    <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}" class="badge badge-info">Buat Jadwal Penawaran</a> 
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover">
                      
                          </table>
                    </div>

                </div>
            </div>
  
          </div>
      </div>

 <!-- Dokumen Pembukaan Evaluasi-->
        <div class="row-md-8">
            <div class="card" style="font-family:Roboto">
              <div class="card-header ">
                Dokumen Hasil Pengadaan Langsung
              </div>
              <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif">
                  <div class="div">
                      <a class="btn btn-outline-info btn-sm " href="{{route('paket.pembukaan',['id'=>$paket->id])}}" role="button"><i class="fas fa-plus"></i> <small>Buat Pembukaan, Evaluasi, Klarifikasi dan Negosiasi Teknis dan Harga</small></a>
                      <div class="table-responsive">
                          <table class="table table-condensed table-hover">
                        
                            </table>
                      </div>
  
                  </div>
              </div>
    
            </div>
        </div>

      <div class="row-md-8">
          <div class="card" style="font-family:Roboto">
            <div class="card-header ">
              Dokumen Kontrak
            </div>
            <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;">
                <div class="div">
                    <a class="btn btn-outline-info btn-sm " href="#" role="button"><i class="fas fa-plus"></i> <small>Buat Dokumen Persiapan</small></a>
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover">
                      
                          </table>
                    </div>

                </div>
            </div>
  
          </div>
      </div>


    </div>

          
@endsection


@section('addStyle')
	
<style>
 
.arr-right .breadcrumb-item+.breadcrumb-item::before {
 
  content: "›";
 
  vertical-align:top;
 
  color: #408080;
 
  font-size:35px;
 
  line-height:18px;
 
}

.btn.btn-outline-info.btn-sm:hover {

color: white;

}

.btn.btn-outline-secondary{
  font-family: 'QuickSand';
}
th{
        font-size: 12px;
        font-weight: 600;
        font-family: "Roboto";

    }
 
</style>
@endsection