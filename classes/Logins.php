<?php

namespace Martin\MonitorClient\Classes;

use DB;
use Illuminate\Http\Response;

class Logins extends Response {

    public static function info() :array
    {
        return Db::table('backend_access_log')
            ->select([
                'login',
                'email',
                'ip_address',
                'backend_access_log.created_at'
            ])
            ->join('backend_users', 'backend_access_log.user_id', '=', 'backend_users.id')
            ->orderBy('backend_access_log.created_at', 'desc')
            ->take(10)
            ->get()
            ->all();
    }

}
?>