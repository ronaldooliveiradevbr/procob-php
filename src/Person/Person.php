<?php
/**
 * Procob API Person entity class
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob\Person;

use \DateTimeImmutable;
use \InvalidArgumentException;
use Procob\Contracts\EntityInterface as Entity;

final class Person implements Entity
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
     * @param
     */
    public function __construct(
        $document,
        $name,
        DateTimeImmutable $birthday,
        $age,
        $gender,
        $obituary,
        $zodiacSign,
        $livedIn,
        $irpfStatus,
        DateTimeImmutable $irpfVerifiedAt
    ) {
        $this->document = $document;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->age = $age;
        $this->gender = $gender;
        $this->obituary = $obituary;
        $this->zodiacSign = $zodiacSign;
        $this->livedIn = $livedIn;
        $this->irpfStatus = $irpfStatus;
        $this->irpfVerifiedAt = $irpfVerifiedAt;
    }

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getObituary()
    {
        return $this->obituary;
    }

    /**
     * @return string
     */
    public function getZodiacSign()
    {
        return $this->zodiacSign;
    }

    /**
     * @return string
     */
    public function getLivedIn()
    {
        return $this->livedIn;
    }

    /**
     * @return string
     */
    public function getIrpfStatus()
    {
        return $this->irpfStatus;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getIrpfVerifiedAt()
    {
        return $this->irpfVerifiedAt;
    }
}
