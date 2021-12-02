<?php

namespace LDK\DashboardUI\Facades;

use Illuminate\Support\Facades\Facade;

class DashboardNav extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dashboard-nav';
    }
}
