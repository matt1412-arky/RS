<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $user = \App\Models\m_user::pluck('id')->toArray();

        $blood = ['A', 'B', 'AB', 'O'];
        foreach($blood as $data){
            DB::table('m_blood_groups')->insert([
                'code'=>$data,
                'description'=>'-',
                'created_by' => $faker->randomElement($user),
                'created_on' => now()
            ]);
        }

        $blood = \App\Models\m_blood_group::pluck('id')->toArray();
        $biodata = \App\Models\m_biodata::pluck('id')->toArray();
        for($i = 0; $i < 15; $i++){
            DB::table('m_customers')->insert([
                'biodata_id' => $faker->randomElement($biodata),
                'dob'=> $faker->date,
                'gender' => $faker->randomElement(['L', 'P']),
                'blood_group_id' => $faker->randomElement($blood),
                'rhesus_type' => $faker->randomElement(['+', '-']),
                'height' => $faker->numerify('###'),
                'weight' => $faker->numerify('###'),
                'created_by' => $faker->randomElement($user),
                'created_on' => now()
            ]);
        }
    }
}
