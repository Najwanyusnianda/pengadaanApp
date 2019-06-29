<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PDF;
use DB;
//use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\Common\XMLWriter;
use App\Project;
use App\ProjectEnrollment;
use App\Paket;
use App\Permintaan;
use App\SpekTeknis;
use App\SpekHpsItem;
use App\JadwalKegiatanPengadaan;
use App\JadwalPenawaran;
use App\PaketDokumen;
use Illuminate\Support\Facades\Storage;


class BerkasController extends Controller
{
    //

/////////////////////////////////////////////
    public function generateBahps($id){
        ///
        function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
        }
     
        function terbilang($nilai) {
            if($nilai<0) {
                $hasil = "minus ". trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }     		
            return $hasil;
        }

        function hariIndo($date){
            $day=\Carbon\Carbon::parse($date)->format('l');
            $hari='';
            if($day=="Monday"){
                $hari="senin";
            }elseif ($day=="Tuesday") {
                $hari="selasa";
            }elseif ($day=="Wednesday"){
                $hari="rabu";
            }elseif($day=="Thursday"){
                $hari="kamis";
            }elseif($day=="Friday"){
                $hari="jumat";
            }elseif($day=="Saturday"){
                $hari="sabtu";
            }elseif($day=="Sunday"){
                $hari="minggu";
            };
            return $hari;
        }

        function bulanIndo($date){
           $bulan=\Carbon\Carbon::parse($date)->format('F');
            $bulan_indo='';
            if($bulan=="January"){
                $bulan_indo="Januari";
            }elseif ($bulan=="February") {
                $bulan_indo="Februari";
            }elseif ($bulan=="March") {
                $bulan_indo="Maret";
            }elseif ($bulan=="April") {
                $bulan_indo=="April";
            }elseif ($bulan=="May") {
                $bulan_indo=="Mei";
            }elseif ($bulan=="June") {
                $bulan_indo=="Juni";
            }elseif ($bulan=="July") {
                $bulan_indo="Juli";
            }elseif ($bulan=="August") {
                $bulan_indo="Agustus";
            }elseif ($bulan=="September") {
                $bulan_indo="September";
            }elseif ($bulan=="October") {
                $bulan_indo="Oktober";
            }elseif ($bulan=="November") {
                $bulan_indo="November";
            }elseif ($bulan=="December") {
                $bulan_indo="Desember";
            };

            return $bulan_indo;
        }

        function format_surat_a1($kode_ppk,$kode_kegiatan,$date,$kode_hps){
            $date_exp=explode('-',$date);
            $date_num=$date_exp[2].".".$date_exp[1]."01";
            $nomor=$kode_ppk."/".$kode_kegiatan."/".$date_num."/".$date_exp[1];
            return $nomor;
        }

        function tanggal_terbilang($date){
            $date_exp=explode('-',$date);
            $date_tanggal=(int)$date_exp[2];
            return terbilang($date_tanggal);
        }


        ///

       
       $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
        ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->join('people','project_enrollments.person_id','people.id')->first();
        //dd($ppk);

        $jadwal_hps=JadwalKegiatanPengadaan::where('paket_id',$paket->id)->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')
        ->select('kegiatan_pengadaans.nama_kegiatan_p','kegiatan_pengadaans.kode_kegiatan_p','kegiatan_pengadaans.kode_format','jadwal_kegiatan_pengadaans.*')
        ->where('kegiatan_pengadaans.nama_kegiatan_p','Penetapan HPS')->first();
        $format_hps=$jadwal_hps->kode_format;
        $tanggal_penetapan=$jadwal_hps->jadwal_kegiatan;
        
        $hari_penetapan=hariIndo($tanggal_penetapan);
        $bulan_penetapan=bulanIndo($tanggal_penetapan);
        $tanggal_terbilang=tanggal_terbilang($tanggal_penetapan);


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/templateBerkas/lainnya/Berita Acara HPS.docx'));
        
