<?php

use Illuminate\Database\Seeder;
use App\KegiatanPengadaan;
class KegiatanPengadaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('kegiatan_pengadaans')->delete();
        $json= File::get("database/data/kegiatan_pengadaan.json");
        $data=json_decode($json);
        foreach ($data as $obj) {
            KegiatanPengadaan::create(array(
                'nama_kegiatan_p'=> $obj->Jenis_Kegiatan,
                'kode_kegiatan_p'=>$obj->Kode_kegiatan,  
                'kode_format'=>$obj->Kode_format             
            ));
        }
    }
}
