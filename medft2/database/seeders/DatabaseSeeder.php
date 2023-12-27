<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\m_biodata;
use App\Models\m_role;
use App\Models\m_user;
use Database\Factories\m_biodataFactory;
use Database\Factories\m_roleFactory;
use Database\Factories\m_userFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        m_roleFactory::factoryForModel(m_role::class)->admin()->create();
        m_roleFactory::factoryForModel(m_role::class)->dokter()->create();
        m_roleFactory::factoryForModel(m_role::class)->pasien()->create();
        m_roleFactory::factoryForModel(m_role::class)->faskes()->create();
        m_roleFactory::factoryForModel(m_role::class)->umum()->create();
        m_biodataFactory::factoryForModel(m_biodata::class)->count(5)->create();
        m_userFactory::factoryForModel(m_user::class)->count(5)->create();
        // $this->call([
        //     MedicalItemSeeder::class,
        //     ProfilDokterSeeder::class,
        //     CustomerSeeder::class
        // ]);
    }
}
