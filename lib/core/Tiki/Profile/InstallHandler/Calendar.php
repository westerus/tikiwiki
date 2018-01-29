<?php
// (c) Copyright 2002-2016 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: Calendar.php 61840 2017-03-24 11:18:18Z kroky6 $

//THIS HANDLER STILL DON'T WORK PROPERLY. USE WITH CAUTION. 
class Tiki_Profile_InstallHandler_Calendar extends Tiki_Profile_InstallHandler
{
	function getData()
	{
		if ( $this->data )
			return $this->data;

		$data = $this->obj->getData();
		$this->replaceReferences($data);

		if (!empty($data['name'])) {
			$calendarlib = TikiLib::lib('calendar');
			$data['calendarId'] = $calendarlib->get_calendarId_from_name($data['name']);
		}

		return $this->data = $data;
	}
	
	function canInstall()
	{
		$data = $this->getData();
		
		if (!isset($data['name'])) {
			return false;
		}
		return $this->convertMode($data);
	}
	private function convertMode($data)
	{
		if (!isset($data['mode'])) {
			return true; // will duplicate if already exists
		}
		switch ($data['mode']) {
		case 'update':
			if (empty($data['calendarId'])) {
				throw new Exception(tra('Calendar does not exist').' '.$data['name']);
			}
		case 'create':
			if (!empty($data['calendarId'])) {
				throw new Exception(tra('Calendar already exists').' '.$data['name']);
			}
		}
		return true;
	}
	
	function _install()
	{
		if ($this->canInstall()) {
			$calendarlib = TikiLib::lib('calendar');
			
			$calendar = $this->getData();
			
			global $user;
			$customflags = isset($calendar['customflags']) ? $calendar['customflags']  : array();
			$options = isset($calendar['options']) ? $calendar['options']  : array();
			if (!isset($calendar['options']) && !isset($calendar['customflags']) && !empty($calendar['calendarId'])) {
				return $calendar['calendarId']; //only pick up the id
			}
			$id = $calendarlib->set_calendar($calendar['calendarId'], $user, $calendar['name'], $calendar['description'], $customflags, $options);
			return $id;
		}
	}

	public static function export(Tiki_Profile_Writer $writer, $calendarId)
	{
		$calendarlib = TikiLib::lib('calendar');
		$cal = $calendarlib->get_calendar($calendarId);
		if (!$cal || empty($cal['calendarId']) ) {
			return false;
		}

		$customflags = array_intersect_key($cal, array_flip(self::getCustomFlags()));
		$options = array_diff_key($cal, array_flip(array_merge(
			array(
				'calendarId',
				'name',
				'description',
				'user',
				'created',
				'lastmodif',
				'personal'
			),
			self::getCustomFlags()
		)));
		
		$writer->addObject(
			'calendar',
			$calendarId,
			array(
				'name' => $cal['name'],
				'description' => $cal['description'],
				'customflags' => $customflags,
				'options' => $options
			)
		);

		return true;
	}

	private static function getCustomFlags()
	{
		return array(
			'customlocations',
			'customcategories',
			'customlanguages',
			'custompriorities',
			'customparticipants',
			'customsubscription',
			'customstatus'
		);
	}
}
