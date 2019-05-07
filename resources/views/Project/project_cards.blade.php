<div class="row justify-content-center"  id="project-list">
    <div class="card-deck" >                  
        <!--- add project button-->
        <a href="" class="card d-flex m-3 mt-3" id="add_Project" style="text-align: center;background-color:#ecf0f1;" >
                <div class="card-body align-items-center d-flex justify-content-center">
                    
                        <div id="item" style="color:#bdc3c7;">
                               <strong> <i class="fas fa-plus fa-3x" ></i> </strong>
                                <p style="line-height:30px;font-family:Roboto;"><strong> Tambah Project Baru</strong></p>
                        </div>                                                
                </div>
        </a>
        <!--- end project button-->
        @forelse ($project as $item)
        <div class="card m-3 mt-3">
            <div class="card-body">
                <div class="text-center">
                        <h4 class="card-title mb-2 text-center">{{$item->nama}}</h4>
                        <small class="card-subtitle mb-2">{{$item->deskripsi}}</small> 
                        
                        <p>Dibuat pada: {{\Carbon\Carbon::parse($item->created_at)->format('d, M Y')}}</p>
                        <div class="btn-block mr-3 align-items-center justify-content-center">
                                <button id="active_project" data-id="{{$item->id}}" class="btn btn-danger " {{$item->is_active ? 'disabled' : ''}} >{{$item->is_active ? 'Sedang aktif' : 'aktifkan'}}</button>
                        <a href="/project/{{$item->id}}/enrollment" class="btn btn-link" style="background-color:#ff6b6b;color:white;">Setup</a>
                        </div>    
                </div>

                
                
            </div>
            <div class="card-footer">

            </div>
        </div>  
        @empty
            
        @endforelse
         
    </div>
    <div class="col-md-4">                
                    
    </div>
    
  
    

      
   
</div>