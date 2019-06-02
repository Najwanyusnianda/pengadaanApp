<?php

use Illuminate\Database\Seeder;
use App\KegiatanPenawaran;

class KegiatanPenawaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kegiatan=['Pemasukan dan Pembukaan Dokumen Penawaram','Evaluasi, Klarifikasi Teknis Dan Negosiasi Harga','Penandatanganan SPK'];

        for ($i=0; $i <count($kegiatan) ; $i++) { 

            KegiatanPenawaran::create(['nama_kegiatan_penawaran'=>$kegiatan[$i]]);
        }

    }
}
