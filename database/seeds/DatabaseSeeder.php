<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(PersonTableSeeder::class); 
       // $this->call(UsersTableSeeder::class); 
       $this->call(RoleTableSeeder::class);
       $this->call(UserTempTableSeeder::class);
        $this->call(SubBagianTableSeeder::class);
        $this->call(ProgramTableSeeder::class);
        $this->call(KegiatanTableSeeder::class);
        $this->call(JabatanPpkTableSeeder::class);
        $this->call(JabatanPpTableSeeder::class);
        $this->call(KegiatanPengadaanTableSeeder::class);
        
        //$this->call(pejabatSeeder::class);
        

    }

}
