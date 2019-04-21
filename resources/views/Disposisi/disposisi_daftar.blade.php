@extends('Admin.layout')

@section('konten')
<div class="container">
  <div class="row">
    <div class="col-md-3">
        <div class="card">
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
    <div class="col-md-9">
        <div class="card" style="font-family:QuickSand;font-size:14px;">
            <div class="card-header">
              <h3 class="card-title">Disposisi</h3>

              <div class="card-tools">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Permintaan</th>
                        <th>Pengirim</th>
                        <th>Tanggal Terima</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($disposisi)>0)
                    @foreach ($disposisi as $data)
                    <tr>
                      <td>1</td>
                      <td>{{$data->judul_permintaan}}</td>
                      <td>{{$data->nama_pengirim}}</td>
                    <td>{{\Carbon\Carbon::parse($data->created_at)->format('d, M Y')}}</td>
                    <td>
                      <button class="btn btn-link detail_disposisi_show" data-id="{{$data->id}}">detail</button>
                    </td>
                    </tr> 
                    @endforeach
                        
                    @else
                        <p>tidak ada data</p>
                    @endif
            
                </tbody>
              </table>
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
    
    </script>
@endsection