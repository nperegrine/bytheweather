<?php

namespace App\Http\Responses;

use Illuminate\Http\Response as HttpStatusCode;

/**
 * A response that will show the consumer the errors for a 500 response.
 */
class Std500Response extends StdResponse
{
    /**
     * The list of errors on the response.
     *
     * @var array
     */
    public $errors;

    /**
     * The status code for a standard 500 response.
     *
     * @var int
     */
    protected $statusCode = HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR;

    /**
     * Add a single error to the response.
     *
     * @param  string  $warning
     */
    public function addError($warning)
    {
        $this->errors[] = $warning;
    }

    /**
     * Add a list of errors to the response.
     *
     * @param  array  $warnings
     */
    public function setErrors($warnings)
    {
        $this->errors = $warnings;
    }
}
