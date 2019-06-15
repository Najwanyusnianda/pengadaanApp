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

class BerkasController extends Controller
{
    //

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
        ///
       $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
        ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->join('people','project_enrollments.person_id','people.id')->first();
        //dd($ppk);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\templateBerkas\lainnya\Berita Acara HPS.docx'));
        
        $nilai_hps_currency='Rp '.number_format($paket->total_hps,0,',','.');
        $templateProcessor->setValue(array('nama_ppk', 'nip_ppk','jabatan_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));
        $templateProcessor->setValue('judul_paket',$judul);
        $templateProcessor->setValue('nilai_hps',$nilai_hps_currency);
        $templateProcessor->setValue('nilai_hps_terbilang',terbilang($paket->total_hps).' Rupiah');


        //\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
        $docxfile='App/'.$paket->paket_storage.'/'.$judul.'-bahps'.'.docx';
        $templateProcessor->saveAs(storage_path($docxfile));
     
        return response()->download(storage_path($docxfile));



        //return redirect()->back();
        
    }

    public function generatePermohonanPengadaan($id){
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
       
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\templateBerkas\lainnya\permohonan pengadaan.docx'));
        
        //header surat
        $templateProcessor->setValue('nomor_permohonan_pengadaan','test_nomor');
        $templateProcessor->setValue('tanggal_penetapan','test_tanggal');

        //isi
        $templateProcessor->setValue('nama_bagian',$bagian->nama_bagian);
        $templateProcessor->setValue(array('judul_paket','nomor_paket'),array($judul,$permintaan->nomor_form));
        $templateProcessor->setValue('tanggal_buat_form',$permintaan->date_created_form);

        $templateProcessor->setValue(array('nama_ppk', 'nip_ppk','label_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));
        $templateProcessor->setValue('label_pp',$pp->nama_jabatan);



        
        $docxfile='App/'.$paket->paket_storage.'/'.$judul.'-permohonan'.'.docx';
        $templateProcessor->saveAs(storage_path($docxfile));
     
        return response()->download(storage_path($docxfile));
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
        //dd($spek_item[0]);
        $n_item=count($spek_item);
        
        ///
            $template_spesifikasi = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\templateBerkas\lainnya\Spesifikasi Teknis.docx'));

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
            $ooXml=strip_tags($spesifikasi->spesifikasi);
            $template_spesifikasi->setValue('spesifikasi', $ooXml);
            $template_spesifikasi->saveAs('template_with_table.docx');

            return response()->download('template_with_table.docx');
    }

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
        $n_item=count($spek_item);
        $terbilang_hps=terbilang($paket->total_hps)." Rupiah";

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\templateBerkas\lainnya\HPS.docx'));
        $templateProcessor->setValue('judul_paket',$judul);
        $templateProcessor->setValue(array('nama_ppk', 'nip_ppk','label_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));

        $templateProcessor->setValue('total_hps', number_format($paket->total_hps,0,',','.'));
      
        $templateProcessor->setValue('total_terbilang', $terbilang_hps);
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

        $templateProcessor->saveAs('template_with_table.docx');

        return response()->download('template_with_table.docx');
    }

    public function generateUndanganPengadaan($id){
        $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();

        //dd($bagian->nama_bagian);
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
        ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->join('people','project_enrollments.person_id','people.id')->first();
       
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\templateBerkas\lainnya\Undangan Pengadaan.docx'));
        
        //merge
        $templateProcessor->setValue('nomor_undangan','test undangan');
        $templateProcessor->setValue('nama_penyedia','test_penyedia');
        $templateProcessor->setValue('nama_paket','test_paket');
        $templateProcessor->setValue('tanggal_akhir_pekerjaan','test_akhir');

        //jadwal merge
        $templateProcessor->setValue(array('tanggal_pembukaan','rentang_pembukaan'),array('a','b','c'));
        $templateProcessor->setValue(array('tanggal_nego','rentang_nego'),array('a','b','c'));
        $templateProcessor->setValue(array('tanggal_spk','rentang_spk'),array('a','b','c'));

        $docxfile='App/'.$paket->paket_storage.'/'.$judul.'-undangan'.'.docx';
        $templateProcessor->saveAs(storage_path($docxfile));
        return response()->download(storage_path($docxfile));
    }



    
}
