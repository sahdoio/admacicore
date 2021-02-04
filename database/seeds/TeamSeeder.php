<?php

use App\Models\Media;
use App\Models\MediaCategory;
use App\Models\MediaType;
use Illuminate\Database\Seeder;
use App\Models\Team;
use Faker\Factory as Faker;

class TeamSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->delete();        
        
        $faker = Faker::create();

        echo "[Team] Seeding 'team' table\n";

        Team::create([
            'name'            => 'Pr. Misael de Souza',
            'lastname'        => '',
            'about'     => 'Pastor Presidente',
            'image_id'        => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/media/team/pr_misael.png',
                'category_id'       => MediaCategory::SITE_INFO,
                'type_id'           => MediaType::PNG
            ])->id
        ]);

        Team::create([
            'name'            => 'Pra. Ana Léa',
            'lastname'        => '',
            'about'     => 'Pastora Presidente',
            'image_id'        => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/media/team/pr_ana.png',
                'category_id'       => MediaCategory::SITE_INFO,
                'type_id'           => MediaType::PNG
            ])->id
        ]);

        Team::create([
            'name'            => 'Rafael',
            'lastname'        => 'Lima',
            'about'     => 'Líder do Louvor',
            'image_id'        => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/media/team/rafael.png',
                'category_id'       => MediaCategory::SITE_INFO,
                'type_id'           => MediaType::PNG
            ])->id
        ]);

        Team::create([
            'name'            => 'Amanda',
            'lastname'        => 'Uchôa',
            'about'     => 'Líder da dança',
            'image_id'        => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/media/team/amanda.png',
                'category_id'       => MediaCategory::SITE_INFO,
                'type_id'           => MediaType::PNG
            ])->id
        ]);

        Team::create([
            'name'            => 'Fernando',
            'lastname'        => 'Dias',
            'about'     => 'Líder da dança',
            'image_id'        => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/media/team/fernando.png',
                'category_id'       => MediaCategory::SITE_INFO,
                'type_id'           => MediaType::PNG
            ])->id
        ]);


        Team::create([
            'name'            => 'Carla',
            'lastname'        => 'Gomes',
            'about'     => 'Líder das crianças',
            'image_id'        => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/media/team/carla.png',
                'category_id'       => MediaCategory::SITE_INFO,
                'type_id'           => MediaType::PNG
            ])->id
        ]);
    }
}
