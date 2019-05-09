<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->delete();
        Role::create([
            'id'=>1,
            'nama'=>'admin',
            'deskripsi'=>'admin'
        ]);
        Role::create([
            'id'=>2,
            'nama'=>'pp',
            'deskripsi'=>'Pejabat Pengadaan'
        ]);
        Role::create([
            'id'=>3,
            'nama'=>'ppk',
            'deskripsi'=>'Pejabat Pembuat Komitmen'
        ]);
        Role::create([
            'id'=>4,
            'nama'=>'kulp',
            'deskripsi'=>'Kepala ULP '
        ]);
        Role::create([
            'id'=>5,
            'nama'=>'kasie',
            'deskripsi'=>'kepala Seksi ULP'
        ]);
        Role::create([
            'id'=>6,
            'nama'=>'staff',
            'deskripsi'=>'staff ULP'
        ]);
        Role::create([
            'id'=>100,
            'nama'=>'tidak_aktif',
            'deskripsi'=>'tidak aktif'
        ]);
    }
}
