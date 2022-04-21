<?php

namespace Database\Seeders;

use App\Models\Processor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class ProcessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Processor::truncate();

        $json = File::get("database/data/processors.json");
        $processors = json_decode($json);

        foreach ($processors as $key => $processor) {
            Processor::create([
                "id" => $processor->id,
                "name" => $processor->name,
                "imageUrl" => $processor->imageUrl,
                "brand_id" => $processor->brand_id,
                "sockettype_id" => $processor->sockettype_id,
                "cores" => $processor->cores,
                "baseFrequency" => $processor->baseFrequency,
                "maxFrequency" => $processor->maxFrequency,
                "cacheMemory" => $processor->cacheMemory,
                "tdp" => $processor->tdp,
            ]);
        }

    }
}
