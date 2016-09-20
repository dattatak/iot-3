<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Environmental Wellness In Numbers</title>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/table.css" />
        <link rel="stylesheet" type="text/css" href="css/def.css" media="screen"/>
    </head>
<body class="bodytable" onload="updateData()">

<br />
<?php
include("menu.php");
?>
<br />

<script>

// read specified feed
/*
    el_id - svg element to update
    channel_id - thingspeak channel id
    field_number - field to read
*/
function parseFeed(title, channel_id) {
  $.getJSON('https://api.thingspeak.com/channels/' + channel_id + '/feeds.json?offset=0&round=2&results=2', function(data) {
    var elem = document.getElementById('results');

	var ul = document.createElement("ul");
	ul.setAttribute("class", "ul_json clearfix" );

// Create row in the table
	for (var i = 0; i < data.feeds.length; ++i) 
	{
		var add = false;
		var li = document.createElement("li");
		for(var key in data.feeds[i])
		{
			if (key.startsWith('field') && !isNaN(parseFloat(data.feeds[i][key])))
			{
				var h2 = document.createElement("h2");
				h2.appendChild( document.createTextNode(data.channel[key] + ': ' + parseFloat(data.feeds[i][key]))) ;
				li.appendChild(h2);
				add = true;
			}
		}
		if (add)
		{

			var date = new Date();
			var t_up = new Date(Date.parse(data.feeds[i]['created_at']));
			var t_diff  = Math.round((date - t_up) / (1000 * 60));
			var s_diff = '< 1';
			if (t_diff > 0)
				s_diff = t_diff.toString();
			var h2 = document.createElement("h2");
			h2.appendChild( document.createTextNode('Updated: ' + s_diff + ' min ago (' + t_up.toLocaleString() + ')')) ;
			li.appendChild(h2);
			
			ul.appendChild( li );
		}
	}

	var content = document.createElement("div");
	content.setAttribute("class", "content" );
	content.appendChild(ul);

	var h1 = document.createElement("h1");
	h1.setAttribute("class", "main_title" );
	h1.appendChild( document.createTextNode(title) );

	var container = document.createElement("div");
	container.setAttribute("class", "container" );
	var br = document.createElement("br");
	
	container.appendChild(h1);
	container.appendChild(content);

	elem.appendChild(container);
	elem.appendChild(br);

  });
}

function updateData()
{
    parseFeed('Balcony Outside', '142235');
    parseFeed('Living Room', '101673');
    parseFeed('Attic', '142240');
    parseFeed('Kids Bedroom', '36148');
    parseFeed('Ground Level', '105509');
}

</script>

<div id='results'></div>

<?php include("footer.php"); ?>

</body>
</html>
