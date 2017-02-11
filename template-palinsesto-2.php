<?php
/**
* Template Name: Page Palinsesto 2
*/
get_header(); ?>

			<script src="http://www.border-radio.it/airtime-widgets/js/jquery-1.6.1.min.js" type="text/javascript"></script>
			<script src="http://www.border-radio.it/airtime-widgets/js/jquery-ui-1.8.10.custom.min.js" type="text/javascript"></script>
			<script src="http://www.border-radio.it/airtime-widgets/js/jquery.showinfo.js" type="text/javascript"></script>
			<link href="http://www.border-radio.it/airtime-widgets/css/airtime-widgets.css" rel="stylesheet" type="text/css" />
<script>

$(document).ready(function() {
    $("#scheduleTabs").airtimeWeekSchedule({
        sourceDomain:"http://www.border-radio.it",
        dowText:{monday:"Luned&#236;", tuesday:"Marted&#236;", wednesday:"Mercoled&#236;", thursday:"Gioved&#236;", friday:"Venerd&#236;", saturday:"Sabato", sunday:"Domenica"},
        miscText:{time:"Ora", programName:"Programma", details:"", readMore:"Vai al Programma >"},
        updatePeriod: 600 //seconds
    });
    var d = new Date().getDay();
    $('#scheduleTabs').tabs({selected: d === 0 ? 6 : d-1, fx: { opacity: 'toggle' }});

});
</script>
<h1>Palinsesto</h1>
<p>Scopri la programmazione settimanale di Border Radio:</p>
<br/>
<div id="scheduleTabs"></div>

<?php get_footer(); ?>