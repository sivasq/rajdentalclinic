<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{	
		parent::__construct();
		$this->load->database();
		$this->load->model('admin_model');
        $this->load->library('session');
	}

//ridirect login or dashboard page =====================
	public function sign_upload()
	{
    	$this->load->library('upload');
	
    	if (isset($_FILES['sign']) && !empty($_FILES['sign']))
    	{
    		if (!is_dir('./uploads/')) {
			
				mkdir('./uploads/', 777, TRUE);
			
			}

    	    if ($_FILES['sign']['error'] != 4)
    	    {
    	         // Image file configurations
    	        $config['upload_path'] = './upload/';
    	        $config['allowed_types'] = 'jpg|jpeg|png|gif';
    	        $this->upload->initialize($config);
    	        //$this->upload->do_upload('sign');

    	        if (!$this->upload->do_upload('sign'))
					{
						//if files not uploaded
						$error = array('msg' => 'Error in uploading file');
						$json_error = json_encode($error);
						$this->response($json_error, REST_Controller::HTTP_OK);
						//echo $this->upload->display_errors();
						//echo $this->upload->file_name;
						//echo "not ok";
					}
					else
					{
					 
						echo "success";

					}

    	    }
    	}
	}



}

