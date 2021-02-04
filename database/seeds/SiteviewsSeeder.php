<?php

use Illuminate\Database\Seeder;
use App\Models\SiteView;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiteviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siteviews')->delete();
        $faker = Faker::create();
        echo "[Seed] Table 'siteviews'\n";
        foreach (range(1, 10) as $i) {
            SiteView::create([
                'date' => "2019-01-0$i",
                'users' => $i + 2,
                'views' => $i + 3,
                'pages' => $i + 4
            ]);
        }
    }
}
