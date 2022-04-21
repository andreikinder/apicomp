<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Facades\File;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();

        $json = File::get("database/data/brands.json");
        $brands = json_decode($json);

        foreach ($brands as $key => $brand) {
            Brand::create([
                "id" => $brand->id,
                "name" => $brand->name
            ]);
        }
    }
}
