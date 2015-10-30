<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class myController extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
        function checklogin(){
            $uname=  $this->input->post('username');
            $email=  $this->input->post('email');
            $password=  $this->input->post('password');
            //replace your php script from databse to check for availability
            $valid = true;

            $users = array(
                'admin'         => 'admin@domain.com',
                'administrator' => 'administrator@domain.com',
                'root'          => 'root@domain.com',
            );

            if (isset($_POST['username']) && array_key_exists($_POST['username'], $users)) {
                $valid = false;
            } else if (isset($_POST['email'])) {
                $email = $_POST['email'][0];
                foreach ($users as $k => $v) {
                    if ($email == $v) {
                        $valid = false;
                        break;
                    }
                }
            }

            echo json_encode(array(
                'valid' => $valid,
            ));
            
        }
        function insertModal(){
            $data=array();
            $data['fname']=  $this->input->post('firstname');
            $data['lname']=  $this->input->post('lastname');
            $this->load->model('myModel');
            echo json_encode(array('valid' => $this->myModel->insertData($data) ));
            
        }
        function home()
        {
            $uname=  $this->input->post('username');
            $email=  $this->input->post('email');
            $password=  $this->input->post('password');
            $this->load->view('home');
        } 
}