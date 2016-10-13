<?php

    namespace Martin\MonitorClient\Updates;

    use Seeder;
    use Martin\MonitorClient\Models\Settings;

    class SeedDefaultToken extends Seeder {

        public function run() {
            Settings::set('token', str_random(50));
        }

    }

?>