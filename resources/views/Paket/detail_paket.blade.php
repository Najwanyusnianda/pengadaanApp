@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="card p-2">
            <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Spesifikasi</td>
                    <td><a href="" class="badge badge-success">Buat Spesifikasi</a></td>
                    
                  </tr>
                  <tr>
                    <td>(HPS)</td>
                    <td><a href="" class="badge badge-success">Buat Spesifikasi</a></td>
            
                  </tr>
                  <tr>
                    <td>KAK</td>
                    <td>
                      <form action="/paket/store_kak" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="kak" id="kak">
                        <button type="submit">
                          simpan
                        </button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
@endsection