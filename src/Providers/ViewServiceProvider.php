<?php

namespace LDK\DashboardUI\Providers;

use Illuminate\View\DynamicComponent;
use LDK\DashboardUI\View\BladeCompiler;
use Illuminate\View\ViewServiceProvider as ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function registerBladeCompiler()
    {
        $this->app->singleton('blade.compiler', function ($app) {
            return tap(new BladeCompiler(
                $app['files'],
                $app['config']['view.compiled'],
                $app['config']->get('view.relative_hash', false) ? $app->basePath() : '',
                $app['config']->get('view.cache', true),
                $app['config']->get('view.compiled_extension', 'php'),
            ), function ($blade) {
                $blade->component('dynamic-component', DynamicComponent::class);
            });
        });
    }
}
