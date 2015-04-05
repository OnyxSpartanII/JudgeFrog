<?php
    $this->set('title', 'Data Analysis | Human Trafficking Data');
    $this->set('active', 'search');
?>
<!-- Analyze/index.ctp -->
<?php echo $this->Html->script(array('GoogleChartFunctions', 'html2canvas', 'Blob', 'canvas-toBlob', 'FileSaver'));?>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Analyze Data</h3>
              <div class="col-md-3 contact-right">
                <!-- TOP STATUS AND SEARCH BAR -->
                  <div class="top_bar col-md-3">
                    <div class="top_bar_left">
                      <h4>ANALYZE BY</h4>
                    </div>
                      <!-- ANALYZE BUTTON-->
                      <div class="analyze_button" title="Analyze data" style="float:right; padding: 10px 14px 10px 14px;">
                        <label for="" id="applyButton">
                          <?php echo $this->Html->image('analyze.png', array('alt' => 'Submit', 'style' => '' )); ?>
                        </label>
                      </div>
                  </div>
                <!-- Analyze Interface -->
                  <div class="col-md-3" id="collapsible-panels">
                        <!-- <?php
                          $base_url = array('controller' => 'search', 'action' => 'update');
                          echo $this->Form->create(array('url' => $base_url, 'inputDefaults' => array('label' => false, 'div' => false)));?> -->
                      <h2><a href="#">1. Choose A Graph</a></h2>
                        <div class="graph_selection">
                              <form action="">
                                <input type="radio" name="graphRadio" id="barGraphRadio">Bar Graph<br>
                                <input type="radio" name="graphRadio" id="lineGraphRadio">Line Graph<br>
                                <input type="radio" name="graphRadio" id="histogramRadio">Histogram<br>
                                <input type="radio" name="graphRadio" id="pieChartRadio">Pie Chart<br>
                                <input type="radio" name="graphRadio" id="geoChartRadio">Geo Chart <br>
                              </form>
                                  <!-- <button id="applyButton">Apply</button> -->
                        </div>
                    <h2><a href="#">2. Customize</a></h2>
                      <div>
                        <?php
                        echo $this->Form->create(array('inputDefaults' => array('label' => false, 'div' => false)));?>
                        <?php
                        echo $this->Form->input('yAxisBox', array('empty' => 'Y Axis', 'id' => 'yAxisBox', 'options' => array('Total Cases', 'Total Defendants', 'Avg Defendants Per Case', 'Total Months Sentenced', 'Avg Months Sentenced', 'Victims', 'Total Charge', 'Total Sentenced')));?>
                        <?php
                        echo $this->Form->input('xAxisBox', array('empty' => 'X Axis', 'id' => 'xAxisBox', 'options' => array('Year', 'Defendant By Gender', 'Defendant By Race', 'Judge By Gender', 'Judge By Race', 'Judge By Party', 'Crime Type', 'Statute', 'Federal District','State', 'Statute Charged','Statute Sentenced','Organized Crime Groups')));?>
                        <?php
                        echo $this->Form->input('geoChartCombo', array('empty' => 'GeoChart', 'id' => 'geoChartCombo', 'options' => array('Case By State','Federal District')));?>
                      <?php
                         echo $this->Form->end(array('id' => 'submit_form'));?>
                      </div>
                    
                    </div><!-- END OF COLLAPSIBLE PANEL -->
                </div> 
              <div class="col-md-9 contact-left">
                    <!-- TOP STATUS AND SEARCH BAR -->
                      <div class="top_bar col-md-9">     
	                    <div class="top_bar_dash">
	                      <h4>ANALYSIS DASHBOARD</h4>
	                      <!-- CLEAR FIELDS BUTTON -->
	                      <div class="ana_button" title="Click here clear all the fields." style="float:left">
	                        <label for="">
	                          <?php 
	                          echo $this->Html->link(
	                              $this->Html->image("clear.png", array("alt" => "Clear Fields")),
	                              "/Analyze", array('escape' => false)); ?>
	                        </label>
	                      </div>
	                      <!-- SCREENSHOT BUTTON -->
	                      <div class="ana_button" title="Screenshot analyzed result">
	                        <label for="" id="screenButton">
	                          <?php echo $this->Html->link(
	                          $this->Html->image("photo.png", array("alt" => "screenshot")), "#Screenshot", array('escape' => false)); ?>
	                        </label>
	                      </div>
	                    </div>
                      </div>
                      <div id="chart" class="col-md-9" style="width:100%;"></div>
              </div>
          </div>
        </div>
            <div class="search_disclaim" style="margin-top:200px">
              <p><strong>Note: </strong>Not every combination of analyzable objects will return meaningful results.</p>
            </div>
    </div>


