<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Create Case- Admin Panel | Human Trafficking Data');
    $this->set('active', 'create_case');
?>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Single Case Creation</h3>
              <div class="col-md-4 contact-right">
                <!-- TOP CREATE A NEW USER BAR -->
                  <div class="top_bar col-md-4">
                    <div class="top_bar_dash">
                      <h4>PROGRESS</h4>
                    </div>
                      <!-- PROGRESS-->
                      <div title="Click here to add this user." style="margin-top: 19px;">
                      </div>
                  </div>
                <!-- Create Interface -->
                <div class="user_creation" style="padding-bottom:50px; margin-top:50px;">
                  <div style="padding-top:0px;background-color:#FFF; border-bottom:1px solid rgba(75,75,75,.3);"></div>
                  <div class="personal_details" style="background-color:#DCDCDC">
                  </div>
                </div>
              </div> 
                <div class="col-md-8 contact-right">
                  <!-- TOP DELETE SELECTED USER BAR -->
                    <div class="top_bar col-md-8">
                      <div class="top_bar_left">
                        <h4>VICTIM INFORMATION</h4>
                      </div>
                        <!-- DELETE BUTTON-->
                        <div title="Click here to save and quit." style="margin-top: 19px;">
                          <label for="" class="user_button" >
                            <?php echo $this->Html->image('save.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 10px 10px 2px;' )); ?>
                          </label>
                        </div>
                    </div>
                    <div class="col-md-11 case_creation_form" style="margin:100px auto; float:none;">
                    

                    <fieldset><legend>Defendant Information</legend>
                      <?php echo $this->Form->create('CaseSession'); ?>

                      <?php //add defendant name, number, case name ?>
                      <?php echo $this->Form->input('OCName1', array('label' => 'Organized Crime Group 1 Name')); ?>
                      <?php echo $this->Form->input('OCType1', array('label' => 'Organized Crime Group 1 Type')); ?>
                      <?php echo $this->Form->input('OCRace1', array('label' => 'Organized Crime Group 1 Predominant Race')); ?>
                      <?php echo $this->Form->input('OCScope1', array('label' => 'Organized Crime Group 1 Scope')); ?>
                      <?php echo "<br><br><br><br><hr>"; ?>
                      <?php echo $this->Form->input('OCName2', array('label' => 'Organized Crime Group 2 Name')); ?>
                      <?php echo $this->Form->input('OCType2', array('label' => 'Organized Crime Group 2 Type')); ?>
                      <?php echo $this->Form->input('OCRace2', array('label' => 'Organized Crime Group 2 Predominant Race')); ?>
                      <?php echo $this->Form->input('OCScope2', array('label' => 'Organized Crime Group 2 Scope')); ?>
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
