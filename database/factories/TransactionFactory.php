<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    public function definition(): array
    {
        $user = User::inRandomOrder()->first(); // Get a random user
        return [
            'user_id' => $user?->id,
            'account' => fake()->bankAccountNumber,
            'gateway' => fake()->randomElement(['bkash', 'nagad']), // Assuming you have 'bkash' and 'nagad' gateways
            'trxn_id' => fake()->uuid,
            'amount' => fake()->numberBetween(100, 10000), // Adjust the range as needed
            'status' => 'new',
            'type' => 'withdraw',
            'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'updated_at' => now(),
        ];
    }
}
