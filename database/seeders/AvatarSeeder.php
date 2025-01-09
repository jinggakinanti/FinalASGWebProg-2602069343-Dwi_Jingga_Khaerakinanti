<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Avatar as AvatarModel;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'img/avatar1.jpg', 'img/avatar2.jpg', 'img/avatar3.jpg',
            'img/avatar4.jpg', 'img/avatar5.jpg', 'img/avatar6.jpg',
            'img/avatar7.jpg', 'img/avatar8.jpg', 'img/avatar9.jpg',
            'img/avatar10.jpg',

        ];
        $names =[
            'Chilli', 'Romy', 'Yochi', 'Bonbon', 'Lawoo',
            'Hikun', 'Som', 'Ruru', 'Woopy', 'Podong'
        ];
        $prices =[
            65000, 100000, 80000, 85000, 70000,
            100000, 90000, 75000, 95000, 60000
        ];

        for($i = 0; $i < 10; $i++){
            AvatarModel::create([
                'avatar' => $images[$i],
                'name' => $names[$i],
                'price' => $prices[$i]
            ]);
        }
    }
}
