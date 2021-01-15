<?php

/**
 * MvcCore
 *
 * This source file is subject to the BSD 3 License
 * For the full copyright and license information, please view
 * the LICENSE.md file that are distributed with this source code.
 *
 * @copyright	Copyright (c) 2016 Tom Flidr (https://github.com/mvccore)
 * @license		https://mvccore.github.io/docs/mvccore/5.0.0/LICENCE.md
 */

namespace MvcCore\Ext\Form;

/**
 * Trait for class `MvcCore\Ext\Form` containing getter methods for configurable properties.
 */
trait GetMethods {

	/**
	 * Get form id, required to configure.
	 * Used to identify session data, error messages,
	 * CSRF tokens, html form attribute id value and much more.
	 * @return string|NULL
	 */
	public function GetId () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->id;
	}

	/**
	 * Get form submitting URL value.
	 * It could be relative or absolute, anything
	 * to complete classic html form attribute `action`.
	 * @return string|NULL
	 */
	public function GetAction () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->action;
	}

	/**
	 * Get form http submitting method. `POST` by default.
	 * Use `GET` only if form data contains only ASCII characters.
	 * Possible values: `'POST' | 'GET'`
	 * You can use constants:
	 * - `\MvcCore\Ext\IForm::METHOD_POST`
	 * - `\MvcCore\Ext\IForm::METHOD_GET`
	 * @return string|NULL
	 */
	public function GetMethod () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->method;
	}

	/**
	 * Get form title, global HTML attribute, optional.
	 * @return string|NULL
	 */
	public function GetTitle () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->title;
	}

	/**
	 * Get form `enctype` attribute - how the form values will be encoded
	 * to send them to the server. Possible values are:
	 * - `application/x-www-form-urlencoded`
	 *   By default, it means all form values will be encoded to
	 *   `key1=value1&key2=value2...` string.
	 *   Constant: `\MvcCore\Ext\IForm::ENCTYPE_URLENCODED`.
	 * - `multipart/form-data`
	 *   Data will not be encoded to URL string form, this value is required,
	 *   when you are using forms that have a file upload control.
	 *   Constant: `\MvcCore\Ext\IForm::ENCTYPE_MULTIPART`.
	 * - `text/plain`
	 *   Spaces will be converted to `+` symbols, but no other special
	 *   characters will be encoded.
	 *   Constant: `\MvcCore\Ext\IForm::ENCTYPE_PLAINTEXT`.
	 * @return string|NULL
	 */
	public function GetEnctype () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->enctype;
	}

	/**
	 * Get form target attribute - where to display the response that is
	 * received after submitting the form. This is a name of, or keyword for,
	 * a browsing context (e.g. tab, window, or inline frame). Default value
	 * is `NULL` to not render any `<form>` element `target` attribute.
	 * The following keywords have special meanings:
	 * - `_self`:		Load the response into the same browsing context as the
	 *					current one. This value is the default if the attribute
	 *					is not specified.
	 * - `_blank`:		Load the response into a new unnamed browsing context.
	 * - `_parent`:		Load the response into the parent browsing context of
	 *					the current one. If there is no parent, this option
	 *					behaves the same way as `_self`.
	 * - `_top`:		Load the response into the top-level browsing context
	 *					(i.e. the browsing context that is an ancestor of the
	 *					current one, and has no parent). If there is no parent,
	 *					this option behaves the same way as `_self`.
	 * - `iframename`:	The response is displayed in a named `<iframe>`.
	 * @return string|NULL
	 */
	public function GetTarget () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->target;
	}

	/**
	 * Indicates whether input elements can by default have their values automatically
	 * completed by the browser. This setting can be overridden by an `autocomplete`
	 * attribute on an element belonging to the form. Possible values are:
	 * - `FALSE` (`'off'`):	The user must explicitly enter a value into each field for
	 * 						every use, or the document provides its own auto-completion
	 * 						method; the browser does not automatically complete entries.
	 * - `TRUE` (`'on'`):	The browser can automatically complete values based on
	 * 						values that the user has previously entered in the form.
	 * - `NULL`				Do not render the attribute.
	 * For most modern browsers setting the autocomplete attribute will not prevent
	 * a browser's password manager from asking the user if they want to store login
	 * fields (username and password), if the user permits the storage the browser will
	 * autofill the login the next time the user visits the page. See The autocomplete
	 * attribute and login fields.
	 * @return bool|NULL
	 */
	public function GetAutoComplete () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->autoComplete;
	}

	/**
	 * This Boolean attribute indicates that the form is not to be validated when
	 * submitted. If this attribute is not specified (and therefore the form is
	 * validated), this default setting can be overridden by a `formnovalidate`
	 * attribute on a `<button>` or `<input>` element belonging to the form.
	 * Only `TRUE` renders the form attribute.
	 * @return bool|NULL
	 */
	public function GetNoValidate () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->noValidate;
	}

	/**
	 * A list of character encodings that the server accepts. The browser
	 * uses them in the order in which they are listed. The default value,
	 * the reserved string `'UNKNOWN'`, indicates the same encoding as that
	 * of the document containing the form element.
	 * @return \string[]
	 */
	public function GetAcceptCharsets () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->acceptCharsets;
	}

	/**
	 * Get lang property to complete optional translator language argument automatically.
	 * If you are operating in multi-language project and you want to use
	 * translator in `\MvcCore\Ext\Form`, this `lang` property with target language code
	 * serves to translate every visible text into target lang. Use this property
	 * with `$form->translator` property.
	 * @return string|NULL
	 */
	public function GetLang () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->lang;
	}

	/**
	 * Get `$form->locale`, upper case locale code or `NULL`, usually used to create
	 * proper validator for zip codes, currencies etc...
	 * If you are operating in multi-language project and you want to use
	 * in `\MvcCore\Ext\Form` form field validators for locale specific needs,
	 * `$form->locale` property helps you to process validation functionality
	 * with proper validator by locale code.
	 * @return string|NULL
	 */
	public function GetLocale () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->locale;
	}

	/**
	 * Get form field HTML element css classes strings as array.
	 * Default value is an empty array to not render HTML `class` attribute.
	 * @return \string[]
	 */
	public function & GetCssClasses () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->cssClasses;
	}

	/**
	 * Get form html element additional attributes.
	 * To add any other attribute for html `<form>` element,
	 * set here key/value array, keys will be used as attribute names,
	 * values as attribute values, simple. All previously configured additional
	 * attributes will be replaced by given attributes to this function.
	 * @return array
	 */
	public function & GetAttributes () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->attributes;
	}

	/**
	 * Get form success submit URL string to redirect after, relative or absolute,
	 * to specify, where to redirect user after form has been submitted successfully.
	 * It's required to use `\MvcCore\Ext\Form` like this, if you want to use method
	 * `$form->SubmittedRedirect();`, at the end of custom `Submit()` method implementation,
	 * you need to specify at least success and error URL strings.
	 * @return string|NULL
	 */
	public function GetSuccessUrl () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->successUrl;
	}

	/**
	 * Get form success submit previous step URL string, relative or absolute, to specify,
	 * where to redirect user after form has been submitted successfully and submit button
	 * will be recognized as submit type to switch form result property `$form->result` to value `2`.
	 * Which means "previous step" redirection after successful submit. This functionality
	 * to switch result value to `2` is up to you. This field is designed only for you as empty.
	 * It's not required to use `\MvcCore\Ext\Form` like this, but if you want to use method
	 * `$form->SubmittedRedirect();` at the end of custom `Submit()` method implementation,
	 * and you want to go to "previous step" by one submit button or stay in the same page by
	 * another submit button, this is very good and comfortable pattern.
	 * @return string|NULL
	 */
	public function GetPrevStepUrl () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->prevStepUrl;
	}

	/**
	 * Get form success submit next step URL string, relative or absolute, to specify,
	 * where to redirect user after form has been submitted successfully and submit button
	 * will be recognized as submit type to switch form result property `$form->result` to value `3`.
	 * Which means "next step" redirection after successful submit. This functionality
	 * to switch result value to `3` is up to you. This field is designed only for you as empty.
	 * It's not required to use `\MvcCore\Ext\Form` like this, but if you want to use method
	 * `$form->SubmittedRedirect();` at the end of custom `Submit()` method implementation,
	 * and you want to go to "next step" by one submit button or stay in the same page by
	 * another submit button, this is very good and comfortable pattern.
	 * @return string|NULL
	 */
	public function GetNextStepUrl () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->nextStepUrl;
	}

	/**
	 * Get form error submit URL string, relative or absolute, to specify,
	 * where to redirect user after has not been submitted successfully.
	 * It's not required to use `\MvcCore\Ext\Form` like this, but if you want to use method
	 * `$form->SubmittedRedirect();` at the end of custom `Submit()` method implementation,
	 * you need to specify at least success and error URL strings.
	 * @return string|NULL
	 */
	public function GetErrorUrl () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->errorUrl;
	}

	/**
	 * Get form submit result state. Submit could have two basic values (or three values - for next step):
	 * `NULL` - No `Submit()` method has been called yet. Call `$form->Submit();` before.
	 * `0`	- Submit has errors. User will be redirected after submit to error url.
	 *		  `\MvcCore\Ext\Form::RESULT_ERRORS`
	 * `1`	- Submit was successful. User will be redirected after submit to success url.
	 *		  `\MvcCore\Ext\Form::RESULT_SUCCESS`
	 * `2`	- Submit was successful. User will be redirected after submit to next step url.
	 *		  `\MvcCore\Ext\IForm::RESULT_NEXT_PAGE`
	 * @return int|NULL
	 */
	public function GetResult () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->result;
	}

	/**
	 * Get translator to translate field labels, options, placeholders and error messages.
	 * Translator has to be `callable` (it could be `closure function` or `array`
	 * with `class_name/instance` and `method name` string). First argument
	 * of `callable` has to be a translation key and second argument
	 * has to be array with numeric replacements to replace them in translated value.
	 * Result of `callable` object has to be a string - translated key for called language.
	 * @return callable|NULL
	 */
	public function GetTranslator () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->translator;
	}

	/**
	 * Get internal flag to quickly know if form fields will be translated or not.
	 * Automatically completed to `TRUE` if `$form->translator` is not `NULL` and also if
	 * `$form->translator` is `callable`. `FALSE` otherwise. Default value is `FALSE`.
	 * @return bool
	 */
	public function GetTranslate () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->translate;
	}

	/**
	 * Get default switch how to set every form control to be required by default.
	 * If you define directly any control to NOT be required, it will NOT be required.
	 * This is only value used as DEFAULT VALUE for form fields, not to strictly define
	 * required flag value in controls. Default value is `FALSE`.
	 * @return bool
	 */
	public function GetDefaultRequired () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->defaultRequired;
	}

	/**
	 * Get multiple fields values as key/value array.
	 * @return array
	 */
	public function & GetValues () {
		/** @var $this \MvcCore\Ext\Form */
		if (
			$this->dispatchState < \MvcCore\IController::DISPATCH_STATE_PRE_DISPATCHED
		) $this->preDispatchLoadValues($this->getSession());
		return $this->values;
	}

	/**
	 * Get all form errors. Returned collection is array with arrays.
	 * Every array in collection have first item as error message
	 * string and second argument (optional) as field name string or
	 * array with field names strings, where error happened.
	 * @return array
	 */
	public function & GetErrors () {
		/** @var $this \MvcCore\Ext\Form */
		if (
			$this->dispatchState < \MvcCore\IController::DISPATCH_STATE_PRE_DISPATCHED
		) $this->preDispatchLoadErrors($this->getSession());
		return $this->errors;
	}

	/**
	 * Get session expiration in seconds. Default value is zero seconds (`0`).
	 * Zero value (`0`) means "until the browser is closed" if there is
	 * no higher namespace expiration in any other session namespace.
	 * If there is found any autorization service and authenticated user,
	 * default value is set by authorization expiration time.
	 * @return int|NULL
	 */
	public function GetSessionExpiration () {
		/** @var $this \MvcCore\Ext\Form */
		if ($this->sessionExpiration === NULL) {
			$authClassesFullNames = [
				"\\MvcCore\\Ext\\Auth",
				"\\MvcCore\\Ext\\Auths\\Basic"
			];
			/** @var $auth \MvcCore\Ext\Auths\Basic */
			$auth = NULL;
			foreach ($authClassesFullNames as $authClassFullName) {
				if (class_exists($authClassFullName, TRUE)) {
					$auth = $authClassFullName::GetInstance();
					break;
				}
			}
			// If there is any authentication class, try to get
			// authenticated user and authorization expiration seconds value:
			if ($auth !== NULL) {
				$user = $auth->GetUser();
				if ($user !== NULL)
					$this->sessionExpiration = $auth->GetExpirationAuthorization();
			}
			// If there is nothing like that, set expiration until browser close:
			if ($this->sessionExpiration === NULL)
				$this->sessionExpiration = 0;
		}
		return $this->sessionExpiration;
	}

	/**
	 * Get base tab-index value for every field in form, which has defined tab-index value (different from `NULL`).
	 * This value could move tab-index values for each field into higher or lower values by needs,
	 * where is form currently rendered.
	 * @return int|NULL
	 */
	public function GetBaseTabIndex () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->baseTabIndex;
	}

	/**
	 * This method is INTERNAL, used by fields in pre-dispatch rendering moment.
	 * This method returns next automatic tab-index value for field.
	 * @return int
	 */
	public function GetFieldNextAutoTabIndex () {
		/** @var $this \MvcCore\Ext\Form */
		$this->fieldsAutoTabIndex += 1;
		return $this->fieldsAutoTabIndex;
	}

	/**
	 * Get default control/label rendering mode for each form control/label.
	 * Default values is string `normal`, it means label will be rendered
	 * before control, only label for checkbox and radio button will be
	 * rendered after control.
	 * @return string
	 */
	public function GetDefaultFieldsRenderMode () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->defaultFieldsRenderMode;
	}

	/**
	 * Get errors rendering mode, by default configured as string: `all-together`.
	 * It means all errors are rendered naturally at form begin together in one HTML `div.errors` element.
	 * If you are using custom template for form - you have to call after form beginning: `echo $this->RenderErrors();`
	 * to get all errors into template.
	 * @return string
	 */
	public function GetErrorsRenderMode () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->errorsRenderMode;
	}

	/**
	 * Get custom form view script relative path without `.phtml` extension.
	 * View script could be `TRUE`/`FALSE` to render or not form by view script name
	 * completed automatically with form id and configured view extension (.phtml) or explicit
	 * relative view script path defined by string. Automatically completed form view
	 * script path and also explicitly defined form view script path by string are
	 * located in directory `/App/Views/Forms` by default. If you want to change this
	 * base directory - use `\MvcCore\Ext\Forms\View::SetFormsDir();` static method.
	 * @return string|NULL
	 */
	public function GetViewScript () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->viewScript;
	}

	/**
	 * Get form custom template full class name to create custom view object.
	 * Default value is `\MvcCore\Ext\Forms\View` extended from `\MvcCore\View`.
	 * @return string|NULL
	 */
	public function GetViewClass () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->viewClass;
	}

	/**
	 * Get supporting javascript files configuration.
	 * Every record in returned array is an array with:
	 *	 `0` - `string` - Supporting javascript file relative path from protected `\MvcCore\Ext\Form::$jsAssetsRootDir`.
	 *	 `1` - `string` - Supporting javascript full class name inside supporting file.
	 *	 `2` - `array`  - Supporting javascript constructor params.
	 * @return array
	 */
	public function & GetJsSupportFiles () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->jsSupportFiles;
	}

	/**
	 * Get supporting css files configuration, an array with supporting
	 * css file relative paths from protected `\MvcCore\Ext\Form::$cssAssetsRootDir`.
	 * @return \string[]
	 */
	public function & GetCssSupportFiles () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->cssSupportFiles;
	}

	/**
	 * Get javascript support files external renderer. Given callable has
	 * to accept first argument to be `\SplFileInfo` about external javascript
	 * supporting file. Javascript renderer must add given supporting javascript
	 * file into HTML only once.
	 * @return callable|NULL
	 */
	public function GetJsSupportFilesRenderer () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->jsSupportFilesRenderer;
	}

	/**
	 * Get css support files external renderer. Given callable has
	 * to accept first argument to be `\SplFileInfo` about external css
	 * supporting file. Css renderer must add given supporting css
	 * file into HTML only once.
	 * @return callable|NULL
	 */
	public function GetCssSupportFilesRenderer () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->cssSupportFilesRenderer;
	}

	/**
	 * This is INTERNAL method for rendering fields.
	 * Value `TRUE` means `<form>` tag is currently rendered inside, `FALSE` otherwise.
	 * @return bool
	 */
	public function GetFormTagRenderingStatus () {
		/** @var $this \MvcCore\Ext\Form */
		return $this->formTagRendergingStatus;
	}
	
	/**
	 * Get PHP data limit as integer value by given 
	 * PHP INI variable name. Return `NULL` for empty 
	 * or non-existing values.
	 * @param string $iniVarName
	 * @return int|NULL
	 */
	public function GetPhpIniSizeLimit ($iniVarName) {
		/** @var $this \MvcCore\Ext\Form */
		$rawIniValue = @ini_get($iniVarName);
		if (!$rawIniValue) return NULL;
		return static::ConvertBytesFromHumanForm($rawIniValue);
	}
	
	/**
	 * Converts a long integer of bytes into a readable format e.g KB, MB, GB, TB, YB.
	 * @param int $bytes The number of bytes.
	 * @param int $precision Default `1`.
	 * @return string
	 */
	public static function ConvertBytesIntoHumanForm ($bytes, $precision = 1) {
		$level = floor(log($bytes) / log(1024));
		$result = ($bytes / pow(1024, $level)) * 1;
		return sprintf(
			"%.0{$precision}F", 
			$result
		) . ' ' . static::$fileSizeUnits[$level];
	}
	
	/**
	 * Converts readable bytes format e.g KB, MB, GB, TB, YB into long integer of bytes.
	 * @param string $humanValue Readable bytes format e.g KB, MB, GB, TB, YB.
	 * @return int
	 */
	public static function ConvertBytesFromHumanForm ($humanValue) {
		if (is_numeric($humanValue)) {
			return intval($humanValue);
		} else {
			$rawNumeric = preg_replace("#[^\.e\-E0-9]#", '', $humanValue);
			if (!is_numeric($rawNumeric)) $rawNumeric = '0';
			$numericValue = floatval($rawNumeric);
			$rawUnits = strtoupper(preg_replace("#[^kmgtpebKMGTPEB]#", '', $humanValue));
			$rawUnitsLength = strlen($rawUnits);
			if ($rawUnitsLength > 2) $rawUnits = substr($rawUnits, -2, 2);
			if ($rawUnitsLength == 1 && $rawUnits != 'B') $rawUnits .= 'B';
			$unitsLevel = array_search($rawUnits, static::$fileSizeUnits, TRUE);
			if ($unitsLevel === 0) return $numericValue;
			return intval(ceil($numericValue * pow(1024, $unitsLevel)));
		}
	}

	/**
	 * Get MvcCore Form javascript support files root directory.
	 * After `\MvcCore\Ext\Form` instance is created, this value is completed to library internal
	 * assets directory. If you want to create any custom field with custom javascript file(s),
	 * you can do it by loading github package `mvccore/form-js` to your custom directory,
	 * you have to create there any other custom javascript support file for any custom field
	 * and change this property value to that javascripts directory. All supporting javascripts
	 * for `\MvcCore\Ext\Form` fields will be loaded now from there.
	 * @return string|NULL
	 */
	public static function GetJsSupportFilesRootDir () {
		return static::$jsSupportFilesRootDir;
	}

	/**
	 * Get MvcCore Form css support files root directory.
	 * After `\MvcCore\Ext\Form` instance is created, this value is completed to library internal
	 * assets directory. If you want to create any custom field with custom css file(s),
	 * you can do it by creating an empty directory somewhere, by copying every css file from
	 * library assets directory into it, by creating any other custom css for any custom field
	 * and by change this property value to that directory. All supporting css for `\MvcCore\Ext\Form`
	 * fields will be loaded now from there.
	 * @return string|NULL
	 */
	public static function GetCssSupportFilesRootDir () {
		return static::$cssSupportFilesRootDir;
	}

	/**
	 * Get form validators base namespaces to create validator instance by it's class name.
	 * Validator will be created by class existence in this namespaces order.
	 * @return \string[]
	 */
	public static function GetValidatorsNamespaces () {
		return static::$validatorsNamespaces;
	}

	/**
	 * Get form instance by form id string.
	 * If no form instance found, thrown an `RuntimeException`.
	 * @param string $formId
	 * @throws \RuntimeException
	 * @return \MvcCore\Ext\Form
	 */
	public static function GetById ($formId) {
		if (isset(self::$instances[$formId])) {
			return self::$instances[$formId];
		} else {
			throw new \RuntimeException(
				'No form instance exists under form id `'.$formId.'`.'
				. ' Check if searched form instance has been already initialized'
				. ' or if form id has been already set.'
			);
		}
	}

	/**
	 * Get form field instance with defined `autofocus` boolean attribute.
	 * If there is no field in any form with this attribute, return `NULL`.
	 * @return \MvcCore\Ext\Forms\Field
	 */
	public static function GetAutoFocusedFormField () {
		if (self::$autoFocusedFormField) {
			list ($currentFormId, $currentFieldName) = self::$autoFocusedFormField;
			return self::GetById($currentFormId)->GetField($currentFieldName);
		}
		return NULL;
	}
}
