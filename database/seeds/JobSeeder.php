<?php

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Client;
use App\Models\Media;
use App\Models\Contact;
use App\Models\Address;
use App\Models\JobMedia;
use App\Models\MediaType;
use App\Models\MediaCategory;
use Faker\Factory as Faker;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->delete();        
        
        $faker = Faker::create();

        echo "[Jobs] Seeding 'jobs' table\n";

        /*
         * Job 1
         */

        $media1 = Media::create([
            'title'             => '',
            'subtitle'          => '',
            'url'               => '/media/jobs/coke.jpg',
            'category_id'       => MediaCategory::JOB,
            'type_id'           => MediaType::PNG
        ]);

        $job = Job::create([
            'title' => 'Coca Cola',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'client_id' => Client::create([
                'name' => 'Rafael Soares',
                'lastname' => 'Fernandes',
                'company_name' => 'Nike',
                'website' => 'https:://www.cocacola.br',
                'contact' => Contact::inRandomOrder()->first()->id,
                'address' => Address::inRandomOrder()->first()->id,
                'image' => Media::where('category_id', '=', MediaCategory::CLIENT)->inRandomOrder()->first()->id,
            ])->id,
            'date' => $faker->dateTimeBetween($startDate = '-3 months', $max = '+2 months'),
            'cover_media_id' => $media1->id
        ]);

        $jobMedia = JobMedia::create([
            'job_id' => $job->id,
            'media_id' => $media1->id,
            'position' => 1
        ]);

        /*
         * Job 2
         */

        $media1 = Media::create([
            'title'             => '',
            'subtitle'          => '',
            'url'               => 'https://player.vimeo.com/video/164698304',
            'category_id'       => MediaCategory::JOB,
            'type_id'           => MediaType::VIMEO
        ]);

        $media2 = Media::create([
            'title'             => '',
            'subtitle'          => '',
            'url'               => '/media/jobs/nike_spin.gif',
            'category_id'       => MediaCategory::JOB,
            'type_id'           => MediaType::GIF
        ]);

        $job = Job::create([
            'title' => 'Nike',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'client_id' => Client::create([
                'name' => 'Luana',
                'lastname' => 'Guerra',
                'company_name' => 'Nike',
                'website' => 'https:://www.nike.com',
                'contact' => Contact::inRandomOrder()->first()->id,
                'address' => Address::inRandomOrder()->first()->id,
                'image' => Media::where('category_id', '=', MediaCategory::CLIENT)->inRandomOrder()->first()->id,
            ])->id,
            'date' => $faker->dateTimeBetween($startDate = '-3 months', $max = '+2 months'),
            'cover_media_id' => $media1->id
        ]);

        $jobMedia = JobMedia::create([
            'job_id' => $job->id,
            'media_id' => $media1->id,
            'position' => 1
        ]);

        $jobMedia = JobMedia::create([
            'job_id' => $job->id,
            'media_id' => $media2->id,
            'position' => 2
        ]);

        /*
         * Job 3
         */

        $media1 = Media::create([
            'title'             => '',
            'subtitle'          => '',
            'url'               => '/media/jobs/black_hole.gif',
            'category_id'       => MediaCategory::JOB,
            'type_id'           => MediaType::GIF
        ]);

        $job = Job::create([
            'title' => 'Black Hole',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'client_id' => Client::create([
                'company_name' => 'Vinicius Lavor',
                'website' => '',
                'contact' => Contact::inRandomOrder()->first()->id,
                'address' => Address::inRandomOrder()->first()->id,
                'image' => Media::where('category_id', '=', MediaCategory::CLIENT)->inRandomOrder()->first()->id,
            ])->id,
            'date' => $faker->dateTimeBetween($startDate = '-3 months', $max = '+2 months'),
            'cover_media_id' => $media1->id
        ]);

        $jobMedia = JobMedia::create([
            'job_id' => $job->id,
            'media_id' => $media1->id,
            'position' => 1
        ]);

        /*
         * Job 5
         */

        $media1 = Media::create([
            'title'             => '',
            'subtitle'          => '',
            'url'               => '/media/jobs/hug.gif',
            'category_id'       => MediaCategory::JOB,
            'type_id'           => MediaType::GIF
        ]);

        $job = Job::create([
            'title' => 'Hug',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'client_id' => Client::create([
                'company_name' => 'Vinicius Lavor',
                'website' => '',
                'contact' => Contact::inRandomOrder()->first()->id,
                'address' => Address::inRandomOrder()->first()->id,
                'image' => Media::where('category_id', '=', MediaCategory::CLIENT)->inRandomOrder()->first()->id,
            ])->id,
            'date' => $faker->dateTimeBetween($startDate = '-3 months', $max = '+2 months'),
            'cover_media_id' => $media1->id
        ]);

        $jobMedia = JobMedia::create([
            'job_id' => $job->id,
            'media_id' => $media1->id,
            'position' => 1
        ]);
    }
}
