@extends('Admin.layout')
@section('link_bread')
<li class="breadcrumb-item "><a href="{{route('paket.index')}}" class="text-light">Paket</a></li>
       
   
<li class="breadcrumb-item text-light active" aria-current="page">Penanggung_jawab</li>

@endsection
@section('konten')
    <div class="container">

      <div class="card p-2">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail Paket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Penanggungjawab</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Jadwal Kegiatan Pengadaan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" id="dokumen-tab" data-toggle="tab" href="#dokumen" role="tab" aria-controls="contact" aria-selected="false">Dokumen Pengadaan</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">@include('Paket._detail_paket')  </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('Paket._penanggung_jawab')</div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> @include('Paket._jadwal_paket_')</div>
              <div class="tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab">  @include('Paket._dokumen_pengadaan')</div>
            </div>

      </div>

  <div class="col-md-12 mx-auto ">


     

    <!--    <div class="row-md-6">
              
  
            
      </div>
      <div class="row-md-6">
          @include('Paket._jadwal_paket_')
      </div>


      <div class="row-md-6">
    
            @include('Paket._penyedia')
       
      </div>-->
 
<!-- Dokumen Persiapan
      <div class="row-md-8">
        @include('Paket._dokumen_persiapan')
      </div>-->
<!-- Dokumen Pengadaan-->



  <!-- Dokumen Penawaran
      <div class="row-md-8">
        @include('Paket._dokumen_penawaran')
      </div>-->

      <!-- Dokumen Pembukaan Evaluasi
      <div class="row-md-8">
        @include('Paket._dokumen_evaluasi')
      </div>-->


  </div>


 


</div>

    <!--modal-->
    <div class="modal" id="modalJadwal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Jadwal Kegiatan Pengadaan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              @if (!empty($jadwal_pengadaan))

                      <table class="table table-bordered" style="font-size:13px;">
                        <thead>
                          <th>No.</th>
                          <th>Kegiatan</th>
                          <th>Tanggal pelaksanaan</th>
                        </thead>
                        <tbody>
                            @foreach ($jadwal_pengadaan as $key=>$jadwal)
                            <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$jadwal->nama_kegiatan_p}}</td>
                            <td style="fomt-family:QuickSand">{{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->format('d F Y')}} <small class="badge badge-info small float-right" style="font-size: 61%;"> mulai {{\Carbon\Carbon::parse($jadwal->jadwal_kegiatan)->diffForHumans()}}</small></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
          
              @else
                  tidak ada jadwal
              @endif
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
    </div>



    <div class="modal" id="modalJadwalPenawaran">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Jadwal Kegiatan Pengadaan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              @if (!empty($jadwalPenawaran))
              <div class="table-responsive">
                <table class="table table-bordered" style="font-size:13px;">
                  <thead>
                    <th>No.</th>
                    <th>Kegiatan</th>
                    <th>Tanggal pelaksanaan</th>
                    <th>waktu</th>
                  </thead>
                  <tbody>
                      @foreach ($jadwalPenawaran as $key=>$jadwal)
                      <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$jadwal->nama_kegiatan_penawaran}}</td>
                      <td style="font-family:QuickSand">{{\Carbon\Carbon::parse($jadwal->tanggal_pelaksanaan)->format('d F Y')}} <small class="badge badge-info small float-right" style="font-size: 61%;"> mulai {{\Carbon\Carbon::parse($jadwal->tanggal_pelaksanaan)->diffForHumans()}}</small></td>
                      <td>{{\Carbon\Carbon::parse($jadwal->waktu_mulai)->format('h:i')}}-{{\Carbon\Carbon::parse($jadwal->waktu_selesai)->format('h:i')}}</td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>

          
              @else
                  tidak ada jadwal
              @endif
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

      .row-md-8{
        margin:auto;
      }
  
  </style>
@endsection


@section('addScript')
    <script>
    $(document).ready(function(){
      var jadwal=$('#modalJadwal');
      var jadwal_penawaran=$('#modalJadwalPenawaran')
      var lihat_jadwal=$('#lihat_jadwal');
      var lihat_penawaran=$('#lihat_jadwal_penawaran');

      lihat_jadwal.click(function(e){
        e.preventDefault();
        jadwal.modal("show");
      })
      lihat_penawaran.click(function(e){
        e.preventDefault();
    
        jadwal_penawaran.modal("show");
      })

    })
    </script>
@endsection