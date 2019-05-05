    <div class="col"  id="disp_form">
      <div>
          <div class="form-group">
         
              <select class="form-control" id="penerima_disposisi" name="states[]" multiple="multiple">
                    <option disabled selected >Pilih penerima</option>
                @if (count($pegawai)>0)
                    @foreach ($pegawai as $data)
                      <option value="{{$data->id}}">{{$data->nama_depan}}</option>
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
    <br>
    <hr>       
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
    $('#penerima_disposisi').select2();
});
</script>