<?php

/**
 * MvcCore
 *
 * This source file is subject to the BSD 3 License
 * For the full copyright and license information, please view
 * the LICENSE.md file that are distributed with this source code.
 *
 * @copyright	Copyright (c) 2016 Tom Flídr (https://github.com/mvccore/mvccore)
 * @license		https://mvccore.github.io/docs/mvccore/4.0.0/LICENCE.md
 */

namespace MvcCore\Ext\Form;

require_once('Date.php');

class DateTime extends Date
{
	public $Type = 'datetime-local';
	public $Format = 'Y-m-d\TH:i';
	public $Validators = array('Date');
}
