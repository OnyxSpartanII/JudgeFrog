<?php
    echo $this->Html->css(array('modal_window_style'));
?>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Review Case</h3>
              <div class="col-md-4 contact-right">
                <!-- TOP CREATE A NEW USER BAR -->
                  <div class="top_bar col-md-4">
                    <div class="top_bar_left">
                      <h4>PENDING CASE(S)</h4>
                    </div>
                      <!-- PENDING BUTTON-->
                      <div title="Click here to edit the selected case." style="margin-top: 19px;">
                        <label for="" class="user_button">
                          <?php
                          echo $this->Html->link(
                              $this->Html->image("review.png", array("alt" => "Edit Case", 'style' => 'float:left; padding: 10px 7px 10px 2px;')),
                              "/AdminPanel/edit", array('escape' => false)); ?> 
                        </label>
                      </div>  
                  </div>
                    <table class="pending_case all_results">
                        <tbody>
                          <tr>
                              <th>Case Name</th>
                              <th>Editor's Name</th>
                          </tr>
                          <tr class="toggle_case">
                              <td>USA v. Afolabi et al</td>
                              <td>Vanessa</td>
                          </tr>
                          <tr class="toggle_case clicked">
                              <td>USA v. Balderas-Orosco et al</td>
                              <td>John</td>
                          </tr>
                          <tr class="toggle_case">
                              <td>USA v. Baltazar et al</td>
                              <td>Jake</td>
                          </tr>
                        </tbody>
                    </table>
                <!-- Create Interface -->
                <div class="user_creation" style="padding-bottom:50px; margin-top:50px;">
                  <div class="login_details" style="background-color:#DCDCDC">
                  </div>
                </div>
            </div> 
                <div class="col-md-8 contact-right">
                  <!-- TOP PUBLISH SELECTED USER BAR -->
                    <div class="top_bar col-md-8">
                      <div class="top_bar_dash">
                        <h4>CASE REVIEW DASHBOARD</h4>
                      </div>
                        <!-- PUBLISH BUTTON-->
                        <div title="Click here to publish this case." style="padding: 0px 0px 0px 0px;" id="publish_button">
                          <label for="" class="user_button">
                            <?php echo $this->Html->image('send.png', array('alt' => 'Publish', 'style' => 'padding: 10px 13px 10px 3px;' )); ?>
                          </label>
                        </div>
                    </div>
                    <div class="selected_case">
                      <div class="case_info">
                        <table class="modal_table all_results">
                          <thead>
                          <tr>
                            <th>Case Name</th>
                            <th>Case Number</th>
                            <th># of Defendents</th>
                            <th>State</th>
                            <th>Year</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>USA v. Afolabi et al</td>
                            <td>2:09-cr-00196-LA</td>
                            <td>3</td>
                            <td>WI</td>
                            <td>2009-08-25</td>
                          </tr>
                          </tbody>
                        </table>
                          <h4>Case Summary</h4>
                          <p class="case_summary">
                            The defendants conspired to transport minors for prostitution, and they also recruited minors and other women to work in strip clubs and engage in commercial sex acts. They were then forced to give all their money to the defendants, and at times were beaten, raped, confined, humiliated, intimidated, and threatened. 
                          </p>
                      </div>
                      <table class="table_col">
                        <caption>Defendent Information</caption>
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Year of Birth</th>
                          <th>White</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="toggle_def clicked">
                          <td>Balderas-Orosco, Juan</td>
                          <td>Male</td>
                          <td>1973</td>
                          <td>2</td>
                        </tr>
                          <tr class="this_def_info">
                            <td colspan="4">
                              <table class="modal_table table_col">
                                <caption>Arrest Information</caption>
                                <thead>
                                <tr>
                                  <th>Arrest Date</th>
                                  <th>Charge Date</th>
                                  <th>Bail Type</th>
                                  <th>Bail Amount</th>
                                  <th>Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>2006-12-29</td>
                                  <td>2007-01-18</td>
                                  <td>0</td>
                                  <td>$45,000</td>
                                  <td>0</td>
                                </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>

                          <tr class="this_def_info">
                            <td colspan="4">
                              <table class="modal_table table_col">
                                <caption>Charge Information</caption>
                                <thead>
                                <tr>
                                  <th>Arrest Date</th>
                                  <th>Charge Date</th>
                                  <th>Bail Type</th>
                                  <th>Bail Amount</th>
                                  <th>Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>2006-12-29</td>
                                  <td>2007-01-18</td>
                                  <td>0</td>
                                  <td>$45,000</td>
                                  <td>0</td>
                                </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        <tr class="toggle_def">
                          <td>Cedeno-Zetina, Jose</td>
                          <td>Male</td>
                          <td>1969</td>
                          <td>2</td>
                        </tr>
                        <tr class="toggle_def">
                          <td>Camacho-Teran, Maria</td>
                          <td>Female</td>
                          <td>1969</td>
                          <td>2</td>
                        </tr>
                        </tbody>
                      </table>
                      <table class="modal_table table_col">
                        <caption>Victims Information</caption>
                        <thead>
                        <tr>
                          <th>Total # Victims</th>
                          <th>Total # of Minors</th>
                          <th>Total # of Foreigners</th>
                          <th>Total # of Females</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>32</td>
                          <td>3</td>
                          <td>5</td>
                          <td>10</td>
                        </tr>
                        </tbody>
                      </table>

                      <table class="modal_table all_results">
                        <caption>Organized Crime Group Information</caption>
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Scope</th>
                          <th>Race</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>MS-13</td>
                          <td>Street Gang</td>
                          <td>Trans-National</td>
                          <td>White</td>
                        </tr>
                        </tbody>
                      </table>

                      <table class="modal_table all_results">
                        <caption>Judge Information</caption>
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Race</th>
                          <th>Gender</th>
                          <th>Tenure</th>
                          <th>Appointed By</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Janet C. Hall</td>
                          <td>White</td>
                          <td>Female</td>
                          <td>1997</td>
                          <td>Republican</td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
          </div>
      </div> 
  </div>
</div>
            <div class="search_disclaim" style="margin-top:200px">
              <p><strong>Note: </strong>Not every combination of analyzable objects will return meaningful results.</p>
            </div>
</div>

<!-- TABLE SELECTION SCRIPT -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript">
    // TOGGLE SELECTED CASE
    $('.selected_case').hide();
       $('.toggle_case').click(function(){
          // if ($('.selected_case').is(':visible') == true){
          //   $('.selected_case').hide(1000); 
          //   $(".selected_case").css("-webkit-animation", "fadeIn 0.8s");}
          // if ($('.selected_case').is(':visible') == false){
          //   $('.selected_case').show(500);}
                $('.selected_case').toggle(50);
      });
       // TOGGLE SELECTED DEFENDENT
    $('.this_def_info').hide();
       $('.toggle_def').click(function(){
                $('.this_def_info').toggle(50);
      });

       $('#publish_button').click(function(){
          alert('This case has been published!');
      });
</script>
