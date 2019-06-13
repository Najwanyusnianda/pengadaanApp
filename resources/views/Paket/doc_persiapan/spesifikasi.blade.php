@extends('Admin.layout')

@section('addStyle')
    <style>
    th{
            font-weight: 700;
            color:#566787;
    }
    #item-modal{
        font-family: 'QuickSand';
        font-weight: 300; 
    
    }

    .form-control{
        border-radius: 0%;
        font-family: 'Varela Round';
    }
    </style>
@endsection

@section('konten')
    <div class="container">
        <div class="card shadow col-md-6 " style="margin:auto;width:50%">
            <div class="card-header" >
                        <div class="row">
                                        <div class="col-sm-8"><h3>Spesifikasi Teknis</h3></div>
                                        <div class="col-sm-4">
                                                <button class="btn btn-info btn-sm  float-right" data-target="item-show" id="item-show"> Tambah item</button>
                                        </div>
                                    </div>

                        </div>
            <div class="card-body " >
                <div class="">
                <form action="{{route('paket.detail.spek.store',['id'=>$id_paket])}}" method="POST">
                    {{ csrf_field() }}
                    <div class="hidden" id="hidden_item">
                                
                    </div>

                   
                                                
                    <table class="table">
                            <thead>
                                    <tr>
                           
                                            <th>Jenis Pekerjaan</th>
                                            <th>Volume</th>
                                            <th>Satuan</th>
                                            
                                    </tr>
                            </thead>
                            <tbody class="itemlist" style="font-size:13px;font-family:'Varela Round'">
                               

                            </tbody>
                            <tfoot>
                                    
                            </tfoot>
                    </table>
                    <hr>
                    <br>
                    <div class="row">
                                <div class="col">
                                        <div class="form-group">
                                                <label for="spek_barang" style="font-size:13px;font-family:Roboto;font-weight:600 !important">Spesifikasi:</label>
                                                <textarea class="form-control" id="spek_barang" name="spek_barang" rows="3"></textarea>
                                        </div>
                                </div>
                            </div>
                    <hr>
                    <div class="card-footer mt-4">
                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                <a class="btn btn-link btn-outline-secondary btn-sm ml-3" >Kembali</a>
                    </div>
         
                    <!--
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
                            </div>-->

                            
                           
                </form>
                </div>

            </div>
        </div>
        
    </div>

        <div class="modal fade" id="item-modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="font-size:13px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                                            <div class="row">
                                                <div class="col">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlTextarea1" style="font-family: 'QuickSand';font-weight:500;">Nama Barang/Pekerjaan</label>
                                                                <input type="text "class="form-control" id="nama_barang" name="nama_barang">
                                                        </div>
                                                </div>
                
                                            </div>
                
                                            <div class="row">
                                                <div class="col">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlTextarea1" style="font-family: 'QuickSand';font-weight:500;">Volume</label>
                                                                <input type="number" class="form-control" id="volume_barang" name="volume_barang" >
                                                        </div>
                                                </div>
                                                <div class="col">
                                                        <div class="form-group">
                                                                <label for="satuan_barang" style="font-family: 'QuickSand';font-weight:500;">Satuan</label>
                                                                
                                                                <input type="text" class="form-control custom-number" id="satuan_barang" name="satuan_barang" >
                                                        </div>
                                                </div>
                                            </div>
                

        
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                      <button type="button" class="btn btn-primary" id="addItem">Add Item</button>
                    </div>
                  </div>
                </div>
        </div>


@endsection


@section('addScript')
<script src="https://cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
  <script>
      CKEDITOR.replace('spek_barang');
</script>
<script>
$('#item-show').click(function(e){
        e.preventDefault();
        $('#item-modal').modal('show');
        
})

$('#addItem').click(function(e){
      
        var nama_barang=$('#nama_barang').val();
        var volume=$('#volume_barang').val();
        var satuan=$('#satuan_barang').val();

        $('#hidden_item').append('<input hidden type="text "class="form-control" class="nama_barang" name="nama_barang[]" value='+'"'+nama_barang+'"'+'>');
        $('#hidden_item').append('<input hidden type="number" class="form-control" id="volume_barang" name="volume_barang[]" value='+'"'+volume+'"'+'>');
        $('#hidden_item').append('<input hidden type="text" class="form-control custom-number" id="satuan_barang" name="satuan_barang[]" value='+'"'+satuan+'"'+'>')
        $('.itemlist').append(' <tr><td>'+nama_barang+'</td><td>'+volume+'</td><td>'+satuan+'</td></tr>');
        $('#close').trigger("click");
})
</script>
@endsection