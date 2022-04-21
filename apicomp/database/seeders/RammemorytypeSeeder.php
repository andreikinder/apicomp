<?php

namespace Database\Seeders;

use App\Models\Rammemorytype;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RammemorytypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rammemorytype::truncate();

        $json = File::get("database/data/ramMemoryTypes.json");
        $ramMemoryTypes = json_decode($json);


        foreach ($ramMemoryTypes as $key => $ramMemoryType) {
            Rammemorytype::create([
                "id" => $ramMemoryType->id,
                "name" => $ramMemoryType->name
            ]);
        }
    }
}
