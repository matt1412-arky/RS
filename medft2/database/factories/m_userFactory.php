<?php

namespace Database\Factories;

use App\Models\m_biodata;
use App\Models\m_role;
use App\Models\m_user;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\m_user>
 */
class m_userFactory extends Factory
{
    protected $model = m_user::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $biodata = m_biodata::inRandomOrder()->first(); // $biodataId adalah ID yang diinginkan

        // Pastikan biodata ditemukan
        if ($biodata) {
            $fullname = $biodata->fullname; // Ambil nama dari biodata

            // Lakukan manipulasi pada nama jika diperlukan untuk pembuatan email
            // Contoh: jika lebih dari satu kata, pisahkan dengan titik
            $nameParts = explode(' ', $fullname);
            $emailName = implode('.', $nameParts);

            // Gunakan $emailName dalam pembuatan email
            $email = strtolower($emailName) . '@example.com';
        }

        $role = m_role::inRandomOrder()->first();
        $biodata = m_biodata::inRandomOrder()->first();

        return [
            'biodata_id' => $biodata->id ?? m_biodata::factory()->create()->id,
            'role_id' => $role->id ?? m_role::factory()->create()->id,
            'email' => $email,
            'password' => bcrypt('M4t3m4t1k4!'),
            'login_attempt' => 0,
            'is_locked' => false,
            'last_login' => $this->faker->dateTimeThisYear(),
            'created_by' => 1,
            'created_on' => $this->faker->dateTimeThisYear(),
            'modified_by' => null,
            'modified_on' => null,
            'deleted_by' => null,
            'deleted_on' => null,
            'is_deleted' => false,
        ];
    }
}
