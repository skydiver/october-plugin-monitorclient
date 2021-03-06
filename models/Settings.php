<?php

namespace Martin\MonitorClient\Models;

use Model;

class Settings extends Model {

    public $attributeNames;
    public $implement      = ['System.Behaviors.SettingsModel'];
    public $settingsCode   = 'martin_monitorclient_settings';
    public $settingsFields = 'fields.yaml';

}

?>