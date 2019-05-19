<div class="col">
        <div class="">
      
              <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{asset('img/user.png')}}" alt="user image">
                          <span class="username">
                            <a href="#">
                              {{$disp_detail->nama_pengirim}}
                            </a>
                            
                          </span>
                          <span class="description">dikirim ke {{$disp_detail->nama_penerima}} - {{\Carbon\Carbon::parse($disp_detail->created_at)->diffForHumans()}}</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          {{$disp_detail->konten}}
                        </p>
                
                        <p>
                          <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                          <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                          <span class="float-right">
                            <a href="#" class="link-black text-sm">
                              <i class="fa fa-comments-o mr-1"></i> Comments (5)
                            </a>
                          </span>
                        </p>
                
                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
        </div>
</div>

