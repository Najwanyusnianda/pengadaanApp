@extends('Admin.layout')

@section('addStyle')
<link rel="stylesheet" href="{{asset('assets/flatpickr/flatpickr.min.css')}}">
@endsection

@section('konten')
    <div class="container card">
    <form action="{{route('paket.jadwal_penawaran.store',['id'=>$paket_id])}}" method="post">
        {{ csrf_field() }}
                <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatan_penawaran as $key=>$kegiatan)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>{{$kegiatan->nama_kegiatan_penawaran}}
                                        <input type="number" hidden name="id_kegiatan_penawaran[]" value="{{$kegiatan->id}}" readonly>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                                <input type="date" name="tanggal_pelaksanaan[]" class="form-control">
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="time" name="waktu_mulai[]" class="form-control" placeholder="waktu mulai">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="time" name="waktu_selesai[]" class="form-control" placeholder="waktu selesai">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
            
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary"> Simpan Jadwal</button>
        </form>

    </div>
@endsection


@section('addScript')
<script src="{{asset('assets/flatpickr/flatpickr.js')}}"></script>

<script>
$("input[type='date']").flatpickr({
    altInput: true,
    altFormat: "j - F - Y",
    dateFormat: "Y-m-d",
});
    </script>   
    
    <script>
            $("input[type='time']").flatpickr(
            {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            }
        );
    </script>
@endsection