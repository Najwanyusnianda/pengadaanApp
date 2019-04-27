@extends('Admin.layout')

@section('konten_head')
    <div class="card shadow mb-4 " >
        <div class="card-header bg-white p-2">
            <ul class="nav nav-pills" style="font-size:14px">
                <li class="nav-item">
                    <a class="nav-link" href="#activity" data-toggle="tab">Semua
                            <span class="right badge badge-danger"> 10</span>
                    </a>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#activity" data-toggle="tab">Dikerjakan
                            <span class="right badge badge-danger"> 10</span>
                    </a>
                   
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#activity" data-toggle="tab">Selesai
                            <span class="right badge badge-danger"> 10</span>
                    </a>
                </li>
    
    </ul>
        </div>
    </div>
@endsection

@section('konten')
    <div class="card shadow mb-4 permintaan-card" style="font-family:QuickSand;">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
        </div>
        @if (count($permintaan)>0)
        <div class="card-body" style="font-size:13px">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row" >
                            <th>No</th>
                            <th>Judul</th>
                            <th>Jenis Pengadaan</th>
                            <th>Subject Matter</th>
                            <th>Kode Kegiatan</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="color:black"> 
                        @foreach ($permintaan as $key=>$data)
                            <tr role="row" class="odd">
                                <td>{{$key+1}}</td>
                                <td class="judul">{{$data->judul}} <br>
                                        <small>
                                            <span class="badge badge-secondary ">{{\Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</span>
                                        </small> 
                                
                                </td>
                                <td >{{$data->jenis_pengadaan}}</td>
                                <td>{{$data->nama_bagian}}</td>
                                <td>{{$data->kode_kegiatan}}</td>
                                <td>{{$data->nilai}}</td>
                                <td>
                                <span class="badge {{$data->disposisi_status ==  'baru' ? 'badge-danger' : ($data->disposisi_status == 'dikerjakan' ? 'badge-success' : 'badge-warning')}}">{{$data->disposisi_status}}</span>
                               <!-- <span class="badge badge-success">Success</span>
                                <span class="badge badge-danger">Danger</span>
                                <span class="badge badge-warning">Warning</span>-->
                                </td>
                                <td class="aksi">
                                    <div class="btn-group">
                                          
                                        <a class="btn btn-link disposisi-show {{($data->disposisi_status == 'baru' and auth()->user()->person->role->id == 4) || ($data->disposisi_status == 'disposisi' and auth()->user()->person->role->id == 5) ? "" : "disabled"}}"    >
                                            <i class="fas fa-envelope fa-lg" style="color:#f39c12;"></i>  
                                        </a>
                                        <a class="btn btn-link permintaan-show" data-id="{{$data->id}}">
                                            <i class="fas fa-eye fa-lg" style="color:#3498db"></i>
                                        </a>
                                    </div> 
                                </td> 
                            </tr>                             
                        @endforeach
                                                 
                                          
                    </tbody>
                    <tfoot>
                     
                    </tfoot>
                </table>
        </div>
        @else
            <p>tidak ada permintaan</p>
        @endif
        
    </div>


    <!-- ########################################################-->
    <!--form disposisi-->
        <div class="modal fade disposisi_modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="disposisi_kirim">kirim</button>
                </div>
              </div>
            </div>
        </div>

     <!--detail permintaan--> 
     
     <div class="modal fade permintaan_modal" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content detail-permintaan"  id="detail_body" style="width:800px;">
           
            


          </div>
        </div>
    </div>
        
@endsection

@section('addStyle')
    <style>
        .btn-xs{
        
        font-size: 14px;    
        padding-top: 1px;
        padding-bottom: 1px;
        border-radius: 0%;
    }

        .modal-title{
            font-size: 12px;
        }
        
        td.aksi:nth-child(){
            opacity:0.5;
        }

      
    </style>
    
@endsection


@section('addScript')
    <!-- Modal -->
    <script>
    
    $(document).ready(function(){
        //css
        $('a.disposisi-show.disabled').children().css('color','black');


        //modal show

        var id_permintaan;
        $('body').on('click','.disposisi-show',function(e){
            e.preventDefault();

            var url ='{{route('disposisi.form')}}';
            var me = $(this);
            var me = me.parent().parent();
            var judul=me.find('.judul').text();
            id_permintaan =me.find('.judul').attr('data-id');
            console.log(id_permintaan);
            //get disposisi form
            $.ajax({
                url: url,
                dataType: 'html',
                success: function(response) {
                $('.modal-body').html(response);
                $('.modal-title').html(judul);
                }
            });
            $('.disposisi_modal').modal('show');

        });

        $('body').on('click','.permintaan-show',function(e){
            e.preventDefault();

            
            var me = $(this);
            var id= me.attr('data-id');
            var me = me.parent().parent();
            var judul=me.find('.judul').text();
            console.log(id);
          
            //get disposisi form
            $.ajax({
                url: '/permintaan/'+id,
                dataType: 'html',
                success: function(response) {
                $('#detail_body').html(response);
               
                }
            });
            $('.permintaan_modal').modal('show');

        });


        //ajax post

        $('#disposisi_kirim').click(
            function(e){
                e.preventDefault();
                var url='{{route('disposisi.store')}}';
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
                        uraian: $('#uraian_disposisi').val(),
                        penerima: $('#penerima_disposisi').val(),
                        permintaan_id:id_permintaan
                        
                    },
                    success: function(result) {
                        //console.log(result);
                        alert("Berhasil dikirim");
                        //permintaanTable.ajax.reload();
                        $("#close").trigger("click");
                    }
                });

            });
    });    
    </script>
@endsection