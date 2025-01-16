<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password123'), // Mot de passe par défaut
            'role' => $this->faker->randomElement(['admin', 'moderateur', 'vendeur', 'client']),
            'terms' => $this->faker->boolean(90), // 90% de chance d'accepter les conditions
            'country' => $this->faker->country,
            'accountType' => $this->faker->randomElement(['personal', 'business', 'admin']),
            'profile_picture' => null, // Pas d'image par défaut
            'bio' => $this->faker->sentence, // Bio aléatoire
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
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
}
