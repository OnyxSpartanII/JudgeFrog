<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Edit Case</h3>
              <div class="col-md-3 contact-right" style="padding-bottom:50px">
                <!-- TOP CREATE A NEW USER BAR -->
                  <div class="top_bar col-md-3">
                    <div class="top_bar_left">
                      <h4>SEARCH</h4>
                    </div>
                      <!-- PENDING BUTTON-->
                      <div title="Click here to add review the selected case." style="margin-top: 19px;">
                        <label for="" class="user_button">
                          <?php echo $this->Html->image('search.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 7px 8px 0px;' )); ?>
                        </label>
                      </div>
                      <div style="margin-bottom:20px; margin-top:100px; text-align:center;">   
                            <?php
                              echo $this->Form->input('username', array('label' => 'Enter Case Name','placeholder' => 'USA v. John Doe', 'type' => 'text', 'id' => 'case_name'));
                            ?>
                        </div>
                  </div>
                <!-- Create Interface -->
                <div class="user_creation" style="padding-bottom:50px; margin-top:50px;">
                  <div class="login_details" style="background-color:#DCDCDC">
                  </div>
                </div>
            </div> 
                <div class="col-md-9 contact-right">
                  <!-- TOP DELETE SELECTED USER BAR -->
                    <div class="top_bar col-md-9">
                      <div class="top_bar_dash">
                        <h4>CASE UPDATE DASHBOARD</h4>
                      </div>
                        <!-- DELETE BUTTON-->
                        <div title="Click here to delete the selected user." style="padding: 0px 0px 0px 0px;">
                          <label for="" class="user_button">
                            <?php echo $this->Html->image('send.png', array('alt' => 'Publish', 'style' => 'padding: 10px 7px 8px 0px;' )); ?>
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