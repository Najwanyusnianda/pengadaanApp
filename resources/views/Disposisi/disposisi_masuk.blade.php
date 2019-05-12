@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="col">
            <div class="row">

            </div>
            <div class="row-md-6 justify-content-center">
                <div class="card" style="font-family:Roboto">
                  
                    @if (count($disposisi_masuk)>0)
                        <table class="table table-bordered table-hover p-2 m-2" id="disp_masuk">

                            <thead>
                                <tr style="color:cornflowerblue;font-size:14px" >
                                    <th>Dari</th>
                                    <th>Perihal</th>
                                    <th>waktu dikirim</th>
                                    <th>isi disposisi</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:12px;">
                                @forelse ($disposisi_masuk as $data)
                                    <tr> 
                                        <td>{{$data->nama_pengirim}} {{$data->nama_pengirim_last}} <br> <small>{{$data->nip_pengirim}}</small></td> 
                                        <td>{{$data->judul_permintaan}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>{{$data->konten}}</td>
                                    </tr>
                                @empty
                                        
                                @endforelse
                            </tbody>
                        </table>        

                    @else
                        <p>tidak ada disposisi</p>
                    @endif


                   
                </div>
            
            </div>
        </div>
    </div>
@endsection


@section('addScript')
    <script>
    //$('#disp_masuk').DataTable();
    </script>
@endsection