<select class="form-control custom-select" id="pp_choose" name="role">
        @foreach ($jabatan_pps as $data)
    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>      
        @endforeach
                       
    </select>