<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: Selector.php 63040 2017-06-19 22:02:32Z kroky6 $

namespace Tiki\Object;

class Selector
{
	private $lib;

	function __construct($lib)
	{
		$this->lib = $lib;
	}

	function read($input, $format = null)
	{
		$parts = explode(':', trim($input), 2);

		if (count($parts) === 2) {
			list($type, $object) = $parts;
			return new SelectorItem($this, $type, $object, $format);
		}

		return null;
	}

	function readMultiple($input)
	{
		if (! is_array($input)) {
			$input = explode("\n", $input);
		}

		$raw = array_map('trim', $input);
		$raw = array_unique($raw);
		$raw = array_map([$this, 'read'], $raw);
		return array_values(array_filter($raw));
	}

	function readMultipleSimple($type, $input, $separator)
	{
		if (is_string($input)) {
			$parts = explode($separator, $input);
		} else {
			$parts = (array) $input;
		}

		$parts = array_map('trim', $parts);
		$parts = array_filter($parts);
		$parts = array_unique($parts);

		return array_map(function ($object) use ($type) {
			return new SelectorItem($this, $type, $object);
		}, array_values($parts));
	}

	function getTitle($type, $object, $format = null)
	{
		return $this->lib->get_title($type, $object, $format);
	}
}

