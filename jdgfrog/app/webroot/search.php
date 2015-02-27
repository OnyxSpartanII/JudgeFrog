<?php
$DB_SERVER = 'oyster.arvixe.com';
$DB_USER = 'jdgfrog_testDB';
$DB_PASSWORD = 'tcuCOSC1!';
$DB_NAME = 'jdgfrog_testDB';
$mysqli = new MySQLi($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);
/* Connect to database and set charset to UTF-8 */

if($mysqli->connect_error) {
  echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
  exit;
} else {
  $mysqli->set_charset('utf8');
}
/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term']));
$column = trim(strip_tags($_GET['column']));
$a_json = array();
$a_json_row = array();

$columns = split(",", $column);
if (sizeof($columns) == 1) {
  $data = $mysqli->query("SELECT $columns[0] FROM DataInProgress WHERE $columns[0] LIKE '%$term%' LIMIT 10");
} else if (sizeof($columns) == 2) {
 $data = $mysqli->query("SELECT $columns[0], $columns[1] FROM DataInProgress WHERE $columns[0] LIKE '%$term%' OR $columns[1] LIKE '%$term%' LIMIT 10");
} else {
  exit;
}

for ($row_no = 0; $row_no < $data->num_rows; $row_no++) {
  $data->data_seek($row_no);
  $row = $data->fetch_assoc();
  if (sizeof($columns) > 1) {
    $a_json_row = $row[$columns[0]] . " " . $row[$columns[1]];
  } else {
    $a_json_row = $row[$columns[0]]; 
  }
  array_push($a_json, $a_json_row);
}

// Send JSON data to JQuery 
echo json_encode($a_json);
flush();  
 
$mysqli->close();
?>