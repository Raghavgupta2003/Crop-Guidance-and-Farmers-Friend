<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CropRule;

class CropRuleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['India', 'Punjab', 'Ludhiana', 'Rabi', 'Wheat'],
            ['India', 'Punjab', 'Amritsar', 'Rabi', 'Barley'],
            ['India', 'Punjab', 'Ludhiana', 'Kharif', 'Maize'],
            ['India', 'Haryana', 'Rohtak', 'Rabi', 'Lentil'],
            ['India', 'Haryana', 'Rohtak', 'Kharif', 'Paddy'],
            ['India', 'Punjab', 'Patiala', 'Kharif', 'Cotton'],
            ['India', 'Haryana', 'Hisar', 'Rabi', 'Mustard'],
            ['India', 'Punjab', 'Bathinda', 'Rabi', 'Chickpea'],
        ];

        foreach ($data as $entry) {
            CropRule::create([
                'country' => $entry[0],
                'state' => $entry[1],
                'district' => $entry[2],
                'season' => $entry[3],
                'crop_name' => $entry[4],
            ]);
        }
    }
}
