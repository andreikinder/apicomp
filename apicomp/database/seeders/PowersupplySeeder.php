<?php

namespace Database\Seeders;

use App\Models\Powersupply;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class PowersupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Powersupply::truncate();

        $json = File::get("database/data/powerSupplies.json");
        $powerSupplies = json_decode($json);

        foreach ($powerSupplies as $key => $powerSupply) {
            Powersupply::create([
                "id" => $powerSupply->id,
                "name" => $powerSupply->name,
                "imageUrl" => $powerSupply->imageUrl,
                "brand_id" => $powerSupply->brand_id,
                "potency" => $powerSupply->potency,
                "badge80Plus" => $powerSupply->badge80Plus,

            ]);
        }
    }
}
