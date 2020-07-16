<?php

namespace Phenix\Core\Aggregations;

use Phenix\Core\Enumerators\ElasticSearchAggregationTypeEnum;

/**
 * Class ElasticSearchSumAggregation
 * @package Phenix\Core\Aggregations
 */
class ElasticSearchSumAggregation extends ElasticSearchAggregation
{
    /**
     * ElasticSearchSumAggregation constructor.
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        $this->type = ElasticSearchAggregationTypeEnum::SUM;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function buildForRequest(): array
    {
        return [
            $this->getSyntaxOfAggregation() => [
                'field' => $this->value
            ]
        ];
    }

    /**
     * @param array $values
     * @return mixed
     */
    public function treatResponse(array $values)
    {
        return $values['value'];
    }
}
