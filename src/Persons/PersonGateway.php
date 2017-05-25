<?php

namespace Procob\Persons;

use Procob\Procob;

class PersonGateway
{
    private $procob;

    public function __construct(Procob $procob)
    {
        $this->procob = $procob;
    }

    public function find($cpf)
    {
        $response = $this->procob->send('GET', "L0032/{$cpf}");

        if (! array_key_exists('content', $response)) {
            return 'Nenhum registro encontrado';
        }

        return PersonFactory::create($response['content'][0]);
    }
}
