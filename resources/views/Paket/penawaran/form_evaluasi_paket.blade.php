@extends('Admin.layout')

@section('konten')
<div class="container">
             @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
        <div class="card shadow col-md-6 " style="margin:auto;width:100%">
            <div class="card-header" >
                        <div class="row justify-content-center">
                            <div class="col-sm-8 text-center">
                                <h3>Evaluasi Penawaran</h3>
                            </div>

                        </div>

            </div>
            <div class="card-body " >
                <div class="">
                <form action="{{route('paket.penawaran_evaluasi.store',['id'=>$id_paket])}}" method="POST">
                    {{ csrf_field() }}

                   
                    <b>Evaluasi  Administrasi </b>                         
                    <table class="table">
                            <thead>
                                    <tr>
                           
                                            <th>No.</th>
                                            <th>Evaluasi</th>
                                            <th>Hasil Evaluasi</th>
                                            
                                    </tr>
                            </thead>
                            <tbody class="list_kriteria" style="font-size:13px;font-family:'Varela Round'">
                                    @foreach ($administrasi as $key=> $kriteria)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$kriteria->nama_kriteria}}
                                        <input type="hidden" name="kriteria_id[]"  readonly value="{{$kriteria->id}}">
                                        </td>
                                        <td>
                                                
                                                @if (count($eval_adm)>0)
                                                <div class="custom-control custom-checkbox">        
                                                                <input class="kelengkapan" readonly  type='hidden' value="{{$eval_adm[$key]->hasil_evaluasi=="1" ? "1" : "0"}}" name='syarat_verifikasi[]'>
                                                                <input type="checkbox" class="custom-control-input check_lengkap" id="administrasi{{$key+1}}" name="check_syarat[]" value="1" {{$eval_adm[$key]->hasil_evaluasi=="1" ? "checked" : ""}}>
                                                                <label class="custom-control-label" for="administrasi{{$key+1}}">Memenuhi Syarat</label>
                                                                </div>
                                                @else
                                             

                                                                <div class="custom-control custom-checkbox">        
                                                                                <input class="kelengkapan" readonly  type='hidden' value="0" name='syarat_verifikasi[]'>
                                                                                <input type="checkbox" class="custom-control-input check_lengkap" id="administrasi{{$key+1}}" name="check_syarat[]" value="1" >
                                                                                <label class="custom-control-label" for="administrasi{{$key+1}}">Memenuhi Syarat</label>
                                                                                </div>
                                                @endif

                                        </td>

                                    </tr>
                                    @endforeach
    
                            </tbody>
                            <tfoot>
                                    
                            </tfoot>
                    </table>
                    <hr>
                    <b>Evaluasi  Kualifikasi </b>                         
                    <table class="table">
                            <thead>
                                    <tr>
                           
                                            <th>No.</th>
                                            <th>Evaluasi</th>
                                            <th>Hasil Evaluasi</th>
                                            
                                    </tr>
                            </thead>
                            <tbody class="list_kriteria" style="font-size:13px;font-family:'Varela Round'">
                                
                                    @foreach ($kualifikasi as $key=> $kriteria)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$kriteria->nama_kriteria}}
                                        <input type="hidden" name="kriteria_id[]"  readonly value="{{$kriteria->id}}">
                                        </td>
                                        <td>
                                                @if (count($eval_kualifikasi)>0)
                                                                <div class="custom-control custom-checkbox">
                                                                <input class="kelengkapan" readonly  type='hidden' value="{{$eval_kualifikasi[$key]->hasil_evaluasi=="1" ? "1" : "0"}}" name='syarat_verifikasi[]'>
                                                                <input type="checkbox" class="custom-control-input check_lengkap" id="kualifikasi{{$key+1}}" name="check_syarat[]" value="1" {{$eval_kualifikasi[$key]->hasil_evaluasi=="1" ? "checked" : ""}}>
                                                                        <label class="custom-control-label" for="kualifikasi{{$key+1}}">Memenuhi Syarat</label>
                                                                </div>
                                                @else
                                                                <div class="custom-control custom-checkbox">
                                                                <input class="kelengkapan" readonly  type='hidden' value="0" name='syarat_verifikasi[]'>
                                                                <input type="checkbox" class="custom-control-input check_lengkap" id="kualifikasi{{$key+1}}" name="check_syarat[]" value="1">
                                                                        <label class="custom-control-label" for="kualifikasi{{$key+1}}">Memenuhi Syarat</label>
                                                                </div>
                                                    
                                                @endif

                                        </td>

                                    </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>
                                    
                            </tfoot>
                    </table>
                    <hr>
                    <b>Evaluasi Teknis</b>
                    <div class="list-group">
                        <li class="list-group-item">
                            @foreach ($teknis as $key=> $kriteria)
                            
                            @if (count($eval_teknis)>0)
                                        <div class="custom-control custom-checkbox">
                                        <input type="hidden" name="kriteria_id[]"  readonly value="{{$kriteria->id}}">
                                        <input class="kelengkapan" readonly  type='hidden' value="{{$eval_teknis[$key]->hasil_evaluasi=="1" ? "1" : "0"}}" name='syarat_verifikasi[]'>
                                        <input type="checkbox" class="custom-control-input check_lengkap" id="teknis{{$key+1}}" name="check_syarat[]" value="1" {{$eval_teknis[$key]->hasil_evaluasi=="1" ? "checked" : ""}}>
                                                <label class="custom-control-label" for="teknis{{$key+1}}">Lulus</label>
                                        </div>


                            @else
                                        <div class="custom-control custom-checkbox">
                                        <input type="hidden" name="kriteria_id[]"  readonly value="{{$kriteria->id}}">
                                        <input class="kelengkapan" readonly  type='hidden' value="0" name='syarat_verifikasi[]'>
                                        <input type="checkbox" class="custom-control-input check_lengkap" id="teknis{{$key+1}}" name="check_syarat[]" value="1">
                                                <label class="custom-control-label" for="teknis{{$key+1}}">Lulus</label>
                                        </div>
                            @endif

                            @endforeach
                        </li>
                    </div>
                    <b>Evaluasi  Harga </b>                         
                    <table class="table">
                            <thead>
                                    <tr>
                           
                                            <th>No.</th>
                                            <th>Evaluasi</th>
                                            <th>Hasil Evaluasi</th>
                                            
                                    </tr>
                            </thead>
                            <tbody class="list_kriteria" style="font-size:13px;font-family:'Varela Round'">
                                    @foreach ($harga as $key=> $kriteria)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$kriteria->nama_kriteria}}
                                        <input type="hidden" name="kriteria_id[]"  readonly value="{{$kriteria->id}}">
                                        </td>
                                        <td>

                                                @if (count($eval_harga)>0)

                                                                <div class="custom-control custom-checkbox">
                                                                <input class="kelengkapan" readonly  type='hidden' value="{{$eval_harga[$key]->hasil_evaluasi=="1" ? "1" : "0"}}" name='syarat_verifikasi[]'>
                                                                <input type="checkbox" class="custom-control-input check_lengkap" id="harga{{$key+1}}" name="check_syarat[]" value="1" {{$eval_harga[$key]->hasil_evaluasi=="1" ? "checked" : ""}}>
                                                                        <label class="custom-control-label" for="harga{{$key+1}}">Memenuhi Syarat</label>
                                                                </div>
                                                @else
                                                                 <div class="custom-control custom-checkbox">
                                                                <input class="kelengkapan" readonly  type='hidden' value="0" name='syarat_verifikasi[]'>
                                                                <input type="checkbox" class="custom-control-input check_lengkap" id="harga{{$key+1}}" name="check_syarat[]" value="1">
                                                                        <label class="custom-control-label" for="harga{{$key+1}}">Memenuhi Syarat</label>
                                                                </div>
                                                @endif

                                  
                                        </td>

                                    </tr>
                                    @endforeach
    
                            </tbody>
                            <tfoot>
                                    
                            </tfoot>
                    </table>
                    <br>
                    <hr>
                    <div class="card-footer mt-4">
                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                <a class="btn btn-link btn-outline-secondary btn-sm ml-3" href={{route('paket.detail',[$id_paket])}}>Kembali</a>
                    </div>
         
     

                            
                           
                </form>
                </div>

            </div>
        </div>
        
</div>
@endsection

@section('addStyle')
<style>
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before{
    background-color:#28a745;
}

.custom-control.custom-checkbox{padding-left: 0;}

label.custom-control-label {
position: relative;
padding-right: 1.5rem;
}

label.custom-control-label::before, label.custom-control-label::after{
right: 0;
left: auto;
}

label:not(.form-check-label):not(.custom-file-label){
font-weight: 500
}
</style>
@endsection

@section('addScript')
    <script>
    $(document).ready(function(){


        $('body').on('click','.check_lengkap',function(e){
            me=$(this);
            var kelengkapan=me.parent().find('.kelengkapan');
            
            if(me.prop("checked")==true){
                kelengkapan.val("1")
            }else if(me.prop("checked")==false){
                kelengkapan.val("0")
            }
        })

    })
    </script>
@endsection