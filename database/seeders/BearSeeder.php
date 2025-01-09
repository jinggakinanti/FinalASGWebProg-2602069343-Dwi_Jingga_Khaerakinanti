<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bear as BearModel;

class BearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'img/bear1.jpg', 
            'img/bear2.jpg', 
            'img/bear3.jpg'
        ];

        for($i = 0; $i < 3; $i++){
            BearModel::create([
                'image' => $images[$i],
            ]);
        }
    }
}
