<?php

use Illuminate\Database\Seeder;
use App\KegiatanProgram;

class KegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kegiatan_programs')->delete();
        $json= File::get("database/data/kegiatan_permintaan.json");
        $data=json_decode($json);
        foreach ($data as $obj) {
            KegiatanProgram::create(array(
                'kode_kegiatan'=> $obj->kode_kegiatan,
                'nama_kegiatan'=>$obj->uraian_kegiatan,
                'kode_program'=>$obj->kode_program
            ));
        }
    }
}
