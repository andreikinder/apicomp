<?php

namespace Database\Seeders;

use App\Models\Machine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Machine::truncate();

        $json = File::get("database/data/machines.json");
        $machines = json_decode($json);

        foreach ($machines as $key => $machine) {
            Machine::create([
                "id" => $machine->id,
                "name" => $machine->name,
                "imageUrl" => $machine->imageUrl,
                "description" => $machine->description,
                "motherboard_id" => $machine->motherboard_id,
                "processor_id" => $machine->processor_id,
                "rammemory_id" => $machine->rammemory_id,
                "ramMemoryAmount" => $machine->ramMemoryAmount,
                "graphiccard_id" => $machine->graphiccard_id,
                "graphicCardAmount" => $machine->graphicCardAmount,
                "powersupply_id" => $machine->powersupply_id,
            ]);

        }
    }
}
