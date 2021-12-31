<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dashboard extends CI_Controller {

  public function __construct()
  {
		parent::__construct();
		is_login();
		$this->load->model('User_m');
		$this->load->library('template');
  }

	public function index()
	{
		$this->template->load_adm_template('admin/dashboard');
	}
}