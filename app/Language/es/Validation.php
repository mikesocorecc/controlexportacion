<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// Validation language settings
return [
	// Core Messages
	'noRuleSets'            => 'No rulesets specified in Validation configuration.',
	'ruleNotFound'          => '{0} is not a valid rule.',
	'groupNotFound'         => '{0} is not a validation rules group.',
	'groupNotArray'         => '{0} rule group must be an array.',
	'invalidTemplate'       => '{0} is not a valid Validation template.',

	// Rule Messages
	'alpha'                 => 'El {field} campo solo puede contener caracteres alfabeticos.',
	'alpha_dash'            => 'El {field} campo solo puede contener numeros, guion bajo, and dash caracteres.',
	'alpha_numeric'         => 'El {field} campo solo puede contener numeros caracteres.',
	'alpha_numeric_punct'   => 'El {field} campo may contener only numeros caracteres, spaces, and  ~ ! # $ % & * - _ + = | : . caracteres.',
	'alpha_numeric_space'   => 'El {field} campo solo puede contener numeros and space caracteres.',
	'alpha_space'           => 'El {field} campo solo puede contener caracteres alfabeticos and spaces.',
	'decimal'               => 'El {field} campo must contener a decimal number.',
	'differs'               => 'El {field} campo must differ from the {param} field.',
	'equals'                => 'El {field} campo must be exactly: {param}.',
	'exact_length'          => 'El {field} campo must be exactly {param} caracteres in length.',
	'greater_than'          => 'El {field} campo must contener a number greater than {param}.',
	'greater_than_equal_to' => 'El {field} campo must contener a number greater than or equal to {param}.',
	'hex'                   => 'El {field} campo solo puede contener hexidecimal caracteres.',
	'in_list'               => 'El {field} campo must be one of: {param}.',
	'integer'               => 'El {field} campo must contener an integer.',
	'is_natural'            => 'El {field} campo must only contener digits.',
	'is_natural_no_zero'    => 'El {field} campo must only contener digits and must be greater than zero.',
	'is_not_unique'         => 'El {field} campo must contener a previously existing value in the database.',
	'is_unique'             => 'El {field} campo debe contener un valor único.',
	'less_than'             => 'El {field} campo must contener a number less than {param}.',
	'less_than_equal_to'    => 'El {field} campo must contener a number less than or equal to {param}.',
	'matches'               => 'El {field} campo does not match the {param} field.',
	'max_length'            => 'El{field} campo no puede exceder de {param} caracteres de longitud.',
	'min_length'            => 'El {field} debe ser como mínimo {param} caracteres de longitud..',
	'not_equals'            => 'El {field} campo cannot be: {param}.',
	'not_in_list'           => 'El {field} campo must not be one of: {param}.',
	'numeric'               => 'El {field} campo must contener only numbers.',
	'regex_match'           => 'El {field} campo is not in the correct format.',
	'required'              => 'El {field} campo es requerido.',
	'required_with'         => 'El {field} campo is required when {param} is present.',
	'required_without'      => 'El {field} campo is required when {param} is not present.',
	'string'                => 'El {field} campo must be a valid string.',
	'timezone'              => 'El {field} campo must be a valid timezone.',
	'valid_base64'          => 'El {field} campo must be a valid base64 string.',
	'valid_email'           => 'El {field} campo debe contener una dirección de correo electrónico válida.',
	'valid_emails'          => 'El {field} campo must contener all valid email addresses.',
	'valid_ip'              => 'El {field} campo must contener a valid IP.',
	'valid_url'             => 'El {field} campo must contener a valid URL.',
	'valid_date'            => 'El {field} campo must contener a valid date.',

	// Credit Cards
	'valid_cc_num'          => '{field} does not appear to be a valid credit card number.',

	// Files
	'uploaded'              => '{field} is not a valid uploaded file.',
	'max_size'              => '{field} is too large of a file.',
	'is_image'              => '{field} is not a valid, uploaded image file.',
	'mime_in'               => '{field} does not have a valid mime type.',
	'ext_in'                => '{field} does not have a valid file extension.',
	'max_dims'              => '{field} is either not an image, or it is too wide or tall.',
];
