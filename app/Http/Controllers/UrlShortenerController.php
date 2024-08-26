<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public static function routes()
    {
        Route::group(['prefix' => 'u', 'as' => 'urlshortener.'], static function () { // Cambia 'urlshortener' a 'u'
            Route::get('/', [self::class, 'index'])->name('index');
            Route::post('acortar-url', [self::class, 'acortarUrl'])->name('acortar-url');
            Route::get('/{urlcorta}', [self::class, 'getUrl'])->name('getUrl');
        });
    }

    public function index()
    {
        return view('urlshortener');
    }

    /**
     * Acorta url o busca la url acortada en db
     */
    public function acortarUrl(Request $request)
    {
        try {
            // Buscar si existe una URL original en la base de datos
            $url = Url::where('url_original', $request->url_original)->first();

            // Si la URL ya está acortada, devolver la URL corta
            if ($url) {
                return url('/') . '/u/' . $url->url_corta; // Cambia '/urlshortener/' a '/u/'
            }

            // Si no existe, generar una URL corta única
            $urlCorta = $this->generateShortUrl();

            // Crear una nueva URL con la URL original, la URL corta generada y la ruta del QR
            $url = Url::create([
                'url_original' => $request->url_original,
                'url_corta' => $urlCorta,
            ]);

            $url_acortada = url('/') . '/u/' . $urlCorta; // Cambia '/urlshortener/' a '/u/'

            // Devolver la URL corta generada
            return $url_acortada;
        } catch (\Exception $e) {
            DB::rollback();
            request()->session()->flash('error', $e);
            return redirect()->back();
        }
    }

    private function generateShortUrl()
    {
        // Generar una URL corta única
        do {
            $urlCorta = Str::random(6);
        } while (Url::where('url_corta', $urlCorta)->exists());

        return $urlCorta;
    }

    public function getUrl($urlcorta)
    {
        if (isset($urlcorta) && (Url::where('url_corta', $urlcorta)->count() > 0)) {
            $ruta_original = Url::where('url_corta', $urlcorta)->first()->url_original;
            return redirect()->away($ruta_original);
        }
        return redirect()->route('urlshortener.index');
    }
}
