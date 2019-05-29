<div class="col">
        <div class="row justify-content-between" style="font-family:QuickSand">
          <h6 style="color:#566787;">
             <strong>Disposisi Masuk </strong> 
          </h6>
          
          <small class="float-right">Tgl. Terima: {{\Carbon\Carbon::parse($disp_detail->created_at)->format('d F Y')}} <hr></small>
        </div>
        <div class="row">
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
                          {{$disp_detail->konten}}
                        </div>
                        <br>
                        <div class="d-block">
                            <button class="btn btn-sm btn-flat btn-outline-secondary">Lihat Form</button>
                        </div>
                        <hr>
                        <p>
                          <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Diteruskan</a>
                        

                        </p>
                
                        
                </div>
        </div>
</div>

