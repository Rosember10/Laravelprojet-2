<?php

namespace Database\Factories;
use App\Models\Etudient;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtudientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nom'             => $this->faker->name(),
            'adresse'         => $this->faker->streetAddress,
            'phone'           => $this->faker->tollFreePhoneNumber,
            'email'           => $this->faker->freeEmail,
            'date_naissance'  => $this->faker->dateTimeInInterval($startDate = '-20 years', $interval = '+ 365 days') ,
            'ville_id'        => $this->faker->numberBetween($min = 1, $max = 15)
        ];
    }
}
