<?php

namespace ProcobTests\UnitTests;

use \PHPUnit\Framework\TestCase;
use Procob\Procob;
use Procob\Request\TestGet;
use Procob\Person\PersonGateway;
use Procob\Company\CompanyGateway;

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
     * @depends mustAuthenticateWithApiToken
     */
    public function mustReturnCode000OnNewTestRequest()
    {
        $procob = new Procob($this->apiKey);

        $response = $procob->send(new TestGet);

        $this->assertEquals('000', $response->code);
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

        $firstPersonGateway = $procob->persons();
        $this->assertInstanceOf(
            PersonGateway::class,
            $firstPersonGateway
        );

        $secondPersonGateway = $procob->persons();
        $this->assertSame(
            $firstPersonGateway,
            $secondPersonGateway
        );
    }

        /**
     * @test
     * @depends mustAuthenticateWithApiToken
     */
    public function mustReturnSameCompanyGatewayObject()
    {
        $procob = new Procob($this->apiKey);

        $firstCompanyGateway = $procob->companies();
        $this->assertInstanceOf(
            CompanyGateway::class,
            $firstCompanyGateway
        );

        $secondCompanyGateway = $procob->companies();
        $this->assertSame(
            $firstCompanyGateway,
            $secondCompanyGateway
        );
    }
}
