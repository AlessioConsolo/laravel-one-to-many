<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Web Development'],
            ['name' => 'Mobile App'],
            ['name' => 'Data Science'],
            ['name' => 'AI Project'],
            ['name' => 'E-commerce'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
