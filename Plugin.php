<?php

namespace Martin\MonitorClient;

use System\Classes\PluginBase;

class Plugin extends PluginBase {

    public function pluginDetails() {
        return [
            'name'        => 'martin.monitorclient::lang.plugin.name',
            'description' => 'martin.monitorclient::lang.plugin.description',
            'author'      => 'Martin M.',
            'icon'        => 'icon-cog',
            'homepage'    => 'https://octobercms.com/author/Martin'
        ];
    }

    public function registerSettings() {
        return [
            'settings' => [
                'label'       => 'martin.monitorclient::lang.settings.label',
                'description' => 'martin.monitorclient::lang.settings.description',
                'icon'        => 'icon-cog',
                'class'       => '\Martin\MonitorClient\Models\Settings',
                'order'       => 800,
                'permissions' => ['martin.monitorclient.access_monitorclient'],
                'category'    => 'system::lang.system.categories.system'
            ]
        ];
    }
    public function registerPermissions() {
        return [
            'martin.monitorclient.access_monitorclient' => [
                'tab'   => 'martin.monitorclient::lang.permissions.tab',
                'label' => 'martin.monitorclient::lang.permissions.label'
            ],
        ];
    }

}

?>