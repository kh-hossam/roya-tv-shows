<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Series;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Series::all()->each(function ($series) {
            Episode::factory()->count(5)->create(['series_id' => $series->id]);
        });
    }
}
