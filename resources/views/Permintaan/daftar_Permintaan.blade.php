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
        <div class="card-header py-3" style="background-color:#2c3e50;">
          <h6 class="m-0 font-weight-bold " style="color:white;">Daftar Permintaan</h6>
        </div>

        <div class="card-body" style="font-size:13px">
                <table  class="table  table-hover dataTable" id="datatable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr  >
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
          
                    <tfoot>
                     
                    </tfoot>
                </table>
        </div>
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

        .btn-group > a{
            opacity: 0.5;
        }

        .btn-group > a:hover{
            opacity: 1;
        }

        a.disabled{
            color: #2c3e50;
        }

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
    
        $('#datatable').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            ajax:"{{route('permintaan.table')}}",
            columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'judul'},
                {data:'jenis_pengadaan'},
                {data:'kode_bagian'},
                {data:'kode_kegiatan'},
                {data:'nilai'},
                {data:'status_disposisi'},
                {data:'action'},
            ]
        })
        //modal show

        var id_permintaan;
        $('body').on('click','.disposisi-show',function(e){
            e.preventDefault();

            var url ='{{route('disposisi.form')}}';
            var me = $(this);
            var id= me.attr('data-id');
            //var me = me.parent().parent();
            var judul=me.attr('data-title');
            id_permintaan =id
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
            //var me = me.parent().parent();
            //var judul=me.find('.judul').text();
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