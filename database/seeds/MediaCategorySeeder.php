<?php

use Illuminate\Database\Seeder;
use App\Models\MediaCategory;
use Faker\Factory as Faker;

class MediaCategorySeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('media_categories')->delete();
        
        $faker = Faker::create();

        // 1
        MediaCategory::create([
            'id' => 1,
            'name' => 'general'
        ]);
        
        // 2
        MediaCategory::create([
            'id' => 2,
            'name' => 'banner',
        ]);

        // 3
        MediaCategory::create([
            'id' => 3,
            'name' => 'job',
        ]);

        // 4
        MediaCategory::create([
            'id' => 4,
            'name' => 'client',
        ]);

        // 5
        MediaCategory::create([
            'id' => 5,
            'name' => 'service',
        ]);

        // Random
        echo "[Media Category] Seeding 'media_categories' table\n";
        foreach(range(1, 8) as $i) {  
            MediaCategory::create([
                'name' => $faker->word,
            ]);
        }        
    }
}
