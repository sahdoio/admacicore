<?php

use Illuminate\Database\Seeder;

class LetterTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\LetterTemplate::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'html' => '
                <p style="text - align:center"><p style="text-align: center;">##cidade_data##.&nbsp;</p>
                <br>
                <strong><p style="text-align: center;"><strong>CARTA DE RECOMENDAÇÃO</strong></p></strong></p>
                <br>
                <br><p style="text-align: center;">Prezados Senhores Pastores,
                Apresento-lhe o missionário/estudante ##nome## ##sobrenome##,
                participante do PROJETO MISSIONÁRIO INTERNACIONAL, que representa uma
                iniciativa interdenominacional de divulgação da cultura cristã em toda a América do
                Sul.&nbsp;</p>
                <br><p style="text-align: center;">Durante um curto período está desenvolvendo um programa de divulgação de
                cultura cristã, que visa melhorar a comunhão dom Deus, fortalecer a família e restaurar
                a visão missionária dos cristãos.
                Seu treinamento inclui um seminário sobre a Educação e a Influência da Mídia
                na vida das famílias cristãs.&nbsp;</p>
                <br><p style="text-align: center;">Pelo excelente resultado em minha igreja, recomendo a palestra e os materiais de
                apoio para todas as famílias de sua igreja.&nbsp;</p>
                <br>
                <br>
                <br><p style="text-align: center;">Atenciosamente,&nbsp;</p>
                <br>
                <br>
                <br>
                <p style="text - align:center"><p style="text-align: center;">Pastor da Igreja.&nbsp;</p>
                <br>
                <br><p style="text-align: center;">____________________________________________</p></p>
                        '
            ]);

        \App\Models\Member::whereNull('letter_template_id')
            ->update([
                'letter_template_id' => \App\Models\LetterTemplate::first()->id
            ]);
    }
}
