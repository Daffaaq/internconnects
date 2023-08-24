<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PhpOffice\PhpWord\Settings;
use Dompdf\Dompdf;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Settings::setPdfRendererPath('G:\Project Gabuts\internconnects\vendor\dompdf\dompdf');
        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
    }
}
