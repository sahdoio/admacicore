<?php

use App\Models\Media;
use App\Models\MediaCategory;
use App\Models\MediaType;
use App\Models\Department;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();

        $faker = Faker::create();

        echo "[Department] Seeding 'departments' table\n";

        Department::create([
            'name' => 'LOUVOR',
            'description' => 'Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec. Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec.',
            'media_id' => Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => '/media/departments/band.jpg',
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => MediaType::PNG
            ])->id
        ]);

        Department::create([
            'name' => 'TEATRO',
            'description' => 'Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec. Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec.',
            'media_id' => Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => '/media/departments/theater.jpg',
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => MediaType::PNG
            ])->id
        ]);

        Department::create([
            'name' => 'DANÇA',
            'description' => 'Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec. Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec.',
            'media_id' => Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => '/media/departments/dance.jpg',
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => MediaType::PNG
            ])->id
        ]);
    }
}
