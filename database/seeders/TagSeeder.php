<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            'Développement',
            'Cybersécurité',
            'Data',
            'Vie étudiante',
            'Conférence'
        ];

        foreach ($tags as $name) {
            Tag::create(['name' => $name]);
        }
    }
}
