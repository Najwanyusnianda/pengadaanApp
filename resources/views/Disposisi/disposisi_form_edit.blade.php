    <div class="col" style="font-family:Roboto;">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Example select</label>
          <select class="form-control" id="penerima_disposisi">
            @if (count($pegawai)>0)
                @foreach ($pegawai as $data)
                  <option value="{{$data->id}}">{{$data->nama}}</option>
                @endforeach
            @else
                <option value="0" disabled>tidak ada data</option>
            @endif


         
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Example textarea</label>
          <textarea class="form-control" id="uraian_disposisi" rows="3"></textarea>
        </div>
    </div>