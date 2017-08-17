<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script type="text/javascript">
 // holding_chart    
var chart = AmCharts.makeChart("holding_chart", {
    "type": "serial",
    "theme": "light",
    "marginRight": 70,
    "dataProvider": [<?php echo $holdings_data;?>],
    "valueAxes": [{
            "axisAlpha": 0,
            "position": "left",
            "title": "Weight (%)"
        }],
    "startDuration": 1,
    "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "weight"
        }],
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "holding",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 45
    },
    "export": {
        "enabled": true
    }
});

// sector_chart 
var chart = AmCharts.makeChart( "sector_chart", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [<?php echo $sectors_data;?>],
  "valueField": "weight",
  "titleField": "sector",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
});

<?php if(!empty($country_data)){ ?>
// country_chart 
var chart = AmCharts.makeChart( "country_chart", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [<?php echo $country_data;?>],
  "valueField": "weight",
  "titleField": "country",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
});
<?php } ?>

</script>

