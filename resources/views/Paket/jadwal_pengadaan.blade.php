@extends('Admin.layout')


@section('konten')
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header" style="color:white;background-color:#566787;">
                Jadwal Pengadaan Barang/Jasa : <strong>{{$judul}}</strong>
            </div>
            <form action="{{route('paket.jadwal.store',['id'=>$id_paket])}}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                            <tr>
                                                <th>Nama Kegiatan</th>
                                                <th>Jadwal</th>
                                                <th>Nomor</th>
                                            </tr>
                                    </thead>
                          
                                    <tbody>
                                        @if (count($kegiatan_pengadaan)>0)
                                        
                                            <tr>
                                                <td> </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @forelse ($kegiatan_pengadaan as $data)

                                                <tr>
                                                    <td>{{$data->nama_kegiatan_p}}
                                                                    <input type="hidden"  class="form-control jadwal" id="" name="id_kegiatan[]" value="{{$data->kegiatan_id}}" >
                                                    </td>
                                                    <td >
                                                            <div class="form-group" >
                                                                    <input type="date" data-id={{$data->kode_kegiatan_p}} class="form-control jadwal"  name="jadwal[]" placeholder="dd - m - yyyy" value="{{$data->jadwal_kegiatan ?? ''}}">
                                                            </div>
                                                    </td>
                                                    <td>
                                                            <div class="form-group" >
                                                            <input type="text" class="form-control nomor_kegiatan"  readonly="readonly" name="nomor[]" value="{{$data->nomor_kegiatan ?? ''}}">
                                                            </div>
                                                    </td>
                                                </tr>

                                            @empty
                                                
                                            @endforelse                                
                                        @endif
            
                                    </tbody>
                                    <tfoot>
            
                                    </tfoot>
                         
                                </table>
                            </div>

                </div>
                <div class="card-footer align-item-center">
                    <button type="submit" class="btn btn-primary btn-flat"> Simpan Jadwal</button>
                    <a class="btn btn-link btn-secondary" href="{{route('paket.pilihKegiatan',['id'=>$id_paket])}}">Pilih kegiatan</a>
                </div>

            </form>
        </div>
    </div>
@endsection


@section('addScript')
<script src="{{asset('assets/flatpickr/flatpickr.js')}}">
</script>
        <script>

            var nomorFunction=function(kode_ppk,kode_pp,kode_tanggal,kode_kegiatan,tahun,kode_kegiatan_p){
                var nomor;
                if(kode_kegiatan_p =="OE"){
                    nomor=kode_ppk+"/"+kode_kegiatan+"/"+kode_tanggal+"/"+kode_kegiatan_p+"/"+tahun
                }else if(kode_kegiatan_p=="S"){
                    nomor=kode_ppk+"/"+kode_kegiatan+"/"+kode_tanggal+"/"+kode_kegiatan_p+"/"+tahun
                }else{
                    nomor=" "
                }

                return nomor;
            }

            $(document).ready(function(){
            var dat=$("input[type='date']").flatpickr({
            altInput: true,
            altFormat: " d/m/Y",
            dateFormat: "Y-m-d",
            })


            $('body').on('change','.jadwal',function(e){
                me=$(this)
              	var nomor_func=me.parent().parent().parent().find('.nomor_kegiatan');
                var kode_ppk="{{$ppk->kode_jabatan}}"
                var kode_pp="{{$pp->kode_jabatan}}"
                var kode_kegiatan_p=me.attr('data-id');
                var kode_kegiatan="{{$kode_kegiatan}}"

                //console.log(kode_ppk,kode_pp);  

                    var tanggal=me.val();
                    var array_tanggal=tanggal.split("-");
                    var tahun=array_tanggal[0];
                var kode_tanggal=function(me){
                    var tanggal=me.val();
                    var array_tanggal=tanggal.split("-");

                    var tahun=array_tanggal[0];
                    var bulan=array_tanggal[1];
                    var hari=array_tanggal[2];

                    var kode_tanggal=hari+"."+bulan+"."+"01";
                    return kode_tanggal;
                }
                
                var kode_tgl=kode_tanggal(me)

                var nomor= nomorFunction(kode_ppk,kode_pp,kode_tgl,kode_kegiatan,tahun,kode_kegiatan_p)
                
                nomor_func.val(nomor);
                /*var addzero=function(number){
                    if(number<10){
                        return "0"+number;
                    }else{
                        return number
                    }
                }*/

                /*var getindexTanggalkode=function(){
                    var index_kode;
                    var jadwalArray = $('input.form-control.jadwal.flatpickr-input.input').map(function() {
                    return this.value;
                    }).get();
                    for (let i = 0; i < jadwalArray.length; i++) {
                        for (let j = 0; j < jadwalArray.length; j++){
                            if(i<j){
                                if(jadwalArray[i]==jadwalArray[j]){
                                    
                                }
                            }
                        }
                        
                    }
                }*/

            });
            });



        </script>
@endsection


@section('addStyle')
<link rel="stylesheet" href="{{asset('assets/flatpickr/flatpickr.min.css')}}">
<style>
td{
    width: 25%;
    height: ;

}

</style>
@endsection