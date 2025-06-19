<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed Web Projects
        for ($i = 0; $i < 10; $i++) {
            DB::table('web_projects')->insert([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(3),
                'url' => $faker->optional()->url,
                'image_path' => 'https://placehold.co/600x400/' . $faker->hexColor(false) . '/FFFFFF?text=Web+Project+' . ($i + 1),
                'category' => $faker->randomElement(['E-commerce', 'Portfolio', 'Blog', 'SaaS', 'API']),
                'technologies' => json_encode($faker->randomElements(['Laravel', 'Vue.js', 'React', 'Node.js', 'Tailwind CSS', 'Bootstrap', 'MySQL', 'PostgreSQL', 'MongoDB'], $faker->numberBetween(2, 4))),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Designs
        for ($i = 0; $i < 8; $i++) {
            DB::table('designs')->insert([
                'title' => $faker->sentence(2),
                'description' => $faker->paragraph(2),
                'image_path' => 'https://placehold.co/600x400/' . $faker->hexColor(false) . '/FFFFFF?text=Design+' . ($i + 1),
                'tool' => $faker->randomElement(['Photoshop', 'Figma', 'Illustrator', 'Adobe XD', 'Sketch']),
                'category' => $faker->randomElement(['UI/UX', 'Branding', 'Illustration', 'Logo Design', 'Web Design']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed Edited Videos
        for ($i = 0; $i < 6; $i++) {
            DB::table('edited_videos')->insert([
                'title' => $faker->sentence(4),
                'description' => $faker->paragraph(2),
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Placeholder URL
                'thumbnail_path' => 'https://placehold.co/600x400/' . $faker->hexColor(false) . '/FFFFFF?text=Video+' . ($i + 1),
                'software_used' => $faker->randomElement(['Premiere Pro', 'Final Cut Pro', 'DaVinci Resolve', 'After Effects', 'iMovie']),
                'duration_seconds' => $faker->numberBetween(30, 600),
                'category' => $faker->randomElement(['Short Film', 'Vlog', 'Commercial', 'Tutorial', 'Music Video']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}