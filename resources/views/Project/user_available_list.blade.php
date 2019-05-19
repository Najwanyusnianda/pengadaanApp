<div class="container">
    <div class="col">
            <div class="row-md-6">
                    <div class="form-group">
                            @if (count($pegawai)>0)
                                <select name="" id="pegawai_choose" class="custom-select form-control" >
                                        @forelse ($pegawai as $data)
                                        <option value="{{$data->id}}">{{$data->nama}} <br><small>{{$data->nip}}</small></option>
                                        @empty
                                            <option disabled>tidak ada user</option>
                                        @endforelse
                                </select>
                            @else
                                <div class="text-center" style="font-family:Roboto">
                                        <p>Tidak ada pengguna yang ditemukan</p>
                                        <strong style="color:cornflowerblue"><a href="/user/list">Register Pengguna ?</a></strong>
                                </div>
                                 @endif

                        </div>
            </div>
            @if (count($pegawai)>0)
            <div class="row-md-6">
                        <label>Role</label>
                        <select class="form-control custom-select" id="role_choose" name="role">
                            <option disabled selected>Pilih Role</option>
                            <option value="2">Pejabat Pengadaan</option>
                            <option value="3">Pejabat Pembuat Komitmen</option>
                            <option value="4">Kepala ULP</option>
                            <option value="5">Kepala Seksi ULP</option>
                            <option value="6">Staf ULP</option>                    
                        </select>
                </div>
            @endif
          
            <br>
        <div class="row-md-6" >
                <div id="ppk">


                </div>
  
                
        </div>            

                <div class="row-md-6" id="ppk">

                </div>
                <!--<div class="row-md-6" id="pp">
                        <label>Jabatan PP</label>
                        <select class="form-control custom-select" id="ppk_choose" name="role">
                                @forelse ($jabatan_pp as $data)
                                <option value="{{$data->id}}">{{$data->kode_jabatan}}</option>                         
                                @empty
                                <option disabled selected>tidak ada</option> 
                                @endforelse   
                        
                        </select>
                </div>-->
                
    </div>
  
    
   
</div>

<script>

       
$('#role_choose').change(function(e){

        me=$(this)
        var id=$('#project_').attr('project-id');
        if(me.val()=='3'){
                
                $.ajax({
                url: '/available/user/'+id+'/ppk',
                dataType: 'html',
                success: function(response) {
                $('#ppk').html(response);
                //$('.modal-title').html(judul);
                }
            });
            
        }
        else if(me.val()=='2'){
                
                $.ajax({
                url: '/available/user/'+id+'/pp',
                dataType: 'html',
                success: function(response) {
                $('#ppk').html(response);
                //$('.modal-title').html(judul);
                }
            });
            
        }else{
                $('#ppk').html('');
        }
        
})

</script>