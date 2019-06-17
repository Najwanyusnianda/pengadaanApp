@extends('Admin.layout')


@section('konten')
    <div class="container">
            @if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif
    <div class="row-md-8">
            <nav aria-label="breadcrumb ">
               
                <ol class="breadcrumb arr-right" style="background-color:#2c3e50">
               
                  <li class="breadcrumb-item "><a href="{{route('paket.index')}}" class="text-light">Paket</a></li>
               
                  <li class="breadcrumb-item "><a href="{{route('paket.detail',[$id_paket])}}" class="text-light">Paket detail</a></li>
               
                  <li class="breadcrumb-item text-light active" aria-current="page">Jadwal Pengadaan</li>
               
                </ol>
               
            </nav>
        </div>
        <div class="card shadow-lg col-md-8 card-primary card-outline mx-auto">
            <div class="card-header" style="font-family:Roboto">
              <h5>Jadwal Pengadaan Barang/Jasa :
                  <p><strong>{{$judul}}</strong></p> </h5>  
            </div>
            <form action="{{route('paket.jadwal.store',['id'=>$id_paket])}}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-condensed" style="font-size:13px;font-family:'Varela Round'">
                                    <thead>
                                            <tr>
                                                <th>Nama Kegiatan</th>
                                                <th>Jadwal</th>
                                                
                                            </tr>
                                    </thead>
                          
                                    <tbody>
                                        @if (count($kegiatan_pengadaan)>0)
                                        
                                            <tr>
                                                <td> </td>
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

            /*var nomorFunction=function(kode_ppk,kode_pp,kode_tanggal,kode_kegiatan,tahun,kode_kegiatan_p){
                var nomor;
                if(kode_kegiatan_p =="OE"){
                    nomor=kode_ppk+"/"+kode_kegiatan+"/"+kode_tanggal+"/"+kode_kegiatan_p+"/"+tahun
                }else if(kode_kegiatan_p=="S"){
                    nomor=kode_ppk+"/"+kode_kegiatan+"/"+kode_tanggal+"/"+kode_kegiatan_p+"/"+tahun
                }else{
                    nomor=" "
                }

                return nomor;
            }*/
$(document).ready(function(){
    var dat=$("input[type='date']").flatpickr({
            altInput: true,
            altFormat: " d/m/Y",
            dateFormat: "Y-m-d",
            "disable": [
                    function(date) {
                        // return true to disable
                        return (date.getDay() === 0 || date.getDay() === 6);

                    }
                ],
                "locale": {
                    "firstDayOfWeek": 1 // start week on Monday
                }
            });
})




        </script>
@endsection


@section('addStyle')
<link rel="stylesheet" href="{{asset('assets/flatpickr/flatpickr.min.css')}}">
<style>
td{
    width: 25%;
    height: ;

}
.flatpickr-input {
                background-color: white !important;
            }
        .form-control{
            font-size: 11px;
        } 

</style>

@endsection