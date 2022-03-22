<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct(){
		parent::__construct();
		check_auth(); // check apakah sudah login
	}

	public function index(){

		$data['title'] = 'Dashboard';

		// Disable 
		$this->data['navbar'] = true;
		$this->data['sidebar'] = true;
		$this->data['footer'] = true;

    	render_page('admin/dashboard/index', $this->data);

	}
}