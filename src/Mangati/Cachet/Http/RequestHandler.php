<?php

namespace Mangati\Cachet\Http;

use Mangati\Cachet\Client;
use Mangati\Cachet\Entity\Entity;
use Mangati\Cachet\Result\Envelope;
use JMS\Serializer\Serializer;

class RequestHandler
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var
     */
    protected $serializer;

    public function __construct(Client $client, Serializer $serializer)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $client->getEndpoint()
        ]);

        $this->headers = [
            'Content-type' => 'application/json',
            'X-Cachet-Token' => $client->getToken()
        ];

        $this->serializer = $serializer;
    }

    /**
     * @return Envelope
     */
    private function parseResponse($response, $envelopeType)
    {
        $json = $response->getBody();
        $envelope = $this->serializer->deserialize($json, $envelopeType, 'json');

        return $envelope;
    }

    public function request($method, $url, array $params = [])
    {
        $params = array_merge($params, [
            'headers' => $this->headers
        ]);
        return $this->client->request($method, $url, $params);
    }

    /**
     * @return Envelope
     */
    public function get($path, $envelopeType, array $params = [])
    {
        $response = $this->request("GET", $path, [
            'query' => $params
        ]);
        $envelope = $this->parseResponse($response, $envelopeType);

        return $envelope;
    }

    /**
     * @return Envelope
     */
    public function put($path, $envelopeType, Entity $entity)
    {
        $data = $this->serializer->serialize($entity, 'json');
        $response = $this->request("PUT", $path, [
            'body' => $data
        ]);

        $envelope = $this->parseResponse($response, $envelopeType);

        return $envelope;
    }

    /**
     * @return Envelope
     */
    public function post($path, $envelopeType, Entity $entity)
    {
        $data = $this->serializer->serialize($entity, 'json');
        $response = $this->request("POST", $path, [
            'body' => $data
        ]);

        $envelope = $this->parseResponse($response, $envelopeType);

        return $envelope;
    }

    /**
     *
     */
    public function delete($path, $id)
    {
        $this->request("DELETE", $path, [
            'json' => [
                'id' => $id
            ]
        ]);
    }

}
