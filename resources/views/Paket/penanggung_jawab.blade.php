<div class="col"  id="pjawab_form">
    <div>
        <div class="form-group">
       
            <select class="form-control" id="penerima_disposisi">
                  <option disabled selected >Pilih penerima</option>
              @if (count($ppk)>0)
                  @foreach ($ppk as $data)
                    <option value="{{$data->id}}">
                        
                        {{$data->nama}}
                    </option>
                  @endforeach
              @else
                  <option value="0" disabled>tidak ada data</option>
              @endif   
            </select>
        </div>
    </div>

    <div>
        <div class="form-group">
    
            <select class="form-control" id="penerima_disposisi">
                        <option disabled selected >Pilih penerima</option>
                    @if (count($ppk)>0)
                        @foreach ($ppk as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    @else
                        <option value="0" disabled>tidak ada data</option>
                    @endif   
            </select>
        </div>    
     
    </div>
     
    
  </div>