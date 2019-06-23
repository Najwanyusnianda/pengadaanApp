@extends('Admin.layout')

@section('konten')

<div class="container mt-5 ">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif

        <div class="col-md-6 mt-5" style=";margin:auto;">
            
            <form action="{{route('pejabat.store',["id"=>$paket->id])}}" method="post">

           {{ csrf_field() }}
            <div class="row-md-6">
                    <div class="card card-outline card-info shadow p-2" style="font-family:QuickSand; ">
                          <div class="card-header text-center" >
                              <span style="font-size:16px;">Penanggung Jawab</span>  
                                <p class="text-sm text-muted" style="font-size:10px"> Pilih Penanggunpjawab pengadaan dengan menekan tombol dibawah</p>
                                <hr>
                            </div>
        
                          
                                <div class="list-group " style="font-size:14px;">
                                        <li  class="list-group-item list-group-item-action" id="pp">Pejabat Pengadaan:
    
                                            <b id="nama_pp"><small>belum dipilih</small> </b>
                                                <input type="hidden" readonly="readonly" name="pp_id" id="pp_id">
                                        </li>
                                        <li  class="list-group-item list-group-item-action" id="ppk">Pejabat Pembuat Komitmen:
                                            <b id="nama_ppk"><small>belum dipilih</small>  </b>
                                            <input type="hidden" readonly="readonly" name="ppk_id" id="ppk_id">
                                        </li>
                                        
                                       

                                </div>
                                <br>
                                <hr>
                                <div class="btn-group">
                                  <button type="submit" class="btn btn-success btn-sm  save_data">Simpan Data</button>
                                  <a href="{{route('paket.detail',[$paket->id])}}" class="btn btn-outline-info btn-sm ml-2"> Kembali</a>   
                                  </div>
                                  <div >
                                      
                                    </div>

                        </div>

            </div>

            <div class="row-md-8">
                    <div class="card ">

                        
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
              <div class="">
                <table class="table">
                  @forelse ($ppk as $data)
                  <tr>
                      <td class="name">{{$data->nama}}</td>                       
                      <td><span class="badge badge-info">{{$data->kode_jabatan}}</span><span class="text-muted text-sm">{{$data->nama_jabatan}} </span></td>
                      <td>
                        <button type="button" class="btn btn-sm btn-success ppk-person" data-id={{$data->id_pegawai}} data-nama={{$data->nama}}>Pilih</button>
                      </td>
                  </tr>
                
                  @empty
                      
                  @endforelse
                </table>   
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
                  <div class="">
                      @forelse ($pp as $data)
                      <table class="table table-borderless">
                        <tr>
                          <td class="name">{{$data->nama}}</td>                       
                          <td><span class="badge badge-info">{{$data->kode_jabatan}}</span><span class="text-muted text-sm">{{$data->nama_jabatan}} </span></td>
                          <td><button type="button" class="btn btn-sm btn-success pp-person" data-id={{$data->id_pegawai}} data-nama={{$data->nama}}>Pilih</button></td>
                        </tr>
 
                            
                      </table> 

                       

                      @empty
                          tidak ada pp dalam project
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
.col-md-8.mt-5{
                width:100%
        }

@media screen and (min-width: 769px) and (max-width: 1023px) {
        .col-md-8.mt-5{
                width:100%
        }
}

@media screen and (min-width: 400px)  {
        .col-md-8.mt-5{
                width:100%
        }
}

@media screen and (max-width: 991px) {
        .col-md-8.mt-5{
                width:100%;
        }
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
                var nama_ppk=me.attr('data-nama');
                console.log(nama_ppk);
                $('#nama_ppk').text(nama_ppk);
                //console.log(person_id);
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
                var nama_pp=me.attr('data-nama');;
                console.log(nama_pp);
                $('#nama_pp').text(nama_pp);
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