<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Auto_Process_points_expiry_Monthly2 extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');		
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('Send_notification');
		$this->load->model('Auto_Process/Auto_process_model');
		$this->load->library('user_agent');
	}
	public function index()
	{
		if ($this->agent->is_browser())
		{
				$agent = $this->agent->browser().' '.$this->agent->version();
				echo $agent;
				die;
		}
		$Company_details = $this->Auto_process_model->FetchCompanyCronFlag($CronFlag='Cron_points_expiry_flag',$Flag=1);
		$Todays_date=date("m-d");
		
		foreach($Company_details as $Company_Records)
		{
			
			echo "<br><br><br><b>Company Name --->".$Company_Records["Company_name"]."<--->Points_expiry_period --->".$Company_Records["Points_expiry_period"]."</b>";
			
			  if($Company_Records["Company_id"] != '7')// JAVA LIVE
			{
				continue;
			}  
			
			
			//-------------------------Flow 4: Logic to be Expire Points----------------------------------
			$ExpiryTOBE_Summary=$this->Auto_process_model->get_cust_trans_summary_tobe_expiry_monthly($Company_Records["Company_id"]);
			if($ExpiryTOBE_Summary != NULL)
				{	
					$Points_expiry_notification=$Company_Records["Points_expiry_notification"];
					foreach($ExpiryTOBE_Summary as $Trans_Records2)
					{
							
						//-----------------Points expiry Reminder Notification-------------------
						if($Trans_Records2->TobeExpire_pts > 0 && $Points_expiry_notification > 0)
						{
							$Enrollement_id=$Trans_Records2->Enrollement_id;
							
							
							$Email_content = array(
								'Days' => 30,
								'Deduct_balance' => round($Trans_Records2->TobeExpire_pts),
								'Notification_type' => 'Notification: Expiry of Loyalty Points',
								'Template_type' => 'Points_Expiry'
							);
							
							$Notification=$this->send_notification->send_Notification_email($Enrollement_id,$Email_content,'1',$Company_Records["Company_id"]);
							
						}
					}
				}
	}
}
}	
?>
<style>

</style>
	
