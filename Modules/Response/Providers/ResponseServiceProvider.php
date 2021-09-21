<?php

namespace Modules\Response\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Response\Entities\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Response';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'response';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        app()->make('router')->aliasMiddleware('json.response', \Modules\Response\Http\Middleware\ForceJsonResponse::class);
        app()->make('router')->aliasMiddleware('cors.http', \Modules\Response\Http\Middleware\CorsHttp::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ApiResponse',function(){
            return new Response;
        });


//        $this->app->register(RouteServiceProvider::class);
    }
}
