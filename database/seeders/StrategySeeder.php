<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Strategy;

class StrategySeeder extends Seeder
{
    public function run()
    {
        Strategy::insert([
            ['name' => 'DESKTOP'],
            ['name' => 'MOBILE'],
        ]);
    }
}
