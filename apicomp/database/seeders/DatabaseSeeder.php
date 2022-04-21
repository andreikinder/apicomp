<?php

namespace Database\Seeders;



use App\Models\Storagedevice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            BrandSeeder::class,
            SockettypeSeeder::class,
            RammemorytypeSeeder::class,
            StoragedeviceSeeder::class,
            GraphiccardSeeder::class,
            MotherboardSeeder::class,
            ProcessorSeeder::class,
            RammemorySeeder::class,
            PowersupplySeeder::class,
            MachineSeeder::class,
            StoragedeviceMachineSeeder::class
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // \App\Models\User::factory(10)->create();
    }
}
