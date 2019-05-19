@extends('Admin.layout')

@section('konten')
    <div class="container">
      <div class="col-md-8" style="margin:auto;width:50%;font-family:Roboto;font-size:14px;">
          <div class="row-md-6">
              <div class="card p-2 shadow-lg">
                  <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td>Spesifikasi</td>
                        <td><a href="{{route('paket.spek',['id'=>1])}}" class="badge badge-success">Isi Spesifikasi</a></td>
                          
                        </tr>
                        <tr>
                          <td>(HPS)</td>
                          <td><a href="" class="badge badge-success">Isi HPS</a></td>
                  
                        </tr>
                        <tr>
                          <td>KAK</td>
                          <td>
                            <form action="/paket/store_kak" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="custom-file" id="customFile" lang="es" name="kak" id="kak">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp">
                                  <label class="custom-file-label" for="exampleInputFile">
                                     Pilih file...
                                  </label>
                          </div>
                              
                              <button type="submit" class="btn btn-primary" hidden>
                                simpan
                              </button>
                            </form>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-flat btn-block btn-success">Simpan</button>
                  </div>
              </div>
          </div>        
      </div>


    </div>
@endsection