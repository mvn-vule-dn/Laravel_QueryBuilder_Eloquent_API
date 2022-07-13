<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'tel' => $this->faker->phoneNumber(),
            'user_id' => rand(1,count(User::all())),
            'province' => $this->faker->country(),
        ];
    }
}
