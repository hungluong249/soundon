<?php
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
/**
 * 
 */
class Client extends AnotherClass
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function register_post()
	{
		$this->load->library('ion_auth');
	}
}