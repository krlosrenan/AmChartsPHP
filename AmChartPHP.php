<?php
class AmChartPHP
{
    //The MIT License (MIT)
    //Copyright (c) 2016 Alexander Scholz
    //
    //Permission is hereby granted, free of charge, to any person obtaining a copy
    //of this software and associated documentation files (the "Software"), to deal
    //in the Software without restriction, including without limitation the rights
    //to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    //copies of the Software, and to permit persons to whom the Software is
    //furnished to do so, subject to the following conditions:
    //
    //The above copyright notice and this permission notice shall be included in
    //all copies or substantial portions of the Software.
    //
    //THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    //IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    //FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    //AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    //LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    //OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    //SOFTWARE.
	
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
    //Deletes a graph - STRING
	function deleteGraph($name)
	{
        if(isset($this->graphs->$name))
            unset($this->graphs->$name);
        else
            trigger_error ('There is no chart with the name ' . $name . '.',E_USER_WARNING);
	}
    //Change BallonText of a chart - STRING - STRING
    function GraphBallon()
    {
        
    }
}