<?php

declare(strict_types=1);

namespace WeClient\Concerns;

use Psr\Http\Message\ResponseInterface;
use WeForge\Exceptions\ResponseCastingErrorException;

trait CastsResponse
{
    /**
     * Casts response to string.
     */
    public function castsResponseToString(ResponseInterface $response): string
    {
        $contents = (string) $response->getBody();
        $response->getBody()->rewind();

        return $contents;
    }

    /**
     * Casts response to array.
     *
     * @throws \WeForge\Exceptions\ResponseCastingErrorException
     */
    public function castsResponseToArray(ResponseInterface $response): array
    {
        $decoded = json_decode(
            $this->castsResponseToString($response), true
        );

        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded;
        }

        throw (new ResponseCastingErrorException(json_last_error_msg()))->withResponse($response);
    }
}
