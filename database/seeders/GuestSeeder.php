<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guests = [
            ['name' => 'Budi Santoso', 'address' => 'Jl. Mangga No. 10, Jakarta'],
            ['name' => 'Ani Wijaya', 'address' => 'Jl. Melati No. 5, Bandung'],
            ['name' => 'Citra Dewi', 'address' => 'Jl. Anggrek No. 15, Surabaya'],
            ['name' => 'Dodi Pratama', 'address' => 'Jl. Kenanga No. 20, Yogyakarta'],
            ['name' => 'Eva Nurlela', 'address' => 'Jl. Flamboyan No. 8, Bali'],
        ];
        
        foreach ($guests as $guest) {
            Guest::create([
                'name' => $guest['name'],
                'address' => $guest['address'],
                'unique_code' => generateGuestCode($guest['name'])
            ]);
        }
    
    }
}