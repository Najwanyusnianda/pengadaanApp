<?php

use Illuminate\Database\Seeder;
use App\Person;
use App\User;
use App\JabatanPp;
use App\JabatanPpk;
use App\Ppk;
use App\Pp;
use Faker\Factory as Faker;


class pejabatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        $jabatan=JabatanPpk::all();
        $pp_jab=JabatanPp::all();
        for ($index= 0; $index < count($jabatan) ; $index++)
        {

            
            $user=User::create([
                'username' =>'ppk'.$index,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'is_user'=>true
            ]);
            $ppk=Person::create([
                'nama'=>$faker->name,
                'nip'=>$faker->phoneNumber,
                'role_id'=>3,
                'user_id'=>$user->id
            ]);       

            $ppk_=Ppk::create([
                'person_id'=>$ppk->id,
                'kode_jabatan'=>$jabatan[$index]->kode_jabatan
            
            ]);
            
        }

        //make pp
        for ($index= 0; $index < count($pp_jab) ; $index++)
        {

            
            $user=User::create([
                'username' =>'pp'.$index,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'is_user'=>true
            ]);
            $pp=Person::create([
                'nama'=>$faker->name,
                'nip'=>$faker->phoneNumber,
                'role_id'=>2,
                'user_id'=>$user->id
            ]);       

            $pp_=Pp::create([
                'person_id'=>$pp->id,
                'kode_jabatan'=>$pp_jab[$index]->kode_jabatan
            
            ]);
            
        }
       

    }
}
