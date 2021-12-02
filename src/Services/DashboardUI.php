<?php

namespace LDK\DashboardUI\Services;

class DashboardUI
{
    protected $title;

    public function title(string $prepend = '')
    {
        if (!$this->title) {
            $this->setTitle(config('app.name'));
        }

        return $prepend . ' | ' . $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function nav()
    {
        return app('dashboard-nav');
    }

    public function sideMenu()
    {
        return app('dashboard-side-menu');
    }
}
