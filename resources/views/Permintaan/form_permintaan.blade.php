@extends('SubBagian.sub_bagian_index')

@section('konten_bagian')

    <div class="container col-md-8" style="font-family:'Quicksand';font-size:14px;" >
            @if(Session::has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
        <div class="card shadow ">
            <div class="card-header py-3" style="background-color:#2c3e50;">
                    <h6 class="m-0 font-weight-bold text-center" style="color:white;font-size:20px;">Form Permintaan</h6>
            </div>
            <div class="card-body">
            <form action="{{route('permintaan.add')}}" method="POST" class="m-3" style="font-size:16px;">
                {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Judul:</label>
                                <input type="text" class="form-control" id="judul_permintaan" name="judul_permintaan" placeholder="masukkan Judul">
                            </div>

                            <div class="form-group">
                                    <label>Jenis Pengadaan</label>
                                    <select class="form-control" id="jenis_pengadaan" name="jenis_pengadaan">
                                        <option disabled selected>Pilih jenis pengadaan</option>
                                        <option value="barang">Barang/Jasa</option>
                                        <option value="konsultan">Jasa Konsultan</option>
                                        <option value="lainnya">Jasa Lainnya</option>
                                        <option value="fullboard">Fullboard</option>
                                    
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Nomor Form:</label>
                                <input type="text" class="form-control" id="nomor_form_permintaan" name="nomor_form_permintaan" placeholder="Input nomor form permintaan">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Kode Kegiatan:</label>
                        
                                <select class="form-control custom-select" id="kode_kegiatan" name="kode_kegiatan">
                                    
                                    @forelse ($kode_kegiatan as $item)
                                    <option >{{$item->kode_kegiatan}}</option>
                                    @empty
                                        
                                    @endforelse

                                
                                </select>
                                <!--<input type="text" class="form-control col-6" id="kode_kegiatan" name="kode_kegiatan" placeholder="Input 4 digit kode kegiatan">-->
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Output:</label>
                                <input type="text" class="form-control" id="output" name="output" placeholder="Input nama Output">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Komponen:</label>
                                <input type="text" class="form-control" id="komponen" name="komponen" placeholder="Input nama komponen">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Sub Komponen:</label>
                                <input type="text" class="form-control" id="sub_komponen" name="sub_komponen" placeholder="input nama sub komponen">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Grup Akun:</label>
                                <input type="text" class="form-control" id="grup_akun" name="grup_akun" placeholder="input nama grup akun ">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Nilai (Rp):</label>
                                <input type="number" class="form-control col-6" id="nilai_anggaran" name="nilai_anggaran" placeholder="nilai pagu">
                            </div>
                            <div class="form-group">
                                <hr>
                            </div>
                            <div class="form-group" >
                                    <label for="pwd">Tanggal Buat Form:</label>
                                    <input type="date" class="form-control col-6" id="date_buat_form" name="date_buat_form" placeholder="dd - m - yyyy">
                            </div>
                            <div class="form-group ">
                                    <label for="exampleInputEmail1">Tanggal Pelaksanaan: </label>
                                    <div class="form-inline">
                                        <div class="row">
                                            <div class="col">
                                                    <small id="emailHelp" class="form-text text-muted">Mulai</small>
                                                    <input type="date" class="form-control permintaan_control date_control" id="date_mulai" name="date_mulai" aria-describedby="emailHelp" placeholder="dd - m - yyyy">
                                                    
                                            </div>
                                            <div class="col">   
                                                    <small id="emailHelp" class="form-text text-muted">Selesai</small>              
                                                    <input type="date" class="form-control permintaan_control date_control" id="date_selesai" name="date_selesai" aria-describedby="emailHelp" placeholder="dd - m - yyyy">
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted"> </small>
                            </div>
                            <div class="form-group">
                                <hr>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary shadow">Kirim Permintaan</button>
                            </div>
                            
                        </form>
            </div>
        </div>
    
    </div>
@endsection

@section('addStyle')
    <style>
    .form-control{
        
    }
    label{
        font-weight: bold;
    }
    .flatpickr-input {
            background-color: white !important;
        }

    .form-group{
        margin-left: 10%;
        margin-right: 10%;
    }    
    </style>
    <link rel="stylesheet" href="{{asset('assets/flatpickr/flatpickr.min.css')}}">
@endsection

@section('addScript')
<script src="{{asset('assets/flatpickr/flatpickr.js')}}"></script>

<script>
$("input[type='date']").flatpickr({
    altInput: true,
    altFormat: "j - F - Y",
    dateFormat: "Y-m-d",
})
</script>
@endsection