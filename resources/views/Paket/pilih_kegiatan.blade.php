@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="card col-md-6 shadow" style="margin:auto">
            <div class="card-header">
              <h5 style="font-family:Roboto" class="text-center">Jadwal Kegiatan Pengadaan</h5>
            </div>
        <form action="{{route('paket.pilihKegiatan.store',['id'=>$id_paket])}}" method="post">
            <div class="card-body" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size:13px;">
                <div class="list-group">
                    {{ csrf_field() }}
                    @forelse ($kegiatan_list as $item)
                    <input type="checkbox" name="kegiatan[]" value="{{$item->id}}" id="{{$item->nama_kegiatan_p}}" />
                    <label class="list-group-item" for="{{$item->nama_kegiatan_p}}" style="font:weight:500">{{$item->nama_kegiatan_p}}</label>
                     
                    @empty
                        
                    @endforelse

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">next</button>
                <a class="btn btn-link btn-outline-secondary btn-sm ml-3" href="{{route('paket.detail',['id'=>$id_paket])}}">Kembali</a>
            </div>
        </form>
        </div>
    </div>
@endsection


@section('addStyle')
    <style>
    .list-group-item {
  user-select: none;
    }

    .list-group input[type="checkbox"] {
    display: none;
    }

.list-group input[type="checkbox"] + .list-group-item {
  cursor: pointer;
}

.list-group input[type="checkbox"] + .list-group-item:before {
  content: "\2713";
  color: transparent;
  font-weight: bold;
  margin-right: 1em;
}

.list-group input[type="checkbox"]:checked + .list-group-item {
  background-color: #0275D8;
  color: #FFF;
}

.list-group input[type="checkbox"]:checked + .list-group-item:before {
  color: inherit;
}

.list-group input[type="radio"] {
  display: none;
}

.list-group input[type="radio"] + .list-group-item {
  cursor: pointer;
}

.list-group input[type="radio"] + .list-group-item:before {
  content: "\2022";
  color: transparent;
  font-weight: bold;
  margin-right: 1em;
}

.list-group input[type="radio"]:checked + .list-group-item {
  background-color: #0275D8;
  color: #FFF;
}

.list-group input[type="radio"]:checked + .list-group-item:before {
  color: inherit;
}

label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 500;
}
</style>
@endsection