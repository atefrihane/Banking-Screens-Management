<?php

namespace Database\Factories;


use Illuminate\Support\Str;
use App\Modules\Role\Models\Role;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password'     => bcrypt('123456'),
            'role_id' => Role::first()->id,

        ];
    }
}
