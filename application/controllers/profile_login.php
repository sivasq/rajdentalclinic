<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_login extends CI_Controller {

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
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Ajax login function 
    function profile_login_auth() {
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
        $credential = array('user_name' => $user_name, 'profile_password' => $password);
        
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

}
