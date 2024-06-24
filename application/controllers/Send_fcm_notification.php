<?php
class Send_fcm_notification extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('login/Login_model');
		$this->load->model('Igain_model');
		$this->load->model('administration/Administration_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Send_notification');
		$this->load->model('enrollment/Enroll_model');
		$this->load->model('Segment/Segment_model');	
		$this->load->model('master/currency_model');
		$this->load->model('Report/Report_model');
		$this->load->model('Catalogue/Catelogue_model');
		$this->load->model('Coal_catalogue/Voucher_model');
		$this->load->library('m_pdf');
		$this->load->helper(array('form', 'url','encryption_val'));	
	}
	public function index() 
	{
		$enroll_id = $_REQUEST['id'];						
		$sellerid = 1024;						
		$Company_id = 7;
		$offer_id = 04;
		if($enroll_id !=Null)
		{
			$offer_communication_plan = "Test Message";
			$offer_details_description = "<p>Hallo, This is test notification from javahouse live server</p>";
			$offer_From_date = date("d-M-Y",strtotime("2022-11-07"));
			$offer_Till_date = date("d-M-Y",strtotime("2023-07-20"));
			
			$Email_content = array(
									'Communication_id' => $offer_id,
									'Offer' => $offer_communication_plan,
									'Start_date' => $offer_From_date,
									'End_date' => $offer_Till_date,
									'Offer_description' => $offer_details_description,
									'Template_type' => 'Communication'
								);	
								
			$send_notification = $this->send_notification->send_Notification_email($enroll_id,$Email_content,$sellerid,$Company_id);
		}
		else
		{
			echo "please provide customer id";
		}
	}	
}

?>