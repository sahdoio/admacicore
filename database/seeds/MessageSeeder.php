<?php

use Illuminate\Database\Seeder;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->delete();
        $faker = Faker::create();
        echo "[Seed] Table 'messages'\n";
        foreach (range(1, 5) as $i) {
            foreach (range(1, $i) as $j) {
                Message::create([
                    'name' => "Faker",
                    'email_from' => 'contato@admanicore.com',
                    'email_to' => 'teste@teste.com',
                    'subject' => 'Teste',
                    'message' => 'Mensagem de teste',
                    'date' => "2019-01-0$i",
                ]);
            }
        }
    }
}
