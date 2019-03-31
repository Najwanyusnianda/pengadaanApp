@extends('Admin.layout')

@section('konten')
    <div class="container col-md-8">
        <div class="card ">
            <div class="card-header py-3" style="">
                    <h6 class="m-0 font-weight-bold text-primary">Form Permintaan</h6>
            </div>
            <div class="card-body">
                        <form action="" class="m-3">
                            <div class="form-group">
                                <label for="email">Judul:</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="email">Nomor Form:</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Kode Kegiatan:</label>
                                <input type="text" class="form-control col-6" id="pwd">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Output:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Komponen:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Sub Komponen:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Grup Akun:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group" >
                                <label for="pwd">Nilai (Rp):</label>
                                <input type="number" class="form-control" id="pwd">
                            </div>
                            <div class="form-group" >
                                    <label for="pwd">Tanggal Buat Form:</label>
                                    <input type="date" class="form-control col-6" id="pwd">
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
    
    
    
    
    
                           

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
            </div>
        </div>
    
    </div>
@endsection

@section('addStyle')
    <style>
    .form-control{
        border-radius: 0%;
    }
    .flatpickr-input {
            background-color: white !important;
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