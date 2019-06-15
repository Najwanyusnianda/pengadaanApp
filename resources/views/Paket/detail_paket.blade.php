@extends('Admin.layout')

@section('konten')
    <div class="container">
      <div class="row-md-8">
          <nav aria-label="breadcrumb ">
             
              <ol class="breadcrumb arr-right bg-dark ">
             
                <li class="breadcrumb-item "><a href="#" class="text-light">Electronics Home</a></li>
             
                <li class="breadcrumb-item "><a href="#" class="text-light">Smart Phones</a></li>
             
                <li class="breadcrumb-item text-light active" aria-current="page">Brand Name Product Page</li>
             
              </ol>
             
          </nav>
      </div>
      <div class="row-md-8">
        <div class="card" style="font-family:Roboto">
          <div class="card-header ">
            Detail Paket
          </div>
          <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;color:#566787;">
              <div class="div">
                  <table class="table table-condensed ">
                    <tr>
                      <th style="width:30%">Nama Paket</th>
                      <td> Fullboard Pengadaan Mantap </td>
                    </tr>
                    <tr>
                      <th>Penanggung Jawab</th>
                      <td>
                        <div class="col-md-8">  
                        <a class="btn btn-outline-info btn-sm" href="{{route('paket.pj',[$paket->id])}}" role="button" ><i class="fas fa-user-plus"></i> <small>PenanggungJawab</small> </a>       
                        </div>
                        <br>
                        @if (!empty($pj))
                            <table class="table table-condensed">
                              <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NiP</th>
                                
                              </tr>
                              <tr>
                                <td>PPK</td>  
                                <td>{{$pj->nama_ppk}}</td>
                                <td>{{$pj->nip_ppk}}</td>
                              </tr>
                              <tr>
                                  <td>PP</td>  
                                  <td>{{$pj->nama_pp}}</td>
                                  <td>{{$pj->nip_pp}}</td>
                              </tr>
                            </table>
                        @else
                            <small>PenanggungJawab belum ditentukan</small>
                        @endif
                        
                      </td>
                    </tr>
                    <tr>
                      <th>Jadwal Kegiatan Pengadaan</th>
                      <td>
                        <div class="col-md-8">
                            <a class="btn btn-outline-info btn-sm" href="#" role="button"><i class="fas fa-calendar-plus"></i> <small>Buat Jadwal</small></a>
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
            <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;color:#566787;">
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
            <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;color:#566787;">
                <div class="div">
                    <a class="btn btn-outline-info btn-sm " href="#" role="button"><i class="fas fa-plus"></i> <small>Upload Dokumen Penawaran</small></a>
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
              <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;color:#566787;">
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
            <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;color:#566787;">
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
        color:#566787;

    }
 
</style>
@endsection