<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MedicalItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $medicineCategories = [
            'Analgesik',                   // Painkillers
            'Antiinflamasi',               // Anti-inflammatory Drugs
            'Antibiotik',                  // Antibiotics
            'Antivirus',                   // Antiviral Drugs
            'Antipiretik',                 // Antipyretics
            'Antiseptik',                  // Antiseptics
            'Antispasmodik',               // Antispasmodics
            'Antasida',                    // Antacids
            'Batuk dan Pilek',             // Cough and Cold Medications
            'Kardiovaskular',              // Cardiovascular Drugs
            'Diabetes',                    // Diabetes Medications
            'Tidur',                       // Sleep Aids
            'Psikotropika',                // Psychotropic Drugs
            'Pencernaan',                  // Digestive Medications
            'Kulit',                       // Dermatological Drugs
            'Mata',                        // Eye Medications
            'Telinga Hidung Tenggorokan (THT)', // Ear, Nose, and Throat (ENT) Medications
            'Gigi dan Mulut',              // Dental and Oral Medications
            'Ginekologi',                  // Gynecological Drugs
            'Pediatrik',                   // Pediatric Medications
        ];

        // Assuming you have MedicalItemCategories and MedicalItemSegmentations models
        $created = \App\Models\m_user::pluck('id')->toArray();
        $packaging = ['Strip @ 10 Tablet', 'Botol @ 100 mL', 'Tube @ 150 mL', 'Aerosol @ 1 KG', 'Sachet @ 10 L'];

        foreach ($medicineCategories as $cat){
            DB::table('m_medical_item_categories')->insert([
                'name' => $cat,
                'created_by' => $faker->randomElement($created),
                'created_on' => now()
            ]);
        }
        $categories = \App\Models\m_medical_item_category::pluck('id')->toArray();

        $medSeg = ['Generik', 'Keras'];
        foreach ($medSeg as $cat){
            DB::table('m_medical_item_segmentations')->insert([
                'name' => $cat,
                'created_by' => $faker->randomElement($created),
                'created_on' => now()
            ]);
        }
        $segmentations = \App\Models\m_medical_item_segmentation::pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('m_medical_items')->insert([
                'name' => $faker->company,
                'medical_item_category_id' => $faker->randomElement($categories),
                'composition' => $faker->words(3, true),
                'medical_item_segmentation_id' => $faker->randomElement($segmentations),
                'manufacturer' => $faker->company,
                'indication' => $faker->sentence(10),
                'packaging' => $faker->randomElement($packaging),
                'dosage' => $faker->sentence(10),
                'directions' => $faker->sentence(10),
                'contradiction' => $faker->sentence(10),
                'price_min' => $faker->numberBetween(1, 20000),
                'price_max' => $faker->numberBetween(20001, 100000),
                'image_path' => $faker->imageUrl($width = 640, $height = 480),
                'created_by' => $faker->randomElement($created),
                'created_on' => now()
            ]);
        }
    }
}