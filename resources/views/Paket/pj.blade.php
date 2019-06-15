@extends('Admin.layout')

@section('konten')
<div class="container ">
                <div class="row-md-8">
                                <nav aria-label="breadcrumb ">
                                   
                                    <ol class="breadcrumb arr-right bg-info ">
                                   
                                      <li class="breadcrumb-item "><a href="#" class="text-light">Paket</a></li>
                                   
                                      <li class="breadcrumb-item text-light active " aria-current="page">Penanggung Jawab</li>
                                   
                                   
                                    </ol>
                                   
                                </nav>
                </div>
        <div class="col-md-8 mt-5" style="width:50%;margin:auto;">
            
            <form action="{{route('pejabat.store',["id"=>$paket->id])}}" method="post">

           {{ csrf_field() }}
            <div class="row-md-8">
                    <div class="card card-outline card-info shadow p-2" style="font-family:QuickSand;font-size:12px; ">
                            <div class="card-header text-center" style="font-size:16px;">
                                Penanggung Jawab
                                <hr>
                            </div>
        
                          
                                <div class="list-group ">
                                        <li  class="list-group-item list-group-item-action" id="pp">Pejabat Pengadaan
                                                <input type="text" readonly="readonly" name="pp_id" id="pp_id">
                                        </li>
                                        <li  class="list-group-item list-group-item-action" id="ppk">PPK
                                            <input type="text" readonly="readonly" name="ppk_id" id="ppk_id">
                                        </li>
                                        
                                       

                                </div>
                                <br>
                                <hr>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-success btn-sm btn-block save_data">Simpan Data</button>
                                </div>

                        </div>

            </div>

            <div class="row-md-8">
                    <div class="card ">
                        <div class="col-3 float-left ml-3 pt-2 pb-2 ">
                        <a href="{{route('paket.detail',[$paket->id])}}" class="btn btn-outline-info"> Kembali</a>    
    
                        </div>
                        
                    </div>
            </div>
            </form>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="ppk_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pilih PPK</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="list-group">
                  @forelse ($ppk as $data)
                  <button type="button" class="list-group-item list-group-item-action ppk-person" data-id={{$data->id_pegawai}}>
                    {{$data->nama}}
                  </button>
                  @empty
                      
                  @endforelse
                    
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="pp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pilih PP</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="list-group">
                      @forelse ($pp as $data)
                      <button type="button" class="list-group-item list-group-item-action pp-person" data-id={{$data->id_pegawai}}>
                        {{$data->nama}}
                      </button>
                      @empty
                          
                      @endforelse
                        
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
@endsection

@section('addStyle')
    <style>
    .arr-right .breadcrumb-item+.breadcrumb-item::before {
 
 content: "›";

 vertical-align:top;

 color: #408080;

 font-size:35px;

 line-height:18px;

}
    </style>
@endsection

@section('addScript')
    <script>
        $(document).ready(function(){
            var ppk_choose=$('#ppk');
            var pp_choose=$('#pp');
            ppk_choose.click(function(e){
                e.preventDefault();

                var modal=$('#ppk_modal');

                modal.modal('show');
            });

            pp_choose.click(function(e){
                e.preventDefault();

                var modal=$('#pp_modal');

                modal.modal('show');
            });
            
            $('body').on('click','.ppk-person',function(e){
                var modal=$('#ppk_modal');
                var me=$(this);
                var pp_input=$('#pp_id');
                var person_id=me.attr('data-id');
                console.log(person_id);
                var ppk_input=$('#ppk_id');
                ppk_input.val(person_id);
                if(!ppk_input.val()=="" && !pp_input.val()=="" ){
                 $(".save_data"). attr("disabled", false);
                }
                modal.modal('hide');
            });

            $('body').on('click','.pp-person',function(e){
                var modal=$('#pp_modal');
                var me=$(this);
                var ppk_input=$('#ppk_id');
                var person_id=me.attr('data-id');
                console.log(person_id);
                var pp_input=$('#pp_id');
                pp_input.val(person_id);
                if(!ppk_input.val()=="" && !pp_input.val()=="" ){
                 $(".save_data"). attr("disabled", false);
                }
                modal.modal('hide');
            });


        })
        $(".save_data"). attr("disabled", "disabled");
        
        var ppk_input=$('#ppk_id');
        var pp_input=$('#pp_id');
        if(!ppk_input.val()=="" || !pp_input.val()=="" ){
            $(".save_data"). attr("disabled", false);
        }
        
    </script>
@endsection