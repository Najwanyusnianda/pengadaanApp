<?php

use Illuminate\Database\Seeder;
use App\SubBagian;
use App\User;
use Faker\Factory as Faker;

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
        $faker=Faker::create();
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

        $subject_matter=DB::table('sub_bagians')->where('kode_bagian_up','<>','1000')->where('kode_bagian_up','LIKE','__00')->where('kode_bagian_up','NOT LIKE','_000')->get();

        for ($index= 0; $index < count($subject_matter) ; $index++) {
            $user=User::create([
                'username' => 'bagian'.$index,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'is_user'=>false
            ]);

            $kode_bagian=$subject_matter[$index]->kode_bagian;
            SubBagian::where('kode_bagian',$kode_bagian)->update(['user_id' =>$user->id ]);
            
        }
    }
}
