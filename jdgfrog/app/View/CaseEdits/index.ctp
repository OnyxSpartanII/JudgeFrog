<?php
		echo $this->Html->css(array('dataTables.bootstrap', 'dataTables.responsive'));
		echo $this->Html->script(array('jquery-1.10.2.min', 'jquery.dataTables.min', 'dataTables.responsive.min', 'dataTables.bootstrap', 'dataTables.fixedHeader.min'));
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		var caseTable = $('#cases_table').DataTable({
				responsive: true
		});
} );
</script>
<div class="contact">
	<div class="container">
		<div class="contact-main">
			<h3 class="page_title">Case Editing</h3>	
				<div class="col-md-12 contact-right">
					<!-- TOP EDIT SELECTED CASE BAR --> 
					<div class="top_bar col-md-8">
						<div class="top_bar_dash">
							<h4>ALL DATABASE CASES</h4>
							<?php echo $this->Html->link('Add Case', '/admin/cases/create'); ?>
						</div>
					</div>
						<?php
							if (isset($dipCases) && count($dipCases) > 0) {

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

								foreach ($dipCases as $d) {
									echo "  <tr>";
									echo "      <td> &nbsp;".$d['DataInProgress']['CaseNam']. "</td>";
									echo "      <td> ".$d['DataInProgress']['CaseNum']." </td>";
									echo "      <td> ".$d['DataInProgress']['JudgeName']." </td>";
									echo "      <td> ".$d['DataInProgress']['State']." </td>";
									echo "      <td> ".$this->Html->link('Edit', '/admin/cases/edit/migrate/'.$d['DataInProgress']['CaseNum']) . '&nbsp/&nbsp;'
																		.$this->Html->link('Delete', '/CaseEdits/delete_case/'.$d['DataInProgress']['CaseNum'], array('confirm'=>'Are you sure you want to delete this case?'));
															"</td>";
									echo "      <td> ".$d['DataInProgress']['author']." </td>";
									echo "      <td> ".$d['DataInProgress']['NumDef']." </td>";
									echo "      <td> ".$d['DataInProgress']['modified']." </td>";
									echo "  </tr>";
									}
									echo "</tbody>";
									echo "</table>";
							} else {
								echo "No cases in table: DataInProgress";
							}
						?>

						<?php
							if (isset($dataCases) && count($dataCases) > 0) {

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

								foreach ($dataCases as $d) {
									echo "  <tr>";
									echo "      <td> &nbsp;".$d['Datum']['CaseNam']. "</td>";
									echo "      <td> ".$d['Datum']['CaseNum']." </td>";
									echo "      <td> ".$d['Datum']['JudgeName']." </td>";
									echo "      <td> ".$d['Datum']['State']." </td>";
									echo "      <td> ".$this->Html->link('Edit', '/admin/cases/edit/migrate/'.$d['Datum']['CaseNum']) . '&nbsp/&nbsp;'
																		.$this->Html->link('Delete', '/CaseEdits/delete_case/'.$row['CaseNum'], array('confirm'=>'Are you sure you want to delete this case?'));
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
#collapsible-panels .table h2, input {
	width: 10%;
}
</style>
<script type="text/javascript">
		var $welcom = $("#flashMessage");
		setTimeout(function() {
				$welcom.slideUp(800).delay(900).fadeOut(900);
		}, 4000);
</script>

