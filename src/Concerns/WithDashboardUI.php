<?php

namespace LDK\DashboardUI\Concerns;

/**
 * Livewire methods
 */
trait WithDashboardUI
{
    public function reloadWindow()
    {
        $this->dispatchBrowserEvent('windowReload');
    }
}
