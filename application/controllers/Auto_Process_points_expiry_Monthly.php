<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Auto_Process_points_expiry_Monthly extends CI_Controller 
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
			//-----------------------  Flow 1 : Aggregation of Points Gained
			$Trans_Records1 = $this->Auto_process_model->get_cust_gained_points_trans($Company_Records["Company_id"]);
			if($Trans_Records1 != NULL)
			{
				foreach($Trans_Records1 as $Cust_Record)
				{
					$Insertdata = array(
							'Company_id' => $Cust_Record["Company_id"],
							'Enrollement_id' => $Cust_Record["Enrollement_id"],
							'Card_id' => $Cust_Record["Card_id"],
							'Trans_type' => $Cust_Record["Trans_type"],
							'Bill_no' => $Cust_Record["Bill_no"],
							'Manual_Bill_no' => $Cust_Record["Manual_billno"],
							'Trans_date' => $Cust_Record["Trans_date"],
							'Total_purchase_amount' => $Cust_Record["Total_purchase_amount"],
							'Total_topup_amount' => $Cust_Record["Total_Topup_amount"],
							'Total_paid_amount' => $Cust_Record["Total_paid_amount"],
							'Total_Redeemed_points' => round($Cust_Record["Total_Redeemed_points"]),
							'Total_loyalty_pts' => round($Cust_Record["Total_loyalty_pts"]),
							'Create_date' => date('Y-m-d H:i:s')
						);
						
						$InsertSummary=$this->Auto_process_model->Insert_transaction_summary($Insertdata);
						$UpdateSummary=$this->Auto_process_model->Update_Cust_trans_summary($Cust_Record["Company_id"],$Cust_Record["Enrollement_id"],$Cust_Record["Bill_no"]);
						
					
				}
			}


			//----------------------- Flow 2 : Using Points Used UPDATING the Knock off Points.
		 	$RedeemSummary=$this->Auto_process_model->get_cust_redeem_points_trans_summary($Company_Records["Company_id"]);
			if($RedeemSummary != NULL)
			{
			
				foreach($RedeemSummary as $RedeemSummaryRec)
				{
					
					$Total_Redeemed_points = $RedeemSummaryRec['Total_Redeemed_points'];
					
					$Gained_Summary=$this->Auto_process_model->get_cust_gained_points_trans_summary($RedeemSummaryRec["Enrollement_id"]);
					if($Gained_Summary != NULL)
					{
						foreach($Gained_Summary as $Gained_SummaryRec)
						{
							if($Total_Redeemed_points > 0)
							{
								$diff = (($Gained_SummaryRec['Total_topup_amount']+$Gained_SummaryRec['Total_loyalty_pts'])-$Gained_SummaryRec['Knockout_points']);
								echo "<br><br>diff $diff     Total_Redeemed_points $Total_Redeemed_points ";
								
								if($diff < $Total_Redeemed_points)
								{
									
									$lv_knock_pts=$Gained_SummaryRec['Knockout_points']+$diff;
									$UpdateKnockout_points=$this->Auto_process_model->Update_Cust_Knockout_points_trans_summary($Gained_SummaryRec["Trans_summ_id"],$lv_knock_pts);
									
									$Total_Redeemed_points = $Total_Redeemed_points - $diff;
									
									
								}
								else
								{
									$lv_knock_pts=$Gained_SummaryRec['Knockout_points']+$Total_Redeemed_points;
									$UpdateKnockout_points=$this->Auto_process_model->Update_Cust_Knockout_points_trans_summary($Gained_SummaryRec["Trans_summ_id"],$lv_knock_pts);
									
									$Total_Redeemed_points =0;
								}	
							
							}
							
						}
						
					}
					$UpdateSummary=$this->Auto_process_model->Update_cust_Redeemed_picked_flag($RedeemSummaryRec["Trans_summ_id"]);
					
				}
			
			}			
			
			// die;
			//-------------------------Flow 3: Logic to Expire Points----------------------------------
			$Expiry_Summary=$this->Auto_process_model->get_cust_trans_summary_expiry_monthly($Company_Records["Company_id"]);
			// print_r($Expiry_Summary);
			// die; 
			if($Company_Records["Points_expiry_period"]!=0)
			{
				if($Expiry_Summary != NULL)
				{		
					foreach($Expiry_Summary as $Trans_Records)
					{
						/*   if($Trans_Records->Card_id != '7000000798')// Samual
						{
							continue;
						}   */
						echo "<br><b>Card_id  :".$Trans_Records->Card_id."</b>";
						
						$Full_name=$Trans_Records->First_name." ".$Trans_Records->Last_name;
						$Enrollement_id=$Trans_Records->Enrollement_id;
						$Company_id=$Company_Records["Company_id"];
						$Points_expiry_notification=$Company_Records["Points_expiry_notification"];
						// $Current_balance=$Trans_Records->Current_balance;
						// $Total_Current_balance=($Trans_Records->Current_balance-$Trans_Records->Blocked_points);
						
						$Expire_pts=($Trans_Records->Expire_pts) ;
						
						$Current_balance=$Trans_Records->Current_balance;
						$Total_Current_balance=($Trans_Records->Current_balance-$Trans_Records->Blocked_points);
						
						echo "<br><br><b>***************Inside**********************</b><br>*-*Expire_pts-->".$Expire_pts."*-*Card_id-->".$Trans_Records->Card_id."*-*First_name-->".$Trans_Records->First_name."-----Points_expiry_notification->".$Points_expiry_notification."*--*Total_Current_balance-->".$Total_Current_balance."<br><br>";
						
						//---------------------Points expiry Notification----------------------------------------
						if($Expire_pts>0 && $Total_Current_balance > 0) 
						{
							/******************Update Customer Balance*******************************/
								
								$Updated_Current_balance=($Trans_Records->Current_balance-$Expire_pts);
								$result2 = $this->Auto_process_model->Update_Customer_Balance($Enrollement_id,$Updated_Current_balance);
								
							/****************************************************************/
							/******************Insert in transaction*******************************/
								$result21 = $this->Auto_process_model->Insert_points_expiry_trans($Company_id,$Enrollement_id,$Expire_pts,$Trans_Records->Card_id);
								
							/****************************************************************/
							
							$Availabel_Current_balance=($Updated_Current_balance-$Trans_Records->Blocked_points);
							
							$Email_content = array(
								'Days' => 0,
								'Deduct_balance' => round($Expire_pts),
								'Availabel_Current_balance' => $Availabel_Current_balance,
								'Notification_type' => 'Notification: Expiry of Loyalty Points',
								'Template_type' => 'Points_Expiry'
							);
							echo "<br><br><h1>Expired Pts $Expire_pts</h1>";
							 $Notification=$this->send_notification->send_Notification_email($Enrollement_id,$Email_content,'1',$Company_id);
							
							
						}
							//------------------------------------------------------------------
				
					}
				}
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
								'Days' => $Points_expiry_notification,
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
	
