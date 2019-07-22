<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('admin_model');
		$this->load->library('session');

		//load pagination library
//		$this->load->library('Ajax_pagination');
		$this->load->library('pagination');
		//per page limit
		$this->perPage = 100;
	}

	//redirect login or dashboard page ================================
	public function index()
	{
		if ($this->session->userdata('user_login') != 'true')
			redirect(base_url() . 'login', 'refresh');
		if ($this->session->userdata('user_login') == 'true')
			redirect(base_url() . 'admin/dashboard', 'refresh');

	}

	//search drug names typeahead inteli search========================
	public function query()
	{
		$search = $this->input->get('query');

		$this->db->select('*');
		$this->db->from('drug_details');
		$this->db->like('drug_name', $search, 'both');
		$query = $this->db->get();
		$result = $query->result();

		echo json_encode($result);
	}

	//load dashboard page=============================================

	public function dashboard()
	{
		$today = date("d-m-Y");

		if (!isset($_GET['date'])) {
			redirect(base_url() . 'admin/dashboard/?date=' . $today, 'refresh');
		}else{
			$today = $_GET['date'];
			$today = str_replace('/', '-', $today);
		}

		if ($this->session->userdata('user_login') != 'true') {
			redirect(base_url() . 'login', 'refresh');
		}

		$this->page_data['today_data'] = $this->admin_model->get_today_report($today);
		$this->page_data['page_name'] = 'dashboard';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $this->page_data);
		$this->load->view('admin/dashboard', $this->page_data);
		$this->load->view('includes/footer');
	}

	//open new patient page
	public function new_patient()
	{
		//get last patient id
		$this->db->select_max('p_id_dummy');

		$result = $this->db->get('patient_details')->row_array();
		//init new id
		$new_id = "100";

		if ($result['p_id_dummy'] != '') {
			$last_id = preg_replace("/[^0-9]/", "", $result['p_id_dummy']);
			$new_id = $last_id + 1;
		}

		$page_data['p_id'] = 'RJ' . $new_id;
		$page_data['page_name'] = 'new_patient';
		$page_data['treat_types'] = $this->admin_model->get_treat_types();
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/new_patient', $page_data);
		$this->load->view('includes/footer');

	}

	//insert new patient info to db
	public function new_patient_create()
	{
		$p_id = $this->input->post('p_id');

		if ($this->input->post('med_history') != '') {

			$med_history = implode(', ', $this->input->post('med_history'));

		}

		//print_r($med_history);

		//$med_history1 = explode('|', $med_history);

		//print_r($med_history1);


		if ($this->admin_model->insert_patient_info()) {
			$response['status'] = 'success';
			$response['p_id'] = $p_id;
		} else {
			$response['status'] = 'failed';
		}

		//Replying ajax request with validation response
		echo json_encode($response);
	}

	//show patient details page
	public function patient_details($p_id)
	{
		/*if ($this->session->userdata('login') != 'true')
		{
            redirect(base_url() . 'login', 'refresh');
		}*/

		//$this->session->set_flashdata('message', 'patient_info_saved_successfuly');
		$this->session->flashdata('message');

		$page_data['patient_info'] = $this->admin_model->select_patient_info_by_patient_id($p_id);
		$page_data['treat_types'] = $this->admin_model->get_treat_types();
		$page_data['page_name'] = 'existing_patient';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/patient_details', $page_data);
		$this->load->view('admin/modal');
		$this->load->view('includes/footer');


	}

	//update patient info to db
	public function patient_update()
	{
		$p_id = $this->input->post('p_id');

		if ($this->input->post('fees') != '') {
			if ($this->admin_model->update_patient_info()) {
				$response['status'] = 'success';
				$response['p_id'] = $p_id;
			} else {
				$response['status'] = 'failed';
			}

		} else {
			if ($this->admin_model->update_patient()) {
				$response['status'] = 'success';
				$response['p_id'] = $p_id;
			} else {
				$response['status'] = 'failed';
			}
		}
		//Replying ajax request with validation response
		echo json_encode($response);

	}

	//open new patient prescription page
	public function add_new_prescription($p_id)
	{

		$page_data['patient_info'] = $this->admin_model->select_patient_info_by_patient_id($p_id);
		$page_data['treat_types'] = $this->admin_model->get_treat_types();

		//get last patient id
		$this->db->select_max('prescription_id');
		$result = $this->db->get('prescription_details')->row_array();
		//init new id
		$new_pres_id = 1;

		if ($result['prescription_id'] != '') {
			$last_pres_id = $result['prescription_id'];
			$new_pres_id = $last_pres_id + 1;
		}

		$page_data['pres_id'] = $new_pres_id;

		$this->load->view('admin/add_prescription', $page_data);

	}

	public function print_prescription($p_id, $pres_id)
	{

		$page_data['patient_info'] = $this->admin_model->select_patient_info_only($p_id);

		$page_data['case_history_info'] = $this->admin_model->select_case_history_info($pres_id);

		$page_data['pres_infos'] = $this->admin_model->select_pres_info($pres_id);

		$page_data['user_info'] = $this->admin_model->select_user_info();

		//print_r($pres_info);

		$this->load->view('admin/print_prescription', $page_data);


	}

	//insert prescription to db
	public function insert_new_prescription($p_id)
	{

		if ($this->admin_model->insert_new_prescription($p_id)) {
			$response['status'] = 'success';
			$response['pres_id'] = $this->input->post('prescription_id');
			$response['p_id'] = $p_id;
		} else {
			$response['status'] = 'failed';
		}
		//Replying ajax request with validation response
		echo json_encode($response);
	}

	//open case history page
	public function case_history($p_id)
	{
		/*if ($this->session->userdata('login') != 'true')
		{
            redirect(base_url() . 'login', 'refresh');
		}*/

		$page_data['patient_history'] = $this->admin_model->select_patient_info_by_patient_id($p_id);


		$page_data['page_name'] = 'existing_patient';

		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/case_history', $page_data);
		$this->load->view('includes/footer');
	}

	public function edit_case_history()
	{

		$result['status'] = $this->admin_model->update_case_history();

		echo json_encode($result);
	}

	//view all existing patient list with pagination
	public function existing_patient()
	{
//		$page_data['patient_info'] = $this->admin_model->select_exist_info();
		$data = array();

		if (isset($_GET['filter'])) {
			$filter_value = $_GET['filter'];
			$conditions['filterKey'] = $_GET['filterType'];
			if($_GET['filterType'] == 'id') {
				if (strpos($filter_value, 'rj') !== false) {
					$conditions['id'] = $filter_value;
				} else {
					$conditions['id'] = 'RJ' . $filter_value;
				}
			}else{
				$conditions['id'] = $filter_value;
			}
		}

		//get rows count
		$conditions['returnType'] = 'count';
		$totalRec = $this->admin_model->select_exist_info($conditions);

		//pagination config
		$config['base_url']    = base_url().'admin/existing_patient/';
		$config['uri_segment'] = 3;
		$config['total_rows']  = $totalRec;
		$config['per_page'] = $this->perPage;

		//styling
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<li class="pg-next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="pg-prev">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		//initialize pagination library
		$this->pagination->initialize($config);

		//define offset
		$page = $this->uri->segment(3);
		$offset = !$page?0:$page;

		//get rows
		//

		$conditions['returnType'] = '';
		$conditions['start'] = $offset;
		$conditions['limit'] = $this->perPage;
		$data['patient_info'] = $this->admin_model->select_exist_info($conditions);

		//load the list page view
		$data['page_name'] = 'existing_patient';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $data);
		$this->load->view('admin/existing_patient', $data);
		$this->load->view('includes/footer');
	}

	public function existing_patient1()
	{
		/*if ($this->session->userdata('login') != 'true')
		{
            redirect(base_url() . 'login', 'refresh');
		}*/

		$page_data['patient_info'] = $this->admin_model->select_exist_info();

		$page_data['page_name'] = 'existing_patient';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/existing_patient', $page_data);
		$this->load->view('includes/footer');
	}

	//view drugs list
	public function drugs()
	{
		/*if ($this->session->userdata('login') != 'true')
		{
            redirect(base_url() . 'login', 'refresh');
		}*/
		$page_data['drug_details'] = $this->admin_model->drug_details();

		$page_data['page_name'] = 'drugs';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/drugs');
		$this->load->view('admin/modal');
		$this->load->view('includes/footer');
	}

	public function help()
	{
		/*if ($this->session->userdata('login') != 'true')
		{
            redirect(base_url() . 'login', 'refresh');
		}*/
		//$page_data['drug_details'] = $this->admin_model->drug_details();

		$page_data['page_name'] = 'help';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/help');
		$this->load->view('includes/footer');
	}

	public function archive($p_id)
	{
		//$p_id = $this->input->post('p_id');

		if ($this->admin_model->archive($p_id)) {
			$response['status'] = 'success';
		} else {
			$response['status'] = 'failed';
		}

		//Replying ajax request with validation response
		echo json_encode($response);
	}

	//view drugs list
	public function treat_types()
	{
		/*if ($this->session->userdata('login') != 'true')
		{
            redirect(base_url() . 'login', 'refresh');
		}*/
		$page_data['treat_types'] = $this->admin_model->get_treat_types();

		$page_data['page_name'] = 'treat_type';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/treat_type');
		$this->load->view('admin/modal');
		$this->load->view('includes/footer');
	}

	//insert new drug 
	public function drug_create()
	{

		if ($this->admin_model->insert_drug_info()) {
			$response['status'] = 'success';
		} else {
			$response['status'] = 'failed';
		}

		//Replying ajax request with validation response
		echo json_encode($response);
	}

	//insert new drug 
	public function add_treat_type()
	{

		if ($this->admin_model->insert_treat_type()) {
			$response['status'] = 'success';
		} else {
			$response['status'] = 'failed';
		}

		//Replying ajax request with validation response
		echo json_encode($response);
	}

	//open new patient prescription page
	public function edit_drug($drug_id)
	{

		$page_data['drugs_info'] = $this->admin_model->select_drug_info_by_id($drug_id);

		$this->load->view('admin/drug_edit', $page_data);

	}

	public function edit_treat_type($id)
	{

		$page_data['treat_types_info'] = $this->admin_model->select_treat_type_by_id($id);

		$this->load->view('admin/treat_type_edit', $page_data);

	}

	//update patient info to db
	public function drug_update($drug_id)
	{

		if ($this->admin_model->drug_update($drug_id)) {
			$response['status'] = 'success';
		} else {
			$response['status'] = 'failed';
		}
		//Replying ajax request with validation response
		echo json_encode($response);

	}

	public function treat_type_update($id)
	{

		if ($this->admin_model->treat_type_update($id)) {
			$response['status'] = 'success';
		} else {
			$response['status'] = 'failed';
		}
		//Replying ajax request with validation response
		echo json_encode($response);

	}

	public function auth_profile()
	{

		//$page_data['profile_info'] = $this->admin_model->select_profile_info();

		$page_data['page_name'] = 'profile';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/profile_login');
		$this->load->view('includes/footer');
	}

	public function profile()
	{
		/*if ($this->session->userdata('login') != 'true')
		{
            redirect(base_url() . 'login', 'refresh');
		}*/

		$page_data['profile_info'] = $this->admin_model->select_profile_info();

		$page_data['page_name'] = 'profile';
		$this->load->view('includes/header');
		$this->load->view('includes/sidemenu', $page_data);
		$this->load->view('admin/profile');
		$this->load->view('includes/footer');
	}

	public function profile_update()
	{

		if ($this->admin_model->profile_update()) {
			$response['status'] = 'success';
		} else {
			$response['status'] = 'failed';
		}
		//Replying ajax request with validation response
		echo json_encode($response);
	}

	public function update_password()
	{

		if ($this->admin_model->update_password()) {
			$response['status'] = 'success';
		} else {
			$response['status'] = 'failed';
		}
		//Replying ajax request with validation response
		echo json_encode($response);
	}


	public function add_prescription()
	{
		/*if ($this->session->userdata('login') != 'true')
		{
            redirect(base_url() . 'login', 'refresh');
		}*/

		$this->load->view('admin/add_prescription');

	}


	public function sign_upload()
	{
		$this->load->library('upload');

		if (isset($_FILES['sign']) && !empty($_FILES['sign'])) {
			if (!is_dir('./uploads/')) {

				mkdir('./uploads/', 777, TRUE);

			}

			if ($_FILES['sign']['error'] != 4) {
				// Image file configurations
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('sign')) {
					$response['status'] = 'error';
				} else {

					if ($this->admin_model->sign_upload($this->upload->file_name)) {
						$response['status'] = 'success';
					} else {
						$response['status'] = 'error';
					}
				}
				echo json_encode($response);

			}
		}
	}


}

