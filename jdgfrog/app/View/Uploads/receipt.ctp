<!-- File: /app/View/Uploads/receipt.ctp -->

<h1>File Uploaded!</h1>
<?php
	foreach ($receipt as $r) {
		echo $r . '<br/><br/>';
	}
?>