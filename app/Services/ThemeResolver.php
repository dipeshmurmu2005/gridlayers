<?php

namespace App\Services;

class ThemeResolver
{
    public static function page($page): string
    {
        $tenant = app('tenant');
        $theme = strtolower($tenant->businessType->themes()->where('id', $tenant->theme_id)->first()->name);
        $businessname = strtolower($tenant->businessType->name);
        return "livewire.business.{$businessname}.themes.{$theme}.{$page}";
    }

    public static function layout($layout): string
    {
        $tenant = app('tenant');
        $theme = strtolower($tenant->businessType->themes()->where('id', $tenant->theme_id)->first()->name);
        $businessname = strtolower($tenant->businessType->name);
        return "layouts.business.{$businessname}.themes.{$theme}.{$layout}";
    }
}
