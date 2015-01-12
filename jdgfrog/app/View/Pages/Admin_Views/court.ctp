 <?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Court | Admin Control Panel HTD</title>
	<meta http-equiv="Content-Language" content="English" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css' />
</head>


<body>

<div id="wrap">
	<div id="header">
		<div id="headerlinks">
		<a href="index.html" title="Case">Case</a>
		<a href="court.html" class="court_active" title="Court">Court</a>
		<a href="defendant.html" title="Defendant">Defendant</a>
		<a href="upload.html" title="Batch Upload">Batch Upload</a>
		</div>
		<h1><a href="index.html">Admin Control Panel | HTD</a></h1>
	</div>


	<div id="content">


<table class="tg">

	<form>

  		<tr>
    		<th class="tg-4kyz" colspan="3">Add a Court...</th>
  		</tr>




</table>
		<br><br><br><br><br><br><br>
		<input type="submit" style="font-size:20px; margin-left:0px; width:200px; height:50px; background-color:#f05; border:none; color:#fff;" value="Store New Court" name="case_submit">

	</form>


		<h4 style="color:#F05; margin-top:600px;">*NOTE ~ Required Fields</h4>

	</div>


	<div id="footer">
		Admin Control Panel HTD V 0.1 | <a target="_blank" href="http://humantraffickingdata.org" title="Human Trafficking Data Website">Human Trafficking Data</a>
	</div>

</div>


</body>



</html>
