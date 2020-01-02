<?php

namespace Piwik\Plugins\TrackerHostname;

use Piwik\Piwik;
use Piwik\Settings\FieldConfig;
use Piwik\Settings\Plugin\SystemSettings as BaseSystemSettings;
use Piwik\Settings\Setting;

class SystemSettings extends BaseSystemSettings
{
    public $trackerHostname;

    protected function init()
    {
        $this->trackerHostname = $this->createTrackerHostnameSetting();
    }

    private function createTrackerHostnameSetting()
    {
        $default = null;

        return $this->makeSetting('hostname', $default, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = Piwik::translate('TrackerHostname_TrackerURLTitle');
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = Piwik::translate('TrackerHostname_TrackerURLDescription');
            $field->transform = function ($value, Setting $setting) {
                if ($value) {
                    $value = preg_replace('/^(http[s]?:\/\/)?(.*)$/im', '$2', $value);
                }
                return strtolower($value);
            };
        });
    }
}
