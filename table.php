<?php
    $json_file1 = file_get_contents('https://api.thingspeak.com/channels/36148/feeds.json?results=2&timezone=America%2FNew_York');
    $jfo1 = json_decode($json_file1);

    $channel1 = $jfo1->channel;
    $title1 = $channel1->name;
    $feeds1 = $jfo1->feeds;

    $json_file2 = file_get_contents('https://api.thingspeak.com/channels/105509/feeds.json?results=2&timezone=America%2FNew_York');
    $jfo2 = json_decode($json_file2);

    $channel2 = $jfo2->channel;
    $title2 = $channel2->name;
    $feeds2 = $jfo2->feeds;

    $json_file3 = file_get_contents('https://api.thingspeak.com/channels/101673/feeds.json?results=2&timezone=America%2FNew_York');
    $jfo3 = json_decode($json_file3);

    $channel3 = $jfo3->channel;
    $title3 = $channel3->name;
    $feeds3 = $jfo3->feeds;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Environmental Wellness In Numbers</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>

<div class="container">
<h1 class="main_title"><?php echo $title2; ?></h1>
<div class="content">
<ul class="ul_json clearfix">
<?php
    foreach ($feeds2 as $feed) {
?>
    <li>
    <h2><?php echo $feed->field1; ?> C</h2>
    <h3><?php echo $feed->field2; ?> mmHg</h3>
    <h3><?php echo $feed->field3; ?> %</h3>
    <h3><?php echo $feed->field4; ?> mV</h3>

    <h3>
<?php
    $d=strtotime($feed->created_at);
    $diff=ceil((time()-$d)/60);
    echo date("Y-m-d h:i:sa", $d) . " (" . $diff . " min ago)";
?>
        </h3>
    </li>
<?php
    } // end foreach
?>
</ul>
</div>
</div>

<div class="container">
<h1 class="main_title"><?php echo $title1; ?></h1>
<div class="content">
<ul class="ul_json clearfix">
<?php
    foreach ($feeds1 as $feed) {
?>
    <li>
    <h2><?php echo $feed->field1; ?> C</h2>
    <h3><?php echo $feed->field3; ?> mV</h3>

    <h3>
<?php
    $d=strtotime($feed->created_at);
    $diff=ceil((time()-$d)/60);
    echo date("Y-m-d h:i:sa", $d) . " (" . $diff . " min ago)";
?>
        </h3>
    </li>
<?php
    } // end foreach
?>
</ul>
</div>
</div>

<div class="container">
<h1 class="main_title"><?php echo $title3; ?></h1>
<div class="content">
<ul class="ul_json clearfix">
<?php
    foreach ($feeds3 as $feed) {
?>
    <li>
    <h2><?php echo $feed->field1; ?> C</h2>
    <h2><?php echo $feed->field2; ?> %</h2>
    <h3><?php echo $feed->field3; ?> C</h3>

    <h3>
<?php
    $d=strtotime($feed->created_at);
    $diff=ceil((time()-$d)/60);
    echo date("Y-m-d h:i:sa", $d) . " (" . $diff . " min ago)";
?>
        </h3>
    </li>
<?php
    } // end foreach
?>
</ul>
</div>
</div>

    <div class="footer">
    Powered by<a href="http://www.newartstudio.net"> New Art Tech Studio </a>
    </div>

    </body>
</html>
