<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=App\User::create([
            'name'=>'Administrator',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
            'admin'=>1
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum tempora maiores ipsum minima, recusandae nesciunt dolorum. Fugit eius odit eligendi fuga, unde eos atque possimus sequi molestiae repudiandae ex quam.',
            'facebook' => 'facebook.com',
            'avatar' => '/uploads/avatars/default.png'
        ]);
    }
}
