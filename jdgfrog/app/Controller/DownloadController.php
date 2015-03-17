<?php

class DownloadController extends AppController {

	public $name = 'Download';

	public $uses = array('DataInProgress');

	public $helpers = array('Html', 'Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('download');
	}

	public function download() {

		if ($this->request->is('post')) {

		    $allData = $this->DataInProgress->find('all'); //Grab all data from DB
    		

			if (count($allData) > 0) {
		    // prepare the file and name it docket.csv
		    $fp = fopen('docket.csv', 'w');

			    // Save data
			    foreach ($allData as $row) {
			    	// foreach($row['DataInProgress'] as $val) {
			    	// 	echo $val . ', ';
			    	// }
			        fputcsv($fp, $row['DataInProgress']);
			    }
			    fclose($fp); //close the file
			}

			$file = 'docket.csv';

		/**** Download File ****/	
			if(!$file){ // file does not exist
			    die('file not found');
			} else {
			    header("Cache-Control: public");
			    header("Content-Description: File Transfer");
			    header("Content-Disposition: attachment; filename=$file");
			    header("Content-Type: application/zip");
			    header("Content-Transfer-Encoding: binary");
			    // read the file from disk
			    readfile($file);
			}
			exit(); //kills (die) the execution and will not add html
		}
				
	}
	
}