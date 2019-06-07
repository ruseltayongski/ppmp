<?php

use Illuminate\Database\Seeder;
use App\ModeProcurement;

class ModeProcurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mode_procurement = [
            ['description' => 'small_value'],
            ['description' => 'cash_advance'],
            ['description' => 'bidding']
        ];
        ModeProcurement::insert($mode_procurement);
    }
}
