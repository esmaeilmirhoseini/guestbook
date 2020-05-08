<?php

use Illuminate\Database\Seeder;

class GuestbooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('guestbooks')->insert([
        //     'title' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'text' => bcrypt('password')
        // ]);
        factory(App\Guestbook::class, 50)->create();
    }
}
