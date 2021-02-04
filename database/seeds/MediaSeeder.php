<?php

/*
    CATEGORY 1 -> General
    CATEGORY 2 -> Banners
*/

use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\MediaCategory;
use App\Models\MediaType;
use Faker\Factory as Faker;

class MediaSeeder extends Seeder 
{
    private $banners = [
        [
            'title' => 'Pré Wedding Gustavo e Larissa',
            'subtitle' => 'Ensaio de pré wedding do Gustavo e da Larissa',
            'url' => '/jobs',
            'category_id' => 2,
            'image' => '/media/banners/gustavo_larissa.jpg'
        ],
        [
            'title' => 'Ensaio Casamento Matheus e Vitória',
            'subtitle' => 'Ensaio Casamento Matheus e Vitória',
            'url' => '/jobs',
            'category_id' => 2,
            'image' => '/media/banners/matheus_vitoria.jpg'
        ],
        [
            'title' => 'Ensaio Casamento Paloma e Henrique',
            'subtitle' => 'Ensaio Casamento Paloma e Henrique',
            'url' => '',
            'category_id' => 2,
            'image' => '/media/banners/paloma_henrique.jpg'
        ]
    ];

    private $jobs = [
        'http://lider.drekod.com/themes/lidere_v1/images/portfolio/animacao-alakazambrinquedos.jpg',
        'http://drekod.com/portfolio/onedesire/img/portfolio/14.jpg',
        'http://drekod.com/portfolio/onedesire/img/portfolio/10.jpg',
        'http://drekod.com/portfolio/onedesire/img/portfolio/13.jpg',
        'http://lider.drekod.com/themes/lidere_v1/images/portfolio/12.jpg',
        'http://lider.drekod.com/themes/lidere_v1/images/portfolio/5.jpg',
        'http://lider.drekod.com/themes/lidere_v1/images/portfolio/7.jpg',
        'http://lider.drekod.com/themes/lidere_v1/images/portfolio/8.jpg',
        'http://lider.drekod.com/themes/lidere_v1/images/portfolio/6.jpg',
    ];

    private $clients = [
        '/uploads/image/2018/08/tcontas.png',
        'http://drekod.com/portfolio/onedesire/img/spacer-partner/saoraimundoec.png',
        'http://drekod.com/portfolio/onedesire/img/spacer-partner/1.png',
        'http://drekod.com/portfolio/onedesire/img/spacer-partner/2.png',
        'http://drekod.com/portfolio/onedesire/img/spacer-partner/3.png',
        'http://drekod.com/portfolio/onedesire/img/spacer-partner/4.png',
        'http://drekod.com/portfolio/onedesire/img/spacer-partner/5.png',
        'http://drekod.com/portfolio/onedesire/img/spacer-partner/6.png',
        'http://drekod.com/portfolio/onedesire/img/spacer-partner/7.png',

    ];

    private $services = [
        'http://www.engineofimpact.org/wp-content/uploads/2018/02/Diagnostic-small-1-1024x683.jpeg',
        'https://palife.co.uk/wp-content/uploads/2017/08/team-motivation-teamwork-together-53958-1170x658.jpeg',
        'http://jennystilwell.com.au/wp-content/uploads/2015/03/key.jpg',
        'http://londonheadhunters.co.uk/wp-content/uploads/2015/06/recruitmentlondon.jpg',
        'http://www.energyexperts.ca/wp-content/uploads/2016/11/training_class.jpg',
        'https://www.oiltradinggroup.com/wp-content/uploads/2016/09/managing-risk-1068x712.jpg',
    ];

    private $siteinfo = [
        'vision' => '/uploads/image/2018/07/vision.jpg'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('medias')->delete();

        $faker = Faker::create();

        echo "[Medias] Seeding 'medias' table\n";

        // --------------------------------
        // Banners
        // --------------------------------    
        
        foreach ($this->banners as $banner) {
            $banner = (object) $banner;
            Media::create([
                'title'             => $banner->title,
                'subtitle'          => $banner->subtitle,
                'url'               => $banner->image,
                'category_id'       => MediaCategory::BANNER,
                'type_id'           => MediaType::JPG
            ]);
        }  

        // --------------------------------
        // Jobs
        // --------------------------------

        foreach($this->jobs as $i => $job) {
            Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => $job,
                'category_id'       => MediaCategory::JOB,
                'type_id'           => MediaType::JPG
            ]);
        }

        // --------------------------------
        // Clients
        // --------------------------------

        foreach($this->clients as $i => $client) {
            Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => $client,
                'category_id'       => MediaCategory::CLIENT,
                'type_id'           => MediaType::PNG
            ]); 
        }  
        
        // --------------------------------
        // Services
        // --------------------------------

        foreach($this->services as $i => $service) {
            Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => $service,
                'category_id'       => MediaCategory::SERVICE,
                'type_id'           => MediaType::JPG
            ]); 
        } 

        // --------------------------------
        // SiteInfo
        // --------------------------------

        foreach($this->siteinfo as $i => $info) {
            Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => $info,
                'category_id'       => MediaCategory::SITE_INFO,
                'type_id'           => MediaType::JPG
            ]); 
        } 
    }
}
