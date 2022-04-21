<?php

namespace Database\Seeders;

use App\Models\Motherboard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MotherboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Motherboard::truncate();

        $json = File::get("database/data/motherboards.json");
        $motherboards = json_decode($json);

        foreach ($motherboards as $key => $motherboard) {
            Motherboard::create([
                "id" => $motherboard->id,
                "name" => $motherboard->name,
                "imageUrl" => $motherboard->imageUrl,
                "brand_id" => $motherboard->brand_id,

                "sockettype_id" => $motherboard->sockettype_id,
                "rammemorytype_id" => $motherboard->rammemorytype_id,

                "ramMemorySlots" => $motherboard->ramMemorySlots,
                "maxTdp" => $motherboard->maxTdp,
                "sataSlots" => $motherboard->sataSlots,
                "m2Slots" => $motherboard->m2Slots,
                "pciSlots" => $motherboard->pciSlots,
            ]);

        }
    }
}