        $nilai_hps_currency='Rp '.number_format($paket->total_hps,0,',','.');
        $templateProcessor->setValue(array('nama_ppk', 'nip_ppk','jabatan_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));
        $templateProcessor->setValue('judul_paket',$judul);
        $templateProcessor->setValue('nilai_hps',$nilai_hps_currency);
        $templateProcessor->setValue('nilai_hps_terbilang',terbilang($paket->total_hps).' Rupiah');
        $templateProcessor->setValue('hari_hps',$hari_penetapan);
        $templateProcessor->setValue('tanggal_terbilang_hps',$tanggal_terbilang);
        $templateProcessor->setValue('bulan_terbilang',$bulan_penetapan);



        //\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
        //$docxfile='App/'.$paket->paket_storage.'/'.$judul.'-bahps'.'.docx';
        $permintaan=Permintaan::find($paket->permintaan_id);
        $judul=$permintaan->judul."- Berita acara hps";
        $templateProcessor->saveAs($judul.".docx");
     
        return response()->download($judul.".docx");



        //return redirect()->back();
        
    }

    public function generatePermohonanPengadaan($id){

        function getDateIndo($date){
            function bulanIndo($date)
            {
                $bulan=\Carbon\Carbon::parse($date)->format('F');
               $bulan_indo='';
                 if($bulan=="January"){
                     $bulan_indo="Januari";
                 }elseif ($bulan=="February") {
                     $bulan_indo="Februari";
                 }elseif ($bulan=="March") {
                     $bulan_indo="Maret";
                 }elseif ($bulan=="April") {
                     $bulan_indo="April";
                 }elseif ($bulan=="May"){
                     $bulan_indo="Mei";
                 }elseif ($bulan=="June"){ 
                     $bulan_indo="Juni";
                 }elseif ($bulan=="July"){
                     $bulan_indo="Juli";
                 }elseif ($bulan=="August"){
                     $bulan_indo="Agustus";
                 }elseif ($bulan=="September") {
                     $bulan_indo="September";
                 }elseif ($bulan=="October") {
                     $bulan_indo="Oktober";
                 }elseif ($bulan=="November") {
                     $bulan_indo="November";
                 }elseif ($bulan=="December") {
                     $bulan_indo="Desember";
                 };
     
                 return $bulan_indo;
            };
            $date_form=\Carbon\Carbon::parse($date)->format('d-F-Y');
            $date_explode=explode("-",$date_form);

            $bulan=bulanIndo($date);
       
            $date_reform=$date_explode[0]." ".$bulan." ".$date_explode[2];
            return $date_reform;
            
        }
        

        $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        $bagian=DB::table('permintaans')->where('id',$id)
        ->join('sub_bagians AS a','permintaans.kode_bagian','=','a.kode_bagian')
        ->select('a.*')->first();
        //dd($bagian->nama_bagian);
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
        ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->join('people','project_enrollments.person_id','people.id')->first();
        $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
        ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->join('people','project_enrollments.person_id','people.id')->first();
        $jadwal_permohonan=JadwalKegiatanPengadaan::where('paket_id',$paket->id)->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')
        ->select('kegiatan_pengadaans.nama_kegiatan_p','kegiatan_pengadaans.kode_kegiatan_p','kegiatan_pengadaans.kode_format','jadwal_kegiatan_pengadaans.*')
        ->where('kegiatan_pengadaans.nama_kegiatan_p','Surat Permohonan Pengadaan')->first();
        $tanggal_penetapan=$jadwal_permohonan->jadwal_kegiatan;
        
        
        
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/templateBerkas/lainnya/permohonan pengadaan.docx'));
        
        
        //header surat
        $templateProcessor->setValue('nomor_permohonan_pengadaan','test_nomor');
        $templateProcessor->setValue('tanggal_penetapan',getDateIndo($tanggal_penetapan));

        //isi
        $templateProcessor->setValue('nama_bagian',$bagian->nama_bagian);
        $templateProcessor->setValue(array('judul_paket','nomor_paket'),array($judul,$permintaan->nomor_form));
        $templateProcessor->setValue('tanggal_buat_form',$permintaan->date_created_form);

        $templateProcessor->setValue(array('nama_ppk', 'nip_ppk','label_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));
        $templateProcessor->setValue('label_pp',$pp->nama_jabatan);

        $permintaan=Permintaan::find($paket->permintaan_id);
        $judul=$permintaan->judul."- Surat permohonan pengadaan";

        
        
        $templateProcessor->saveAs($judul.".docx");
     
        return response()->download($judul.".docx");
        //\Carbon\Carbon::parse($now)->formatLocalized('%A, %d %B %Y %H:%I:%S');

    }

    public function generatSpesifikasi($id){
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );

        $tableStyle = array(
            'borderColor' => '006699',
            'borderSize'  => 6,
            'cellMargin'  => 50
        );
        $firstRowStyle = array('bgColor' => '66BBFF');
        $phpWord->addTableStyle('myTable', $tableStyle, $firstRowStyle);
        $table = $section->addTable('myTable');
        
            $table->addRow();
            $table->addCell(1750)->addText(htmlspecialchars( "Row {1}, Cell {1}"));
            $table->addCell(1750)->addText("Row {1}, Cell {2}");
          
        

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');
        return response()->download('helloWorld.docx');


    }

    public function generateSpesifikasi($id){

        ///


        function getDateIndo($date){
            function bulanIndo($date)
            {
                $bulan=\Carbon\Carbon::parse($date)->format('F');
               $bulan_indo='';
                 if($bulan=="January"){
                     $bulan_indo="Januari";
                 }elseif ($bulan=="February") {
                     $bulan_indo="Februari";
                 }elseif ($bulan=="March") {
                     $bulan_indo="Maret";
                 }elseif ($bulan=="April") {
                     $bulan_indo="April";
                 }elseif ($bulan=="May"){
                     $bulan_indo="Mei";
                 }elseif ($bulan=="June"){ 
                     $bulan_indo="Juni";
                 }elseif ($bulan=="July"){
                     $bulan_indo="Juli";
                 }elseif ($bulan=="August"){
                     $bulan_indo="Agustus";
                 }elseif ($bulan=="September") {
                     $bulan_indo="September";
                 }elseif ($bulan=="October") {
                     $bulan_indo="Oktober";
                 }elseif ($bulan=="November") {
                     $bulan_indo="November";
                 }elseif ($bulan=="December") {
                     $bulan_indo="Desember";
                 };
     
                 return $bulan_indo;
            };
            $date_form=\Carbon\Carbon::parse($date)->format('d-F-Y');
            $date_explode=explode("-",$date_form);

            $bulan=bulanIndo($date);
       
            $date_reform=$date_explode[0]." ".$bulan." ".$date_explode[2];
            return $date_reform;
            
        }

        $id_paket=$id;
        $paket=Paket::find($id_paket);
        $permintaan=Permintaan::find($paket->permintaan_id);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        //dd($bagian->nama_bagian);
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
        ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->join('people','project_enrollments.person_id','people.id')->first();


        ///
        $spek_item=SpekHpsItem::where('paket_id',$id)->get();
        $spek_item_first=SpekHpsItem::where('paket_id',$id)->first();
        $spesifikasi=SpekTeknis::where('id', $spek_item_first->spek_id)->first();
        //dd($spek_item[0]);
        $n_item=count($spek_item);
        
        ///
            $template_spesifikasi = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/templateBerkas/lainnya/Spesifikasi Teknis.docx'));

            //
            $template_spesifikasi->setValue('judul_paket',$judul);
            $template_spesifikasi->setValue(array('nama_ppk', 'nip_ppk','label_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));

            //item merge
            $template_spesifikasi->cloneRow('nama_item',$n_item);
            for ($i=0; $i <$n_item ; $i++) {
                $num=$i+1; 
                $no_item='no_item#'.$num;
                $nama_item='nama_item#'.$num;
                $volume_item='volume_item#'.$num;
                $satuan_item='satuan_item#'.$num;

                $template_spesifikasi->setValue($no_item, htmlspecialchars($num));
                $template_spesifikasi->setValue($nama_item, htmlspecialchars($spek_item[$i]->nama_item));
                $template_spesifikasi->setValue($volume_item, htmlspecialchars($spek_item[$i]->volume));
                $template_spesifikasi->setValue($satuan_item, htmlspecialchars($spek_item[$i]->satuan));
            
            }

           /* $parser = new \HTMLtoOpenXML\Parser();
            $ooXml = $parser->fromHTML($spesifikasi->spesifikasi);*/
            $jadwal_spesifikasi=JadwalKegiatanPengadaan::where('paket_id',$paket->id)->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')->select('kegiatan_pengadaans.nama_kegiatan_p','kegiatan_pengadaans.kode_kegiatan_p','kegiatan_pengadaans.kode_format','jadwal_kegiatan_pengadaans.*')->where('kegiatan_pengadaans.nama_kegiatan_p','Penetapan Spek Teknis')->first();
            $tanggal_penetapan=$jadwal_spesifikasi->jadwal_kegiatan;
            $ooXml=strip_tags($spesifikasi->spesifikasi);
            $template_spesifikasi->setValue('spesifikasi', $ooXml);
            //$bulan=\Carbon\Carbon::parse($tanggal_penetapan)->format('F');
            $bulan=getDateIndo($tanggal_penetapan);
            $template_spesifikasi->setValue('date_spek',$bulan);
            $judul=$permintaan->judul."- Spesifikasi teknis";
            $template_spesifikasi->saveAs($judul.'.docx');

         /*   $filepath=storage_path('app/'.$paket->paket_storage.$judul.'.docx');
            $savepath=$paket->paket_storage.$judul.'.docx';
            $file = PaketDokumen::create([
                'paket_id'=>$paket->id,
                'subject' =>  $judul,
                'document_file' => $savepath,
                'type'=>'spesifikasi'
                ]);
                return Storage::download($savepath);    
            $template_spesifikasi->saveAs($filepath);*/
       
           
           return response()->download($judul.'.docx')->deleteFileAfterSend(true);;
    }
//////////////////////////////////////////////////////////
    public function generateHps($id){
        function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
        }
     
        function terbilang($nilai) {
            if($nilai<0) {
                $hasil = "minus ". trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }     		
            return $hasil;
        }

        function getDateIndo($date){
            function bulanIndo($date)
            {
                $bulan=\Carbon\Carbon::parse($date)->format('F');
               $bulan_indo='';
                 if($bulan=="January"){
                     $bulan_indo="Januari";
                 }elseif ($bulan=="February") {
                     $bulan_indo="Februari";
                 }elseif ($bulan=="March") {
                     $bulan_indo="Maret";
                 }elseif ($bulan=="April") {
                     $bulan_indo="April";
                 }elseif ($bulan=="May"){
                     $bulan_indo="Mei";
                 }elseif ($bulan=="June"){ 
                     $bulan_indo="Juni";
                 }elseif ($bulan=="July"){
                     $bulan_indo="Juli";
                 }elseif ($bulan=="August"){
                     $bulan_indo="Agustus";
                 }elseif ($bulan=="September") {
                     $bulan_indo="September";
                 }elseif ($bulan=="October") {
                     $bulan_indo="Oktober";
                 }elseif ($bulan=="November") {
                     $bulan_indo="November";
                 }elseif ($bulan=="December") {
                     $bulan_indo="Desember";
                 };
     
                 return $bulan_indo;
            };
            $date_form=\Carbon\Carbon::parse($date)->format('d-F-Y');
            $date_explode=explode("-",$date_form);

            $bulan=bulanIndo($date);
       
            $date_reform=$date_explode[0]." ".$bulan." ".$date_explode[2];
            return $date_reform;
            
        }
        /////
        $id_paket=$id;
        $paket=Paket::find($id_paket);
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();

        //dd($bagian->nama_bagian);
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
        ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->join('people','project_enrollments.person_id','people.id')->first();

        ///
        $spek_item=SpekHpsItem::where('paket_id',$id)->get();
        $spek_item_first=SpekHpsItem::where('paket_id',$id)->first();
        $spesifikasi=SpekTeknis::where('id', $spek_item_first->spek_id)->first();

        //
        $jadwal_hps=JadwalKegiatanPengadaan::where('paket_id',$paket->id)
        ->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')
        ->select('kegiatan_pengadaans.nama_kegiatan_p','kegiatan_pengadaans.kode_kegiatan_p','kegiatan_pengadaans.kode_format','jadwal_kegiatan_pengadaans.*')
        ->where('kegiatan_pengadaans.nama_kegiatan_p','Penetapan HPS')->first();
        $format_hps=$jadwal_hps->kode_format;
        $tanggal_penetapan=$jadwal_hps->jadwal_kegiatan;
        //
        $n_item=count($spek_item);
        $terbilang_hps=terbilang($paket->total_hps)." Rupiah";

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/templateBerkas/lainnya/HPS.docx'));
        $templateProcessor->setValue('judul_paket',$judul);
        $templateProcessor->setValue(array('nama_ppk', 'nip_ppk','label_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));

        $templateProcessor->setValue('total_hps', number_format($paket->total_hps,0,',','.'));
      
        $templateProcessor->setValue('total_terbilang', $terbilang_hps);
        $templateProcessor->setValue('spesifikasi', $spesifikasi->spesifikasi);
        $templateProcessor->setValue('date_spek', getDateIndo($tanggal_penetapan));
        //item merge
        $templateProcessor->cloneRow('nama_item',$n_item);
        for ($i=0; $i <$n_item ; $i++) {
            $harga=$spek_item[$i]->harga;
            $volume=$spek_item[$i]->volume;
            $harga=(int)$harga;
            $volume=(int)$volume;
            $harga_full=$harga*$volume;
            $jumlah_harga=(int)($spek_item[$i]->jumlah);
            $ppn=$jumlah_harga-$harga_full;

            $num=$i+1; 
            $no_item='no_item#'.$num;
            $nama_item='nama_item#'.$num;
            $volume_item='volume_item#'.$num;
            $satuan_item='satuan_item#'.$num;
            $harga_item='harga_item#'.$num;
            $jumlah_item='jumlah_item#'.$num;
            $ppn_item='ppn_item#'.$num;


            $templateProcessor->setValue($no_item, htmlspecialchars($num));
            $templateProcessor->setValue($nama_item, htmlspecialchars($spek_item[$i]->nama_item));
            $templateProcessor->setValue($volume_item, htmlspecialchars($spek_item[$i]->volume));
            $templateProcessor->setValue($satuan_item, htmlspecialchars($spek_item[$i]->satuan));
            $templateProcessor->setValue($harga_item, htmlspecialchars(number_format($spek_item[$i]->harga,0,',','.')));
            $templateProcessor->setValue($jumlah_item, htmlspecialchars(number_format($spek_item[$i]->jumlah,0,',','.')));
            $templateProcessor->setValue($ppn_item, htmlspecialchars(number_format($ppn,0,',','.')));


        
        }
        $permintaan=Permintaan::find($paket->permintaan_id);
        $judul=$permintaan->judul."- hps";
        $templateProcessor->saveAs($judul.'.docx');

        return response()->download($judul.'.docx');
    }
/////////////////////////////////////////////////////////////////////////////
    public function generateUndanganPengadaan($id){
        function bulanIndo($date)
        {
            $bulan=\Carbon\Carbon::parse($date)->format('F');
           $bulan_indo='';
             if($bulan=="January"){
                 $bulan_indo="Januari";
             }elseif ($bulan=="February") {
                 $bulan_indo="Februari";
             }elseif ($bulan=="March") {
                 $bulan_indo="Maret";
             }elseif ($bulan=="April") {
                 $bulan_indo="April";
             }elseif ($bulan=="May"){
                 $bulan_indo="Mei";
             }elseif ($bulan=="June"){ 
                 $bulan_indo="Juni";
             }elseif ($bulan=="July"){
                 $bulan_indo="Juli";
             }elseif ($bulan=="August"){
                 $bulan_indo="Agustus";
             }elseif ($bulan=="September") {
                 $bulan_indo="September";
             }elseif ($bulan=="October") {
                 $bulan_indo="Oktober";
             }elseif ($bulan=="November") {
                 $bulan_indo="November";
             }elseif ($bulan=="December") {
                 $bulan_indo="Desember";
             };
 
             return $bulan_indo;
        };
        function getDateIndo($date){
       
            $date_form=\Carbon\Carbon::parse($date)->format('d-F-Y');
            $date_explode=explode("-",$date_form);
    
            $bulan=bulanIndo($date);
       
            $date_reform=$date_explode[0]." ".$bulan." ".$date_explode[2];
            return $date_reform;
            
        }
   
        $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();

        //dd($bagian->nama_bagian);
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
        ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->join('people','project_enrollments.person_id','people.id')->first();
       
        $jadwal_undangan=JadwalKegiatanPengadaan::where('paket_id',$paket->id)->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')
        ->select('kegiatan_pengadaans.nama_kegiatan_p','kegiatan_pengadaans.kode_kegiatan_p','kegiatan_pengadaans.kode_format','jadwal_kegiatan_pengadaans.*')
        ->where('kegiatan_pengadaans.nama_kegiatan_p','Surat Undangan Pengadaan')->first();
        

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/templateBerkas/lainnya/Undangan Pengadaan.docx'));
        
        //merge
        $templateProcessor->setValue('nomor_undangan','test undangan');
        $templateProcessor->setValue('nama_penyedia','test_penyedia');
        $templateProcessor->setValue('nama_paket',$judul);
        $templateProcessor->setValue('tanggal_akhir_pekerjaan',getDateIndo($permintaan->date_selesai));
        $templateProcessor->setValue('tanggal_undangan',getDateIndo($jadwal_undangan->jadwal_kegiatan));

        $jadwal_penawaran=JadwalPenawaran::where('paket_id',$paket->id)->join('kegiatan_penawarans','jadwal_penawarans.kegiatan_penawaran_id','=','kegiatan_penawarans.id')->get();
        
        $pembukaan=JadwalPenawaran::where('paket_id',$paket->id)
        ->join('kegiatan_penawarans','jadwal_penawarans.kegiatan_penawaran_id','=','kegiatan_penawarans.id')
        ->where('kegiatan_penawarans.nama_kegiatan_penawaran','Pemasukan dan Pembukaan Dokumen Penawaram')
        ->first();
    
        $nego=JadwalPenawaran::where('paket_id',$paket->id)
        ->join('kegiatan_penawarans','jadwal_penawarans.kegiatan_penawaran_id','=','kegiatan_penawarans.id')
        ->where('kegiatan_penawarans.nama_kegiatan_penawaran','Evaluasi, Klarifikasi Teknis Dan Negosiasi Harga')
        ->first();

        $spk=JadwalPenawaran::where('paket_id',$paket->id)
        ->join('kegiatan_penawarans','jadwal_penawarans.kegiatan_penawaran_id','=','kegiatan_penawarans.id')
        ->where('kegiatan_penawarans.nama_kegiatan_penawaran','Penandatanganan SPK')
        ->first();

        function rentangwaktu($waktu_mulai,$waktu_selesai){
            $waktu_mulai=\Carbon\Carbon::parse($waktu_mulai)->format('h.i');
            $waktu_selesai=\Carbon\Carbon::parse($waktu_selesai)->format('h.i');
            $rentang= $waktu_mulai.' s.d. '.$waktu_selesai;
            return $rentang;
        };
        //dd($pembukaan->$waktu_mulai);
       
        //rentangwaktu($pembukaan->waktu_mulai,pembukaan->$waktu_selesai)
        //jadwal merge
        $templateProcessor->setValue(array('nama_pp', 'nip_pp','label_pp'), array($pp->nama,$pp->nip,$pp->nama_jabatan));
        $templateProcessor->setValue(array('tanggal_pembukaan','rentang_pembukaan'),array(getDateIndo($pembukaan->tanggal_pelaksanaan),rentangwaktu($pembukaan->waktu_mulai,$pembukaan->waktu_selesai)));
        $templateProcessor->setValue(array('tanggal_nego','rentang_nego'),array(getDateIndo($nego->tanggal_pelaksanaan),rentangwaktu($nego->waktu_mulai,$nego->waktu_selesai)));
        $templateProcessor->setValue(array('tanggal_spk','rentang_spk'),array(getDateIndo($spk->tanggal_pelaksanaan),rentangwaktu($spk->waktu_mulai,$spk->waktu_selesai)));

       //$docxfile='App/'.$paket->paket_storage.'/'.$judul.'-undangan'.'.docx';
       $judul=$permintaan->judul."- surat undangan pengadaan";
        $templateProcessor->saveAs($judul.'.docx');
        return response()->download($judul.'.docx');
    }



    //////////////generate penawaran//////////////////

    public function generateKlarifikasi($id){
        function bulanIndo($date)
        {
            $bulan=\Carbon\Carbon::parse($date)->format('F');
           $bulan_indo='';
             if($bulan=="January"){
                 $bulan_indo="Januari";
             }elseif ($bulan=="February") {
                 $bulan_indo="Februari";
             }elseif ($bulan=="March") {
                 $bulan_indo="Maret";
             }elseif ($bulan=="April") {
                 $bulan_indo="April";
             }elseif ($bulan=="May"){
                 $bulan_indo="Mei";
             }elseif ($bulan=="June"){ 
                 $bulan_indo="Juni";
             }elseif ($bulan=="July"){
                 $bulan_indo="Juli";
             }elseif ($bulan=="August"){
                 $bulan_indo="Agustus";
             }elseif ($bulan=="September") {
                 $bulan_indo="September";
             }elseif ($bulan=="October") {
                 $bulan_indo="Oktober";
             }elseif ($bulan=="November") {
                 $bulan_indo="November";
             }elseif ($bulan=="December") {
                 $bulan_indo="Desember";
             };
 
             return $bulan_indo;
        };
        function getDateIndo($date){

            $date_form=\Carbon\Carbon::parse($date)->format('d-F-Y');
            $date_explode=explode("-",$date_form);

            $bulan=bulanIndo($date);
       
            $date_reform=$date_explode[0]." ".$bulan." ".$date_explode[2];
            return $date_reform;
            
        }
        $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $spek_item=SpekHpsItem::where('paket_id',$id)->get();
        $spek_item_first=SpekHpsItem::where('paket_id',$id)->first();
        $spesifikasi=SpekTeknis::where('id', $spek_item_first->spek_id)->first();
        $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
        ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->join('people','project_enrollments.person_id','people.id')->first();
  

        //
        $jadwal_klarifikasi=JadwalKegiatanPengadaan::where('paket_id',$paket->id)
        ->join('kegiatan_pengadaans','jadwal_kegiatan_pengadaans.kegiatan_id','=','kegiatan_pengadaans.id')
        ->select('kegiatan_pengadaans.nama_kegiatan_p','kegiatan_pengadaans.kode_kegiatan_p','kegiatan_pengadaans.kode_format','jadwal_kegiatan_pengadaans.*')
        ->where('kegiatan_pengadaans.nama_kegiatan_p','Berita Acara klarifikasi dan Negosiasi Teknis Harga')->first();

        //$format_hps=$jadwal_hps->kode_format;
        $tanggal_penetapan=$jadwal_klarifikasi->jadwal_kegiatan;
        //
        $n_item=count($spek_item);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/templateBerkas/lainnya/Berita Acara klarifikasi dan negosiasi.docx'));

        $templateProcessor->setValue(array('nama_pp', 'nip_pp','label_pp'), array($pp->nama,$pp->nip,$pp->nama_jabatan));

        $templateProcessor->setValue('total_item_penawaran', number_format($paket->total_penawaran,0,',','.'));
        $templateProcessor->setValue('total_item_nego', number_format($paket->total_negosiasi,0,',','.'));
      
        $templateProcessor->setValue('spesifikasi', $spesifikasi->spesifikasi);
        $templateProcessor->setValue('tanggal_klarifikasi', getDateIndo($tanggal_penetapan));
        //item merge
        $sub_total_penawaran=0;
        $sub_total_nego=0;
        $ppn_penawaran=0;
        $ppn_nego=0;
   
        for ($i=0; $i <$n_item ; $i++) { 
            $jumlah_harga_penawaran=(int)($spek_item[$i]->jumlah_penawaran);
            $jumlah_harga_nego=(int)($spek_item[$i]->jumlah_nego);
            $sub_total_penawaran=$sub_total_penawaran+$jumlah_harga_penawaran;
            $sub_total_nego=$sub_total_nego+$jumlah_harga_nego;
        }
        $ppn_penawaran=0.1*$sub_total_penawaran;
        $ppn_nego=0.1*$sub_total_nego;

        $templateProcessor->setValue('ppn_item_penawaran',$ppn_penawaran);
        $templateProcessor->setValue('ppn_item_nego',$ppn_nego);
        $templateProcessor->setValue('sub_total_penawaran',$sub_total_penawaran);
        $templateProcessor->setValue('sub_total_nego',$sub_total_nego);
        $templateProcessor->setValue('tanggal_klarifikasi',getDateIndo($tanggal_penetapan));


        $templateProcessor->cloneRow('nama_item',$n_item);
        for ($i=0; $i <$n_item ; $i++) {
            $harga_penawaran=$spek_item[$i]->harga_penawaran;
            $harga_negosiasi=$spek_item[$i]->harga_negosiasi;
            $volume=$spek_item[$i]->volume;
            $harga_penawaran=(int)$harga_penawaran;
            $harga_negosiasi=(int)$harga_negosiasi;
            $volume=(int)$volume;
         
            $jumlah_harga_penawaran=(int)($spek_item[$i]->jumlah_penawaran);
            $jumlah_harga_nego=(int)($spek_item[$i]->jumlah_nego);

            $num=$i+1; 
            $no_item='no_item#'.$num;
            $nama_item='nama_item#'.$num;
            $volume_item='volume_item#'.$num;
            $satuan_item='satuan_item#'.$num;
            $harga_item_penawaran='harga_item_penawaran#'.$num;
            $harga_item_nego='harga_item_nego#'.$num;
            $jumlah_item_penawaran='jumlah_item_penawaran#'.$num;
            $jumlah_item_nego='jumlah_item_nego#'.$num;


            $templateProcessor->setValue($no_item, htmlspecialchars($num));
            $templateProcessor->setValue($nama_item, htmlspecialchars($spek_item[$i]->nama_item));
            $templateProcessor->setValue($volume_item, htmlspecialchars($spek_item[$i]->volume));
            $templateProcessor->setValue($satuan_item, htmlspecialchars($spek_item[$i]->satuan));
            $templateProcessor->setValue($harga_item_penawaran, htmlspecialchars(number_format($spek_item[$i]->harga_penawaran,0,',','.')));
            $templateProcessor->setValue($harga_item_nego, htmlspecialchars(number_format($spek_item[$i]->harga_nego,0,',','.')));
            $templateProcessor->setValue($jumlah_item_penawaran, htmlspecialchars(number_format($spek_item[$i]->jumlah_penawaran,0,',','.')));
            $templateProcessor->setValue($jumlah_item_nego, htmlspecialchars(number_format($spek_item[$i]->jumlah_nego,0,',','.')));

        
        }
        $judul=$permintaan->judul."- BA klarifikasi dan negosiasi";
        $templateProcessor->saveAs($judul.'.docx');
        return response()->download($judul.'.docx');
    }

    public function generateEvaluasi($id){
        function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
        }
     
        function terbilang($nilai) {
            if($nilai<0) {
                $hasil = "minus ". trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }     		
            return $hasil;
        }

        $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
        ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->join('people','project_enrollments.person_id','people.id')->first();
        


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/templateBerkas/lainnya/Berita Acara Pembukaan Evaluasi Klarifikasi Pengadaan.docx'));

        $templateProcessor->setValue(array('nama_pp', 'nip_pp','label_pp'), array($pp->nama,$pp->nip,$pp->nama_jabatan));
        $templateProcessor->setValue('nama_paket',$judul);
        $templateProcessor->setValue('total_harga_negosiasi','Rp '.number_format($paket->total_negosiasi,0,',','.'));
        $templateProcessor->setValue('total_harga_negosiaisi_terbilang',terbilang($paket->total_negosiasi)."Rupiah");



        $judul=$permintaan->judul."- BA Pembukaan, Evaluasi, dan Klarifikasi Penawaran";
        $templateProcessor->saveAs($judul.'.docx');
        return response()->download($judul.'.docx');
    }
    public function generateBahpl($id){
        function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
        }
     
        function terbilang($nilai) {
            if($nilai<0) {
                $hasil = "minus ". trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }     		
            return $hasil;
        }
        $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
        ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->join('people','project_enrollments.person_id','people.id')->first();
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/templateBerkas/lainnya/Berita Acara Hasil Pengadaan.docx'));

        $templateProcessor->setValue(array('nama_pp', 'nip_pp','label_pp'), array($pp->nama,$pp->nip,$pp->nama_jabatan));
        $templateProcessor->setValue('nama_paket',$judul);
        $templateProcessor->setValue('total_harga_penawaran','Rp '.number_format($paket->total_penawaran,0,',','.'));
        $templateProcessor->setValue('total_harga_penawaran_terbilang',terbilang($paket->total_penawaran)." rupiah");
        $templateProcessor->setValue('total_harga_negosiasi','Rp '.number_format($paket->total_negosiasi,0,',','.'));
        $templateProcessor->setValue('total_harga_negosiaisi_terbilang',terbilang($paket->total_negosiasi)." rupiah");

        $judul=$permintaan->judul."- BA Hasil Pengadaan Langsung";
        $templateProcessor->saveAs($judul.'.docx');
        return response()->download($judul.'.docx');
    }


    
}
