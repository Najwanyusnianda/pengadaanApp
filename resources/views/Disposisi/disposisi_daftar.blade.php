@extends('Admin.layout')

@section('konten')
<div class="container">
  <div class="row">
    <div class="col-md-3" >
      <div class="card" id="header-pills">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0" style="display: block;">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="fa fa-inbox"></i> Masuk
                    <span class="badge bg-primary float-right">12</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-envelope-o"></i> Diteruskan
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-file-text-o"></i> Drafts
                  </a>
                </li>
         
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
    <div class="col-md-9" id="card_table_disposisi">
        <div class="card" style="font-family:Roboto;font-size:12px;">
            <div class="card-header" style="background-color:#0984e3;">
              <h3 class="card-title" style="color:white;font-family:QuickSand;"><i class="fas fa-envelope"></i><strong class="pl-2">Disposisi Masuk</strong> </h3>
    
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-2">
              <div class="table-responsive">
                  <table class="table" id="tableDisposisi" class="table-responsive table-bordered">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Permintaan</th>
                              <th>Pengirim</th>
                              <th>Tanggal Terima</th>
                              <th>Detail</th>
                          </tr>
                      </thead>
                    
                    </table>
              </div>
            
            </div>
            <!-- /.card-body -->
        </div>  
    </div>
  </div>
</div>


<div class="modal fade detail_disposisi_modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="modal-content-detail">
            </div>
        </div>
     
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="disposisi_kirim">kirim</button>
        </div>
      </div>
    </div>
</div>

@endsection


@section('addStyle')
    <style>
     
    </style>
@endsection

@section('addScript')
    <script>
      $('body').on('click','.detail_disposisi_show',function(e){
          e.preventDefault();

            
            var me = $(this);
            var disposisi=me.attr('data-id')
            //var judul=me.find('.judul').text();
            //id_permintaan =me.find('.judul').attr('data-id');
            //console.log(id_permintaan);
            //get disposisi form
            console.log(disposisi);
            var url ='/disposisi/detail/'+disposisi;
            $.ajax({
                url: url,
                dataType: 'html',
                success: function(response) {
                $('.modal-content-detail').html(response);
                
                }
            });
            $('.detail_disposisi_modal').modal('show');




      });

      $('#tableDisposisi').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            searching: false,
            paging: false,
            info: false,
            ajax:"{{route('disposisi.tableMasuk')}}",
            columns:[
                {data:'DT_RowIndex', name: 'DT_Row_Index' , orderable: false, searchable: false},
                {data:'judul_permintaan'},
                {data:'nama_pengirim'},
                {data:'tgl_masuk'},
                {data:'detail'}
             
            ]
        });

        //$('table').attr('class',"table dataTable no-footer table-responsive");
    
    </script>
@endsection