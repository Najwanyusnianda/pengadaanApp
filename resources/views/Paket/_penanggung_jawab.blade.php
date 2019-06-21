<div class="card">
        <div class="card-header">
           
              Penanggungjawab 
              @if (!empty($pj))
                  
                  <a class="badge badge-warning float-right" href="{{route('paket.pj',[$paket->id])}}" role="button" ><i class="fas fa-pencil-alt"></i> <small>Ganti Penanggungjawab</small> </a> 
              @else
              <a class="badge badge-primary float-right" href="{{route('paket.pj',[$paket->id])}}" role="button" ><i class="fas fa-user-plus"></i> <small>Buat Penanggungjawab</small> </a>       
              @endif
               

        </div>            
                  @if (!empty($pj))
                  <div class="table-responsive">
                        <table class="table table-condensed">
                                <tr>
                                 
                                  <th colspan="2">Nama</th>
                          
                                  <th>#</th>     
                                </tr>
        
                                <tr>
                                    <td width=20px;>
                                        <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="35px" height="35px">
                                    </td> 
                                    <td style="vertical-align:middle">
                                        {{$pj->nama_ppk}}
                                    <small class="d-block">NIP.{{$pj->nip_ppk}}</small>
                                    </td>
        
                                    <td style="vertical-align:middle"> 
                                      <span class="badge badge-success">Pejabat Pembuat Komitmen</span>
                                      
                                    </td>
                                    
                                </tr>    
                                <tr>
                                    <td width=20px;>
                                        <img src="{{asset('img/user.png')}}" class="img-circle img-bordered-sm" alt="User Image" width="35px" height="35px">
                                    </td> 
                                    <td style="vertical-align:middle">
                                        {{$pj->nama_pp}}
                                    <small class="d-block">NIP.{{$pj->nip_pp}}</small>
                                    </td>
                                    <td style="vertical-align:middle"> 
                                      <span class="badge badge-success">Pejabat Pengadaan</span>
                                      
                                    </td>
                                </tr>
                              </table>
                  </div>

                  @else
                  <div class="alert alert-info alert-dismissible m-3">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5 style="font-family:roboto"><i class="icon fas fa-info"></i> Info!</h5>
                      <span style="font-size:13px;font-family:roboto"> <b style="">Penanggungjawab</b>  belum ditentukan</span>
                  </div>
                  @endif

           

      </div>