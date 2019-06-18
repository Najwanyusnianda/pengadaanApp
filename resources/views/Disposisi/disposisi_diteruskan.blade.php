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
            @if (count($disposisi_diteruskan)>0)
            <div class="card " style="font-family:Roboto,sans-serif">

                    <div class="card-body">
                       
                        <div class="table-responsive">
                            <table class="table table-condensed table-hover  " id="disp_masuk">
    
                                <thead>
                                    <tr style="font-family:Valera Round, sans-serif;color:#566787;font-size:15px;" >
                                        <th>Kepada</th>
                                        <th>Surat</th>
                                        <th>Jenis</th>
                                        <th>Diterima</th>
                                       
                                    </tr>
                                </thead>
                                <tbody style="font-family:'Varela Round', sans-serif;font-size:13px;">
                                    @forelse ($disposisi_diteruskan as $data)
                                        <tr> 
                                            <td>
                                                    {{$data->nama_penerima}}
                                                <small class="d-block">NIP.{{$data->nip_penerima}}</small>
                                            </td> 
                                            <td>
                                                    <p style="margin-bottom:1px;">{{$data->judul_permintaan}}</p>
                                                <button style="padding-left:0px;" class="btn  btn-sm detail_disposisi_show btn-link" data-id="{{$data->disposisi_detail_id}}"><span  style="font-family:Roboto, sans-serif;color:#566787;font-size:13px;font-weight:600"><small class="bade badge-secondary">Detail Pesan</small></span> </button>
                                                
                                            </td>
                                        <td>{{$data->type}}</td>
                                            <td>{{\Carbon\Carbon::parse($data->created_at)->format('d-m-Y')}}
                                                <small class="d-block"> {{Carbon\Carbon::parse($data->created_at)->format('H:i')}} WIB</small>  
                                            </td>
                                            
                                        </tr>
                                    @empty
                                            
                                    @endforelse
                                </tbody>
                                <tfoot>
                                        <div class="card-tools float-right">
                                                {{$disposisi_diteruskan->links()}}
                                        </div>
                                </tfoot>
                            </table>   
                        </div>
         
    

                    </div>
                    
    
    
                   
                </div>
            @else
            <div class="card col-md-4 " style="margin:auto">
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

@section('addStyle')
    <style>
    .card{
        vertical-align: middle;
    }

    td{
        vertical-align: middle !important;
    }

    </style>
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