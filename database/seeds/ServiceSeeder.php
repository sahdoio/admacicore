<?php

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Icon;
use App\Models\Media;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
{
    private $images = [
        'https://palife.co.uk/wp-content/uploads/2017/08/team-motivation-teamwork-together-53958-1170x658.jpeg',
        'http://www.engineofimpact.org/wp-content/uploads/2018/02/Diagnostic-small-1-1024x683.jpeg',
        'http://jennystilwell.com.au/wp-content/uploads/2015/03/key.jpg',
        'http://londonheadhunters.co.uk/wp-content/uploads/2015/06/recruitmentlondon.jpg',
        'http://www.energyexperts.ca/wp-content/uploads/2016/11/training_class.jpg',        
        'https://www.oiltradinggroup.com/wp-content/uploads/2016/09/managing-risk-1068x712.jpg',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->delete();        
        
        $faker = Faker::create();

        echo "[Services] Seeding 'services' table\n";

        Service::create([
            'title' => 'Diagnóstico Organizacional',
            'short_description' => 'Diagnóstico da Liderança baseado nas necessidades da organização',
            'description' => 'Realizado de forma consistente e exclusiva de acordo com cada organização. Temos a disposição mais de 50 instrumentos diagnósticos confiáveis que auxiliam a identificar pontos fortes e oportunidades de melhoria de cada Líder individualmente.',
            'icon' => Icon::where('code', '=', 'bar-chart-o')->first()->id,
            'image' => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/uploads/image/2018/07/do.jpg',
                'category_id'       => 5 // service
            ])->id
        ]);

        Service::create([
            'title' => 'Laudos comportamentais para Líderes',
            'short_description' => 'A partir dos instrumentos aplicados, construimos um laudo individual para cada líder, indicando seus pontos fortes e oportunidades de melhoria.',
            'description' => 'A partir dos instrumentos aplicados, construimos um laudo individual para cada Líder, indicando seus pontos fortes e oportunidades de melhoria.',
            'icon' => Icon::where('code', '=', 'file-text')->first()->id,
            'image' => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/uploads/image/2018/07/lc.jpg',
                'category_id'       => 5 // service
            ])->id
        ]);     
        
        Service::create([
            'title' => 'Ferramentas de Feedback',
            'short_description' => 'Criação de ferramentas de feedback Líder e Liderados',
            'description' => 'Ferramentas construídas de forma prática, simples e exclusiva, de modo a fornecer ao Líder feedbacks tanto de seus Liderados quanto de seu Líder direto, com escala mensurável de evolução ao longo do tempo.',
            'icon' => Icon::where('code', '=', 'paper-plane')->first()->id,
            'image' => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/uploads/image/2018/07/ff.jpg',
                'category_id'       => 5 // service
            ])->id
        ]);  

        Service::create([
            'title' => 'Oficinas de Liderança',
            'short_description' => 'Mobilizamos pessoas para o desenvolvimento de habilidades interpessoais, que favoreçam ambientes saudáveis e sejam suporte para qualquer outra habilidade técnica específica.',
            'description' => 'Construídas com atividades práticas voltadas de forma exclusiva para as necessidades de cada organização de acordo com o diagnóstico inicial. As oficinas são dinâmicas, envolventes e sempre muito práticas, com tarefas “pós oficina” a serem realizadas a fim de consolidar o aprendizado e a necessária mudança de comportamentos.',
            'icon' => Icon::where('code', '=', 'group')->first()->id,
            'image' => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/uploads/image/2018/07/ol.jpg',
                'category_id'       => 5 // service
            ])->id
        ]);

        Service::create([
            'title' => 'Ferramentas de Evolução',
            'short_description' => 'Criação de ferramentas para medir a evolução dos Líderes no decorrer do tempo',
            'description' => 'Construídas para favorecer melhores resultados da Liderança após a aplicação das oficinas.',
            'icon' => Icon::where('code', '=', 'level-up')->first()->id,
            'image' => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/uploads/image/2018/07/fe.jpg',
                'category_id'       => 5 // service
            ])->id
        ]);

        Service::create([
            'title' => 'Ferramentas de Comunicação',
            'short_description' => 'Construção de ferramentas para reforçar a comunicação entre Líderes e Liderados',
            'description' => 'Construídas para fortalecer a comunicação entre Líderes & Liderados, além de reforçar os conceitos e práticas trabalhados nas oficinas de Liderança.',
            'icon' => Icon::where('code', '=', 'mail-reply')->first()->id,
            'image' => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/uploads/image/2018/07/fc.jpg',
                'category_id'       => 5 // service
            ])->id
        ]);        

        Service::create([
            'title' => 'Reconhecimento de Líderes',
            'short_description' => 'Implementação de atividades de reconhecimento dos Líderes que apresentarem melhores resultados',
            'description' => 'Implementação de atividaes e práticas de reconhecimento dos Líderes com maior destaque quanto ao atingimento de metas e atuação como Líder da equipe.',
            'icon' => Icon::where('code', '=', 'star-half-full')->first()->id,
            'image' => Media::create([
                'title'             => '',
                'subtitle'          => '',
                'url'               => '/uploads/image/2018/07/rl.jpg',
                'category_id'       => 5 // service
            ])->id
        ]); 

        /*
        // Random
        foreach(range(1, 12) as $i) {
            Service::create([
                'title' => $faker->word,
                'description' => $faker->text,
                'icon' => Icon::inRandomOrder()->first()->id,
                'image' => Media::where('category_id', '=', 5)->inRandomOrder()->first()->id,
            ]);
        }  
        */ 
    }
}
