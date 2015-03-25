<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Create Case- Admin Panel | Human Trafficking Data');
    $this->set('active', 'create_case');
?>
<?php echo $this->Html->script(array('bootstrap.file-input'));?>

<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Case Creation</h3>
              <div class="col-md-5 contact-right">
                <!-- TOP CREATE A NEW USER BAR -->
                  <div class="top_bar col-md-5">
                    <div class="top_bar_left">
                      <h4>SINGLE CASE</h4>
                    </div>
                      <!-- CREATE BUTTON-->
                      <div title="Click here to begin." style="margin-top: 19px;">
                        <label for="" class="user_button">
                          <?php
                          echo $this->Html->link(
                              $this->Html->image("create_case.png", array("alt" => "Create Case", 'style' => 'float:left; padding: 10px 7px 8px 0px;')),
                              "/CaseSessions/createcaseSetup", array('escape' => false)); ?> 
                        </label>
                      </div>
                  </div>
                  	<label style="font-size:18px; padding:10px;">Click on a case bellow to continue editing.</label>
                      <table class="pending_case">
                        <tbody>
                          <tr>
                              <th>Case Name</th>
                              <th>Created Date</th>
                          </tr>
                          <tr class="toggle_case">
                              <td>USA v. Afolabi et al</td>
                              <td>03/03/2015</td>
                          </tr>
                          <tr class="toggle_case">
                              <td>USA v. Balderas-Orosco et al</td>
                              <td>23/02/2015</td>
                          </tr>
                          <tr class="toggle_case">
                              <td>USA v. Baltazar et al</td>
                              <td>01/8/2015</td>
                          </tr>
                        </tbody>
                    </table>
                <!-- Create Interface -->
              
              </div> 
                <div class="col-md-7 contact-right">
                  <!-- TOP DELETE SELECTED USER BAR -->
                    <div class="top_bar col-md-7">
                      <div class="top_bar_dash"  style="float:none; text-align:center">
                        <h4>BATCH UPLOAD | DOWNLOAD</h4>
                      </div>
                        <!-- DOWNLOAD BUTTON-->
                        <div title="Click here to delete the selected user.">
                          <label for="" class="user_button" >
                            <?php echo $this->Html->image('download.png', array('alt' => 'Create', 'style' => 'float:left; padding: 10px 7px 8px 0px;' )); ?>
                          </label>
                        </div>
                        <div class="upload_section" style="margin-top:80px;">
                          <h2 style="color:#444">Upload</h2>
                            <?php
                            echo $this->Form->create('Uploads', array('type' => 'file'));
                            echo $this->Form->input('', array('type' => 'file', 'title' => 'Choose a .CSV file'));
                            echo "<br><br>";
                            echo $this->Form->end('Submit');
                            ?>
                         </div>
                        <div class="upload_section_receipt" style="float:right; margin-top:-190px">
                          <h2 style="color:#444">Upload Receipt</h2>
                            <!-- <p>File Uploaded!</p> -->
                         </div>
                    </div>
                </div> 
            </div>
            </div>
</div>

<script type="text/javascript">
  $('input[type=file]').bootstrapFileInput();
  $('.file-inputs').bootstrapFileInput();
</script>
