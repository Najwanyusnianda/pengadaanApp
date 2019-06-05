<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PDF;
//use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\Common\XMLWriter;
use App\Project;
use App\ProjectEnrollment;
use App\Paket;
use App\Permintaan;

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
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
        ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->join('people','project_enrollments.person_id','people.id')->first();
        $pp=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->pp_id)
        ->join('jabatan_pps','project_enrollments.jabatan_id','jabatan_pps.id')->join('people','project_enrollments.person_id','people.id')->first();
        dd($pp);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\templateBerkas\lainnya\permohonan pengadaan.docx'));
        
        $templateProcessor->setValue(array('nama_ppk', 'nip_ppk','jabatan_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));
        $templateProcessor->setValue(array('label_pp',$pp->nama_jabatan));
        $templateProcessor->setValue('judul_paket',$judul);
        
        $docxfile='App/'.$paket->paket_storage.'/'.$judul.'-permohonan'.'.docx';
        $templateProcessor->saveAs(storage_path($docxfile));
     
        return response()->download(storage_path($docxfile));

    }

    
}
