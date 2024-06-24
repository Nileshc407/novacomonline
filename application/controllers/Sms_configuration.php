<?php

Class Sms_configuration extends CI_Controller
{ 
	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Sms_Model/Sms_Model');	
		$this->load->model('Igain_model');
		$this->load->model('TierM/Tier_model');	
		$this->load->model('administration/Administration_model');
		$this->load->model('master/Game_model');
	}
	
	function sms_setting()
	{
		if($this->session->userdata('logged_in'))
		{	
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['enroll'] = $session_data['enroll'];	
			$data['userId']= $session_data['userId'];
			$data['Company_id']= $session_data['Company_id'];
			$Company_id = $session_data['Company_id'];
			$data['LogginUserName'] = $session_data['Full_name'];
			$Logged_user_enrollid = $session_data['enroll'];	
			$Logged_user_id = $session_data['userId'];
			
			/*-----------------------Pagination---------------------*/		
			$config = array();
			$config["base_url"] = base_url() . "/index.php/Sms_configuration/sms_setting";
			$total_row = $this->Sms_Model->sms_count();	
			$config["total_rows"] = $total_row;
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;        
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
			
			$data["sms_results"] = $this->Sms_Model->sms_list($config["per_page"], $page,$Company_id);
			$data["pagination"] = $this->pagination->create_links();
					
			/*-----------------------Pagination---------------------*/						
			
			$resultis = $this->Igain_model->get_company_details($session_data['Company_id']);
			$data["Company_details"] = $resultis;
			
			if($_POST == NULL)
			{
				$this->load->view('Sms_configuration/sms_configuration',$data);
			}
			else
			{
				
			
				$insert_result = $this->Sms_Model->insert_sms_configuration($Logged_user_id,$Company_id);
				
				if($insert_result == true)
				{
					$this->session->set_flashdata("success_code","SMS configuration created successfuly!!");
				}
				else
				{							
					$this->session->set_flashdata("error_code","Error In Inserting SMS configuration. Please Provide valid data!!");
				}
				
				
				redirect(current_url());
			}			
		}
		else
		{
			redirect('Login', 'refresh');
		}
	}
	public function delete_sms_notifiation()
	{
		if($this->session->userdata('logged_in'))
		{	
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['enroll'] = $session_data['enroll'];	
			$data['userId']= $session_data['userId'];
			$data['Company_id']= $session_data['Company_id'];
			$Company_id = $session_data['Company_id'];
			$data['LogginUserName'] = $session_data['Full_name'];
			$Logged_user_enrollid = $session_data['enroll'];	
			$Logged_user_id = $session_data['userId'];
			
			/*-----------------------Pagination---------------------*/		
			$config = array();
			$config["base_url"] = base_url() . "/index.php/Sms_configuration/sms_setting";
			$total_row = $this->Sms_Model->sms_count();	
			$config["total_rows"] = $total_row;
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;        
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
			
			$data["sms_results"] = $this->Sms_Model->sms_list($config["per_page"], $page,$Company_id);
			$data["pagination"] = $this->pagination->create_links();
					
			/*-----------------------Pagination---------------------*/						
			
			$resultis = $this->Igain_model->get_company_details($session_data['Company_id']);
			$data["Company_details"] = $resultis;
					
			/*-----------------------Pagination---------------------*/						
			
			$resultis = $this->Igain_model->get_company_details($session_data['Company_id']);
			$data["Company_details"] = $resultis;
			
			
			
			if($_GET == NULL)
			{
				//$this->session->set_flashdata("trigger_error_code","Error In Delte Trigger Notification. Please Provide valid data!!");
				
				$this->load->view('Sms_configuration/sms_configuration',$data);
			}
			else
			{			
				$SMS_configuration_id = $_GET['SMS_configuration_id'];
			
				$delete_result = $this->Sms_Model->delete_SMS_configuration($SMS_configuration_id,$Company_id);
				
				if($delete_result == true)
				{
					$this->session->set_flashdata("success_code","SMS configuration Deleted Successfuly!!");
				}
				else
				{							
					$this->session->set_flashdata("error_code","Error In Delete SMS configuration. Please Provide valid data!!");
				}
				
				
				redirect(current_url());
			}			
		}
		else
		{
			redirect('Login', 'refresh');
		}
	}
	
	function edit_sms_confoguration()
	{
		if($this->session->userdata('logged_in'))
		{	
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['enroll'] = $session_data['enroll'];	
			$data['userId']= $session_data['userId'];
			$data['Company_id']= $session_data['Company_id'];
			$Company_id = $session_data['Company_id'];
			$data['LogginUserName'] = $session_data['Full_name'];
			$Logged_user_enrollid = $session_data['enroll'];	
			$Logged_user_id = $session_data['userId'];
			
			/*-----------------------Pagination---------------------*/		
			$config = array();
			$config["base_url"] = base_url() . "/index.php/Sms_configuration/sms_setting";
			$total_row = $this->Sms_Model->sms_count();	
			$config["total_rows"] = $total_row;
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;        
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
			
			$data["sms_results"] = $this->Sms_Model->sms_list($config["per_page"], $page,$Company_id);
			$data["pagination"] = $this->pagination->create_links();
					
			/*-----------------------Pagination---------------------*/						
			
			$resultis = $this->Igain_model->get_company_details($session_data['Company_id']);
			$data["Company_details"] = $resultis;
					
			/*-----------------------Pagination---------------------*/						
			
			$resultis = $this->Igain_model->get_company_details($session_data['Company_id']);
			$data["Company_details"] = $resultis;
			
			if($_GET['SMS_configuration_id'] == NULL)
			{
				$this->load->view('Sms_configuration/sms_configuration',$data);
			}
			else
			{		
				$SMS_configuration_id = $_GET['SMS_configuration_id'];
					
				$SMS_configurationDetails = $this->Sms_Model->edit_SMS_configuration($SMS_configuration_id,$Company_id);
				
				$data["SMS_configuration"] = $SMS_configurationDetails;
				
				if($SMS_configurationDetails == true)
				{
					$this->load->view('Sms_configuration/edit_sms_configuration',$data);
				}
				else
				{							
					$this->session->set_flashdata("error_code","Error In Edit SMS configuration. Please Provide valid data!!");
					
					$this->load->view('Sms_configuration/sms_configuration',$data);
				}
				
			}			
		}
		else
		{
			redirect('Login', 'refresh');
		}
	}
	
	function update_sms_configuration()
	{
		if($this->session->userdata('logged_in'))
		{	
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['enroll'] = $session_data['enroll'];	
			$data['userId']= $session_data['userId'];
			$data['Company_id']= $session_data['Company_id'];
			$Company_id = $session_data['Company_id'];
			$data['LogginUserName'] = $session_data['Full_name'];
			$Logged_user_enrollid = $session_data['enroll'];	
			$Logged_user_id = $session_data['userId'];
			
			/*-----------------------Pagination---------------------*/		
			$config = array();
			$config["base_url"] = base_url() . "/index.php/Sms_configuration/sms_setting";
			$total_row = $this->Sms_Model->sms_count();	
			$config["total_rows"] = $total_row;
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;        
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
			
			$data["sms_results"] = $this->Sms_Model->sms_list($config["per_page"], $page,$Company_id);
			$data["pagination"] = $this->pagination->create_links();
					
			/*-----------------------Pagination---------------------*/						
			
			$resultis = $this->Igain_model->get_company_details($session_data['Company_id']);
			$data["Company_details"] = $resultis;
			
			
			
			if($_POST == NULL)
			{
				$this->load->view('Sms_configuration/sms_configuration',$data);
			}
			else
			{		
				$SMS_configuration_id = $this->input->post("SMS_configuration_id");
				$update_result = $this->Sms_Model->Update_SMS_configuration($Logged_user_id,$SMS_configuration_id,$Company_id);
				
				if($update_result == true)
				{
					$this->session->set_flashdata("success_code","SMS configuration Updated Successfuly!!");
				}
				else
				{							
					$this->session->set_flashdata("error_code","Error In Update SMS configuration. Please Provide valid data!!");
				}				
				redirect('Sms_configuration/sms_setting', 'refresh');
			}			
		}
		else
		{
			redirect('Login', 'refresh');
		}
	}
	public function activate_sms() 
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['enroll'] = $session_data['enroll'];	
			$data['userId']= $session_data['userId'];
			$data['Company_id']= $session_data['Company_id'];
			$Company_id = $session_data['Company_id'];
			$data['LogginUserName'] = $session_data['Full_name'];
			$Logged_user_enrollid = $session_data['enroll'];	
			$Logged_user_id = $session_data['userId'];
			
			/*-----------------------Pagination---------------------*/		
			$config = array();
			$config["base_url"] = base_url() . "/index.php/Sms_configuration/sms_setting";
			$total_row = $this->Sms_Model->sms_count();	
			$config["total_rows"] = $total_row;
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;        
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
			
			$data["sms_results"] = $this->Sms_Model->sms_list($config["per_page"], $page,$Company_id);
			$data["pagination"] = $this->pagination->create_links();
					
			/*-----------------------Pagination---------------------*/						
			
			$resultis = $this->Igain_model->get_company_details($session_data['Company_id']);
			$data["Company_details"] = $resultis;

		  $EnrollID = $session_data['enroll'];
		  // $CompID = $this->input->get("CompID");
		  $CompID = $Company_id;
		  $SMS_configuration_id = $this->input->get("SMS_configuration_id");
		 
		 
		 
			if($_GET == NULL)
			{
				$this->load->view('Sms_configuration/sms_configuration',$data);
			}
			else
			{
				
				$activate = $this->Sms_Model->activate_sms($EnrollID,$Company_id, $SMS_configuration_id);
				if ($activate == true) 
				{
					// $Result127 = array("Error_flag" => 1001);
					// $this->output->set_output(json_encode($Result127));			
					$this->session->set_flashdata("success_code","SMS Activated Successfully");
					/**********AMIT igain Log Table change 20-09-2021************** */
					$Todays_date = date('Y-m-d H:i:s');
					$get_cust_detail = $this->Igain_model->get_enrollment_details($EnrollID);
					$First_name = $get_cust_detail->First_name;
					$Last_name = $get_cust_detail->Last_name;
					$Card_id = $get_cust_detail->Card_id;
					$opration = 2;
					$userid = $userId;
					$what = "Activate SMS";
					$where = "Sms Configuration";
					$toname = "";
					$opval = "Activated '$SMS_configuration_id'";
					$firstName = $First_name;
					$lastName = $Last_name;

					$result_log_table = $this->Igain_model->Insert_log_table($Company_id, $data['enroll'], $data['username'], $data['LogginUserName'], $Todays_date, $what, $where, $userid, $opration, $opval, $firstName, $lastName, $EnrollID);

					/**************************************************************************** */
					redirect("Sms_configuration/sms_setting");
				}
				else 
				{
					$this->session->set_flashdata("error_code","SMS Could not Activated Successfully");
					redirect("Sms_configuration/sms_setting");
				}
			}
		
		
		
		}
		else
		{
			redirect('Login', 'refresh');
		}
		 
		
    }
	
	
}

?>
