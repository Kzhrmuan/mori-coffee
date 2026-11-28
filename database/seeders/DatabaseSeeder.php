<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Seeder akun
        User::updateOrCreate(
            ['email' => 'admin@moricoffee.test'],
            [
                'name' => 'Admin Mori',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'kasir@moricoffee.test'],
            [
                'name' => 'Kasir Mori',
                'password' => Hash::make('password'),
                'role' => 'kasir',
            ]
        );

        // Seeder kategori dan produk
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}