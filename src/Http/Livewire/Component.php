<?php

namespace LDK\DashboardUI\Http\Livewire;

use Akhaled\LivewireSweetalert\Fire;
use Akhaled\LivewireSweetalert\Toast;
use Akhaled\LivewireSweetalert\Confirm;
use Livewire\Component as BaseComponent;
use LDK\DashboardUI\Concerns\WithDashboardUI;

class Component extends BaseComponent
{
    use WithDashboardUI, Confirm, Toast, Fire;
}
