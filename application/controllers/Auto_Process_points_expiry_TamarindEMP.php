<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Auto_Process_points_expiry_TamarindEMP extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');		
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Igain_model');
		// $this->load->library('Send_notification');
		// $this->load->model('Report/Report_model');
		$this->load->model('Auto_Process/Auto_process_model');
	}
	public function index()
	{
		$Company_details = $this->Igain_model->get_company_details($Company_id=6);
		$Todays_date=date("m-d");
	
			$Company_id=$Company_details->Company_id;
			echo "<br><br><br><b>Company Name --->".$Company_details->Company_name;
			
			
			
			$All_members=$this->Igain_model->get_all_customers($Company_id);
			
			// die;
				if($All_members != NULL)
				{		
					foreach($All_members as $All_members)
					{
						   if($All_members['Tier_id'] == '4')// 
						{
							continue;
						}  
						
						$Card_id=$All_members["Card_id"];
						$Enrollement_id=$All_members["Enrollement_id"];
						
						$Tier_Redeemtion_limit=$this->Auto_process_model->Get_Company_Tier_meal_topup($All_members['Tier_id'],$Company_id);		
						$TwoMonths_Redeemtion_limit=(2 * $Tier_Redeemtion_limit);
						
						echo "<br><b>Card ID :</b>".$All_members['Card_id']."       <b>Current_balance :</b>".$All_members['Current_balance']."       <b>Tier ID :</b>".$All_members['Tier_id']." <b>Redeemtion_limit :</b>".$Tier_Redeemtion_limit."</b> <b>TwoMonths_Redeemtion_limit :</b>".$TwoMonths_Redeemtion_limit."</b>";
						
						if($All_members['Current_balance'] > $TwoMonths_Redeemtion_limit)
						{
							$Expire_pts= ($All_members['Current_balance']- $TwoMonths_Redeemtion_limit);
							
							/******************Insert in transaction*******************************/
								$result21 = $this->Auto_process_model->Insert_points_expiry_trans($Company_id,$Enrollement_id,$Expire_pts,$Card_id);
								
							/******************Update Customer Balance*******************************/
								$Updated_Current_balance=($All_members['Current_balance']-$Expire_pts);
								$result2 = $this->Auto_process_model->Update_Customer_Balance($Enrollement_id,$Updated_Current_balance);	
								echo "<br><br><h1>Card_id $Card_id    Expired Pts $Expire_pts</h1>";
						}
						
						//die;
						
					}
				}
			
	
}
}	
?>
<style>

</style>
	
