@extends('Admin.layout')

@section('konten')
    <div class="container">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Bordered Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>kode bagian</th>
                                <th>Nama Bagian</th>
                                <th>Register</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subject_matter as $data)
                                <tr>
                                <td>{{$data->kode_bagian}}</td>
                                    <td>{{$data->nama_bagian}}</td>
                                    <td> 
                                        <a href="" class="btn btn-link register_bagian_show">
                                                <i class="fas fa-user-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <p>tidak ada data</p>
                            @endforelse
                           
                 
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
    </div>
@endsection


@section('addScript')
    <script>

    </script>    
@endsection