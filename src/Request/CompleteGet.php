<?php

namespace Procob\Request;

use Procob\Contracts\RequestInterface;

class CompleteGet implements RequestInterface
{
    private $document;

    public function __construct($document)
    {
        $this->document = $document;
    }

    public function method()
    {
        return 'GET';
    }

    public function uri()
    {
        return sprintf(
            '/L0001/%s',
            $this->document
        );
    }
}
