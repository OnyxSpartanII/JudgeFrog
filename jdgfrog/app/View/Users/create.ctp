<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Manage Users - Admin Panel | Human Trafficking Data');
    $this->set('active', 'create');
?>
<?php
    echo $this->Html->css(array('dataTables.bootstrap', 'dataTables.responsive'));
    echo $this->Html->script(array('jquery-1.10.2.min', 'jquery.dataTables.min', 'dataTables.responsive.min', 'dataTables.bootstrap'));
?>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#users_table').DataTable( {
        responsive: true
    } );
} );
</script>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
            <div class="case_top_bar">
              <h3 class="" style="text-align:left; float:none">Users Management</h3>
            </div>
              <div class="col-md-5 contact-right  users form" style="margin-top: -50px;">
               <?php echo $this->Form->create('User');
                      echo $this->Form->hidden('createform', array('value' => 'create'));?>
                <!-- Create Interface -->
                <div class="user_creation " style="padding-bottom:50px; margin-top:50px;">
                    <div class="case_creation_form" id="form_style">
                      <h2 id="caseInfoFS_Title">USER CREATION</h2>
                      <fieldset>              
                            <?php
                              echo "<br><br>";
                              echo $this->Form->input('username', array('label' => 'Username*','placeholder' => 'jdoe', 'type' => 'text', 'id' => 'login_field'));
                              echo "<br>";
                              echo $this->Form->input('password', array('label' => 'Password*', 'id' => 'login_field'));
                              echo "<br>";
                              echo $this->Form->input('password_confirm', array('label' => 'Confirm Password*', 'type' => 'password', 'id' => 'login_field'));
                              echo "<br>";
                              echo $this->Form->input('first_name', array('label' => 'First Name*', 'placeholder' => 'John', 'id' => 'personal_field'));
                              echo "<br>";
                              echo $this->Form->input('last_name', array('label' => 'Last Name*', 'placeholder' => 'Doe', 'id' => 'personal_field'));
                              echo "<br>";
                              echo "<hr style='border-top:1px solid #CCC;''>";
                              echo $this->Form->input('role', array('label' => 'Privilege Level*', 'id' => 'personal_field', 'options' => array('admin' => 'Administrator', 'ra' => 'Research Assisstant')));
                              echo "<br>";
                            ?>
                          <hr style="border-top:1px solid #CCC;">
                          <input  type="submit" value="Submit" id="submitForm"/>
                    </fieldset>  
                  </div>
                  <!-- <div class="submit" style=""><input  type="submit" value="Submit" id="submitForm"/></div></form>  -->
                </div>
            </div> 
                <div class="col-md-7 contact-right">
                  <?php 
                      echo $this->Form->create("delete_user_form"); 
                      echo $this->Form->hidden('deleteform', array('value' => 'delete'));
                  ?>
                    <!-- TOP USER BAR -->
                      <div class="top_bar col-md-8">
                        <div class="top_bar_dash">
                          <h4>ALL USERS | DASHBOARD</h4>
                        </div>
                      </div>
                          <?php
                            $servername = "oyster.arvixe.com";
                            $username = "jdgfrog_testDB";
                            $password = "tcuCOSC1!";
                            $dbname = "jdgfrog_testDB";
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            $sql = "SELECT id, username, first_name, last_name, role FROM users";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                  echo "<table class='table table-striped table-bordered' id='users_table'>";
                                  echo"      <thead>";
                                  echo"        <tr>";
                                  echo"          <th>Username</th>";
                                  echo"          <th>First Name</th>";
                                  echo"          <th>Last Name</th>";
                                  echo"          <th class='desktop'>Privilege Level</th>";
                                  echo"          <th class='special_th always'>Actions</th>";
                                  echo"        </tr>";
                                  echo"      <thead>";
                                  echo "<tbody>";
                                while($row = $result->fetch_assoc()) {
                                    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                  echo "  <tr>";
                                  echo "      <td> &nbsp;&nbsp;".$row['username']." </td>";
                                  echo "      <td> ".$row['first_name']." </td>";
                                  echo "      <td> ".$row['last_name']." </td>";
                                  echo "      <td> ".$row['role']." </td>";
                                  echo "      <td> ".$this->Html->link('Delete', '/admin/delete_user/'.$row['username'], 'Are you sure?');
                                            "</td>";
                                  echo "  </tr>";
                                  }
                                  echo "</tbody>";
                                  echo "</table>";
                                }
                            else {
                                echo "0 results";
                            }
                            $conn->close();
                          ?>
                  <div class="submit" style="display:block; display:none"><input  type="submit" value="Submit" id="deleteBtn"/></div>
                  <?php 
                      echo $this->Form->end();
                  ?>
                </div> 
                <div class="error-message"></div>
          </div>
        </div>
            <div class="search_disclaim" style="margin-top:50px">
              <p><strong>Note: </strong>Once a user is created, this user's info cannot be modified <strong>| *Required Fields</strong></p>
            </div>
</div>
<!-- TABLE AND TABLE SELECTION SCRIPT -->
<style type="text/css">
.table_container, .dataTables_length, .dataTables_filter{
  margin-top: 10px;
  text-align: left;
}
table{
  width:100%;
  border:1px solid #999;
  border-collapse:collapse;
}
.case{padding: 0px 10px 0px 0px;}
th{background-color:#999;color:#fff;
    padding:15px 0px 15px 0px;
    border-right:1px solid #666;
    text-align: left;}
td{text-align: left;
    min-width: 20px;}
</style>
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
  background-color: #5cb85c;
  }
.special_th{background-color: #4D1979}
</style>
<script type="text/javascript">
    var $welcom = $("#flashMessage");
    setTimeout(function() {
        // $welcom.hide('slow', slideUp);
        $welcom.slideUp(800).delay(900).fadeOut(900);
    }, 4000);
</script>

