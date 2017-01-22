<?php

/**
 * SimpleForm
 *
 * This source file is subject to the BSD 3 License
 * For the full copyright and license information, please view 
 * the LICENSE.md file that are distributed with this source code.
 *
 * @copyright	Copyright (c) 2016 Tom Flídr (https://github.com/mvccore/simpleform)
 * @license		https://mvccore.github.io/docs/simpleform/3.0.0/LICENCE.md
 */

require_once('Core/Field.php');
require_once('Core/View.php');

class SimpleForm_Textarea extends SimpleForm_Core_Field
{
	public $Type = 'textarea';
	public $Rows = null;
	public $Cols = null;
	public $Maxlength = null;
	public $Validators = array('SafeString'/*, 'Maxlength', 'Pattern'*/);
	protected static $templates = array(
		'control'	=> '<textarea id="{id}" name="{name}"{attrs}>{value}</textarea>',
	);
	public function __construct(array $cfg = array()) {
		parent::__construct($cfg);
		static::$templates = (object) array_merge((array)parent::$templates, (array)self::$templates);
	}
	public function SetRows ($rows) {
		$this->Rows = $rows;
		return $this;
	}
	public function SetCols ($cols) {
		$this->Cols = $cols;
		return $this;
	}
	public function SetMaxlength ($maxlength) {
		$this->Maxlength = $maxlength;
		return $this;
	}
	public function OnAdded (SimpleForm & $form) {
		parent::OnAdded($form);
		if ($this->Maxlength && !in_array('Maxlength', $this->Validators)) {
			$this->Validators[] = 'Maxlength';
		}
	}
	public function RenderControl () {
		$attrsStr = $this->renderControlAttrsWithFieldVars(
			array('Maxlength', 'Rows', 'Cols')
		);
		return SimpleForm_Core_View::Format(static::$templates->control, array(
			'id'		=> $this->Id, 
			'name'		=> $this->Name, 
			'value'		=> $this->Value,
			'attrs'		=> $attrsStr ? " $attrsStr" : '', 
		));
	}
}
