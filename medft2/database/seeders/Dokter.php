<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Dokter extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('m_biodata')->insert([
                'fullname' => $faker->company, // You can customize this based on your requirements
                'created_by' => 1,
                'created_on' => now()
            ]);

            // DB::table('m_biodata')->insert([
            //     'fullname' => $faker->company, // You can customize this based on your requirements
                
            //     'medical_item_category_id' => $faker->randomElement($categories),
            //     'composition' => $faker->words(3, true),
            //     'medical_item_segmentation_id' => $faker->randomElement($segmentations),
            //     'manufacturer' => $faker->company,
            //     'indication' => $faker->sentence(10),
            //     'packaging' => $faker->randomElement($packaging),
            //     'dosage' => $faker->sentence(10),
            //     'directions' => $faker->sentence(10),
            //     'contradiction' => $faker->sentence(10),
            //     'price_min' => $faker->numberBetween(1, 20000),
            //     'price_max' => $faker->numberBetween(20001, 100000),
            //     'created_by' => 1,
            //     'created_on' => now()
            // ]);
        }
    }
}
