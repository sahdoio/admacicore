<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UserSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(MediaCategorySeeder::class);
        $this->call(MediaTypeSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(SiteInfoSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(IconSeeder::class);
        $this->call(ServiceSeeder::class);  
        $this->call(JobSeeder::class);  
        $this->call(JobMediaSeeder::class);   
        $this->call(TeamSeeder::class);    
        $this->call(SiteviewsSeeder::class);  
        $this->call(MemberSeeder::class);
        $this->call(SiteViewSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(BlogPostSeeder::class);
        $this->call(DepartmentSeeder::class);
    }
}
