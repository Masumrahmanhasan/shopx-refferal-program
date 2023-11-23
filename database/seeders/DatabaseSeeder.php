<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->admin()->create();
        \App\Models\User::factory(20)->create();
        $this->call(TaskTableSeeder::class) ;
        \App\Models\Transaction::factory()->count(10)->create();
//        $this->call(FaqTableSeeder::class);
    }
}
