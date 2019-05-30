<?php

use Illuminate\Database\Seeder;
use App\Pap;

class PapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pap = [
            ['description' => 'PAP1' , 'code' => 'PAP-001'],
            ['description' => 'PAP2' , 'code' => 'PAP-002'],
            ['description' => 'PAP3' , 'code' => 'PAP-003'],
            ['description' => 'PAP4' , 'code' => 'PAP-004'],
            ['description' => 'PAP5' , 'code' => 'PAP-005'],
            ['description' => 'PAP6' , 'code' => 'PAP-006'],
            ['description' => 'PAP7' , 'code' => 'PAP-007'],
            ['description' => 'PAP8' , 'code' => 'PAP-008'],
            ['description' => 'PAP9' , 'code' => 'PAP-009'],
            ['description' => 'PAP10' , 'code' => 'PAP-0010'],
        ];
        Pap::insert($pap);
    }
}
