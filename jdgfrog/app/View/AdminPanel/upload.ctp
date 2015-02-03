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
	<title>Upload Batch  | Admin Control Panel HTD</title>
	<meta http-equiv="Content-Language" content="English" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'/>
</head>


<body>

<div id="wrap">
	<div id="header">
		<div id="headerlinks">
		<a href="./index.html" title="Home">Home</a>
		<a href="./create.html" title="Create">Create</a>
		<a href="./edit.html" title="Edit">Edit</a>
		<a href="./delete.html" title="Delete">Delete</a>
		<a href="upload.html" class="upload_active" title="Batch Upload">Upload</a>
		<label style="color:#fff">|</label>
		<a href="off.html" title="Log Off">LogOff</a>
		</div>
		<h1><a href="index.html">Admin Control Panel | HTD</a></h1>
	</div>


	<div class="content">

	<div class="body-content" style="text-align:center">

		<form style="margin: 0 auto">
				<h2>Batch Upload...</h2>
	  				<br><br>
				<input type="file" style="font-size:13px; margin:0px auto; width:175px; height:30px; background-color:#000; border:none; color:#fff;" value="Choose File" name="upload_btn" />
				
			<br><br><br>
			<input type="submit" style="font-size:20px; width:200px; height:50px; background-color:#db1a03; border:none; color:#fff;" value="Upload New Batch" name="case_submit">

		</form>
	</div>
	</div>


  <div id="footer">
    <p>Admin Control Panel HTD V 0.1 | <a target="_blank" href="http://humantraffickingdata.org" title="Human Trafficking Data Website">Human Trafficking Data</a>
    </p>
  </div>

</div>


</body>



</html>
