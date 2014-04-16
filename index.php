<?php

date_default_timezone_set('America/Los_Angeles');
date_default_timezone_set('UTC');
setlocale(LC_ALL, 'en_US');

require('lib/gantti.php');

require('data/dev_schedule.php');
require('data/front.php');
require('data/back.php');
require('data/others.php');
require('data/git_branches.php');


$dev_schedule = new Gantti($dev_schedule, array(
  'title'      => 'Development Schedule',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));

$git_branches = new Gantti($git_branches, array(
  'title'      => 'Git Branches',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));

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

$others = new Gantti($others, array(
  'title'      => 'Others',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));


?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Loopfirst Ganttmobile</title>
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
<h2>Development Ganttmobile</h2>

<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="js/main.js"></script>

<script src="js/jquery.overscroll.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.easing.1.3.js"></script>

</header>

<section id="options">
  <figure class="gantt">
    <figcaption>Options</figcaption>
    <aside>

    </aside>
    <section class="gantt-data">
      <header>
        <ul>
          <li><a href="#" id="gototoday">Today</a></li>
        </ul>
    </section>
  </figure>
</section>


<section id="dev_schedule">
  <?php echo $dev_schedule ?>
</section>

<section id="git_branches">
  <?php echo $git_branches ?>
</section>

<section id="frontend">
  <?php echo $frontend ?>
</section>

<section id="backend">
  <?php echo $backend ?>
</section>

<section id="others">
  <?php echo $others ?>
</section>

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
    ['color' => '', 'blue', 'green', 'orange', 'red', 'yellow', ]
    ['info'  => 'On hover tooltip',]
    ['done'  => %, 'Renamed Label', 'none', true, false]
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
    <li>label: The label will be displayed in the sidebar (same lable, same line)</li>
    <li>start: The start date. Must be in the following format: YYYY-MM-DD</li>

    <li><p></p></li>
    <li>optional</li>
    <li>end:   The end date (end of day). Must be in the following format: YYYY-MM-DD</li>
    <li>color: Colors</li>
    <li>info: Extra info</li>
    <li>done: Percentage (between 0, 99), a renamed label, or none</li>
  </ul>
</p>

<p>
  <h2>Caveats</h2>

  <ul>
    <li> End day is needed when done</li>
    <li> There is no handling of overlapping blocks. </li>
  </ul>

</p>

</article>

</body>

</html>
