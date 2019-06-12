<?php

namespace app\CustomClass;

class Test {
	
	private $data = [
		'first' => 1,
		'second' => 2,
		'third' => 3
	];

	public static function getData($data) {

		if(!isset($data['first']))
		{
			return 'one';
		} elseif(!isset($data['second']))
		{
			return 'second';
		} elseif(!isset($data['third']))
		{
			return 'three';
		} else {
			return false;
		}
	}
}



