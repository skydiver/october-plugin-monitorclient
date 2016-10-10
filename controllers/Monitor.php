<?php

    namespace Martin\MonitorClient\Controllers;

    use Response;
    use Martin\MonitorClient\Classes\Updates;

    class Monitor extends \Backend\Classes\Controller {

        public function updates() {
            $updates = Updates::available();
            return \Response::json($updates);
        }
    }

?>