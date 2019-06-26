<div class="card">
            <div class="card-body">
                    <div class="mt-2 ml-2">
                            <h5>Penanggungjawab</h5>
                        @if (!empty($pj))
                      
                            <a class="badge badge-warning" href="{{route('paket.pj',[$paket->id])}}" role="button" ><i class="fas fa-pencil-alt"></i> <small>Ganti Penanggungjawab</small> </a> 
                        @else
                        <a class="badge badge-primary" href="{{route('paket.pj',[$paket->id])}}" role="button" ><i class="fas fa-user-plus"></i> <small>Buat Penanggungjawab</small> </a>       
                        @endif
                    </div>
             
                   
                         <hr>
                      @if (!empty($pj))
                      <div class="table-responsive">
                            <table class="table table-bordered">
                                    <tr>
                                     
                                      <th colspan="2">Nama</th>
                                      <th width=50%>Jabatan</th> 
                                      <th>Label</th> 
    
                                    </tr>
            
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

                      <h6>Petugas Pemberkasan</h6>
                      <table class="table table-bordered">
                      <tr>
                          <th>Nama</th>
                          <th>Nip</th>
                      </tr>
                      @forelse ($staf as $pegawai)
                          <tr>
                          <td>{{$pegawai->nama}}</td>
                          <td>NIP.{{$pegawai->nip}}</td>
                          </tr>
                      @empty
                          
                      @endforelse
                      </table>
            </div>
           

      </div>