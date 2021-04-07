<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>'My Blog',
            'contact_number'=>'09996988809',
            'contact_email'=>'tuddaojohnzel@email.com',
            'address'=>'Manila, Philippines'
        ]);
    }
}
