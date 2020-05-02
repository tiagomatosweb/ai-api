<?php

use App\AnalyticType;
use Illuminate\Database\Seeder;

class AnalyticTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $analyticTypes = [
            [
                'id' => 1,
                'name' => 'max_Bld_Height_m',
                'units' => 'm',
                'is_numeric' => true,
                'num_decimal_places' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'min_lot_size_m2',
                'units' => 'm2',
                'is_numeric' => true,
                'num_decimal_places' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'fsr',
                'units' => ':1',
                'is_numeric' => true,
                'num_decimal_places' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        AnalyticType::insert($analyticTypes);
    }
}
