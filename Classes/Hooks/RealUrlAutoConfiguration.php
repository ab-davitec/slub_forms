<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Alexander Bigga <alexander.bigga@slub-dresden.de>, SLUB Dresden
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

/**
 * AutoConfigure Hook for RealUrl
 *
 * @package slub_forms
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */

class Tx_SlubForms_Hooks_RealUrlAutoConfiguration {

	/**
	 * Generates additional RealURL configuration and merges it with provided configuration
	 *
	 * @param       array $params Default configuration
	 * @param       tx_realurl_autoconfgen $pObj parent object
	 * @return      array Updated configuration
	 */
	function addFormsConfig($params, &$pObj) {

		return array_merge_recursive($params['config'], array(
				'postVarSets' => array(
					'_DEFAULT' => array(
						'slubform' => array(
							array(
								'GETvar' => 'tx_slubforms_sf[form]',
								'lookUpTable' => array(
									'table' => 'tx_slubforms_domain_model_forms',
									'id_field' => 'uid',
									'alias_field' => 'shortname',
									'useUniqueCache' => 1,
									'useUniqueCache_conf' => array(
										'strtolower' => 1,
										'spaceCharacter' => '-',
									),
								),
							),
						),
					)
				)
			)
		);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/slub_forms/Classes/Hooks/RealUrlAutoconf.php']) {
	require_once ($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/slub_forms/Classes/Hooks/RealUrlAutoconf.php']);
}