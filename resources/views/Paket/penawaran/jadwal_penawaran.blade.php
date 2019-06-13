@extends('Admin.layout')

@section('addStyle')
<link rel="stylesheet" href="{{asset('assets/flatpickr/flatpickr.min.css')}}">
<style>
    .flatpickr-input {
            background-color: white !important;
        }
    .form-control{
        font-size: 11px;
    }    
</style>
@endsection

@section('konten')
<form action="{{route('paket.jadwal_penawaran.store',['id'=>$paket_id])}}" method="post">
    <div class="container card shadow col-md-12" style="width:80%;margin:auto;">
        <div class="card-header card-header-pills">
            Jadwal Penawaran <button type="submit" class="btn btn-primary btn-sm float-right"> Simpan Jadwal</button>
        </div>
    
        {{ csrf_field() }}
                <table class="table" style="font-size:13px;font-family:'Varela Round'">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Waktu <span style="font-weight:300"><small>(mulai s/d selesai)</small></span></th>
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
                                                    <input type="time" name="waktu_mulai[]" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <input type="time" name="waktu_selesai[]" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
            
                        </tbody>
                    </table>

                    
        

    </div>
</form>
@endsection


@section('addScript')
<script src="{{asset('assets/flatpickr/flatpickr.js')}}"></script>

<script>
$("input[type='date']").flatpickr({
    altInput: true,
    altFormat: "j - F - Y",
    dateFormat: "Y-m-d",
    "disable": [
        function(date) {
            // return true to disable
            return (date.getDay() === 0 || date.getDay() === 6);

        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }

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