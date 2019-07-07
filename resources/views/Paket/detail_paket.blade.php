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
                <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail Paket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Penanggungjawab</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Jadwal Kegiatan Pengadaan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" id="dokumen-tab" data-toggle="tab" href="#dokumen" role="tab" aria-controls="contact" aria-selected="false">Dokumen Pengadaan</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">@include('Paket._detail_paket')  </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('Paket._penanggung_jawab')</div>
              
              <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab"> @include('Paket._jadwal_paket_')</div>
              <div class="tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab">  @include('Paket._dokumen_pengadaan')</div>
            </div>

      </div>



 


</div>

    <!--modal-->
    <div class="modal" id="modal_dokumen_hasil_pengadaan">
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
                                <td>BA klarifikasi dan negosiasi harga</td>
                                <td>
                                  <a class="btn btn-link" href="{{route('doc.klarifikasi',['id'=>$paket->id])}}"><i class="fas fa-file-word fa-2x "></i> </a>
                                </td>
                              </tr>
                                <tr>
                                  <td>BA Pembukaan, Evaluasi, Klarifikasi dan negosiasi penawaran</td>
                                  <td>
                                  
                                    <a class="btn btn-link" href={{route('doc.evaluasi',['id'=>$paket->id])}}><i class="fas fa-file-word fa-2x "></i> </a>
                                  </td>
                                </tr>
                                <tr>
                                    <td>BA hasil pengadaan langsung</td>
                                    <td>
                                     
                                      <a class="btn btn-link" href={{route('doc.bahpl',['id'=>$paket->id])}}><i class="fas fa-file-word fa-2x "></i></a>
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

    <div class="modal" id="modalPermohonan">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h6 class="modal-title">Permohonan pengadaan</h6>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
              @if (!empty($pj))
              <div class="form-group">
                
                  <input data-id="{{$paket->pp_id}}" value="{{$pp->nama}}" readonly class="form-control">
                  <div class="form-group">
                      <label for="uraian_disposisi" id="uraian_label" class="form-check-label">Catatan</label>
                      <textarea class="form-control" id="konten_permohonan" rows="3"></textarea>
                  </div>

              </div>
              @endif

            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" id="kirimPermohonan">Kirim</button>
              <button type="button" id="close_modal_permohonan" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
    </div>

          
@endsection


@section('addStyle')
 <!--progress Style--> 
<style>
.step {
  list-style: none;
  margin: .2rem 0;
  width: 100%;
}

.step .step-item {
  -ms-flex: 1 1 0;
  flex: 1 1 0;
  margin-top: 0;
  min-height: 1rem;
  position: relative; 
  text-align: center;
}

.step .step-item:not(:first-child)::before {
  background: #0069d9;
  content: "";
  height: 2px;
  left: -50%;
  position: absolute;
  top: 9px;
  width: 100%;
}

.step .step-item a {
  color: #acb3c2;
  display: inline-block;
  padding: 20px 10px 0;
  text-decoration: none;
}

.step .step-item a::before {
  background: #0069d9;
  border: .1rem solid #fff;
  border-radius: 50%;
  content: "";
  display: block;
  height: .9rem;
  left: 50%;
  position: absolute;
  top: .2rem;
  transform: translateX(-50%);
  width: .9rem;
  z-index: 1;
}

.step .step-item.active a::before {
  background: #fff;
  border: .1rem solid #0069d9;
}

.step .step-item.active ~ .step-item::before {
  background: #e7e9ed;
}

.step .step-item.active ~ .step-item a::before {
  background: #e7e9ed;
}
</style>

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
      var modal_dokumen_hasil_pengadaan=$('#modal_dokumen_hasil_pengadaan');
      var jadwal_penawaran=$('#modalJadwalPenawaran')
      var bnt_generate_persiapan=$('#lihat_dok');
      var btn_generate_hasil=$('#lihat_dok_hasil');
      var lihat_penawaran=$('#lihat_jadwal_penawaran');

      bnt_generate_persiapan.click(function(e){
        e.preventDefault();
        modal_dok_persiapan.modal("show");
      })
      btn_generate_hasil.click(function(e){
        e.preventDefault();
        modal_dokumen_hasil_pengadaan.modal('show');
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


    $('#permohonan').click(function(e){
      e.preventDefault();
      var modal=$('#modalPermohonan');
      modal.modal('show')
    })

    $('#kirimPermohonan').click(function(e){
      e.preventDefault();
      var me=$(this);
      var url="{{route('permohonan.send',['id'=>$paket->id])}}"
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
                            konten:$('#konten_permohonan').val()      
                        },
                        success: function(response) {
                          $("#close_modal_permohonan").trigger("click");
                            Swal.fire(
                                'Permohonan terkirim.',
                                'success'
                                );
                        }
                    });
    })
    </script>
@endsection