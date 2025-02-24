<?php

/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @source https://github.com/jbrule/matomoplugin-HidePasswordReset/blob/5.x-dev/SystemSettings.php
 * @source https://github.com/openmost/CodeInjector/blob/5.x-dev/SystemSettings.php
 */

namespace Piwik\Plugins\Enhancements;

use Piwik\Piwik;
use Piwik\Settings\Setting;
use Piwik\Settings\FieldConfig;

class SystemSettings extends \Piwik\Settings\Plugin\SystemSettings
{
	/** @var Setting */
	public $bodyTop;
	
	/** @var Setting */
	public $bodyBottom;
	
	/** @var Setting */
	public $message;

	/**
	 */
	protected function init()
	{
		$attributes = [
			'rows' => 10, 
			'style' => 'min-height: 250px !important; font-family: monospace;'
		];
		$this->bodyTop = $this->makeSetting(
			'bodyTop', 
			'', 
			FieldConfig::TYPE_STRING, 
			function (FieldConfig $field) use ($attributes) {
				$field->title = Piwik::translate('CodeInjector_BodyTopTitle');
				$field->uiControl = FieldConfig::UI_CONTROL_TEXTAREA;
				$field->uiControlAttributes = $attributes;
				$field->description = Piwik::translate('CodeInjector_BodyTopDescription');
			}
		);
		$this->bodyBottom = $this->makeSetting(
			'bodyBottom', 
			'', 
			FieldConfig::TYPE_STRING, 
			function (FieldConfig $field) use ($attributes) {
				$field->title = Piwik::translate('CodeInjector_BodyBottomTitle');
				$field->uiControl = FieldConfig::UI_CONTROL_TEXTAREA;
				$field->uiControlAttributes = $attributes;
				$field->description = Piwik::translate('CodeInjector_BodyBottomDescription');
			}
		);
		$this->message = $this->makeSetting(
			'message', 
			'', 
			FieldConfig::TYPE_STRING, 
			function (FieldConfig $field) {
				$field->title = 'Login Message';
				$field->uiControl = FieldConfig::UI_CONTROL_TEXTAREA;
				$field->description = 'Message to display in lieu of "Lost your password?"';
			}
		);
	}
}
