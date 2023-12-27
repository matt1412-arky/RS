<?php

namespace Database\Factories;

use App\Models\m_biodata;
use App\Models\m_user;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class m_biodataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = m_biodata::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = m_user::inRandomOrder()->first();

        $faker = Faker::create('id_ID');

        return [
            'fullname' => $faker->name, // Menggunakan nama Indonesia
            'mobile_phone' => '08' . mt_rand(1, 9) . mt_rand(10000000, 99999999),
            'image' => null,
            'image_path' => null,
            'created_by' => $user->id ?? 1,
            'created_on' => now(),
            'modified_by' => null,
            'modified_on' => null,
            'deleted_by' => null,
            'deleted_on' => null,
            'is_deleted' => false,
        ];
    }
}
