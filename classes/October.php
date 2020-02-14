<?php

namespace Martin\MonitorClient\Classes;

use DB, File;
use Illuminate\Http\Response;
use Cms\Models\MaintenanceSetting;

class October extends Response {

    public static function info() :array
    {
        return [
            'installed_plugins' => self::plugins(),
            'installed_themes'  => self::themes(),
            'maintenance_mode'  => MaintenanceSetting::get('is_enabled')
        ];
    }

    private static function plugins() :array
    {
        return Db::table('system_plugin_versions')
            ->select('code', 'version', 'is_disabled', 'is_frozen')
            ->get()
            ->toArray();
    }

    private static function themes() :array
    {
        $data = [];
        if ($themes = opendir('themes')) {
            while (false !== ($theme = readdir($themes))) {
                if ($theme != '.' && $theme != '..' && !File::isFile($theme)) {
                    $data[] = $theme;
                }
            }
            closedir($themes);
        }
        return $data;
    }

}

?>