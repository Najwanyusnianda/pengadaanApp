<div class="col"  id="pjawab_form">
    <div>
        <div class="form-group">
       
            <select class="form-control custom-select" id="ppk_select">
                  <option  disabled >Pilih Pejabat Pembuat Komitmen</option>
               
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
    
            <select class="form-control custom-select" id="pp_select">
                        <option disabled  >Pilih Pejabat Pengadaan</option>
                    @if (count($pp)>0)
                        @foreach ($pp as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    @else
                        <option value="0" disabled>tidak ada data</option>
                    @endif   
            </select>
        </div>    
     
    </div>
     
    
  </div>