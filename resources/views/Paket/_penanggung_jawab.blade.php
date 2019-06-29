
    <div class="card shadow">
            <div class="card-body"  style="font-size:13px, sans-serif;padding:2%">
                    <div class="mt-2 ml-2">
                            <h5>Penanggungjawab</h5>

                    </div>
             
                   
                         <hr>
                      @if (!empty($pj))
                      <div class="table-responsive">
                            <table class="table table-condensed">
                                    <thead>
                                            <tr>
                                     
                                                    <th colspan="2">Nama</th>
                                                    <th width=50%>Jabatan</th> 
                                                    <th>Label</th> 
                  
                                                  </tr>
                                    </thead>

                                    <tbody>
                                            <tr>
                                                    <td width=20px;>
                                                        <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="35px" height="35px">
                                                    </td> 
                                                    <td style="vertical-align:middle">
                                                        {{$ppk->nama}}
                                                    <small class="d-block">NIP.{{$ppk->nip}}</small>
                                                    </td>
                        
                                                    <td style="vertical-align:middle"> 
                                                    <span class="">{{$ppk->nama_jabatan}}</span>
                                                      
                                                    </td>
                                                     <td><span class="badge badge-primary">{{$ppk->kode_jabatan}}</span></td>
                                                    
                                                </tr>    
                                                <tr>
                                                    <td width=20px;>
                                                        <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="35px" height="35px">
                                                    </td> 
                                                    <td style="vertical-align:middle">
                                                        {{$pp->nama}}
                                                    <small class="d-block">NIP.{{$pp->nip}}</small>
                                                    </td>
                                                    <td style="vertical-align:middle"> 
                                                            <span class="">{{$pp->nama_jabatan}}</span>
                                                              
                                                            </td>
                                                             <td> <span class="badge badge-primary">{{$pp->kode_jabatan}}</span></td>
                                                </tr>
                                    </tbody>

                            </table>
                            <br>
                            <hr>
                      </div>
    
                      @else
                      <div class="alert alert-info alert-dismissible m-3">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5 style="font-family:roboto"><i class="icon fas fa-info"></i> Info!</h5>
                          <span style="font-size:13px;font-family:roboto"> <b style="">Penanggungjawab</b>  belum ditentukan</span>
                      </div>
                      @endif

                

            </div>
            <div class="card-footer">
                 @if (!empty($pj))
                      
                    <a class="btn btn-warning btn-sm shadow" href="{{route('paket.pj',[$paket->id])}}" role="button" ><i class="fas fa-pencil-alt"></i> <small>Ganti Penanggungjawab</small> </a> 
                @else
                    <a class="btn btn-primary btn-sm shadow" href="{{route('paket.pj',[$paket->id])}}" role="button" ><i class="fas fa-user-plus"></i> <small>Buat Penanggungjawab</small> </a>       
                @endif
            </div>
           

    </div>

    <div class="card shadow" style="font-family:Roboto">
        <div class="card-header">
                <div class="mt-2 ml-2">
                        <h6>Staf Penanggungjawab</h6>

                </div>
        </div>
        <div class="card-body">

         <div class="row-md-8">
             <div class="table-responsive">
                    <table class="table table-condensed col-md-4" >
                        <thead>
                            
                        </thead>
                            @forelse ($staf as $pegawai)
                             <tr>
                                   <td width=20px;>
                                           <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="35px" height="35px">
                                       </td> 
                                       <td style="vertical-align:middle">
                                               {{$pegawai->nama}}
                                       <small class="d-block">NIP.{{$pegawai->nip}}</small>
                                   </td>
                             </tr>
                            @empty
                             
                            @endforelse
                   </table>
             </div>

         </div>

        </div>
        <div class="card-footer">

        </div>
    </div>