<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Review Case</h3>
              <div class="col-md-4 contact-right">
                <!-- TOP CREATE A NEW USER BAR -->
                  <div class="top_bar col-md-4">
                    <div class="top_bar_left">
                      <h4>INFORMATION PROGRESS</h4>
                    </div>
                      <!-- CREATE BUTTON-->
                      <div title="Click here to add this user.">
                        <label for="" class="user_button">
                          <?php echo $this->Html->image('create_user.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 7px 10px 7px;' )); ?>
                        </label>
                      </div>
                  </div>
                <!-- Create Interface -->
                <div class="user_creation" style="padding-bottom:50px; margin-top:50px;">
                  <div class="login_details" style="background-color:#DCDCDC">
                    <style type="text/css">
                    .login_details h1 {
              background-color: #4D1979; color: #FFF;
              width: 50px;
              font-size: 50px;
              word-wrap: break-word;
              line-height: 1.3em;
              }
                    </style>
                  <h1>L O G I N</h1>
                  <div style="margin-bottom:20px; margin-top:-350px; margin-left:50px; text-align:center;">   
                      <?php
                        echo "<br><br>";
                        echo $this->Form->input('Username', array('placeholder' => 'jdoe', 'type' => 'text', 'id' => 'login_field'));
                        echo "<br>";
                        echo $this->Form->input('password', array('label' => 'Password', 'id' => 'login_field'));
                        echo "<br>";
                        echo $this->Form->input('password', array('label' => 'Confirm Password', 'id' => 'login_field'));
                        echo "<br><br>";
                      ?>
                    </div>
                  </div>
                  
                  <div style="padding-top:0px;background-color:#FFF; border-bottom:1px solid rgba(75,75,75,.3);"></div>
                  
                  <div class="personal_details" style="background-color:#DCDCDC">
                    <style type="text/css">
                    .personal_details h1 {
              background-color: #999; color: #FFF;
              width: 50px;
              font-size: 50px;
              word-wrap: break-word;
              line-height: 1.3em;
              }
                    </style>
                  <h1>P E R S O N A L</h1>
                  <div style="padding-bottom:74px; margin-top:-450px; margin-left:50px; text-align:center;">    
                      <?php
                        echo "<br><br>";
                        echo $this->Form->input('First Name', array('placeholder' => 'John', 'id' => 'personal_field', 'onfocus' => 'check()'));
                        echo "<br>";
                        echo $this->Form->input('Last Name', array('placeholder' => 'Doe', 'id' => 'personal_field', 'onfocus' => 'check()'));
                        echo "<br>";
                        echo $this->Form->input('Phone Number', array('placeholder' => '###-###-####', 'type' => 'text', 'id' => 'personal_field', 'onfocus' => 'check()'));
                        echo "<br><br>";
                      ?>
                    </div>
                  </div>
                </div>
            </div> 
                <div class="col-md-8 contact-right">
                  <!-- TOP DELETE SELECTED USER BAR -->
                    <div class="top_bar col-md-8">
                      <div class="top_bar_left">
                        <h4>DELETE SELECTED USER</h4>
                      </div>
                        <!-- DELETE BUTTON-->
                        <div title="Click here to delete the selected user.">
                          <label for="" class="user_button" >
                            <?php echo $this->Html->image('delete_user.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 7px 10px 7px;' )); ?>
                          </label>
                        </div>
                    </div>
                  <!-- Delete Interface -->
                  <script type="text/javascript">
                  
                  </script>
                </div> 
          </div>
        </div>
            <div class="search_disclaim" style="margin-top:200px">
              <p><strong>Note: </strong>Not every combination of analyzable objects will return meaningful results.</p>
            </div>
</div>







