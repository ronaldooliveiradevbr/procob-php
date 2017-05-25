<?php

namespace Procob\Tests\UnitTests\Procob\Persons;

use \Faker\Provider\pt_BR\Person as FakerPerson;
use \PHPUnit\Framework\TestCase;
use Procob\Procob;
use Procob\Persons\Person;
use Procob\Persons\PersonFactory;
use Procob\Persons\PersonGateway;

class PersonGatewayTest extends TestCase
{
    public function setUp()
    {
        $this->procob = $this->getMockBuilder(Procob::class)
            ->disableOriginalConstructor()
            ->getMock();

        $personGateway = $this->getMockBuilder(PersonGateway::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->procob->method('person')
            ->willReturn($personGateway);

        $faker = \Faker\Factory::create();
        $faker->addProvider(new FakerPerson($faker));

        $data = [
            'documento' => $faker->cpf(false),
            'nome' => $faker->name()
        ];

        $personGateway->method('find')->willReturn(
            PersonFactory::create($data)
        );
    }

    public function testFetchByCpfMustReturnPersonObject()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new FakerPerson($faker));

        $cpf = $faker->cpf(false);

        $person = $this->procob->person()->find($cpf);

        $this->assertInstanceOf(Person::class, $person);

        $this->assertNotEmpty($person->getName());
    }
}
