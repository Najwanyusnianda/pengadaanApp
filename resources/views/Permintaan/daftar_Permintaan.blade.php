@extends('Admin.layout')

@section('header_name')
<h1 class="m-0 text-dark" >Permintaan</h1>
<h6 style="font-family:QuickSand">Project : {{$project->nama ?? 'tidak ada project yang aktif'}}</h6>

@endsection

@section('konten_head')
    <div class="card shadow mb-4 " >
        <li class="card-header bg-white p-2">
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
        <div class="card-header" style="font-family:Roboto">
            Daftar Permintaan
        </div>

        <div class="card-body" style="font-size:13px;font-family:'Varela Round', sans-serif;">
            <div class="table-responsive">
                    <table  class="table   table-hover dataTable" id="datatable" role="grid" aria-describedby="example2_info" style="width:100%">
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
    </div>


    <!-- ########################################################-->
    <!--form disposisi-->
        <div class="modal fade disposisi_modal" id="disposisi_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header" id="disposisi_modalHeader">
                  <h5 class="modal-title"  id="disposisi_title"></h5>
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content detail-permintaan"  id="detail_body" style=" width:100%">
           
            


          </div>
        </div>
    </div>


    <!--form penanggung jawab pejabat_form
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
        </div>-->
        
@endsection

@section('addStyle')
    <style>
        #disposisi_modalHeader{
            font-family: 'Roboto';
            font-size: 15px;
        }
        
        #disposisi_title{
            font-size: 16px ;
            font-family: 'QuickSand'
            
        }

        th{
            color:#566787;
        }
        .btn-group > a{
            opacity: 0.5;
        }

        .paginate_button{
           padding: 0.1em 0.1em !important;
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

      
        
        td.aksi:nth-child(){
            opacity:0.5;
        }

      
    </style>
    
@endsection


@section('addScript')
    <!-- Modal -->
    <script>
        
    
    $(document).ready(function(){

        //tolltip
        $("body").tooltip({ selector: '[data-toggle=tooltip]' });
        //css
        $('a.disposisi-show.disabled').children().css('color','black');
    
        $('#datatable').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            ajax:"{{route('permintaan.table')}}",
            columns:[
                {data: 'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'date_diff'},
                {data:'jenis_pengadaan'},
                {data:'nama_bagian'},
                {data:'kode_kegiatan'},
                {data:'nilai_rp'},
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

        //// permintaan detail modal -----------------------------------

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


        //penanggunjawab form -----------------------------------------------------------------------
        /*$('body').on('click','.penanggung-jawab-show',function(e){
            e.preventDefault();

            var url ="{{route('pejabat.form')}}";
            var me = $(this);
            var id=me.attr('data-id');
            id_permintaan =id;
            var id= me.attr('data-id');
            console.log(id_permintaan);
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

        });*/

        //################Ajax_ post_disposisi

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
                        Swal.fire(
                            'Terkirim!',
                            'Disposisi Telah Terkirim!',
                            'success'
                            )
                        //permintaanTable.ajax.reload();
                        $('#datatable').DataTable().ajax.reload();
                        $("#close").trigger("click");
                    },error:function(){
                        alert('error');
                    }

                });

        });

        /*$('#pejabat_kirim').click(function(e){
            e.preventDefault();
                //var url='route('pejabat.store')';
                
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
                        permintaan_id:id_permintaan

                        
                    },
                    success: function(result) {
                        //console.log(result);
                        Swal.fire(
                            'Done!',
                            'Penanggung jawab terpilih!'
                            )
                        //permintaanTable.ajax.reload();
                        $('#datatable').DataTable().ajax.reload();
                        $("#close").trigger("click");
                    },error:function(){
                        alert('error');
                    }

                });
        })*/
    });    
    </script>
@endsection