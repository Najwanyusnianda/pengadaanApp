@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="card col-sm-6">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="">
                <form action="{{route('paket.detail.spek.store',['id'=>$id_paket])}}" method="POST">
                    {{ csrf_field() }}
                            <div class="row">
                                <div class="col">
                                        <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Nama Barang/Jasa</label>
                                                <input type="text "class="form-control" id="nama_barang" name="nama_barang">
                                        </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                        <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Volume</label>
                                                <input type="number" class="form-control" id="volume_barang" name="volume_barang" >
                                        </div>
                                </div>
                                <div class="col">
                                        <div class="form-group">
                                                <label for="satuan_barang">Satuan</label>
                                                <input type="text" class="form-control custom-number" id="satuan_barang" name="satuan_barang" >
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col">
                                            <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Spesifikasi</label>
                                                    <textarea  class="form-control" id="spek_barang" name="spek_barang" rows="3"></textarea>
                                            </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                        <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                                <textarea class="form-control" id="spek_barang" name="spek_barang" rows="3"></textarea>
                                        </div>
                                </div>
                            </div>


                            <div class="row">
                                <button type="submit" class="btn btn-block btn-primary"> Tambah Item</button>
                            </div>
                           
                        </form>
                </div>

            </div>
        </div>
        
    </div>
@endsection


@section('addScript')
  <!--<script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
</script> -->
@endsection