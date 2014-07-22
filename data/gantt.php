<?php

$gantt = array();


$gantt[] = array(
	'label' => 'Collapsable Subclasses',
	'start' => '2014-04-01',
);

$gantt[] = array(
	'label' => 'Milestones lines',
	'start' => '2014-04-03',
	'info'  => 'They are different colors, hoverable for more info'
);

$gantt[] = array(
	'label' => 'Zooming',
	'start' => '2014-04-05',
	'info'  => 'Month View'
);

$gantt[] = array(
	'label' => 'Dependancy',
	'start' => '2014-04-05',
	'info'  => 'Task depends on some other task, with a connecting arrow'
);

$gantt[] = array(
	'label' => 'Basic Filtering',
	'start' => '2014-04-05',
	'info'  => 'On classes'
);

$gantt[] = array(
	'label' => 'Unsorted completed tasks',
	'start' => '2014-04-05',
	'info'  => 'Have it stored in a completed array, sorted by label'
);


$gantt[] = array(
	'label' => 'Todo list',
	'start' => '2014-04-05',
	'info'  => 'Instead of putting tasks on gant chart'
);





/* Completed
------------------------- */

$gantt[] = array(
	'label' => 'Grunt LiveReload',
	'start' => '2014-04-01',
	'end'   => '2014-04-01',
	'color' => 'completed'
);

$gantt[] = array(
	'label' => 'Multi segments',
	'start' => '2014-04-03',
	'end'   => '2014-04-03',
	'color' => 'completed'
);

$gantt[] = array(
	'label' => 'Description per segment',
	'start' => '2014-04-04',
	'end'   => '2014-04-04',
	'color' => 'red',
	'done'  => 'Completed'
);


$gantt[] = array(
	'label' => 'Hide Completed Tasks',
	'start' => '2014-04-01',
	'end'   => '2014-04-05',
	'color' => 'completed',
);

$gantt[] = array(
	'label' => 'Percentage Done',
	'start' => '2014-04-03',
	'end'   => '2014-04-05',
	'done'  => 100
);


$gantt[] = array(
	'label' => 'Drag scrolling',
	'start' => '2014-04-05',
	'end'   => '2014-04-05',
	'info'  => 'For each gantt chart',
	'done'  => true
);

?>
