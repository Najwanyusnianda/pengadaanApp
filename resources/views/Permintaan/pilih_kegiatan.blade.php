@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Pilih Kegiatan Pnegadaan
            </div>
            <div class="card-body">
                @if (count($kegiatan_list)>0)
            <form action="{{route('paket.pilihKegiatan.store',['id'=>$paket_id])}}" method="post">
                    @forelse ($kegiatan_list as $data)
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$data->id}}" name=kegiatan[]>
                            <label class="form-check-label" for="defaultCheck1">
                               {{$data->nama_kegiatan_p}}
                            </label>
                    </div>
                    @empty
                        
                    @endforelse

                </form>
                
                @else
                    
                @endif
            </div>
        </div>
    </div>
@endsection