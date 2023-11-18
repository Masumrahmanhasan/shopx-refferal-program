<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Join Our Telegram Group',
            'type' => 'telegram',
            'username' => 'masumrahmanhasan',
            'description' => 'Stay updated with the latest news and discussions in our Telegram group.',
            'status' => 'active',
        ];
    }

    public function whatsapp()
    {
        return $this->state(fn (array $attributes) => [
            'title' => 'Join Our Whatsapp Group',
            'type' => 'whatsapp',
            'username' => '+8801537109094',
            'description' => 'Stay updated with the latest news and discussions in our whatsapp group.',
        ]);
    }
}
