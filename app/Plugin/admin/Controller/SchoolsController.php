<?php
class SchoolsController extends AppController {
	public $uses = array('School');

	public function index() {
		//load all users
		$result = $this -> School -> getAllSchools();
		$this -> set('schools', $result);
	}

	public function add() {
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

			$data['map_img_url'] = $mapUrl;
			$data['logo_url'] = $logoUrl;
			$data['background_url'] = $backgroundUrl;
			$this -> School -> addSchool($data);
			$this -> redirect(array('action' => 'index'));
		}
	}

	public function edit($id = null) {
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

				if ($mapUrl != '')
					$data['map_img_url'] = $mapUrl;
				if ($logoUrl != '')
					$data['logo_url'] = $logoUrl;
				if ($backgroundUrl != '')
					$data['background_url'] = $backgroundUrl;
				unset($data['map_img_url_file']);
				unset($data['logo_url_file']);
				unset($data['background_url_file']);
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

}
