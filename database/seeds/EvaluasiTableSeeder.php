<?php

use Illuminate\Database\Seeder;
use App\Evaluasi;
use App\EvaluasiKriteria;

class EvaluasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('evaluasis')->delete();
        DB::table('evaluasi_kriterias')->delete();
        DB::table('evaluasi_pakets')->delete();

        $kode_evaluasi=['EA','EK','ET','EH','PD'];
        $nama_evaluasi=['Evaluasi Administrasi','Evaluasi Kualifikasi','Evaluasi Teknis','Evaluasi Harga','Pembukaan Dokumen'];

        for ($i=0; $i <count($nama_evaluasi) ; $i++) { 
            $evaluasi=Evaluasi::create([
                'id'=>$kode_evaluasi[$i],
                'nama_evaluasi'=>$nama_evaluasi[$i]
            ]);


        }

       
            $nama_evaluasi_administrasi=['Ditandatangani oleh pihak berwenang','Mencantumkan Harga','Jangka waktu berlakunya penawaran','Jangka waktu pelaksanaan pekerjaan yang ditawarkan tidak kurang dari ketentuan'];
            for ($i=0; $i <count($nama_evaluasi_administrasi) ; $i++) { 
                $administrasi_evaluasi=EvaluasiKriteria::create([
                    'id_evaluasi'=>'EA',
                    'nama_kriteria'=>$nama_evaluasi_administrasi[$i]
                ]);
            }
    
            $nama_evaluasi_kualifikasi=['Surat Keterangan Domisili Perusahaan','SIUP','Akta Pendirian dan Perubahannya','NPWP','Bukti Setor Pajak Tahun Terakhir'];
            for ($i=0; $i <count($nama_evaluasi_kualifikasi) ; $i++) { 
                $kualifikasi_evaluasi=EvaluasiKriteria::create([
                    'id_evaluasi'=>'EK',
                    'nama_kriteria'=>$nama_evaluasi_kualifikasi[$i]
                ]);
            }
      
     
            $nama_evaluasi_teknis=['Teknis'];
            for ($i=0; $i <count($nama_evaluasi_teknis) ; $i++) { 
                $teknis_evaluasi=EvaluasiKriteria::create([
                    'id_evaluasi'=>'ET',
                    'nama_kriteria'=>$nama_evaluasi_teknis[$i]
                ]);
            }
    
     
            $nama_evaluasi_harga=['Harga Penawaran','Bila harga penawaran <80% dari HPS lakukan klarifikasi'];
            for ($i=0; $i <count($nama_evaluasi_harga) ; $i++) { 
                $harga_evaluasi=EvaluasiKriteria::create([
                    'id_evaluasi'=>'EH',
                    'nama_kriteria'=>$nama_evaluasi_harga[$i]
                ]);
                }
        
       
            # code...
            $nama_evaluasi_dokumen=['Penawaran Teknis','Penawaran harga','Surat Kuasa','Pakta Integritas','Form Isian Kualifikasi'];
            for ($i=0; $i <count($nama_evaluasi_dokumen) ; $i++) { 
                $dokumen_evaluasi=EvaluasiKriteria::create([
                    'id_evaluasi'=>'PD',
                    'nama_kriteria'=>$nama_evaluasi_dokumen[$i]
                ]);
                }
    
    }
}
