<!--search start here-->
<div class="contact">
    <div class="container">
         <div class="contact-main">
            <h3 class="page_title">Search The Database</h3>
              <div class="col-md-3 contact-right">
                <!-- TOP STATUS AND SEARCH BAR -->
                  <div class="top_bar col-md-3">
                    <div class="top_bar_left">
                      <h4>SEARCH BY</h4>
                    </div>
                      <!-- SEARCH BUTTON-->
                      <div class="search_button" title="Click here to perform a search using selected criteria.">
                        <label for="submit_form">
                          <?php echo $this->Html->image('submit.png', array('alt' => 'Submit', 'class' => 'submit_btn_img', 'style' => '' )); ?>
                        </label>
                      </div>
                  </div>
                <!-- Search Interface -->
                  <div class="col-md-3" id="collapsible-panels">
                      <?php
                        $base_url = array('controller' => 'search', 'action' => 'update');
                        echo $this->Form->create(array('url' => $base_url, 'inputDefaults' => array('label' => false, 'div' => false)));
                      ?>
                        <h2><a href="#">Case</a></h2>
                            <div>
                                <?php
                                  echo $this->Form->input('case_Name', array('placeholder' => 'Name (e.g. USA v. Jones)', 'type' => 'text'));
                                  echo "<br><br>";
                                  echo $this->Form->input('case_Number', array('placeholder' => 'Number (e.g. 00-cu-)'));
                                  echo "<br><br>";
                                  echo $this->Form->input('case_NumDef', array('label' => 'Number of Defendants', 'id' => 'numbDefSlide'));
                                  echo "<br><br>";
                                  echo $this->Form->input('case_State', array('options' => array('Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'), 'empty' => 'State'));
                                  echo "<br><br>";
                                  echo $this->Form->input('case_FedDist', array('empty' => 'Federal District', 'options' => array('1','2','3','4','5','6','7','8','9','10','11','12','13','14')));
                                  echo "<br>";
                                ?>
                            </div>
                   
                          <h2><a href="#">Type of Trafficking</a></h2>
                            <div>
                                <?php
                                  echo $this->Form->input('case_Adult', array('type' => 'checkbox', 'label' => ' Adult Sex '));
                                  echo '<br><br>';
                                  echo $this->Form->input('case_Minor', array('type' => 'checkbox', 'label' => ' Minor Sex '));
                                  echo '<br><br>';
                                  echo $this->Form->input('case_Labor', array('type' => 'checkbox', 'label' => ' Labor'));
                                  echo '<br><br>';
                                  echo $this->Form->input('case_TypeOperator', array('options' => array('AND','OR'), 'empty' => 'Operator'));
                                  echo '<br><br>';
                                ?>
                            </div>

                          <h2><a href="#">Defendant</a></h2>
                            <div>
                                <?php
                                  echo $this->Form->input('defendant_Name', array('placeholder' =>'Name'));
                                  echo '<br><br>';
                                  echo $this->Form->input('defendant_Gender', array('options' => array('Male', 'Female'), 'empty' => 'Gender'));
                                  echo '<br><br>';
                                  echo $this->Form->input('defendant_YOB', array('label' => 'Year of Birth', 'id' => 'yearBirthDefendant'));
                                  echo '<br><br>';
                                  echo $this->Form->input('defendant_Race', array('empty' => 'Race', 'options' => array('White', 'Black', 'Hispanic', 'Asian', 'Other')));
                                  echo '<br>';
                                ?>
                          </div>

                          <h2><a href="#">Judge</a></h2>
                            <div>
                              <?php
                                echo $this->Form->input('judge_Name', array('placeholder' => 'Name'));
                                echo '<br><br>';
                                echo $this->Form->input('judge_Race', array('empty' => 'Race', 'options' => array('White','Black','Hispanic','Asian','Other')));
                                echo '<br><br>';
                                echo $this->Form->input('judge_Gender', array('empty' => 'Gender', 'options' => array('Male','Female')));
                                echo '<br><br>';
                                echo $this->Form->input('judge_YearApp', array('label' => 'Year Appointed', 'id' => 'yearAppointJudge'));
                                echo '<br><br>';
                                echo $this->Form->input('judge_ApptBy', array('empty' => 'Appointed By', 'options' => array('Republican', 'Democrat')));
                                echo '<br>';
                              ?>
                            </div>

                          <h2><a href="#">Organized Crime Group</a></h2>
                          <div>
                            <?php
                              echo $this->Form->input('ocg_Name', array('placeholder' => 'Name'));
                              echo '<br><br>';
                              echo $this->Form->input('ocg_Type', array('empty' => 'Type', 'options' => array('Mom and Pop', 'Street Gang', 'Cartel/Syndicate/Mafia', 'Prison Gang', 'Other')));
                              echo '<br><br>';
                              echo $this->Form->input('ocg_Scope', array('empty' => 'Scope', 'options' => array('Local', 'Trans-State', 'Trans-National')));
                              echo '<br><br>';
                              echo $this->Form->input('ocg_Race', array('empty' => 'Race', 'options' => array('White','Black','Hispanic','Asian','Other')));
                              echo '<br>';
                            ?>
                          </div>
                          
                          <h2><a href="#">Victims</a></h2>
                          <div>
                            <?php
                              echo $this->Form->input('victims_Total', array('id' => 'totalSlide', 'label' => 'Total'));
                              echo $this->Form->input('victims_Minor', array('id' => 'minorSlide', 'label' => 'Minor'));
                              echo $this->Form->input('victims_Foreign', array('id' => 'foreignerSlide', 'label' => 'Foreigner'));
                              echo $this->Form->input('victims_Female', array('id' => 'femaleSlide', 'label' => 'Female'));
                            ?>
                          </div>

                          <h2><a href="#">Arrest Details</a></h2>
                          <div>
                            <?php
                              echo $this->Form->input('ad_DateArrest', array('id' => 'dateArrestAD', 'label' => 'Date of Arrest'));
                              echo '<br><br>';
                              echo $this->Form->input('ad_BailType', array('empty' => 'Bail Type', 'options' => array('None','Surety','Non-Surety')));
                              echo '<br><br>';
                              echo $this->Form->input('ad_BailAmount', array('id' => 'bailAmountArrest', 'label' => 'Bail Amount'));
                              echo '<br>';
                            ?>
                          </div>

                        <h2><a href="#">Charge Details</a></h2>
                          <div>
                            <?php
                              echo $this->Form->input('cd_Date', array('id' => 'chargeDate', 'label' => 'Date of Charge'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_TtlCharges', array('id' => 'totalCharges', 'label' => 'Total Charges'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_Statute', array('empty' => 'Statute', 'options' => array('Mickey','Mouse')));
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

                      <h2><a href="#">Sentencing Details</a></h2>
                      <div>
                        <?php
                          echo $this->Form->input('sd_TtlFelonies', array('id' => 'totalNumFelonySentence', 'label' => 'Total # Felonies Sentenced'));
                          echo '<br><br>';
                          echo $this->Form->input('sd_DateTerminated', array('id' => 'dateTermSentenced', 'label' => 'Year Terminated'));
                          echo '<br><br>';
                          echo $this->Form->input('sd_TtlMonths', array('id' =>'totalMonthsSentenced', 'label' => 'Total Months Sentenced'));
                          echo '<br><br>';
                          echo $this->Form->input('sd_Restitution', array('id' => 'amountRestitutionSent', 'label' => 'Amount Restitution'));
                          echo '<br><br>';
                          echo $this->Form->input('sd_AssetForfeit', array('empty' => 'Asset Forfeit', 'options' => array('No','Yes')));
                          echo '<br><br>';
                          echo $this->Form->input('sd_Appeal', array('empty' => 'Appeal', 'options' => array('No','Yes')));
                          echo '<br><br>';
                          echo $this->Form->input('sd_MonthsProb', array('id' => 'monthsProbationSentence', 'label' => '# of Months Probation'));
                          echo '<br>';
                        ?>
                      </div>
                      <?php
                        echo $this->Form->end(array('id' => 'submit_form'));
                      ?>
                   </div> <!-- END OF COLLAPSIBLE PANEL -->

               </form>
          </div>
          <div class="col-md-9 contact-left">
                <!-- TOP STATUS AND SEARCH BAR -->
                  <div class="top_bar col-md-9">
                    <div class="top_bar_dash">
                      <h4>SEARCH DASHBOARD</h4>
                      <div class="ana_button" title="Click here to go to the analysis page and perform analysis.">
                      <label for="analyze_form">
                      <a href="analyze">
                        <?php echo $this->Html->image('analyze.png', array('alt' => 'Anaylze')); ?>
                </a>
              </label>
            </div>
                    </div>
                  </div>
                  <div id="table_div" class="col-md-9" colspan="5" style="width:100%"></div>

            </div>
         </div>
     </div>
</div>

</div>
            <div class="search_disclaim" >
            <p><strong>Note: </strong>Not every combination of searcheable objects will return meaningful results.</p>
            </div>
</div>

 
        </div>
    </div>

<div id="basic-modal-content" class="col-md-15">
</div>


<!--*************
SCRIPTS
**************-->   
<script type="text/javascript">
$(function() {
    $( document ).tooltip();
  });
</script> 

<!-- Script to allow search bars collapsible - fixed -->
<script type="text/javascript">

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
</script>
<!-- added by Landon (above) -->

  <!-- SCRIPT FOR THE POPUP FRAME OF SEARCH DETAILS -->
<script type="text/javascript">
  //PDF Download Function 
    $(function(){ 
        var specialElementHandlers = {
            '#editor': function (element,renderer) {
                return true;
            }
        };
     $('.modal_download').click(function () {
        var doc = new jsPDF();
            doc.fromHTML($('.modal_content').html(), 15, 15, {
                'width': 170,
                'pagesplit': true,
                'margin':2,
                'elementHandlers': specialElementHandlers
            });
            doc.save('Search_results.pdf');
      // alert("Download Successful!");
        });  
    });
  //End of PDF Download Fucntion
</script>

<!-- Table Script to display searched values -->
<script type="text/javascript">

      <?php
        if (isset($cases)) {
          $jsarr = json_encode($cases);
          echo 'var cases = ' . $jsarr . ';';
        } else {
          echo 'var cases = [];';
        }

        if (isset($display)) {
          $jsrarr = json_encode($display);
          echo 'var display = ' . $jsrarr . ';';
        } else {
          echo 'var display = [];';
        }
          echo "\n";
      ?>

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Case Name');
        data.addColumn('string', 'Case Number');
        data.addColumn('string', 'Year');
        data.addColumn('string', 'Type of Case');
        data.addColumn('number', '# of Defendants');
        <?php
          if (isset($cases)) {
            foreach ($cases as $case) {
              $type = '';
              if ($case[3] == '1') {
                $type .= 'L';
              }
              if ($case[4] == '1') {
                $type .= 'A';
              }
              if ($case[5] == '1') {
                $type .= 'M';
              }
              echo 'data.addRow(["' . $case[0] . '", "' . $case[1] . '", "' . explode('-', $case[2])[0] . '", "' . $type . '", {v: '. $case[6] .'}]);'; 
            }
          }
        ?>

        var judge_races = ['White', 'Black', 'Hispanic', 'Asian', 'Indian'];
        var races = ['White','Black','Hispanic','Asian','Other','Other'];
        var bail_types = ['None','Surety','Non-Surety'];
        var ocg_types = ['Other','Mom & Pop','Street Gang','Cartel/Syndicate/Mafia','','Prison Gang'];
        var ocg_races = ['None','Black','White','Hispanic','Asian','Other'];
        var ocg_scopes = ['Other','Local Only','Trans-State','Trans-National'];

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: false});

        google.visualization.events.addListener(table, 'select', function () {
          var i = table.getSelection()[0].row;
          console.log('Row: ' + i);
          console.log(cases[i]);
          
          var content = '';
          if (cases.length > 0) {
            content += '<div class="modal_header">' +
                  '<h2>Case Details</h2>' +
                  '<a href="#" id="cmd" class="modal_download">Download</a>' + 
                    '<div class="onoffswitch">' +
                      '<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>' +
                      '<label class="onoffswitch-label" for="myonoffswitch">' +
                        '<span class="onoffswitch-inner"></span>' +
                        '<span class="onoffswitch-switch"></span>' +
                      '</label>' +
                    '</div>' +
                  '</div>' +
                  '<div class="modal_content">' +
                    '<div class="case_info">' +
                      '<table class="modal_table">' +
                        '<caption>Case Basic Information</caption>' +
                        '<thead>' +
                          '<tr>' +
                            '<th>Case Name</th>' +
                            '<th>Case Number</th>' +
                            '<th># Defendants</th>' +
                            '<th>State</th>' +
                            '<th>Year</th>' +
                          '</tr>' +
                        '</thead>' +
                        '<tbody>' +
                          '<tr>' +
                            '<td>' + cases[i][0] + '</td>' +
                            '<td>' + cases[i][1] + '</td>' +
                            '<td>' + cases[i][6] + '</td>' +
                            '<td>' + cases[i][7] + '</td>' +
                            '<td>' + cases[i][2].split('-')[0] + '</td>' +
                          '</tr>' +
                        '</tbody>' +
                      '</table>' +
                      '<h4>Case Summary</h4>' +
                      '<p class="case_summary">' + cases[i][10] + '</p>' +
                    '</div>' +
                    (display['victims'] ? '<table class="modal_table">' : '<table class="modal_table all_results">') +
                      '<caption>Victim Information</caption>' +
                      '<thead>' +
                        '<tr>' +
                          '<th>Total Victims</th>' +
                          '<th>Total Minors</th>' +
                          '<th>Total Foreigners</th>' +
                          '<th>Total Females</th>' +
                        '</tr>' +
                      '</thead>' +
                      '<tbody>' +
                        '<tr>' +
                          '<td>' + (cases[i][16] == null ? 'Unknown' : cases[i][16]) + '</td>' +
                          '<td>' + (cases[i][17] == null ? 'Unknown' : cases[i][17]) + '</td>' +
                          '<td>' + (cases[i][18] == null ? 'Unknown' : cases[i][18]) + '</td>' +
                          '<td>' + (cases[i][19] == null ? 'Unknown' : cases[i][19]) + '</td>' +
                        '</tr>' +
                      '</tbody>' +
                    '</table>' +
                    (display['judge'] ? '<table class="modal_table">' : '<table class="modal_table all_results">') +
                      '<caption>Judge Information</caption>' +
                      '<thead>' +
                        '<tr>' +
                          '<th>Name</th>' +
                          '<th>Race</th>' +
                          '<th>Gender</th>' +
                          '<th>Tenure</th>' +
                          '<th>Appointed By</th>' +
                        '</tr>' +
                      '</thead>' +
                      '<tbody>' +
                        '<tr>' +
                          '<td>' + cases[i][11] + '</td>' +
                          '<td>' + races[cases[i][12]] + '</td>' +
                          '<td>' + (cases[i][13] ? 'Female' : 'Male') + '</td>' +
                          '<td>' + cases[i][14] + '</td>' +
                          '<td>' + (cases[i][15] ? 'Democrat' : 'Republican') + '</td>' +
                        '</tr>' +
                      '</tbody>' +
                    '</table>' +
                    (display['defendant'] ? '<table class="table_col">' : '<table class="table_col all_results">') +
                      '<caption>Defendant Information</caption>' +
                      '<thead>' +
                        '<tr>' +
                          '<th>Name</th>' +
                          '<th>Gender</th>' +
                          '<th>Year of Birth</th>' +
                          '<th>Race</th>' +
                        '</tr>' +
                      '</thead>' +
                      '<tbody>';

            for (var j = 0; j < cases[i][20].length; j++) {
              content += '<tr class="toggle_def' + (!cases[i][20][j][32] ? ' all_results' : '') + '">' +
                          '<td>' + cases[i][20][j][1] + ' ' + cases[i][20][j][0] + '</td>' +
                          '<td>' + (cases[i][20][j][3] ? 'Female' : 'Male') + '</td>' +
                          '<td>' + (cases[i][20][j][5] == '0000' ? 'Unknown' : cases[i][20][j][5]) + '</td>' +
                          '<td>' + (races[cases[i][20][j][4]] == undefined ? 'Unknown' : races[cases[i][20][j][4]])  + '</td>' +
                        '</tr>' +
                        '<tr class="this_def_info">' +
                          '<td colspan="4">' +
                            '<table class="modal_table table_col' + (!cases[i][20][j][12] ? 'all_results' : '') + '">' +
                              '<caption>Arrest Information</caption>' +
                              '<thead>' +
                                '<tr>' +
                                  '<th>Arrest Date</th>' +
                                  '<th>Charge Date</th>' +
                                  '<th>Bail Type</th>' +
                                  '<th>Bail Amount</th>' +
                                '</tr>' +
                              '</thead>' +
                              '<tbody>' +
                                '<tr>' +
                                  '<td>' + (cases[i][20][j][8] == '0000-00-00' ? 'N/A' : cases[i][20][j][8]) + '</td>' +
                                  '<td>' + (cases[i][20][j][7] == '0000-00-00' ? 'N/A' : cases[i][20][j][7]) + '</td>' +
                                  '<td>' + bail_types[cases[i][20][j][10]] + '</td>' +
                                  '<td>' + (cases[i][20][j][11] == null ? 'N/A' : cases[i][20][j][11]) + '</td>' +
                                '</tr>' +
                              '</tbody>' +
                            '</table>' +
                          '</td>' +
                        '</tr>' +
                        '<tr class="this_def_info">' +
                          '<td colspan="4">' +
                            (display['cd'] ? '<table class="modal_table table_col">' : '<table class="modal_table table_col all_results">') +
                              '<caption>Charge Information</caption>' +
                              '<thead>' +
                                '<tr>' +
                                  '<th>Statute</th>' +
                                  '<th>Counts</th>' +
                                  '<th>Counts Nolle Prossed</th>' +
                                  '<th>Plea Guilty</th>' +
                                  '<th>Plea Dismissed</th>' +
                                  '<th>Trial Guilty</th>' +
                                  '<th>Trial Not Guilty</th>' +
                                  '<th>Fines</th>' +
                                  '<th>Months Sentenced</th>' +
                                  '<th>Months Probation</th>' +
                                '</tr>' +
                              '</thead>' +
                              '<tbody>';

              for (var k = 0; k < cases[i][20][j][23].length; k++) {
                content +=  '<tr' + (!cases[i][20][j][23][k][10] ? ' class="all_results"' : '') + '>' +
                              '<td>' + cases[i][20][j][23][k][0] + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][1] == null ? 'N/A' : cases[i][20][j][23][k][1]) + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][2] == null ? 'N/A' : cases[i][20][j][23][k][2]) + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][4] == null ? 'N/A' : cases[i][20][j][23][k][4]) + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][3] == null ? 'N/A' : cases[i][20][j][23][k][3]) + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][5] == null ? 'N/A' : cases[i][20][j][23][k][5]) + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][6] == null ? 'N/A' : cases[i][20][j][23][k][6]) + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][7] == null ? 'N/A' : cases[i][20][j][23][k][7]) + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][8] == null ? 'N/A' : cases[i][20][j][23][k][8]) + '</td>' +
                              '<td>' + (cases[i][20][j][23][k][9] == null ? 'N/A' : cases[i][20][j][23][k][9]) + '</td>' +
                            '</tr>';
              }

              content += '<tr class="this_def_info">' +
                          '<td colspan="4">' +
                            '<table class="modal_table table_col' + (!cases[i][20][j][34] ? 'all_results' : '') + '">'  +
                              '<caption>Sentence Information</caption>' +
                              '<thead>' +
                                '<tr>' +
                                  '<th>Total Charges</th>' +
                                  '<th>Total Sentences</th>' +
                                  '<th>Year Terminated</th>' +
                                  '<th>Months Sentenced</th>' +
                                  '<th>Months Probation</th>' +
                                  '<th>Restitution</th>' +
                                  '<th>Asset Forfeiture?</th>' +
                                  '<th>Appeal?</th>' +
                                '</tr>' +
                              '</thead>' +
                              '<tbody>' +
                                '<tr>' +
                                  '<td>' + (cases[i][20][j][13] == null ? 'N/A' : cases[i][20][j][13]) + '</td>' +
                                  '<td>' + (cases[i][20][j][14] == null ? 'N/A' : cases[i][20][j][14]) + '</td>' +
                                  '<td>' + (cases[i][20][j][15] == '0000' ? 'N/A' : cases[i][20][j][15]) + '</td>' +
                                  '<td>' + (cases[i][20][j][17] == null ? 'N/A' : cases[i][20][j][17]) + '</td>' +
                                  '<td>' + (cases[i][20][j][22] == null ? 'N/A' : cases[i][20][j][22]) + '</td>' +
                                  '<td>' + (cases[i][20][j][18] == null ? 'N/A' : '$' + cases[i][20][j][18]) + '</td>' +
                                  '<td>' + (cases[i][20][j][19] ? 'Yes' : 'No') + '</td>' +
                                  '<td>' + (cases[i][20][j][20] ? 'Yes' : 'No') + '</td>' +
                                '</tr>' +
                              '</tbody>' +
                            '</table>' +
                          '</td>' +
                        '</tr>' +
                      '</tbody>' +
                    '</table>' +
                  '</td>' +
                '</tr>' +
                '<tr class="this_def_info">' +
                  '<td colspan="4">' + 
                    (display['ocg'] ? '<table class="modal_table table_col">' : '<table class="modal_table table_col all_results">') +
                      '<caption>Organized Crime Group Information</caption>' +
                      '<thead>' +
                        '<tr>' +
                          '<th>Name</th>' +
                          '<th>Size</th>' +
                          '<th>Race</th>' +
                          '<th>Scope</th>' +
                        '</tr>' +
                      '</thead>' +
                      '<tbody>' +
                        '<tr>' +
                          '<td>' + (cases[i][20][j][24] == '' ? 'None' : cases[i][20][j][24]) + '</td>' + 
                          '<td>' + ocg_types[cases[i][20][j][25]] + '</td>' + 
                          '<td>' + ocg_races[cases[i][20][j][26]] + '</td>' + 
                          '<td>' + ocg_scopes[cases[i][20][j][27]] + '</td>' +
                        '</tr>' +
                        '<tr>' +
                          '<td>' + (cases[i][20][j][28] == '' ? 'None' : cases[i][20][j][28]) + '</td>' + 
                          '<td>' + ocg_types[cases[i][20][j][29]] + '</td>' + 
                          '<td>' + ocg_races[cases[i][20][j][30]] + '</td>' + 
                          '<td>' + ocg_scopes[cases[i][20][j][31]] + '</td>' +
                        '</tr>' +
                      '</tbody>' +
                    '</table>' +
                  '</td>' +
                '</tr>';
            }

            content += '</table></div>';
          
            $('#basic-modal-content').html(content);
            $('#basic-modal-content').modal();

            $('.all_results').hide(); //Hide unfiltered "all" search results on page load.
            
            //Funtion to filter the results
            $('#myonoffswitch').click(function(){
              if (this.checked === false ) {
                $( ".all_results" ).show("slow");
              } else if ( this.checked === true ) {
                $( ".all_results" ).hide("slow");
              }
            });
            //End of Function to Filter Results

            //Funtion to toggle Defendant Information
            $('.this_def_info').hide();
            $('.toggle_def').click(function(){
            $(this).nextUntil('.toggle_def').toggle('slow');
            $(this).toggleClass('clicked', 'slow');
            });
            //End of funtion to toggle Defendant Information

          }

        });
      }

      google.load("visualization", "1", {packages:["table"]});
      google.setOnLoadCallback(drawTable);

</script>

<!-- Auto Complete Script -->
<script>
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
    $( "#DataInProgressCaseName" ) //Case Name Field
      .autocomplete({
        source: "autoComplete.php?column=CaseNam" ,
        minLength: 1
      });
    $( "#DataInProgressCaseNumber" ) //Case Number Field
      .autocomplete({
        source: "autoComplete.php?column=CaseNum" ,
        minLength: 1
      });
    $( "#DataInProgressDefendantName" ) //Def Name Field
      .autocomplete({
        source: "autoComplete.php?column=DefFirst,DefLast" ,
        minLength: 1
      });
    $( "#DataInProgressJudgeName" ) //Judge Name Field
      .autocomplete({
        source: "autoComplete.php?column=JudgeName" ,
        minLength: 1
      });
    $( "#DataInProgressOcgName" ) //Ocg Name Field
      .autocomplete({
        source: "autoComplete.php?column=OCName1" ,
        minLength: 1
      });
  </script>
