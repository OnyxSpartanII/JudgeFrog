<?php

class AnalyzeController extends AppController {
	
	public $uses = array('Datum');

	public $helpers = array('Html', 'Form');

	/**
	 * Controller name
	 */
	public $name = 'Analyze';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'generateGraph');
	}

	public function index() {
		$cases = $this->Session->read('case_info');
	}

	public function generateGraph($type, $yIndex, $xIndex) {

		$this->autoRender = false;

		$cases = $this->Session->read('case_info');

		$yAxisOptions = array('Total Cases', 'Total Defendants', 'Avg Defendants Per Case', 'Total Months Sentenced', 'Avg Months Sentenced', 'Victims', 'Total Charge', 'Total Sentenced');
		$xAxisOptions = array('Year', 'Defendant By Gender', 'Defendant By Race', 'Judge By Gender', 'Judge By Race', 'Judge By Party', 'Crime Type', 'Statute', 'Federal District', 'State', 'Statute Charged', 'Statute Sentenced', 'Organized Crime Groups');
		$geoChartOptions = array('Case By State','Federal District');

		$s_arr = array('1961to1968', '1028', '1351',
						'1425', '1512', '1546', '1581to1588', '1589',
						'1590', '1591', '1592', '2252', '2260', '2421to2424',
						'1324', '1328');

		$options = array();

		switch ($type) {
			case 'line':
				$options = array('title' => $xAxisOptions[$xIndex-1], 'curveType' => 'straight', 'legend' => array('position' => 'bottom'), 'hAxis' => array('title'=>''), 'vAxis' => array('title'=>''));
				echo json_encode($this->barLinePie($cases, $options, $yIndex, $xIndex));
				break;

			case 'bar':
				$options = array('title' => $xAxisOptions[$xIndex-1], 'hAxis' => array('title' => ''), 'vAxis' => array('title' => ''));
				echo json_encode($this->barLinePie($cases, $options, $yIndex, $xIndex));
				break;
			
			case 'hst':
				$options = array('title' => $xAxisOptions[$xIndex-1], 'hAxis' => array('title' => ''), 'vAxis' => array('title' => ''));
				break;

			case 'pie':
				$options = array('title' => $xAxisOptions[$xIndex-1], 'hAxis' => array('title' => ''), 'vAxis' => array('title' => ''));
				switch ($xIndex) {
					case 1:
						$yIndex = 1;
						break;
					case 2:
						$yIndex = 2;
						break;
					case 3:
						$yIndex = 2;
						break;
					case 4:
						$yIndex = 1;
						break;
					case 5:
						$yIndex = 1;
						break;
					case 6:
						$yIndex = 1;
						break;
					case 7:
						$yIndex = 1;
						break;
					case 8:
						$yIndex = 2;
						break;
					case 9:
						$yIndex = 1;
						break;
					case 10:
						$yIndex = 1;
						break;
				}
				echo json_encode($this->barLinePie($cases, $options, $yIndex, $xIndex));
				break;

			case 'geo':
				$options = array('title' => "GeoChart", 'hAxis' => array('title' => ''), 'vAxis' => array('title' => ''));
				echo json_encode($this->geo($cases,$options));
				break;
			
			default:
				$options = array();
				break;
		}

	}

	public function barLinePie($cs, $opts, $yIndex, $xIndex) {
		$s_arr = array('1961to1968', '1028', '1351',
						'1425', '1512', '1546', '1581to1588', '1589',
						'1590', '1591', '1592', '2252', '2260', '2421to2424',
						'1324', '1328');

		$options = $opts;
		$cases = $cs;
		$data = array();
		$keys = array();
		$key_index = -1;

		switch ($xIndex) {
			case 1:
				$low = 9999;
				$high = 0;
				foreach($cases as $case){
					$v = split('-', $case[2])[0];
					if (strcmp($v, '0000') != 0 && strcmp($v, '') != 0) {
						if ($low > intval($v)) $low = intval($v);
						if ($high < intval($v)) $high = intval($v);
					}
				}

				for ($i = $low; $i < $high; $i++) { 
					array_push($keys, strval($i));
				}

				array_push($data, array('Year'));

				$key_index = 2;

				break;
			
			case 2:
				array_push($keys, 'Male');
				array_push($keys, 'Female');

				array_push($data, array('Gender'));

				$key_index = -2;

				break;

			case 3:
				array_push($keys,'White');
				array_push($keys,'Black');
				array_push($keys,'Asian');
				array_push($keys,'Hispanic');
				array_push($keys,'Other');

				array_push($data, array('Race'));

				$key_index = -3;

				break;

			case 4:
				array_push($keys, 'Male');
				array_push($keys, 'Female');

				array_push($data, array('Gender'));

				$key_index = 13;

				break;

			case 5:
				array_push($keys, 'White');
				array_push($keys, 'Black');
				array_push($keys, 'Hispanic');
				array_push($keys, 'Asian');
				array_push($keys, 'Indian');

				array_push($data, array('Race'));

				$key_index = 12;

				break;

			case 6:
				array_push($keys, 'Republican');
				array_push($keys, 'Democrat');

				array_push($data, array('Appointed By'));

				$key_index = 15;

				break;

			case 7:
				array_push($keys, 'Adult Sex');
				array_push($keys, 'Minor Sex');
				array_push($keys, 'Labor');

				array_push($data, array('Type'));

				$key_index = -4;

				break;

			case 8:
				foreach ($s_arr as $stat) {
					array_push($keys, $stat);
				}

				array_push($data, array('Statute'));

				$key_index = -5;

				break;

			case 9:
				$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13);
				foreach ($arr as $a) {
					array_push($keys, strval($a));
				}

				array_push($data, array('Federal District'));

				$key_index = 9;

				break;

			case 10:
				$states = array('AL','AK','AZ','AR','CA','CO','CT','DE',
						'FL','GA','HI','ID','IL','IN','IA','KS','KY',
						'LA','ME','MD','MA','MI','MN','MS','MO','MT',
						'NE','NV','NH','NJ','NM','NY','NC','ND','OH',
						'OK','OR','PA','RI','SC','SD','TN','TX','UT',
						'VT','VA','WA','WV','WI','WY');
				foreach ($states as $state) {
					array_push($keys, $state);
				}

				array_push($data, array('State'));

				$key_index = 7;

				break;

			case 11:

			case 12:
			
			case 13:

			default:
				# code...
				break;
		}

		foreach ($keys as $key) {
			array_push($data, array($key, 0));
		}

		switch ($yIndex) {
			case 1:
				array_push($data[0], 'Total Cases');
				
				foreach ($cases as $case) {
					if ($key_index > 0) {
						if ($key_index == 2){
							$ind = array_search(split('-',$case[2])[0], $keys) + 1;
						} else if ($key_index == 7) {
							$ind = array_search($case[7], $keys) + 1;
						} else {
							$keyvals = array();
							for ($x=0; $x < sizeof($keys); $x++) { 
								array_push($keyvals, $x);
							}
							$ind = array_search($case[$key_index], $keyvals) + 1;
						}
						$data[$ind][1]++;
					} else {
						if ($key_index == -2) {
							foreach ($case[20] as $def) {
								if ($def[3]) {
									$data[2][1]++;
								} else {
									$data[1][1]++;
								}
								break;
							}
						} else if ($key_index == -3) {
							for ($i=0; $i < 5; $i++) { 
								foreach ($case[20] as $def) {
									if ($def[4] == $i) {
										$data[$i+1][1]++;
									} else if ($def[4] >= 4) {
										$data[5][1]++;
									}
									break;
								}
							}
						} else if ($key_index == -4) {
							for ($i = 0; $i < 3; $i++) {
								if ($case[3+$i] == 1) {
									$data[$i+1][1]++;
								}
							}
						} else if ($key_index == -5) {

							$index = 1;
							foreach ($s_arr as $stat) {
								$ins = 0;
								foreach ($case[20] as $def) {
									foreach ($def[23] as $chrg) {
										if (strcmp($chrg[0], $stat) == 0) {
											$data[$index][1]++;
											$ins = 1;
										}
										if ($ins == 1) {
											break;
										}
									}
									if ($ins == 1) {
										break;
									}
								}
								if ($ins == 1) {
									break;
								}
								$index++;
							}
						}
					}
				}

				break;

			case 2:
				array_push($data[0], 'Total Defendants');

				foreach ($cases as $case) {
					foreach ($case[20] as $def) {
						if ($key_index > 0) {
							if ($key_index == 2) {
								$ind = array_search(split('-',$case[2])[0], $keys) + 1;
							} else if ($key_index == 7) {
								$ind = array_search($case[7], $keys) + 1;
							} else {
								$keyvals = array();
								for ($x=0; $x < sizeof($keys); $x++) { 
									array_push($keyvals, $x);
								}
								$ind = array_search($case[$key_index], $keyvals) + 1;
							}
							$data[$ind][1]++;
						} else {
							if ($key_index == -2) {
								if ($def[3]) {
									$data[2][1]++;
								} else {
									$data[1][1]++;
								}
							} else if ($key_index == -3) {
								for ($i=0; $i < 5; $i++) { 
									if ($def[4] == $i) {
										$data[$i+1][1]++;
										break;
									} else if ($def[4] >= 4) {
										$data[5][1]++;
									}
								}
							} else if ($key_index == -4) {
								for ($i = 0; $i < 3; $i++) {
									if ($case[3+$i] == 1) {
										$data[$i+1][1]++;
									}
								}
							} else if ($key_index == -5) {
								foreach ($def[23] as $chrg) {
									$ind = array_search($chrg[0], $keys) + 1;
									$data[$ind][1]++;
								}
							}
						}
					}
				}

				break;

			case 3:
				array_push($data[0], 'Average Defendants per Case');

				foreach ($cases as $case) {
					if ($key_index > 0) {
						if ($key_index == 2){
							$ind = array_search(split('-',$case[2])[0], $keys) + 1;
						} else if ($key_index == 7) {
							$ind = array_search($case[7], $keys) + 1;
						} else {
							$keyvals = array();
							for ($x=0; $x < sizeof($keys); $x++) { 
								array_push($keyvals, $x);
							}
							$ind = array_search($case[$key_index], $keyvals) + 1;
						}
						if ($data[$ind][1] != 0) {
							$in = intval(split(':', $data[$ind][1])[0]) + $case[6];
							$nm = intval(split(':', $data[$ind][1])[1]) + 1;
							$data[$ind][1] = $in . ":" . $nm;
						} else {
							$data[$ind][1] = $case[6] . ":1";
						}
					} else {
						if ($key_index == -4) {
							for ($i = 0; $i < 3; $i++) {
								if ($case[3+$i] == 1) {
									if ($data[$i+1][1] != 0) {
										$in = intval(split(':', $data[$i+1][1])[0]) + $case[6];
										$nm = intval(split(':', $data[$i+1][1])[1]) + 1;
										$data[$i+1][1] = $in . ":" . $nm;
									} else {
										$data[$i+1][1] = $case[6] . ":1";
									}
								}
							}
						} else if ($key_index == -5) {
							$index = 1;
							foreach ($s_arr as $stat) {
								$ins = 0;
								foreach ($case[20] as $def) {
									foreach ($def[23] as $chrg) {
										if (strcmp($chrg[0], $stat) == 0) {
											if ($data[$index][1] != 0) {
												$in = intval(split(':', $data[$index][1])[0]) + $case[6];
												$nm = intval(split(':', $data[$index][1])[1]) + 1;
												$data[$index][1] = $in . ":" . $nm;
											} else {
												$data[$index][1] = $case[6] . ":1";
											}
											$ins = 1;
										}
										if ($ins == 1) {
											break;
										}
									}
									if ($ins == 1) {
										break;
									}
								}
								if ($ins == 1) {
									break;
								}
								$index++;
							}
						}
					}
				}

				for ($i=1; $i < sizeof($data); $i++) {
					if ($data[$i][1] != 0) {
						$num_def = intval(split(':', $data[$i][1])[0]);
						$num_cases = intval(split(':', $data[$i][1])[1]);
						$data[$i][1] = $num_def / $num_cases;
					}
				}

				break;

			case 4:
				array_push($data[0], 'Total Months Sentenced');

				foreach ($cases as $case) {
					foreach ($case[20] as $def) {
						if ($key_index > 0) {
							if ($key_index == 2) {
								$ind = array_search(split('-',$case[2])[0], $keys) + 1;
							} else if ($key_index == 7) {
								$ind = array_search($case[7], $keys) + 1;
							} else {
								$keyvals = array();
								for ($x=0; $x < sizeof($keys); $x++) { 
									array_push($keyvals, $x);
								}
								$ind = array_search($case[$key_index], $keyvals) + 1;
							}
							$data[$ind][1] = $data[$ind][1] + $def[17];
						} else {
							if ($key_index == -2) {
								if ($def[3]) {
									$data[2][1] = $data[2][1] + $def[17];
								} else {
									$data[1][1] = $data[1][1] + $def[17];
								}
							} else if ($key_index == -3) {
								for ($i=0; $i < 5; $i++) { 
									if ($def[4] == $i) {
										$data[$i+1][1] = $data[$i+1][1] + $def[17];
										break;
									} else if ($def[4] >= 4) {
										$data[5][1] = $data[5][1] + $def[17];
									}
								}
							} else if ($key_index == -4) {
								for ($i = 0; $i < 3; $i++) {
									if ($case[3+$i] == 1) {
										$data[$i+1][1] = $data[$i+1][1] + $def[17];
									}
								}
							} else if ($key_index == -5) {
								foreach ($def[23] as $chrg) {
									$ind = array_search($chrg[0], $keys) + 1;
									$data[$ind][1] = $data[$ind][1] + $def[17];
								}
							}
						}
					}
				}

				break;

			case 5:
				array_push($data[0], 'Average Months Sentenced');
				break;

			case 6:
				array_push($data[0], 'Victims');
				break;

			case 7:
				array_push($data[0], 'Total Felony Charges');
				break;

			case 8:
				array_push($data[0], 'Total Felony Sentences');
				break;

			default:

				break;
		}

		// $options['hAxis']['title'] = $xAxisOptions[$xIndex-1];
		// $options['vAxis']['title'] = $yAxisOptions[$yIndex-1];

		
		return array($data, $options);
	}

	public function histogram($cs, $opts, $var) {
		
	}

	public function geo($cs, $opts) {
		$cases = $cs;
		$options = $opts;
		$data = array(array('State','Total Cases'));

		$states = array('AL','AK','AZ','AR','CA','CO','CT','DE',
						'FL','GA','HI','ID','IL','IN','IA','KS','KY',
						'LA','ME','MD','MA','MI','MN','MS','MO','MT',
						'NE','NV','NH','NJ','NM','NY','NC','ND','OH',
						'OK','OR','PA','RI','SC','SD','TN','TX','UT',
						'VT','VA','WA','WV','WI','WY');

		foreach ($states as $state) {
			array_push($data, array($state, 0));
		}

		foreach ($cases as $case) {
			$ind = array_search($case[7], $states) + 1;
			$data[$ind][1]++;
		}

		for ($i=50; $i > 0; $i--) { 
			if ($data[$i][1] == 0) {
				array_splice($data, $i, 1);
			}
		}

		return array($data,$options);

	}

	/**
	 * Used to sort the array for the legend.
	 *
	 * $a is first element
	 * $b is second element
	 * $x is the column to sort on
	 * $type is either 0 => not string, 1 => string
	 */
	protected function cmp($a, $b) {
		if ($isString) {
			return strcmp($a[$this->x], $b[$this->x]);
		} else {
			if ($a[$x] == $b[$x]) {
				return 0;
			}

			return ($a[$x] < $b[$x]) ? -1 : 1;
		}
	}
}