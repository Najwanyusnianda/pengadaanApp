@extends('Admin.layout')


@section('konten')
    <div class="container">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama PPK</th>
                                <th>Jabatan</th>
                                <th>Kode</th>
                                <th>Kode Program</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jabatan_ppk as $data)
                                <tr>
                                    <td data-id={{$data->id}}>

                                    </td>
                                    <td>
                                        {{$data->nama_jabatan}}
                                    </td>
                                    <td>{{$data->kode_jabatan}}</td>
                                    <td>{{$data->kode_program}}</td>

                                </tr>
                            @empty
                                <p>empty</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection