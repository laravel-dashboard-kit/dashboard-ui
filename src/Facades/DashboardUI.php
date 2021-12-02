<?php

namespace LDK\DashboardUI\Facades;

use Illuminate\Support\Facades\Facade;

class DashboardUI extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dashboard-ui';
    }
}
