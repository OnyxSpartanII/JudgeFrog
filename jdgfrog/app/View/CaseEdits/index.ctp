<?php
		echo $this->Html->css(array('dataTables.bootstrap', 'dataTables.responsive'));
		echo $this->Html->script(array('jquery-1.10.2.min', 'jquery.dataTables.min', 'dataTables.responsive.min', 'dataTables.bootstrap'));
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		all_cases_table
		var allCaseTable = $('#all_cases_table').DataTable({
				responsive: true
		});
		var caseTable = $('#cases_table').DataTable({
				responsive: true
		});
} );
</script>
<div class="contact">
	<div class="container">
		<div class="contact-main">
			<h3 class="page_title">Case Creation</h3>	
				<div class="col-md-12 contact-right">
					<div class="col-md-3 contact-right">
					<!-- TOP CREATE A NEW USER BAR -->
						<div class="top_bar col-md-3">
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
							Click on the top right button to add a new case.
							</p>
							<h4>Download Docket</h4>
							<p>
								You may download the whole database docket by clicking on the download button above.
							</p>
						</div>
					</div> 
					<div class="col-md-9 contact-right">
					<!-- TOP EDIT SELECTED CASE BAR --> 
					<div class="top_bar col-md-9">
						<div class="top_bar_dash">
							<h4 id="default_title">ALL DATABASE CASES</h4>
							<div style="float:left; margin-top:10px">
							    <input type="radio" id="radio1" name="selectedElement" value="all" checked>
							       <label for="radio1" class="complete_btn">All</label>
							    <input type="radio" id="radio2" name="selectedElement"value="false">
							       <label for="radio2" class="pending_btn">Incomplete</label>
							</div>
						</div>
						<!-- CREATE BUTTON-->
						<div title="Add a new case" style="margin-top: 0px;">
							<label for="" class="user_button">
								<?php
								echo $this->Html->link(
										$this->Html->image("create_case.png", array("alt" => "Create Case", 'style' => 'float:left; padding: 10px 7px 8px 0px;')),
										"/admin/cases/create", array('escape' => false)); ?> 
							</label>
						</div>
					</div>
					<!-- <div class="welcome">
						<p>
						Choose what table to be displayed from the options above.
						</p>
					</div> -->
					<div class="pending">
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
							// $author = AuthComponent::user('id');
							// $show_cases = "SELECT DISTINCT CaseNam, CaseNum, JudgeName, State, author, NumDef, modified FROM DataInProgress WHERE author = $author";
							$show_cases = "SELECT DISTINCT CaseNam, CaseNum, JudgeName, State, author, NumDef, modified FROM DataInProgress";

							$result = $conn->query($show_cases);

							if ($result->num_rows > 0) {
								// output data of each row
								echo "<table class='table table-striped table-bordered' id='cases_table'>";
								echo"      <thead>";
								echo"        <tr>";
								echo"          <th class='always first_th'>Case Name</th>";
								echo"          <th class='desktop'>Case Number</th>";
								echo"          <th class='desktop'>Judge Name</th>";
								echo"          <th class='min-tablet'>State</th>";
								echo"          <th class='always special_th'>Actions</th>";
								echo"          <th class='none'>Author's Name</th>";
								echo"          <th class='none'>Number of Defendant</th>";
								echo"          <th class='none'>Modified Date</th>";
								echo"        </tr>";
								echo"      <thead>";
								echo "<tbody>";
								
								while($row = $result->fetch_assoc()) {
									echo "  <tr>";
									echo "      <td> &nbsp;".$row['CaseNam']. "</td>";
									echo "      <td> ".$row['CaseNum']." </td>";
									echo "      <td> ".$row['JudgeName']." </td>";
									echo "      <td> ".$row['State']." </td>";
									echo "      <td> ".$this->Html->link('Edit', '/admin/cases/edit/'.$row['CaseNum']) . '&nbsp/&nbsp;'
																		.$this->Html->link('Delete', '/CaseEdits/delete_case/'.$row['CaseNum'], array('confirm'=>'Are you sure you want to delete this case?'));
															"</td>";
									echo "      <td> ".$row['author']." </td>";
									echo "      <td> ".$row['NumDef']." </td>";
									echo "      <td> ".$row['modified']." </td>";
									echo "  </tr>";
									}
									echo "</tbody>";
									echo "</table>";
								}
							else {
									echo "No Case Available to Display";
							}
							$conn->close();
						?>
					</div>
					<div class="complete">
						<?php
							if (isset($dataCases) && count($dataCases) > 0) {

								echo "<table class='table table-striped table-bordered' id='all_cases_table'>";
								echo"      <thead>";
								echo"        <tr>";
								echo"          <th class='always first_th'>Case Name</th>";
								echo"          <th class='desktop'>Case Number</th>";
								echo"          <th class='desktop'>Judge Name</th>";
								echo"          <th class='min-tablet'>State</th>";
								echo"          <th class='always special_th'>Actions</th>";
								echo"          <th class='none'>Author's Name</th>";
								echo"          <th class='none'>Number of Defendant</th>";
								echo"          <th class='none'>Modified Date</th>";
								echo"        </tr>";
								echo"      <thead>";
								echo "<tbody>";

								foreach ($dataCases as $d) {
									echo "  <tr>";
									echo "      <td> &nbsp;".$d['Datum']['CaseNam']. "</td>";
									echo "      <td> ".$d['Datum']['CaseNum']." </td>";
									echo "      <td> ".$d['Datum']['JudgeName']." </td>";
									echo "      <td> ".$d['Datum']['State']." </td>";
									echo "      <td> ".$this->Html->link('Edit', '/admin/cases/edit/migrate/'.$d['Datum']['CaseNum']) . '&nbsp/&nbsp;'
																		.$this->Html->link('Delete', '/CaseEdits/delete_case/'.$d['Datum']['CaseNum'], array('confirm'=>'Are you sure you want to delete this case?'));
															"</td>";
									echo "      <td> ".$d['Datum']['author']." </td>";
									echo "      <td> ".$d['Datum']['NumDef']." </td>";
									echo "      <td> ".$d['Datum']['modified']." </td>";
									echo "  </tr>";
									}
									echo "</tbody>";
									echo "</table>";
							} else {
								echo "No cases in table: Data";
							}
						?>
					</div>
				</div> 
			</div> 
		</div>
	</div>
				<div class="search_disclaim" style="margin-top:200px">
					<p><strong>Note: </strong>You may search a case by any values of all attributes - Name, Number, Judge...</p>
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
.special_th{background-color: #4D1979}
.first_th{text-align: center;}
</style>
<script type="text/javascript">
		var $welcom = $("#flashMessage");
		setTimeout(function() {
				$welcom.slideUp(800).delay(900).fadeOut(900);
		}, 4000);
		$('.pending').hide();
		
		$( ".complete_btn" ).click(function() {
			$('.complete').fadeIn('slow');
			$('.pending').slideUp('slow');
			$("#default_title").text("ALL DATABASE CASES");
		});
		
		$( ".pending_btn" ).click(function() {
			$('.pending').fadeIn('slow');
			$('.complete').slideUp('slow');
			$("#default_title").text("CASES PENDING COMPLETION");
		});
</script>

