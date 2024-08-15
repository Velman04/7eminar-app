<?php

declare(strict_types=1);

namespace App\Infrastructure\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JsonResourceWithoutWrapper extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = null;
}
