<?php

use Illuminate\Database\Seeder;
use App\Models\MediaType;

class MediaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_types')->delete();

        echo "[MediaTypes] Seeding 'media_types' table\n";

        MediaType::create([
            'id' => MediaType::GENERIC,
            'name' => 'generic'
        ]);

        MediaType::create([
            'id' => MediaType::JPG,
            'name' => 'jpg'
        ]);

        MediaType::create([
            'id' => MediaType::PNG,
            'name' => 'png'
        ]);

        MediaType::create([
            'id' => MediaType::GIF,
            'name' => 'gif'
        ]);

        MediaType::create([
            'id' => MediaType::YOUTUBE,
            'name' => 'youtube'
        ]);

        MediaType::create([
            'id' => MediaType::VIMEO,
            'name' => 'vimeo'
        ]);

        MediaType::create([
            'id' => MediaType::MP4,
            'name' => 'mp4'
        ]);

        MediaType::create([
            'id' => MediaType::PDF,
            'name' => 'pdf'
        ]);

        MediaType::create([
            'id' => MediaType::DOC,
            'name' => 'doc'
        ]);
    }
}
