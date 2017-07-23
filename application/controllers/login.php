<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('email_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('user_login') == 'true')
            redirect(base_url() . 'admin/dashboard', 'refresh');
        
        $this->load->view('admin/login');
    }

    //Ajax login function 
    function login_auth() {
        $response = array();

        //Recieving post input of email, password from ajax request
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];

        //Validating login
        $login_status = $this->validate_login($user_name, $password);
        $response['login_status'] = $login_status;

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login from ajax request
    function validate_login($user_name = '', $password = '') {
        $credential = array('user_name' => $user_name, 'user_password' => $password);
        
        // Checking login credential for admin
        $query = $this->db->get_where('user', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('user_login', 'true');
            $this->session->set_userdata('login_user_id', $row->user_id);
            $this->session->set_userdata('name', $row->user_name);
            $this->session->set_userdata('email', $row->user_email);
            return 'success';
        }
        
        return 'invalid';
    }

    /***RESET AND SEND PASSWORD TO REQUESTED EMAIL****/

    function forgot_pass() {

        $email = $this->input->post('email');
        $password = $this->input->post('fpassword');
        $result = $this->email_model->password_reset_email($email, $password); //SEND EMAIL ACCOUNT OPENING EMAIL
        if ($result == true)
        {
            $response['status'] = "mailsuccss";
        }
        if ($result == false)
        {
            $response['status'] = "mailfailed";
        }

        echo json_encode($response);
     
    }

    /*******LOGOUT FUNCTION *******/

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }

}
