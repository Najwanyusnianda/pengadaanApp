<?php

use Illuminate\Database\Seeder;
use App\JabatanPpk;

class JabatanPpkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jabatan_ppks')->delete();
        $json= File::get("database/data/ppk.json");
        $data=json_decode($json);
        foreach ($data as $obj) {
            JabatanPpk::create(array(
                'kode_jabatan'=> $obj->jabatan,
                'nama_jabatan'=>$obj->kode_ppk,
                'kode_program'=>$obj->kode_program

            ));
        }
    }
}
