<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for ($count = 1; $count <= 30; $count++) {

            Post::create([
                'user_id' => $faker->numberBetween(1, 30),
                'title' => $faker->realText(15),
                'text' => $faker->realText(50),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
