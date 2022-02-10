<?php

namespace LDK\DashboardUI\Services;

use Illuminate\Support\Facades\Session;
use Mckenziearts\Notify\Facades\LaravelNotify;

class NotifyService
{
    public function __call(string $method, array $arguments)
    {
        return $this->well($arguments[0], $arguments[1] ?? 'info', $method);
    }

    public function well(string $message, string $type = 'info', string $method = 'flash')
    {
        Session::flash($type, $message);

        return $this;
    }

    /**
     * Send notify message
     *
     * @param string $message
     * @param string $type
     * @return self
     */
    public function toast(string $message, string $type = 'success')
    {
        LaravelNotify::$type($message);

        return $this;
    }
}
