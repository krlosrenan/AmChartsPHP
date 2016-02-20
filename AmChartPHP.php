<?php
class AmChartPHP
{
	 //
	//Copyright (C) 2016 Alexander Scholz <scholz@own-salvation.de>
	//
	//This class is free software: you can redistribute it and/or modify
	//it under the terms of the GNU General Public License as published by
	//the Free Software Foundation, either version 3 of the License, or
	//(at your option) any later version.
	//*
	//This class is distributed in the hope that it will be useful,
	//but WITHOUT ANY WARRANTY; without even the implied warranty of
	//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	//GNU General Public License for more details.
	//
	//You should have received a copy of the GNU General Public License
	//along with this program.  If not, see <http://www.gnu.org/licenses/>.
	//
	//Author of Class: Alexander Scholz <scholz@own-salvation.de>
	//
	
	
	//Currently supported Chart Types: Serial
	
	protected $title = 'New Chart';
	protected $type = 'serial';
	protected $startDuration = 2;
	protected $marginRight = 10;
	protected $marginLeft = 10;
	protected $marginTop = 10;
	protected $marginBottom = 10;
	protected $fontSize = 11;
	protected $chartCursor = false;
	
	public $graphs;
	function __construct()
	{
		$this->graphs = new stdClass();
	}
	
	//Change title
	function title($title)
	{
		$this->title = $title;
	}
	//Change Type of Chart
	function type($type)
	{
		if(strtolower($type) == "serial")
			$this->type = $type;
		else
			trigger_error ($type . ' is an unsupported chartType',E_USER_WARNING);
	}
	//Change duration of build up animation - INTEGER
	function startDuration($startDuration)
	{
		if(is_integer($startDuration))
			$this->startDuration = $startDuration;
		else
			trigger_error ('StartDuration must be integer',E_USER_WARNING);
	}
	//Change marginRight - INTEGER
	function marginRight($marginRight)
	{
		if(is_integer($marginRight))
			$this->marginRight = $marginRight;
		else
			trigger_error ('marginRight must be integer',E_USER_WARNING);
	}
	//Change marginLeft  - INTEGER
	function marginLeft($marginLeft)
	{
		if(is_integer($marginLeft))
			$this->marginLeft = $marginLeft;
		else
			trigger_error ('marginleft must be integer',E_USER_WARNING);
	}
	//Change marginTop  - INTEGER
	function marginTop($marginTop)
	{
		if(is_integer($marginTop))
			$this->marginTop = $marginTop;
		else
			trigger_error ('marginTop must be integer',E_USER_WARNING);
	}
	//Change marginBottom - INTEGER
	function marginBottom($marginBottom)
	{
		if(is_integer($marginBottom))
			$this->marginBottom = $marginBottom;
		else
			trigger_error ('marginBottom must be integer',E_USER_WARNING);
	}
	//Change fontSize - INTEGER
	function fontSize($fontSize)
	{
		if(is_integer($fontSize))
			$this->fontSize = $fontSize;
		else
			trigger_error ('fontSize must be integer',E_USER_WARNING);
	}
	//Enable / disable chartCursor - BOOLEAN
	function chartCursor($chartCursor)
	{
		if(is_bool($chartCursor))
			$this->chartCursor = $chartCursor;
		else
			trigger_error ('chartCursor must be integer',E_USER_WARNING);
	}
	//Creates a graph - STRING - ARRAY
	function createGraph($name, $values)
	{
		if(isset($this->graphs->$name))
			trigger_error ('Graph with this name already exist. Use ::deleteGraph to delete it first.',E_USER_ERROR);
		else
		{
			$this->graphs->$name = new stdClass();
			$this->graphs->$name->name = $name;
			$this->graphs->$name->balloonText = "[[title]] of [[category]]:[[value]]";
			$this->graphs->$name->bullet = 'round';
			$this->graphs->$name->id = 'Graph-' - $name;
			$this->graphs->$name->title = $name;
			$this->graphs->$name->valueField = "value-" . $name;
		}
	}
	function deleteGraph($name)
	{
		unset($this->graphs->$name);
	}
}