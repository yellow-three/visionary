<?php

namespace YellowThree\Visionary\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use YellowThree\Visionary\Facades\Visionary;

class VisionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Temaların Blade bileşen yollarını kaydet
        $this->loadViewsFrom(path: __DIR__.'/../resources/views', namespace: 'visionary');

        $this->registerLivewireComponents(prefix: 'visionary');

        // Temaların konfigürasyon dosyasını yükle
        $this->mergeConfigFrom(
            path: __DIR__.'/../../config/visionary.php', key: 'visionary',
        );

        $this->publishes([
            __DIR__.'/../../publishable/assets' => public_path('visionary'),
        ], groups: 'public');

//        Blade::componentNamespace('YellowThree\\Visionary\\Views\\Components', 'visionary');
//        Blade::anonymousComponentPath(path: __DIR__.'/../../resources/views/components', prefix: 'visionary');

    }

    protected function registerLivewireComponents($prefix): void
    {
        // Bileşenlerin olduğu dizini belirle
        $livewirePath = __DIR__.'/../Http/Livewire';

        // Dizindeki tüm PHP dosyalarını al
        foreach (glob(pattern: $livewirePath.'/*.php') as $file) {
            $class = 'YellowThree\\Visionary\\Http\\Livewire\\'.pathinfo($file, flags: PATHINFO_FILENAME);
            $component = $prefix.'-'.strtolower(pathinfo($file, flags: PATHINFO_FILENAME));
            Livewire::component($component, $class);
        }
    }

    public function register() : void
    {
        /*$this->app->singleton('visionary', function () {
            return new Visionary;
        });*/
    }

    private function getConfigFile(): string
    {
        return __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'visionary.php';
    }
}
