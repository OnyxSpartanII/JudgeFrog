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
                <?php echo $this->Form->create('CaseSession'); ?>
                <!-- Final Step - Submit for Approval -->
                <?php 	echo $this->Form->end('Submit for Review'); ?>
              </div>
        </div>
        <div class="search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
          <p><strong>*Note: </strong>All fields are required</p>
        </div>
    </div>
</div>