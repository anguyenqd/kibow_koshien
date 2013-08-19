<?php
class SchoolsController extends AppController {
	public $uses = array('School', 'User');

	public function index() {
		//load all users
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}
		$result = $this -> School -> getAllSchoolsWithStatus();
		$this -> set('schools', $result);
	}

	public function add() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}
		if (!empty($this -> request -> data)) {
			$data = $this -> request -> data['School'];
			$mapUrl = '';
			if (!empty($data['map_img_url']['tmp_name']) && is_uploaded_file($data['map_img_url']['tmp_name'])) {
				// Strip path information
				$fileName = basename($data['map_img_url']['name']);
				move_uploaded_file($data['map_img_url']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
				$mapUrl = 'uploads' . DS . $fileName;
			}

			$logoUrl = '';

			if (!empty($data['logo_url']['tmp_name']) && is_uploaded_file($data['logo_url']['tmp_name'])) {
				// Strip path information
				$fileName = basename($data['logo_url']['name']);
				move_uploaded_file($data['logo_url']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
				$logoUrl = 'uploads' . DS . $fileName;
			}

			$backgroundUrl = '';

			if (!empty($data['background_url']['tmp_name']) && is_uploaded_file($data['background_url']['tmp_name'])) {
				// Strip path information
				$fileName = basename($data['background_url']['name']);
				move_uploaded_file($data['background_url']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
				$backgroundUrl = 'uploads' . DS . $fileName;
			}

			$resultImageUrl = '';

			if (!empty($data['result_img_url']['tmp_name']) && is_uploaded_file($data['result_img_url']['tmp_name'])) {
				// Strip path information
				$fileName = basename($data['result_img_url']['name']);
				move_uploaded_file($data['result_img_url']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
				$resultImageUrl = 'uploads' . DS . $fileName;
			}

			if ($data['odds_top8'] == null)
				$data['odds_top8'] = 0;
			if ($data['odds_top4'] == null)
				$data['odds_top4'] = 0;
			if ($data['odds_top1'] == null)
				$data['odds_top1'] = 0;

			$data['map_img_url'] = $mapUrl;
			$data['logo_url'] = $logoUrl;
			$data['background_url'] = $backgroundUrl;
			$data['result_img_url'] = $resultImageUrl;
			$data['school_status'] = 4;
			$this -> School -> addSchool($data);
			$this -> redirect(array('action' => 'index'));
		}
	}

	public function edit($id = null) {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}
		$id = isset($_GET['school_id']) ? $_GET['school_id'] : '';
		if ($id != '') {
			if (empty($this -> request -> data)) {
				$this -> request -> data = $this -> School -> getSchoolById($id);
			} else {

				$data = $this -> request -> data['School'];
				$mapUrl = '';
				if (!empty($data['map_img_url_file']['tmp_name']) && is_uploaded_file($data['map_img_url_file']['tmp_name'])) {
					// Strip path information
					$fileName = basename($data['map_img_url_file']['name']);
					move_uploaded_file($data['map_img_url_file']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
					$mapUrl = 'uploads' . DS . $fileName;
				}

				$logoUrl = '';

				if (!empty($data['logo_url_file']['tmp_name']) && is_uploaded_file($data['logo_url_file']['tmp_name'])) {
					// Strip path information
					$fileName = basename($data['logo_url_file']['name']);
					move_uploaded_file($data['logo_url_file']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
					$logoUrl = 'uploads' . DS . $fileName;
				}

				$backgroundUrl = '';

				if (!empty($data['background_url_file']['tmp_name']) && is_uploaded_file($data['background_url_file']['tmp_name'])) {
					// Strip path information
					$fileName = basename($data['background_url_file']['name']);
					move_uploaded_file($data['background_url_file']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
					$backgroundUrl = 'uploads' . DS . $fileName;
				}

				$resultImageUrl = '';

				if (!empty($data['result_img_url_file']['tmp_name']) && is_uploaded_file($data['result_img_url_file']['tmp_name'])) {
					// Strip path information
					$fileName = basename($data['result_img_url_file']['name']);
					move_uploaded_file($data['result_img_url_file']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
					$resultImageUrl = 'uploads' . DS . $fileName;
				}

				if ($mapUrl != '')
					$data['map_img_url'] = $mapUrl;
				if ($logoUrl != '')
					$data['logo_url'] = $logoUrl;
				if ($backgroundUrl != '')
					$data['background_url'] = $backgroundUrl;
				if ($resultImageUrl != '')
					$data['result_img_url'] = $resultImageUrl;

				unset($data['map_img_url_file']);
				unset($data['logo_url_file']);
				unset($data['background_url_file']);
				unset($data['result_img_url_file']);

				$this -> School -> updateSchool($id, $data);
				$this -> redirect(array('action' => 'index'));
			}
		}
	}

	public function delete() {
		$id = isset($_GET['school_id']) ? $_GET['school_id'] : '';
		$this -> School -> deleteSchool($id);
		$this -> redirect(array('action' => 'index'));
	}

	public function change_status($id = 0) {
		if ($id != 0) {
			//load status list
			if (empty($this -> request -> data)) {
				$statusList = $this -> School -> getStatusList();
				$status = array();
				foreach ($statusList as $s) {
					$status[$s['school_status']['status_id']] = $s['school_status']['status_name'];
				}
				$this -> set('status', $status);

				$this -> request -> data = $this -> School -> getSchoolStatusByID($id);
			} else {
				$data = $this -> request -> data;

				if ($data['School']['school_status'] != 4) {
					//Reflect user balance
					if ($data['School']['school_status'] != 5) {
						$bet_type = 0;
						if ($data['School']['school_status'] == 1) {
							$bet_type = 3;
						} else if ($data['School']['school_status'] == 2) {
							$bet_type = 2;
						} else if ($data['School']['school_status'] == 3) {
							$bet_type = 1;
						}

						//Get bet detail id list by bet type and school id
						$betDetailIDList = $this -> School -> getBetDetailIDListByBetTypeAndSchoolID($id, $bet_type);
						foreach ($betDetailIDList as $bet_id) {
							$this -> User -> updateUserBalanceByResult($bet_id['bet_details']['bet_detail_id'], 1);
						}

					} else {
						//update losed bet
						$betDetailIDList = $this -> School -> getBetDetailIDListBySchoolID($id);
						foreach ($betDetailIDList as $bet_id) {
							$this -> User -> updateBetStatusForLosed($bet_id['bet_details']['bet_detail_id'], 2);
						}
					}

				}

				$this -> School -> updateSchool($id, $data['School']);
				$this -> Session -> setFlash('Your change was success');
				$this -> redirect(array('action' => 'index'));
			}

		} else {
			$this -> Session -> setFlash('Your request is unsupported');
			$this -> redirect(array('action' => 'index'));
		}
	}

}
