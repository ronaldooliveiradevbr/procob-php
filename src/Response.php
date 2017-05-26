<?php

namespace Procob;

use \DateTimeImmutable;
use \DateTimeZone;
use \RuntimeException;
use \stdClass;

final class Response
{
    private $code;
    private $message;
    private $body;
    private $raw;

    public function __construct(stdClass $rawResponse = null)
    {
        if (!is_object($rawResponse)) {
            throw new RuntimeException(
                "No response from server =("
            );
        }

        if ($rawResponse->code != '000') {
            throw new Exception(
                sprintf(
                    "Error Processing Request:\nCode: %s\nMessage: %s\n",
                    $rawResponse->code,
                    $rawResponse->message
                )
            );
        }

        $this->raw = $rawResponse;

        $this->code = $rawResponse->code;

        $this->body = $rawResponse->content;

        $this->setCreatedAt(
            $rawResponse->date,
            $rawResponse->hour
        );
    }

    public function setCreatedAt($date, $hour)
    {
        $this->createdAt = new DateTimeImmutable(
            "{$date} {$hour}",
            new DateTimeZone("America/Sao_Paulo")
        );

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getBody()
    {
        return (array) $this->body;
    }

    public function getRaw()
    {
        return json_encode($this->raw);
    }
}
