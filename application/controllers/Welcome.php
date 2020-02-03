<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('file_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$input_file = APPPATH."../demo/input.txt";
		$this->data['chars'] = $this->file_model->load($input_file);
		$this->data['pattern'] = array(
			0,
			1,
			0,
			-1
		);
		$this->data['phasecount'] = 100;
		$this->data['page'] = 'day/16';
		$this->load->view('inc/template', $this->data);
	}
}
