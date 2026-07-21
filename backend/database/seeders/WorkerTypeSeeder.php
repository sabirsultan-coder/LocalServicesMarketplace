<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\WorkerType;

class WorkerTypeSeeder extends Seeder
{
    public function run(): void
    {
        $plumber = Category::where('name', 'Plumber')->first();

        $plumberTypes = [
            'Residential Plumber',
            'Commercial Plumber',
            'Pipe Repair Specialist',
        ];

        foreach ($plumberTypes as $type) {
            WorkerType::create([
                'category_id' => $plumber->id,
                'name' => $type,
            ]);
        }


        $electrician = Category::where('name', 'Electrician')->first();

        $electricianTypes = [
            'House Electrician',
            'Industrial Electrician',
            'Solar Electrician',
        ];

        foreach ($electricianTypes as $type) {
            WorkerType::create([
                'category_id' => $electrician->id,
                'name' => $type,
            ]);
        }


        $mechanic = Category::where('name', 'Mechanic')->first();

        $mechanicTypes = [
            'Car Mechanic',
            'Motorcycle Mechanic',
            'Diesel Engine Mechanic',
        ];

        foreach ($mechanicTypes as $type) {
            WorkerType::create([
                'category_id' => $mechanic->id,
                'name' => $type,
            ]);
        }
    }
}
