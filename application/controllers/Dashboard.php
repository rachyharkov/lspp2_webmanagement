<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dashboard extends CI_Controller {

  public function __construct()
    {
		parent::__construct();
		$this->load->model('User_m');
    }

	public function index()
	{
		check_already_login();
		$this->load->view('admin/template');
	}

}