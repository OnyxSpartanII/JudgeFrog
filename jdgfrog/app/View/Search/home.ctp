<body>
    <div id="body" class="width">
        
        <div class="body_content">

          <h2 class="page_title">Database Search</h2>


<!-- TOP STATUS AND SEARCH BAR -->

<div class="top_bar">
  <div class="top_bar_left">
    <h3>Search by</h3>
  </div>


<div class="top_bar_center">
    <h3>Search Result Dashboard</h3>
</div>

<!-- SEARCH BUTTON-->
<div class="search_button">
	<label for="submit_form">
  		<img src="/jdgfrog/img/submit1.png" alt="Submit">
  	</label>
</div>

<hr style="margin-top:35px">

</div>


<div class="center_panel">

  <?php
    if (isset($cases)) {
      echo '<table class="search_result_table">';
      echo '<tr>';
      echo '<th class="title_table">Case Name</th>';
      echo '<th class="title_table">Case Number</th>';
      echo '<th class="title_table">Year of Judgement</th>';
      echo '</tr>';

      foreach ($cases as $case) {
        echo '<tr>';
        echo '<td>' . $case['CaseObject']['Name'] . '</td>';
        echo '<td>' . $case['CaseObject']['Number'] . '</td>';
        echo '<td>' . $case['CaseObject']['Year'] . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    }
  ?>

</div>

        <!-- Search Interface -->
<div id="collapsible-panels">
    <form method="post" action="search/update">

    <?php
      $base_url = array('controller' => 'search', 'action' => 'update');
      echo $this->Form->create(array('url' => $base_url, 'inputDefaults' => array('label' => false, 'div' => false)));?>
	    <h2><a href="#">Case</a></h2>
	        <div>
              <?php
                echo $this->Form->input('case_Name', array('placeholder' => 'Name (e.g. USA v. Jones)', 'type' => 'string'));
                echo "<br><br>";
                echo $this->Form->input('case_Number', array('placeholder' => 'Number (e.g. 00-cu-)'));
                echo "<br><br>";
                echo $this->Form->input('case_NumDef', array('label' => 'Number of Defendants', 'id' => 'numbDefSlide'));
                echo "<br><br>";
                echo $this->Form->input('case_State', array('options' => array('Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'), 'empty' => 'State'));
                echo "<br><br>";
                echo $this->Form->input('case_FedDist', array('placeholder' => 'Federal District'));
                echo "<br>";
              ?>
        	</div>

        	<hr style="width:400px;">
 
    		<h2><a href="#">Type of Trafficking</a></h2>
        	<div>
              <?php
                echo $this->Form->input('case_Adult', array('type' => 'checkbox', 'label' => ' Adult Sex ', 'checked' => 'true'));
                echo $this->Form->input('case_Minor', array('type' => 'checkbox', 'label' => ' Minor Sex ', 'checked' => 'true'));
                echo $this->Form->input('case_Labor', array('type' => 'checkbox', 'label' => ' Labor', 'checked' => 'true'));
              ?>
        	</div>

        	<hr style="width:400px;">

		    <h2><a href="#">Defendant</a></h2>
	        <div>
              <?php
                echo $this->Form->input('defendant_Name', array('placeholder' =>'Name'));
                echo '<br><br>';
                echo $this->Form->input('defendant_Gender', array('options' => array('Male', 'Female'), 'empty' => '--Gender--'));
                echo '<br><br>';
                echo $this->Form->input('defendant_YOB', array('label' => 'Year of Birth', 'id' => 'yearBirthDefendant'));
                echo '<br><br>';
                echo $this->Form->input('defendant_Race', array('empty' => '--Race--', 'options' => array('White', 'Black', 'Hispanic', 'Asian', 'Other')));
                echo '<br>';
              ?>
   			</div>

        	<hr style="width:400px;">

    		<h2><a href="#">Judge</a></h2>
	        <div>
	        	<?php
              echo $this->Form->input('judge_Name', array('placeholder' => 'Name'));
              echo '<br><br>';
              echo $this->Form->input('judge_Race', array('empty' => '--Race--', 'options' => array('White','Black','Hispanic','Asian','Other')));
              echo '<br><br>';
              echo $this->Form->input('judge_Gender', array('empty' => '--Gender--', 'options' => array('Male','Female')));
              echo '<br><br>';
              echo $this->Form->input('judge_YearApp', array('id' => 'yearAppointJudge'));
              echo '<br><br>';
              echo $this->Form->input('judge_ApptBy', array('empty' => '--Appointed By--', 'options' => array('Democrat', 'Republican')));
              echo '<br>';
            ?>
	        </div>

        <hr style="width:400px;">

        <h2><a href="#">Organized Crime Group</a></h2>
        <div>
          <?php
            echo $this->Form->input('ocg_Name', array('placeholder' => 'Name'));
            echo '<br><br>';
            echo $this->Form->input('ocg_Type', array('empty' => '--Type--', 'options' => array('Mom and Pop', 'Street Gang', 'Cartel/Syndicate/Mafia', 'Prison Gang', 'Other')));
            echo '<br><br>';
            echo $this->Form->input('ocg_Scope', array('empty' => '--Scope--', 'options' => array('Local', 'Trans-State', 'Trans-National')));
            echo '<br><br>';
            echo $this->Form->input('ocg_Race', array('empty' => '--Race--', 'options' => array('White','Black','Hispanic','Asian','Other')));
            echo '<br>';
          ?>
        </div>

        <hr style="width:400px;">
        
        <h2><a href="#">Victims</a></h2>
        <div>
          <?php
            echo $this->Form->input('victims_Total', array('id' => 'totalSlide', 'label' => 'Total'));
            echo $this->Form->input('victims_Minor', array('id' => 'minorSlide', 'label' => 'Minor'));
            echo $this->Form->input('victims_Foreign', array('id' => 'foreignerSlide', 'label' => 'Foreigner'));
            echo $this->Form->input('victims_Female', array('id' => 'femaleSlide', 'label' => 'Female'));
          ?>
        </div>

        <hr style="width:400px;">

        <h2><a href="#">Arrest Details</a></h2>
        <div>
          <?php
            echo $this->Form->input('ad_DateArrest', array('id' => 'dateArrestAD', 'label' => 'Date of Arrest'));
            echo '<br><br>';
            echo $this->Form->input('ad_Role', array('empty' => '--Role--', 'options' => array('Yes','No')));
            echo '<br><br>';
            echo $this->Form->input('ad_BailType', array('empty' => '--Bail Type--', 'options' => array('None','Surety','Non-Surety')));
            echo '<br><br>';
            echo $this->Form->input('ad_BailAmount', array('id' => 'bailAmountArrest', 'label' => 'Bail Amount'));
            echo '<br>';
          ?>
        </div>

        <hr style="width:400px;">

    	<h2><a href="#">Charge Details</a></h2>
        <div>
          <?php
            echo $this->Form->input('cd_Date', array('id' => 'chargeDate', 'label' => 'Date of Charge'));
            echo '<br><br>';
            echo $this->Form->input('cd_TtlCharges', array('id' => 'totalCharges', 'label' => 'Total Charges'));
            echo '<br><br>';
            echo $this->Form->input('cd_Statute', array('placeholder' => 'Statute'));
            echo '<br><br>';
            echo $this->Form->input('cd_Counts', array('id' => 'countsCharge', 'label' => 'Counts'));
            echo '<br><br>';
            echo $this->Form->input('cd_CountsNP', array('id' => 'countsNolleProssed', 'label' => 'Counts Nolle Prossed'));
            echo '<br><br>';
            echo $this->Form->input('cd_PleaDismiss', array('id' => 'pleaDismiss', 'label' => 'Pleas Dismissed'));
            echo '<br><br>';
            echo $this->Form->input('cd_PleaGuilty', array('id' => 'pleaGuilty', 'label' => 'Pleas Guilty'));
            echo '<br><br>';
            echo $this->Form->input('cd_TrialGuilty', array('id' => 'trialGuilty', 'label' => 'Trials Guilty'));
            echo '<br><br>';
            echo $this->Form->input('cd_TrialNotGuilty', array('id' => 'trialNotGuilty', 'label' => 'Trials Not Guilty'));
            echo '<br><br>';
            echo $this->Form->input('cd_Sentence', array('id' => 'sentenceCharge', 'label' => 'Months Sentenced'));
            echo '<br><br>';
            echo $this->Form->input('cd_Probation', array('id' => 'probationCharge', 'label' => 'Months Probation'));
            echo '<br>';
          ?>
        </div>

        <hr style="width:400px;">

		<h2><a href="#">Sentencing Details</a></h2>
		<div>
      <?php
        echo $this->Form->input('sd_TtlFelonies', array('id' => 'totalNumFelonySentence'));
        echo '<br><br>';
        echo $this->Form->input('sd_DateTerminated', array('id' => 'dateTermSentenced'));
        echo '<br><br>';
        echo $this->Form->input('sd_TtlMonths', array('id' =>'totalMonthsSentenced'));
        echo '<br><br>';
        echo $this->Form->input('sd_Restitution', array('id' => 'amountRestitutionSent'));
        echo '<br><br>';
        echo $this->Form->input('sd_AssetForfeit', array('empty' => '--Asset Forfeit--', 'options' => array('Yes','No')));
        echo '<br><br>';
        echo $this->Form->input('sd_Appeal', array('empty' => '--Appeal--', 'options' => array('Yes','No')));
        echo '<br><br>';
        echo $this->Form->input('sd_MonthsSupRel', array('id' => 'monthsSuperReleaseSentence'));
        echo '<br><br>';
        echo $this->Form->input('sd_MonthsProb', array('id' => 'monthsProbationSentence'));
        echo '<br>';
      ?>
    </div>
    <?php
      echo $this->Form->end(array('id' => 'submit_form'));
    ?>
 </div> <!-- END OF COLLAPSIBLE PANEL -->




            <br><br>
            <hr style="color: #999">
            <br>

            <div class="search_disclaim">
            <p><strong>Disclaimer: </strong>Not every combination of searched values will be meaningful.</p>
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

<!-- slider Script 
<script type="text/javascript" src="/js/sliderMod.js"></script>-->


<!-- SCRIPT FOR THE POPUP FRAME OF SEARCH DETAILS -->
<script type="text/javascript">

$( "#target" ).submit(function( event ) {
  
  cuteLittleWindow = window.open("home", "littleWindow", "location=no,width=320,height=200"); 
  event.preventDefault();
});

    // GET DETAILS OF A CASE
      $(".details").on("click", function() {
          location.href="http://www.google.com";

      });

</script>




</body>