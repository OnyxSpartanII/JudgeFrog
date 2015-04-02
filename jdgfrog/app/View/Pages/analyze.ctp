  <?php echo $this->Html->script(array('GoogleChartFunctions'));?>
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
                      <div class="analyze_button" title="Click here to display data using the selected chart/graph." style="float:right; padding: 10px 14px 10px 14px;">
                        <label for="" id="applyButton">
                          <?php echo $this->Html->image('analyze.png', array('alt' => 'Submit', 'style' => '' )); ?>
                        </label>
                      </div>
                  </div>
                <!-- Analyze Interface -->
                  <div class="col-md-3" id="collapsible-panels">
                        <?php
                          $base_url = array('controller' => 'search', 'action' => 'update');
                          echo $this->Form->create(array('url' => $base_url, 'inputDefaults' => array('label' => false, 'div' => false)));?>
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
                        echo $this->Form->input('yAxisBox', array('empty' => 'Y Axis', 'options' => array('Total Cases', 'Total Defendants', 'Avg Defendants Per Case', 'Total Months Sentenced', 'Avg Months Sentenced', 'Victims', 'Total Charge', 'Total Sentenced')));?>
                        <?php
                        echo $this->Form->input('xAxisBox', array('empty' => 'X Axis', 'options' => array('Year', 'Defendant By Gender', 'Defendant By Race', 'Judge By Gender', 'Judge By Race', 'Judge By Party', 'Crime Type', 'Statute', 'Federal District','State', 'Statute Charged','Statute Sentenced','Organized Crime Groups')));?>
                        <!--
                         <?php
                        echo $this->Form->input('pieChartCombo', array('empty' => 'pie', 'options' => array('Mickey Mouse','Pluto','Goofy')));?>
                        -->
                        <?php
                        echo $this->Form->input('geoChartCombo', array('empty' => 'GeoChart', 'options' => array('Case By State','Federal District')));?>
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
                        </div>
                      </div>
                      <div id="chart" class="col-md-9" style="width:100%;">
                      </div>
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