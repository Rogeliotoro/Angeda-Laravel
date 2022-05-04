<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts') ->insert(
            [
                'name' => 'Antonio',
                'surname'=>'Sanchez',
                'phone_number'=>'4557858',
                'email'=>'antonio@antonio.com',
                'id_user'=>'1'


            ]
        );
    }
}
