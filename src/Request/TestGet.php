<?php

namespace Procob\Request;

use Procob\Contracts\RequestInterface;

class TestGet implements RequestInterface
{
    public function method()
    {
        return 'GET';
    }

    public function uri()
    {
        return 'https://api.procob.com/consultas/teste';
    }
}
