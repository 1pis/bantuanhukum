<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        check_auth(); // check apakah sudah login
    }

    public function index(){

		$data['title'] = 'Managemen Pengguna';

		// Disable 
		$this->data['navbar'] = true;
		$this->data['sidebar'] = true;
		$this->data['footer'] = true;

    	render_page('admin/users/list', $this->data);

	}
}