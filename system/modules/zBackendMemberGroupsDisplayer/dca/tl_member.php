<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2014 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013-2014
 * @author     Cliff Parnitzky
 * @package    BackendMemberGroupsDisplayer
 * @license    LGPL
 */

// add new label callback
$GLOBALS['TL_DCA']['tl_member']['list']['label']['label_callback'] = array('tl_member_BackendMemberGroupsDisplayer', 'setLabel');

if (version_compare(VERSION, '2.11', '>='))
{ 
	// add groups to fields list 
	$GLOBALS['TL_DCA']['tl_member']['list']['label']['fields'][] = 'groups';
}

/**
 * Class tl_member_BackendMemberGroupsDisplayer
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013-2014
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_member_BackendMemberGroupsDisplayer extends tl_member
{
	/**
	 * Set the new label
	 * @param array
	 * @param string
	 * @return string
	 */
	public function setLabel($row, $label, DataContainer $dc=null, $args=array())
	{
		$this->import("BackendMemberGroupsDisplayer");
		
		if (version_compare(VERSION, '2.11', '>='))
		{
			$args = parent::addIcon($row, $label, $dc, $args);

			$groupsColumnIndex = array_search('groups', $GLOBALS['TL_DCA']['tl_member']['list']['label']['fields']);
			if ($groupsColumnIndex !== FALSE)
			{
				$args[$groupsColumnIndex] = $this->BackendMemberGroupsDisplayer->getMemberGroupNames(deserialize($row['groups']), false);
			}

			return $args;
		}
		else
		{
			return parent::addIcon($row, $label) . $this->BackendMemberGroupsDisplayer->getMemberGroupNames(deserialize($row['groups']));
		}
	}
}

?>