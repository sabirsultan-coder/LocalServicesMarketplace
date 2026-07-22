<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Worker;
use App\Models\WorkerType;

class WorkerSeeder extends Seeder
{
    public function run(): void
    {
        $workers = [

            [
                'email' => 'ali@gmail.com',
                'worker_type' => 'Pipe Repair Specialist',
                'experience' => 8,
                'description' => 'Expert Pipe Repair Specialist',
                'hourly_rate' => 2000,
                'latitude' => 34.0151,
                'longitude' => 71.5249,
            ],

            [
                'email' => 'ahmad@gmail.com',
                'worker_type' => 'Commercial Plumber',
                'experience' => 5,
                'description' => 'Bathroom Plumbing Expert',
                'hourly_rate' => 1800,
                'latitude' => 34.0185,
                'longitude' => 71.5200,
            ],

            [
                'email' => 'bilal@gmail.com',
                'worker_type' => 'Residential Plumber',
                'experience' => 10,
                'description' => 'Kitchen Plumbing Specialist',
                'hourly_rate' => 2500,
                'latitude' => 34.0210,
                'longitude' => 71.5300,
            ],

            [
                'email' => 'hamza@gmail.com',
                'worker_type' => 'House Electrician',
                'experience' => 6,
                'description' => 'House Wiring Expert',
                'hourly_rate' => 2200,
                'latitude' => 34.0160,
                'longitude' => 71.5260,
            ],

            [
                'email' => 'usman@gmail.com',
                'worker_type' => 'Solar Electrician',
                'experience' => 4,
                'description' => 'AC Electrical Technician',
                'hourly_rate' => 1900,
                'latitude' => 34.0195,
                'longitude' => 71.5220,
            ],

            [
                'email' => 'fahad@gmail.com',
                'worker_type' => 'Industrial Electrician',
                'experience' => 9,
                'description' => 'Industrial Electrician',
                'hourly_rate' => 3000,
                'latitude' => 34.0230,
                'longitude' => 71.5280,
            ],

            [
                'email' => 'saad@gmail.com',
                'worker_type' => 'Car Mechanic',
                'experience' => 7,
                'description' => 'Car Engine Specialist',
                'hourly_rate' => 2500,
                'latitude' => 34.0170,
                'longitude' => 71.5275,
            ],

            [
                'email' => 'zubair@gmail.com',
                'worker_type' => 'Motorcycle Mechanic',
                'experience' => 5,
                'description' => 'Bike Mechanic',
                'hourly_rate' => 1500,
                'latitude' => 34.0205,
                'longitude' => 71.5215,
            ],

            [
                'email' => 'danish@gmail.com',
                'worker_type' => 'Diesel Engine Mechanic',
                'experience' => 11,
                'description' => 'Heavy Vehicle Mechanic',
                'hourly_rate' => 3500,
                'latitude' => 34.0245,
                'longitude' => 71.5295,
            ],

        ];

        foreach ($workers as $item) {

            $user = User::where('email', $item['email'])->first();

            $workerType = WorkerType::where('name', $item['worker_type'])->first();

            Worker::create([
                'user_id' => $user->id,
                'worker_type_id' => $workerType->id,
                'experience' => $item['experience'],
                'description' => $item['description'],
                'hourly_rate' => $item['hourly_rate'],
                'latitude' => $item['latitude'],
                'longitude' => $item['longitude'],
                'is_available' => true,
                'is_verified' => true,
            ]);
        }
    }
}
