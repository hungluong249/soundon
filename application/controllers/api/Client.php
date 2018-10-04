<?php
use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
/**
 * 
 */
class Client extends REST_Controller
{
	
	function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('ion_auth_model');
    }

	public function login_post()
	{
		$identity = $this->post('identity');
		$password = $this->post('password');
		if(!empty($identity) && !empty($password)){
			if ($this->ion_auth->login($identity, $password, false)) {
				$user = $this->ion_auth->user()->row();
				unset($user->password);
				$this->set_response(['data' => $user, 'message' => 'success'], REST_Controller::HTTP_OK);
            } else {
            	$this->set_response([
	                'data' => FALSE,
	                'message' => 'Login failed'
	            ], REST_Controller::HTTP_OK); // NOT_FOUND (204) being the HTTP response code
            }
		}
	}

	public function register_post()
	{
		$first_name = $this->post('first_name');
        $last_name = $this->post('last_name');
        $username = $this->post('username');
        $address = $this->post('address');
        $phone = $this->post('phone');
        $email = $this->post('email');
        $password = $this->post('password');

        $additional_data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'address' => $address,
        );
        $group = array('2');
        if (!$this->ion_auth->email_check($email)) {
        	if($user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group)){
	            $user = $this->ion_auth_model->user($user_id)->row();
				unset($user->password);
				$this->set_response(['data' => $user, 'message' => 'success'], REST_Controller::HTTP_OK);
	        }
	        else{
	            $this->set_response([
	                'data' => FALSE,
	                'message' => 'Register failed'
	            ], REST_Controller::HTTP_OK); // NOT_FOUND (204) being the HTTP response code
	        }
        }else{
        	$this->set_response([
	                'data' => FALSE,
	                'message' => 'Email already exists'
	            ], REST_Controller::HTTP_OK); // NOT_FOUND (204) being the HTTP response code
        }        
	}
	public function changeUser_post()
	{
		$array = $this->post();
		$id = $array['id'];
		$data = $array['client'];
		unset($data['email']);

		if($this->ion_auth->update($id, $data)){
            $user = $this->ion_auth_model->user($id)->row();
			unset($user->password);
			$message = 'success' . rand();
			$this->set_response(['data' => $user, 'message' => 'success'], REST_Controller::HTTP_OK);
        }
        else{
            $this->set_response([
                'data' => FALSE,
                'message' => 'Register failed'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (204) being the HTTP response code
        }
	}

	public function changePassword_post()
	{
		$array = $this->post();
		$identity = $array['identity'];
		$password_old = $array['data']['password_old'];
		$password_new = $array['data']['password_new'];
		if ($this->ion_auth->change_password($identity, $password_old, $password_new)) {
			$this->set_response(['data' => TRUE, 'message' => 'success'], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
                'data' => FALSE,
                'message' => 'Change password failed'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (204) being the HTTP response code
		}
	}
}
