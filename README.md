# AmChartPHP
PHP Class for AmChart


It's working just with basic functions right now.

Ensure that all AmCharts requirements for the specific functions are met.

Quick and easy Example:
$chart = new AmChartPHP();

$chart->categoryValues(array(1,2,3,4,5,6,7,8,9));

$chart->createGraph("bla", "line", array(6,2,9,4,6,2,8,6,4,0));

$chart->axisTitle("Verfügbarkeit");

$chart->chartScrollbar(true);

$chart->chart("chartdiv");
