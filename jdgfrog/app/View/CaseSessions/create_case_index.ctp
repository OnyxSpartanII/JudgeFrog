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
                              $this->Html->image("create_case.png", array("alt" => "Create Case", 'style' => 'float:left; padding: 10px 10px 10px 5px;')),
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
                      <div class="top_bar_left"  style="float:none; text-align:center">
                        <h4>BATCH UPLOAD | DOWNLOAD</h4>
                      </div>
	                        <div class="upload_section" style="margin-top:80px; margin-left:0px;">
	                        	<h2>Upload</h2>
								<?php
								echo $this->Form->create('Uploads', array('type' => 'file'));
								echo $this->Form->input('file', array('type' => 'file'));
								echo $this->Form->end('Submit');
								?>
							</div>
	                        <div class="download_section" style=" background-color:#444;">
	                        	<h2>Download</h2>
	                        	<?php
								//Creates the download button
								echo $this->Form->create('Download');
								echo $this->Form->end('Download');
								?>
							</div>
                    </div>
                  <!-- Delete Interface -->
                  <script type="text/javascript">
                  
                  </script>
                </div> 
            </div>
            </div>
</div>
