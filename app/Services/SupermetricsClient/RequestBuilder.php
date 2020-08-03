<?php

namespace App\Services\SupermetricsClient;

use App\Services\SupermetricsClient\Requests\AbstractRequest;
use function GuzzleHttp\Psr7\build_query;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

/**
 * Class RequestBuilder
 * @package App\Services\SupermetricsClient
 */
class RequestBuilder
{
    /**
     * @param AbstractRequest $request
     * @return Request
     */
    public function build(AbstractRequest $request): Request
    {
        $uri = new Uri($request->getUri());
        $body = null;

        if (!empty($request->getQuery())) {
            $uri = $uri->withQuery(build_query($request->getQuery()));
        }
        if (!empty($request->getBody())) {
            $body = json_encode($request->getBody());
        }

        return new Request(
            $request->getMethod(),
            $uri,
            $request->getHeaders(),
            $body
        );
    }
}
