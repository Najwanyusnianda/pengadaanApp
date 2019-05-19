@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="col">
            <div class="row">

            </div>
            <div class="row-md-8 justify-content-center" style="margin:auto;width:80%">
                <div class="card shadow-lg" style="font-family:Roboto,sans-serif">
                    <div class="card-header" class="justify-content-between" style="background-color:#566787;color:white;">
                       
                            Daftar disposisi masuk
                     
                        <div class="card-tools float-right">
                                {{$disposisi_masuk->links()}}
                        </div>
 
                    </div>
                    <div class="card-body">
                        @if (count($disposisi_masuk)>0)
                        <table class="table table-bordered table-hover " id="disp_masuk">

                            <thead>
                                <tr style="font-family:Valera Round, sans-serif;color:#566787" >
                                    <th>Dari</th>
                                    <th>Judul</th>
                                    <th>Diterima</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody style="font-family:'Varela Round', sans-serif;color:#566787;font-size:13px;">
                                @forelse ($disposisi_masuk as $data)
                                    <tr> 
                                        <td>
                                                {{$data->nama_pengirim}}
                                            <small>{{$data->nip_pengirim}}</small>
                                        </td> 
                                        <td>{{$data->judul_permintaan}}</td>
                                        <td>{{\Carbon\Carbon::parse($data->created_at)->format('l, d F Y H:i')}}</td>
                                        <td><button class="btn btn-info btn-sm btn-flat detail_disposisi_show" data-id="{{$data->disposisi_detail_id}}" style="font-size:11px;"> Detail</button></td>
                                       
                                    </tr>
                                @empty
                                        
                                @endforelse
                            </tbody>
                        </table>        

                    @else
                        <p>tidak ada disposisi</p>
                    @endif
                    </div>
                    


                   
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
            </div>
          </div>
        </div>
    </div>

@endsection


@section('addScript')
    <script>
    //$('#disp_masuk').DataTable();
    $(document).ready(function(){
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
    })
    </script>
@endsection