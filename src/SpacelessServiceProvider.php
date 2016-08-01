<?php

namespace SlyDeath\Spaceless;

use Blade;
use Illuminate\Support\ServiceProvider;

class SpacelessServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services
     */
    public function boot()
    {
        // Добавление директив в Blade
        $this->applyBladeDirectives();

        // Публикация конфигурации
        $this->publishConfig();
    }

    /**
     * Register any application services
     *
     * @return void
     */
    public function register()
    {
        $config_path = __DIR__ . '/../config/spaceless.php';
        $this->mergeConfigFrom($config_path, 'spaceless');

        $this->app->singleton(BladeDirectives::class);
    }

    /**
     * Добавление директив в Blade
     */
    public function applyBladeDirectives()
    {
        Blade::directive('spaceless', function () {
            return "<?php app('SlyDeath\Spaceless\BladeDirectives')->spaceless() ?>";
        });

        Blade::directive('endspaceless', function () {
            return "<?php echo app('SlyDeath\Spaceless\BladeDirectives')->endSpaceless() ?>";
        });
    }

    /**
     * Публикация конфигурации
     */
    public function publishConfig()
    {
        $config_path = __DIR__ . '/../config/spaceless.php';
        $publish_path = base_path('config/spaceless.php');

        $this->publishes([$config_path => $publish_path], 'config');
    }
}
