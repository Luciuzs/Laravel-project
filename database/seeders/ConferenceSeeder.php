<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Conference::create([
            'title' => 'Tech Conference 2024',
            'description' => 'Annual technology conference',
            'conference_date' => '2024-12-15',
            'address' => 'Vilnius, Lithuania'
        ]);
    }
}
