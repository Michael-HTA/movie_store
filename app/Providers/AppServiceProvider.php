<?php

namespace App\Providers;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Production;
use App\Models\Type;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Layout;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //custom response
        Response::macro('error', function (Request $request, $data, $message = null, $code = 400) {
            $meta = [
                'method' => $request->getMethod(),
                'endpoint' => $request->path(),
            ];

            $responseData = [
                'success' => 0,
                'code' => $code,
                'meta' => $meta,
                'data' => $data,
                'message' => $message,
            ];

            return Response::json($responseData, $code);
        });

        Response::macro('success', function (Request $request, $data, $message = null, $code = 200) {
            $meta = [
                'method' => $request->getMethod(),
                'endpoint' => $request->path(),
            ];

            $responseData = [
                'success' => 1,
                'code' => $code,
                'meta' => $meta,
                'data' => $data,
                'message' => $message,
            ];

            return Response::json($responseData, $code);
        });

        View::composer(['movies.movie-create', 'movies.movie-edit'], function(ViewView $view){
            $view->with([
                'types' => Type::all(),
                'directors' => Director::all(),
                'productions' => Production::all(),
                'males' => Actor::where('gender','Male')->get(),
                'females' => Actor::where('gender','Female')->get(),
                'genres' => Genre::all(),
            ]);
        });


        Paginator::useBootstrap();
    }
}
