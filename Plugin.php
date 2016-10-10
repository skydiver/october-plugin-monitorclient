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

    }

?>