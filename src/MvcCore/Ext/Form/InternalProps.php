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

use \MvcCore\Ext\Forms\IError;

/**
 * Trait for class `MvcCore\Ext\Form` containing all internal properties.
 */
trait InternalProps
{
	/**
	 * Internal array with all configured submit buttons to recognize starting
	 * result state in submit processing by presented button in params array.
	 * @var \MvcCore\Ext\Forms\Fields\SubmitButton|\MvcCore\Ext\Forms\Fields\SubmitInput
	 */
	protected $submitFields = [];

	/**
	 * Internal array to store any configured custom result state values for
	 * submit buttons or for submit inputs. Key in array are field names, values
	 * are custom submit start result state values, if form is submitted by named button.
	 * @var \int[]
	 */
	protected $customResultStates = [];

	/**
	 * This is INTERNAL property for rendering fields.
	 * Value `TRUE` means `<form>` tag is currently rendered inside, `FALSE` otherwise.
	 * @var bool
	 */
	protected $formTagRendergingStatus = FALSE;

	/**
	 * Validators instances keyed by validators ending
	 * class names, created during `Submit()`.
	 * @var \MvcCore\Ext\Forms\IValidator[]
	 */
	protected $validators = [];

	/**
	 * Automatically growing tab-index value for fields with tab-index in `auto` value.
	 * @var int
	 */
	protected $fieldsAutoTabIndex = 0;

	/**
	 * Internal flag to quickly know if form fields will be translated or not.
	 * Automatically completed to `TRUE` if `$form->translator` is not `NULL` and also if
	 * `$form->translator` is `callable`. `FALSE` otherwise. Default value is `FALSE`.
	 * @var bool
	 */
	protected $translate = FALSE;
	
	/**
	 * File size units for internal conversions.
	 * @var \string[]
	 */
	protected static $fileSizeUnits = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

	/**
	 * Cached value from `\MvcCore\Application::GetInstance()->GetSessionClass();`
	 * @var string
	 */
	protected static $sessionClass = NULL;

	/**
	 * Cached value from `\MvcCore\Application::GetInstance()->GetToolClass();`
	 * @var string
	 */
	protected static $toolClass = NULL;

	/**
	 * Static cache with references to all created form session
	 * namespace objects to not create them and configure them
	 * every time they are used.
	 * @var array
	 */
	protected static $allFormsSessions = [];

	/**
	 * Temporary collection with js support files to add into HTML output after rendered form(s).
	 * It could be added directly after rendered form or by external renderer, doesn't matter.
	 * This serves only for purpose - how to determinate to add every supporting javascript for all
	 * it's field types only once. Keys are relative javascript support file paths and values are
	 * simple dummy boolean values.
	 * @var array
	 */
	protected static $allJsSupportFiles = [];

	/**
	 * Temporary collection with css support files to add into HTML output after rendered form(s).
	 * It could be added directly after rendered form or by external renderer, doesn't matter.
	 * This serves only for purpose - how to determinate to add every supporting css for all
	 * it's field types only once. Keys are relative css support file paths and values are
	 * simple dummy boolean values.
	 * @var array
	 */
	protected static $allCssSupportFiles = [];

	/**
	 * Collection with arrays, where first record is `callable` handler to process,
	 * if any form submit CSRF checking (Cross Site Request Forgery) triggers error
	 * and where second record is `boolean`, if handler is `closure` or not.
	 * Params in `callable` should be two with following types:
	 *	- `\MvcCore\Ext\Form`	- Form instance where error happened.
	 *	- `\MvcCore\Request`	- Current request object.
	 *	- `string`				- Translated error message string.
	 * Example:
	 * `\MvcCore\Ext\Form::AddCsrfErrorHandler(function($form, $request, $errorMsg) {
	 *		// ... anything you want to do, for example to sign out user.
	 * });`
	 * @var \array[]
	 */
	protected static $csrfErrorHandlers = [];

	/**
	 * If there is necessary to add into HTML response after rendered form
	 * any supporting javascript file, there is also necessary to add
	 * base form supporting javascript - this is relative path where
	 * the base supporting javascript is located.
	 * @var string
	 */
	protected static $jsBaseSupportFile = '__MVCCORE_FORM_ASSETS_DIR__/mvccore-form.js';

	/**
	 * Default (not translated) error messages with replacements
	 * for field names and more specific info to tell the user
	 * what happened or what to do more.
	 * @var array
	 */
	protected static $defaultErrorMessages = [
		IError::REQUIRED				=> "Field `{0}` is required.",
		IError::EMPTY_CONTENT			=> "Sent data are empty.",
		IError::MAX_POST_SIZE			=> "Sent data exceeds the limit of {0}.",
		IError::CSRF					=> "Form hash expired, please submit the form again.",
	];

	/**
	 * Form instances storage under it's form id strings.
	 * Key is form id, value is form instance.
	 * @var \MvcCore\Ext\Form[]|\MvcCore\Ext\IForm[]
	 */
	protected static $instances = [];
}
