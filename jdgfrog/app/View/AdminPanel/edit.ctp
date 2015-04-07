<?php
    echo $this->Html->css(array('dataTables.bootstrap', 'dataTables.responsive'));
    echo $this->Html->script(array('jquery-1.10.2.min', 'jquery.dataTables.min', 'dataTables.responsive.min', 'dataTables.bootstrap', 'dataTables.fixedHeader.min'));
?>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    var caseTable = $('#cases_table').DataTable({
        responsive: true
    });
    new $.fn.dataTable.FixedHeader(caseTable);
} );
</script>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Case Editing</h3>
              
                <div class="col-md-12 contact-right">
                  <!-- TOP EDIT SELECTED CASE BAR --> 
                      <div class="top_bar col-md-8">
                        <div class="top_bar_dash">
                          <h4>ALL DATABASE CASES</h4>
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
                                echo "      <td> ".$row['CaseNam']. "</td>";
                                echo "      <td> ".$row['CaseNum']." </td>";
                                echo "      <td> ".$row['JudgeName']." </td>";
                                echo "      <td> ".$row['State']." </td>";
                                echo "      <td> ".$this->Html->link('Edit', '/admin/cases/edit/'.$row['CaseNum']) . '&nbsp/&nbsp;'
                                                  .$this->Html->link('Delete', '/admin/delete_case/'.$row['CaseNum'], array('onclick'=> 'return confirm("Are you sure you want to delete?")'));
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
                              echo "0 results";
                          }
                          $conn->close();
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