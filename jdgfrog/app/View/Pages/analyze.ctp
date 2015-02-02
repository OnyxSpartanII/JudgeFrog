<body>
    <div id="body" class="width">
        
        <div class="body_content">

          <h2 class="page_title">Analyze Data</h2>


<!-- TOP STATUS AND SEARCH BAR -->

<div class="top_bar">
  <div class="top_bar_left">
    <h3>Analyze by</h3>
  </div>


<div class="top_bar_center">
    <h3>Data Analysis Dashboard</h3>
</div>

<!-- SEARCH BUTTON-->
  <div class="ana_button">
    <form id="target" action="">
      <!-- <input type="image" id="applyButton" src="img/analyze.png" > -->
    </form>
    <input type="image" id="applyButton" src="img/analyze.png" >
  </div>

<hr style="margin-top:35px">


</div>



        <!-- Search Interface -->
<div id="collapsible-panels" style="margin-top:0px">

<h2><a href="#">Choose A Graph</a></h2>
        <div>
        <form action="">
            <input type="radio" name="graphRadio" id="barGraphRadio"  > Bar Graph<br>
            <input type="radio" name="graphRadio" id="lineGraphRadio" > Line Graph<br>
            <input type="radio" name="graphRadio" id="histogramRadio" > Histogram<br>
            <input type="radio" name="graphRadio" id="pieChartRadio" > Pie Chart<br>
            <input type="radio" name="graphRadio" id="geoChartRadio"  > Geo Chart <br>
        </form>
            <!-- <button id="applyButton">Apply</button> -->
        </div>
      
        <hr style="width:400px;">


 </div> <!-- END OF COLLAPSIBLE PANEL -->





<div class="center_search_result">

<div id="chart" style="width: 900px; height: 500px;"></div>

</div>

<script type="text/javascript">

  function pieChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        [ 'Adult',     25],
        [ 'Minor',      25],
        [ 'Labor',  50]
      ]);

    var options = {
        title: 'My Daily Activities'
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
  function lineGraph() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

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
          ['Country',   'Latitude'],
          ['USA', 100],
        ]);
  
        var options = {
          region: 'US-TX', // Africa
          colorAxis: {colors: ['#00853f', 'black', '#e31b23']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#f8bbd0',
          resolution: 'provinces'
        };

        var chart = new google.visualization.GeoChart(document.getElementById('chart'));
        chart.draw(data, options);
      };

  function initialize () {
    $('#applyButton').click(function() {
        if($('#lineGraphRadio').is(':checked')) {
          lineGraph();
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
          <!-- Positions the graphs temp -->
        <style>
          #chart {
           position: absolute;
            left: 560px;
            top: 470px;
          }
        </style>
 

            <br><br>
            <hr style="color: #999">
            <br>

            <div class="search_disclaim">
            <p><strong>Disclaimer: </strong>Not every combination of searched values can be manipulated and/or analyzed.</p>
            </div>
</div>

 
        </div>
    </div>


<!--*********************************************
SCRIPTS
*********************************************-->    
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
</script>
<!-- added by Landon (above) -->
    <script>
      new UISearch( document.getElementById( 'sb-search' ) );
    </script>
<!-- slider Script 
<script type="text/javascript" src="/js/sliderMod.js"></script>-->


</body>