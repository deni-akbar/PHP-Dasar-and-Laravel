<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@transisi.id',
            'password' => Hash::make('transisi'),
        ]);

        Company::create([
            'name' => 'PT Sejahtera Sentosa',
            'email' => 'admin@sejahtera.id',
            'logo' => 'https://images.pexels.com/photos/674010/pexels-photo-674010.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'website' => 'www.sejahtera.com',
        ]);
    }
}
