<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'admin',
            'username' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$79MVccPBiQMZel9u0ahx2OejS.fQMqkLAWIofxN4e0IPD4agdYMZ2', // password
            'roles' => 'akademik',
            'remember_token' => Str::random(10),
        ];
    }
}
