@extends('Admin.layout')

@section('konten_head')
    <div class="card shadow mb-4 ">
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
    <div class="card shadow mb-4 permintaan-card">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
        </div>
        @if (count($permintaan)>0)
        <div class="card-body" style="font-size:12px">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row" >
                            <th>No</th>
                            <th>Judul</th>
                            <th>Subject Matter</th>
                            <th>Kode Kegiatan</th>
                            <th>Nilai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="color:black"> 
                        @foreach ($permintaan as $data)
                            <tr role="row" class="odd">
                                <td>1</td>
                            <td data-url='{{route('permintaan.detail',['id'=>$data->id])}}' data-id="{{$data->id}}" class="judul">{{$data->judul}}</td>
                                <td>{{$data->nama_bagian}}</td>
                                <td>{{$data->kode_kegiatan}}</td>
                                <td>{{$data->nilai}}</td>
                                <td>
                                    <span class="badge badge-danger">{{$data->disposisi_status}}</span>
                               <!-- <span class="badge badge-success">Success</span>
                                <span class="badge badge-danger">Danger</span>
                                <span class="badge badge-warning">Warning</span>-->
                                </td>
                                <td>
                                    <button class="btn btn-info btn-xs disposisi-show" >
                                        Disposisi
                                    </button>
                                    <button class="btn btn-info btn-xs permintaan-show" >
                                        Detail Permintaan
                                    </button>
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
          <div class="modal-content detail-permintaan">
            


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
    </style>
    
@endsection


@section('addScript')
    <!-- Modal -->
    <script>
    
    $(document).ready(function(){
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
            var me = me.parent().parent();
            var judul=me.find('.judul').text();
            
            var url =me.find('.judul').attr('data-url');
            console.log(url);
          
            //get disposisi form
            $.ajax({
                url: url,
                dataType: 'html',
                success: function(response) {
                $('.modal-content.detail-permintaan').html(response);
               
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