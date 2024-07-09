<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LevelOneSeeder::class,
            LevelTwoSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
