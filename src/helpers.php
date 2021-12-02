<?php

if (! function_exists('dashboard_ui')) {
    /**
     * Get DashboardUI facade
     *
     * @return LDK\DashboardUI\Facades\DashboardUI
     */
    function dashboard_ui()
    {
        return app('dashboard-ui');
    }
}
