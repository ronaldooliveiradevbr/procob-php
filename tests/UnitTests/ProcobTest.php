<?php

namespace Procob\Tests\UnitTests\Procob;

use Procob\Procob;
use Procob\Response;
use Procob\Request\TestGet;
use Procob\Person\PersonGateway;
use \Faker\Provider\pt_BR\Company;
use \Faker\Provider\pt_BR\Person;
use \PHPUnit\Framework\TestCase;

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

    /**
     * @test
     */
    public function mustAuthenticateWithApiToken()
    {
        $procob = new Procob($this->apiKey);

        $this->assertInstanceOf(
            Procob::class,
            $procob
        );
    }

    /**
     * @test
     */
    public function mustAuthenticateWithUsernameAndPassword()
    {
        $procob = new Procob($this->credentials);

        $this->assertInstanceOf(
            Procob::class,
            $procob
        );
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function mustThrowAnExceptionWithInvalidCredentials()
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
     * @test
     * @depends mustAuthenticateWithApiToken
     */
    public function mustReturnCode000OnNewTestRequest()
    {
        $procob = new Procob($this->apiKey);

        $response = $procob->send(new TestGet);

        $this->assertInstanceOf(
            Response::class,
            $response
        );

        $this->assertEquals('000', $response->getCode());
    }

    /**
     * @test
     * @depends mustAuthenticateWithApiToken
     */
    public function mustReturnSameResponseObject()
    {
        $procob = new Procob($this->apiKey);

        $responseA = $procob->getResponse(new TestGet);
        $responseB = $procob->getResponse();

        $this->assertSame($responseA, $responseB);
    }

    /**
     * @test
     * @depends mustAuthenticateWithApiToken
     */
    public function mustReturnSamePersonGatewayObject()
    {
        $procob = new Procob($this->apiKey);

        $firstPersonGateway = $procob->person();
        $secondPersonGateway = $procob->person();

        $this->assertSame(
            $firstPersonGateway,
            $secondPersonGateway
        );

        $this->assertInstanceOf(
            PersonGateway::class,
            $procob->person()
        );
    }
}
