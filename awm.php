<html>
<head>

<!-- Le styles -->
<link href="_assets/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
body {
  padding-top: 60px;
  padding-bottom: 40px;
}
</style>
<link href="_assets/bootstrap/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="bootstrap/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="bootstrap/ico/apple-touch-icon-57-precomposed.png">

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/redmond/jquery-ui.css">

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
google.load("jquery", "1.7");
google.load("jqueryui", "1");
google.load("webfont", "1.0.26");
</script>
<!-- script type="text/javascript" src="http://69.89.31.214/~nickrigg/wp-content/uploads/2009/08/ajaxPoll.js"></script> -->

<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

<script>
$(document).ready(function() {

$.ajaxPollSettings.pollingType = "interval";
$.ajaxPollSettings.interval = 250;
$.ajaxPollSettings.maxInterval = 1000;
$.ajaxPollSettings.durationUntilMaxInterval = 2000;

$.ajaxPoll({
  // setup the request
  url: 'http://192.168.2.20/index.php',
  crossDomain: true,
  dataType: 'jsonp',
  jsonp: false,
  jsonpCallback: 'channels', // "supply" the jsonp function (pseudo-defined)

  complete: function(data){
//console.log(data);
  },

  successCondition: function(data){
    $.each(data.analog, function(key, rawvalue){
      $("#progressbar-analog" + key).progressbar({ value: Math.round(rawvalue/10.24) });
      $("#value-analog" + key).text(rawvalue);
    });
    $.each(data.digital, function(key, rawvalue){
      $("#progressbar-digital" + key).progressbar({ value: Math.round(rawvalue*100) });
      $("#value-digital" + key).text(rawvalue);
    });

//voltage = data.analog[1] * 2.5;
//voltage /= 1024.0;
//tempC = (voltage - 0.25) * 100;

voltage = data.analog[1] * 3.3;
voltage /= 1024.0;
TMP35 = 0.25;  TMP36 = 0.5;  TMP37 = 0.75;
tempC = (voltage - TMP36) * 100;
$("#temperature").text(tempC.toFixed(2));

  },
  error: function(j,t,e){
    alert('AJAX Error');
  }
});
});
</script>

<style>
BODY {
  font-family: 'Droid Sans', sans-serif;
}
.ui-progressbar { position: relative }
.ui-progressbar .label-value { position: absolute; top: 8px; left: 8px; }

#digital-channels {
  width: 600px;
}
#digital-channels .meter {
  width: 30px !important;
  float: left;
}
</style>

</head>
<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">Project name</a>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

<div class="container">
<h1>Arduino Channels</h1>

<h2>Real-world values</h2>
<p>Temperature: <span id="temperature">--</span>&deg;C</p>

<h2>Analog</h2>
<div id="channels" style="width: 415px;">
  <div id="progressbar-analog0"><div class="label-value" id="value-analog0">a0</div></div>
  <div id="progressbar-analog1"><div class="label-value" id="value-analog1">a1</div></div>
  <div id="progressbar-analog2"><div class="label-value" id="value-analog2">a2</div></div>
  <div id="progressbar-analog3"><div class="label-value" id="value-analog3">a3</div></div>
  <div id="progressbar-analog4"><div class="label-value" id="value-analog4">a4</div></div>
  <div id="progressbar-analog5"><div class="label-value" id="value-analog5">a5</div></div>
</div>

<h2>Digital</h2>
<div id="digital-channels">
  <div class="meter" id="progressbar-digital0"><div class="label-value" id="value-digital0">d0</div></div>
  <div class="meter" id="progressbar-digital1"><div class="label-value" id="value-digital1">d1</div></div>
  <div class="meter" id="progressbar-digital2"><div class="label-value" id="value-digital2">d2</div></div>
  <div class="meter" id="progressbar-digital3"><div class="label-value" id="value-digital3">d3</div></div>
  <div class="meter" id="progressbar-digital4"><div class="label-value" id="value-digital4">d4</div></div>
  <div class="meter" id="progressbar-digital5"><div class="label-value" id="value-digital5">d5</div></div>
  <div class="meter" id="progressbar-digital6"><div class="label-value" id="value-digital6">d6</div></div>
  <div class="meter" id="progressbar-digital7"><div class="label-value" id="value-digital7">d7</div></div>
  <div class="meter" id="progressbar-digital8"><div class="label-value" id="value-digital8">d8</div></div>
  <div class="meter" id="progressbar-digital9"><div class="label-value" id="value-digital9">d9</div></div>
  <div class="meter" id="progressbar-digital10"><div class="label-value" id="value-digital10">d10</div></div>
  <div class="meter" id="progressbar-digital11"><div class="label-value" id="value-digital11">d11</div></div>
  <div class="meter" id="progressbar-digital12"><div class="label-value" id="value-digital12">d12</div></div>
</div>

</div>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="_assets/js/ajaxpoll/ajaxPoll.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-transition.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-alert.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-modal.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-scrollspy.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-tab.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-tooltip.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-popover.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-button.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-carousel.js"></script>
<script src="_assets/bootstrap/docs/assets/js/bootstrap-typeahead.js"></script>

</body>
</html>
