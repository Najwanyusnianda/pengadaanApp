@extends('Admin.layout')

@section('konten')
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card p-2 ">
            <div class="card-header">
              Tambah Spesifikasi
            </div>
              <form action="" method="post" class="m-2">
                  
                  <div class="form-group">
                      <label for="email">Nama Barang/Jasa</label>
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="masukkan nama barang/jasa">
                  </div>
                  <div class="form-group">
                      <label for="email">Spesifikasi</label>
                      <textarea name="spek_barang" id="" class="form-control" cols="30" rows="10"></textarea>
                  </div>

                  <div class="form-group ">
                      <label for="email">Volume</label>
                      <input type="number" class="form-control form-control-sm " id="volume" name="volume" placeholder="masukkan nama barang/jasa">
                  </div>
                  <div class="form-group ">
                      <label for="email">Satuan</label>
                      <input type="text" class="form-control form-control-sm " id="satuan" name="volume" placeholder="masukkan nama barang/jasa">
                  </div>
              </form>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Tambah</button>
              </div>
          </div>

        </div>
        <div class="col-md-8">
          <div class="card p-2">
              <div class="table-responsive">
                  <table class="table table-borderled">
                      <thead>
                        <tr>
                          <th style="width:30%">Nama Barang/Jasa</th>
                          <th>Volume</th>
                          <th>Satuan</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>test</td>
                            <td>20</td>
                            <td>gram</td>
                            <td>keterangan</td>
                          </tr>
                          <tr>
                            <td>Spesifikasi:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quo, alias ipsum consequatur expedita repellendus rerum praesentium. Accusamus unde explicabo, necessitatibus eligendi quae a reprehenderit incidunt qui. Enim, et dolor.</td>
                          </tr>
                      </tbody>
                  </table>
                </div>
          </div>

        </div>
      </div>    


    </div>
@endsection