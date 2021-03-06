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
$GLOBALS['TL_DCA']['tl_news_archive']['list']['label']['label_callback'] = array('tl_news_archive_BackendMemberGroupsDisplayer', 'setLabel');

/**
 * Class tl_news_archive_BackendMemberGroupsDisplayer
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2013-2014
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_news_archive_BackendMemberGroupsDisplayer extends tl_news_archive
{
	/**
	 * Set the new label
	 * @param array
	 * @param string
	 * @return string
	 */
	public function setLabel($row, $label)
	{
		$this->import("BackendMemberGroupsDisplayer");
		return $label . ($row['protected'] ? $this->BackendMemberGroupsDisplayer->getMemberGroupNames(deserialize($row['groups'])) : '');
	}
}

?>