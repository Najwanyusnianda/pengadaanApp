    <div class="col"  id="disp_form">
      <div>
          <div class="form-group">
         
              <select class="form-control" id="penerima_disposisi" name="states[]" multiple="multiple">
                   
                @if (count($pegawai)>0)
                    @foreach ($pegawai as $data)
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                @else
                    <option value="0" disabled>tidak ada data</option>
                @endif   
              </select>
          </div>
      </div>

      <div>
          <div class="form-group">
              <label for="uraian_disposisi" id="uraian_label" class="form-check-label">Uraian Disposisi</label>
              <textarea class="form-control" id="uraian_disposisi" rows="3"></textarea>
          </div>
      </div>
    
    <div>
    </div>

    </div>

    <style>
      #disp_form{
        font-size: 14px;
        font-family: 'Roboto';
        font-weight: 100;
      }

      #penerima_disposisi{
        border-radius: 0%;
      }

      #uraian_disposisi{
        border-radius: 0%;
      }
    </style>


<script>
  $(document).ready(function() {
    function formatState (pegawai) {
    if (!pegawai.id) {
    return pegawai.text;
    }
  
    var $state = $(
    '<span><img src="{{asset('img/user.png')}}" class="img-circle " alt="User Image" style="heigth:10px;width:10%"> ' + pegawai.text + '</span>'
    
    );
    return $state;
  };
  
     
    $('#penerima_disposisi').select2({
      placeholder:"Pilih Penerima",
      templateResult: formatState
    });
});
</script>