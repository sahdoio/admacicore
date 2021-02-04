<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Icon;
use Faker\Factory as Faker;

class ContactSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();        
        
        $faker = Faker::create();

        echo "[Contacts] Seeding 'contacts' table\n";
        foreach(range(1, 25) as $i) {
            Contact::create([
                'cellphone'   => $faker->numerify('(##) #####-####'),
                'cellphone2'   => $faker->numerify('(##) #####-####'),
                'phone'       => $faker->numerify('(##) ####-####'),
                'phone2'       => $faker->numerify('(##) ####-####'),
                'email'       => $faker->companyEmail,
                'email2'       => $faker->companyEmail,
                'skype'       => $faker->name
            ]);
        }   
    }
}
