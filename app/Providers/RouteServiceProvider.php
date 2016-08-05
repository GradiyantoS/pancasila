<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
            //harvi
            require app_path('Http/route/dosen.php');
            require app_path('Http/route/mitra.php');
            require app_path('Http/route/sdm.php');
            //grady
            require app_path('Http/route/calon_mahasiswa.php');
            require app_path('Http/route/mahasiswa.php');
            require app_path('Http/route/profil_mahasiswa.php');
            //ronald
            require app_path('Http/route/pengajaran.php');
            //dana
            require app_path('Http/route/penelitian_publikasi.php');
            require app_path('Http/route/sarana_prasarana.php');
            require app_path('Http/route/pkm.php'); //Program Kreativitas Mahasiswa
            require app_path('Http/route/profil_dosen.php');
            //junaidy
            require app_path('Http/route/p2m.php'); //Pengabdian pada Masyarakat
            require app_path('Http/route/keuangan.php');
            require app_path('Http/route/alumni.php');
        });
    }
}
