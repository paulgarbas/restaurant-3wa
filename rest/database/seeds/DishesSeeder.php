<?php

use App\Main;
use App\Dish;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DishesSeeder extends Seeder
{
    protected $faker;
    protected $dish;
    protected $main;

    public function __construct(Faker $faker, Dish $dish, Main $main) {
        $this->faker = $faker;
        $this->dish = $dish;
        $this->main = $main;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = $this->faker->create();
        $main_id = $this->main->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $this->dish->create([
                'title' => $faker->word,
                'description' => $faker->text($maxNbChars = 200),
                'image' => $faker->imageUrl(800, 600, 'food'),
                'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 200),
                'main_id' => $main_id->random()
            ]);
        }
    }
}
