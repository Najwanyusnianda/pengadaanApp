@extends('Admin.layout')

@section('konten')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Responsive Hover Table</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
        <thead>
            <tr>
                  <th>No</th>
                  <th>Permintaan</th>
                  <th>Status</th>
                  <th>Tanggal terima</th>
                  <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
         @if (count($disposisi)>0)
             @foreach ($disposisi as $data)
             <tr>
                <td>1</td>
                <td>{{$data->judul_permintaan}}</td>
                <td><span class="tag tag-info">unread</span></td>
                <td>{{$data->created_at}}</td>
                <td><button disabled="disabled">detail</button></td>
            </tr>  
             @endforeach
         @endif  
 
        </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection