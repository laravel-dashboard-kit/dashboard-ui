<?php

namespace LDK\DashboardUI\Exceptions;

use Exception;

class ColorNotSupported extends Exception {
    protected $message = "Append your custom color in dashboard-ui.php to `supported-colors` array";
}