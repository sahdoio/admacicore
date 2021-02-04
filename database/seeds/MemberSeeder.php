<?php

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Address;
use App\Models\Contact;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->delete();
        $faker = Faker::create();
        echo "[Seed] Table 'members'\n";
        foreach(range(1, 80) as $i) {
            Member::create([
                'name'              => $faker->firstName,
                'lastname'          => $faker->lastName,
                'jobtitle'          => $faker->jobTitle,
                'address_id' => Address::create([
                    'cep'        => $faker->numerify('#####-###'),
                    'street'     => $faker->streetName,
                    'number'     => $faker->buildingNumber(),
                    'district'   => $faker->word,
                    'state'      => $faker->state,
                    'city'       => $faker->city,
                    'country'    => 'Brasil',
                ])->id,
                'contact_id' => Contact::create([
                    'cellphone'   => $faker->numerify('(##) #####-####'),
                    'cellphone2'  => $faker->numerify('(##) #####-####'),
                    'phone'       => $faker->numerify('(##) ####-####'),
                    'phone2'      => $faker->numerify('(##) ####-####'),
                    'email'       => $faker->companyEmail,
                    'email2'      => $faker->companyEmail,
                    'skype'       => $faker->firstName
                ])->id,
            ]);
        }
    }
}
