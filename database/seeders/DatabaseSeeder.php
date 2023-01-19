<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('studenttbl')->insert(array(
            array(
            'name' => "Steve",
            'rollno' => '1',
            'standard' => '8',
            ),
            array(
            'name' => "Laura",
            'rollno' => '2',
            'standard' => '8',
            )
            ));
            
    }
}
