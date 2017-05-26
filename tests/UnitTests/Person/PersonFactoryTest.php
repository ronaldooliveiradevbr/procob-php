<?php

namespace Procob\Tests\UnitTests\Procob\Person;

use \DateTimeImmutable;
use Procob\Person\Person;
use Procob\Person\PersonFactory;
use \Faker\Provider\pt_BR\Person as FakerPerson;
use \PHPUnit\Framework\TestCase;

class PersonFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function mustCreatePersonObjectCorrectlyFromArray()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new FakerPerson($faker));

        $data = [
            'documento'             => $faker->cpf(false),
            'nome'                  => $faker->name(),
            'data_nascimento'       => '10/01/1976',
            'idade'                 => mt_rand(0, 100),
            'signo'                 => "Áries",
            'obito'                 => "NAO",
            'sexo'                  => "M",
            'uf'                    => "SP",
            'situacao_receita'      => 'IRREGULAR',
            'situacao_receita_data' => '2017-01-01',
            'situacao_receita_hora' => "00:00:00"
        ];

        $this->assertInstanceOf(
            Person::class,
            $person = PersonFactory::create($data)
        );

        $this->assertEquals(
            $data['documento'],
            $person->getDocument()
        );
        $this->assertEquals(
            $data['nome'],
            $person->getName()
        );
    }
}
