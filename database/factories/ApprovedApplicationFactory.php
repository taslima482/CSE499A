<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ApprovedApplication;
use App\Models\Scholarship;
use App\Models\Student;
use App\Models\Tenant;

class ApprovedApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApprovedApplication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tenant_id' => Tenant::pluck('id')->random(),
            'student_id' => Student::pluck('id')->random(),
            'scholarship_id' => Scholarship::pluck('id')->random(),

            'approved_amount' => '2000',
            'approved_by' => 'HB ADMIN',
            'from_date' => '2021-12-31',
            'to_date' => '2021-12-31',
            'approval_date' => '2022-01-05',
            'account_id' => Account::pluck('id')->random(),
            // 'account_id' => Account::find(5)

        ];
    }
}
