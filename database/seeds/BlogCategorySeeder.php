<?php

use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BlogCategory::create([
            'name' => 'Eventos'
        ]);

        \App\Models\BlogCategory::create([
            'name' => 'Notícias'
        ]);

        \App\Models\BlogCategory::create([
            'name' => 'Novidades'
        ]);

        \App\Models\BlogCategory::create([
            'name' => 'Avisos'
        ]);

        \App\Models\BlogCategory::create([
            'name' => 'Dia a Dia'
        ]);
    }
}
