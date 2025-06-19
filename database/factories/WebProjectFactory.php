<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebProject>
 */
class WebProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'url' => $this->faker->optional()->url,
            'image_path' => 'https://placehold.co/600x400/' . $this->faker->hexColor(false) . '/FFFFFF?text=Web+Project',
            'category' => $this->faker->randomElement(['E-commerce', 'Portfolio', 'Blog', 'SaaS', 'API']),
            'technologies' => $this->faker->randomElements(
                ['Laravel', 'Vue.js', 'React', 'Node.js', 'Tailwind CSS', 'Bootstrap', 'MySQL', 'PostgreSQL', 'MongoDB'],
                $this->faker->numberBetween(2, 4)
            ),
        ];
    }
}
