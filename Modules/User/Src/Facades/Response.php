<?php


namespace Modules\User\Src\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\User\Src\Http\Responses\HtmlResponses\HtmlResponse;
use Modules\User\Src\Http\Responses\JsonResponses\JsonResponse;

class Response extends Facade
{
    protected static function getFacadeAccessor()
    {
        $client = request()->header('client');

        return [
            'web' => HtmlResponse::class,
            'api' => JsonResponse::class
        ][$client] ?? HtmlResponse::class;
    }
}
