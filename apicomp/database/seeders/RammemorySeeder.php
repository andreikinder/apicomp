<?php

namespace Database\Seeders;

use App\Models\Rammemory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RammemorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rammemory::truncate();

        $json = File::get("database/data/ramMemories.json");
        $ramMemories = json_decode($json);

        foreach ($ramMemories as $key => $ramMemory) {
            Rammemory::create([
                "id" => $ramMemory->id,
                "name" => $ramMemory->name,
                "imageUrl" => $ramMemory->imageUrl,
                "brand_id" => $ramMemory->brand_id,
                "size" => $ramMemory->size,
                "rammemorytype_id" => $ramMemory->rammemorytype_id,
                "frequency" => $ramMemory->frequency,
            ]);
        }
    }
}
