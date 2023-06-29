<?php

namespace App\Services;

use Elasticsearch\ClientBuilder;

class ElasticsearchService
{
    protected $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()->setHosts([config('elasticsearch.hosts')])->build();
    }

    public function search($index, $query)
    {
        $params = [
            'index' => $index,
            'body' => [
                'query' => [
                    'match' => [
                        'content' => $query,
                    ],
                ],
            ],
        ];

        $response = $this->client->search($params);

        return $response['hits']['hits'];
    }
}
