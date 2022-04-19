<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranks')->insert([
            'name' => '一般信徒',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('ranks')->insert([
            'name' => '司祭',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('ranks')->insert([
            'name' => '司教',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('ranks')->insert([
            'name' => '大司教',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('ranks')->insert([
            'name' => '枢機卿',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('ranks')->insert([
            'name' => '教皇',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
