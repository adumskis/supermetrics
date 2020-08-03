<?php


namespace App\Services\SupermetricsClient;

use App\Services\SupermetricsClient\Exceptions\CouldNotFindResponseMapper;
use App\Services\SupermetricsClient\Mappers\MapperInterface;
use App\Services\SupermetricsClient\Models\ModelInterface;
use GuzzleHttp\Psr7\Response;

/**
 * Class ResponseMapper
 * @package App\Services\SupermetricsClient
 */
class ResponseMapper
{
    /**
     * @var MapperInterface[]
     */
    protected array $mappers;

    /**
     * @param MapperInterface $mapper
     */
    public function addMapper(MapperInterface $mapper): void
    {
        $this->mappers[$mapper->getClass()] = $mapper;
    }

    /**
     * @param Response $response
     * @param string $class
     * @return ModelInterface
     * @throws CouldNotFindResponseMapper
     */
    public function map(Response $response, string $class): ModelInterface
    {
        if (!array_key_exists($class, $this->mappers)) {
            throw new CouldNotFindResponseMapper($class);
        }

        $responseData = json_decode((string)$response->getBody());

        return $this->mappers[$class]->map($responseData->data);
    }
}
