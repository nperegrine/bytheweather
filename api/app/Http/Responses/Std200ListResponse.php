<?php

namespace App\Http\Responses;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * A response object used for lists
 */
class Std200ListResponse extends StdResponse
{
    /**
     * The list of items that will be sent on the response
     * @var mixed[]
     */
    public $items;

    /**
     * @param array|JsonResource $items
     */
    public function setItems(array|JsonResource $items)
    {
        $this->items = $items;
    }
}