<?php

namespace Database\Seeders;

use App\Models\Storagedevice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StoragedeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storagedevice::truncate();

        $json = File::get("database/data/storageDevices.json");
        $storageDevices = json_decode($json);

        foreach ($storageDevices as $key => $storageDevice) {
            Storagedevice::create([
                "id" => $storageDevice->id,
                "name" => $storageDevice->name,
                "imageUrl" => $storageDevice->imageUrl,
                "brand_id" => $storageDevice->brand_id,
                "storageDeviceType" => $storageDevice->storageDeviceType,
                "size" => $storageDevice->size,
                "storageDeviceInterface" => $storageDevice->storageDeviceInterface,
            ]);
        }


    }
}
