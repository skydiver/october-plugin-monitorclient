<?php

namespace Martin\MonitorClient\Classes;

use DB;
use Illuminate\Http\Response;

class Logs extends Response {

    public static function info() :array
    {
        return [
            'access'  => Db::table('backend_access_log')->count(),
            'event'   => Db::table('system_event_logs')->count(),
            'request' => Db::table('system_request_logs')->count(),
        ];
    }

}
?>