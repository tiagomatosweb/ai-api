<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PropertiesTableSeeder::class);
        $this->call(AnalyticTypesTableSeeder::class);
        $this->call(PropertyAnalyticsTableSeeder::class);
    }
}
