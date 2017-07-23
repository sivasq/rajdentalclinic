<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function account_opening_email($account_type = '', $email = '') {
        $system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;

        $email_msg = "Welcome to " . $system_name . "<br />";
        $email_msg .= "Your account type : " . $account_type . "<br />";
        $email_msg .= "Your login password : " . $this->db->get_where($account_type, array('email' => $email))->row()->password . "<br />";
        $email_msg .= "Login Here : " . base_url() . "<br />";

        $email_sub = "Account opening email";
        $email_to = $email;

        $this->do_email($email_msg, $email_sub, $email_to);
    }

    function password_reset_email($email = '', $password ='') {
        
        $query = $this->db->get_where('user', array('user_email' => $email));
        
        if ($query->num_rows() > 0)
        {
           
           $name = $query->row()->user_name;

            $query_update = $this->db->where('user_email', $email)->update('user', array('user_password' => $password));

            $email_msg = "Hi " . $name . ",<br />";

            $email_msg .= "Your password Successfully Changed<br/>Your Changed Password is : " . $password . "<br />";

            $email_sub = "Password Changed";

            $email_to = $email;

            $result = $this->sendEmail($email_msg, $email_sub, $email_to);

            if($result)
            {
                return true;
            }
        }
        else
        {
            return false;
        }
    }

    /***custom email sender****/

    //send email to user's email id start//
    function sendEmail($message, $subject, $to_email)
    {
        $from_email = 'sqtesting2016@gmail.com';    

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'P@$$word@123'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes

        $this->load->library('email');

        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, 'Raj Dental Clinic');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $message = $message . "<br/><br/><br/><br/>Regrds<br/>Admin,<br/>Raj Dental Clinic<br/><br/>";
        $this->email->message($message);
        return $this->email->send();
    }
    //send email to user's email id end//

}