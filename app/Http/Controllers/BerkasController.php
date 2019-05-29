<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use App\Project;
use App\ProjectEnrollment;
use App\Paket;
use App\Permintaan;

class BerkasController extends Controller
{
    //
    public function generateBahps($id){
       $id_paket=$id;
        $paket=Paket::find($id_paket);
            
        $permintaan=Permintaan::where('id',$paket->permintaan_id)->first();
        $judul=$permintaan->judul;
        $project=Project::where('id',$permintaan->project_id)->first();
        $ppk=ProjectEnrollment::where('project_id',$project->id)->where('person_id',$paket->ppk_id)
        ->join('jabatan_ppks','project_enrollments.jabatan_id','jabatan_ppks.id')->join('people','project_enrollments.person_id','people.id')->first();
        //dd($ppk);
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\templateBerkas\lainnya\BAhps.docx'));
        

        $templateProcessor->setValue(array('nama_ppk', 'nip_ppk','jabatan_ppk'), array($ppk->nama,$ppk->nip,$ppk->nama_jabatan));
        
        $templateProcessor->saveAs(storage_path('MyWordFile.docx'));
        return response()->download(storage_path('MyWordFile.docx'));
    }
}
