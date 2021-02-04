<?php

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Media;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->delete();        
        
        $faker = Faker::create();       

        echo "[Clients] Seeding 'clients' table\n";
        foreach(range(1, 35) as $i) {  
            Client::create([
                'name' => $faker->name,
                'lastname' => $faker->lastName,
                'company_name' => $faker->company,                
                'website' => $faker->domainName,
                'contact' => Contact::inRandomOrder()->first()->id,
                'address' => Address::inRandomOrder()->first()->id,
                'image' => Media::where('category_id', '=', 4)->inRandomOrder()->first()->id,
            ]);
        }   
    }
}
