<?php

use Illuminate\Database\Seeder;
use App\JabatanPp;

class JabatanPpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jabatan_pps')->delete();
        $json= File::get("database/data/pp.json");
        $data=json_decode($json);
        foreach ($data as $obj) {
            JabatanPp::create(array(
                'kode_jabatan'=> $obj->jabatan,
                'nama_jabatan'=>$obj->kode_pp,               
            ));
        }
    }
}
