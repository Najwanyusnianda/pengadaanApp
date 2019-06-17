@extends('Admin.layout')

@section('link_bread')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active"><a href="{{route('paket.index')}}">Paket</a></li>
<li class="breadcrumb-item active"><a href="{{route('paket.detail',['id'=>$id_paket])}}">Detail</a></li>
<li class="breadcrumb-item active">Penyedia</li>
@endsection
@section('konten')
    
<style>
.form-control{
    border-radius: 0%;
}





</style>

<div class="container">
    <div class="card shadow" style="margin:auto;width:50%">
    <form action="{{route('paket.detail.penyedia.store',['id'=>$id_paket])}}" method="POST" class="m-4" style="font-family:QuickSand;font-size:13px;color:#566787;font-weight: 500;">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama Penyedia</label>
                <input type="text" class="form-control" id="nama_penyedia" name="nama_penyedia" placeholder="masukkan nama penyedia">
            </div>
            <div class="form-group">
                    <label for="">Nama Pimpinan Penyedia</label>
                    <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" placeholder="nama pimpinan Penyedia">
            </div>
            <div class="form-group">
                    <label for="">Jabatan Pimpinan Penyedia</label>
                    <input type="text" class="form-control" id="jabatan_pimpinan" name="jabatan_pimpinan" placeholder="nama jabatan pimpinan penyedia">
            </div>
            <div class="form-group">
                <label for="">NPWP</label>
                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="input npwp">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="email_penyedia" name="email_penyedia" placeholder="input email">
            </div>
            <div class="form-group">
                <label for="">Telepon</label>
                <input type="number" class="form-control" id="telp_penyedia" name="telp_penyedia" placeholder=" ">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" class="form-control" id="alamat_penyedia" name="alamat_penyedia" placeholder="masukkan Alamat">
            
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-block btn-primary"> Tambah Penyedia</button>
            </div>
        </form>
    </div>
</div>
@endsection