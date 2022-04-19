<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            $faker = Faker\Factory::create('ja_JP');
            for ($count = 1; $count <= 100; $count++) {

                Comment::create([
                    'user_id' => $faker->numberBetween(1, 30),
                    'post_id' => $faker->numberBetween(1, 30),
                    'text' => $faker->realText(40),
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]);
            }
        }
    }
}
