<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;
use App\Models\Student;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'accountable_id' => Student::pluck('id')->random(),
            'account_title' => $this->faker->name,
            'account_type' => 'BKASH',
            'accountable_type' => 'App\Models\Student',
            'account_status' => 'ACTIVE',
        ];
    }
}
