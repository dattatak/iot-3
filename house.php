<!DOCTYPE html>
<html style="height: 100%;">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="def.css" media="screen"/>
    <style type="text/css">
  body { background-color: white; height: 100%; margin: 0; padding: 0; }
  #chart-container { width: 825px; height: 535px; display: block; position:absolute; bottom:0; top:0; left:0; right:0; margin: 5px 15px 15px 0; overflow: hidden; }
</style>
</head>

<body class="bodypage" onload="updateData()">

<?php
include("menu.php");
?>

<script>

// read specified feed
/*
    el_id - svg element to update
    channel_id - thingspeak channel id
    field_number - field to read
    pre - prefix for display (T= )
    suf - ending for display ( C)
*/
function parseFeed(el_id, channel_id, field_number) {
    var field_name = 'field' + field_number;

    // get the data with a webservice call
    $.getJSON('https://api.thingspeak.com/channels/' + channel_id + '/fields/' + field_number + '.json?offset=0&round=2&results=1', function(data) {
          document.getElementById(el_id).textContent = parseFloat(data.feeds[0][field_name]);
    });
}

function updateData()
{
    parseFeed('outT', '142235', '1');
    parseFeed('outH', '142235', '4');
    parseFeed('outP', '142235', '6');
    parseFeed('livT', '101673', '1');
    parseFeed('livH', '101673', '2');
    parseFeed('fishT', '101673', '3');
    parseFeed('attT', '142240', '1');
    parseFeed('attH', '142240', '4');
    parseFeed('secT', '36148', '1');
    parseFeed('groundT', '105509', '1');
}

function onOutTClick()
{
	alert("I am an alert box!");
}

</script>

<svg
  xmlns:svg="http://www.w3.org/2000/svg"
  xmlns:xlink="http://www.w3.org/1999/xlink"
  xmlns="http://www.w3.org/2000/svg"
  width="700"
  height="600">

<!-- house -->
<rect width="660" height="120" x="20" y="460" style="fill:#00ff00;fill-opacity:0.4;stroke:#000000;stroke-opacity:0" />
<rect width="440" height="400" x="80" y="160" style="fill:#dddddd;stroke:#666666;stroke-width:2" />
<rect width="440" height="20" x="80" y="520" style="fill:#ffcc00;stroke:#666666;stroke-width:2" />
<rect width="440" height="20" x="80" y="340" style="fill:#ffcc00;stroke:#666666;stroke-width:2" />
<rect width="5" height="160" x="260" y="360" style="fill:#666666;stroke:#666666;stroke-width:1" />
<rect width="5" height="180" x="200" y="160" style="fill:#666666;stroke:#666666;stroke-width:1" />
<rect width="5" height="180" x="360" y="160" style="fill:#666666;stroke:#666666;stroke-width:1" />
<rect width="480" height="38" x="60" y="540" style="fill:#666666;stroke:#666666;stroke-width:2" />
<rect width="120" height="20" x="360" y="540" style="fill:#dddddd;stroke:#666666;stroke-width:2" />
<rect width="160" height="18" x="340" y="560" style="fill:#dddddd;stroke:#666666;stroke-width:2" />

<!-- roof -->
<path d="M 60,155 540,155 300,10 z" style="fill:#dddddd;fill-opacity:1;stroke:#7e6b56;stroke-width:6" />
<circle cx="300" cy="60" r="20" style="fill:#dddddd;fill-opacity:1;stroke:#666666;stroke-width:2" />

<g transform="translate(550,480)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#ccff66;stroke:#000000" />
<text x="70" y="10" style="font-size:8px">o</text>
<text x="75" y="25" style="font-size:24px">C</text>
<a xlink:href="https://thingspeak.com/channels/105509">
  <text x="10" y="25" id="groundT" style="font-size:24px">27.8</text>
</a>
</g>

<g transform="translate(550,170)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" onclick="onOutTClick();" />
<rect width="90" height="30" x="5" y="2" style="fill:#ccff66;stroke:#000000" />
<text x="70" y="10" style="font-size:8px">o</text>
<text x="75" y="25" style="font-size:24px">C</text>
<text x="10" y="25" id="outT" style="font-size:24px">27.8</text>
</g>

<g transform="translate(550,210)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#00ffff;stroke:#000000" />
<text x="70" y="25" style="font-size:24px">%</text>
<text x="10" y="25" id="outH" style="font-size:24px">54.8</text>
</g>

<g transform="translate(550,250)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#fff6d5;stroke:#000000" />
<text x="64" y="25" style="font-size:16px">kPa</text>
<text x="8" y="25" id="outP" style="font-size:16px">1000.8</text>
</g>

