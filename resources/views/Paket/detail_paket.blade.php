@extends('Admin.layout')
@section('link_bread')

@endsection
@section('header_name')
<h1 class="m-0 text-dark" >Detail</h1>
<h6 style="font-family:QuickSand">Paket:{{$permintaan->judul}}</h6>

@endsection
@section('konten')
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{session('success')}}</div>
        @endif

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



 


</div>

    <!--modal-->
    <div class="modal" id="modal_dokumen_persiapan">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h6 class="modal-title">List Dokumen</h6>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
            

                      <table class="table table-condensed" style="">
                        <thead>
                          <tr>
                            <th style="max-width=50%;">Dokumen</th>
                            <th >Unduh</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Spesifikasi Teknis</td>
                                <td>
                                  <a class="btn btn-link" href="{{route('doc.spekTeknis',['id'=>$paket->id])}}"><i class="fas fa-file-word fa-2x "></i></a>
                                </td>
                            </tr>
                                <tr>
                                  <td>Berita Acara HPS</td>
                                  <td>
                                  
                                    <a class="btn btn-link" href={{route('doc.bahps',['id'=>$paket->id])}}><i class="fas fa-file-word fa-2x "></i></a>
                                  </td>
                                </tr>
                                <tr>
                                    <td>HPS</td>
                                    <td>
                                     
                                      <a class="btn btn-link" href={{route('doc.hps',['id'=>$paket->id])}}><i class="fas fa-file-word fa-2x"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                      <td>Dokumen Permohonan Pengadaan Langsung</td>
                                      <td>
                                       
                                        <a class="btn btn-link" href={{route('doc.permohonan',['id'=>$paket->id])}}><i class="fas fa-file-word fa-2x"></i></a>
                                      </td>
                                </tr>
                        </tbody>
                      </table>
  
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
                <table class="table table-condensed" style="">
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
      var modal_dok_persiapan=$('#modal_dokumen_persiapan');
      var jadwal_penawaran=$('#modalJadwalPenawaran')
      var bnt_generate_persiapan=$('#lihat_dok');
      var lihat_penawaran=$('#lihat_jadwal_penawaran');

      bnt_generate_persiapan.click(function(e){
        e.preventDefault();
        modal_dok_persiapan.modal("show");
      })
      lihat_penawaran.click(function(e){
        e.preventDefault();
    
        jadwal_penawaran.modal("show");
      })


      $('#verify_pekerjaan').click(function(e){
            e.preventDefault();
            var me = $(this);
            var id= me.attr('data-id');
            var url='/paket/'+id+'/verifikasi_pekerjaan'
            Swal.fire({
                title: 'Konfirmasi Pekerjaan?',
                text: "Barang/Pekerjaan tidak dapat diubah lagi",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: 'gray',
                confirmButtonText: 'Ya',
                cancelButtonText:'Batalkan'
                })
                .then((result) => {
                if (result.value) {
                        $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                        });

                        $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),      
                        },
                        success: function(response) {
                            Swal.fire(
                                'Pekerjaan Telah Dikonfirmasi.',
                                'success'
                                );
                        }
                    });
                }
                })
        });

    })
    </script>
@endsection