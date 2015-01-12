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
	<title>Logging Off... | Admin Control Panel HTD</title>
	<meta http-equiv="Content-Language" content="English" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css' />
</head>


<body>

<div id="wrap">
	<div id="header">
		<h1><a href="index.html">Admin Control Panel | HTD</a></h1>
	</div>


	<div id="content">

	<div id="out-page" style="margin-top: 500px; margin-bottom: 500px;">
		<h1>You have been logged out!</h1>

		<h2>Click <a href="in.html">HERE</a> to log in</h2>
	</div>

	</div>


	<div id="footer">
		Admin Control Panel HTD V 0.1 | <a target="_blank" href="http://humantraffickingdata.org" title="Human Trafficking Data Website">Human Trafficking Data</a>
	</div>

</div>


</body>



</html>
