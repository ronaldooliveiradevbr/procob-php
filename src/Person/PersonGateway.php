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
        $response = $this->procob->getResponse($request)
                                 ->getBody()['nome'];

        if ($response->existe_informacao === "NAO") {
            return null;
        }

        return PersonFactory::create($response->conteudo[0]);
    }
}
