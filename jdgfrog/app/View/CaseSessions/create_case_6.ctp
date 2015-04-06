<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Create Case - Admin Panel | Human Trafficking Data');
    $this->set('active', 'create_case');
?>
    <?php
        echo $this->Html->css(array('datepicker'));
        echo $this->Html->script(array('bootstrap-datepicker'));
    ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <script>
  $(function() {
    $( "#termDate" ).datepicker();
    $('.datepicker').datepicker()
  });
  </script>
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
                <h2 id="caseInfoFS_Title">Sentencing Information</h2>
                      <fieldset>
                      <?php echo $this->Form->create('CaseSession'); ?>
                      <?php 
                        echo $this->Form->input('DateTerm', array('label' => 'Case\'s Termination Date', 'id' => 'termDate', 'type' => 'text'));
                        echo $this->Form->input('SentDate', array('label' => 'Sentencing Date', 'class' => 'datepicker date', 'type' => 'text', 'data-date' => '2012-12-02', 'data-date-format' => 'yyyy-mm-dd'));
                        echo $this->Form->input('TotalSentence', array('type' => 'text', 'label' => 'Total Number of Months Sentenced'));
                        echo $this->Form->input('Restitution', array('type' => 'text', 'label' => 'Amount Required to Pay For Restitution'));
                        echo "<hr style = 'border-top:1px solid #DCDCDC'>";
                        echo $this->Form->input('AssetForfeit', array('type' => 'text', 'label' => 'Assets Forfeited?', 'type' => 'checkbox'));
                        echo $this->Form->input('Appeal', array('type' => 'text', 'label' => 'Appeal Pending?', 'type' => 'checkbox'));
                        echo $this->Form->input('SupRelease', array('type' => 'text', 'label' => 'Number of Months Under Supervised Release'));
                        echo $this->Form->input('Probation', array('type' => 'text', 'label' => 'Total Number of Months Under Probation')); 
                      ?>
                    </fieldset>
                      <?php echo $this->Form->end('Next'); ?>
              </div>
        </div>
        <div class="search_disclaim" style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
          <p><strong>*Note: </strong>All fields are required</p>
        </div>
    </div>
</div>