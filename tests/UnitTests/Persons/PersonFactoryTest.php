<?php

namespace Procob\Tests\UnitTests\Procob\Persons;

use \DateTimeImmutable;
use \Faker\Provider\pt_BR\Person as FakerPerson;
use \PHPUnit\Framework\TestCase;
use Procob\Persons\Person;
use Procob\Persons\PersonFactory;

class PersonFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function mustCreatePersonObjectCorrectlyFromArrayData()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new FakerPerson($faker));

        $data = [
            'documento' => $faker->cpf(false),
            'nome' => $faker->name(),
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