<!--*********************************************
SCRIPTS
*********************************************-->

<script>
	$('#yAxisBox').show();
	$('#xAxisBox').show();
	$('#geoChartCombo').hide();

	$('#barGraphRadio').click(function() {
		$('#yAxisBox').show();
		$('#xAxisBox').show();
		$('#geoChartCombo').hide();
	});
	$('#lineGraphRadio').click(function() {
		$('#yAxisBox').show();
		$('#xAxisBox').show();
		$('#geoChartCombo').hide();
	});
	$('#histogramRadio').click(function() {
		$('#yAxisBox').show();
		$('#xAxisBox').show();
		$('#geoChartCombo').hide();
	});
	$('#pieChartRadio').click(function() {
		$('#yAxisBox').hide();
		$('#xAxisBox').show();
		$('#geoChartCombo').hide();
	});
	$('#geoChartRadio').click(function() {
		$('#yAxisBox').hide();
		$('#xAxisBox').hide();
		$('#geoChartCombo').show();
	});
</script>

<script>

	  function pieChart() {
	    var data = google.visualization.arrayToDataTable([
	        ['Task', 'Hours per Day'],
	        [ 'Adult',     25],
	        [ 'Minor',      25],
	        [ 'Labor',  50]
	      ]);

	    var options = {
	        title: 'Type of Trafficking'
	    };

	    var chart = new google.visualization.PieChart(document.getElementById('chart'));
	    chart.draw(data, options);
	  }
	  function barGraph() {
	        var data = google.visualization.arrayToDataTable([
	          ['Case', 'White', 'Black', 'Hispanic', 'Asian', 'Other'],
	          ['Case 1',  4,      6,     3,        4,      2],
	          ['Case 2',  5,      5,     5,        7,      3]
	        ]);

	        var options = {
	          title: 'Defendants By Ethnicity',
	          vAxis: {title: 'Number of Defendants',  titleTextStyle: {color: 'red'}}
	        };

	        var chart = new google.visualization.BarChart(document.getElementById('chart'));

	        chart.draw(data, options);
	      }
	  function histogram() {
	        var data = google.visualization.arrayToDataTable([
	          ['Dinosaur', 'Length'],
	          ['Acrocanthosaurus (top-spined lizard)', 12.2],
	          ['Albertosaurus (Alberta lizard)', 9.1],
	          ['Allosaurus (other lizard)', 12.2],
	          ['Apatosaurus (deceptive lizard)', 22.9],
	          ['Archaeopteryx (ancient wing)', 0.9],
	          ['Argentinosaurus (Argentina lizard)', 36.6],
	          ['Baryonyx (heavy claws)', 9.1],
	          ['Brachiosaurus (arm lizard)', 30.5],
	          ['Ceratosaurus (horned lizard)', 6.1],
	          ['Coelophysis (hollow form)', 2.7],
	          ['Compsognathus (elegant jaw)', 0.9],
	          ['Deinonychus (terrible claw)', 2.7],
	          ['Diplodocus (double beam)', 27.1],
	          ['Dromicelomimus (emu mimic)', 3.4],
	          ['Gallimimus (fowl mimic)', 5.5],
	          ['Mamenchisaurus (Mamenchi lizard)', 21.0],
	          ['Megalosaurus (big lizard)', 7.9],
	          ['Microvenator (small hunter)', 1.2],
	          ['Ornithomimus (bird mimic)', 4.6],
	          ['Oviraptor (egg robber)', 1.5],
	          ['Plateosaurus (flat lizard)', 7.9],
	          ['Sauronithoides (narrow-clawed lizard)', 2.0],
	          ['Seismosaurus (tremor lizard)', 45.7],
	          ['Spinosaurus (spiny lizard)', 12.2],
	          ['Supersaurus (super lizard)', 30.5],
	          ['Tyrannosaurus (tyrant lizard)', 15.2],
	          ['Ultrasaurus (ultra lizard)', 30.5],
	          ['Velociraptor (swift robber)', 1.8]]);

	        var options = {
	          title: 'Lengths of dinosaurs, in meters',
	          legend: { position: 'none' },
	        };

	        var chart = new google.visualization.Histogram(document.getElementById('chart'));
	        chart.draw(data, options);
	      }
	  function lineGraph(data, options) {
	        var data = google.visualization.arrayToDataTable([
	          ['Year', 'Sales', 'Expenses'],
	          ['2004',  1000,      400],
	          ['2005',  1170,      460],
	          ['2006',  660,       1120],
	          ['2007',  1030,      540]
	        ]);

	        //var d = google.visualization.arrayToDataTable(data);

	        var options = {
	          title: 'Company Performance',
	          curveType: 'function',
	          legend: { position: 'bottom' }
	        };

	        var chart = new google.visualization.LineChart(document.getElementById('chart'));

	        chart.draw(data, options);
	      }
	  function geoChart() {
	        var data = google.visualization.arrayToDataTable([
	          ['State',   '# of Cases'],
	          ['Texas', 14],
	          ['Tennessee', 12],
	          ['Florida', 8],
	          ['California', 7],
	          ['New York', 21],
	          ['Illinois', 9],
	          ['Alabama', 2],
	          ['Arizona', 11],
	        ]);
	  
	        var options = {
	          region: 'US',
	          displayMode: 'markers',
	          colorAxis: {colors: ['green', 'blue']},
	          resolution: 'provinces'
	        };

	        var chart = new google.visualization.GeoChart(document.getElementById('chart'));
	        chart.draw(data, options);
	      };

	  function initialize () {
	    $('#applyButton').click(function() {
	        if($('#lineGraphRadio').is(':checked')) {
	          lineGraph();
				$.ajax({                   
					url: '/JudgeFrog/jdgfrog/Analyze/generateGraph/line',
					cache: false,
					type: 'GET',
					dataType: 'HTML',
					success: function (data, options) {
						lineChart(data, options);
					}
				});

	        }
	        else if($('#barGraphRadio').is(':checked')){
	          barGraph();
	        }
	          else if($('#histogramRadio').is(':checked')){
	          histogram();
	        }
	          else if($('#pieChartRadio').is(':checked')){
	          pieChart();
	        }
	          else if($('#geoChartRadio').is(':checked')){
	          geoChart();
	        }
	        
	    });
	  }
	google.setOnLoadCallback(initialize);
	google.load("visualization", "1", {packages:["corechart"]});
