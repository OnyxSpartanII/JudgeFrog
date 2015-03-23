<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Create Case- Admin Panel | Human Trafficking Data');
    $this->set('active', 'create_case');
?>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Case Creation</h3>
              <div class="col-md-4 contact-right">
                <!-- TOP CREATE A NEW USER BAR -->
                  <div class="top_bar col-md-4">
                    <div class="top_bar_left">
                      <h4>SINGLE CASE</h4>
                    </div>
                      <!-- CREATE BUTTON-->
                      <div title="Click here to begin." style="margin-top: 19px;">
                        <label for="" class="user_button">
                          <?php
                          echo $this->Html->link(
                              $this->Html->image("create_case.png", array("alt" => "Create Case", 'style' => 'float:left; padding: 10px 10px 10px 5px;')),
                              "/CaseSessions/createcaseSetup", array('escape' => false)); ?> 
                        </label>
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
                        <h4>BATCH UPLOAD</h4>
                      </div>
                        <!-- DELETE BUTTON-->
                        <div title="Click here to delete the selected user." style="margin-top: 19px;">
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
</div>
