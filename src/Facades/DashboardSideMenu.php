<?php

namespace LDK\DashboardUI\Facades;

use Illuminate\Support\Facades\Facade;

class DashboardSideMenu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dashboard-side-menu';
    }
}
