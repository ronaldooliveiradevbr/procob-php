<?php
/**
 * Procob API Company entity class
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob\Company;

use Procob\Contracts\EntityInterface;

class Company implements EntityInterface
{
    /**
     * @var string $cnpj Brazilian document number for companies
     */
    private $cnpj;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $fantasyName
     */
    private $fantasyName;

    /**
     * @var string $state
     */
    private $state;

    /**
     * @var string $statusIRS Brazilian IRS status
     */
    protected $statusIRS;

    /**
     * @var \DateTimeImmutable $verifiedAt Brazilian IRS verification datetime
     */
    protected $verifiedAt;

    /**
     * Company's constructor
     *
     * @param string $cnpj
     * @param string $name
     * @param string $fantasyName
     * @param string $state
     * @param string $statusIRS
     * @param string $verifiedAt
     */
    public function __construct(
        $cnpj,
        $name,
        $fantasyName,
        $state,
        $statusIRS,
        $verifiedAt
    ) {
        $this->cnpj = $cnpj;
        $this->name = $name;
        $this->fantasyName = $fantasyName;
        $this->state = $state;
        $this->statusIRS = $statusIRS;
        $this->verifiedAt = $verifiedAt;
    }

    /**
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFantasyName()
    {
        return $this->fantasyName;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getStatusIRS()
    {
        return $this->statusIRS;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getVerifiedAt()
    {
        return $this->verifiedAt;
    }
}
