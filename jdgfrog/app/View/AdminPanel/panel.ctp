<?php
//Adds CSS file to view
    echo $this->Html->css(array('panel_demo'));
    ?>
<?php $this->layout = 'admin_panel_layout';?>

<body>

<!-- multistep form -->
<div id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
  <!--
    <li class="active">Admin Login</li>
    <li>Admin Selection</li>
    <li>Case Information</li>
    <li>New Judge</li>
    <li>Trafficking &amp Victim Info</li>
    <li>Defendant</li>
    <li>Arrest &amp Charge Details</li>
    <li>Charges</li>
    <li>Aggregate Sentence</li>
    <li>OCG</li>
    <li>Submitted</li>
-->
  </ul>
  <!-- fieldsets -->
  

  <fieldset id="admin">
    <h2 class="fs-title">Admin Login</h2>
    <h3 class="fs-subtitle">--</h3>
    <?php
    echo $this->Form->input('', array('name'=> 'userName','placeholder' => 'User Name', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'password','placeholder' => 'Password', 'type' => 'password'));
    ?>
    <!--
    <input type="text" name="User Name" placeholder="User Name" />
    <input type="password" name="pass" placeholder="Password" />
    -->
    <input type="button" name="Login" class="toSelection action-button" value="Login" />
  </fieldset>
  <fieldset id="selection">
    <h2 class="fs-title">Admin Selection</h2>
    <h3 class="fs-subtitle">Please Choose A Selection</h3>
    <input type="button" id='addCase' name="addCase" value="Add Case/Defendant" class="toCaseInfoFS action-button" /><br>
    <input type="button" name="reviewSubmit" value="Review/Submit" class="# action-button"/> <br>
    <input type="button" name="UpdateData" value="Update Data" class="# action-button"/> <br>
    <input type="button" name="retrieve" value="Retrieve Saved" class="# action-button"/> <br>
    
  </fieldset>
  <fieldset id="caseInfoFS">
    <h2 class="fs-title">Case Information</h2>
    <h3 class="fs-subtitle"></h3>
    <?php
    echo $this->Form->input('', array('id'=> 'caseName','placeholder' => 'Case Name', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'caseNumber','placeholder' => 'Case Number', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'caseNumDef','placeholder' => 'Number of Defendants', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'judge','placeholder' => 'Judge', 'type' => 'text'));
    ?>
    <input type="reset" name="addJudgeButton" id='addJudgeButton' class="toNewJudge action-button" value="+" />
    <?php
    echo $this->Form->input('', array('name'=> 'fedDistrict','placeholder' => 'Federal District', 'type' => 'text'));
    ?>
    <!--
    <input type="text" name="caseName" placeholder="Case Name" />
    <input type="text" name="caseNumber" placeholder="Case Number" />
    <input type="text" name="caseNumDef" placeholder="Number of Defendants" />
    <input type="text" name="Judge" placeholder="Judge" />
    <input type="text" name="casefedDistrict" placeholder="Federal District" />
    -->
    <?php
    echo $this->Form->input('', array('name'=> 'test','options' => array('Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'), 'empty' => 'State')); ?>
      <textarea rows="4" cols="20" placeholder="Case Summary">
      </textarea>
      <input type="button" name="save" value="save" class="# action-button"/> <br>
      <input type="button" name="previous" class="backSelection action-button" value="Back" />
      <input type="reset" name="next" class="toTraffInfo action-button" value="Next" />
  </fieldset>
  <fieldset id="newJudgeFS">
    <h2 class="fs-title">New Judge</h2>
    <h3 class="fs-subtitle"></h3>
      <?php
      echo $this->Form->input('', array('name'=> 'judgeName','placeholder' => 'Judge Name', 'type' => 'text'));
      echo $this->Form->input('', array('empty' => 'Race', 'options' => array('White', 'Black', 'Hispanic', 'Asian', 'Other'))); 
      echo $this->Form->input('', array('options' => array('Male', 'Female'), 'empty' => 'Gender'));
      echo $this->Form->input('', array('name'=> 'tenure','placeholder' => 'Tenure', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'appointedBy','placeholder' => 'Appointed By', 'type' => 'text'));?>
      <input type="reset" name="previous" class="toCaseInfoFSCancel action-button" value="Cancel" />
      <input type="reset" name="next" class="toCaseInfoFSAdd action-button" value="Add" />
      <!--
            <input type="text" name="judgeName" placeholder="Name" />
      <input type="text" name="caseName" placeholder="Case Name" />
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="button" name="next" class="next action-button" value="Next" />
      -->
  </fieldset>
  <fieldset id="traffInfo">
    <h2 class="fs-title">Trafficking &amp Victim Information</h2>
    <h3 class="fs-subtitle"></h3>
    Type of Trafficking
    <?php
      echo $this->Form->input('case_Adult', array('type' => 'checkbox', 'label' => ' Adult Sex '));
      echo $this->Form->input('case_Minor', array('type' => 'checkbox', 'label' => ' Minor Sex '));
      echo $this->Form->input('case_Labor', array('type' => 'checkbox', 'label' => ' Labor'));
      echo $this->Form->input('', array('name'=> 'total','placeholder' => 'Total Victims', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'femaleVict','placeholder' => 'Female Victims', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'foreignVict','placeholder' => 'Foreigner Victims', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'minorVict','placeholder' => 'Minor Victims', 'type' => 'text'));

    ?>
      <input type="button" name="save" value="save" class="# action-button"/> <br>
      <input type="button" name="previous" class="backCaseInfo action-button" value="Back" />
      <input type="reset" name="next" class="toDefendant action-button" value="Next" />
  </fieldset>
  <fieldset id="defendant">
    <h2 class="fs-title">Defendant</h2>
    <h3 class="fs-subtitle"></h3>
    <div id='caseName'>Case Name </div> <div id='DefendantNumber'>Defendant Number </div> 
    <?php
      echo $this->Form->input('', array('name'=> 'fname','placeholder' => 'First Name', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'lname','placeholder' => 'Last Name', 'type' => 'text'));
      echo $this->Form->input('', array('options' => array('Male', 'Female'), 'empty' => 'Gender'));      
      echo $this->Form->input('', array('name'=> 'bday','placeholder' => 'Birth Date', 'type' => 'text'));
      echo $this->Form->input('', array('empty' => 'Race', 'options' => array('White', 'Black', 'Hispanic', 'Asian', 'Other')));
      echo $this->Form->input('', array('name'=> 'alias','placeholder' => 'Alias', 'type' => 'text'));

    ?>
      <input type="button" name="save" value="save" class="# action-button"/> <br>
      <input type="button" name="previous" class="backTraffInfo action-button" value="Back" />
      <input type="reset" name="next" class="toAcd action-button" value="Next" />
  </fieldset>
  <fieldset id="acd">
    <h2 class="fs-title">Arrest &amp Charge Details</h2>
    <h3 class="fs-subtitle"></h3>
    <div id='caseName'>Case Name </div><div id='DefendantNumber'>Defendant Number </div> 
    <?php
      echo $this->Form->input('', array('name'=> 'defname','placeholder' => 'Defendants Name', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'cdate','placeholder' => 'Charge Date', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'aDate','placeholder' => 'Arrest Date', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'detained','placeholder' => 'Detained', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'bailType','placeholder' => 'Bail Type', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'bailAm','placeholder' => 'Bail Amount', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'felCharge','placeholder' => 'Felony Charge', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'felSentenced','placeholder' => 'Felony Sentenced', 'type' => 'text'));
    ?>
      <input type="button" name="save" value="save" class="# action-button"/> <br>
      <input type="button" name="previous" class="backDefendant action-button" value="Back" />
      <input type="reset" name="next" class="toChargeScreen action-button" value="Next" />
  </fieldset>
  <fieldset id="chargeScreen">
    <h2 class="fs-title">Charges</h2>
    <h3 class="fs-subtitle">Add Charge Details</h3>
    <div id="collapsible-panels">
      <h2><a href="#">Statute 1</a></h2>
      <div>
      <!-- TODO: problem with php forms -->
      <?php
      echo $this->Form->input('', array('name'=> 'counts','placeholder' => 'Counts', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'CountsNolleProssed','placeholder' => 'Counts NolleProssed', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'pleasDismissed','placeholder' => 'Pleas Dismissed', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'pleasGuilty','placeholder' => 'Pleas Guilty', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'trialGuilty','placeholder' => 'Trial Guilty', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'trialNotGuilty','placeholder' => 'Trial Not Guilty', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'fines','placeholder' => 'Fines', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'Sentence','placeholder' => 'Sentence', 'type' => 'text'));
      echo $this->Form->input('', array('name'=> 'Probation','placeholder' => 'Probation', 'type' => 'text'));
    ?>
    <input type="text" name="caseName" placeholder="Case Name" />
    <input type="text" name="caseNumber" placeholder="Case Number" />


      </div>
      <hr style="width:400px;">
      <h2><a href="#">Statute 2</a></h2>
      <div>
      </div>
      <hr style="width:400px;">
      <h2><a href="#">Statute 3</a></h2>
      <div>
      </div>
      <hr style="width:400px;">
    </div>

      <input type="button" name="save" value="save" class="# action-button"/> <br>
      <input type="button" name="previous" class="backACD action-button" value="Back" />
      <input type="reset" name="next" class="toAggSentence action-button" value="Next" />
  </fieldset>
  <fieldset id="aggSentence">
    <h2 class="fs-title">Aggregate Sentence</h2>
    <h3 class="fs-subtitle">Sentence Details For Defendant</h3>
    <?php
    echo $this->Form->input('', array('name'=> 'dateTerm','placeholder' => 'Date Terminated', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'date','placeholder' => 'Date', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'TotalMonths','placeholder' => 'Total Months', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'restitu','placeholder' => 'Restitution', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'assetFor','placeholder' => 'Asset Forfeit', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'appeal','placeholder' => 'Appeal', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'supRelease','placeholder' => 'Supervised Release', 'type' => 'text'));
    echo $this->Form->input('', array('name'=> 'probation','placeholder' => 'Probation', 'type' => 'text'));
    ?>
    <input type="button" name="save" value="save" class="# action-button"/> <br>
    <input type="button" name="previous" class="backChargeScreen action-button" value="Back" />
    <input type="reset" name="next" class="toOCG action-button" value="Next" />
  </fieldset>
  <fieldset id="ocgScreen">
    <h2 class="fs-title">Organized Crime Group</h2>
    <h3 class="fs-subtitle"></h3>
    <?php
    echo $this->Form->input( '',array('name'=>'ocg_Name','placeholder' => 'Name'));
            echo $this->Form->input( '',array('name'=>'ocg_Type','empty' => 'Type', 'options' => array('Mom and Pop', 'Street Gang', 'Cartel/Syndicate/Mafia', 'Prison Gang', 'Other')));
            echo $this->Form->input( '',array('name'=>'ocg_Scope','empty' => 'Scope', 'options' => array('Local', 'Trans-State', 'Trans-National')));
            echo $this->Form->input( '',array('name'=>'ocg_Race','empty' => 'Race', 'options' => array('White','Black','Hispanic','Asian','Other')));
    ?>
    <input type="button" name="save" value="save" class="# action-button"/> <br>
    <input type="button" name="previous" class="backAggSentence action-button" value="Back" />
    <input type="reset" name="nextDef " class="toNextDefendant action-button" value="Next Defendant" />
    <input type="reset" name="nextOCG " class="# action-button" value="Next OCG" />
    <input type="reset" name="next" class="toReview action-button" value="Review" />
  </fieldset>

  <fieldset id="reviewScreen">
    <h2 class="fs-title">Submitted For Approval</h2>
    <h3 class="fs-subtitle"></h3>
    
    
  </fieldset>
</div>

<!-- Adds the JQuery for the window motion -->
<?php
    echo $this->Html->script(array('adminPanelFlow'));
    ?>
<script type="text/javascript">
  
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
</script>



<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



</body>