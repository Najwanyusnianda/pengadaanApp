@extends('Admin.layout')

@section('link_bread')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active"><a href="{{route('paket.index')}}">Paket</a></li>
<li class="breadcrumb-item active">Detail {{$paket->id}}</li>
<li class="breadcrumb-item active"><a href="{{Storage::url("app/logo-badan-pusat-statistik-bps.jpg'")}}">test</a></li>
@endsection

@section('konten')
    <style>
    th{
        font-family: 'Roboto';
        font-weight:bold;
    }
    </style>
    <div class="container card" style="font-family:QuickSand;font-size:12px;">
    <button class="btn" id="moth">lol</button>    
    <!--<iframe class="doc" src="http://127.0.0.1:8000/storage/testam.docx"></iframe>-->
        <table class="table table-bordered m-2">
            <tbody>
                <tr>
                    <th width=30%>Penanggung jawab</th>
                    <td>
                        @if (auth()->user()->person->role->id == 6)
                            <div class="btn-group" >
                                <button  class="btn  penanggung-jawab" {{empty($pj) ? '' : 'disabled'}} style="font-family:QuickSand;font-size:12px;color:{{empty($pj) ? '#3498db' : '#bdc3c7'}}"><i class="fas fa-user-plus fa-lg"></i></button>
                                <button  class="btn  edit-penanggung-jawab" {{empty($pj) ? 'disabled' : ''}} style="font-family:QuickSand;font-size:12px;color:{{empty($pj) ?  '#bdc3c7' : '#f1c40f'}}"><i class="fas fa-pencil-alt fa-lg"></i></button>
                                    
                            </div>
                               <hr>
                        @endif

                           <div class="list-group">
                                <li class="list-group-item d-flex">
                                   <!-- <div class="" style="width:40px !important">
                                            <img src="{{asset('img/user.png')}}" class="img-circle" alt="User Image" width="40px" height="40px">
                                    </div>-->
                                    <div class="">
                                        <small>Pejabat Pembuat Komitmen</small>
                                        <hr style="margin-top:0rem">
                                        @if (empty($pj->nama_ppk))
                                            <small>Ppk belum ditentukan</small> <span></span>
                                        @else
                                        {{$pj->nama_ppk}}
                                        <p style="margin-bottom: 0px;"><small>({{$pj->nip_ppk}})</small></p>
                                        @endif

                                    </div>
                                </li>
                                <li class="list-group-item">
                                        <div class="">
                                            <small>Pejabat Pengadaan</small>
                                            <hr style="margin-top:0rem">
                                          @if (empty($pj->nama_pp))
                                              <small>Pp belum ditentukan</small>
                                          @else
                                          {{$pj->nama_pp}}
                                          <p style="margin-bottom: 0px;"><small>({{$pj->nip_pp}})</small></p>
                                  
                                          @endif  
                                </div>
                                </li>
                           </div>
                    </td>
                </tr>
                <tr>
                    <th>Dokumen Persiapan Pengadaan</th>
                    <td>
                        <div class="list-group">
                                <li class="list-group-item">
                                    @if ($is_spek)
                                    <i class="fas fa-check-circle mr-2 text-success"></i> 
                                    @endif
                                    
                                    Spesifikasi Teknis 
                                    <span class="badge badge-info">detail</span> 
                                    @if (auth()->user()->person->role->id == 3)
                                    <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}"><span class="badge badge-secondary">buat spesifikasi</span></a>
                                    @endif
                                    
                                </li>
                                <li href="#" class="list-group-item ">
                                    @if ($is_not_hps)
                                        
                                    @else
                                        <i class="fas fa-check-circle mr-2 text-success"></i>
                                    @endif
                                        
                                    HPS :
                                    @if ($paket->total_hps)
                                    Rp.<a href="" style="color:#566787;font-family:'Courier New', Courier, monospace"><strong>  {{ number_format($paket->total_hps,0,',','.')}}</strong></a>
                                    @endif
                                    @if (auth()->user()->person->role->id == 3)
                                    <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}"><span class="badge badge-secondary">isi rincian</span></a>
                                    @endif
                                        
                                        <a href="{{route('doc.bahps',['id'=>$paket->id])}}">download bahps</a>
                                </li>
                                <li class="list-group-item ">Kerangka Acuan Kerja</li>
                                <li class="list-group-item ">Rancangan Kontrak</li>
                        </div>
                        <br>
                        <div class="list-group">
                                <li class="list-group-item ">Surat Permohonan Pengadaan
                                        <a href="{{route('doc.permohonan',['id'=>$paket->id])}}">download permohonan</a>
                                </li>
                                
                        </div>
                        <hr>
                        <div class="card-footer">
                            <button type="button" class="btn btn-sm btn-primary float-right shadow" >
                                <i class="fa fa-download"></i> Generate Berkas
                            </button>
                            <button type="button" class="btn btn-sm btn-success float-right shadow mr-1" >
                                <i class="fa "></i> Preview
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Pengadaan Langsung</th>
                    <td>

                        <div class="list-group">
                                
                                <li class="list-group-item">
                                        <small>Penyedia</small>
                                        <hr style="margin-top:0rem">
                                    @if (empty($penyedia))
                                        <a href="{{route('paket.detail.penyedia',['id'=>$paket->id])}}"><span class="badge badge-secondary"> Tambah Penyedia</span></a>
                                    @else
                                        <a href="" style="color:black;">{{$penyedia->nama}}</a>
                                    @endif
                                            
                                        
                                   
                                </li>
                                <li class="list-group-item">Jadwal Penawaran: <a href="{{route('paket.detail.jadwal_penawaran',['id'=>$paket->id])}}"><span class="badge badge-secondary">Buat Jadwal Penawaran</span></a></li>
                                
                        </div>
                        <hr>
                        <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">Undangan Pengadaan</a>
                                <a href="#" class="list-group-item list-group-item-action">Surat Penawaran <small>(Upload)</small></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Berita Acara</th>
                    <td>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Klarifikasi dan Negosisasi Teknis dan Harga</a>
                            <a href="{{route('paket.detail.pembukaan_evaluasi',['id'=>$paket->id])}}" class="list-group-item list-group-item-action">Pembukaan, Evaluasi, Klarifikasi, Negosiasi Penawaran</a>
                            <a href="#" class="list-group-item list-group-item-action">Hasil Pengadaan Langsung</a>
                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Kontrak</th>
                    <td>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Surat Perintah Kerja</a>
                        </div>
                    </td>
                </tr>
            
            </tbody>
        </table>
    </div>


