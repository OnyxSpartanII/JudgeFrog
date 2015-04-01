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
              <div class="progress-bar progress-bar-warning" role="progressbar" style="width:10%">PROGRESS:</div>
              <div class="progress-bar progress-bar" role="progressbar" style="width:25%">Case Information</div>
              <div class="progress-bar" role="progressbar" style="width:18%"><strong>Victim Information</strong></div>
              <div class="progress-bar idle" role="progressbar" style="width:35%">Defendant(s) Information</div>
              <div class="progress-bar idle" role="progressbar" style="width:12%">Submit</div>
            </div>
          </div>


                <div class="col-md-12 contact-right">
                    <div class="col-md-12 case_creation_form" style="margin:100px auto; float:none;">
                      
                      <fieldset><legend>Victim Information</legend>
                        <?php echo $this->Form->create('CaseSession'); ?>
                        <?php echo $this->Form->input('LaborTraf', array('type' => 'checkbox', 'label' => 'Labor Trafficking')); ?>
                        <?php echo $this->Form->input('AdultSexTraf', array('type' => 'checkbox', 'label' => 'Adult Sex Trafficking')); ?>
                        <?php echo $this->Form->input('MinorSexTraf', array('type' => 'checkbox', 'label' => 'Minor Sex Trafficking')); ?>
                        <?php echo $this->Form->input('NumVic', array('type' => 'text', 'placeholder' => 'Number of Victims', 'label' => '')); ?>
                        <?php echo $this->Form->input('NumVicMinor', array('type' => 'text', 'placeholder' => 'Number of Minor Victims', 'label' => '')); ?>
                        <?php echo $this->Form->input('NumVicForeign', array('type' => 'text', 'placeholder' => 'Number of Foreign Victims', 'label' => '')); ?>
                        <?php echo $this->Form->input('NumVicFemale', array('type' => 'text', 'placeholder' => 'Number of Female Victims', 'label' => '')); ?>
                      </fieldset>
                        <?php echo $this->Form->end('Next'); ?>
                        <!-- <?php // echo print_r($this->params); ?> -->
                    </div>
                </div> 
            </div>
            </div>
            <div class="search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
              <p><strong>*Note: </strong>All fields are required</p>
            </div>
</div>


<style type="text/css">
	.case_creation_form label{
		font-size: 18px;
		font-weight: bold;
		padding-top: 15px;
	}
.case_creation_form input[type="submit"] {
	width: 20%;
	padding: 1em 0em;
	outline: none;
	background-color: #4D1979;
	border: 1px solid #4D1979;
	color: #fff;
}
.case_creation_form input[type="submit"]:hover {
	background-color:#dcdcdc; color: #777;
	border: 1px solid #777;
	 transition: all 0.3s ease-in-out;
	 -webkit-transition: all 0.3s ease-in-out;
	 -moz-transition: all 0.3s ease-in-out;
	 -o-transition: all 0.3s ease-in-out;
}
.case_creation_form input[type="submit"]:active {
    margin-left: 10px;
}

</style>