</script>

<!-- Script to allow search bars collapsible - added by Landon -->
<script type="text/javascript">
  $(document).ready(function(){

  // hide all div containers
  $('#collapsible-panels div').hide();
  // append click event to the a element
  $('#collapsible-panels a').click(function(e) {
    // slide down the corresponding div if hidden, or slide up if shown
    $(this).parent().next('#collapsible-panels div').slideToggle('slow');
    // set the current item as active
    $(this).parent().toggleClass('active');
    e.preventDefault();
  });
});

// SCREENSHOT SCRIPT
$("#screenButton").click(function() {
  	if ($("#chart").text().length > 0) {
			// alert('I was clicked!');
		    html2canvas($("#chart"), {
		        onrendered: function(canvas) {
		            theCanvas = canvas;
		            document.body.appendChild(canvas);
		            canvas.toBlob(function(blob) {
						saveAs(blob, "Analysis Results.png"); 
					});
		        }
		    });
 	}
    else {alert('No data available for download - Analyze a data first')}
}); 
// END OF SCREENSHOT SCRIPT

</script>


<!-- added by Landon (above) -->
    <script>
      new UISearch( document.getElementById( 'sb-search' ) );
    </script>
<!-- slider Script 
<script type="text/javascript" src="/js/sliderMod.js"></script>-->


</body>