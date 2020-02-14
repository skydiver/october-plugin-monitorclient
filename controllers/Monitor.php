<?php

namespace Martin\MonitorClient\Controllers;

use App, Config, Response;
use Martin\MonitorClient\Classes\Logins;
use Martin\MonitorClient\Classes\Logs;
use Martin\MonitorClient\Classes\October;
use Martin\MonitorClient\Classes\PHP;
use Martin\MonitorClient\Classes\Server;
use Martin\MonitorClient\Classes\Updates;

use Martin\MonitorClient\Models\Settings;
use Illuminate\Encryption\Encrypter;

class Monitor extends \Backend\Classes\Controller {

    public $publicActions = ['status'];

    public function status($token=null) {

        if ($token === '' OR $token !== Settings::get('token')) {
            App::abort(404);
        }

        // get information
        $updates = Updates::available();
        $server  = Server::info();
        $php     = PHP::info();
        $october = October::info();
        $logins  = Logins::info();
        $logs    = Logs::info();

        $data = compact('updates', 'server', 'php', 'october', 'logins', 'logs');

        if (!Settings::get('enable_encryption')) {
            return Response::json($data);
        }

        // return encrypted data
        $cipher = Config::get('app.cipher');
        $key = \Str::replaceFirst('base64:', '', Config::get('app.key'));
        $key = base64_decode($key);
        $newEncrypter = new Encrypter($key, $cipher);
        $data = $newEncrypter->encrypt($data);
        return Response::json($data);

    }

}

?>