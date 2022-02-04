<?php

namespace LDK\DashboardUI\Providers\Concerns;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Blade;
use LDK\DashboardUI\Views\Components;
use Illuminate\View\Compilers\BladeCompiler;

trait WithComponentsBooted
{
    protected static $layoutNamespace = 'dashboard-app';
    protected static $componentNamespace = 'dashboard';

    public function bootstrapComponentsAndLayouts()
    {
        $theme = config('dashboard-ui.default.theme');
        $theme_views_path = base_path(config(sprintf("dashboard-ui.themes.%s.views_path", $theme)));

        $this->loadViewsFrom(
            $theme_views_path,
            'dashboard-ui'
        );

        $this->configureMainLayoutsAndComponents($theme_views_path);

        Blade::componentNamespace(Components::class, "dashboard");
    }

    protected function configureMainLayoutsAndComponents(string $theme_views_path)
    {
        $this->callAfterResolving(
            BladeCompiler::class,
            function () use ($theme_views_path) {
                Blade::component("dashboard-ui::layouts.".config('dashboard-ui.default.layout'), 'dashboard-app');

                $this->registerComponentsDirectory(
                    $this->readPhpFilesByPath("${theme_views_path}/layouts"),
                    "${theme_views_path}/layouts",
                    self::$layoutNamespace
                );

                $this->registerComponentsDirectory(
                    $this->readPhpFilesByPath("${theme_views_path}/components"),
                    "${theme_views_path}/components",
                    self::$componentNamespace
                );
            }
        );
    }

    /**
     * Register component directory files
     *
     * @param \Illuminate\Support\Collection $components
     * @param string $dir_name: full components path
     * @param string $namespace: prepend suffix before component name, ex: x-dashboard-form
     * @return void
     */
    private function registerComponentsDirectory(Collection $components, string $dir_name, string $namespace)
    {
        $components->each(function ($component_path) use ($dir_name, $namespace) {
            if ($component_path instanceof Collection) {
                $this->registerComponentsDirectory($component_path, $dir_name, $namespace);
            } elseif ($namespace == 'dashboard-app') {
                $this->registerComponent(
                    $this->getComponentName("layouts/${component_path}", $dir_name),
                    $this->getComponentSuffix($component_path, $dir_name, $namespace)
                );
            } else {
                $this->registerComponent(
                    $this->getComponentName("components/${component_path}", $dir_name),
                    $this->getComponentSuffix($component_path, $dir_name, $namespace)
                );
            }
        });
    }

    private function getComponentName(string $component_path, string $original_path)
    {
        return str_replace(["${original_path}/", '/'], ['', '.'], $component_path);
    }

    private function getComponentSuffix(string $component_path, string $original_path, string $namespace)
    {
        return implode("-", [$namespace, str_replace(["${original_path}/", '/'], ['', '-'], $component_path)]);
    }

    private function registerComponent(string $actual, string $alias)
    {
        Blade::component("dashboard-ui::${actual}", $alias);
    }

    private function readPhpFilesByPath(string $base_dir)
    {
        if (!File::exists($base_dir)) {
            return collect();
        }

        $scanned = collect(scandir($base_dir));
        $scanned->forget([0, 1]); // remove . & ..
        $files = collect();

        foreach ($scanned as $entity) {
            if (is_dir("${base_dir}/${entity}")) {
                $files->add(
                    $this->readPhpFilesByPath("${base_dir}/${entity}")
                );
            } elseif (strtolower(pathinfo($entity, PATHINFO_EXTENSION)) == 'php') {
                $files->add(
                    sprintf("%s/%s", $base_dir, str_replace('.blade.php', '', $entity))
                );
            }
        }

        return $files;
    }
}
