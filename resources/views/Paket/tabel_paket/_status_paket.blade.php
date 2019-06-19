@if ($status_paket=="pj")
<a href="{{route('paket.detail.penyedia',['id'=>$id_paket])}}" class="badge badge-info">Pilih Penanggung jawab</a>
@else
<!--<a href="{{route('paket.persiapan',[$id_paket])}}"><span class="badge badge-info">Dokumen Persiapan Pengadaan</span></a>
<a href="{{route('paket.detail.penyedia',['id'=>$id_paket])}}" class="badge badge-info">Pilih Calon Penyedia</a>
<a href="{{route('paket.detail.jadwal_penawaran',['id'=>$id_paket])}}" class="badge badge-info">Buat Jadwal Penawaran</a> 
<a href="{{route('paket.pembukaan',['id'=>$id_paket])}}" class="badge badge-info">Pembukaan, Evaluasi, Klarifikasi, dan Negosiasi Teknis </a>  -->  
@endif