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

class BerkasController extends Controller
{
    //
    public function generateBahps(){
        $id=1;
        $project_active=Project::where('is_active',true)->first();
        $enroll=ProjectEnrollment::where('project_id',$project_active->id)->get();       
        $permintaan=Permintaan::where('id',$id)->first();
        $paket_up=Paket::where('permintaan_id',$permintaan->id)->first();
        $paket_ppk=DB::table('pakets')->where('pakets.permintaan_id','=',$permintaan->id)->join('permintaans','pakets.permintaan_id','=','permintaans.id')->join('projects','permintaans.project_id','=','projects.id')->join('project_enrollments AS enroll','projects.id','=','enroll.project_id')->where('enroll.id_role','=','3')->where('enroll.person_id','=',$paket_up->ppk_id)->join('jabatan_ppks','enroll.jabatan_id','=','jabatan_ppks.id')->join('people','pakets.ppk_id','=','people.id')->get();

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\templateBerkas\persiapan\bahps.docx'));
        
        $templateProcessor->saveAs(storage_path('MyWordFile.docx'));
        return response()->download(storage_path('MyWordFile.docx'));
    }
}
