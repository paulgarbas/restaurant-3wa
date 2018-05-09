<?php

use App\Main;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    protected $main;

    public function __construct(Main $main) {
        $this->main = $main;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->main->create([
            'title' => 'Sriubos'
        ]);
        $this->main->create([
            'title' => 'Karšti patiekalai'
        ]);
        $this->main->create([
            'title' => 'Užkandžiai'
        ]);
        $this->main->create([
            'title' => 'Desertai'
        ]);
    }
}
