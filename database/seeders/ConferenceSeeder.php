<?php

namespace Database\Seeders;

use App\Models\Conference;
use Illuminate\Database\Seeder;

class ConferenceSeeder extends Seeder
{

    public function run(): void
    {
        Conference::create([
            'title' => 'International Tech Conference 2024',
            'description' => 'A global gathering of technology leaders, innovators, and enthusiasts discussing the future of technology and digital transformation.',
            'conference_date' => '2024-12-15',
            'address' => 'Gedimino pr. 9, Vilnius',
            'participants_count' => 500,
            'city' => 'Vilnius',
        ]);

        Conference::create([
            'title' => 'AI & Machine Learning Summit',
            'description' => 'Explore the latest advancements in artificial intelligence and machine learning with industry experts.',
            'conference_date' => '2024-12-20',
            'address' => 'Konstitucijos pr. 20, Vilnius',
            'participants_count' => 300,
            'city' => 'Vilnius',
        ]);

        Conference::create([
            'title' => 'Web Development Workshop',
            'description' => 'Hands-on workshop covering modern web development technologies including Laravel, React, and Vue.js.',
            'conference_date' => '2025-01-10',
            'address' => 'Savanoriu g. 15, Kaunas',
            'participants_count' => 150,
            'city' => 'Kaunas',
        ]);

        Conference::create([
            'title' => 'Cybersecurity Forum 2025',
            'description' => 'Annual forum dedicated to discussing cybersecurity threats, solutions, and best practices.',
            'conference_date' => '2025-02-05',
            'address' => 'Laisves g. 45, Kaunas',
            'participants_count' => 250,
            'city' => 'Kaunas',
        ]);

        Conference::create([
            'title' => 'Cloud Computing Conference',
            'description' => 'Learn about cloud infrastructure, serverless architecture, and cloud-native applications.',
            'conference_date' => '2025-03-12',
            'address' => 'Klaipedos g. 1, Vilnius',
            'participants_count' => 400,
            'city' => 'Vilnius',
        ]);
    }
}
