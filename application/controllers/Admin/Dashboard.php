<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_auth(); // check apakah sudah login
	}

	public function index(){

		$data['title'] = 'Dashboard';

		render_page('admin/partials/_header');
    	render_page('admin/dashboard/index');
    	render_page('admin/partials/_footer');

	}
}