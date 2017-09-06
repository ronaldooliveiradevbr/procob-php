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
use \GuzzleHttp\Exception\ClientException;
use \GuzzleHttp\Exception\RequestException;
use \GuzzleHttp\Psr7\Request as HttpRequest;
use Procob\Contracts\RequestInterface;
use Procob\Person\PersonGateway;
use Procob\Company\CompanyGateway;

class Procob
{
    /**
     * @var string
     */
    const HOST = "https://api.procob.com/consultas";

    /**
     * @var string
     */
    const VERSION = "v1";

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $response;

    /**
     * @var Procob\Persons\PersonGateway
     */
    private $persons;

    /**
     * @var Procob\Company\CompanyGateway
     */
    private $companies;

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
        if (is_array($apiKey) && 2 == count($apiKey)) {
            $this->apiKey = base64_encode(implode(':', $apiKey));
        } elseif (is_string($apiKey)) {
            $this->apiKey = $apiKey;
        } else {
            throw new InvalidArgumentException(
                sprintf(
                    "The API credentials %s are not valid",
                    print_r($apiKey, true)
                )
            );
        }

        $baseUri = implode('/', [self::HOST, self::VERSION]);

        $headers['Authorization'] = "Basic {$this->apiKey}";

        $this->httpClient = new HttpClient(
            compact(
                'baseUri',
                'headers',
                'timeout'
            )
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
    public function send(RequestInterface $request)
    {
        $request = new HttpRequest(
            $request->method(),
            $request->uri()
        );

        try {
            $response = $this->httpClient->send($request);


            return $this->response = json_decode(
                $response->getBody()->getContents()
            );
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getResponse()
                                  ->getBody()
                                  ->getContents()
            ;

            $code = $exception->getResponse()
                              ->getStatusCode()
            ;

            throw new ClientException($response, $code);
        } catch (\GuzzleHttp\Exception\RequestException $exception) {
            throw new RequestException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

    public function getResponse(RequestInterface $request = null)
    {
        if (is_null($this->response) && ! is_null($request)) {
            return $this->send($request);
        }

        return $this->response;
    }

    public function persons()
    {
        if ($this->persons instanceof PersonGateway) {
            return $this->persons;
        }

        return $this->persons = new PersonGateway($this);
    }

    public function companies()
    {
        if ($this->companies instanceof CompanyGateway) {
            return $this->companies;
        }

        return $this->companies = new CompanyGateway($this);
    }
}
