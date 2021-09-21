<?php


namespace Modules\Response\Facades;


use Illuminate\Support\Facades\Facade;

class ApiResponse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ApiResponse';
    }

}
