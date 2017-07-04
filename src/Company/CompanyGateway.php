<?php

namespace Procob\Company;

use Procob\Procob;
use Procob\Request\CompleteGet;

class CompanyGateway
{
    private $procob;

    public function __construct(Procob $procob)
    {
        $this->procob = $procob;
    }

    public function findByCnpj($cnpj)
    {
        $request  = new CompleteGet($cnpj);

        return CompanyFactory::create(
            $this->procob->getResponse($request)
        );
    }
}
