<?php
		$this->layout = 'admin_panel_layout';
		$this->set('title', 'Create Case - Admin Panel | Human Trafficking Data');
		$this->set('active', 'create_case');
?>
<?php
		echo $this->Html->css(array('dataTables.bootstrap', 'dataTables.responsive'));
		echo $this->Html->script(array('jquery-1.10.2.min', 'jquery.dataTables.min', 'dataTables.responsive.min', 'dataTables.bootstrap', 'dataTables.fixedHeader.min'));
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		var caseTable = $('#ongoing_table').DataTable({
				responsive: true
		});
} );
</script>
<!--search start here-->
<div class="contact">
		<div class="container">
				<div class="contact-main">
					<h3 class="page_title">Case Creation</h3>
							<div class="col-md-4 contact-right">
								<!-- TOP CREATE A NEW USER BAR -->
									<div class="top_bar col-md-4">
										<div class="top_bar_left">
											<h4>INSTRUCTIONS</h4>
										</div>
										<!-- DOWNLOAD BUTTON-->
										<div title="Download the docket">
											<label for="" class="user_button" style="margin-top:0px">
												<?php
													echo $this->Form->create(null, array(
														'url' => array('controller' => 'download', 'action' => '') ));
													echo $this->Form->submit('Download', array('type'=>'image','src' => '/judgefrog/jdgfrog/img/download.png', 'style' => 'float:right; padding: 0px 10px 8px 0px;'));
													echo $this->Form->end(); 
													?>
											</label>
										</div>
									</div>
									<div class="" style="text-align:left; margin-bottom:50px">
										<h4>Create a Case</h4>
										<p>
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
										</p>
										<h4>Download Docket</h4>
										<p>
											Lorem Ipsum is simply dummy text of the printing and typesetting industry.
										</p>
									</div>
								<!-- Create Interface -->
							</div> 
								<div class="col-md-8 contact-right">
										<!-- TOP DELETE SELECTED USER BAR -->
											<div class="top_bar col-md-8">
												<div class="top_bar_dash"  style="float:none; text-align:center">
													<h4>CASES PENDING DATA COMPLETION</h4>
												</div>
												<!-- CREATE BUTTON-->
												<div title="Click here to begin." style="margin-top: 0px;">
													<label for="" class="user_button">
														<?php
														echo $this->Html->link(
																$this->Html->image("create_case.png", array("alt" => "Create Case", 'style' => 'float:left; padding: 10px 7px 8px 0px;')),
																"/CaseSessions/createcaseSetup", array('escape' => false)); ?> 
													</label>
												</div>
										</div>
										<div class="upload_section">

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
														
														$author = AuthComponent::user('id');
														$sql = "SELECT DISTINCT caseNam, caseNum, created FROM case_sessions WHERE author = $author ";
														$result = $conn->query($sql);

														if ($result->num_rows > 0) {
																// output data of each row
																	echo "<table class='table table-striped table-bordered' id='ongoing_table'>";
																	echo"      <thead>";
																	echo"        <tr>";
																	echo"          <th>Case Name</th>";
																	echo"          <th>Case Number</th>";
																	echo"          <th class='desktop'>Creation Date</th>";
																	echo"          <th class='always special_th'>Actions</th>";
																	echo"        </tr>";
																	echo"      <thead>";
																	echo "<tbody>";
																while($row = $result->fetch_assoc()) {
																	echo "  <tr>";
																	echo "      <td> ".$row['caseNam']. "</td>";
																	echo "      <td> ".$row['caseNum']." </td>";
																	echo "      <td> ".$row['created']." </td>";
																	echo "      <td> ".$this->Html->link('Edit', '/admin/cases/edit/'.$row['caseNum']) . '&nbsp/&nbsp;'
																										.$this->Html->link('Delete', '/admin/delete_case/'.$row['caseNum'], array('onclick'=> 'return confirm("Are you sure you want to delete?")'));
																			 "</td>";
																	echo "  </tr>";
																	}
																	echo "</tbody>";
																	echo "</table>";
																}
														else {
																echo "You have no opened or incomplete cases.";
														}

														// $delete_query = "DELETE FROM `case_sessions` WHERE `id` = 1";
														// $delete_result = $conn->query($delete_query);

														$conn->close();
													?>

										 </div>
								</div> 
						</div>
				</div>
</div>
<div class="search_disclaim" style="margin-top:50px">
	<p><strong>Note: </strong>Ongoing cases may be completed at anytime</p>
</div>
<script type="text/javascript">
	$('input[type=file]').bootstrapFileInput();
	$('.file-inputs').bootstrapFileInput();
</script>

<!-- WELCOME BANNER -->
<style type="text/css">
	#flashMessage{
	padding: 30px;
	font-size: 25px;
	color: #FFF;
	-webkit-animation: fadeInDown 1.3s ease-in-out;
	-moz-transition: fadeInDown 1.3s ease-in-out;
	animation: fadeInDown 1.3s ease-in-out;
	border-bottom: 1px solid #999;
	background-color: #00BFFF;
	}
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
.special_th{background-color: #4D1979}
.table input {
	width: 10%;
}
</style>
<script type="text/javascript">
		var $welcom = $("#flashMessage");
		setTimeout(function() {
				// $welcom.hide('slow', slideUp);
				$welcom.slideUp(800).delay(900).fadeOut(900);
		}, 4000);
</script>





