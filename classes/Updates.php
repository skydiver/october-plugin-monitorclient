<?php

namespace Martin\MonitorClient\Classes;

use Illuminate\Http\Response;
use System\Classes\UpdateManager;

class Updates extends Response {

    public static function available() {

        $manager = UpdateManager::instance();
        $updates = $manager->requestUpdateList(true);
        $return  = ['core' => [], 'plugins' => []];

        if (isset($updates['core'])) {
            $return['core'] = [
                'old' => $updates['core']['old_build'],
                'new' => $updates['core']['build']
            ];
        }

        if (isset($updates['plugins']) && count($updates['plugins']) > 0) {
            foreach ($updates['plugins'] as $name => $plugin) {
                $return['plugins'][] = [
                    'name'      => $plugin['name'],
                    'namespace' => $name,
                    'old'       => $plugin['old_version'],
                    'new'       => $plugin['version']
                ];
            }
        }

        return $return;

    }

}

?>