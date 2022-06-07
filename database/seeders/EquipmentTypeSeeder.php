<?php

namespace Database\Seeders;

use App\Models\EquipmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $equipmentType = new EquipmentType();
         $equipmentType->name = 'TP-Link TL-WR74';
         $equipmentType->serial_mask = 'XXAAAAAXAA';
         $equipmentType->code = '11';
         $equipmentType->save();
        $equipmentType = new EquipmentType();
        $equipmentType->name = 'D-Link DIR-300';
        $equipmentType->serial_mask = 'NXXAAXZXaa';
        $equipmentType->code = '12';
        $equipmentType->save();
        $equipmentType = new EquipmentType();
        $equipmentType->name = 'D-Link DIR-300 S';
        $equipmentType->serial_mask = 'NXXAAXZXXX';
        $equipmentType->code = '13';
        $equipmentType->save();
    }
}
