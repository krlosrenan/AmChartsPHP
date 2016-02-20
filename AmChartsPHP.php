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
	
    //Change title - STRING
    function title($title)
    {
    	$this->title = $title;
    }
    //Change Type of Chart - STRING
    function type($type)
    {
    	if(strtolower($type) == "serial")
    		$this->type = $type;
    	else
    		trigger_error ($type . ' is an unsupported chartType',E_USER_WARNING);
    }
    //Change duration of build up animation - INTEGER
    function startDuration(int $startDuration)
    {
    		$this->startDuration = $startDuration;
    }
    //Change marginRight - INTEGER
    function marginRight(int $marginRight)
    {
  		$this->marginRight = $marginRight;
    }
    //Change marginLeft  - INTEGER
    function marginLeft(int $marginLeft)
    {
    		$this->marginLeft = $marginLeft;

    }
    //Change marginTop  - INTEGER
    function marginTop(int $marginTop)
    {
    	$this->marginTop = $marginTop;

    }
    //Change marginBottom - INTEGER
    function marginBottom(int $marginBottom)
    {
    	$this->marginBottom = $marginBottom;
    }
    //Change fontSize - INTEGER
    function fontSize(int $fontSize)
    {
    	$this->fontSize = $fontSize;
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
    function createGraph($name, array $values)
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
            $this->graphs->$name->values = $values;
        }
    }
    //Deletes a graph - STRING
    function deleteGraph($name)
    {
        if($this->GraphExist($name))
            unset($this->graphs->$name);
    }
    protected function GraphExist($name, $error = true)
    {
        if(isset($this->graphs->$name))
            return true;
        else
        {
            if($error)
                trigger_error ('There is no chart with the name ' . $name . '.',E_USER_WARNING);
            return false;
        }
    }
    //Change BallonText of a graph - STRING - STRING
    function GraphBallonText($name, $balloonText)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->balloonText = $balloonText;
    }
    //Change bullet of a graph - STRING - STRING
    function GraphBullet($name, $bullet)
    {
        if($this->GraphExist($name))
        {
            $valid = array('none', 'round', 'triangleUp', 'triangleDown', 'triangleLeft', 'triangleRight', 'bubble', 'diamond', 'xError', 'yError', 'custom');
            if(in_array($bullet, $valid))
                $this->graphs->$name->bullet = $bullet;
        }
    }
    //Change title of graph
    function GraphTitle($name, $title)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->title = $title;
    }
}
