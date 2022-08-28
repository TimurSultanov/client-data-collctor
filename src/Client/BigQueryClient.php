<?php

namespace App\Client;

use App\Exception\MethodNotImplementedException;
use Google\Cloud\BigQuery\BigQueryClient as GoogleBigQueryClient;

class BigQueryClient implements StorageClientInterface
{
    // To simplify the request and table structure we assume we have only 1 column with JSON data inside
    private const INSERT_QUERY_TEMPLATE = 'INSERT INTO %s VALUES(\'%s\')';

    private GoogleBigQueryClient $bigQueryClient;

    private string $dataSetId;

    /**
     * @param string $googleProjectId
     * @param string $dataSetId
     */
    public function __construct(string $googleProjectId, string $dataSetId)
    {
        $this->bigQueryClient = new GoogleBigQueryClient([
            'projectId' => $googleProjectId,
        ]);

        $this->dataSetId = $dataSetId;
    }

    /**
     * @param string $key
     *
     * @return string
     * @throws \App\Exception\MethodNotImplementedException
     */
    public function get(string $key): string
    {
        throw new MethodNotImplementedException(__METHOD__);
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function set(string $key, string $value): void
    {
        $dataset = $this->bigQueryClient->dataset($this->dataSetId);

        // To simplify the request and table structure we assume we have only 1 column with JSON data inside
        $queryConfig = $this->bigQueryClient
            ->query(sprintf(self::INSERT_QUERY_TEMPLATE, $key, $value))
            ->defaultDataset($dataset);

        $this->bigQueryClient->runQuery($queryConfig);
    }
}
