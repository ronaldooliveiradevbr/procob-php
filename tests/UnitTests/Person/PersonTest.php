<?php

namespace Procob\Tests\UnitTests\Procob\Persons;

use \DateTimeImmutable;
use Procob\Person\Person;
use \Faker\Provider\pt_BR\Person as FakerPerson;
use \PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function setUp()
    {
        $this->faker = \Faker\Factory::create();
        $this->faker->addProvider(
            new FakerPerson($this->faker)
        );

        $this->assertTrue(
            class_exists($class = Person::class),
            sprintf(
                "Class not found: %s",
                print_r($class, true)
            )
        );
    }

    public function testInstantiatePersonWithNoArgumentsShouldWork()
    {
        $this->assertEquals(
            Person::class,
            get_class(new Person)
        );
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetPersonDocumentWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setDocument(null);
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetPersonDocumentWithValidValueShouldWork()
    {
        $document = $this->faker->cpf(false);

        $person = new Person();
        $person->setDocument($document);

        $this->assertEquals(
            $document,
            $person->getDocument()
        );
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetPersonNameWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setName(null);
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetPersonNameCorrectlyShouldWork()
    {
        $name = $this->faker->name;

        $person = new Person();
        $person->setName($name);

        $this->assertEquals($name, $person->getName());
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testPersonBirthDayMustBeDateTimeImmutableObject()
    {
        $person = new Person();
        $person->setBirthday(
            new DateTimeImmutable()
        );

        $this->assertInstanceOf(
            DateTimeImmutable::class,
            $person->getBirthday()
        );
    }

     /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetAgeWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setAge(null);
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetAgeCorrectlyShouldWork()
    {
        $age = mt_rand(0, 100);

        $person = new Person();
        $person->setAge($age);

        $this->assertEquals($age, $person->getAge());
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetGenderWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setGender(null);
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetGenderWithCorrectlyShouldWork()
    {
        $gender = ['M', 'F'];
        $index = mt_rand(0, 1);

        $person = new Person();
        $person->setGender($gender[$index]);

        $this->assertEquals(
            $gender[$index],
            $person->getGender()
        );
    }

       /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetObituaryWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setObituary(intval(1));
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetObituaryWithCorrectlyShouldWork()
    {
        $obituary = "SIM (2015-12-05)";

        $person = new Person();
        $person->setObituary($obituary);

        $this->assertEquals(
            $obituary,
            $person->getObituary()
        );
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetZodiacSignWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setZodiacSign(intval(1));
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetZodiacWithCorrectlyShouldWork()
    {
        $zodiacSign = "Áries";

        $person = new Person();
        $person->setZodiacSign($zodiacSign);

        $this->assertEquals(
            $zodiacSign,
            $person->getZodiacSign()
        );
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetLivedInWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setLivedIn(intval(1));
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetLivedInCorrectlyShouldWork()
    {
        $livedIn = "SP";

        $person = new Person();
        $person->setLivedIn($livedIn);

        $this->assertEquals(
            $livedIn,
            $person->getLivedIn()
        );
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetIrpfStatusWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setIrpfStatus(intval(1));
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetIrpfStatusCorrectlyShouldWork()
    {
        $irpfStatus = "REGULAR";

        $person = new Person();
        $person->setIrpfStatus($irpfStatus);

        $this->assertEquals(
            $irpfStatus,
            $person->getIrpfStatus()
        );
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     * @expectedException InvalidArgumentException
     */
    public function testSetIrpfVerifiedAtWithInvalidValueMustThrowAnException()
    {
        $person = new Person();
        $person->setIrpfStatus(intval(1));
    }

    /**
     * @depends testInstantiatePersonWithNoArgumentsShouldWork
     */
    public function testSetIrpfVerifiedAtCorrectlyShouldWork()
    {
        $person = new Person();
        $person->setIrpfVerifiedAt(
            new DateTimeImmutable
        );

        $this->assertInstanceOf(
            DateTimeImmutable::class,
            $person->getIrpfVerifiedAt()
        );
    }
}
