<?php

use Illuminate\Database\Seeder;
use App\User;

class PotstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザー情報を３人分Seederで用意
        user::create([
            'name' => 'oikawagorou',
            'email' => 'g032n029@gmail.com',
            'password' => 'oikawagorou',
        ]);

        user::create([
            'name' => 'oikawasaburou',
            'email' => 'g033n029@gmail.com',
            'password' => 'oikawasaburou',
        ]);

        user::create([
            'name' => 'oikawaitirou',
            'email' => 'g034n029@gmail.com',
            'password' => 'oikawaitirou',
        ]);
    }
}
