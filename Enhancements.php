<?php

/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @see https://github.com/jbrule/matomoplugin-HidePasswordReset
 */

namespace Piwik\Plugins\Enhancements;

class Enhancements extends \Piwik\Plugin
{
	public function isTrackerPlugin()
	{
		return true;
	}

	public function registerEvents()
	{
		return [
			'Template.bodyBottom' => 'printCodeToBodyBottom',
			'Template.bodyTop' => 'printCodeToBodyTop',
			'Template.loginNav' => 'commentOutElement',
			'Template.loginNav' => 'commentOutElement',
		];
	}

	public function printCodeToBodyBottom()
	{
		echo (new SystemSettings())->bodyBottom->getValue();
	}

	public function printCodeToBodyTop()
	{
		echo (new SystemSettings())->bodyTop->getValue();
	}

	public function commentOutElement(&$output, $area){
		if($area === 'top') $output = '<!--'; //open the comment
		else if($area === 'bottom'){
			$output = '-->'; //close the comment

			$message = \Piwik\Common::sanitizeInputValues((new SystemSettings())->message->getValue());
			if (strlen($message) < 4) $output .= $message; 
			else {
				$words = explode(' ', $message);
				foreach ($words as $word) {
					$output .= str_starts_with($word, 'https://') ?
						"<a href=\"$word\" target=\"_blank\">$word</a> " :
						"$word ";
				}
				unset($words);
				unset($word);
			}
			unset($message) ;
		}
	}
}