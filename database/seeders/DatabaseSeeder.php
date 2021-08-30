<?php

namespace Database\Seeders;
use App\Models\Purchase;
use App\Models\Service;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeServiceSeeder::class);
        $this->call(TypeRatingSeeder::class);
    }
}
