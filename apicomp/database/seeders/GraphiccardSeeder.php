<?php

namespace Database\Seeders;

use App\Models\Graphiccard;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\File;

class GraphiccardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Graphiccard::truncate();

        $json = File::get("database/data/graphicCards.json");
        $graphicCards = json_decode($json);

        foreach ($graphicCards as $key => $graphicCard) {
            Graphiccard::create([
                "id" => $graphicCard->id,
                "name" => $graphicCard->name,
                "imageUrl" => $graphicCard->imageUrl,
                "brand_id" => $graphicCard->brand_id,
                "memorySize" => $graphicCard->memorySize,
                "memoryType" => $graphicCard->memoryType,
                "minimumPowerSupply" => $graphicCard->minimumPowerSupply,
                "supportMultiGpu" => $graphicCard->supportMultiGpu,
            ]);

        }
    }
}
