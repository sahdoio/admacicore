<?php

use App\Models\MediaCategory;
use App\Models\MediaType;
use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Address;
use App\Models\Contact;
use App\Models\SiteInfo;
use Faker\Factory as Faker;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_info')->delete();

        echo "[SiteInfo] Seeding 'site_info' table\n";

        SiteInfo::create([
            'code' => 'contact_page',
            'contact_id' => Contact::create([
                'cellphone' => '(11) 98593-4105',
                'cellphone2' => '(92) 99508-9845',
                'phone' => '',
                'phone2' => '',
                'email' => 'contato@admanicore.com',
                'email2' => '',
                'skype' => ''
            ])->id,
            'address_id' => Address::create([
                'cep' => '',
                'street' => '',
                'number' => '',
                'district' => '',
                'state' => '',
                'city' => '',
                'country' => '',
            ])->id
        ]);

        SiteInfo::create([
            'code' => 'home_page_1',
            'title' => 'Quem Somos',
            'description' => 'Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec, ut leo elit ac morbi ipsum mi. Adipiscing eget nonummy, erat rutrum quisque gravida elit vitae, consequat interdum suspendisse purus, aliquam justo vehicula, elit arcu augue. Facilisis donec mus imperdiet quam congue sit. Sit ut fringilla erat dolor, nulla maecenas in imperdiet arcu cursus sem, ac vestibulum fames sed fringilla neque. Facilisis donec mus imperdiet quam congue sit. Sit ut fringilla erat dolor. Sit ut fringilla erat dolor, nulla maecenas in imperdiet arcu cursus sem, ac vestibulum fames sed fringilla neque.',
            'media_id' => Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => '/media/home/who_we_are.jpg',
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => MediaType::PNG
            ])->id
        ]);

        SiteInfo::create([
            'code' => 'home_page_2',
            'title' => 'Visão',
            'description' => 'Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec, ut leo elit ac morbi ipsum mi. Adipiscing eget nonummy, erat rutrum quisque gravida elit vitae, consequat interdum suspendisse purus, aliquam justo vehicula, elit arcu augue. Facilisis donec mus imperdiet quam congue sit. Sit ut fringilla erat dolor, nulla maecenas in imperdiet arcu cursus sem, ac vestibulum fames sed fringilla neque. Facilisis donec mus imperdiet quam congue sit. Sit ut fringilla erat dolor. Sit ut fringilla erat dolor, nulla maecenas in imperdiet arcu cursus sem, ac vestibulum fames sed fringilla neque.',
            'media_id' => Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => '/media/home/vision.jpg',
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => MediaType::PNG
            ])->id
        ]);

        SiteInfo::create([
            'code' => 'history_page',
            'title' => 'História da Igreja',
            'description' => '<h4>De Missionário a Pastor</h4><p>Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec, ut leo elit ac morbi ipsum mi. Adipiscing eget nonummy, erat rutrum quisque gravida elit vitae, consequat interdum suspendisse purus, aliquam justo vehicula, elit arcu augue. Facilisis donec mus imperdiet quam congue sit. Sit ut fringilla erat dolor, nulla maecenas in imperdiet arcu cursus sem, ac vestibulum fames sed fringilla neque. Facilisis donec mus imperdiet quam congue sit. Sit ut fringilla erat dolor. Sit ut fringilla erat dolor, nulla maecenas in imperdiet arcu cursus sem, ac vestibulum fames sed fringilla neque. Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec, ut leo elit ac morbi ipsum mi.</p>',
            'media_id' => Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => '/media/history/church.jpg',
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => MediaType::PNG
            ])->id
        ]);

        SiteInfo::create([
            'code' => 'about_page',
            'title' => 'Rodrigo Reasom',
            'description' => '<h4>De Missionário a Pastor</h4><p>Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec, ut leo elit ac morbi ipsum mi. Adipiscing eget nonummy, erat rutrum quisque gravida elit vitae, consequat interdum suspendisse purus, aliquam justo vehicula, elit arcu augue. Facilisis donec mus imperdiet quam congue sit. Sit ut fringilla erat dolor, nulla maecenas in imperdiet arcu cursus sem, ac vestibulum fames sed fringilla neque. Facilisis donec mus imperdiet quam congue sit. Sit ut fringilla erat dolor. Sit ut fringilla erat dolor, nulla maecenas in imperdiet arcu cursus sem, ac vestibulum fames sed fringilla neque. Lorem ipsum dolor sit amet, nullam in, suspendisse augue nulla. Tempus libero, diam proin duis urna at sed ut, at quis non id cursus quisque sit, sit dolor diam nec, ut leo elit ac morbi ipsum mi.</p>',
            'media_id' => Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => '/media/about/me.jpg',
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => MediaType::PNG
            ])->id
        ]);
    }
}
