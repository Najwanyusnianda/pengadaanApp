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

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();    
        $content = '<h2 style="text-align:center;">Recognition of Achievement</h2><p style="text-align:justify;">This letter acknowledges the invaluable input <strong>you</strong>, as a member of our <i>Innovation Team</i>,&nbsp;have provided in the “Implement Rich Text Editor” project.&nbsp;</p><ul><li>Paste from Office feature,</li><li>Tracking changes feature,</li><li>Comments feature.</li></ul><p style="text-align:justify;">The Management would like to hereby thank you for this great accomplishment that was delivered in a timely fashion, up to the highest company standards, and with great results:</p><figure class="table"><table><tbody><tr><td style="text-align:center;"><strong>Project Phase</strong></td><td style="text-align:center;"><strong>Deadline</strong></td><td style="text-align:center;"><strong>Status</strong></td></tr><tr><td>Phase 1: Market research</td><td style="text-align:center;">2018-10-15</td><td style="text-align:center;">✓</td></tr><tr><td>Phase 2: Editor implementation</td><td style="text-align:center;">2018-10-20</td><td style="text-align:center;">✓</td></tr><tr><td>Phase 3: Rollout to Production</td><td style="text-align:center;">2018-10-22</td><td style="text-align:center;">✓</td></tr></tbody></table></figure><p style="text-align:justify;">The project that you participated in is of utmost importance to the future success of our platform. We are very proud to share that the CKEditor implementation was a huge success and brought congratulations from both the key Stakeholders and the Customers:</p><p style="text-align:center;"><i>This new editor has totally changed our content creation experience!</i></p><p style="text-align:center;"><i>— John F. Smith, CEO, The New Web</i></p><p style="text-align:justify;">This letter recognizes that much of our success is directly attributable to your efforts. You deserve to be proud of your achievement. May your future efforts be equally successful and rewarding.</p><p style="text-align:justify;">I am sure we will be seeing and hearing a great deal more about your accomplishments in the future. Keep up the good work!</p><p>&nbsp;</p><p>Best regards,</p><p><i>The Management</i></p>';
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($content);
        $content = $doc->saveHTML();

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $content, true);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');
        return response()->download('helloWorld.docx');

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
        //$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        try {

            $objWriter->save(storage_path('app\public\test.html'));
            //return response()->download(storage_path('helloWorld.docx'));
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
