<?php $this->layout = 'admin_panel_layout';?>
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
                      <!-- CREATE BUTTON-->
                      <div title="Click here to add this user.">
                        <label for="" class="user_button">
                          <?php echo $this->Html->image('review.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 7px 10px 2px;' )); ?>
                        </label>
                      </div>
                  </div>
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
                        <div title="Click here to delete the selected user.">
                          <label for="" class="user_button" style="padding: 12px 13px 13px 13px; margin-top: -29px;">
                            <?php echo $this->Html->image('send.png', array('alt' => 'Publish', 'style' => '' )); ?>
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