<?php

namespace Procob\Request;

use Procob\Contracts\RequestInterface;

class CompleteGet implements RequestInterface
{
    private $cpf;

    public function __construct($cpf)
    {
        $this->cpf = $cpf;
    }

    public function method()
    {
        return 'GET';
    }

    public function uri()
    {
        return sprintf('L0001/%s', $this->cpf);
    }
}
