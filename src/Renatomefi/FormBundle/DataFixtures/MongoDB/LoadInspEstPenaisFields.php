<?php

namespace Renatomefi\UserBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Renatomefi\FormBundle\Document\Form;
use Renatomefi\FormBundle\Document\FormField;
use Renatomefi\TranslateBundle\DataFixtures\MongoDB\LoadLangs;
use Renatomefi\TranslateBundle\Document\Translation;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Carrega os campos do formulário INSPEÇÃO EM ESTABELECIMENTOS PENAIS LoadInspEstPenaisForm
 * Class LoadInspEstPenaisFields
 * @package Renatomefi\UserBundle\DataFixtures\MongoDB
 * @codeCoverageIgnore
 */
class LoadInspEstPenaisFields extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    protected static $fields = [
        // BEGIN page 1
        [
            'name' => '1',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Esfera'
            ],
            'options' => [
                'estadual' => 'Estadual',
                'federal' => 'Federal',
            ],
            'type' => 'select'
        ],
        [
            'name' => '2',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Secretaria da pasta'
            ],
            'options' => [
                'estadual' => 'Própria',
                'subsecretaria' => 'Subsecretaria',
                'diretoria/departamento' => 'Diretoria / Departamento',
                'superintendência' => 'Superintendência',
                'instituto/agência' => 'Instituto / Agência',
                'outro' => 'Outro',
            ],
            'type' => 'select'
        ],
        [
            'name' => '3',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Unidade do MP / Defensoria'
            ],
            'type' => 'text'
        ],
        [
            'name' => '4',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Tribunal de Justiça'
            ],
            'type' => 'text'
        ],
        [
            'name' => '5',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Grau de Jurisdição'
            ],
            'type' => 'text'
        ],
        [
            'name' => '6',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Comarca'
            ],
            'type' => 'text'
        ],
        [
            'name' => '7',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Escola Penitenciária Estadual?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '8',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Ouvidoria Estadual do Sistema Prisional?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '9',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Corregedoria Estadual do Sistema Prisional?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '10',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Plano de Carreira?'
            ],
            'options' => [
                'sim' => 'Sim', // Exibir: Todos os servidores penitenciarios , Agentes penitenciarios , Outro
                'não' => 'Não',
            ],
            'type' => 'radio'
        ],
        [
            'name' => '11',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Plano Estadual de Educação do Sistema Penitenciário?'
            ],
            'type' => 'boolean'
        ],
        // END page 1

        // BEGIN page 2
        [
            'name' => '1',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento'
            ],
            'type' => 'text'
        ],
        [
            'name' => '2',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Apelido da unidade'
            ],
            'type' => 'text'
        ],
        [
            'name' => '3',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Endereço'
            ],
            'type' => 'text'
        ],
        [
            'name' => '4',
            'page' => '2',
            'translate' => [
                'pt-br' => 'CEP'
            ],
            'type' => 'text'
        ],
        [
            'name' => '5',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Cidade/UF'
            ],
            'type' => 'text'
        ],
        [
            'name' => '6',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao recolhimento de presos provisórios'
            ],
            // helper  Ex: Cadeia Pública; Presídio; Centro de Detenção Provisória; Unidade de Recolhimento Provisório
            'type' => 'boolean'
        ],
        [
            'name' => '7',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao cumprimento de pena em regime fechado'
            ],
            // helper  Ex: Penitenciária
            'type' => 'boolean'
        ],
        [
            'name' => '8',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao cumprimento de pena em regime semiaberto'
            ],
            // helper Ex: Colônias agrícolas, industriais ou similares; Centro de Progressão Penitenciária; Unidade de Regime Semiaberto; Centro de Integração Social
            'type' => 'boolean'
        ],
        [
            'name' => '9',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao cumprimento de regime aberto ou de limitação de fim de semana'
            ],
            // helper Ex: Casa de Albergado
            'type' => 'boolean'
        ],
        [
            'name' => '10',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao cumprimento de medida de segurança de internação ou tratamento ambulatoria'
            ],
            // helper Ex: Hospital de Custódia e Tratamento Psiquiátrico
            'type' => 'boolean'
        ],
        [
            'name' => '11',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado a diversos tipos de regime'
            ],
            // helper Ex: Centro de Ressocialização
            'type' => 'boolean'
        ],
        [
            'name' => '12',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado à realização de exames gerais e criminológico'
            ],
            // helper Ex: Centro de Observação Criminológica e Triagem
            'type' => 'boolean'
        ],
        [
            'name' => '13',
            'page' => '2',
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'radio',
            'options' => [
                'masculino' => 'Masculino',
                'feminino' => 'Feminino',
                'misto' => 'Misto'
            ],
        ],
        // END page 2

        // BEGIN page 3
        [
            'name' => '1',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Gestão'
            ],
            'type' => 'multicheckbox',
            'options' => [
                'pública' => 'Pública',
                'terceirização de serviços complementares' => 'Terceirização de serviços complementares',
                'terceirização da equipe técnica e administrativa' => 'Terceirização da equipe técnica e administrativa',
                'terceirização da equipe de segurança' => 'Terceirização da equipe de segurança',
                'método APAC' => 'Método APAC',
            ]
        ],
        [
            'name' => '2',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Responsável pelo estabelecimento'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Cargo'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Formação Profissional'
            ],
            'type' => 'select',
            'options' => [
                'Direito' => 'Direito',
                'Ciências Sociais' => 'Ciências Sociais',
                'Psicologia' => 'Psicologia',
                'Pedagogia' => 'Pedagogia',
                'Administração' => 'Administração',
                'Serviço Social' => 'Serviço Social',
                'Outra' => 'Outra',
            ]
        ],

        [
            'name' => '5',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Responsável pela segurança'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Cargo'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Formação Profissional'
            ],
            'type' => 'select',
            'options' => [
                'direito' => 'Direito',
                'ciências sociais' => 'Ciências Sociais',
                'psicologia' => 'Psicologia',
                'pedagogia' => 'Pedagogia',
                'administração' => 'Administração',
                'serviço social' => 'Serviço Social',
                'outra' => 'Outra',
            ]
        ],
        [
            'name' => '8',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Quantidade de computadores'
            ],
            'type' => 'select',
            'options' => [
                '1 a 3' => '1 a 3',
                '4 a 6' => '4 a 6',
                '7 a 9' => '7 a 9',
                '10 a 12' => '10 a 12',
                '13 a 15' => '13 a 15',
                '+15' => '+15',
            ]
        ],
        [
            'name' => '9',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Acesso a internet'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Alimenta o INFOPEN'
            ],
            'type' => 'select',
            'options' => [
                'Integralmente' => 'Integralmente',
                'Parcialmente' => 'Parcialmente',
                'Não alimenta' => 'Não alimenta',
                'Mensal' => 'Mensal',
                'Trimestral' => 'Trimestral',
                'Semestral' => 'Semestral',
                'Anual' => 'Anual',
                'Outro' => 'Outro',
            ]
        ],
        [
            'name' => '11',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Regulamento interno da unidade/Estado'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '12',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Regulamento disciplinar penitenciário da unidade/Estado'
            ],
            'type' => 'boolean',
        ],
        //END page 3

        //BEGIN page 4
        [
            'name' => '1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Capacidade total'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Lotação total'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Condenada'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_1_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Provisória'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_2_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Condenada'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_2_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Provisória'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_3_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Condenada'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_3_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Provisória'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para diferentes regimes?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para presos provisórios e condenados?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para idosos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '7',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para mulheres, se for o caso?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para pessoas em medida de segurança?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '9',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para LGBT?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há local especial para cumprimento de seguro/custódia diferenciada?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há acessibilidade para pessoas com deficiência?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '12',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há celas metálicas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '13',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Número de celas individuais Homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Número de celas individuais Mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Lotação celas individuais Homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Lotação celas individuais Mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '17',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Dimensão'
            ],
            'type' => 'text',
        ],
        [
            'name' => '18',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Permeabilidade'
            ],
            'type' => 'select',
            'options' => [
                '1 a 3%',
                '3 a 5%',
                '5 a 10%',
                '>10%',
            ]
        ],
        [
            'name' => '19',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Ventilação cruzada geral'
            ],
            'type' => 'select',
            'options' => [
                'Insuficiente',
                'Suficiente',
                'Excessiva',
            ]
        ],
        [
            'name' => '20',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Ventilação cruzada nas celas'
            ],
            'type' => 'select',
            'options' => [
                'Insuficiente',
                'Suficiente',
                'Excessiva',
            ]
        ],
        [
            'name' => '21',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Iluminação natural nas celas'
            ],
            'type' => 'select',
            'options' => [
                'Inexistente',
                'Existente',
            ]
        ],
        [
            'name' => '22',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Incidência de sol nas celas'
            ],
            'type' => 'select',
            'options' => [
                'Insuficiente',
                'Suficiente',
                'Excessiva',
            ]
        ],
        [
            'name' => '23',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Programa de combate a incêndio'
            ],
            'type' => 'select',
            'options' => [
                'Inexistente',
                'Existente',
            ]
        ],
        [
            'name' => '24',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Extintores de incêndio'
            ],
            'type' => 'select',
            'options' => [
                'Insuficiente',
                'Suficiente',
            ]
        ],
        [
            'name' => '25',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Extintores de incêndio'
            ],
            'type' => 'select',
            'options' => [
                'Sem condições de uso',
                'Em condições de uso',
            ]
        ],
        [
            'name' => '26',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Construído ou ampliado com subvenção de recursos federais?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '27',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Reformado com subvenção de recursos federais?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '28',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Indicativos da atuação de facções no estabelecimento?'
            ],
            'type' => 'boolean',
            // Quais???
        ],

        //END page 4


        //BEGIN page 5
        [
            'name' => '1',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas com deficiência?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '2',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há notificação para Funai quanto ao ingresso do indígena?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '3',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há estrangeiros presos?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '4',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há adolescentes internados no local?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '5',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Os adolescentes estão separados dos adultos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Providências adotadas em relação à separação imediata e retirada do(s) adolescente(s)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com transtorno mental?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '8',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas em tratamento para dependência química?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '9',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Diabetes?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '10',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Hipertensão?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '11',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com HIV?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '12',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Hepatite?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '13',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Tuberculose?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '14',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Hanseníase?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '15',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas em RDD?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '16',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há presas gestantes?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '17',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há crianças permanecendo com suas mães presas?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        //END page 5

        //BEGIN page 6
        [
            'name' => '1',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Quantidade de pessoas cumprindo medida de internação'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Quantidade de pessoas cumprindo medida ambulatorial'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Pacientes com mais tempo de internação'
            ],
            'type' => 'select',
            'options' => [
                //Quantidade?
                'até 1 ano',
                'de 1 a 3 anos',
                'de 4 a 6 anos',
                'de 7 a 9 anos',
                'de 10 a 20 anos',
                'de 21 a 30 anos',
                'mais que 30 anos',
            ]
        ],
        [
            'name' => '4',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Há pacientes com alta médica?'
            ],
            'type' => 'boolean',
            //Quantidade?
        ],
        [
            'name' => '5',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Pacientes indultados no último ano'
            ],
            'type' => 'boolean',
            //Quantidade?
        ],
        [
            'name' => '6',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Pacientes encaminhados no último ano para'
            ],
            'type' => 'select',
            'options' => [
                'Centro de Atenção Psicossocial - CAPS',
                'Serviços Residenciais Terapêuticos -SRTs',
                'Programa de Volta para Casa – PVC',
                'Outro',
            ]
        ],
        [
            'name' => '7',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Periodicidade do exame de cessação de periculosidade'
            ],
            'type' => 'select',
            'options' => [
                'Centro de Atenção Psicossocial - CAPS',
                'Serviços Residenciais Terapêuticos -SRTs',
                'Programa de Volta para Casa – PVC',
                'Outro',
            ]
        ],
        //END page 6

        //BEGIN page 7

        [
            'name' => '1',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Total de RH na área de segurança'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Total de RH na área administrativa'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Total de RH na área técnica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Total Geral'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Advogados / Defensores Públicos alocados na unidade'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '6',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Auxiliares de Enfermagem'
            ],
            'type' => 'boolean',
            /**
             *   <!-- Quantidade ?-->
             * <option value="SUAS">SUAS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '7',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Assistentes Sociais'
            ],
            'type' => 'boolean',
            /**
             *            <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '8',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Dentistas'
            ],
            'type' => 'boolean',
            /**
             *           <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '9',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Enfermeiros'
            ],
            'type' => 'boolean',
            /**
             *           <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '10',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Médicos - Clínico Geral'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '11',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Médicos - Psiquiatras'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '12',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Médicos - Ginecologista'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '13',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Pedagogos'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="Secretaria de Educação">Secretaria de Educação</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '14',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Psicólogos'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="SUAS">SUAS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '15',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Terapeutas Ocupacionais'
            ],
            'type' => 'boolean',
            /**
             *             <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '16',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Outros'
            ],
            'type' => 'select',
            /**
             * <!-- Quantidade ?-->
             * <option value="Própria Unidade">Própria Unidade</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</optio
             */
        ],
        [
            'name' => '17',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Agentes Prisionais'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="homens">homens</option>
             * <option value="mulheres">mulheres</option>
             */
        ],
        [
            'name' => '18',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Escala de trabalho'
            ],
            'type' => 'text',
        ],
        [
            'name' => '19',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Há utilização de uniforme?'
            ],
            'type' => 'boolean',
            /**
             * <option value="Com identificação pessoal">Com identificação pessoal</option>
             */
        ],
        [
            'name' => '20',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Quais os tipos de cursos ocorrem para o treinamento dos agentes?'
            ],
            'type' => 'select',
            'options' => [
                'Curso de Formação',
                'Cursos Especiais',
            ]
        ],

        //END page 7

        //BEGIN page 8
        [
            'name' => '1',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há camas e colchões para todos os presos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de uniformes?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '3',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de calçados?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '4',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de roupas de cama?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de toalhas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Periodicidade de substituição do material entregue'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de artigos de higiene pessoal?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de artigos de limpeza?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '9',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de absorventes para as mulheres?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica'
            ]
        ],
        [
            'name' => '10',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de fraldas, se for o caso?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica'
            ]
        ],
        [
            'name' => '11',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há local destinado à venda de produtos e objetos permitidos e não fornecidos pela administração? Descrever como é feito o pagamento, controle de preços e destino da receita:'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '12',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Descrever a mobília que compõe as celas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '13',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há sanitário e lavatório em todas as celas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '14',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Caso não haja instalações sanitárias na cela, como é garantido o acesso aos banheiros externos?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15',
            'page' => '8',
            'translate' => [
                'pt-br' => 'É garantido o acesso ao banheiro no período noturno?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '16',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Número de pessoas por vaso sanitário'
            ],
            'type' => 'text',
        ],
        [
            'name' => '17',
            'page' => '8',
            'translate' => [
                'pt-br' => 'É garantido a qualquer momento o uso da descarga do vaso sanitário?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '18',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há privacidade para uso das instalações sanitárias?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '19',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Número de pessoas por chuveiro'
            ],
            'type' => 'text',
        ],
        [
            'name' => '20',
            'page' => '8',
            'translate' => [
                'pt-br' => 'É garantido o banho diário?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '21',
            'page' => '8',
            'translate' => [
                'pt-br' => 'A água é aquecida?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '22',
            'page' => '8',
            'translate' => [
                'pt-br' => 'É fornecida água potável?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '23',
            'page' => '8',
            'translate' => [
                'pt-br' => 'A água é racionada?'
            ],
            'type' => 'boolean',
            //Qual a frequência e duração oferecida?
        ],
        [
            'name' => '24',
            'page' => '8',
            'translate' => [
                'pt-br' => 'A água é racionada?'
            ],
            'type' => 'select',
            'options' => [
                'Hidráulico',
                'Elétrica',
                'Edificação',
                'Outros',
            ]
        ],
        //END page 8

        //BEGIN page 9
        [
            'name' => '1',
            'page' => '9',
            'translate' => [
                'pt-br' => 'A alimentação é preparada na própria unidade?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '2',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Em caso negativo, de onde provém Qual o custo diário da alimentação por preso?'
            ],
            'type' => 'text'
        ],
        [
            'name' => '3',
            'page' => '9',
            'translate' => [
                'pt-br' => 'O cardápio é orientado por nutricionista?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '4',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Qual a quantidade de alimentação fornecida no almoço e janta à pessoa presa (peso)?'
            ],
            'type' => 'text'
        ],
        [
            'name' => '5',
            'page' => '9',
            'translate' => [
                'pt-br' => 'N.º de refeições diárias'
            ],
            'type' => 'text'
        ],
        [
            'name' => '6',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Horários das refeições'
            ],
            'type' => 'text'
        ],
        [
            'name' => '7',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Onde as refeições são realizadas?'
            ],
            'type' => 'select',
            'options' => [
                'Celas',
                'Refeitorio',
                'Outro',
            ]
        ],
        [
            'name' => '8',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Há controle de qualidade?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '9',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Descrever o controle'
            ],
            'type' => 'text',
        ],
        [
            'name' => '10',
            'page' => '9',
            'translate' => [
                'pt-br' => 'As refeições são'
            ],
            'type' => 'select',
            'options' => [
                'Padronizadas',
                // <!-- adaptadas por motivos de -->
                'Saúde',
                'Religiosos',
                'Outros',
            ]
        ],
        [
            'name' => '11',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Os presos deslocados para audiências e outras atividades externas recebem alimentação e água potável quando saem e quando retornam, independentemente do horário?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '12',
            'page' => '9',
            'translate' => [
                'pt-br' => 'As refeições são'
            ],
            'type' => 'select',
            'options' => [
                'Família',
                'Compra',
                'Outro',
            ]
        ],
        //END page 9

        //BEGIN page 10
        [
            'name' => '1',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo diário dentro da cela'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de pátio de sol'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de visita'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de atividades educacionais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de atividades laborais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de atividades religiosas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de visita íntima'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de atividades esportivas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo das atividades culturais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '10',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Há programa individualizado para o cumprimento da pena?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Quais profissionais participam da elaboração do programa'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Trimestral',
                'Semestral',
                'Outro',
            ]
        ],
        [
            'name' => '12',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Quais profissionais participam da elaboração do programa'
            ],
            'type' => 'text',
        ],
        [
            'name' => '13',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Descreva os procedimentos para elaboração do programa individualizado'
            ],
            'type' => 'text',
        ],
        //END page 10

        //BEGIN page 11
        [
            'name' => '1',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Existe unidade básica de saúde do SUS?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Está integrado à Rede Cegonha do SUS?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '3',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há distribuição de preservativos?'
            ],
            'type' => 'boolean',
            //frequencia
        ],
        [
            'name' => '4',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há acesso às medicações definidas pelo SUS para farmácias de unidades prisionais?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há acesso às medicações prescritas que não estão no pacote SUS?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há exames e consultas de ingresso?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '7',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há pré-natal para presas gestantes?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há vacinação regular?'
            ],
            'type' => 'boolean',
            // Se sim, quais vacinas são oferecidas?
        ],
        [
            'name' => '9',
            'page' => '11',
            'translate' => [
                'pt-br' => 'As pessoas presas têm acesso a médico particular, caso haja a contratação deste profissional por seus familiares?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10',
            'page' => '11',
            'translate' => [
                'pt-br' => 'As pessoas presas têm acesso aos exames médicos necessários?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Quais trabalhos são realizados para prevenção ou controle de doenças infecto-contagiosas?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '12',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há ambulância na unidade?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '13',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Para que estabelecimentos da rede de saúde as pessoas presas tem acesso, quando necessário?'
            ],
            'type' => 'select',
            'options' => [
                'Unidade Básica de Saúde – UBS',
                'Unidade de Pronto Atendimento – UPA',
                'Hospital',
                'Centro de Atendimento Psicossocial – CAPS',
                'Outro',
            ]
        ],
        //END page 11

        //BEGIN page 12
        //END page 12

        //BEGIN page 13
        [
            'name' => '1',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Às pessoas presas sem condições financeiras é proporcionada assistência jurídica gratuita e permanente?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Em caso positivo, por quem é prestada a assistência?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '13',
            'translate' => [
                'pt-br' => 'A Funai presta assistência jurídica aos presos/internos indígenas?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica',
            ]
        ],
        [
            'name' => '4',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Onde é realizado o contato entre a pessoa presa e o advogado?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '13',
            'translate' => [
                'pt-br' => 'A Defensoria Pública do Estado comparece com regularidade?'
            ],
            'type' => 'boolean',
            // Periodicidade
        ],
        [
            'name' => '6',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Saídas temporárias'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Livramento condicional'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Progressões'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Indulto'
            ],
            'type' => 'text',
        ],
        //END page 13

        //BEGIN page 14
        [
            'name' => '1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Há oficinas de trabalho?'
            ],
            'type' => 'boolean',
            // Quantidade
        ],
        [
            'name' => '2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantas das oficinas são administradas pelo estabelecimento?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantas das oficinas são administradas em parceria com a iniciativa privada?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Total de presos ou internos com permissão para trabalho externo'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Há avaliação das aptidões e capacidades do preso para sua alocação em determinado trabalho?'
            ],
            'type' => 'boolean',
            // Em caso positivo, como essa avaliação é realizada?
        ],
        [
            'name' => '7',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Há avaliação e estímulo ao crescimento profissional que permita a qualificação ou diversificação do trabalho?'
            ],
            'type' => 'boolean',
            // Em caso positivo, descreva
        ],
        //END page 14

        //BEGIN page 15
        [
            'name' => '2',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Alfabetização'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'ensino fundamental'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'ensino médio'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'profissionalizante'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '15',
            'translate' => [
                'pt-br' => 'outros'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Especificar'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Os cursos são ministrados por'
            ],
            'type' => 'select',
            'options' => [
                'Professores do Sistema Penitenciário Estadual',
                'Professores da Secretaria Estadual de Educação',
                'Professores da Secretaria Municipal de Educação',
                'Presos monitores',
                'Voluntários',
                'Outros professores', // Especificar
            ]
        ],
        [
            'name' => '9',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Há atividades esportivas?'
            ],
            'type' => 'boolean',
            // Quais / Onde
        ],
        [
            'name' => '10',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Há atividades culturais/lazer?'
            ],
            'type' => 'boolean',
            // Quais / Onde
        ],
        [
            'name' => '11',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Se há biblioteca, como funciona o acesso das pessoas presas aos livros'
            ],
            'type' => 'text',
        ],
        //END page 15

    ];


    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Return field name
     * @param array $field
     * @return string
     */
    private static function getFieldName(array $field)
    {
        $name = '';

        if (array_key_exists('page', $field)) {
            $name .= $field['page'] . '_';
        }

        $name .= $field['name'];

        return $name;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $documentManager = $this->container->get('doctrine_mongodb.odm.document_manager');

        /** @var Form $form */
        $form = $this->getReference(LoadInspEstPenaisForm::NAME);

        $fieldPrefix = 'form-' . $form->getName();

        foreach (self::$fields as $field) {
            $formField = new FormField();
            $formField->setForm($form);

            $formField->setName(self::getFieldName($field));

            if (array_key_exists('options', $field)) {
                $formField->setOptions($field['options']);
            }

            $documentManager->persist($formField);
            unset($formField);

            $translation = new Translation();
            $translation->setKey($fieldPrefix . '-field-' . self::getFieldName($field));
            $translation->setLanguage($this->getReference(LoadLangs::$reference_prefix . 'pt-br'));
            $translation->setValue($field['translate']['pt-br']);
            $documentManager->persist($translation);

            unset($translation);
        }

        $documentManager->flush();

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 5;
    }
}