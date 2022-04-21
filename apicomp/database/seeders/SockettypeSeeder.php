<?php

namespace Database\Seeders;

use App\Models\Sockettype;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SockettypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sockettype::truncate();

        $json = File::get("database/data/socketTypes.json");
        $sockettypes = json_decode($json);

        foreach ($sockettypes as $key => $sockettype) {
            Sockettype::create([
                "id" => $sockettype->id,
                "name" => $sockettype->name
            ]);
        }
    }
}
