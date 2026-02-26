<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            'Laravel',
            'PHP',
            'JavaScript',
            'Vue.js',
            'React',
            'MySQL',
            'API REST',
            'CSS',
            'TailwindCSS',
            'Docker',
            'Git',
            'Linux',
            'Python',
            'Node.js',
            'TypeScript',
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
