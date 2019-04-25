<?php

use Illuminate\Database\Seeder;
use App\SubBagian;

class SubBagianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sub_bagians')->delete();
        $json= File::get("database/data/subject_bagian.json");
        $data=json_decode($json);
        foreach ($data as $obj) {
            SubBagian::create(array(
                'kode_bagian'=> $obj->kode_bagian,
                'kode_bagian_up'=>$obj->kode_bagian_up,
                'nama_bagian'=>$obj->nama_bagian
            ));
        }
    }
}
