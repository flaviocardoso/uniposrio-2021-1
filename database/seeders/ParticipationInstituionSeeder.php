<?php

namespace Database\Seeders;

use App\Models\ParticipationInstituion;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class ParticipationInstituionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module1 = 'M';
        $module2 = 'D';

        $instituions = [
            [
                'sigla' => 'CBPF',
                'nome' => 'Centro Brasileiro de Pesquisas Físicas'
            ],
            [
                'sigla' => 'UERJ',
                'nome' => 'Universidade do Estado do Rio de Janeiro'
            ],
            [
                'sigla' => 'UFF',
                'nome' => 'Universidade Federal Fluminense'
            ],
            [
                'sigla' => 'UFRJ',
                'nome' => 'Universidade Federal do Rio de Janeiro'
            ],
            [
                'sigla' => 'PUC-RIO',
                'nome' => 'Pontifíca Universidade Católica do Rio de Janeiro'
            ],
        ];

        ParticipationInstituion::create([ 'module' => $module1, 'instituions' => $instituions]);
        ParticipationInstituion::create([ 'module' => $module2, 'instituions' => $instituions]);

    }
}