<g transform="translate(390,440)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#ccff66;stroke:#000000" />
<text x="70" y="10" style="font-size:8px">o</text>
<text x="75" y="25" style="font-size:24px">C</text>
<text x="10" y="25" id="livT" style="font-size:24px">27.8</text>
</g>

<g transform="translate(390,480)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#00ffff;stroke:#000000" />
<text x="70" y="25" style="font-size:24px">%</text>
<text x="10" y="25" id="livH" style="font-size:24px">54.8</text>
</g>

<g transform="translate(180,100)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#ccff66;stroke:#000000" />
<text x="70" y="10" style="font-size:8px">o</text>
<text x="75" y="25" style="font-size:24px">C</text>
<text x="10" y="25" id="attT" style="font-size:24px">27.8</text>
</g>

<g transform="translate(320,100)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#00ffff;stroke:#000000" />
<text x="70" y="25" style="font-size:24px">%</text>
<text x="10" y="25" id="attH" style="font-size:24px">54.8</text>
</g>

<g transform="translate(240,250)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#ccff66;stroke:#000000" />
<text x="74" y="10" style="font-size:8px">o</text>
<text x="75" y="25" style="font-size:22px">C</text>
<text x="10" y="25" id="secT" style="font-size:22px">27.8</text>
</g>

<g transform="translate(120,460)">
<rect width="100" height="35" x="0" y="0" style="fill:#b2b2b2;stroke:#000000" />
<rect width="90" height="30" x="5" y="2" style="fill:#ccff66;stroke:#000000" />
<text x="70" y="10" style="font-size:8px">o</text>
<text x="75" y="25" style="font-size:24px">C</text>
<text x="10" y="25" id="fishT" style="font-size:24px">27.8</text>
</g>

<rect width="160" height="100" x="90" y="410" style="fill:#00ffff;fill-opacity:0.4;stroke:#000000" />

<g transform="translate(120,380)">
<path d="M96.806,50.581c-0.775,0.021-1.511,0.322-2.283,0.202c-0.016-0.053-0.03-0.151-0.038-0.202  c0.666-0.302,1.403-0.49,2.011-0.925c0.325-0.316,0.792-0.691,0.573-1.209c-0.242-1.068-1.218-1.729-2.06-2.307  c-1.007-0.707-2.14-1.173-3.214-1.735c-1.18-0.504-2.771-2.356-18.807-5.387c-5.913-1.133-11.902-1.648-12.152-1.836  c-5.526,0.102-11.099-6.188-12.797-6.691C47.776,30.317,47.581,31,47.452,31h0.002c-0.16,1-0.614,8.46,0.302,8.738  c-1.03,0.308-2.109,0.271-3.156,0.497c-1.72,0.33-10.451,2.965-14.923,3.992c-1.585,0.294-3.21,0.235-4.815,0.242  c-1.549-0.029-3.073-0.372-4.561-0.761c-1.817-0.518-16.438-6.635-16.537-6.133c0.038,4.065,2.203,6.819,3.75,10.432  c0.052,0.526,0.269,1.035,0.196,1.576c-0.858,2.793-4.111,5.208-4.913,8.098c0.006,0.556-0.234,1.051-0.438,1.554  c0.67,0.044,1.339,0.083,2.013,0.067c1.466-0.172,10.055-2.336,11.376-2.645c1.292-0.299,2.501-0.85,3.777-1.164  c0.725-0.173,1.377-0.548,2.104-0.669c1.443-0.188,2.901-0.367,4.359-0.225c1.016,0.104,2.027,0.203,3.029,0.42  c0.757,0.166,6.36,1.226,9.716,2.373c2.207,0.173,10.578,3.585,11.368,3.751c-1.289,2.099-1.147,3.252-1.48,5.746  c-0.216,0.879-0.254,1.888,0.359,2.614c0.278,0.264,0.731,0.277,1.044,0.069c4.525-4.812,9.603-6.665,9.82-7.348  c2.756,0.329,5.53,0.044,8.294,0.059c15.207-0.16,25.758-8.233,26.728-8.767c0.812-0.413,1.678-0.872,2.166-1.675  C97.422,51.488,97.287,50.769,96.806,50.581z M87.604,50.102c-0.896,0-1.621-0.727-1.621-1.623c0-0.896,0.725-1.623,1.621-1.623  c0.897,0,1.624,0.727,1.624,1.623C89.229,49.375,88.502,50.102,87.604,50.102z"/>
</g>
</svg>

<?php include("footer.php"); ?>

</body>
</html>

