<?php

namespace Martin\MonitorClient\Controllers;

use App, Config, Response;
use Martin\MonitorClient\Classes\Updates;
use Martin\MonitorClient\Models\Settings;

class Monitor extends \Backend\Classes\Controller {

    public $publicActions = ['updates'];

    public function updates($token=null) {

        if ($token === '' OR $token !== Settings::get('token')) {
            App::abort(404, '404 Not Found');
        }

        $updates = Updates::available();

        if (Settings::get('enable_encryption')) {
            $cipher = Config::get('app.cipher');
            $key = \Str::replaceFirst('base64:', '', Config::get('app.key'));
            $key = base64_decode($key);
            $newEncrypter = new \Illuminate\Encryption\Encrypter($key, $cipher);
            $updates = $newEncrypter->encrypt($updates);
        }

        return Response::json($updates);

    }

}

?>