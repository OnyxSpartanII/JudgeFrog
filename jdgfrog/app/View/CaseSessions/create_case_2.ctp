<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Create Case- Admin Panel | Human Trafficking Data');
    $this->set('active', 'create_case');
?>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <div class="case_top_bar">
          <h3 class="page_title">Single Case Creation</h3>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width:10%">PROGRESS:</div>
              <div class="progress-bar  progress-bar-success " role="progressbar" style="width:25%">Case Information</div>
              <div class="progress-bar  progress-bar-success active_progress" role="progressbar" style="width:18%"><strong>Victim Information</strong></div>
              <div class="progress-bar idle" role="progressbar" style="width:35%">Defendant(s) Information</div>
              <div class="progress-bar idle" role="progressbar" style="width:12%">Submit</div>
            </div>
          </div>
          <div class="col-md-12 contact-right">
              <div class="col-md-5 case_creation_form" id="form_style">
                <h2 id="caseInfoFS_Title">Victim Information</h2>
                      <fieldset>
                        <?php echo $this->Form->create('CaseSession'); ?>
                        <?php 
                          echo $this->Form->input('LaborTraf', array('type' => 'checkbox', 'label' => 'Labor Trafficking'));
                          echo $this->Form->input('AdultSexTraf', array('type' => 'checkbox', 'label' => 'Adult Sex Trafficking'));
                          echo $this->Form->input('MinorSexTraf', array('type' => 'checkbox', 'label' => 'Minor Sex Trafficking'));
                          echo "<hr style = 'border-top:1px solid #DCDCDC'>";
                          echo $this->Form->input('NumVic', array('type' => 'text', 'placeholder' => '7', 'label' => 'Number of Victims'));
                          echo $this->Form->input('NumVicMinor', array('type' => 'text', 'placeholder' => '4', 'label' => 'Number of Minor Victims'));
                          echo $this->Form->input('NumVicForeign', array('type' => 'text', 'placeholder' => '1', 'label' => 'Number of Foreign Victims'));
                          echo $this->Form->input('NumVicFemale', array('type' => 'text', 'placeholder' => '2', 'label' => 'Number of Female Victims')); 
                          ?>
                      </fieldset>
                        <?php echo $this->Form->end('Next'); ?>
                    </div>
                </div> 
            </div>
            <div class="col-md-12 search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
              <p><strong>*Note: </strong>All fields are required</p>
            </div>
    </div>
</div>