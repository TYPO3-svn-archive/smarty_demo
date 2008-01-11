<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2007 Simon Tuck <stu@rtpartner.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Smarty Demo' for the 'smarty_demo' extension.
 *
 * @author	Simon Tuck <stu@rtpartner.ch>
 * @package	TYPO3
 * @subpackage	tx_smartydemo
 */
class tx_smartydemo_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_smartydemo_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_smartydemo_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'smarty_demo';	// The extension key.
	var $pi_checkCHash = true;

	var $demoData; // Test data
	var $demoText; // Test text

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content,$conf)	{
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		// Step 1: Create a new instance of Smarty
		$mySmartyInstance = tx_smarty::smarty();

		// Step 2: Get your data/content
		$this->setDemoContent(); // Set the demo data & text

		// Step 3: Assign your data to the Smarty instance
		$mySmartyInstance->assign('demo_data', $this->getDemoData());
		$mySmartyInstance->assign('demo_text', $this->getDemoText());

		// Step 4: Process the template and return the parsed HTML
		return $mySmartyInstance->display('template.html');
	}

	// Set test data & text
	function setDemoContent() {
	    $this->setDemoData();
	    $this->setDemoText();
	}

	// Test data, setter
	function setDemoData() {
		// Test data. Equivalent to what you might get from a DB query
		$this->demoData =array(
			array(
				'uid' => '1',
				'name' => 'Ryan Burgess',
				'city' => 'Wynne',
				'country' => 'Bahamas',
				'email' => 'malesuada@laciniaorciconsectetuer.com',
			),
			array(
				'uid' => '2',
				'name' => 'Galvin Clarke',
				'city' => 'Selma',
				'country' => 'Uruguay',
				'email' => 'nisi@velitCraslorem.edu',
			),
			array(
				'uid' => '3',
				'name' => 'Tanek Church',
				'city' => 'Beaumont',
				'country' => 'United Arab Emirates',
				'email' => 'eget@nec.ca',
			),
			array(
				'uid' => '4',
				'name' => 'Cyrus Flynn',
				'city' => 'Lawndale',
				'country' => 'United States Minor Outlying Islands',
				'email' => 'tellus@turpisAliquamadipiscing.org',
			),
			array(
				'uid' => '5',
				'name' => 'Jack Witt',
				'city' => 'Hawaiian Gardens',
				'country' => 'Swaziland',
				'email' => 'Proin.sed@diamDuismi.ca',
			),
		);
	}

	// Test data, getter
	function getDemoData() {
	    return $this->demoData;
	}

	// Test text, setter
	function setDemoText() {
		// Test text. Equivalent to what you might get from tt_content
	    $this->demoText =
			'Assertively redefine ubiquitous benefits whereas cross functional platforms. Dynamically impact collaborative mindshare via vertical technology. Rapidiously cultivate standardized innovation vis-a-vis interoperable systems.
			Efficiently synthesize global quality vectors without alternative scenarios. Compellingly simplify distinctive convergence after extensible relationships. Synergistically disseminate front-end scenarios for inexpensive systems.
			Globally streamline flexible resources after team building communities. Continually productivate market-driven core competencies with scalable supply chains. Holisticly revolutionize distributed infrastructures and extensible web services.';
	}

	// Test text, getter
	function getDemoText() {
	    return $this->demoText;
	}

}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/smarty_demo/pi1/class.tx_smartydemo_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/smarty_demo/pi1/class.tx_smartydemo_pi1.php']);
}

?>