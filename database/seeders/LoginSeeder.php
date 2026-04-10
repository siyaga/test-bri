<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;
use Faker\Factory as Faker;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin credentials
        Login::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // 50 random users (Indonesian Names)
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            // Kita generate nama orang asli tanpa spasi untuk jadi username
            $nama = strtolower(preg_replace('/\s+/', '.', $faker->name));
            
            Login::create([
                'username' => $nama . $faker->numberBetween(1, 99),
                'password' => Hash::make('password'),
            ]);
        }
    }
}

