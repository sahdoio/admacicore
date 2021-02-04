<?php

use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\Icon;
use Faker\Factory as Faker;

class AddressSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->delete();        
        
        $faker = Faker::create();

        echo "[Address] Seeding 'addresses' table\n";
        foreach(range(1, 25) as $i) {
            Address::create([
                'cep'        => $faker->numerify('#####-###'),
                'street'     => $faker->streetName,
                'number'     => $faker->buildingNumber(),
                'district'   => $faker->word,
                'state'      => $faker->state,
                'city'       => $faker->city,
                'country'    => 'Brasil',
            ]);
        }   
    }
}
