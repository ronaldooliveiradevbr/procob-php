<?php

namespace Procob\Tests\UnitTests\Procob;

use \Faker\Provider\pt_BR\Company;
use \Faker\Provider\pt_BR\Person;
use \InvalidArgumentException;
use \PHPUnit\Framework\TestCase;
use Procob\Procob;
use Procob\Persons\PersonGateway;

class ProcobTest extends TestCase
{
    public function setUp()
    {
        $this->credentials = [
            getenv('PROCOB_USER'),
            getenv('PROCOB_PASS')
        ];

        $this->apiKey = base64_encode(
            implode(':', $this->credentials)
        );
    }

    public function assertPreConditions()
    {
        $this->assertTrue(
            class_exists($class = Procob::class),
            sprintf(
                'Class not found: %s',
                print_r($class, true)
            )
        );
    }

    public function testAuthenticationWithValidApiTokenMustWork()
    {
        $procob = new Procob($this->apiKey);

        $this->assertInstanceOf(Procob::class, $procob);
    }

    public function testAuthenticationWithValidCredentialsArrayWork()
    {
        $procob = new Procob($this->credentials);

        $this->assertInstanceOf(Procob::class, $procob);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testAuthenticationWithInvalidCredentialsMustThrowAnException()
    {
        $invalidCredentials = [
            123456789,
            ['abc'],
            ['abc', 'dev', 123]
        ];

        $procob = new Procob(
            $invalidCredentials[mt_rand(0, 2)]
        );
    }

    /**
     * @depends testAuthenticationWithValidApiTokenMustWork
     */
    public function testCallingTestEndpointShouldReturnCode000()
    {
        $procob = new Procob($this->apiKey);

        $response = $procob->send(
            'GET',
            'https://api.procob.com/consultas/teste'
        );

        $this->assertEquals('000', $response['code']);
    }

    /**
     * @depends testAuthenticationWithValidApiTokenMustWork
     */
    public function testSearchByCpfShouldRetrieveCustomerName()
    {
        $procob = new Procob($this->apiKey);

        $faker = \Faker\Factory::create();
        $faker->addProvider(new Person($faker));

        $uri = 'L0001/' . $faker->cpf(false);
        $response = $procob->send('GET', $uri);

        $this->assertArrayHasKey(
            'nome',
            $response['content']
        );
    }

    /**
     * @depends testAuthenticationWithValidApiTokenMustWork
     */
    public function testSearchByCnpjShouldRetrieveCompanyName()
    {
        $procob = new Procob($this->apiKey);

        $faker = \Faker\Factory::create();
        $faker->addProvider(new Company($faker));

        $uri = 'L0001/' . $faker->cnpj(false);
        $response = $procob->send('GET', $uri);

        $this->assertArrayHasKey(
            'nome',
            $response['content']
        );
    }

    /**
     * @test
     */
    public function mustReturnPersonGatewayObject()
    {
        $procob = $this->getMockBuilder(Procob::class)
            ->disableOriginalConstructor()
            ->getMock();

        $personGateway = $this->getMockBuilder(PersonGateway::class)
            ->disableOriginalConstructor()
            ->getMock();

        $procob->method('person')
            ->willReturn($personGateway);

        $this->assertInstanceOf(
            PersonGateway::class,
            $procob->person()
        );
    }
}
