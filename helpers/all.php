<?php

if (! function_exists('is_rtl')) {
    /**
     * Return is rtl when app locale is rtl language
     *
     * @param string $rtl
     * @param string $ltr
     * @return boolean
     */
    function is_rtl()
    {
        return config('app.locale') == 'ar';
    }
}

if (! function_exists('dashboard_rtl')) {
    /**
     * Return css class for rtl and ltr
     *
     * @param string $rtl
     * @param string $ltr
     * @return string
     */
    function dashboard_rtl(string $rtl, string $ltr)
    {
        return is_rtl() ? $rtl : $ltr;
    }
}

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
