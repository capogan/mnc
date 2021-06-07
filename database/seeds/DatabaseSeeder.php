<?php

use AzisHapidin\IndoRegion\RawDataGetter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $villages = RawDataGetter::getVillages();

        // Insert Data with Chunk
        DB::transaction(function() use($villages) {
            $collection = collect($villages);
            $parts = $collection->chunk(1000);
            foreach ($parts as $subset) {
                DB::table('villages')->insert($subset->toArray());
            }
        });
    }
}
