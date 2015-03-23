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
                      <div title="Click here to add review the selected case." style="margin-top: 19px;">
                        <label for="" class="user_button">
                          <?php echo $this->Html->image('review.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 7px 10px 2px;' )); ?>
                        </label>
                      </div>  
                  </div>
                    <table border="1" class="all_results">
                        <tbody>
                        <tr id="current_case">
                            <th>Case Name</th>
                            <th>Editor's Name</th>
                        </tr>
                        <tr>
                            <td>USA v. Afolabi et al</td>
                            <td>Vanessa</td>
                        </tr>
                        <tr>
                            <td>USA v. Balderas-Orosco et al</td>
                            <td>John</td>
                        </tr>
                        <tr>
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
                  <!-- TOP DELETE SELECTED USER BAR -->
                    <div class="top_bar col-md-8">
                      <div class="top_bar_dash">
                        <h4>CASE REVIEW DASHBOARD</h4>
                      </div>
                        <!-- DELETE BUTTON-->
                        <div title="Click here to delete the selected user." style="padding: 0px 0px 0px 0px;">
                          <label for="" class="user_button">
                            <?php echo $this->Html->image('send.png', array('alt' => 'Publish', 'style' => 'padding: 10px 13px 10px 3px;' )); ?>
                          </label>
                        </div>
                    </div>
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

              <table class="table_col all_results">
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
                <tr class="toggle_def">
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
              <table class="modal_table all_results">
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
            <div class="search_disclaim" style="margin-top:200px">
              <p><strong>Note: </strong>Not every combination of analyzable objects will return meaningful results.</p>
            </div>
</div>

<!-- TABLE AND TABLE SELECTION SCRIPT -->
<style type="text/css">
table{width:100%;border:1px solid #999;border-collapse:collapse;}
th{background-color:#999;color:#fff;
    padding:15px 0px 15px 0px;
    border-right:1px solid #666;
    text-align: center;}
td{text-align: left;
    padding-left: 10px;}

.toggle_def:hover{background-color: #4D1979; color: #FFF; 
   transition: all 0.3s ease-in-out;
   -webkit-transition: all 0.3s ease-in-out;
   -moz-transition: all 0.3s ease-in-out;
   -o-transition: all 0.3s ease-in-out;}
.toggle_def.clicked{
  background-color: #4D1979; 
  color: #FFF;
  border-left: 5px solid #4D1979;
}
.toggle_def:hover td, .toggle_def.clicked td{
  color: #FFF;
}
</style>

<script type="text/javascript">
//Funtion to toggle Defendant Information
    $(document).ready(function(){
      $('.this_def_info').hide();
      $('.table').hide();
       $('.toggle_def').click(function(){
           $('.this_def_info').toggle("slow");
           alert("Button Pressed");
       });
    })
  //End of Function to Filter Results
</script>
