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
				// echo 'Account created!';
		    $allData = $this->DataInProgress->find('all'); //Grab all data from DB
    		
    		$ara = array(
    							'CaseDefId' => 'CaseDefId',
			   					'DefLast' => 'DefLast',
								'DefFirst' => 'DefFirst' ,
								'Alias' => 'Alias',
								'CaseNam' => 'CaseNam' ,
								'CaseNum' => 'CaseNum' ,
								'NumDef' => 'NumDef',
								'State' => 'State',
								'FedDistrictLoc' => 'FedDistrictLoc',
								'FedDistrictNum' => 'FedDistrictNum',
								'JudgeName' => 'JudgeName',
								'JudgeRace' => 'JudgeRace',
								'JudgeGen' => 'JudgeGen',
								'JudgeTenure' => 'JudgeTenure',
								'JudgeApptBy' => 'JudgeApptBy',
								'CaseSummary' => 'CaseSummary',
								'DefGender' => 'DefGender',
								'DefRace' => 'DefRace',
								'DefBirthdate' => 'DefBirthdate',
								'DefArrestAge' => 'DefArrestAge',
								'ChargeDate' => 'ChargeDate',
								'ArrestDate' => 'ArrestDate',
								'Detained' => 'Detained',
								'BailType' => 'BailType',
								'BailAmount' => 'BailAmount',
								'LaborTraf' => 'LaborTraf',
								'AdultSexTraf' => 'AdultSexTraf',
								'MinorSexTraf' => 'MinorSexTraf',
								'Role' => 'Role',
								'FelCharged' => 'FelCharged',
								'FelSentenced' => 'FelSentenced',

								'1916to1968' => '1916to1968',
								'Counts1916to1968' => 'Counts1916to1968',
								'CountsNP1916to1968' => 'CountsNP1916to1968',
								'PleaDismissed1916to1968' => 'PleaDismissed1916to1968',
								'PleaGuilty1916to1968' => 'PleaGuilty1916to1968',
								'TrialGuilty1916to1968' => 'TrialGuilty1916to1968',
								'TrialNG1916to1968' => 'TrialNG1916to1968',
								'Fines1916to1968' => 'Fines1916to1968',
								'Sent1916to1968' => 'Sent1916to1968',
								'Prob1916to1968' => 'Prob1916to1968',

								'1028' => '1028',
								'Counts1028' => 'Counts1028',
								'CountsNP1028' => 'CountsNP1028',
								'PleaDismissed1028' => 'PleaDismissed1028',
								'PleaGuilty1028' => 'PleaGuilty1028',
								'TrialGuilty1028' => 'TrialGuilty1028',
								'TrialNG1028' => 'TrialNG1028',
								'Fines1028' => 'Fines1028',
								'Sent1028' => 'Sent1028',
								'Prob1028' => 'Prob1028',

								'1351' => '1351',
								'Counts1351' => 'Counts1351',
								'CountsNP1351' => 'CountsNP1351',
								'PleaDismissed1351' => 'PleaDismissed1351',
								'PleaGuilty1351' => 'PleaGuilty1351',
								'TrialGuilty1351' => 'TrialGuilty1351',
								'TrialNG1351' => 'TrialNG1351',
								'Fines1351' => 'Fines1351',
								'Sent1351' => 'Sent1351',
								'Prob1351' => 'Prob1351',

								'1425' => '1425',
								'Counts1425' => 'Counts1425',
								'CountsNP1425' => 'CountsNP1425',
								'PleaDismissed1425' => 'PleaDismissed1425',
								'PleaGuilty1425' => 'PleaGuilty1425',
								'TrialGuilty1425' => 'TrialGuilty1425',
								'TrialNG1425' => 'TrialNG1425',
								'Fines1425' => 'Fines1425',
								'Sent1425' => 'Sent1425',
								'Prob1425' => 'Prob1425',

								'1426' => '1426',
								'Counts1426' => 'Counts1426',
								'CountsNP1426' => 'CountsNP1426',
								'PleaDismissed1426' => 'PleaDismissed1426',
								'PleaGuilty1426' => 'PleaGuilty1426',
								'TrialGuilty1426' => 'TrialGuilty1426',
								'TrialNG1426' => 'TrialNG1426',
								'Fines1426' => 'Fines1426',
								'Sent1426' => 'Sent1426',
								'Prob1426' => 'Prob1426',

								'1461to1465' => '1461to1465',
								'Counts1461to1465' => 'Counts1461to1465',
								'CountsNP1461to1465' => 'CountsNP1461to1465',
								'PleaDismissed1461to1465' => 'PleaDismissed1461to1465',
								'PleaGuilty1461to1465' => 'PleaGuilty1461to1465',
								'TrialGuilty1461to1465' => 'TrialGuilty1461to1465',
								'TrialNG1461to1465' => 'TrialNG1461to1465',
								'Fines1461to1465' => 'Fines1461to1465',
								'Sent1461to1465' => 'Sent1461to1465',
								'Prob1461to1465' => 'Prob1461to1465',

								'1512' => '1512',
								'Counts1512' => 'Counts1512',
								'CountsNP1512' => 'CountsNP1512',
								'PleaDismissed1512' => 'PleaDismissed1512',
								'PleaGuilty1512' => 'PleaGuilty1512',
								'TrialGuilty1512' => 'TrialGuilty1512',
								'TrialNG1512' => 'TrialNG1512',
								'Fines1512' => 'Fines1512',
								'Sent1512' => 'Sent1512',
								'Prob1512' => 'Prob1512',

								'1542to1543' => '1542to1543',
								'Counts1542to1543' => 'Counts1542to1543',
								'CountsNP1542to1543' => 'CountsNP1542to1543',
								'PleaDismissed1542to1543' => 'PleaDismissed1542to1543',
								'PleaGuilty1542to1543' => 'PleaGuilty1542to1543',
								'TrialGuilty1542to1543' => 'TrialGuilty1542to1543',
								'TrialNG1542to1543' => 'TrialNG1542to1543',
								'Fines1542to1543' => 'Fines1542to1543',
								'Sent1542to1543' => 'Sent1542to1543',
								'Prob1542to1543' => 'Prob1542to1543',

								'1546' => '1546',
								'Counts1546' => 'Counts1546',
								'CountsNP1546' => 'CountsNP1546',
								'PleaDismissed1546' => 'PleaDismissed1546',
								'PleaGuilty1546' => 'PleaGuilty1546',
								'TrialGuilty1546' => 'TrialGuilty1546',
								'TrialNG1546' => 'TrialNG1546',
								'Fines1546' => 'Fines1546',
								'Sent1546' => 'Sent1546',
								'Prob1546' => 'Prob1546',
								
								'1581to1588' => '1581to1588',
								'Counts1581to1588' => 'Counts1581to1588',
								'CountsNP1581to1588' => 'CountsNP1581to1588',
								'PleaDismissed1581to1588' => 'PleaDismissed1581to1588',
								'PleaGuilty1581to1588' => 'PleaGuilty1581to1588',
								'TrialGuilty1581to1588' => 'TrialGuilty1581to1588',
								'TrialNG1581to1588' => 'TrialNG1581to1588',
								'Fines1581to1588' => 'Fines1581to1588',
								'Sent1581to1588' => 'Sent1581to1588',
								'Prob1581to1588' => 'Prob1581to1588',
								
								'1589' => '1589',
								'Counts1589' => 'Counts1589',
								'CountsNP1589' => 'CountsNP1589',
								'PleaDismissed1589' => 'PleaDismissed1589',
								'PleaGuilty1589' => 'PleaGuilty1589',
								'TrialGuilty1589' => 'TrialGuilty1589',
								'TrialNG1589' => 'TrialNG1589',
								'Fines1589' => 'Fines1589',
								'Sent1589' => 'Sent1589',
								'Prob1589' => 'Prob1589',
								
								'1590' => '1590',
								'Counts1590' => 'Counts1590',
								'CountsNP1590' => 'CountsNP1590',
								'PleaDismissed1590' => 'PleaDismissed1590',
								'PleaGuilty1590' => 'PleaGuilty1590',
								'TrialGuilty1590' => 'TrialGuilty1590',
								'TrialNG1590' => 'TrialNG1590',
								'Fines1590' => 'Fines1590',
								'Sent1590' => 'Sent1590',
								'Prob1590' => 'Prob1590',
								
								'1591' => '1591',
								'Counts1591' => 'Counts1591',
								'CountsNP1591' => 'CountsNP1591',
								'PleaDismissed1591' => 'PleaDismissed1591',
								'PleaGuilty1591' => 'PleaGuilty1591',
								'TrialGuilty1591' => 'TrialGuilty1591',
								'TrialNG1591' => 'TrialNG1591',
								'Fines1591' => 'Fines1591',
								'Sent1591' => 'Sent1591',
								'Prob1591' => 'Prob1591',
								
								'1592' => '1592',
								'Counts1592' => 'Counts1592',
								'CountsNP1592' => 'CountsNP1592',
								'PleaDismissed1592' => 'PleaDismissed1592',
								'PleaGuilty1592' => 'PleaGuilty1592',
								'TrialGuilty1592' => 'TrialGuilty1592',
								'TrialNG1592' => 'TrialNG1592',
								'Fines1592' => 'Fines1592',
								'Sent1592' => 'Sent1592',
								'Prob1592' => 'Prob1592',
								
								'2251' => '2251',
								'Counts2251' => 'Counts2251',
								'CountsNP2251' => 'CountsNP2251',
								'PleaDismissed2251' => 'PleaDismissed2251',
								'PleaGuilty2251' => 'PleaGuilty2251',
								'TrialGuilty2251' => 'TrialGuilty2251',
								'TrialNG2251' => 'TrialNG2251',
								'Fines2251' => 'Fines2251',
								'Sent2251' => 'Sent2251',
								'Prob2251' => 'Prob2251',
							
								'2252' => '2252',
								'Counts2252' => 'Counts2252',
								'CountsNP2252' => 'CountsNP2252',
								'PleaDismissed2252' => 'PleaDismissed2252',
								'PleaGuilty2252' => 'PleaGuilty2252',
								'TrialGuilty2252' => 'TrialGuilty2252',
								'TrialNG2252' => 'TrialNG2252',
								'Fines2252' => 'Fines2252',
								'Sent2252' => 'Sent2252',
								'Prob2252' => 'Prob2252',
								
								'2260' => '2260',
								'Counts2260' => 'Counts2260',
								'CountsNP2260' => 'CountsNP2260',
								'PleaDismissed2260' => 'PleaDismissed2260',
								'PleaGuilty2260' => 'PleaGuilty2260',
								'TrialGuilty2260' => 'TrialGuilty2260',
								'TrialNG2260' => 'TrialNG2260',
								'Fines2260' => 'Fines2260',
								'Sent2260' => 'Sent2260',
								'Prob2260' => 'Prob2260',
								
								'2421to2424' => '2421to2424',
								'Counts2421to2424' => 'Counts2421to2424',
								'CountsNP2421to2424' => 'CountsNP2421to2424',
								'PleaDismissed2421to2424' => 'PleaDismissed2421to2424',
								'PleaGuilty2421to2424' => 'PleaGuilty2421to2424',
								'TrialGuilty2421to2424' => 'TrialGuilty2421to2424',
								'TrialNG2421to2424' => 'TrialNG2421to2424',
								'Fines2421to2424' => 'Fines2421to2424',
								'Sent2421to2424' => 'Sent2421to2424',
								'Prob2421to2424' => 'Prob2421to2424',
								
								'1324' => '1324',
								'Counts1324' => 'Counts1324',
								'CountsNP1324' => 'CountsNP1324',
								'PleaDismissed1324' => 'PleaDismissed1324',
								'PleaGuilty1324' => 'PleaGuilty1324',
								'TrialGuilty1324' => 'TrialGuilty1324',
								'TrialNG1324' => 'TrialNG1324',
								'Fines1324' => 'Fines1324',
								'Sent1324' => 'Sent1324',
								'Prob1324' => 'Prob1324',
								
								'1328' => '1328',
								'Counts1328' => 'Counts1328',
								'CountsNP1328' => 'CountsNP1328',
								'PleaDismissed1328' => 'PleaDismissed1328',
								'PleaGuilty1328' => 'PleaGuilty1328',
								'TrialGuilty1328' => 'TrialGuilty1328',
								'TrialNG1328' => 'TrialNG1328',
								'Fines1328' => 'Fines1328',
								'Sent1328' => 'Sent1328',
								'Prob1328' => 'Prob1328',

								'DateTerm' => 'DateTerm',
								'SentDate' => 'SentDate',
								'TotalSentence' => 'TotalSentence',
								'Restitution' => 'Restitution',
								'AssetForfeit' => 'AssetForfeit',
								'Appeal' => 'Appeal',
								'SupRelease' => 'SupRelease',
								'Probation' => 'Probation',
								'NumVic' => 'NumVic',
								'NumVicMinor' => 'NumVicMinor',
								'NumVicForeign' => 'NumVicForeign',
								'NumVicFemale' => 'NumVicFemale',
								'OCName1' => 'OCName1',
								'OCType1' => 'OCType1',
								'OCRace1' => 'OCRace1',
								'OCScope1' => 'OCScope1',
								'OCName2' => 'OCName2',
								'OCType2' => 'OCType2',
								'OCRace2' => 'OCRace2',
								'OCScope2' => 'OCScope2',
								'SubmittedForReview' => 'SubmittedForReview'
			);

			if (count($allData) > 0) {
		    // prepare the file and name it docket.csv
		    $fp = fopen('docket.csv', 'w');

		    fputcsv($fp, $ara); //adds the column labels 
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