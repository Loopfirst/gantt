<?php

require('lib/gantti.php');
require('data/front.php');
require('data/back.php');
require('data/gantt.php');

date_default_timezone_set('UTC');
setlocale(LC_ALL, 'en_US');

$frontend = new Gantti($front, array(
  'title'      => 'Front End',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));

$backend = new Gantti($back, array(
  'title'      => 'Back End',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));

$gantt = new Gantti($gantt, array(
  'title'      => 'Gantt',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));


?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Loopfirst Gantt Chart</title>
  <meta charset="utf-8" />

  <link rel="stylesheet" href="styles/css/screen.css" />
  <link rel="stylesheet" href="styles/css/gantti.css" />

  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>

<header>

<h1>Loopfirst</h1>
<h2>Development Gantt Chart</h2>

<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="js/main.js"></script>

</header>

<div id="frontend">
  <?php echo $frontend ?>
</div>

<div id="backend">
  <?php echo $backend ?>
</div>

<div id="gantt">
  <?php echo $gantt ?>
</div>

<article>


<h2>Usage</h2>

<p>Data is stored in data/</p>

<p><pre><code><?php $code = "
<?php

\$data = array();

\$data[] = array(
    'label' => 'Label 1',
    'start' => 'YYYY-MM-DD',
    ['end'   => 'YYYY-MM-DD',]
    ['class' => '', 'important', or 'urgent',]
);

\$data[] = array(
    ...
);

?>

";

echo htmlentities(trim($code)); ?>
</pre></code></p>

<h2>Data</h2>

<p>Data is defined as an associative array (see the example above).</p>

<p>
  For each project you get the following options:

  <ul>
    <li>label: The label will be displayed in the sidebar</li>
    <li>start: The start date. Must be in the following format: YYYY-MM-DD</li>

    <li><p></p></li>
    <li>optional</li>
    <li>end:   The end date (end of day). Must be in the following format: YYYY-MM-DD</li>
    <li>class: Available by default: important, urgent</li>
  </ul>

</p>

</article>

</body>

</html>
