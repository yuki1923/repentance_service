<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
            User::create([
                'name' => $faker->lastName . '' . $faker->firstName,
                'email' => $faker->email,
                'password' => $faker->password,
                'sex' => $faker->numberBetween(1, 2),
                'age' => $faker->numberBetween(18, 110),
                'rank_id' => $faker->numberBetween(1, 6),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
