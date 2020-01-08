<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\TrackerHostname;

use Piwik\Plugin;

class TrackerHostname extends Plugin
{
    public function registerEvents()
    {
        return array(
            'Piwik.getJavascriptCode' => array(
                'function' => 'customizeTrackerHostname',
                'before' => true,
            ),
            'SitesManager.getImageTrackingCode' => array(
                'function' => 'customizeImageTrackerHostname',
                'before' => true,
            )
        );
    }

    public function customizeTrackerHostname(&$codeImpl, $parameters)
    {
        $settings = new SystemSettings();
        if ($tracker = $settings->trackerHostname->getValue()) {
            $codeImpl['piwikUrl'] = $tracker;
        }
    }

    public function customizeImageTrackerHostname(&$piwikUrl, &$urlParams)
    {
        $settings = new SystemSettings();
        if ($hostname = $settings->trackerHostname->getValue()) {
            $piwikUrl = $hostname;
        }
    }
}
