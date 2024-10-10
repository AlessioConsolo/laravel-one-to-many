<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        if (!Storage::exists('public/cover_images')) {
            Storage::makeDirectory('public/cover_images');
        }

        for ($i = 0; $i < 10; $i++) {

            $imagePath = 'cover_images/' . $faker->image('storage/app/public/cover_images', 640, 480, null, false);

            Project::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(4),
                'cover_image' => $imagePath
            ]);
        }
    }
}
