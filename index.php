<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8"/>
  <title>CSS Flip-Counter Experiment</title>
  <meta name="description" content="An experiment in CSS animation for my flip counter script."/>
  <meta name="keywords" content="HTML,CSS,JavaScript,counter,apple-style,flip,animate,digit,demo"/>
  <meta name="author" content="Chris Nanney"/>

  <!-- Counter script -->
  <script type="text/javascript" src="js/flipcounter.js"></script>
  <script type="text/javascript" src="js/modernizr.custom.21954.js"></script>
  <!-- Counter styles -->
  <link rel="stylesheet" type="text/css" href="css/style.css"/>

  <!-- NOT REQUIRED FOR COUNTER TO FUNCTION, JUST FOR DEMO PURPOSES -->
  <!-- jQuery from Google CDN, NOT REQUIRED for the counter itself -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
  <link rel="stylesheet"
    type="text/css"
    href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/vader/jquery-ui.css"/>
  <!-- jQueryUI from Google CDN, used only for demo controls out of laziness, NOT REQUIRED for the counter itself -->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu:400,500,700">
  <!-- Style sheet for the jQueryUI controls, NOT REQUIRED for the counter itself -->
  <!-- Style sheet for the demo page, NOT REQUIRED for the counter itself -->

</head>

<body>
<h1>CSS FLIP-COUNTER</h1>

<ul id="style-switcher" class="clearfix">
  <li><a href="#" class="active" data-style="default">Default</a></li>
  <li><a href="#" data-style="light">Light</a></li>
  <li><a href="#" data-style="small">Small</a></li>
  <li><a href="#" data-style="huge">Huge</a></li>
</ul>

<div id="wrapper">
  <ul class="flip-counter default" id="myCounter"></ul>
</div>
<!-- Are you serious? A clear div in 2012? Yes. -->
<div class="clear"></div>
<ul id="demo_controls">
  <li>Increment:
    <span id="inc_value">123</span>

    <div id="inc_slider" class="demo_widget"></div>
  </li>
  <li>Pace:
    <span id="pace_value">1000</span>ms
    <div id="pace_slider" class="demo_widget"></div>
  </li>
</ul>

<script>


  $(function(){

    var myCounter = new flipCounter('myCounter', {value: 1000, inc: 123, pace: 1000, auto: false});

    $('#style-switcher a').on('click', function(e){
      e.preventDefault();
      $("#myCounter").removeClass().addClass('flip-counter '+$(this).data('style'));
      $('#style-switcher a').removeClass('active');
      $(this).addClass('active');
    });

    $('#inc_slider').slider({
      range: 'max',
      value: 123,
      min: 0,
      max: 1000,
      slide: function(event, ui){
        $('#inc_value').text(ui.value);
        myCounter.setIncrement(ui.value);

        if (ui.value == 0) myCounter.setAuto(false);
        else myCounter.setAuto(true);
      }
    });

    // Pace
    $('#pace_slider').slider({
      range: 'max',
      value: 1000,
      min: 400,
      max: 2000,
      step: 100,
      slide: function(event, ui){
        myCounter.setPace(ui.value);
        $("#pace_value").text(ui.value);
      }
    });

  });
</script>
</body>
</html>