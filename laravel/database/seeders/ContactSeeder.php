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
        DB::table('contacts') ->insert(
            [
                'name' => 'rogelio',
                'surname'=>'toro',
                'phone_number'=>'455555',
                'email'=>'rogelio@rogelio.com',
                'id_user'=>2
            ]
        );
    }
}
