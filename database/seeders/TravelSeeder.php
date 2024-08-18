<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Travel;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 3; $i++) {
            $travel = new Travel();
            $travel->title = $faker->words(5, true);
            $travel->date = $faker->date('Y-m-d');
            $travel->cover_image = $faker->imageUrl(640, 400, 'jpg');
            $travel->description = $faker->paragraphs(5, true);
            $travel->map_position = $faker->imageUrl(640, 400, 'jpg');
            $travel->valutation = $faker->randomDigit();
            $travel->people = $faker->words(10, true);
            $travel->additional_notes = $faker->paragraphs(3, true);
            $travel->save();
        }
    }
}
