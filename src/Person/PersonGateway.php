<?php

namespace Procob\Person;

use Procob\Procob;
use Procob\Request\CompleteGet;

class PersonGateway
{
    private $procob;

    public function __construct(Procob $procob)
    {
        $this->procob = $procob;
    }

    public function findByCpf($cpf)
    {
        $request  = new CompleteGet($cpf);

        return PersonFactory::create(
            $this->procob->getResponse($request)
        );
    }
}
