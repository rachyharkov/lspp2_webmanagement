<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Artikel extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('template');
    }

	public function index()
	{
		$this->home();
	}
	
}