<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TemplateList;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DokumenController extends Controller
{
    //
    public function generateDocx(){

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app\hps\BERITA ACARA PENETAPAN HARGA PERKIRAAN SENDIRI.docx'));
        $templateProcessor->setValue('hari', 'John Doe');
        $templateProcessor->saveAs(storage_path('MyWordFile.docx'));
        return response()->download(storage_path('MyWordFile.docx'));

    }

    public function generateTemp(){

       // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord(); 
        // Adding an empty Section to the document...
        //1mm=56.60 twip
        $section = $phpWord->addSection(
            array('marginLeft' => 1799, 'marginRight' => 1799,
             'marginTop' => 1437, 'marginBottom' => 1437)
          );
          
        // Adding Text element to the Section having font styled by default...
        $judul = "BER ACARA PENETAPAN HARGA PERKIRAAN SENDIRI (HPS)";
        $subjudul ='Pencetakan Katalog Publikasi 2017';
        $nomor='Nomor : PPIS/2908/21.08.01/OE/2018';

        $phpWord->addFontStyle('r2Style', array('name' => 'Tahoma', 'size' => 12, 'color' => '1B2232', 'bold' => true));
        $r2Style=array('name' => 'Footlight MT Light', 'size' => 12, 'color' => '1B2232', 'bold' => true);
        $phpWord->addParagraphStyle('p2Style', array('align'=>'center'));
       // $section->addText($text, 'r2Style', 'p2Style');
       $section->addText($judul,$r2Style,'p2Style');
       $section->addText($subjudul,$r2Style,'p2Style');
       $section->addText($nomor,$r2Style,'p2Style');
        //## linstyle= 1 inc=72.05twip
        $lineStyle = array('weight' => 1, 'width' => 428.7, 'height' => 0);
        $section->addLine($lineStyle,'p2Style');
        
        
        $paragraph1='Pada hari ini Selasa, tanggal dua puluh satu bulan Agustus tahun dua ribu delapan belas, saya Pejabat Pembuat Komitmen Program/Kegiatan Penyediaan dan Pelayanan Informasi Statistik untuk Kode Kegiatan 2897, 2900, dan 2901 telah menetapkan Harga Perkiraan Sendiri (HPS) berdasarkan usulan subject matter. 
        Harga Perkiraan Sendiri (HPS) ditetapkan untuk digunakan dalam Pengadaan Pencetakan Katalog Publikasi 2017.';
        $phpWord->addParagraphStyle('docStyle', array('align'=>'both','lineHeight'=>'1.5'));
        $pgStyle=array('name' => 'Footlight MT Light', 'size' => 12, 'color' => 'black', 'bold' => false);
        $section->addText(' ','docStyle');
        $section->addText(' ','docStyle');
        $section->addText($paragraph1,$pgStyle,'docStyle');


    


        // Saving the document as Docx file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {

            $objWriter->save(storage_path('helloWorld.docx'));
            return response()->download(storage_path('helloWorld.docx'));
        } catch (Exception $e) {

        }


        
      
    
    }

    public function generateExcel(){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('B1','testing');

        
        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path('helloworld.xlsx'));
        return response()->download(storage_path('helloworld.xlsx'));
    }

    public function storeTemplate(request $request){



        $data = $request->template_data;

        $template_store=TemplateList::create([
            'konten'=>$data
        ]);

    }

    public function storeHps(Request $request){
       $data= $request->temp;
       //$data=json_decode($data);
        dd($data[0]);
    }

    
}
