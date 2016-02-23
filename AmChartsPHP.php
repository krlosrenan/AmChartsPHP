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
	protected $autoMarginOffset = 40;
    protected $marginRight = 50;
    protected $marginLeft = 10;
    protected $marginTop = 50;
    protected $marginBottom = 10;
    protected $fontSize = 11;
    protected $chartCursor = true;
	protected $chartScrollbar = false;
	protected $theme = 'light';
	protected $legend = true;
	protected $export = true;
	protected $categoryAxisAutoRotateAngle = 45;
	protected $categoryAxisAutoRotateCount = 10;
	protected $categoryAxisGridPosition = "start";
	protected $categoryAxisTitleRotation = 55;
	protected $categoryValues = array();
	protected $axisTitle = 'Values';
	
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
	//Set category Values - Array()
	function categoryValues($categoryValues)
	{
		$this->categoryValues = $categoryValues;
	}
    //Change duration of build up animation - INTEGER
    function startDuration(int $startDuration)
    {
    		$this->startDuration = $startDuration;
    }
	//Change autoMarginOffset - INTEGER
    function autoMarginOffset(int $autoMarginOffset)
    {
  		$this->autoMarginOffset = $autoMarginOffset;
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
	//Change autoRotateAngel of categoryAxis - INTEGER
	function categoryAxisAutoRotateAngle(int $categoryAxisAutoRotateAngle)
	{
		$this->categoryAxisAutoRotateAngle = $categoryAxisAutoRotateAngle;
	}
	//Change autoRotateCount of categoryAxis - INTEGER
	function categoryAxisAutoRotateCount(int $categoryAxisAutoRotateCount)
	{
		$this->categoryAxisAutoRotateCount = $categoryAxisAutoRotateCount;
	}
	//Change gridPosition of categoryAxis - INTEGER
	function categoryAxisGridPosition(int $categoryAxisGridPosition)
	{
		$this->categoryAxisGridPosition = $categoryAxisGridPosition;
	}
	//Change titleRotation of categoryAxis - INTEGER
	function categoryAxisTitleRotation(int $categoryAxisTitleRotation)
	{
		$this->categoryAxisTitleRotation = $categoryAxisTitleRotation;
	}
    //Enable / disable chartCursor - BOOLEAN
    function chartCursor($chartCursor)
    {
    	if(is_bool($chartCursor))
    		$this->chartCursor = $chartCursor;
    	else
    		trigger_error ('chartCursor must be BOOLEAN',E_USER_WARNING);
    }
	//Enable / disable chartScrollbar - BOOLEAN
    function chartScrollbar($chartScrollbar)
    {
    	if(is_bool($chartScrollbar))
    		$this->chartScrollbar = $chartScrollbar;
    	else
    		trigger_error ('chartScrollbar must be BOOLEAN',E_USER_WARNING);
    }
	//Enable / disable legend - BOOLEAN
    function legend($legend)
    {
    	if(is_bool($legend))
    		$this->legend = $legend;
    	else
    		trigger_error ('legend must be BOOLEAN',E_USER_WARNING);
    }
	//Enable / disable export - BOOLEAN
    function export($export)
    {
    	if(is_bool($export))
    		$this->export = $export;
    	else
    		trigger_error ('export must be BOOLEAN',E_USER_WARNING);
    }
	//Change theme - STRING
	function theme($theme)
	{
		$valid = array('none', 'light', 'dark', 'black', 'patterns', 'chalk');
        if(in_array($theme, $valid))
            $this->theme = $theme;
	}
	//Change title of axis
	function axisTitle($name)
	{
		$this->axisTitle = $this->axisTitle;
	}
    //Creates a graph - STRING - STRING - ARRAY
    function createGraph($name, $type, array $values)
    {
    	if(isset($this->graphs->$name))
    		trigger_error ('Graph with this name already exist. Use ::deleteGraph to delete it first.',E_USER_ERROR);
    	else
    	{
            $this->graphs->$name = new stdClass();
            $this->graphs->$name->name = $name;
			$this->graphs->$name->type = $type;
            $this->graphs->$name->balloonText = "[[title]] of [[category]]:[[value]]";
            $this->graphs->$name->bullet = 'none';
			$this->graphs->$name->bulletSize = 6;
            $this->graphs->$name->id = 'Graph-' - $name;
            $this->graphs->$name->title = $name;
            $this->graphs->$name->valueField = "value-" . $name;
			$this->graphs->$name->dashLength = 0;
			if($type == 'line' OR $type == 'smoothedLine')
				$this->graphs->$name->lineAlpha = 1;
			else
				$this->graphs->$name->lineAlpha = 0;
			$this->graphs->$name->lineColor = "#AA0000";
			$this->graphs->$name->lineThickness = 2.5;
			if($type == 'line' OR $type == 'smoothedLine')
				$this->graphs->$name->fillAlphas = 0;
			else
				$this->graphs->$name->fillAlphas = 1;
			$this->graphs->$name->fillColors = "#AA0000";
			
			$this->graphs->$name->values = $values;
        }
    }
    //Deletes a graph - STRING
    function deleteGraph($name)
    {
        if($this->GraphExist($name))
            unset($this->graphs->$name);
    }
    //Checks if a graph with this name already exists. - STRING - BOOL
    function GraphExist($name, $error = true)
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
	//Change bulletSize of graph - STRING - INTEGER
    function GraphBulletSize($name, int $bulletSize)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->bulletSize = $bulletSize;
    }
	//Change dashLength of graph - STRING - INTEGER
    function GraphDashLength($name, int $dashLength)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->dashLength = $dashLength;
    }
	//Change lineAlpha of graph - STRING - DOUBLE
    function GraphLineAlpha($name, $lineAlpha)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->lineAlpha = $lineAlpha;
    }
    //Change title of graph - STRING - STRING
    function GraphTitle($name, $title)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->title = $title;
    }
	//Change lineColor of graph - STRING - STRING (Color Code)
    function GraphLineColor($name, $lineColor)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->lineColor = $lineColor;
    }
	//Change lineThickness of graph - STRING - DOUBLE
    function GraphLineThickness($name, $lineThickness)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->lineThickness = $lineThickness;
    }
	//Change fillAlphas of graph - STRING - DOUBLE
    function GraphFillAlphas($name, $fillAlphas)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->fillAlphas = $fillAlphas;
    }
	//Change fillColors of graph - STRING - STRING (Color Code)
    function GraphFillColors($name, $fillColors)
    {
        if($this->GraphExist($name))
            $this->graphs->$name->fillColors = $fillColors;
    }
	//Creates the chart in div - STRING
	function chart($div)
	{
		echo '<script type="text/javascript">';
			echo 'AmCharts.makeChart("' . $div . '",
				{';
				echo '"type": "' . $this->type . '",';
				echo '"categoryField": "category",';
				echo '"autoMarginOffset": ' . $this->autoMarginOffset . ',';
				echo '"marginRight": ' . $this->marginRight . ',';
				echo '"marginLeft": ' . $this->marginLeft . ',';
				echo '"marginTop": ' . $this->marginTop . ',';
				echo '"marginBottom": ' . $this->marginBottom . ',';
				echo '"startDuration": ' . $this->startDuration . ',';
				echo '"fontSize": ' . $this->fontSize . ',';
				echo '"theme": "' . $this->theme . '",';
				if($this->chartCursor)
					echo '"chartCursor": {},';
				if($this->chartScrollbar)
					echo '"chartScrollbar": {},';
				if($this->legend)
					echo '"legend": {
							"enabled": true,
							"useGraphSettings": true
						},';
				if($this->export)
					echo '"export":
							{
								"enabled":true		
							},';
				echo '"categoryAxis":
						{
							"autoRotateAngle": ' . $this->categoryAxisAutoRotateAngle . ',
							"autoRotateCount": ' . $this->categoryAxisAutoRotateCount . ',
							"gridPosition": "' . $this->categoryAxisGridPosition . '",
							"titleRotation": ' . $this->categoryAxisTitleRotation . '
						},';
				echo '"graphs": [';
					foreach($this->graphs as $g)
					{
						echo '{';
							echo '"balloonText": "' . $g->balloonText . '",';
							echo '"bullet": "' . $g->bullet . '",';
							echo '"bulletSize": ' . $g->bulletSize . ',';
							echo '"id": "' . $g->id . '",';
							echo '"title": "' . $g->title . '",';
							echo '"valueField": "' . $g->valueField . '",';
							echo '"dashLength": ' . $g->dashLength . ',';
							echo '"lineAlpha": ' . $g->lineAlpha . ',';
							echo '"lineColor": "' . $g->lineColor . '",';
							echo '"lineThickness": ' . $g->lineThickness . ',';
							echo '"fillAlphas": ' . $g->fillAlphas . ',';
							echo '"fillColors": "' . $g->fillColors . '",';
							echo '"type": "' . $g->type . '",';
						echo '},';
					}
				echo '],';
				echo '"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "' . $this->axisTitle . '"
						}
					],';
				echo '"dataProvider": [';
					$i = 0;
					foreach($this->categoryValues as $c)
					{
						echo '{';
							echo '"category": ' . $c . ',';
							foreach($this->graphs as $g)
							{
								echo '"' . $g->valueField . '": ' . $g->values[$i] . ',';
								//echo '"value-bla": ' . $c . ',';
							}
						echo '},';
						$i++;
					}
				echo ']';
			echo '});';
		echo '</script>';
	}
}