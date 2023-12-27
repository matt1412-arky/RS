<?php

namespace Database\Factories;

use App\Models\m_role;
use App\Models\m_user;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\m_role>
 */
class m_roleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = m_role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = m_user::inRandomOrder()->first();

        return [
            'name' => $this->faker->randomElement(['Admin', 'Pasien', 'Dokter', 'Faskes', 'Umum']),
            'code' => $this->faker->unique()->word(),
            'created_by' => $user->id ?? 1,
            'created_on' => now(),
            'modified_by' => null,
            'modified_on' => null,
            'deleted_by' => null,
            'deleted_on' => null,
            'is_delete' => false,
        ];
    }

    /**
     * Define a state for Admin role.
     *
     * @return Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Admin',
            ];
        });
    }

    /**
     * Define a state for Pasien role.
     *
     * @return Factory
     */
    public function pasien()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Pasien',
            ];
        });
    }

    /**
     * Define a state for Dokter role.
     *
     * @return Factory
     */
    public function dokter()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Dokter',
            ];
        });
    }

    /**
     * Define a state for Faskes role.
     *
     * @return Factory
     */
    public function faskes()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Faskes',
            ];
        });
    }

    /**
     * Define a state for Umum role.
     *
     * @return Factory
     */
    public function umum()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Umum',
            ];
        });
    }
}
