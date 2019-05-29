@extends('Admin.layout')



@section('konten')
    <div class="container">
      <div class="col-md-8" style="margin:auto;width:50%;font-family:Roboto;font-size:12px;">
          <div class="row-md-6">
              <div class="card p-2 shadow-lg">
                  <table class="table table-bordered">
                      <tbody>
                          <tr>
                              <td>Surat Permintaan</td>
                            
                              <td><a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="badge badge-secondary">buat surat</a></td>    
                          </tr>

                        <tr>
                          <td>Spesifikasi Teknis</td>
                        <td><a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="badge badge-secondary">Buat Spesifikasi Teknis</a></td>
                          
                        </tr>
                        <tr>
                          <td>Harga Perkiraan Sementara (HPS)</td>
                          <td><a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge badge-secondary">Rincian HPS</a></td>
                          <td>
                            <div class="btn-group">
                              <button href="#" class="btn btn-link">
                                  <i class="fas fa-search"></i>
                              </button>
                              <button href="#" class="btn btn-link">
                                  <i class="fas fa-download"></i>
                              </button>
                            </div>
                          </td>                 
                        </tr>
                        <tr>
                          <td>Kerangka Acuan Kerja</td>
                          <td><a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge badge-secondary">Rincian KAK</a></td>
                  
                        </tr>
                        <tr>
                          <td>Surat Permohonan Pengadaan</td>
                          <td><a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge badge-secondary">Buat KAK</a></td>
                        </tr>
                      </tbody>
                  </table>
                  <div class="card-footer">
                   
                  </div>
              </div>
          </div>
          
          
          <div class="row-md-6">
              <div class="card p-2 shadow-lg">
                  <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td>Standar Dokumen Pemilihan (SDP)</td>
                          <td><a href="{{route('paket.detail.spek',['id'=>$paket->id])}}" class="badge badge-secondary">Detail</a></td>
                          
                        </tr>
                        <tr>
                          <td>Surat Undangan Pengadaan</td>
                          <td><a href="{{route('paket.detail.hps',['id'=>$paket->id])}}" class="badge badge-secondary">Detail surat Undangan</a></td>
                  
                        </tr>
                       <!-- <tr>
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
                        </tr>-->
                      </tbody>
                  </table>
                  <div class="card-footer">
                   
                  </div>
              </div>
          </div>
      </div>


    </div>
@endsection