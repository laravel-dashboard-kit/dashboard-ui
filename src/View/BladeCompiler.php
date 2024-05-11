<?php

namespace LDK\DashboardUI\View;

use Illuminate\Support\Facades\View;
use Illuminate\View\Compilers\BladeCompiler as Compiler;

class BladeCompiler extends Compiler
{
    protected function compileUseLayout(string $layout = "blank")
    {
        $layout = str_replace(["'", '"'], '', $this->stripParentheses($layout));
        $expression = "'dashboard-ui::layouts.{$layout}'";

        $echo = "<?php echo \$__env->make({$expression}, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>";

        $this->footer[] = $echo;

        return '';
    }
}
