<?php

namespace App\Services\SupermetricsClient;

use App\Services\Config\Config;
use App\Services\SupermetricsClient\Requests\AbstractRequest;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Client
 * @package App\Services\SupermetricsClient
 */
class Client
{
    /**
     * @var GuzzleClient|null
     */
    protected ?GuzzleClient $guzzleClient = null;

    /**
     * @var RequestBuilder
     */
    protected RequestBuilder $requestBuilder;

    /**
     * @var string
     */
    protected string $baseUri;

    /**
     * Client constructor.
     * @param RequestBuilder $requestBuilder
     * @param Config $config
     */
    public function __construct(RequestBuilder $requestBuilder, Config $config)
    {
        $this->requestBuilder = $requestBuilder;
        $this->baseUri = $config->get('supermetrics.base_uri');
    }

    /**
     * @param AbstractRequest $request
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function send(AbstractRequest $request): ResponseInterface
    {
        return $this->getClient()->send($this->requestBuilder->build($request));
    }

    /**
     * @return GuzzleClient
     */
    protected function getClient(): GuzzleClient
    {
        if (!$this->guzzleClient) {
            $this->guzzleClient = new GuzzleClient([
                'base_uri' => $this->baseUri,
            ]);
        }

        return $this->guzzleClient;
    }
}
