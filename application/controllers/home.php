<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
            $this->load->helper('cookie');
            $this->load->model('Home_model');
            
            $old_cookie = $this->readCookie(); 

            if(empty($old_cookie))
            {
                $data['unique_id'] = $this->createCookie();
                $this->Home_model->create_message($data);
            }

            $res = $this->Home_model->get_message($old_cookie);
            
            $result['message'] = $res;
            
            $this->load->view('static/header');
            $this->load->view('home', $result);
            $this->load->view('static/footer');
	}
        
        public function createCookie()
        {
            $days = time() + (86400 * 30 * 30);
                
            $name   = 'mynotepad';
            $value  = uniqid();
            $expire = intval($days);
           
            setcookie($name, $value, $expire , '/');
            
            return $value;
        }
        
        public function readCookie()
        {
            return $this->input->cookie('mynotepad', false);
        }
        
        public function save(){
          
            $data['content'] = $this->input->post('content');
            $data['unique_id'] = $this->readCookie();
            $data['updated_at'] = date("Y-m-d H:i:s");

            $this->load->model('Home_model');
            
            $this->Home_model->update_message($data);
        }
}
