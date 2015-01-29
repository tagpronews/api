<?php namespace TagProNews\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Created by PhpStorm.
 * User: steve
 * Date: 29.01.15
 * Time: 21:42
 */
class BasicTransformer extends TransformerAbstract
{
    /**
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {
        return $item;
    }
}