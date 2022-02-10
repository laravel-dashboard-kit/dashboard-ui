<?php
namespace LDK\DashboardUI\Http\Livewire;

use Mediconesystems\LivewireDatatables\Column as BaseColumn;

class Column extends BaseColumn
{
    public static function edit($name = 'id')
    {
        return static::callback($name, function ($value) {
            return view('datatables::edit', ['value' => $value]);
        });
    }

    public static function editAndDelete($editFormAction, $name = 'id')
    {
        return static::callback($name, function ($value) use ($editFormAction) {
            return view('datatables::edit', ['value' => $value, 'formAction' => $editFormAction]) . view('datatables::delete', ['value' => $value]);
        });
    }
}
