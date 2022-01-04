<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name'      => $this->faker->name(),
            'job'       => 'job',
            'phone'     => 'phone',
            'adress'    => 'adress',
            'status'    => 'status',
            'vk'        => 'vk',
            'telegram'  => 'telegram',
            'instagram' => 'instagram',
            'user_id'   => mt_rand(1, 20)
        ];
    }
}
