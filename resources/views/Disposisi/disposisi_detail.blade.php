@if ($disp_detail->nama_pengirim==auth()->user()->person->nama)
<div class="">
    <div class="row justify-content-between" style="font-family:QuickSand">
      <h6 style="color:#566787;">
         <strong>Disposisi Terkirim </strong> 
      </h6>
      
      <small class="float-right">Tgl. Terima: {{\Carbon\Carbon::parse($disp_detail->created_at)->format('d F Y')}} <hr></small>
    </div>
    <div class="row-md-8">
            <div class="post" style="font-family:Roboto">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{asset('img/user.png')}}" alt="user image">
                      <span class="username" style="font-size:13px;">
                          {{$disp_detail->nama_penerima}}
                      </span>
                      <span class="description">{{\Carbon\Carbon::parse($disp_detail->created_at)->diffForHumans()}}</span>
                    
                    </div>

                    <hr>
                    <!-- /.user-block -->

                       
        
                    <div class="konten_disposisi_section">
                      <i class="fas fa-quote-right fa-circle"></i>
                      <span class="konten_disposisi">{{ $disp_detail->konten }}</span>
                    </div>
                    <div class="form-group edit_disposisi_form">
                        <textarea class="form-control disposisi_field" rows="3"></textarea>
                    </div>
                    <br>
                    <div class="d-block">
                        <button class="btn btn-sm btn-link permintaan-show" data-id="{{$disp_detail->permintaan_id}}">Lihat Permintaan </button>
                    </div>
                    <hr>
                    <p>
                      @if (auth()->user()->person->id==$disp_detail->from_id)
                      <a href="#" class="link-black text-sm mr-2 edit_disposisi" data-id="{{$disp_detail->konten_id}}"><i class="fas fa-pen " ></i> Edit disposisi</a>
                      @endif
                      
                    

                    </p>
            
                    
            </div>
    </div>
</div>   
@else
<div class="">
    <div class="row-md-8 justify-content-between" style="font-family:QuickSand">
      <h6 style="color:#566787;">
         <strong>Disposisi Masuk </strong> 
      </h6>
      
      <small class="float-right">Tgl. Terima: {{\Carbon\Carbon::parse($disp_detail->created_at)->format('d F Y')}} <hr></small>
    </div>
    <div class="row-md-8">
            <div class="post" style="font-family:Roboto">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{asset('img/user.png')}}" alt="user image">
                      <span class="username" style="font-size:13px;">
                          {{$disp_detail->nama_pengirim}}
                      </span>
                      <span class="description">dikirim ke {{$disp_detail->nama_penerima}} - {{\Carbon\Carbon::parse($disp_detail->created_at)->diffForHumans()}}</span>
                    </div>

                    <hr>
                    <!-- /.user-block -->

                       
        
                    <div>
                      <i class="fas fa-quote-right fa-circle"></i>
                      
                     
                      @if (auth()->user()->person->role->id=="6")
                      {!! $disp_detail->konten_updated !!}
                      @else
                      {!! $disp_detail->konten !!}
                      @endif
                    </div>
                    <br>
                    <div class="d-block">
                        <button class="btn btn-sm btn-link permintaan-show" data-id="{{$disp_detail->permintaan_id}}">Lihat Permintaan </button>
                    </div>
                    <hr>
                    <p>
                    <a href="{{route('permintaan.list')}}" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Diteruskan</a>
                      @if (auth()->user()->person->id==$disp_detail->from_id)
                      <a href="#" class="link-black text-sm mr-2"><i class="fas fa-pen"></i> Edit</a>
                      @endif
                      
                    

                    </p>
            
                    
            </div>
    </div>
</div>  
@endif








<script>
$(document).ready(function(){
 var formEdit=$('.edit_disposisi_form');
  formEdit.hide();
  $('body').on('click','.permintaan-show',function(e){
            e.preventDefault();

            
            var me = $(this);
            var id= me.attr('data-id');
            var me = me.parent().parent();
            //var judul=me.find('.judul').text();
            console.log(id);
          
            //get disposisi form
            $.ajax({
                url: '/permintaan/'+id,
                dataType: 'html',
                success: function(response) {
                $('#detail_body').html(response);
               
                }
            });
            $('.permintaan_modal').modal('show');

        });

  $('body').on('click','.edit_disposisi',function(e){
    e.preventDefault();
    var me = $(this);
    var konten_id=me.attr('data-id');
    var konten_disposisi=me.parent().parent().find('.konten_disposisi');
    var disposisi_section=me.parent().parent().find('.konten_disposisi_section');
    var form_edit=me.parent().parent().find('.edit_disposisi_form');
    var form_edit_field=me.parent().parent().find('.disposisi_field');
    var aksi_group=me.parent();
    form_edit.show();
   form_edit_field.html(konten_disposisi.text());
    disposisi_section.hide();
    aksi_group.html('<a class="btn btn-sm btn-success mr-2 simpan_update" href="/disposisi/'+konten_id+'/update">Simpan Update</a> <a href="#" class="link-black text-sm mr-2 batalkan_disposisi"><i class="fas fa-times-circle"></i> Batalkan</a>')
  })

  $('body').on('click','.batalkan_disposisi',function(e){
    e.preventDefault();
    var me = $(this);
    var konten_disposisi=me.parent().parent().find('.konten_disposisi');
    var disposisi_section=me.parent().parent().find('.konten_disposisi_section');
    var form_edit=me.parent().parent().find('.edit_disposisi_form');
    var form_edit_field=me.parent().parent().find('.disposisi_field');
    form_edit.hide();
    disposisi_section.show();
    var aksi_group=me.parent();
    aksi_group.html('<a href="#" class="link-black text-sm mr-2 edit_disposisi"><i class="fas fa-pen " ></i> Edit disposisi</a>')
  })

  $('body').on('click','.simpan_update',function(e){
    e.preventDefault();
    me=$(this);
    var url=me.attr('href');

    var form_edit_field=me.parent().parent().find('.disposisi_field');
    var konten_new=form_edit_field.val();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
    });
    
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {
            // change data to this object
            _token: $('meta[name="csrf-token"]').attr('content'),
            konten: konten_new
       
            
        },
        success: function(result) {
            //console.log(result);
       
            Swal.fire(
                'Updated!',
                'Disposisi Telah Diupdate!',
                )
            //permintaanTable.ajax.reload();
           setTimeout(
            function() 
            {
              Swal.showLoading();
                location.reload();
            }, 2000);
            $("#close").trigger("click");
        },error:function(){
            alert('error');
        }

    });

  })
})

</script>