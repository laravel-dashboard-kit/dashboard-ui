<?php

namespace LDK\DashboardUI\Concerns;

use Livewire\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

/**
 * Structure is constant
 * - provider
 *  - ServiceProvider (we call bootLivewireComponents from here)
 * - http
 *  - livewire
 */
trait WithLivewireComponentsBooted
{
    public function bootLivewireComponents(string $base_dir): void
    {
        $this->bootLivewireComponentsArray(
            $this->readPhpFilesByPath($base_dir)
        );
    }

    private function bootLivewireComponentsArray(array $components): void
    {
        foreach ($components as $component) {
            if ($component instanceof Collection) {
                $this->registerLivewireComponent($component);
            } else {
                $this->bootLivewireComponentsArray($component);
            }
        }
    }

    private function registerLivewireComponent(Collection $component)
    {
        Livewire::component(
            $this->getComponentViewName($component),
            $component->full
        );
    }

    private function readPhpFilesByPath(string $base_dir): array
    {
        $scanned = scandir($base_dir);
        array_shift($scanned); // remove .
        array_shift($scanned); // remove .

        $files = [];

        foreach ($scanned as $entity) {
            if (is_dir("${base_dir}/${entity}")) {
                $files[] =$this->readPhpFilesByPath("${base_dir}/${entity}");
            } elseif (strtolower(pathinfo($entity, PATHINFO_EXTENSION)) == 'php') {
                $tmp = collect();
                $file = file_get_contents("{$base_dir}//{$entity}");
                $tmp->namespace = $this->extractNamespaceFromFile($file);
                $tmp->class = $this->extractClassNameFromFile($file);
                $tmp->full = implode("\\", [$tmp->namespace, $tmp->class]);
                $tmp->name = str_replace("\\", "", explode($this->livewireNamespace, $tmp->full)[1]);
                $files[] = $tmp;
            }
        }

        return $files;
    }

    private function extractNamespaceFromFile(string $file)
    {
        if (preg_match('#^namespace\s+(.+?);$#sm', $file, $m)) {
            return $m[1];
        }

        return null;
    }

    private function extractClassNameFromFile(string $file)
    {
        if (preg_match('#^class\s+(.+?)\sextends(.+?)$#sm', $file, $m)) {
            return $m[1];
        }

        return null;
    }

    private function getComponentViewName(Collection $component): string
    {
        return str_replace(
            "-component",
            "",
            sprintf(
                "%s::%s",
                $this->livewireBaseName,
                Str::kebab($component->name)
            )
        );
    }
}
