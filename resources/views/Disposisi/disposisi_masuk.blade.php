@extends('Admin.layout')

@section('header_name')
<div class="mb-5"></div>

@endsection

@section('konten')
    <div class="container">
        <div class="col">
            <div class="row">

            </div>
            <div class="row-md-8 justify-content-center" style="margin:auto;width:100%">
                @if (count($disposisi_masuk)>0)
                <div class="card " style="font-family:Roboto,sans-serif">
                    <div class="card-header" class="justify-content-between" style="background-color:#566787;color:white;">
                       
                            Daftar Surat masuk
                     
                        <div class="card-tools float-right">
                                {{$disposisi_masuk->links()}}
                        </div>
 
                    </div>
                    <div class="card-body table-responsive">
                  
                        <table class="table table-condensed table-hover " id="disp_masuk">

                            <thead>
                                <tr style="font-family:Valera Round, sans-serif;color:#566787;font-size:13px;" >
                                    <th colspan="2">Surat</th>
                                    <th>Jenis</th>
                                    <th>Tgl.Terima</th>

                                </tr>
                            </thead>
                            <tbody style="font-family:'Varela Round', sans-serif;color:#566787;font-size:13px;">
                                @forelse ($disposisi_masuk as $data)
                                    <tr>
                                        <td width=40px;>
                                                <img src="{{asset('img/user.png')}}" class="img-circle" alt="User Image" width="40px" height="40px">
                                        </td> 
                                        <td>
                                            <div class="d-block" >
                                                    <a href="#" class=" detail_disposisi_show" data-id="{{$data->disposisi_detail_id}}">
                                                            <strong style="color: #566787;font-family:QuickSand;font-size:13px;">Permintaan {{$data->judul_permintaan}}</strong>
                                                    </a>
                                               
                                                    
                                            </div>
                                            <div class="d-block" style="font-size:11px;">
                                                  dari:  {{$data->nama_pengirim}}
                                            </div>
                                                
                                            <p style="color:gray"><small>nomor: <strong>{{$data->nomor_form}}</strong> </small> </p>
                                        </td> 
                                    <td>{{$data->type}}</td>
                                        <td>{{\Carbon\Carbon::parse($data->created_at)->format('l, d F Y H:i')}}</td>
                                        
                                       
                                    </tr>
                                @empty
                                        
                                @endforelse
                            </tbody>
                        </table>        

       
                    </div>
                    



                   
                </div>
                @else
                    <div class="card col-md-4 shadow" style="margin:auto">
                        <div class="p-5">
                            <div class="text-center">
                                    <i class="far fa-envelope fa-3x" style="color:#c8d6e5"></i>
                                    <p style="color:gray">Tidak ada pesan yang ditemukan</p>
                            </div>
                            
                        </div>
                    </div>
                @endif

            
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