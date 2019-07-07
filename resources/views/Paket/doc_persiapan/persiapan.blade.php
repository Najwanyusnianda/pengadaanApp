@extends('Admin.layout')

@section('link_bread')
                           
<li class="breadcrumb-item "><a href="#" class="text-light">Paket</a></li>
                       
<li class="breadcrumb-item text-light active " aria-current="page">Dokumen Persiapan Pengadaan</li>


@endsection
@section('konten')
    <div class="container">

        <div class="col-md-6 mt-5" id="persiapan-component" style="margin:auto;">
            <div class="row-md-6">
                    <div class="card card-outline card-info shadow p-2" style="font-family:QuickSand;font-size:12px; ">
                            <div class="card-header text-center" style="font-size:16px;">
                                Dokumen Persiapan Pengadaan
                                <hr>
                            </div>
        
                          
                                <div class="list-group ">
                                    <a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="list-group-item list-group-item-action">      
                                        Spesifikasi Teknis                            
  
                                    </a>
                                    <a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="list-group-item list-group-item-action">
                                            
                                        HPS :
                                        @if ($paket->total_hps)
                                        Rp.<span  style="color:#566787;font-family:'Roboto">
                                            <strong>  {{ number_format($paket->total_hps,0,',','.')}}</strong>
                                            </span>
                                            
                                        @endif

                                            
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" id="permohonan">  
                                            Permohonan Pengadaan
    
                                    </a>  
                                </div>
                                <br>
                                <hr>
    
                                <hr>
                                <div class="col-3 float-left  pt-1 pb-2 ">
                                        <a href="{{route('paket.detail',[$paket->id])}}" class="btn btn-outline-info"> Kembali</a>    
                    
                                </div>
                        </div>

            </div>

   
        </div>

    </div>

    <div class="modal" id="modalPermohonan">
            <div class="modal-dialog">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                  <h6 class="modal-title">Permohonan pengadaan</h6>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
                <!-- Modal body -->
                <div class="modal-body">
                  @if (!$hps->isEmpty())
                  <div class="form-group">
                
                      <div class="form-group">
                          <label for="uraian_disposisi" id="uraian_label" class="form-check-label">Catatan</label>
                          <textarea class="form-control" id="konten_permohonan" rows="3"></textarea>
                      </div>
    
                  </div>
                  @endif
    
                </div>
          
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" id="kirimPermohonan">Kirim</button>
                  <button type="button" id="close_modal_permohonan" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
          
              </div>
            </div>
        </div>
@endsection

@section('addStyle')
    <style>
ul.list-group:after {
  clear: both;
  display: block;
  content: "";
}
.arr-right .breadcrumb-item+.breadcrumb-item::before {
 
 content: "›";

 vertical-align:top;

 color: #408080;

 font-size:35px;

 line-height:18px;

}

#persiapan-component{
    width:100%
}

@media screen and (min-width: 769px) and (max-width: 1023px) {
    #persiapan-component{
    width:100%
}
}

@media screen and (max-width: 991px) {
#persiapan-component{
    width:100%;
}
}
.list-group a{
    font-size: 15px;

}

    </style>
@endsection

@section('addScript')
    <script>
    $(document).ready(function(){
       
        $("#permohonan_show").click(function(){
            Swal.fire({
            title: '',
            text: "Kirim Surat Permohonan Pengadaan Kepada PP?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {

            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            }
        })
        });

        $('#permohonan').click(function(e){
      e.preventDefault();
      var modal=$('#modalPermohonan');
      modal.modal('show')
    })

    $('#kirimPermohonan').click(function(e){
      e.preventDefault();
      var me=$(this);
      var url="{{route('permohonan.send',['id'=>$paket->id])}}"
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
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            konten:$('#konten_permohonan').val()      
                        },
                        success: function(response) {
                          $("#close_modal_permohonan").trigger("click");
                            Swal.fire(
                                'Permohonan terkirim.',
                                'success'
                                );
                        }
                    });
    })
    });
    </script>
@endsection