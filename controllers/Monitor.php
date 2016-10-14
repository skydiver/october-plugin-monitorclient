<?php

    namespace Martin\MonitorClient\Controllers;

    use App, Response;
    use Martin\MonitorClient\Classes\Updates;
    use Martin\MonitorClient\Models\Settings;

    class Monitor extends \Backend\Classes\Controller {

        public $publicActions = ['updates'];

        public function updates($token=null) {

            if($token == '' OR $token != Settings::get('token')) {
                App::abort(404, '404 Not Found');
            }

            $updates = Updates::available();
            return \Response::json($updates);

        }
    }

?>