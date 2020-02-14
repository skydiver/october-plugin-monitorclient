<?php

namespace Martin\MonitorClient\Classes;

use Request;
use Illuminate\Http\Response;

class Server extends Response {

    public static function info() {
        return [
            'os'      => php_uname('s'),
            'host'    => php_uname('n'),
            'release' => php_uname('r'),
            'version' => php_uname('v'),
            'machine' => php_uname('m'),
            'ip'      => Request::ip(),
        ];
    }

}

?>