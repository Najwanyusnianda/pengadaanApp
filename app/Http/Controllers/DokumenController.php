<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TemplateList;
class DokumenController extends Controller
{
    //
    public function generateDocx(){

        $phpWord = new \PhpOffice\PhpWord\PhpWord();


        $section = $phpWord->addSection();


        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


        $section->addImage("http://itsolutionstuff.com/frontTheme/images/logo.png");

        $section->addText($description);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        try {

            $objWriter->save(storage_path('helloWorld.docx'));

        } catch (Exception $e) {

        }


        return response()->download(storage_path('helloWorld.docx'));

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

    public function storeTemplate(request $request){



        $data = $request->template_data;

        $template_store=TemplateList::create([
            'konten'=>$data
        ]);

    }

    
}
