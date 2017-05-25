<?php
/**
 * Procob API facade
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob;

use \InvalidArgumentException;
use \GuzzleHttp\Client as HttpClient;
use \GuzzleHttp\Psr7\Request;

class Procob
{
    /**
     * @var string
     */
    private $baseUri = "https://api.procob.com/consultas/v1/";

    /**
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * Procob's API facade constructor.
     *
     * @param string|array $apiKey Api token or array containing username and password
     * @param array $headers HTTP Headers
     * @param integer $timeout
     */
    public function __construct(
        $apiKey,
        $headers = [],
        $timeout = 30
    ) {
        if (! (is_array($apiKey)
            && count($apiKey) == 2)
            && ! is_string($apiKey)
        ) {
            throw new InvalidArgumentException(
                sprintf(
                    "The API credentials %s are not valid",
                    print_r($apiKey, true)
                )
            );
        }

        if (is_array($apiKey)) {
            $apiKey = base64_encode(implode(':', $apiKey));
        }

        $base_uri = $this->baseUri;

        $headers['Authorization'] = "Basic {$apiKey}";

        $this->httpClient = new HttpClient(
            compact('base_uri', 'headers', 'timeout')
        );
    }

    /**
     * Wraps HTTP client Request send call
     *
     * @param string $method
     * @param string $uri
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \GuzzleHttp\Exception\RequestException
     */
    public function send($method, $uri)
    {
        $request = new Request($method, $uri);

        try {
            $response = $this->httpClient->send($request);
            return json_decode(
                $response->getBody()->getContents()
            );
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getResponse()
                                  ->getBody()
                                  ->getContents();

            $code = $exception->getResponse()
                              ->getStatusCode();

            throw new ClientException($response, $code);
        } catch (\GuzzleHttp\Exception\RequestException $exception) {
            throw new ClientException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
