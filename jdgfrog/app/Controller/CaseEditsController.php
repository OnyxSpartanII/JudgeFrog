<?php

App::uses('AppController', 'Controller');

class CaseEditsController extends AppController {
	public $helpers = array('Html', 'Session');
	public $components = array('Session', 'Paginator');
	public $name = 'CaseEdits';
	public $uses = array('DataInProgress');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('editDefendant', 'getCase', 'edit', 'saveEdits');
	}

	public function edit() {
		$caseNumber = '1:13-cr-00069-LO';
		$case = $this->getCase($caseNumber);
		// 30 defs: 3:10-cr-00260
		// 4 defs: 2:07-cr-00785-JLL
		$this->set('case', $case);

		if ($this->request->is('post')) {

			$data = $this->request->data;
			debug($data);
			$caseName		= $data['DataInProgress']['CaseNam'];
			$caseNum 		= $data['DataInProgress']['CaseNum'];
			$numDef 		= $data['DataInProgress']['NumDef'];
			$state 			= $data['DataInProgress']['State'];
			$fedDistLoc 	= $data['DataInProgress']['FedDistrictLoc'];
			$fedDistNum 	= $data['DataInProgress']['FedDistrictNum'];
			$judgeName 		= $data['DataInProgress']['JudgeName'];
			$judgeRace 		= $data['DataInProgress']['JudgeRace'];
			$judgeGen 		= $data['DataInProgress']['JudgeGen'];
			$judgeApptBy 	= $data['DataInProgress']['JudgeApptBy'];
			$judgeTenure 	= $data['DataInProgress']['JudgeTenure'];
			$caseSummary 	= $data['DataInProgress']['CaseSummary'];
			$laborTraf 		= $data['DataInProgress']['LaborTraf'];
			$adultTraf 		= $data['DataInProgress']['AdultSexTraf'];
			$minorTraf 		= $data['DataInProgress']['MinorSexTraf'];
			$numVic 		= $data['DataInProgress']['NumVic'];
			$numVicMinor	= $data['DataInProgress']['NumVicMinor'];
			$numVicForeign	= $data['DataInProgress']['NumVicForeign'];
			$numVicFemale	= $data['DataInProgress']['NumVicFemale'];

			//$caseName = addslashes($caseName);


			//$caseName = 'DROP TABLE DataInProgress_backup';
			/*
			* 	Using variables here in $fields may allow SQL injections according to someone on Stackoverflow?
			*	However, when tested nothing happened. Instead the CaseNam was changed to the above string, 
			*	for example. More testing for vulnerabilities?
			*
			*	CakePHP's updateAll() method does not perform any SQL escaping. The strings below cannot contain
			*	an apostrophe (e.g., O'Connell, O'Grady, etc.) or else the update will fail.
			*/
			$fields = array(
							'DataInProgress.CaseNum' 		=> "'$caseNum'", 
							'DataInProgress.CaseNam' 		=> "'$caseName'", 
							'DataInProgress.NumDef' 		=> "'$numDef'",
							'DataInProgress.State' 			=> "'$state'",
							'DataInProgress.FedDistrictLoc' => "'$fedDistLoc'",
							'DataInProgress.FedDistrictNum' => "'$fedDistNum'",
							'DataInProgress.JudgeName' 		=> "'$judgeName'",
							'DataInProgress.JudgeRace' 		=> "'$judgeRace'",
							'DataInProgress.JudgeGen' 		=> "'$judgeGen'",
							'DataInProgress.JudgeApptBy' 	=> "'$judgeApptBy'",
							'DataInProgress.JudgeTenure' 	=> "'$judgeTenure'",
							'DataInProgress.CaseSummary' 	=> "'$caseSummary'",
							'DataInProgress.LaborTraf' 		=> "'$laborTraf'",
							'DataInProgress.AdultSexTraf' 	=> "'$adultTraf'",
							'DataInProgress.MinorSexTraf' 	=> "'$minorTraf'",
							'DataInProgress.NumVic' 		=> "'$numVic'",
							'DataInProgress.NumVicMinor' 	=> "'$numVicMinor'",
							'DataInProgress.NumVicForeign' 	=> "'$numVicForeign'",
							'DataInProgress.NumVicFemale' 	=> "'$numVicFemale'"
			);

			if ($this->DataInProgress->updateAll($fields, array('DataInProgress.CaseNum' => $caseNumber)) ) {
				print_r('Save successful!');
			} else {
				print_r('Something went wrong. Case information not saved.');
			}
		}
		$this->render('edit');		
	}

	/*
	*	Method name: getCase
	*		This method retrieves the case with the passed case number. It appends the case into one array with each defendant
	*		as an entry into the array. Case[Defendant], where sizeof(Defendant) is the number of defendants in that case.
	*		The method then returns the case.
	*
	*/
	public function getCase($caseNumber) {

		$case = $this->DataInProgress->find('all', array('conditions' => array('DataInProgress.CaseNum' => $caseNumber)));
		return $case;
	}

	/*
	*	Method name: defendant
	*		This method takes a defendant name, DOB, and case # passed to it and renders
	*		a view with the defendant's details. The updated info is then saved to the DataInProgress
	*		table with the review flag set. 
	*
	*/
	public function editDefendant($defArray) {

		$string = explode("|", $defArray);

		if (count($string) == 3) {
			$defLast = $string[0];
			$defFirst = $string[1];
			$caseNumber = $string[2];
			$case = $this->DataInProgress->find('first', array(
														'conditions' => array(
																			'DataInProgress.CaseNum' => $caseNumber, 
																			'DataInProgress.DefFirst' => $defFirst, 
																			'DataInProgress.DefLast' => $defLast
																			),
														)
												);
			$caseId = $case['DataInProgress']['id'];
			$this->set('case', $case);
		} else {
			//Redirect to error page?
			print_r('Invalid arguments. Missing defendant name or case number.');
		}

		if ($this->request->is('post')) {

			$this->DataInProgress->clear();
			$this->request->data['DataInProgress']['id'] = $caseId;

			if ($this->DataInProgress->save($this->request->data)) {
				print_r('Save successful!');
			} else {
				print_r('An error occurred. The defendant was not saved.');
			}
		}

	}

	public function saveEdits() {
		debug($this->request->data);

	}


	/*
	*	Method name: displayCase
	*		This method displays the case object passed to it.
	*
	*
	*/
	public function displayCase($case) {
		$this->set($case);
		$this->render('edit');
	}
}