<!--- Modal Penanggungjawab-->
    <div class="modal fade pejabat_form_modal" id="pejabat_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header" id="pejabat_modalHeader">
                  <h5 class="modal-title"  id="pejabat_title"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="pejabat_body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="pejabat_kirim">Simpan</button>
                </div>
              </div>
            </div>
        </div>
@endsection


@section('addScript')
    <script>
        $('body').on('click','.penanggung-jawab',function(e){
            e.preventDefault();

            var url ="{{route('pejabat.form')}}";
            var me = $(this);
            //var id=me.attr('data-id');
            //id_permintaan =id;
            //var id= me.attr('data-id');
            //console.log(id_permintaan);
            //get permintaan form
            $.ajax({
                url: url,
                dataType: 'html',
                success: function(response) {
                $('#pejabat_body').html(response);
                //$('.modal-title').html(judul);
                }
            });
            $('.pejabat_form_modal').modal('show');

        });

        $('#pejabat_kirim').click(function(e){
            e.preventDefault();
                var url='{{route('pejabat.store',["id"=>$paket->id])}}';
                console.log(url)
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
                        // change data to this object
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        ppk:$('#ppk_select').val(),
                        pp:$('#pp_select').val(),
                        //permintaan_id:id_permintaan

                        
                    },
                    success: function(result) {
                        //console.log(result);
                        Swal.fire(
                            'Done!',
                            'Penanggung jawab terpilih!'
                            )
                        //permintaanTable.ajax.reload();
                        
                        $("#close").trigger("click");
                        setTimeout(
                            function() 
                            {
                                location.reload();
                            }, 2000);
                    },error:function(){
                        alert('error');
                    }

                });
        })
    </script>

@endsection