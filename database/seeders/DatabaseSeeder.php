<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Computer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        $categories = Category::factory(5)->create();
        Computer::factory(20)
            ->create()
            ->each(function ($computer) use ($categories) {
                $computer->fk_category_computer = $categories->random()->category_id;
                $computer->save();
            });
    }
}
