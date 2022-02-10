<?php

namespace LDK\DashboardUI\Providers;


use LDK\DashboardUI\Services\Nav;
use Illuminate\Support\Facades\Blade;
use LDK\DashboardUI\Services\SideMenu;
use Illuminate\Support\ServiceProvider;
use LDK\DashboardUI\Services\DashboardUI;
use LDK\DashboardUI\Services\NotifyService;
use LDK\DashboardUI\Providers\Concerns\WithComponentsBooted;

class DashboardUIServiceProvider extends ServiceProvider
{
    use WithComponentsBooted;

    public function register()
    {
        config(['blade-icons.attributes' => [
            'width' => 24,
            'height' => 24,
        ]]);

        $this->mergeConfigFrom(__DIR__ . '/../../config/livewire-datatables.php', 'livewire-datatables');
        $this->mergeConfigFrom(__DIR__.'/../../config/blade-javascript.php', 'blade-javascript');
        $this->mergeConfigFrom(__DIR__ . '/../../config/dashboard-ui.php', 'dashboard-ui');

        $theme = config('dashboard-ui.default.theme');
        $theme_views_path = base_path(config(sprintf("dashboard-ui.themes.%s.views_path", $theme)));

        $this->registerServices();
        $this->bindVendorViews($theme_views_path);
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->configurePublishing();
        }

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'dashboard-abstract');
        $this->loadTranslationsFrom(__DIR__ .'/../../resources/lang', 'dashboard');

        Blade::directive('attributes', function ($attributes) {
            return "<?php echo implode(' ', array_map("
                . "function (\$v, \$k) { return sprintf(\"%s='%s'\", \$k, \$v); },"
                . "$attributes,"
                . "array_keys($attributes)"
            . ")); ?>";
        });

        $this->bootstrapComponentsAndLayouts();
    }

    protected function configurePublishing()
    {
        $assets = [
            __DIR__ . '/../../public/assets' => public_path('assets/dashboard/abstract'),
        ];

        foreach (config('dashboard-ui.themes') as $name => $theme) {
            $assets[base_path($theme['assets_dir'])] = public_path("assets/dashboard/${name}");
        }

        $this->publishes($assets, 'dashboard-ui');
    }

    protected function bindVendorViews(string $theme_views_path)
    {
        /**
         * Livewire datatables
         * @see https://github.com/MedicOneSystems/livewire-datatables/blob/master/src/LivewireDatatablesServiceProvider.php#L24
         */
        $this->loadViewsFrom($theme_views_path . '/vendor/livewire/datatables', 'datatables');
        $this->loadViewsFrom($theme_views_path . '/vendor/livewire/datatables/icons', 'icons');

        /**
         * Livewire select
         * @see https://github.com/asantibanez/livewire-select/blob/96f92438a3ca97eb0ca4b539a28c298688fb8362/src/LivewireSelectServiceProvider.php#L18
         */
        $this->loadViewsFrom($theme_views_path . '/vendor/livewire/select', 'livewire-select');

        $this->loadViewsFrom(__DIR__.'/../../resources/views/vendor/bladeJavaScript', 'bladeJavaScript');
    }

    protected function registerServices()
    {
        $this->app->bind('dashboard-ui', function () {
            return new DashboardUI;
        });

        $this->app->bind('dashboard-nav', function () {
            return new Nav;
        });

        $this->app->bind('dashboard-side-menu', function () {
            return new SideMenu;
        });

        $this->app->bind('LDKNotify', function () {
            return new NotifyService;
        });
    }
}
