<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Create Case - Admin Panel | Human Trafficking Data');
    $this->set('active', 'create_case');
?>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
              <div class="case_top_bar">
                <h3 class="page_title">Single Case Creation | <?php //add defendant name, number, case name ?></h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width:10%">PROGRESS:</div>
                    <div class="progress-bar progress-bar-success " role="progressbar" style="width:25%">Case Information</div>
                    <div class="progress-bar progress-bar-success " role="progressbar" style="width:18%">Victim Information</div>
                    <div class="progress-bar progress-bar-success active_progress" role="progressbar" style="width:35%"><strong>Defendant(s) Information</strong></div>
                    <div class="progress-bar progress-bar-success idle" role="progressbar" style="width:12%">Submit</div>
                  </div>
              </div>
              <div class="col-md-5 case_creation_form" id="form_style">
                <h2 id="caseInfoFS_ocg1_tle">Organized Crime Group I</h2>
                      <fieldset id = "ocg_fieldset1">
                      <?php echo $this->Form->create('CaseSession'); ?>
                      <?php 
                      echo $this->Form->input('OCName1', array('type' => 'text', 'label' => 'Name', 'placeholder' => 'Francis Underwood'));
                     echo $this->Form->input('OCType1', array('label' => '', 'options' => array('Mom and Pop', 'Street Gang', 'Cartel/Syndicate/Mafia', 'Prison Gang', 'Other'),'empty'=>'Type'));
                       echo $this->Form->input('OCRace1', array('label' => '', 'options' => array('White','Black','Hispanic','Asian','Other'),'empty'=>'Race'));
                      echo $this->Form->input('OCScope1', array('label' => '', 'options' => array('Local', 'Trans-State', 'Trans-National'),'empty'=>'Scope'));
                      ?>
                      <hr style="border-top:1px solid #CCC;">
                      <input type="button" name="previous" onclick="goToOCG2()" class="action-button" value="Next - OCG 2" />
                      </fieldset>

                      <h2 id="caseInfoFS_ocg2_tle">Organized Crime Group II</h2>
                      <fieldset id = "ocg_fieldset2">
                      <?php 
                      echo $this->Form->input('OCName2', array('type' => 'text', 'label' => 'Name', 'placeholder' => 'Francis Underwood'));
                      echo $this->Form->input('OCType2', array('label' => '', 'options' => array('Mom and Pop', 'Street Gang', 'Cartel/Syndicate/Mafia', 'Prison Gang', 'Other'),'empty'=>'Type'));
                      echo $this->Form->input('OCRace2', array('label' => '', 'options' => array('White','Black','Hispanic','Asian','Other'),'empty'=>'Race'));
                      echo $this->Form->input('OCScope2', array('label' => '', 'options' => array('Local', 'Trans-State', 'Trans-National'),'empty'=>'Scope'));
                      ?>
                      <hr style="border-top:1px solid #CCC;">
                      <input type="button" name="previous" onclick="goToOCG1()" class="action-button" value="Back - OCG 1" />
                    </fieldset>
                            <?php echo $this->Form->end('Next'); ?>
              </div>
        </div>
        <div class="search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
          <p><strong>*Note: </strong>All fields are required</p>
        </div>
    </div>
</div>
<script type="text/javascript">
  var ocg1 = $('#ocg_fieldset1');
  var ocg2 = $('#ocg_fieldset2');
    $('#caseInfoFS_ocg2_tle').hide();

  function goToOCG2() {      
    ocg1.hide('slow');
    $('#caseInfoFS_ocg1_tle').hide('slow');
    ocg2.fadeIn('slow');
    $('#caseInfoFS_ocg2_tle').show('slow');
  }

  function goToOCG1() {     
    ocg2.hide('slow');
    $('#caseInfoFS_ocg1_tle').show('slow');
    ocg1.fadeIn('slow');
    $('#caseInfoFS_ocg2_tle').hide('slow');
  }
</script>