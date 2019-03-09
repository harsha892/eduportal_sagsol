<?php

use Illuminate\Database\Seeder;

class MasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('difficulty')->insert([
            ['id' => 1, 'name' => 'high'],
            ['id' => 2, 'name' => 'medium'],
            ['id' => 3, 'name' => 'low'],
        ]);

        DB::table('privacy')->insert([
            ['id' => 1, 'name' => 'Public'],
            ['id' => 2, 'name' => 'Staff'],
            ['id' => 3, 'name' => 'Only me'],
        ]);
    }
}
