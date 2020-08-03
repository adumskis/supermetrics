<?php

namespace App\Services\SupermetricsClient;

use App\Services\Config\Config;
use App\Services\SupermetricsClient\Models\PostsCollection;
use App\Services\SupermetricsClient\Models\Register;
use App\Services\SupermetricsClient\Requests\GetPostsRequest;
use App\Services\SupermetricsClient\Requests\RegisterRequest;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Supermetrics
 * @package App\Services\SupermetricsClient
 */
class Supermetrics
{
    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @var Config
     */
    protected Config $config;

    /**
     * @var ResponseMapper
     */
    protected ResponseMapper $responseMapper;

    /**
     * @var TokenStorage
     */
    protected TokenStorage $tokenStorage;

    /**
     * Supermetrics constructor.
     * @param Client $client
     * @param Config $config
     * @param ResponseMapper $responseMapper
     * @param TokenStorage $tokenStorage
     */
    public function __construct(
        Client $client,
        Config $config,
        ResponseMapper $responseMapper,
        TokenStorage $tokenStorage
    ) {
        $this->client = $client;
        $this->config = $config;
        $this->responseMapper = $responseMapper;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return Register
     * @throws Exceptions\CouldNotFindResponseMapper
     * @throws GuzzleException
     */
    public function register(): Register
    {
        $request = new RegisterRequest();
        $request->setClientId($this->config->get('supermetrics.client_id'));
        $request->setEmail($this->config->get('supermetrics.email'));
        $request->setName($this->config->get('supermetrics.name'));

        $response = $this->client->send($request);
        /** @var Register $register */
        $register = $this->responseMapper->map($response, Register::class);

        $this->tokenStorage->setToken($register->getClientId(), $register->getSlToken());

        return $register;
    }

    /**
     * @param int $page
     * @return PostsCollection
     * @throws Exceptions\CouldNotFindResponseMapper
     * @throws GuzzleException
     */
    public function getPosts(int $page): PostsCollection
    {
        $request = new GetPostsRequest();
        $request->setSlToken($this->getToken());
        $request->setPage($page);

        $response = $this->client->send($request);

        /** @var PostsCollection $postsCollection */
        $postsCollection = $this->responseMapper->map($response, PostsCollection::class);

        return $postsCollection;
    }

    /**
     * @return string
     * @throws Exceptions\CouldNotFindResponseMapper
     * @throws GuzzleException
     */
    protected function getToken(): string
    {
        $clientId = $this->config->get('supermetrics.client_id');

        if (!$this->tokenStorage->getToken($clientId)) {
            $this->register();
        }

        return $this->tokenStorage->getToken($clientId);
    }
}
