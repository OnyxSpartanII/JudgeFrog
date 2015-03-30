<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Manage Users - Admin Panel | Human Trafficking Data');
    $this->set('active', 'create');
?>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">User Management</h3>
              <div class="col-md-5 contact-right  users form" style="margin-top: -50px;">
               <?php echo $this->Form->create('User');?>
                <!-- TOP CREATE A NEW USER BAR -->
                  <div class="top_bar col-md-5">
                    <div class="top_bar_left">
                      <h4>ENTER USER INFORMATION</h4>
                    </div>
                      <!-- CREATE BUTTON-->
                      <div title="Add new user" style="margin-top: 19px;">
                        <label for="submitForm" class="user_button">
                          <?php echo $this->Html->image('create_user.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 8px 8px 0px;' )); ?>
                        </label>
                      </div>
                  </div>
                <!-- Create Interface -->
                <div class="user_creation" style="padding-bottom:50px; margin-top:50px;">
                    <div class="login_details" style="background-color:#DCDCDC">
                        <h1>L O G I N</h1>
                        <div style="margin-bottom:20px; margin-top:-350px; margin-left:50px; text-align:center;">   
                            <?php
                              echo "<br><br>";
                              echo $this->Form->input('username', array('label' => 'Username*','placeholder' => 'jdoe', 'type' => 'text', 'id' => 'login_field'));
                              echo "<br>";
                              echo $this->Form->input('password', array('label' => 'Password*', 'id' => 'login_field'));
                              echo "<br>";
                              echo $this->Form->input('password_confirm', array('label' => 'Confirm Password*', 'type' => 'password', 'id' => 'login_field'));
                              echo "<br><br>";
                            ?>
                        </div>
                    </div>
                    
                    <div style="padding-top:0px;background-color:#FFF; border-bottom:1px solid rgba(75,75,75,.3);"></div>
                    
                    <div class="personal_details" style="background-color:#DCDCDC">
                        <h1>OTHER</h1>
                        <div style="padding-bottom:20px; margin-top:-340px; margin-left:50px; text-align:center;">     
                            <?php
                              echo "<br><br>";
                              echo $this->Form->input('first_name', array('label' => 'First Name*', 'placeholder' => 'John', 'id' => 'personal_field'));
                              echo "<br>";
                              echo $this->Form->input('last_name', array('label' => 'Last Name*', 'placeholder' => 'Doe', 'id' => 'personal_field'));
                              echo "<br>";
                              echo $this->Form->input('role', array('label' => 'Privilege Level*', 'id' => 'personal_field', 'options' => array('admin' => 'Administrator (RA)', 'author' => 'Author (Scholar)')));
                              echo "<br>";

                            ?>
                        </div>
                    </div>
                  <div class="submit" style="display:block; display:none"><input  type="submit" value="Submit" id="submitForm"/></div></form> 
                </div>
            </div> 
                <div class="col-md-7 contact-right">
                    <!-- TOP DELETE SELECTED USER BAR -->
                      <div class="top_bar col-md-7">
                        <div class="top_bar_dash">
                          <h4>DELETE SELECTED USER</h4>
                        </div>
                          <!-- DELETE BUTTON-->
                          <div title="Delete selected user.">
                            <label for="" class="user_button" >
                              <?php echo $this->Html->image('delete_user.png', array('alt' => 'Delete', 'style' => 'float:left; padding: 10px 8px 8px 0px;' )); 
                              ?>
                            </label>
                          </div>
                      </div>
                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
                            <table border="1" class="user_info">
                                <tbody><tr>
                                    <th><input type="checkbox" id="selectall"></th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Credentials</th>
                                </tr>
                                <tr>
                                    <td align="center"><input type="checkbox" class="case" name="case" value="1"></td>
                                    <td>vbouche</td>
                                    <td>Vanessa</td>
                                    <td>Bouche</td>
                                    <td>Super Administrator</td>
                                </tr>
                                <tr>
                                    <td align="center"><input type="checkbox" class="case" name="case" value="1"></td>
                                    <td>jdoe</td>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>Administrator</td>
                                </tr>
                                <tr>
                                    <td align="center"><input type="checkbox" class="case" name="case" value="1"></td>
                                    <td>dguetta</td>
                                    <td>David</td>
                                    <td>Guetta</td>
                                    <td>Scholar</td>
                                </tr>
                            </tbody>
                        </table>
                </div> 
                <div class="error-message">
                    
                </div>
          </div>
        </div>
            <div class="search_disclaim" style="margin-top:50px">
              <p><strong>Note: </strong>Once a user is created, this user's info cannot be modified <strong>| *Required Fields</strong></p>
            </div>
</div>

<!-- TABLE AND TABLE SELECTION SCRIPT -->
<style type="text/css">
table{width:100%;border:1px solid #999;border-collapse:collapse;}
#selectall, .case{padding: 0px 10px 0px 0px;}
th{background-color:#999;color:#fff;
    padding:15px 0px 15px 0px;
    border-right:1px solid #666;
    text-align: center;}
td{text-align: center;
    min-width: 20px;}
</style>
<script language="javascript">
$(function(){$("#selectall").click(function(){
    $('.case').attr('checked',this.checked);});
    $(".case").click(function(){
        if($(".case").length==$(".case:checked").length){
            $("#selectall").attr("checked","checked");}
        else{$("#selectall").removeAttr("checked");}
        });
    });
</script>
<!-- SIMPLE SCRIPT FOR HOVER ON USER CREATION -->
<script>
    if ($("#login_field").focus(function() {
            $(".login_details").css({"border-left": "7px solid #999"});
            $(".personal_details").css({"border-left": "none"});
        }));
    if ($("#personal_field").focus(function() {
            $(".personal_details").css({"border-left": "7px solid #4D1979"});
            $(".login_details").css({"border-left": "none"});
        }));
</script>


<!-- WELCOME BANNER -->
<style type="text/css">
  #flashMessage{
  padding: 40px;
  font-size: 30px;
  color: #FFF;
  -webkit-animation: fadeInDown 1.3s ease-in-out;
  -moz-transition: fadeInDown 1.3s ease-in-out;
  animation: fadeInDown 1.3s ease-in-out;
  border-bottom: 1px solid #999;
  background-color: #00BFFF;
  }
</style>
<script type="text/javascript">
    var $welcom = $("#flashMessage");
    setTimeout(function() {
        // $welcom.hide('slow', slideUp);
        $welcom.slideUp(800).delay(900).fadeOut(900);
    }, 4000);
</script>







