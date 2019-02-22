<?php

/*
 * Copyright 2018 SCTR Services
 *
 * Distribution and reproduction are prohibited.
 *
 * @package     greenrope-api-client
 * @copyright   SCTR Services LLC 2018
 * @license     No License (Proprietary)
 */

namespace Sctr\Greenrope\Api\Tests;

use Sctr\Greenrope\Api\Client;
use Sctr\Greenrope\Api\Endpoint\AbstractEndpoint;
use Sctr\Greenrope\Api\Response\ApiAuthTokenResponse;

class GeneralTest extends BaseTest
{
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testGetTokenSuccess()
    {
        $params =['email' => 'email@greenrope.com', 'password' => 'password', 'api_url' => 'https://api.stgi.net/api-xml'];

        $auth = new class(new Client($params)) extends AbstractEndpoint {
            public function getAuthToken()
            {
                $parameters = [
                    'email'    => 'email@greenrope.com',
                    'password' => 'password',
                    'xml'      => AbstractEndpoint::GET_AUTH_TOKEN_XML,
                ];

                $response = $this->client->post('https://api.stgi.net/api-xml', ['form_params' => $parameters]);

                /** @var ApiAuthTokenResponse $response */
                $response = $this->xmlConverter->deserializeXml($response->getBody(), ApiAuthTokenResponse::class);

                if ($response->getSuccess() && !empty($response->getResult())) {
                    return $response->getResult();
                } else {
                    throw new \Exception(sprintf('Authentication error: %s', $response->getErrorText()));
                }
            }
        };

        /** @var ApiAuthTokenResponse $result */
        $result = $auth->getAuthToken();

        $this->assertNotNull($result);
    }
}
