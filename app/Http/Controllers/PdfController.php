<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    //
    public function export_pdf()
    {
      // Fetch all customers from database
      $data = 'lol';
      // Send data to the view using loadView function of PDF facade
      $pdf = PDF::loadView('Template.temp_template');
      // If you want to store the generated pdf to the server then you can use the store function
      $pdf->save(storage_path().'_filename.pdf');
      // Finally, you can download the file using download function
      return $pdf->download('customers.pdf');
    }
}
