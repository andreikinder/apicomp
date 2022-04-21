<?php

namespace Database\Seeders;

use App\Models\StoragedeviceMachine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class StoragedeviceMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoragedeviceMachine::truncate();

        $json = File::get("database/data/storagedevice_machine.json");
        $storagedevice_machines = json_decode($json);

        foreach ($storagedevice_machines as $key => $storagedevice_machine) {
            StoragedeviceMachine::create([
                "machine_id" => $storagedevice_machine->machine_id,
                "storagedevice_id" => $storagedevice_machine->storagedevice_id,
                "amount" => $storagedevice_machine->amount,
            ]);
        }
    }
}
