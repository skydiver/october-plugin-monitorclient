<?php

namespace Martin\MonitorClient\Classes;

use Illuminate\Http\Response;

class PHP extends Response {

    public static function info() {
        return [
            'version'      => phpversion(),
            'upload_limit' => str_replace('M', ' MB', ini_get('upload_max_filesize')),
            'memory_limit' => str_replace('M', ' MB', ini_get('memory_limit')),
            'timezone'     => str_replace('/', ' / ', ini_get('date.timezone'))
        ];
    }

}

?>