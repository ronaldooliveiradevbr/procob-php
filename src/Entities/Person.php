<?php
/**
 * Procob API Person entity class
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob\Entities;

use \DateTimeImmutable;
use \InvalidArgumentException;

class Person
{
    /**
     * @var string $document
     */
    protected $document;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var \DateTimeImmutable $birthday
     */
    protected $birthday;

    /**
     * @var integer $age
     */
    protected $age;

    /**
     * @var string $gender
     */
    protected $gender;

    /**
     * @var string $obituary
     */
    protected $obituary;

    /**
     * @var string $zodiacSign
     */
    protected $zodiacSign;

    /**
     * @var string $livedIn Brazilian State abbreviation
     */
    protected $livedIn;

    /**
     * @var string $irpfStatus Brazilian IRS status
     */
    protected $irpfStatus;

    /**
     * @var \DateTimeImmutable $irpfVerifiedAt Brazilian IRS verification datetime
     */
    protected $irpfVerifiedAt;

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param string $document
     * @return Procob\Entities\Person
     */
    public function setDocument($document)
    {
        if (! is_string($document)
            || ! strlen($document) == 11
        ) {
            throw new InvalidArgumentException(
                sprintf(
                    "Document number %s is not valid!",
                    print_r($document, true)
                )
            );
        }

        $this->document = $document;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Procob\Entities\Person
     */
    public function setName($name)
    {
        if (! is_string($name)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Person name %s is not valid!",
                    print_r($name, true)
                )
            );
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTimeImmutable $birthday
     * @return Procob\Entities\Person
     */
    public function setBirthday(DateTimeImmutable $birthday)
    {
        if (! is_a($birthday, DateTimeImmutable::class)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Person birthday %s is not a valid date!",
                    print_r($birthday, true)
                )
            );
        }

        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param integer $age
     * @return Procob\Entities\Person
     */
    public function setAge($age)
    {
        if (! is_integer($age)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Person's age must be a integer value:%s is not valid!",
                    print_r($age, true)
                )
            );
        }

        $this->age = $age;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Procob\Entities\Person
     */
    public function setGender($gender)
    {
        if (! is_string($gender) || strlen($gender) != 1) {
            throw new InvalidArgumentException(
                sprintf(
                    "Gender not valid! %s",
                    print_r($gender, true)
                )
            );
        }

        $this->gender = $gender;

        return $this;
    }

    /**
     * @return string
     */
    public function getObituary()
    {
        return $this->obituary;
    }

    /**
     * @param string $obituary
     * @return Procob\Entities\Person
     */
    public function setObituary($obituary)
    {
        if (! is_string($obituary)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Obituary is not valid! %s",
                    print_r($obituary, true)
                )
            );
        }

        $this->obituary = $obituary;

        return $this;
    }

    /**
     * @return string
     */
    public function getZodiacSign()
    {
        return $this->zodiacSign;
    }

    /**
     * @param string $zodiacSign
     * @return Procob\Entities\Person
     */
    public function setZodiacSign($zodiacSign)
    {
        if (! is_string($zodiacSign)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Zodiac Sign not valid! %s",
                    print_r($zodiacSign, true)
                )
            );
        }

        $this->zodiacSign = $zodiacSign;

        return $this;
    }

    /**
     * @return string
     */
    public function getLivedIn()
    {
        return $this->livedIn;
    }

    /**
     * @param string $livedIn
     * @return Procob\Entities\Person
     */
    public function setLivedIn($livedIn)
    {
        if (! is_string($livedIn)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Lived in info provided is not valid! %s",
                    print_r($livedIn, true)
                )
            );
        }

        $this->livedIn = $livedIn;

        return $this;
    }

    /**
     * @return string
     */
    public function getIrpfStatus()
    {
        return $this->irpfStatus;
    }

    /**
     * @param string $irpfStatus
     * @return Procob\Entities\Person
     */
    public function setIrpfStatus($irpfStatus)
    {
        if (! is_string($irpfStatus)) {
            throw new InvalidArgumentException(
                sprintf(
                    "IRPF status provided is not valid! %s",
                    print_r($irpfStatus, true)
                )
            );
        }

        $this->irpfStatus = $irpfStatus;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getIrpfVerifiedAt()
    {
        return $this->irpfVerifiedAt;
    }

    /**
     * @param string $irpfStatus
     * @return Procob\Entities\Person
     */
    public function setIrpfVerifiedAt($irpfVerifiedAt)
    {
        if (! is_a($irpfVerifiedAt, DateTimeImmutable::class)) {
            throw new InvalidArgumentException(
                sprintf(
                    "IRPF verification date is not valid! %s",
                    print_r($irpfVerifiedAt, true)
                )
            );
        }

        $this->irpfVerifiedAt = $irpfVerifiedAt;

        return $this;
    }
}
