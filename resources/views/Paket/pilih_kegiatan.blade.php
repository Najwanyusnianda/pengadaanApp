@extends('Admin.layout')

@section('konten')
    <div class="container">
        <div class="card">
            <div class="card-header">

            </div>
    <form action="{{route('paket.pilihKegiatan.store',['id'=>$id_paket])}}" method="post">
            <div class="card-body">
                <div class="list-group">
                    {{ csrf_field() }}
                    @forelse ($kegiatan_list as $item)
                    <input type="checkbox" name="kegiatan[]" value="{{$item->id}}" id="{{$item->nama_kegiatan_p}}" />
                    <label class="list-group-item" for="{{$item->nama_kegiatan_p}}">{{$item->nama_kegiatan_p}}</label>
                     
                    @empty
                        
                    @endforelse

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">next</button>
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
}</style>
@endsection