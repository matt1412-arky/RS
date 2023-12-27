<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProfilDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $biodata = \App\Models\m_biodata::pluck('id')->toArray();
        $created = \App\Models\m_user::pluck('id')->toArray();
        for($i=0; $i < 10; $i++){
            DB::table('m_doctors')->insert([
                'biodata_id' => $faker->randomElement($biodata),
                'str' => $faker->numerify('###-####'),
                'created_by' => $faker->randomElement($created),
                'created_on' => now()
            ]);
        }

        $doctor_specializations = array(
            'Umum',
            'Bedah',
            'Kandungan',
            'Anak',
            'Mata',
            'THT',
            'Jantung dan Pembuluh Darah',
            'Paru-paru',
            'Kulit dan Kelamin',
            'Orthopedi',
            'Saraf',
            'Gigi dan Mulut',
            'Psikiatri',
            'Urologi',
            'Radiologi',
            'Patologi Klinik',
            'Rehabilitasi Medis',
            'Bedah Plastik',
            'Mata Telinga Hidung Tenggorokan',
            'Kesehatan Jiwa'
        );
        foreach($doctor_specializations as $data){
            DB::table('m_specializations')->insert([
                'name' => $data,
                'created_by' => $faker->randomElement($created),
                'created_on' => now()
            ]);
        }

        $doctor_specializations_id = \App\Models\m_specialization::pluck('id')->toArray();
        $doctor_id = \App\Models\m_doctor::pluck('id')->toArray();
        for($i=0; $i < 10; $i++){
            DB::table('t_current_doctor_specializations')->insert([
                'doctor_id' => $faker->randomElement($doctor_id),
                'specialization_id' => $faker->randomElement($doctor_specializations_id),
                'created_by' => $faker->randomElement($created),
                'created_on' => now()
            ]);
        }
        
    }
}
