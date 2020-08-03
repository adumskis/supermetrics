<?php

namespace App\Services\SupermetricsClient\Mappers;

use App\Services\SupermetricsClient\Models\Register;
use stdClass;

/**
 * Class RegisterMapper
 * @package App\Services\SupermetricsClient\Mappers
 */
class RegisterMapper implements MapperInterface
{
    /**
     * @param stdClass $data
     * @return Register
     */
    public function map(stdClass $data): Register
    {
        $register = new Register();
        $register->setClientId($data->client_id);
        $register->setEmail($data->email);
        $register->setSlToken($data->sl_token);

        return $register;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return Register::class;
    }
}
