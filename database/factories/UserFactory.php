<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Exception;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    #[ArrayShape(['first_name' => "string", 'last_name' => "string", 'email' => "string", 'phone' => "string", 'password' => "string", 'status' => 'string', 'referral_id' => "int"])]
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'password' => '12345678',
            'status' => fake()->randomElement(['active', 'inactive']),
            'referral_id' => random_int(111111, 999999),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'status' => 'active',
            'role' => 'admin',
            'referral_id' => random_int(111111, 999999),
        ]);
    }
}
