<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = Area::create([
            'areaprincipal' => 'Ar-condicionado'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Fornecer e instalar ar-condicionado']);
        $area->especifica()->create(['areaespecifica' => 'Instalar ar-condicionado']);
        $area->especifica()->create(['areaespecifica' => 'Instalar ar-condicionado central']);
        $area->especifica()->create(['areaespecifica' => 'Reparar ar-condicionado']);
        $area->especifica()->create(['areaespecifica' => 'Manutenção de ar-condicionado']);

        $area = Area::create([
            'areaprincipal' => 'Arquiteto'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Projeto arquitetônico para residência']);
        $area->especifica()->create(['areaespecifica' => 'Outros trabalhos arquitetônicos']);
        $area->especifica()->create(['areaespecifica' => 'Projeto arquitetônico comercial']);
        $area->especifica()->create(['areaespecifica' => 'Projeto de reforma']);
        $area->especifica()->create(['areaespecifica' => 'Acompanhamento de obra']);

        $area = Area::create([
            'areaprincipal' => 'Assoalho'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Instalar assoalho']);
        $area->especifica()->create(['areaespecifica' => 'Lixar e envernizar assoalho']);
        $area->especifica()->create(['areaespecifica' => 'Instalar piso de tacos']);
        $area->especifica()->create(['areaespecifica' => 'Instalar piso laminado']);
        $area->especifica()->create(['areaespecifica' => 'Conserto de piso de tacos']);
        $area->especifica()->create(['areaespecifica' => 'Conserto de piso laminado']);

        $area = Area::create([
            'areaprincipal' => 'Câmeras de segurança'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Manutenção']);
        $area->especifica()->create(['areaespecifica' => 'Instalação em local comercial']);
        $area->especifica()->create(['areaespecifica' => 'Instalação em local residencial']);
        $area->especifica()->create(['areaespecifica' => 'Instalação em condomínio']);

        $area = Area::create([
            'areaprincipal' => 'Engenheiro'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Certificado de inspeção elétrica']);
        $area->especifica()->create(['areaespecifica' => 'Projeto estrutural']);
        $area->especifica()->create(['areaespecifica' => 'Projeto para instalações']);
        $area->especifica()->create(['areaespecifica' => 'Inspeção técnica predial']);
        $area->especifica()->create(['areaespecifica' => 'Laudos e licenças']);
        $area->especifica()->create(['areaespecifica' => 'Inspeção técnica residencial']);
        $area->especifica()->create(['areaespecifica' => 'Projeto de instalação elétrica']);
        $area->especifica()->create(['areaespecifica' => 'Projeto de instalação hidráulica']);

        $area = Area::create([
            'areaprincipal' => 'Jardinagem'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Criar jardim']);
        $area->especifica()->create(['areaespecifica' => 'Limpar jardim']);
        $area->especifica()->create(['areaespecifica' => 'Plantar gramado']);
        $area->especifica()->create(['areaespecifica' => 'Podar ou retirar árvores']);

        $area = Area::create([
            'areaprincipal' => 'Eletricista'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Instalação elétrica']);
        $area->especifica()->create(['areaespecifica' => 'Reforma de instalação elétrica']);
        $area->especifica()->create(['areaespecifica' => 'Instalação elétrica parcial']);
        $area->especifica()->create(['areaespecifica' => 'Telecomunicações']);

        $area = Area::create([
            'areaprincipal' => 'Telhados'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Reforma de telhado em casa']);
        $area->especifica()->create(['areaespecifica' => 'Reforma de telhado em edifício']);
        $area->especifica()->create(['areaespecifica' => 'Retelhar telhado']);
        $area->especifica()->create(['areaespecifica' => 'Instalar claraboia']);
        $area->especifica()->create(['areaespecifica' => 'Instalar telhas']);
        $area->especifica()->create(['areaespecifica' => 'Instalar calhas']);

        $area = Area::create([
            'areaprincipal' => 'Vidraçaria'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Instalar fechamento de vidro']);
        $area->especifica()->create(['areaespecifica' => 'Instalar vidros']);
        $area->especifica()->create(['areaespecifica' => 'Instalar vidro blindado']);
        $area->especifica()->create(['areaespecifica' => 'Divisória de vidro']);
        $area->especifica()->create(['areaespecifica' => 'Instalar box em banheiro']);
        $area->especifica()->create(['areaespecifica' => 'Instalar espelho']);
        $area->especifica()->create(['areaespecifica' => 'Manutenção de vidros']);

        $area = Area::create([
            'areaprincipal' => 'Pintura'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Lacar madeira']);
        $area->especifica()->create(['areaespecifica' => 'Pintura interior de residência']);
        $area->especifica()->create(['areaespecifica' => 'Pintura exterior de residência']);
        $area->especifica()->create(['areaespecifica' => 'Pintura interior de condomínio']);
        $area->especifica()->create(['areaespecifica' => 'Pintura exterior de condomínio']);
        $area->especifica()->create(['areaespecifica' => 'Pintura decorativa']);
        $area->especifica()->create(['areaespecifica' => 'Aplicação de textura / grafiato']);
        $area->especifica()->create(['areaespecifica' => 'Colocação de papel de parede']);
        $area->especifica()->create(['areaespecifica' => 'Pintura de local comercial']);
        $area->especifica()->create(['areaespecifica' => 'Reparos e massa corrida']);

        $area = Area::create([
            'areaprincipal' => 'Restaurar fachadas'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Restaurar fachada residencial']);
        $area->especifica()->create(['areaespecifica' => 'Restaurar fachada de edifício']);
        $area->especifica()->create(['areaespecifica' => 'Manutenção de rachaduras']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza de fachada']);
        $area->especifica()->create(['areaespecifica' => 'Projeto de restauração de fachada']);

        $area = Area::create([
            'areaprincipal' => 'Limpeza'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Limpeza de tanques']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza de residência']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza de prédio']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza de escritório']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza de local comercial']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza de galpão industrial']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza de vidros']);
        $area->especifica()->create(['areaespecifica' => 'Diarista']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza pós-obra']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza pré ou pós-mudança']);
        $area->especifica()->create(['areaespecifica' => 'Limpeza e desinfecção de local comercial']);

        $area = Area::create([
            'areaprincipal' => 'Marceneiros'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Instalar carpintaria de madeira']);
        $area->especifica()->create(['areaespecifica' => 'Reformar carpintaria de madeira']);
        $area->especifica()->create(['areaespecifica' => 'Portas de madeira']);
        $area->especifica()->create(['areaespecifica' => 'Móveis sob medida']);
        $area->especifica()->create(['areaespecifica' => 'Trabalhos de marcenaria']);

        $area = Area::create([
            'areaprincipal' => 'Pedreiros'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Construir churrasqueira']);
        $area->especifica()->create(['areaespecifica' => 'Colocar pisos']);
        $area->especifica()->create(['areaespecifica' => 'Rebocar paredes']);
        $area->especifica()->create(['areaespecifica' => 'Construir escada']);
        $area->especifica()->create(['areaespecifica' => 'Fazer contrapiso']);

        $area = Area::create([
            'areaprincipal' => 'Construção de casas'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Projeto e construção']);
        $area->especifica()->create(['areaespecifica' => 'Construção']);
        $area->especifica()->create(['areaespecifica' => 'Ampliação']);
        $area->especifica()->create(['areaespecifica' => 'Garagem']);
        $area->especifica()->create(['areaespecifica' => 'Laje']);

        $area = Area::create([
            'areaprincipal' => 'Piscinas'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Construir piscina de fibra']);
        $area->especifica()->create(['areaespecifica' => 'Construir piscina de concreto armado']);
        $area->especifica()->create(['areaespecifica' => 'Construir piscina de vinil']);
        $area->especifica()->create(['areaespecifica' => 'Construir piscina de alvenaria estrutural']);
        $area->especifica()->create(['areaespecifica' => 'Construir piscina com outros materiais']);
        $area->especifica()->create(['areaespecifica' => 'Reforma']);
        $area->especifica()->create(['areaespecifica' => 'Revestir com outros materiais']);
        $area->especifica()->create(['areaespecifica' => 'Detectar vazamento']);
        $area->especifica()->create(['areaespecifica' => 'Trocar vinil']);

        $area = Area::create([
            'areaprincipal' => 'Casas pré-fabricadas'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Casa de concreto']);
        $area->especifica()->create(['areaespecifica' => 'Casa de madeira']);
        $area->especifica()->create(['areaespecifica' => 'Casa de aço']);
        $area->especifica()->create(['areaespecifica' => 'Casa de outros materiais']);

        $area = Area::create([
            'areaprincipal' => 'Galpões industriais'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Projetar e construir']);
        $area->especifica()->create(['areaespecifica' => 'Construir']);
        $area->especifica()->create(['areaespecifica' => 'Ampliar']);
        $area->especifica()->create(['areaespecifica' => 'Construir estrutura metálica']);
        $area->especifica()->create(['areaespecifica' => 'Construir pré-moldado']);

        $area = Area::create([
            'areaprincipal' => 'Elevador'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Instalar elevador em edifício']);
        $area->especifica()->create(['areaespecifica' => 'Instalar elevador PCD']);
        $area->especifica()->create(['areaespecifica' => 'Manutenção']);
        $area->especifica()->create(['areaespecifica' => 'Substituição']);
        $area->especifica()->create(['areaespecifica' => 'Instalar cadeira elevatória']);
        $area->especifica()->create(['areaespecifica' => 'Instalar monta-cargas']);
        $area->especifica()->create(['areaespecifica' => 'Instalar elevador em casa']);

        $area = Area::create([
            'areaprincipal' => 'Gás'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Instalação de gás']);
        $area->especifica()->create(['areaespecifica' => 'Reforma de instalação de gás residência']);
        $area->especifica()->create(['areaespecifica' => 'Reforma de instalação de gás condomínio']);
        $area->especifica()->create(['areaespecifica' => 'Manutenção']);
        $area->especifica()->create(['areaespecifica' => 'Conserto de instalação']);

        $area = Area::create([
            'areaprincipal' => 'Painéis solares'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Placa solar']);
        $area->especifica()->create(['areaespecifica' => 'Manutenção de placa solar']);
        $area->especifica()->create(['areaespecifica' => 'Aquecedor solar']);
        $area->especifica()->create(['areaespecifica' => 'Manutenção de aquecedor solar']);

        $area = Area::create([
            'areaprincipal' => 'Drywall'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Instalação em residência']);
        $area->especifica()->create(['areaespecifica' => 'Instalação em local comercial']);
        $area->especifica()->create(['areaespecifica' => 'Instalar divisórias de drywall']);
        $area->especifica()->create(['areaespecifica' => 'Móveis de drywall']);

        $area = Area::create([
            'areaprincipal' => 'Mudanças'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Realizar mudanças']);
        $area->especifica()->create(['areaespecifica' => 'Realizar mudanças interestaduais']);

        $area = Area::create([
            'areaprincipal' => 'Topografia'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Levantamento topográfico']);
        $area->especifica()->create(['areaespecifica' => 'Desmembramento de lote']);

        $area = Area::create([
            'areaprincipal' => 'Desing de interiores'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Projeto de decoração de residência']);
        $area->especifica()->create(['areaespecifica' => 'Projeto de decoração de local comercial']);
        $area->especifica()->create(['areaespecifica' => 'Projeto de iluminação']);

        $area = Area::create([
            'areaprincipal' => 'Construção de edifícios'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Projeto e construção de edifício residencial']);
        $area->especifica()->create(['areaespecifica' => 'Construção de edifício residencial']);
        $area->especifica()->create(['areaespecifica' => 'Projeto e construção de edifício comercial']);
        $area->especifica()->create(['areaespecifica' => 'Construção de edifício comercial']);

        $area = Area::create([
            'areaprincipal' => 'Controle de pragas'
        ]);
        $area->especifica()->create(['areaespecifica' => 'Controle de aves']);
        $area->especifica()->create(['areaespecifica' => 'Desinfetar']);
        $area->especifica()->create(['areaespecifica' => 'Desratizar']);
        $area->especifica()->create(['areaespecifica' => 'Dedetização']);

    }
}
