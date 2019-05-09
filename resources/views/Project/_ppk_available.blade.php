<select class="form-control custom-select" id="ppk_choose" name="role">
    @foreach ($jabatan_ppks as $data)
<option value="{{$data->id}}">{{$data->nama_jabatan}}</option>      
    @endforeach
                   
</select>