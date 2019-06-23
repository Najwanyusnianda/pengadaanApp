
     
        <div class="container">
                    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
                <div class="card shadow col-md-6 " style="margin:auto;width:100%">
                    <div class="card-header" >
                                <div class="row justify-content-center">
                                    <div class="col-sm-8 text-center">
                                        <h3>Pembukaan Dokumen Penawaran</h3>
                                    </div>

                                </div>
        
                    </div>
                    <div class="card-body " >
                        <div class="">
                        <form action="{{route('paket.pembukaan_penawaran.store',['id'=>$id_paket])}}" method="POST">
                            {{ csrf_field() }}
        
                           
                                                        
                            <table class="table">
                                    <thead>
                                            <tr>
                                   
                                                    <th>No.</th>
                                                    <th>Dokumen</th>
                                                    <th>Kelengkapan</th>
                                                    
                                            </tr>
                                    </thead>
                                    <tbody class="list_kriteria" style="font-size:13px;font-family:'Varela Round'">
                                        @foreach ($doc_kriteria as $key=> $kriteria)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$kriteria->nama_kriteria}}
                                                <input type="text" name="kriteria_id[]" hidden readonly value="{{$kriteria->id}}">
                                                </td>
                                                <td>
                                                    @if (count($eval_dokumen))
                                                    <div class="custom-control custom-checkbox">
                                                            <input class="kelengkapan" readonly  type='hidden' value="{{$eval_dokumen[$key]->hasil_evaluasi=="1" ? "1" : "0"}}" name='kelengkapan[]'>
                                                            <input type="checkbox" class="custom-control-input check_lengkap" id="kriteria{{$key+1}}" name="check_lengkap[]" value="1" {{$eval_dokumen[$key]->hasil_evaluasi=="1" ? "checked" : ""}}>
                                                                    <label class="custom-control-label" for="kriteria{{$key+1}}">Lengkap</label>
                                                            </div>
                                                    @else
                                                    <div class="custom-control custom-checkbox">
                                                            <input class="kelengkapan" readonly  type='hidden' value="0" name='kelengkapan[]'>
                                                            <input type="checkbox" class="custom-control-input check_lengkap" id="kriteria{{$key+1}}" name="check_lengkap[]" value="1">
                                                                    <label class="custom-control-label" for="kriteria{{$key+1}}">Lengkap</label>
                                                            </div>
                                                    @endif

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                            
                                    </tfoot>
                            </table>

                            <br>
                            <hr>
                            <div class="card-footer mt-4">
                                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                        <a class="btn btn-link btn-outline-secondary btn-sm ml-3" href="{{route('paket.detail',[$id_paket])}}" >Kembali</a>
                            </div>
                 
             
        
                                    
                                   
                        </form>
                        </div>
        
                    </div>
                </div>
                
        </div>

      
