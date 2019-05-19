<?php

use Illuminate\Database\Seeder;
use App\Person;
use App\User;
class UserTempTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('people')->delete();
        DB::table('users')->delete();
       $user1= User::create([
            'username'=>'admin',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_user'=>true

        ]);

        $person1=Person::create([
            'nama'=>'admin',
            'nip'=>'test',
            'role_id'=>1,
            'user_id'=>$user1->id

        ]);

        $user2= User::create([
            'username'=>'ppk1',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_user'=>true

        ]);

        $person2=Person::create([
            'nama'=>'ppk1',
            
            'nip'=>'test',
            'role_id'=>100,
            'user_id'=>$user2->id

        ]);

        $user3= User::create([
            'username'=>'ppk2',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_user'=>true

        ]);

        $person3=Person::create([
            'nama'=>'ppk2',
            
            'nip'=>'test2',
            'role_id'=>100,
            'user_id'=>$user3->id

        ]);

        $user4= User::create([
            'username'=>'pp1',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_user'=>true

        ]);

        $person4=Person::create([
            'nama'=>'pp1',
            
            'nip'=>'test2',
            'role_id'=>100,
            'user_id'=>$user4->id

        ]);

        $user5= User::create([
            'username'=>'kulp1',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_user'=>true

        ]);

        $person5=Person::create([
            'nama'=>'kulp1',
            
            'nip'=>'test2',
            'role_id'=>100,
            'user_id'=>$user5->id

        ]);

        $user6= User::create([
            'username'=>'kasi2',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_user'=>true,
            

        ]);

        $person6=Person::create([
            'nama'=>'kasi2',
            
            'nip'=>'test2',
            'role_id'=>100,
            'user_id'=>$user6->id

        ]);

        $user8= User::create([
            'username'=>'kasi1',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_user'=>true

        ]);

        $person8=Person::create([
            'nama'=>'kasi1',
            
            'nip'=>'test2',
            'role_id'=>100,
            'user_id'=>$user8->id

        ]);

        $user9= User::create([
            'username'=>'staf1',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_user'=>true

        ]);

        $person9=Person::create([
            'nama'=>'staf1',
            
            'nip'=>'test2',
            'role_id'=>100,
            'user_id'=>$user9->id

        ]);
    }
}
