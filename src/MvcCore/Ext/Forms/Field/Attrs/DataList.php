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

namespace MvcCore\Ext\Forms\Field\Attrs;

/**
 * Trait for classes:
 * - \MvcCore\Ext\Forms\Fields\Color
 * - \MvcCore\Ext\Forms\Fields\Date
 *    - \MvcCore\Ext\Forms\Fields\DateTime
 *    - \MvcCore\Ext\Forms\Fields\Month
 *    - \MvcCore\Ext\Forms\Fields\Time
 *    - \MvcCore\Ext\Forms\Fields\Week
 * - \MvcCore\Ext\Forms\Fields\Number
 *    - \MvcCore\Ext\Forms\Fields\Range
 * - \MvcCore\Ext\Forms\Fields\ResetInput
 * - \MvcCore\Ext\Forms\Fields\Text
 *    - \MvcCore\Ext\Forms\Fields\Email
 *    - \MvcCore\Ext\Forms\Fields\Password
 *    - \MvcCore\Ext\Forms\Fields\Search
 *    - \MvcCore\Ext\Forms\Fields\Tel
 *    - \MvcCore\Ext\Forms\Fields\Url
 */
trait DataList
{
	/**
	 * Element `list` attribute value - the `<list>` element `id` attribute value.
	 * @var string|NULL
	 */
	protected $list = NULL;

	/**
	 * Get element `list` attribute value - the `<list>` element `id` attribute value.
	 * @return string|NULL
	 */
	public function GetList () {
		return $this->list;
	}

	/**
	 * Set element `list` attribute value - the `<list>` element `id` attribute value.
	 * @param string $dataListId 
	 * @return \MvcCore\Ext\Forms\Field|\MvcCore\Ext\Forms\IField
	 */
	public function & SetList ($dataListId) {
		$this->list = $dataListId;
		return $this;
	}
}
