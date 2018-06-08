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

namespace MvcCore\Ext\Forms\Validators;

class Date extends \MvcCore\Ext\Forms\Validator
{
	use \MvcCore\Ext\Forms\Field\Attrs\Format;
	use \MvcCore\Ext\Forms\Field\Attrs\MinMaxStepDates;

	/**
	 * Error message index(es).
	 * @var int
	 */
	const ERROR_DATE_INVALID	= 0;
	const ERROR_DATE_TO_LOW		= 1;
	const ERROR_DATE_TO_HIGH	= 2;
	const ERROR_TIME			= 3;
	const ERROR_TIME_TO_LOW		= 4;
	const ERROR_TIME_TO_HIGH	= 5;
	const ERROR_DATETIME		= 6;

	/**
	 * Validation failure message template definitions.
	 * @var array
	 */
	protected static $errorMessages = [
		self::ERROR_DATE_INVALID	=> "Field '{0}' requires a valid date format: '{1}'.",
		self::ERROR_DATE_TO_LOW		=> "Field '{0}' requires date higher or equal to '{1}'.",
		self::ERROR_DATE_TO_HIGH	=> "Field '{0}' requires date lower or equal to '{1}'.",
		self::ERROR_TIME			=> "Field '{0}' requires a valid time format: '00:00 - 23:59'.",
		self::ERROR_TIME_TO_LOW		=> "Field '{0}' requires time higher or equal to '{1}'.",
		self::ERROR_TIME_TO_HIGH	=> "Field '{0}' requires time lower or equal to '{1}'.",
		self::ERROR_DATETIME		=> "Field '{0}' requires a valid date time format: '{1}'.",
	];

	protected $format = NULL;

	protected static $errorMessagesFormatReplacements = [
		'd' => 'dd',
		'j' => 'd',
		'D' => 'Mon-Sun',
		'l' => 'Monday-Sunday',
		'm' => 'mm',
		'n' => 'm',
		'M' => 'Jan-Dec',
		'F' => 'January-December',
		'Y' => 'yyyy',
		'y' => 'yy',
		'a' => 'am',
		'A' => 'pm',
		'g' => '1-12',
		'h' => '01-12',
		'G' => '01-12',
		'H' => '00-23',
		'i' => '00-59',
		's' => '00-59',
		'u' => '0-999999',
	];

	/**
	 * Set up field instance, where is validated value by this 
	 * validator durring submit before every `Validate()` method call.
	 * This method is also called once, when validator instance is separately 
	 * added into already created field instance to process any field checking.
	 * @param \MvcCore\Ext\Forms\Field|\MvcCore\Ext\Forms\IField $field 
	 * @return \MvcCore\Ext\Forms\Validator|\MvcCore\Ext\Forms\IValidator
	 */
	public function & SetField (\MvcCore\Ext\Forms\IField & $field) {
		parent::SetField($field);
		
		if (!$field instanceof \MvcCore\Ext\Forms\Fields\IFormat)
			$this->throwNewInvalidArgumentException(
				"Field `".$field->GetName()."` doesn't implement interface `\\MvcCore\\Ext\\Forms\\Fields\\IFormat`."
			);
		
		if (!$field instanceof \MvcCore\Ext\Forms\Fields\IMinMaxStep)
			$this->throwNewInvalidArgumentException(
				"Field `".$field->GetName()."` doesn't implement interface `\\MvcCore\\Ext\\Forms\\Fields\\IMinMaxStep`."
			);

		if ($this->format !== NULL && $field->GetFormat() === NULL) {
			// if this validator is added into field as instance - check field if it has format attribute defined:
			$field->SetFormat($this->format);
		} else if ($this->format === NULL && $field->GetFormat() !== NULL) {
			// if validator is added as string - get format property from field:
			$this->format = $field->GetFormat();
		}
		if ($this->format === NULL) {
			$this->throwNewInvalidArgumentException(
				'No `format` property defined in current validator or in field.'	
			);
		}

		if ($this->min !== NULL && $field->GetMin() === NULL) {
			$field->SetMin($this->min);
		} else if ($this->min === NULL && $field->GetMin() !== NULL) {
			$this->min = $field->GetMin();
		}
		if ($this->max !== NULL && $field->GetMax() === NULL) {
			$field->SetMax($this->max);
		} else if ($this->max === NULL && $field->GetMax() !== NULL) {
			$this->max = $field->GetMax();
		}
		if ($this->step !== NULL && $field->GetStep() === NULL) {
			$field->SetStep($this->step);
		} else if ($this->step === NULL && $field->GetStep() !== NULL) {
			$this->step = $field->GetStep();
		}

		return $this;
	}

	public function Validate ($rawSubmittedValue) {
		$rawSubmittedValue = trim((string) $rawSubmittedValue);
		$safeValue = preg_replace('#[^a-zA-Z0-9\:\.\-\,/ ]#', '', $rawSubmittedValue);
		$date = @date_create_from_format($this->format, $safeValue);
		if ($date === FALSE || mb_strlen($safeValue) !== mb_strlen($rawSubmittedValue)) {
			$this->field->AddValidationError(
				static::GetErrorMessage(static::ERROR_DATE_INVALID),
				[$this->format]
			);
			$date = NULL;
		} else {
			$fieldType = $this->field->GetType();
			if ($fieldType == 'date' || $fieldType == 'week' || $fieldType == 'month') 
				$date->setTime(0, 0, 0, 0);
			x($date);
			$this->checkMinMax($date);
			$this->checkStep($date);
		}
		return $date;
	}

	protected function checkMinMax (\DateTimeInterface & $date) {
		if ($this->min !== NULL && $date < $this->min) {
			$this->field->AddValidationError(
				static::GetErrorMessage(static::ERROR_DATE_TO_LOW),
				[$this->min->format($this->format)]
			);
		}
		if ($this->max !== NULL && $date > $this->max) {
			$this->field->AddValidationError(
				static::GetErrorMessage(static::ERROR_DATE_TO_HIGH),
				[$this->max->format($this->format)]
			);
		}
	}
	protected function checkStep ($safeValue) {
		if ($this->step !== NULL) {

		}
	}
}
