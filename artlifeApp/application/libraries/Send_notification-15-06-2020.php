<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_notification 
{
    public function __construct() 
    {
		$this->CI = &get_instance();
		$this->CI->load->model('Igain_model');
		$this->CI->load->library('cart');
		$this->CI->load->model('shopping/Shopping_model');
		$this->CI->load->helper(array('form', 'url','encryption_val'));
    }    
    public function send_Notification_email($Enrollment_id,$Email_content,$Seller_id,$Company_id)
    {
        $Template_type = $Email_content['Template_type'];
        $company_details = $this->CI->Igain_model->get_company_details($Company_id);
        $seller_details = $this->CI->Igain_model->get_enrollment_details($Seller_id);
        $customer_details = $this->CI->Igain_model->get_enrollment_details($Enrollment_id);
        $Member_website = $company_details->Cust_website;
        $Company_Currency = $company_details->Currency_name;
        $Date = date("Y-m-d");
        $Enrollement_id = $customer_details->Enrollement_id;
        
		
		
		
		$User_email_id = $customer_details->User_email_id;
		$User_email_id_cont = $customer_details->User_email_id;
		$User_pwd = $customer_details->User_pwd;
		$Phone_no = $customer_details->Phone_no;
		
		/* echo "<br>--User_email_id_cont--".$User_email_id_cont;		
		echo "<br>--User_email_id--".$User_email_id;	
		echo "<br>--User_pwd--".$User_pwd;	
		echo "<br>--Phone_no--".$Phone_no;	 */
		/*--------------Encripted & Decrypted------------------------------------------*/
		$User_email_id_cont = App_string_decrypt($User_email_id_cont); 
		$User_email_id = App_string_decrypt($User_email_id);
		$User_pwd = App_string_decrypt($User_pwd);
		$Phone_no = App_string_decrypt($Phone_no);
		
		/* echo "<br>--User_email_id_cont-decrypt-".$User_email_id_cont;		
		echo "<br>--User_email_id-decrypt-".$User_email_id;	
		echo "<br>--User_pwd-decrypt-".$User_pwd;
		echo "<br>--Phone_no-decrypt-".$Phone_no; */
		/*--------------Encripted & Decrypted------------------------------------------*/
		
		
		
		
		
		
		
		
        $customer_notification = false;
		$Cust_apk_link = $company_details->Cust_apk_link;
		$Cust_ios_link = $company_details->Cust_ios_link;                
		$Company_name = $company_details->Company_name;                
		$Base_url = base_url();	
		$Base_url2=$this->CI->config->item('base_url2');
		$Gooogle_Play=$Base_url2.'images/Gooogle_Play.png';
		$iOs_app_store=$Base_url2.'images/iOs_app_store.png';				
		$User_id = $customer_details->User_id;
		
		
		$pinno = $customer_details->pinno;
		$Membership_ID = $customer_details->Card_id;		
		$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;	
		$Communication_flag=$customer_details->Communication_flag;
		$Current_balance = $customer_details->Current_balance;
		$Blocked_points=$customer_details->Blocked_points;
		$Debit_points=$customer_details->Debit_points;
		
		$Current_point_balance = $Current_balance-($Blocked_points+$Debit_points);
		
		if($Current_point_balance<0)
		{
			$Current_point_balance=0;
		}
		else
		{
			$Current_point_balance=$Current_point_balance;
		}
		
		if($Template_type == "Joining_Bonus") {
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];			
			$Transaction_date = date("d M Y",strtotime($Email_content['Todays_date']));
			$subject = "Complimentary Bonus Points Issued ";		
						
			ob_start();			    
			include './application/libraries/Email_templates/Joining_Bonus.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$Merchant_name = $seller_details->First_name." ".$seller_details->Middle_name." ".$seller_details->Last_name;			
						
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Merchant_name','$Membership_ID','$Joining_bonus_points','$Transaction_date','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
				$inserts_contents = array($Customer_name,$Merchant_name,$customer_details->Card_id,$Email_content['Joining_bonus_points'],$Transaction_date,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			echo $html;
		}
		if($Template_type == "Enroll")
        {
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];			
			// $Transaction_date = date("d M Y",strtotime($Email_content['Todays_date']));
			// $subject = "Referral Bonus Issued from ".$company_details->Company_name;			
						
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$User_id = $customer_details->User_id;
			// $User_email_id = $customer_details->User_email_id;
			// $Phone_no = $customer_details->Phone_no;
			// $User_pwd = $customer_details->User_pwd;
			$pinno = $customer_details->pinno;
			$Membership_ID = $customer_details->Card_id;
			$Merchant_name = $seller_details->First_name." ".$seller_details->Middle_name." ".$seller_details->Last_name;			
						
			$subject = $Customer_name.", Welcome to ".$company_details->Company_name." ";		    
			include './application/libraries/Email_templates/Enroll.php';			
					
			$Pin_no_applicable=$company_details->Pin_no_applicable;
			
			$body = ob_get_contents();
			ob_end_clean();			
					
					
					
				/* $myData = array('Company_id' => $company_details->Company_id, 'Enroll_id' => $customer_details->Enrollement_id, 'User_email_id' => $customer_details->User_email_id);
				//var_dump($myData);
				$Pwddata = base64_encode(json_encode($myData));
				$Pwddata_URL = $Base_url2. "Set_password.php?Pwd_data=" . $Pwddata;
				$PwddataLink = "<a href='" . $Pwddata_URL . "' target='_blank' style='color:#000;'>Click here to Set Password</a>";
				//die; */
				
				$myData = array('Company_id' => $company_details->Company_id, 'Enroll_id' => $customer_details->Enrollement_id, 'User_email_id' => $User_email_id);
				// var_dump($myData);
				$Pwddata = base64_encode(json_encode($myData));
				$Pwddata_URL = $Base_url2. "artcaffe/index.php/Login/Setpassword?Pwd_data=" . $Pwddata;
				$PwddataLink = "<a href='" . $Pwddata_URL . "' target='_blank' style='color:#000;'>Click here to Set Password</a>";
				
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Merchant_name','$Membership_ID','$Enrolled_under','$User_email_id','$Phone_no','$User_pwd','$Pwdlink','$pinno','$Pin_no_applicable','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Merchant_name,$Membership_ID,$Email_content['Enrolled_under'],$User_email_id,$Phone_no,$User_pwd,$PwddataLink,$pinno,$Pin_no_applicable,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			// echo $html;
        }		
		if($Template_type == "Change_pin")
        {
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];			
			// $Transaction_date = date("d M Y",strtotime($Email_content['Todays_date']));
			// $subject = "Referral Bonus Issued from ".$company_details->Company_name;			
						
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$User_id = $customer_details->User_id;
			// $User_email_id = $customer_details->User_email_id;
			$Phone_no = $customer_details->Phone_no;
			$User_pwd = $customer_details->User_pwd;
			$pinno = $customer_details->pinno;
			$Membership_ID = $customer_details->Card_id;
			// $Merchant_name = $seller_details->First_name." ".$seller_details->Middle_name." ".$seller_details->Last_name;			
						
			$subject = "Your Request for Pin";		    
			include './application/libraries/Email_templates/Change_send_pin.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
					
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Membership_ID','$User_email_id','$Phone_no','$User_pwd','$pinno','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Membership_ID,$User_email_id,$Phone_no,$User_pwd,$pinno,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
        }
		if($Template_type == "Send_pin")
        {
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];			
			// $Transaction_date = date("d M Y",strtotime($Email_content['Todays_date']));
			// $subject = "Referral Bonus Issued from ".$company_details->Company_name;			
						
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$User_id = $customer_details->User_id;
			/* $User_email_id = $customer_details->User_email_id;
			$Phone_no = $customer_details->Phone_no;
			$User_pwd = $customer_details->User_pwd; */
			$pinno = $customer_details->pinno;
			$Membership_ID = $customer_details->Card_id;
			// $Merchant_name = $seller_details->First_name." ".$seller_details->Middle_name." ".$seller_details->Last_name;			
						
			$subject = "Your Request for Pin";		    
			include './application/libraries/Email_templates/Send_pin.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
					
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Membership_ID','$User_email_id','$Phone_no','$User_pwd','$pinno','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Membership_ID,$User_email_id,$Phone_no,$User_pwd,$pinno,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
        }
		if($Template_type == "Change_password")
        {
		
			// echo"----Email_content-----<br>";
			// var_dump($Email_content);
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];			
			// $Transaction_date = date("d M Y",strtotime($Email_content['Todays_date']));
			// $subject = "Referral Bonus Issued from ".$company_details->Company_name;			
			
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$User_id = $customer_details->User_id;
			/* $User_email_id = $customer_details->User_email_id;
			$Phone_no = $customer_details->Phone_no;
			$User_pwd = $customer_details->User_pwd; */
			$pinno = $customer_details->pinno;
			$Membership_ID = $customer_details->Card_id;
			// $Merchant_name = $seller_details->First_name." ".$seller_details->Middle_name." ".$seller_details->Last_name;			
						
			$subject = "Password Changed";		    
			include './application/libraries/Email_templates/Change_password.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
					
			$myData = array('Company_id' => $company_details->Company_id, 'Enroll_id' => $customer_details->Enrollement_id, 'User_email_id' => $User_email_id);
			// var_dump($myData);
			$Pwddata = base64_encode(json_encode($myData));
			$Pwddata_URL = $Base_url2. "artcaffe/index.php/Login/Setpassword?Pwd_data=" . $Pwddata;
			$PwddataLink = "<a href='" . $Pwddata_URL . "' target='_blank' style='color:#000;'>Click here to Set Password</a>";	
				
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Membership_ID','$User_email_id','$Phone_no','$User_pwd','$pinno','$Pwdlink','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Membership_ID,$User_email_id,$Phone_no,$User_pwd,$pinno,$PwddataLink,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			
        }
		if($Template_type == "Forgot_password")
        {
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];			
			
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$User_id = $customer_details->User_id;
			/* $User_email_id = $customer_details->User_email_id;
			$Phone_no = $customer_details->Phone_no;
			$User_pwd = $customer_details->User_pwd; */
			$pinno = $customer_details->pinno;
			$Membership_ID = $customer_details->Card_id;
						
			$subject = "Request to Set Password";		    
			include './application/libraries/Email_templates/Forgot_password.php';			
					
			$body = ob_get_contents();
			ob_end_clean();	
			
			$myData = array('Company_id' => $company_details->Company_id, 'Enroll_id' => $customer_details->Enrollement_id, 'User_email_id' => $User_email_id);
			// var_dump($myData);
			$Pwddata = base64_encode(json_encode($myData));
			$Pwddata_URL = $Base_url2. "artcaffe/index.php/Login/Setpassword?Pwd_data=" . $Pwddata;
			$PwddataLink = "<a href='" . $Pwddata_URL . "' target='_blank' style='color:#000;'>Click here to Set Password</a>";
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Membership_ID','$User_email_id','$Phone_no','$User_pwd','$pinno','$Pwdlink','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Membership_ID,$User_email_id,$Phone_no,$User_pwd,$pinno,$PwddataLink,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
		}
		if($Template_type == "Promo_code")
        {
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];			
			
			ob_start();	
						
			$subject = "Thank You for using Promo Code";	    
			include './application/libraries/Email_templates/Promo_code.php';			
					
			$body = ob_get_contents();
			ob_end_clean();	
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Promo_code','$PromocodePoints','$Current_balance','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
				$inserts_contents = array($Customer_name,$Email_content['Promo_code'],$Email_content['PromocodePoints'],$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
		}
		if($Template_type == "No_longer_bider")
        {
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];				
			ob_start();							
			$subject = "You are No Longer the Highest Bidder of ".$Email_content['Auction_name'].".";	    
			include './application/libraries/Email_templates/No_longer_bider.php';			
					
			$body = ob_get_contents();
			ob_end_clean();	
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Auction_name','$Min_Bid_Value','$Bid_value_1','$Current_balance','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
				$inserts_contents = array($Customer_name,$Email_content['Auction_name'],$Email_content['Min_Bid_Value'],round($Email_content['Bid_value_1']),$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
		}
        if($Template_type == "Purchase_miles")
        { 
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];	
			$From_company = $Email_content['From_company'];				
			$To_company = $Email_content['To_company'];	
			
			$From_member = $Email_content['From_member'];			
			$Get_points = $Email_content['Transferred_to_points'];			
			// $Notification_description = $Email_content['Notification_description'];				
			ob_start();							
			$subject =$Offer;	    
			include './application/libraries/Email_templates/Purchase_miles.php';			
					
			$body = ob_get_contents();
			ob_end_clean();	
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$From_publisher','$Purchased_miles','$Purchased_Currency','$Equivalent_joy_coins','$Status','$Trans_date','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');
				$inserts_contents = array($Customer_name,$Email_content['From_publisher'],$Email_content['Purchased_miles'],$Email_content['Purchased_Currency'],$Email_content['Equivalent_joy_coins'],$Email_content['Status'],$Email_content['Trans_date'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
            // echo $html;
        }
        if($Template_type == "Transfer_points")
        {
		   $Communication_id = 0;
		   $Offer = $Email_content['Notification_type'];    
		   // $Notification_description = $Email_content['Notification_description'];    
		   ob_start();       
		   $subject ="You have Transferred Points to '".$Email_content['Transferred_to']." ' ";     
		   include './application/libraries/Email_templates/Transfer_points.php';   
			 
		   $body = ob_get_contents();
		   ob_end_clean(); 
		   
		   /************************************Variable Replace Code******************************/
			$search_variables = array('$Customer_name','$Transferred_CardId','$Transferred_to','$Transferred_points','$Current_balance','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
			$inserts_contents = array($Customer_name,$Email_content['Transferred_CardId'],$Email_content['Transferred_to'],$Email_content['Transferred_points'],$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
			$html = str_replace($search_variables,$inserts_contents,$body);
		   /************************************Variable Replace Code******************************/
	}
	 if($Template_type == "From_transfer_miles")
        { 
            $Communication_id = 0;
            $Offer = $Email_content['Notification_type'];	
            $From_company = $Email_content['From_company'];				
            $To_company = $Email_content['To_company'];	

            $From_member = $Email_content['From_member'];			
            $Get_points = $Email_content['Transferred_to_points'];			
            $User_email_id = $Email_content['From_user_email_address'];	
            
            if($Email_content['Status']=="Pending")
            {
               $color="#ff5722";

            } else if($Email_content['Status']=="Approved"){

               $color="#4caf50";    
               
            } else {

               $color="#f12b2b";
            }  
                    
            
            ob_start();							
            $subject =$Offer;	    
            include './application/libraries/Email_templates/From_transfer_miles.php';			

            $body = ob_get_contents();
            ob_end_clean();	

            /************************************Variable Replace Code******************************/
                   
                    $search_variables = array('$Customer_name','$From_publisher','$Transfer_miles','$Purchased_Currency','$To_Beneficiary_Currency','$From_publisher','$To_publisher','$From_Beneficiary_name','$To_Beneficiary_name','$To_Equivalent','$From_beneficiary_id','$To_Beneficiary_id','$Status','$color','$Trans_date','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');
                    $inserts_contents = array($Email_content['From_Beneficiary_name'],$Email_content['From_publisher'],$Email_content['Transfer_miles'],$Email_content['Purchased_Currency'],$Email_content['To_Beneficiary_Currency'],$Email_content['From_publisher'],$Email_content['To_publisher'],$Email_content['From_Beneficiary_name'],$Email_content['To_Beneficiary_name'],$Email_content['To_Equivalent'],$Email_content['From_beneficiary_id'],$Email_content['To_Beneficiary_id'],$Email_content['Status'],$color,$Email_content['Trans_date'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
                    $html = str_replace($search_variables,$inserts_contents,$body);
            /************************************Variable Replace Code******************************/
            //echo $html;
        }
        if($Template_type == "To_transfer_miles")
        { 
            $Communication_id = 0;
            $Offer = $Email_content['Notification_type'];	
            $From_company = $Email_content['From_company'];				
            $To_company = $Email_content['To_company'];	

            $From_member = $Email_content['From_member'];			
            $Get_points = $Email_content['Transferred_to_points'];			
            $User_email_id = $Email_content['From_user_email_address'];	
            
            if($Email_content['Status']=="Pending")
            {
               $color="#ff5722";

            } else if($Email_content['Status']=="Approved"){

               $color="#4caf50";    
               
            } else {

               $color="#f12b2b";
            }  
                    
            
            ob_start();							
            $subject =$Offer;	    
            include './application/libraries/Email_templates/To_transfer_miles.php';			

            $body = ob_get_contents();
            ob_end_clean();	

            /************************************Variable Replace Code******************************/
                   
                    $search_variables = array('$Customer_name','$From_publisher','$Transfer_miles','$Purchased_Currency','$To_Beneficiary_Currency','$From_publisher','$To_publisher','$From_Beneficiary_name','$To_Beneficiary_name','$To_Equivalent','$From_beneficiary_id','$To_Beneficiary_id','$Status','$color','$Trans_date','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');
                    $inserts_contents = array($Email_content['To_Beneficiary_name'],$Email_content['From_publisher'],$Email_content['Transfer_miles'],$Email_content['Purchased_Currency'],$Email_content['To_Beneficiary_Currency'],$Email_content['From_publisher'],$Email_content['To_publisher'],$Email_content['From_Beneficiary_name'],$Email_content['To_Beneficiary_name'],$Email_content['To_Equivalent'],$Email_content['From_beneficiary_id'],$Email_content['To_Beneficiary_id'],$Email_content['Status'],$color,$Email_content['Trans_date'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
                    $html = str_replace($search_variables,$inserts_contents,$body);
            /************************************Variable Replace Code******************************/
            //echo $html;
        }
        if($Template_type == "Transfer_miles_facilition")
        { 
            $Communication_id = 0;
            $Offer = $Email_content['Notification_type'];	
            $From_company = $Email_content['From_company'];				
            $To_company = $Email_content['To_company'];	

            $From_member = $Email_content['From_member'];			
            $Get_points = $Email_content['Transferred_to_points'];			
            
            
            if($Email_content['Status']=="Pending")
            {
               $color="#ff5722";

            } else if($Email_content['Status']=="Approved"){

               $color="#4caf50";    
               
            } else {

               $color="#f12b2b";
            }  
                    
            
            ob_start();							
            $subject =$Offer;	    
            include './application/libraries/Email_templates/Transfer_miles_facilition.php';			

            $body = ob_get_contents();
            ob_end_clean();	

            /************************************Variable Replace Code******************************/
                   
                    $search_variables = array('$Customer_name','$From_publisher','$Transfer_miles','$Purchased_Currency','$To_Beneficiary_Currency','$From_publisher','$To_publisher','$From_Beneficiary_name','$To_Beneficiary_name','$To_Equivalent','$From_beneficiary_id','$To_Beneficiary_id','$Status','$color','$Trans_date','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');
                    $inserts_contents = array($Email_content['To_Beneficiary_name'],$Email_content['From_publisher'],$Email_content['Transfer_miles'],$Email_content['Purchased_Currency'],$Email_content['To_Beneficiary_Currency'],$Email_content['From_publisher'],$Email_content['To_publisher'],$Email_content['From_Beneficiary_name'],$Email_content['To_Beneficiary_name'],$Email_content['To_Equivalent'],$Email_content['From_beneficiary_id'],$Email_content['To_Beneficiary_id'],$Email_content['Status'],$color,$Email_content['Trans_date'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
                    $html = str_replace($search_variables,$inserts_contents,$body);
            /************************************Variable Replace Code******************************/
            //echo $html;
        }
        if($Template_type == "Publisher_new_account")
        { 
            $Communication_id = 0;
            $Offer = $Email_content['Notification_type'];	
            $From_company = $Email_content['From_company'];				
            $To_company = $Email_content['To_company'];	

            $From_member = $Email_content['From_member'];			
            $Get_points = $Email_content['Transferred_to_points'];			
            
            
            if($Email_content['Status']=="Active"){

               $color="#4caf50";    
               
            } else {

               $color="#ff5722";
            }  
                    
            
            ob_start();							
            $subject =$Offer;	    
            include './application/libraries/Email_templates/Publisher_new_account.php';			

            $body = ob_get_contents();
            ob_end_clean();	

            /************************************Variable Replace Code******************************/                   
                    $search_variables = array('$Customer_name','$From_publisher','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');
                    $inserts_contents = array($Customer_name,$Email_content['From_publisher'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
                    $html = str_replace($search_variables,$inserts_contents,$body);
            /************************************Variable Replace Code******************************/
            
        }


        if($Template_type == "Get_transfer_points_beneficiary")
        {
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];				
			$From_company = $Email_content['From_company'];				
			ob_start();							
			$subject = " You have Received Points from ".$Email_content['Received_from'];	    
			include './application/libraries/Email_templates/Get_transfer_points_beneficiary.php';			
					
			$body = ob_get_contents();
			ob_end_clean();	
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Received_points','$Received_from','$Current_balance','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$From_company','$Company_Currency');//
				$inserts_contents = array($Customer_name,$Email_content['Received_points'],$Email_content['Received_from'],$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$From_company,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
		}
        if($Template_type == "Get_transfer_points")
        {
		   $Communication_id = 0;
		   $Offer = $Email_content['Notification_type'];    
		   $From_company = $Email_content['From_company'];    
		   ob_start();       
		   $subject = " You have Received Points from ".$Email_content['Received_from'];     
		   include './application/libraries/Email_templates/Get_transfer_points.php';   
			 
		   $body = ob_get_contents();
		   ob_end_clean(); 
		   
		   /************************************Variable Replace Code******************************/
			$search_variables = array('$Customer_name','$Received_points','$Received_CardId','$Received_from','$Current_balance','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$From_company','$Company_Currency');//
			$inserts_contents = array($Customer_name,$Email_content['Received_points'],$Email_content['Received_CardId'],$Email_content['Received_from'],$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$From_company,$Company_Currency);
			$html = str_replace($search_variables,$inserts_contents,$body);
		   /************************************Variable Replace Code******************************/
		}
		if($Template_type == "Survey_rewards")
        {
			$Communication_id=0;
			$Offer = $Email_content['Notification_type'];			
			$subject = "Survey Bonus Points Issued";
			ob_start();								    
			include './application/libraries/Email_templates/Survey_rewards.php';			
					
			$body = ob_get_contents();
			ob_end_clean();	
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Survey_name','$SurveyRewardsPoints','$Current_balance','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
				$inserts_contents = array($Customer_name,$Email_content['Survey_name'],$Email_content['SurveyRewardsPoints'],$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
		}
		if($Template_type == "Contactus")
        {
			
			$Communication_id = 0;			
			if($Email_content['Notification_type']=='1')
			{
				$Email_content['Notification_type']='Feedback';
			}
			else if($Email_content['Notification_type']=='2')
			{
				$Email_content['Notification_type']='Request';
			}
			else
			{
				$Email_content['Notification_type']='Suggestion';
			}
			$Offer = $Email_content['Notification_type'];
			$subject = " New Message from ".$Customer_name;				
			ob_start();								    
			include './application/libraries/Email_templates/Contactus.php';			
					
			$body = ob_get_contents();
			ob_end_clean();	
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Company_primary_contact_person','$Offer','$Notification_description','$Membership_ID','$Phone_no','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$company_details->Company_primary_contact_person,$Offer,$Email_content['Notification_description'],$Membership_ID,$Phone_no,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
		}
		if($Template_type == "Contactus_feedback")
        {
			
			$Communication_id = 0;			
			if($Email_content['Notification_type']=='1')
			{
				$Email_content['Notification_type']='Feedback';
			}
			else if($Email_content['Notification_type']=='2')
			{
				$Email_content['Notification_type']='Request';
			}
			else
			{
				$Email_content['Notification_type']='Suggestion';
			}
			$Offer = $Email_content['Notification_type'];
			$subject = 'Thank You for your Feedback';			
			ob_start();								    
			include './application/libraries/Email_templates/Contactus_feedback.php';			
					
			$body = ob_get_contents();
			ob_end_clean();	
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Company_primary_contact_person','$Offer','$Notification_description','$Membership_ID','$Phone_no','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$company_details->Company_primary_contact_person,$Offer,$Email_content['Notification_description'],$Membership_ID,$Phone_no,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/			
		}
		if($Template_type == "Freebies" || $Template_type == "Enroll_Freebies")//Delhi
        {
			$Communication_id = $Email_content["Company_merchandize_item_code"];
			 // echo"----Freebies-----<br>";
			$Offer = $Email_content['Notification_type'];
			$Transaction_date = date("d M Y",strtotime($Email_content['Todays_date']));
			$subject = "Congratulations !!! You have recieved free voucher";
			
			// $Item_image= $Base_url.'Merchandize_images/original/'.$Email_content["Item_image"];
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
					
						
			// $subject = $Customer_name.", Welcome to ".$company_details->Company_name." Loyalty Program";		    
			include './application/libraries/Email_templates/Freebies.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
					
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Merchandize_item_name','$Voucher_no','$Voucher_status','$Transaction_date','$Item_image','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Email_content["Merchandize_item_name"],$Email_content["Voucher_no"],$Email_content["Voucher_status"],$Transaction_date,$Email_content["Item_image"],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			
        }
		if($Template_type == "Profile_completion_bonus")//Profile_completion_bonus
        {
			$Communication_id = 0;
			 // echo"----Freebies-----<br>";
			$Offer = $Email_content['Notification_type'];
			$Transaction_date = date("d M Y",strtotime($Email_content['Todays_date']));
			$subject = "Congratulations !!! You have extra reward points";
			
			// $Item_image= $Base_url.'Merchandize_images/original/'.$Email_content["Item_image"];
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
					
						
			// $subject = $Customer_name.", Welcome to ".$company_details->Company_name." Loyalty Program";		    
			include './application/libraries/Email_templates/Profile_completion_bonus.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
					
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Profile_bonus','$Current_balance','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
				$inserts_contents = array($Customer_name,$Email_content["Profile_bonus"],$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			// echo $html;
			
        }
		if($Template_type == "App_login_reward")//App_login_reward
        {
			$Communication_id = 0;
			 // echo"----App_login_reward-----<br>";
			$Offer = $Email_content['Notification_type'];
			$Transaction_date = date("d M Y",strtotime($Email_content['Todays_date']));
			$subject = "Congratulations !!! You have extra reward points";	
			
			// $Item_image= $Base_url.'Merchandize_images/original/'.$Email_content["Item_image"];
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
					
						
			// $subject = $Customer_name.", Welcome to ".$company_details->Company_name." Loyalty Program";		    
			include './application/libraries/Email_templates/App_login_reward.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
					
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Login_bonus','$Current_balance','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
				$inserts_contents = array($Customer_name,$Email_content["Login_bonus"],$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			// echo $html;
			
        }
		/*----------------------------Shopping Order Confirmation Email---------------------------*/
		if($Template_type == "Shopping_order_confirm")
		{ 
			// var_dump($Email_content['Order_details2']);
			$Communication_id = 0;;
			$Offer = $Email_content['Notification_type'];
			
			$subject = "Your Order confirmation for #".$Email_content['Order_no'];		
			$html = '<html xmlns="http://www.w3.org/1999/xhtml">';
			$html .= '<body yahoo bgcolor="#f6f8f1" style="margin: 0; padding: 0; min-width: 100%!important;">';		
			$html .= '<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0"><tr><td>';		
			$html .= '<table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px;">';
			$html .= '<tr>
						<td class="innerpadding borderbottom" style="padding: 0;border-bottom: 1px solid #f2eeed;">
						  <img class="fix" src="'.$this->CI->config->item('base_url2').'images/email_banner2.png" width="100%" border="0" alt="" />
						</td>
					  </tr>';
			$html .= '<tr><td class="innerpadding borderbottom" style="padding: 30px 30px 30px 30px;border-bottom: 1px solid #f2eeed;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>
							<td class="h2" style="padding: 0 0 15px 0; font-size: 18px; line-height: 28px; font-weight: bold;color: #153643; font-family: Tahoma;">
								Dear  '.$customer_details->First_name.' '.$customer_details->Last_name.',
							</td></tr>
							<tr><td class="bodycopy" style="color: #153643; font-family: Tahoma;font-size: 12px; line-height: 22px;">
								Thank you for shopping. <br>
								Your Order No is : <b style="text-transform: uppercase;">#'.$Email_content['Order_no'].'</b>.<br>
								Received on: <b>'.$Email_content['Order_date'].'</b>
								<hr />
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 12px; line-height: 22px;">';
					
					$sub_total = 0;
					foreach($Email_content['Order_details'] as $Order_details)
					{
						$sub_total = $sub_total + ($Order_details['Quantity'] * $Order_details['Unit_price']);
						
						$html .= '<tr>
									<td style="text-align: center;border-left:1px solid #153643;border-top:1px solid #153643;border-bottom:1px solid #153643;padding: 5px;">
										<img class="fix" src="'.$Order_details['Thumbnail_image1'].'" style="width: 35%; margin: 0px auto;" />
									</td>
									<td style="border-right:1px solid #153643;border-top:1px solid #153643;border-bottom:1px solid #153643;padding: 5px;">
										<p><b>'.$Order_details['Merchandize_item_name'].'<b></p>
										<p><b>Quantity : </b>'.$Order_details['Quantity'].'</p>
										<p><b>Price : </b>'.$Email_content['Symbol_of_currency'].' '.$Order_details['Unit_price'].'</p>
									</td>
								</tr>
								<tr><td colspan="2">&nbsp;</td></tr>';
					}
					
								$html .= '</table>
								
								<hr />
								
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 12px; line-height: 22px;">
								<caption>
									<h3 style="text-align: left; text-decoration: underline;">Delivery Details</h3>
								</caption>
								<tr>
									<td><b>Address : </b></td>
									<td>
										<p>'.$Email_content['Order_details2']->Cust_address.'</p>
									</td>
								</tr>
								<tr>
									<td><b>Mobile Number : </b></td>
									<td>
										<p>'.$Email_content['Order_details2']->Cust_phnno.'</p>
									</td>
								</tr>
								
								</table>
								
								<hr />
								
								<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 12px; line-height: 22px;">
								<caption>
									<h3 style="text-align: left; text-decoration: underline;">Billing Details</h3>
								</caption>
								<tr>
									<td><b>Order subtotal : </b></td>
									<td>
										<p><b>'.$Email_content['Symbol_of_currency'].' '.$sub_total.'</b></p>
									</td>
								</tr>
								<tr>
									<td><b>Delivery and handling : </b></td>
									<td>
										<p><b>'.$Email_content['Symbol_of_currency'].' '.$Email_content['Order_details2']->Shipping_cost.'</b></p>
									</td>
								</tr>
								<tr>
									<td><b>Total : </b></td>
									<td>
										<p><b>'.$Email_content['Symbol_of_currency'].' '.$Email_content['Order_details2']->Purchase_amount.'</b></p>
									</td>
								</tr>
								
								</table>
								
							</td></tr>
						</table></td></tr>';
						
			$html .= '<tr><td class="innerpadding bodycopy" style="padding: 30px 30px 30px 30px;color: #153643; font-family: Tahoma;font-size: 10px; line-height: 18px;">
						<strong>DISCLAIMER:</strong> This e-mail message is proprietary to '.$company_details->Company_name.' 
						and is intended solely for the use of the entity to whom it is addressed. It may contain privileged or 
						confidential information exempt from disclosure as per applicable law. 
						If you are not the intended recipient 
						or responsible for delivery to the intended recipient,
						you may not copy, deliver, distribute or print this message. The message and its 
						contents have been virus checked.
						but the recipients may conduct their own. '.$company_details->Company_name.' will not accept any claims
						for damages arising out of viruses.<br>
						Thank you for your cooperation.</td></tr>';		
			$html .= '<tr><td class="footer" bgcolor="#44525f" style="padding: 20px 30px 15px 30px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr><td align="center" class="footercopy" style="font-family: Tahoma; font-size: 14px; color: #ffffff;">
								You can also visit the below link using your login credentials and check details.
							</td></tr>
							<tr><td align="center" class="footercopy" style="font-family: Tahoma; font-size: 14px; color: #ffffff;">
								<a href="'.$Company_website.'" target="_blank" style="color: #ffffff; text-decoration: underline;">
									Customer Website Link
								</a>
							</td></tr>';
					
				if( $company_details->Cust_apk_link != "" || $company_details->Cust_ios_link != "")
				{
					$html .= '<tr><td align="center" class="footercopy" style="font-family: Tahoma; font-size: 14px; color: #ffffff;">
								You can also download Android & iOS App
							</td></tr>
							<tr><td align="center" style="padding: 20px 0 0 0;">
								<table border="0" cellspacing="0" cellpadding="0"><tr>';
									
								if($company_details->Cust_apk_link != "")
								{
									$html .= '<td width="37" style="text-align: center; padding: 0 10px 0 10px;">
										<a href="'.$company_details->Cust_apk_link.'" target="_blank" style="color: #ffffff; text-decoration: underline;">
											<img src="'.$this->CI->config->item('base_url2').'images/Gooogle_Play.png" width="37" height="37" alt="Facebook" border="0" />
										</a>
									</td>';
								}
								
								if($company_details->Cust_ios_link != "")
								{
									$html .= '<td width="37" style="text-align: center; padding: 0 10px 0 10px;">
										<a href="'.$company_details->Cust_ios_link.'" target="_blank" style="color: #ffffff; text-decoration: underline;">
											<img src="'.$this->CI->config->item('base_url2').'images/iOs_app_store.png" width="37" height="37" alt="Twitter" border="0" />
										</a>
									</td>';
								}	
							
								$html .= '</tr>
								</table></td></tr>';
				}
						
			$html .= '</table></td></tr>';		
			$html .= '</table></td></tr></table></body></html>';
		}
		/*----------------------------Shopping Order Confirmation Email---------------------------*/             
                
                
		/*----------------------------Shopping Order Confirmation Email---------------------------*/
	if($Template_type == "Purchase_order")
    { 
                    $Communication_id = 0;
                    $Offer = $Email_content['Notification_type'];
                    $Transaction_date = $Email_content['Transaction_date'];
                    $Symbol_of_currency = $Email_content['Symbol_of_currency'];
                    $Orderno = $Email_content['Orderno'];
                    $Voucher_array = $Email_content['Voucher_array'];
                    $Voucher_status1 = $Email_content['Voucher_status'];
                    $Standard_charges = $Email_content['Standard_charges'];
                    $Company_Redemptionratio = $Email_content['Company_Redemptionratio'];
                    $Cost_Threshold_Limit = $Email_content['Cost_Threshold_Limit'];
                    $To_Country = $Email_content['To_Country'];
                    $To_State = $Email_content['To_State'];
                    $Shipping_charges_flag = $Email_content['Shipping_charges_flag'];
                    $Total_discount = $Email_content['Total_discount'];
					

					
                    if($Voucher_status1 == 18)
                    {
                        $Voucher_status = "Ordered";
                    }
                    $Cust_wish_redeem_point = $Email_content['Cust_wish_redeem_point'];
                    if($Cust_wish_redeem_point=="")
                    {
                        $Cust_wish_redeem_point=0;
                    }
                    $EquiRedeem = $Email_content['EquiRedeem'];
                    $grand_total = $Email_content['grand_total'];
                    $subtotal = $Email_content['subtotal'];
                    $total_loyalty_points = $Email_content['total_loyalty_points'];
                    $Update_Current_balance = $Email_content['Update_Current_balance'];
                    $Blocked_points = $Email_content['Blocked_points'];
                   
					
					$delivery_type = $Email_content['delivery_type'];
                    $delivery_outlet = $Email_content['delivery_outlet'];
                    $Address_type = $Email_content['Address_type'];
					$mpesa_BillAmount = $Email_content['mpesa_BillAmount'];
					$DiscountAmt = $Email_content['DiscountAmt'];
					$VoucherDiscountAmt = $Email_content['VoucherDiscountAmt'];
					
					$POS_Bill_No = $Email_content['POS_Bill_No'];
					 
					$delivery_outlet_details = $this->CI->Igain_model->get_enrollment_details($delivery_outlet);
					$customer_delivery_details=$this->CI->Igain_model->Fetch_customer_addresses($Enrollment_id,$Address_type);
					
					$Outlet_Name = $delivery_outlet_details->First_name.' '.$delivery_outlet_details->Last_name;
					
					
					if($delivery_type==29){
						$deliveryType="Delivery";
					} elseif($delivery_type==28) {
						$deliveryType="Pick-Up";
					} elseif($delivery_type==107){
						$deliveryType="In-Store";
					}
					
					$vouchers = "";
				
					if(count($Voucher_array) > 0)
					{
						$vouchers = implode(",",$Voucher_array);
					}
					
					
					if($mpesa_BillAmount){
						$mpesa_BillAmount=$mpesa_BillAmount;
					} else {
						$mpesa_BillAmount='0.00';
					}
					
					
                    $banner_image = $this->CI->config->item('base_url2').'images/transaction.png';	
                    // $subject = "Purchase Order of our ".$company_details->Company_name ;
                    $subject =$Offer;
					
					
					$html ='<!doctype html>
								<html lang="">
								<head>
									<!-- Required meta tags -->
									<meta charset="UTF-8">
									<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
									<meta http-equiv="X-UA-Compatible" content="IE=edge">
									<title>Art Caffe | Online Purchase</title>
									<!-- Bootstrap CSS -->
									<link rel="stylesheet" href="'.$Base_url.'assets/css/bootstrap.min.css">
									<!-- Font Awesome CSS -->
									<link rel="stylesheet" type="text/css" href="'.$Base_url.'assets/fonts/font-awesome/css/font-awesome.min.css">
									<!-- Fonts CSS -->
									<link rel="stylesheet" href="'.$Base_url.'assets/fonts/font.css">
									<!-- Custome CSS -->
									<link rel="stylesheet" href="'.$Base_url.'assets/css/style.css">
									<!-- Responsive CSS -->
									<link rel="stylesheet" href="'.$Base_url.'assets/css/responsive.css">
								</head>
								<body style="background-image:url("'.$Base_url.'assets/img/statement-bg.jpg")">
									
										
										<div class="custom-body">
											<div class="box purchuase-box">
												<h2>Online Purchase</h2>
												<hr class="hr-space"/>
												<p><b>Dear '.$customer_details->First_name.' '.$customer_details->Last_name.',</b></p>
												<p>Thank you for placing your order online.</p>
												<hr class="hr-space"/>
												<p><b>Date:</b> '.$Transaction_date. '</p>
												<p><b>Order Type:</b> '.$deliveryType. '</p>
												<p><b>Outlet:</b> '.$Outlet_Name. '</p>
												<p><b>Order No:</b> '.$Orderno. '</p>';
												if($POS_Bill_No != "") {

													$html.='<p><b>Bill No:</b> '.$POS_Bill_No. '</p>';
												}
												$html.='
												<hr class="hr-space"/>
												<h2 class="o_total"><b>Order Total:</b> '.$Symbol_of_currency.' '.number_format($_SESSION["Total_Shipping_Cost"]+$subtotal,2).'</h2>';
												
												if($total_loyalty_points != 0 && $company_details->Loyalty_enabled ==1 )
												{
													$html.='<h3>'.$Company_Currency.' Earned: <span class="text-green">'.$total_loyalty_points.'</span></h3>';
												}
												
											$html.='</div>
											<div class="cart-box">';
												$i=1;		
												if ($cart = $this->CI->cart->contents())
												{
													
													foreach ($cart as $item)
													{
														
														
														$item_id = $item['id'];
														$result = $this->CI->Shopping_model->Get_merchandize_item($item_id,$Company_id);
														$Merchandize_item_name = $result->Merchandize_item_name;
														// $Purchase_amount=$item['qty'] * $item['price'];
														$Purchase_amount=$item['subtotal'];
														// $Purchase_amount=$item['qty'] * $item['subtotal'];
														
														$Balance_to_pay = round($grand_total * $Purchase_amount ) / $subtotal;
														$Unit_price =  $item['price'];

															if($item['options']['Item_size'] == 1)
															{
																$size = "Small";
															}
															elseif($item['options']['Item_size'] == 2)
															{	
																$size = "Medium";
															}
															elseif($item['options']['Item_size'] == 3)
															{
																$size = "Large";
															}
															elseif($item['options']['Item_size'] == 4)
															{
																$size = "Extra Large";
															}
															else
															{
																$size = "-";
															}
															/********Calculate Weighted Delivery Cost AMIT 12-12-2017************/
															$Partner_state=$item["options"]["Partner_state"];
															   $Partner_Country_id=$item["options"]["Partner_Country_id"];

															   // if($item["options"]["Redemption_method"]==29)
															   if($To_State == $delivery_outlet_details->State)
															   {
																	$Exist_Delivery_method=1;
																	$Weight_in_KG=0;
																	$Weight=0;
																	foreach($cart as $rec) 
																	{
																		// echo '<br>if('.$rec["options"]["Partner_state"].'=='.$Partner_state.')';

																	   // if(($rec["options"]["Partner_state"]==$Partner_state) && ($rec["options"]["Redemption_method"]==29))
																	  if($To_State == $delivery_outlet_details->State)
																	   {

																			//echo "<br><br><b>Item Weight </b>".$rec["options"]["Item_Weight"]."<b>  Quantity </b>".$rec["qty"]."<b>  Weight_unit_id </b>".$rec["options"]["Weight_unit_id"];
																			// $Total_weight_same_location=$Weight+($rec["options"]["Item_Weight"]*$item["qty"]);

																			$Total_weight_same_location=($rec["options"]["Item_Weight"]*$rec["qty"]);

																			// echo "<br><br><b>Total_weight_same_location </b>".$Total_weight_same_location;

																			$lv_Weight_unit_id=$rec["options"]["Weight_unit_id"];
																			$kg=1;
																			switch ($lv_Weight_unit_id)
																			{
																				case 2://gram
																				$kg=0.001;break;
																				case 3://pound
																				$kg=0.45359237;break;
																			}
																			// $Total_weight_same_location=array_sum($Total_weight_same_location);
																			$Weight_in_KG=($Total_weight_same_location*$kg)+$Weight_in_KG;
																								  // echo "<br><br><b>Total_weight_same_location </b>".$Total_weight_same_location."<b>  Weight_unit_id </b>".$lv_Weight_unit_id."<b>  Weight_in_KG </b>".$Weight_in_KG;
																								  // $Weight=$Total_weight_same_location;
																								  // $Weight=$Weight_in_KG;
																		}
															
															
																	}
														/*******Single Weight convert into KG****/

																	$kg2=1;
																	switch ($item["options"]["Weight_unit_id"])
																	{
																			case 2://gram
																			$kg2=0.001;break;
																			case 3://pound
																			$kg2=0.45359237;break;
																	}
																	$Single_Item_Weight_in_KG=($item["options"]["Item_Weight"]*$item["qty"]*$kg2);
														
																}
																else
																{
																		$Total_Weighted_avg_shipping_cost[]=0;
																		$Weighted_avg_shipping_cost="-";
																}
													
															   /*  if($Shipping_charges_flag==2)//Delivery_price
																{
																	// if($item["options"]["Redemption_method"]==29)
																	if($delivery_type == 0)
																	{

																	   $Get_shipping_cost = $this->CI->Igain_model->Get_delivery_price_master($delivery_outlet_details->Country,$delivery_outlet_details->State,$To_Country,$To_State,$Weight_in_KG,1);
																		$Shipping_cost= $Get_shipping_cost->Delivery_price;
																		// echo"--Shipping_cost------".$Shipping_cost."---<br>";
																		$Weighted_avg_shipping_cost=(($Shipping_cost/$Weight_in_KG)*$Single_Item_Weight_in_KG);
																		$Weighted_avg_shipping_cost=number_format((float)$Weighted_avg_shipping_cost, 2);
																		$Total_Weighted_avg_shipping_cost[]=$Weighted_avg_shipping_cost;

																	}
																}
																else */
																
																if($Shipping_charges_flag==1)//Standard Charges
																{
																		// if($item["options"]["Redemption_method"]==29)
																		if($delivery_type == 0)
																		{
																				$Cost_Threshold_Limit=round($Cost_Threshold_Limit*$Company_Redemptionratio);

																				$Shipping_cost=round($Standard_charges*$Company_Redemptionratio);

																				$Weighted_avg_shipping_cost=round(($Shipping_cost/$Weight_in_KG)*$Single_Item_Weight_in_KG);

																				$Total_Weighted_avg_shipping_cost[]=$Weighted_avg_shipping_cost;
																		}
																}
																else
																{
																	$Shipping_cost=0;
																	$Weighted_avg_shipping_cost=0;
																}
																// echo"--Weighted_avg_shipping_cost------".$Weighted_avg_shipping_cost."---<br>";
																/**Calculate Weighted Delivery Cost AMIT 12-12-2017***END******/
																if($item["options"]['Merchant_flag'] ==1) 
																{
																	$get_enrollment = $this->CI->Igain_model->get_enrollment_details($item["options"]['Seller_id']);
																	$merchant_name = $get_enrollment->First_name.' '.$get_enrollment->Last_name;
																}
																else
																{
																	$merchant_name = "-";
																}
																
																
														
														$html.='<div class="item">
															
															<div class="dtc">
																<h3>'.$Merchandize_item_name.' <span class="kes">'.$Symbol_of_currency.' '.number_format($Purchase_amount,2).'</span></h3>';
																
																if($item["options"]['remark2'] != NULL)
																{
																	$Condiments_name = $item["options"]['remark2'];
																}
																
																
																if($Condiments_name != "") {
																	
																	
																	
																	$Condiments_name= str_replace("+","<br>",$Condiments_name);
																	
																	
																	$html.='<p>+ '.$Condiments_name.'</p>';
																	
																	 if($item['MainItem_TotalPrice'] != "" && $item['SideCondiments_TotalPrice'] != "") { 
																		 $html.='<span class="kes">'.$Symbol_of_currency.' '.number_format( ($item['MainItem_TotalPrice'] + $item['SideCondiments_TotalPrice']) * $item['qty'], 2);
																	 }
																	 
																	// $html.='<p>+ '.$Condiments_name.' <span class="kes">Kes 10,00</span></p>';
																	
																}
																
																
															$html.='</div>
														</div>';
													}
												}	
												
											$html.='</div>
											<div class="box purchuase-box">
												<p><b>Total Due:</b> '.$Symbol_of_currency.' '.number_format($_SESSION["Total_Shipping_Cost"]+$subtotal,2).'</p>';
												if($vouchers != "" && $vouchers != 0)
												{
													$html.='<p><b>Voucher:</b> '.$Symbol_of_currency.' '.$VoucherDiscountAmt.'</p>';
												}
				
												
												$html.='<p><b>Redeem '.$Company_Currency.' ('.$Cust_wish_redeem_point.'  ):</b> '.$Symbol_of_currency.' '.number_format($EquiRedeem,2).'</p>
												<p><b>Mpesa:</b> '.$Symbol_of_currency.' '.number_format($mpesa_BillAmount,2).'</p>
											</div>';
											
											if($delivery_type==29) {
				
				
												$Current_address=App_string_decrypt($customer_delivery_details->Address);
												$str_arr = explode(",",$Current_address);
												$str_arr0 =$str_arr[0];
												$str_arr1 =$str_arr[1];
												$str_arr2 =$str_arr[2];
												$str_arr3 =$str_arr[3];
				
				
												$html .='<div class="box purchuase-box">
															<h2>Delivery Address</h2>
															<h3>'.$delivery_outlet_details->First_name.' '.$delivery_outlet_details->Last_name.'</h3>
															<p><b>Building / Estate:</b> '.$str_arr0.'</p>
															<p><b>Floor / House No.:</b> '.$str_arr1.'</p>
															<p><b>Street / Road:</b> '.$str_arr2.'</p>
															<p><b>Additional:</b> '.$str_arr3.'</p>
														</div>';
												
												
												
											} else {
												
												$Current_address=App_string_decrypt($delivery_outlet_details->Current_address);
												$str_arr = explode(",",$Current_address);
												$str_arr0 =$str_arr[0];
												$str_arr1 =$str_arr[1];
												$str_arr2 =$str_arr[2];
												$str_arr3 =$str_arr[3];
												
												
												if($delivery_type ==107){
													$Address12 ='In-Store Address:';
												} else if($delivery_type == 28 ){
													$Address12 ='Pick-Up:';} 
																
													$html .='<div class="box purchuase-box">
														<h2>'.$Address12.'</h2>
														<h2>'.$delivery_outlet_details->First_name.' '.$delivery_outlet_details->Last_name.'</h2>';
														if($delivery_type ==107 && $_SESSION["TableNo"] != "" ){
																		
															$html .='<p><b>Table No:</b>'.$Email_content['TableNo'].'</p>';
														}
																	
														$html .='<p><b>Building / Estate:</b> '.$str_arr0.'</p>
														<p><b>Floor / House No.:</b> '.$str_arr1.'</p>
														<p><b>Street / Road:</b> '.$str_arr2.'</p>
														<p><b>Additional:</b> '.$str_arr3.'</p>
												</div>';
											}										
											
										$html .='</div>
									
									<!--Main jQuery-->
								   <script src="'.$Base_url.'assets/js/jquery-3.2.1.min.js"></script>
								   <!--Bootstrap Min JS-->
								   <script src="'.$Base_url.'assets/js/popper.min.js"></script>
								   <script src="'.$Base_url.'assets/js/bootstrap.min.js"></script>
								   <!--Validation JS-->
								   
								</body>
								</html>';
                  
		
		
		// echo"----Purchase_order-----".$html;
    }		
    if($Template_type == "Purchase_Cancel")
    {
		$Communication_id = 0;	
		$Offer =$Email_content['Notification_type'];
		$Voucher_status1=$Email_content['Voucher_status'];
		if($Voucher_status1 == 21)
		{
			$Voucher_status="Cancel";
		}
		else
		{
			$Voucher_status= "";
		}
		$Transaction_date = date("d M Y",strtotime($Email_content['Trans_date']));
		$Todays_date=date("d M Y");
		// $subject ="Purchase Return";
		$subject =$Offer;
		
		
		ob_start();	
		$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;	
		include './application/libraries/Email_templates/Refund_Purchase_item_points.php';			
				
		$body = ob_get_contents();
		ob_end_clean();				
		/********************Variable Replace Code***********************/
			$search_variables = array('$Customer_name','$Transaction_date','$Todays_date','$Item_name','$Order_no','$Voucher_no','$Symbol_of_currency','$Purchase_amount','$Quantity','$Voucher_status','$Credit_points','$Balance_points','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
			$inserts_contents = array($Customer_name,$Transaction_date,$Todays_date,$Email_content['Item_name'],$Email_content['Order_no'],$Email_content['Voucher_no'],$Email_content['Symbol_of_currency'],$Email_content['Purchase_amount'],$Email_content['Quantity'],$Voucher_status,$Email_content['Credit_points'],$Current_point_balance,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
			$html = str_replace($search_variables,$inserts_contents,$body);
			//echo "<br>";
			//echo $html;
			//echo "<br>";
		/*******************Variable Replace Code*********************/			
	}
		if($Template_type == "Purchase_item_return_initiated")
		{
			$Communication_id = 0;	
			$Offer = $Email_content['Notification_type'];	
			$Voucher_status1 =$Email_content['Voucher_status'];	
			if($Voucher_status1==22)
			{
				$Voucher_status="Return Initiated";
			}
			else
			{
				$Voucher_status="";
			}
			
			$Transaction_date = date("d M Y",strtotime($Email_content['Trans_date']));
			$Todays_date=date("d M Y");
			// $subject ="Purchase Return";
			$subject = $Offer;
			
			
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;	
			include './application/libraries/Email_templates/Purchase_item_return_initiated.php';			
					
			$body = ob_get_contents();
			ob_end_clean();				
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Transaction_date','$Todays_date','$Item_name','$Voucher_no','$Order_no','$Symbol_of_currency','$Purchase_amount','$Redeem_points','$Quantity','$Voucher_status','$Notification_type','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Transaction_date,$Todays_date,$Email_content['Item_name'],$Email_content['Voucher_no'],$Email_content['Order_no'],$Email_content['Symbol_of_currency'],$Email_content['Purchase_amount'],$Email_content['Redeem_points'],$Email_content['Quantity'],$Voucher_status,$Email_content['Notification_type'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
				//echo "<br>";
				//echo $html;
				//echo "<br>";
			/************************************Variable Replace Code******************************/
			
		}
		/* if($Template_type == "Purchase_item_return_initiated_to_admin")
		{
			$Communication_id = 0;	
			$Offer =$Email_content['Notification_type'];			
			$Admin_email =$Email_content['admin_email'];	
			$Voucher_status1 =$Email_content['Voucher_status'];	
			if($Voucher_status1==22)
			{
				$Voucher_status = "Return Initiated";
			}
			else
			{
				$Voucher_status="";
			}			
			$Partner_contact_person_name =$Email_content['Partner_contact_person_name'];			 
			$Partner_contact_person_email =$Email_content['Partner_contact_person_email'];			 
			$Transaction_date = date("d M Y",strtotime($Email_content['Trans_date']));
			$Todays_date=date("d M Y");
			// $subject ="Purchase Return Initiated";
			$subject =$Offer;
			$Company_primary_contact_person=$company_details->Company_primary_contact_person;
			
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$Membership_ID = $customer_details->Card_id;			
			include './application/libraries/Email_templates/Purchase_item_return_initiated_to_admin.php';			
					
			$body = ob_get_contents();
			ob_end_clean();				
			/************************************Variable Replace Code******************************
				$search_variables = array('$Partner_contact_person_name','$Customer_name','$Membership_ID','$Transaction_date','$Todays_date','$Item_name','$Voucher_no','$Order_no','$Symbol_of_currency','$Purchase_amount','$Redeem_points','$Quantity','$Voucher_status','$Notification_type','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Partner_contact_person_name,$Customer_name,$Membership_ID,$Transaction_date,$Todays_date,$Email_content['Itecation_type'];			
			$Admin_email =$Email_content['admin_email'];	
			$Voucher_status1 =$Email_content['Voucher_status'];	
			if($Voucher_status1==22)
			{
				$Voucher_status = "Return Initiated";
			}
			else
			{
				$Voucher_status="";
			}			
			$Partner_contact_person_name =$Email_content['Partner_contact_person_name'];			 
			$Partner_contact_person_email =$Email_content['Partner_contact_person_email'];			 
			$Transaction_date = date("d M Y",strtotime($Email_content['Trans_date']));
			$Todays_date=date("d M Y");
			// $subject ="Purchase Return Initiated";
			$subject =$Offer;
			$Company_primary_contact_person=$company_details->Company_primary_contact_person;
			
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$Membership_ID = $customer_details->Card_id;			
			include './application/libraries/Email_templates/Purchase_item_return_initiated_to_admin.php';			
					
			$body = ob_get_contents();
			ob_end_clean();				
			/************************************Variable Replace Code******************************
				$search_variables = array('$Partner_contact_person_name','$Customer_name','$Membership_ID','$Transaction_date','$Todays_date','$Item_name','$Voucher_no','$Order_no','$Symbol_of_currency','$Purchase_amount','$Redeem_points','$Quantity','$Voucher_status','$Notification_type','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Partner_contact_person_name,$Customer_name,$Membership_ID,$Transaction_date,$Todays_date,$Email_content['Item_name'],$Email_content['Voucher_no'],$Email_content['Order_no'],$Email_content['Symbol_of_currency'],$Email_content['Purchase_amount'],$Email_content['Redeem_points'],$Email_content['Quantity'],$Voucher_status,$Email_content['Notification_type'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
				//echo "<br>";
				//echo $html;
				//echo "<br>on_date = date("d M Y",strtotime($Email_content['Trans_date']));
			$Todays_date=date("d M Y");
			// $subject ="Purchase Return Initiated";
			$subject =$Offer;
			$Company_primary_contact_person=$company_details->Company_primary_contact_person;
			
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$Membership_ID = $customer_details->Card_id;			
			include './application/libraries/Email_templates/Purchase_item_return_initiated_to_admin.php';			
					
			$body = ob_get_contents();
			ob_end_clean();				
			/************************************Variable Replace Code******************************
				$search_variables = array('$Partner_contact_person_name','$Customer_name','$Membership_ID','$Transaction_date','$Todays_date','$Item_name','$Voucher_no','$Order_no','$Symbol_of_currency','$Purchase_amount','$Redeem_points','$Quantity','$Voucher_status','$Notification_type','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Partner_contact_person_name,$Customer_name,$Membership_ID,$Transaction_date,$Todays_date,$Email_content['Item_name'],$Email_content['Voucher_no'],$Email_content['Order_no'],$Email_content['Symbol_of_currency'],$Email_content['Purchase_amount'],$Email_content['Redeem_points'],$Email_content['Quantity'],$Voucher_status,$Email_content['Notification_type'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
				//echo "<br>";
				//echo $html;
				//echo "<br>";
			/************************************Variable Replace Code******************************
			
		} */
		if($Template_type == "Purchase_buyone_freeone")
		{
			$Communication_id = 0;	
			$Offer =$Email_content['Offer_name'];			
			$Transaction_date = date("d M Y",strtotime($Email_content['Transaction_date']));
			$Todays_date=date("d M Y");
			$subject =$Email_content['Offer_name'];
			
			// var_dump($Email_content);
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;	
			include './application/libraries/Email_templates/Purchase_buyone_freeone.php';			
					
			$body = ob_get_contents();
			ob_end_clean();				
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Transaction_date','$Todays_date','$Offer_name','$Item_name','$Item_code','$Orderno','$Free_qty','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Transaction_date,$Todays_date,$Email_content['Offer_name'],$Email_content['Item_name'],$Email_content['Item_code'],$Email_content['Orderno'],$Email_content['Free_qty'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
		// echo "<br>";
		// echo $html; 
		// echo "<br>";
		// die;
		}
		/*----------------------------Shopping Order Confirmation Email---------------------------*/
		if($Template_type == "Redemption")
		{
			$Communication_id = 0;;
			$Offer = $Email_content['Notification_type'];
			$html = $Email_content['Redemption_details'];
			$subject = $Email_content['subject'];
		}
		if($Template_type == "Polling_ommunication")
        {
			$Date=date("Y-m-d");
			$Communication_id = $Email_content['Communication_id'];
			$Offer = $Email_content['Offer'];
			$html = $Email_content['Offer_description'];
			$subject = "Latest Communication from ".$Company_name;	
        }
		if($Template_type == "Call_Center_Query_Log")
        {
			$Communication_id = 0;	 
			$Offer = $Email_content['Notification_type'];			
			$Transaction_date = $Email_content['Today_date'];
			$Todays_date=date("Y-m-d");
			$subject =" Call Center Query Log";
			
			
			ob_start();	
			$Customer_name =$Email_content['Cust_name'];	
			$Excecative_name =$Email_content['Excecative_name'];	
			$Querylog_ticket =$Email_content['Querylog_ticket'];	
			$Max_resolution_datetime =$Email_content['Max_resolution_datetime'];	
			$Excecative_email =$Email_content['Excecative_email'];	
			// $Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;	
			include './application/libraries/Email_templates/Call_center_query_log.php';			
					
			$body = ob_get_contents();
			ob_end_clean();				
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Transaction_date','$Todays_date','$Excecative_name','$Querylog_ticket','$Max_resolution_datetime','$Excecative_email','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');
				$inserts_contents = array($Customer_name,$Transaction_date,$Todays_date,$Excecative_name,$Querylog_ticket,$Max_resolution_datetime,$Excecative_email,$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			
		}
		if($Template_type == "Online_booking")// Online Service Booking 
        {
			
			$Communication_id = 0;
			 // echo"----Freebies-----<br>";
			$Offer = $Email_content['Notification_type'];
			$subject = " Your Service Appointment Booked Successfully. ";			
			$User_email_id=$Email_content["Email_Id"];
			// $Item_image= $Base_url.'Merchandize_images/original/'.$Email_content["Item_image"];
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			$Merchant_name = $seller_details->First_name." ".$seller_details->Middle_name." ".$seller_details->Last_name;
					
						
			// $subject = $Customer_name.", Welcome to ".$company_details->Company_name." Loyalty Program";		    
			include './application/libraries/Email_templates/Online_booking_email.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
					
			$Pickup_flag=$Email_content["Pickup_flag"];
			if($Pickup_flag ==1 )
			{
				$Pickup_flag='Yes';
			}
			else
			{
				$Pickup_flag='No';
			}
			// echo"------Pickup_flag----".$Pickup_flag."---<br>";
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Service_center','$Create_date','$Appointment_time','$Pickup_flag','$Membership_ID','$Vehicle_no','$Phone_no','$Email_Id','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Email_content['Customer_name'],$Merchant_name,date('d-M-Y',strtotime($Email_content["Date_Appointment"])),$Email_content["Appointment_time"],$Pickup_flag,$Email_content["Membership_id"],$Email_content["Vehicle_number"],$Email_content["Contact_number"],$Email_content["Email_Id"],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			// echo $html;
			
			
        }
		if($Template_type == "Redemption_Fulfillment")
        {
			$Communication_id = 0;	
			$Offer =$Email_content['Notification_type'];			
			$Transaction_date = date("d M Y",strtotime($Email_content['Trans_date']));
			$Todays_date=date("Y-m-d");
			$subject =" Redemption Fullfillment";
			
			$base_url2=$this->CI->config->item('base_url2');
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;	
			include './application/libraries/Email_templates/Redemption_Fulfillment.php';			
					
			$body = ob_get_contents();
			ob_end_clean();				
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Transaction_date','$Todays_date','$Merchandize_item_name','$evoucher','$Points','$Total_points','$Branch_name','$Branch_Address','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store','$Company_Currency');//
				$inserts_contents = array($Customer_name,$Transaction_date,$Todays_date,$Email_content['Merchandize_item_name'],$Email_content['evoucher'],$Email_content['Points'],$Email_content['Total_points'],$Email_content['Branch_name'],$Email_content['Branch_Address'],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store,$Company_Currency);
				$html = str_replace($search_variables,$inserts_contents,$body);
				// echo $html;
			/************************************Variable Replace Code******************************/
			
		}
		
		/*************30-01-2020 sandeep discount voucher***************/
		if($Template_type == "Discount_voucher")
        {
			$Communication_id = 0;
			$Offer = "Congratulations !!! You have received discount voucher from ".$company_details->Company_name;
			$Symbol_of_currency = $Email_content['Symbol_of_currency'];
			$Transaction_date = date("d M Y",strtotime($Email_content['Transaction_date']));
			$subject = "Congratulations !!! You have received discount voucher from ".$company_details->Company_name;			
			
			// $Item_image= $Base_url.'Merchandize_images/original/'.$Email_content["Item_image"];
			ob_start();	
			$Customer_name = $customer_details->First_name.' '.$customer_details->Last_name;
			
			include './application/libraries/Email_templates/DiscountVoucher.php';			
					
			$body = ob_get_contents();
			ob_end_clean();			
					
			
			/************************************Variable Replace Code******************************/
				$search_variables = array('$Customer_name','$Voucher_no','$currency','$reward_amt','$Transaction_date','$Valid_till','$Member_website','$Company_name','$Gooogle_Play','$iOs_app_store');//
				$inserts_contents = array($Customer_name,$Email_content["Voucher_no"],$Symbol_of_currency,$Email_content["Reward_amt"],$Transaction_date,$Email_content["Voucher_validity"],$Member_website,$Company_name,$Gooogle_Play,$iOs_app_store);
				$html = str_replace($search_variables,$inserts_contents,$body);
			/************************************Variable Replace Code******************************/
			// echo $html;
        }
		/*************30-01-2020 sandeep discount voucher***************/
		
		
		//************* 11-09-2019 sandeep transaction failed send to company ***************
		if($Template_type == "Purchase_order_to_company")
		{ 
			$Communication_id = 0;
			$Offer = $Email_content['Notification_type'];
			$Transaction_date = $Email_content['Transaction_date'];
			$Symbol_of_currency = $Email_content['Symbol_of_currency'];
			$Orderno = $Email_content['Orderno'];
			$Voucher_array = $Email_content['Voucher_array'];
			$Voucher_status1 = $Email_content['Voucher_status'];
			$Standard_charges = $Email_content['Standard_charges'];
			$Company_Redemptionratio = $Email_content['Company_Redemptionratio'];
			$Cost_Threshold_Limit = $Email_content['Cost_Threshold_Limit'];
			$To_Country = $Email_content['To_Country'];
			$To_State = $Email_content['To_State'];
			$Shipping_charges_flag = $Email_content['Shipping_charges_flag'];
			$Outlet_address = $Email_content['Outlet_address'];
			$Cust_selected_address = $Email_content['Cust_selected_address'];
			$address_flag = $Email_content['address_flag'];

			$User_email_id = $company_details->Company_contactus_email_id; 
			
			if($Voucher_status1 == 18)
			{
			 $Voucher_status = "Ordered";
			}
			$Cust_wish_redeem_point = $Email_content['Cust_wish_redeem_point'];
			if($Cust_wish_redeem_point=="")
			{
				$Cust_wish_redeem_point=0;
			}
			$EquiRedeem = $Email_content['EquiRedeem'];
			$grand_total = $Email_content['grand_total'];
			$subtotal = $Email_content['subtotal'];
			$total_loyalty_points = $Email_content['total_loyalty_points'];
			$Update_Current_balance = $Email_content['Update_Current_balance'];
			$Blocked_points = $Email_content['Blocked_points'];
			$Delivery_type = $Email_content['Delivery_type'];
			$DeliveryOutlet = $Email_content['DeliveryOutlet'];
			$mpesa_BillAmount = $Email_content['mpesa_BillAmount'];
			$Mpesa_TransID = $Email_content['Mpesa_TransID'];
			$delivery_outlet_details = $this->CI->Igain_model->get_enrollment_details($DeliveryOutlet);
			
			
			$Outlet_Name=$delivery_outlet_details->First_name.' '.$delivery_outlet_details->Last_name;
			
			$POS_Bill_No = $Email_content['POS_Bill_No'];			
			if($Delivery_type==0){
				$deliveryType="Delivery";
			} else {
				$deliveryType="Pick-Up";
			}
					
			 $vouchers = "";
				
			if(count($Voucher_array) > 0)
			{
				$vouchers = implode(",",$Voucher_array);
			}		
			
			if($mpesa_BillAmount){
				$mpesa_BillAmount=$mpesa_BillAmount;
			} else {
				$mpesa_BillAmount='0.00';
			}
					
			$banner_image = $this->CI->config->item('base_url2').'images/transaction.png';	
			// $subject = "Purchase Order of our ".$company_details->Company_name ;
			$subject = "ONLINE TRANSACTION ".$Offer;
			
			$html ='<!doctype html>
								<html lang="">
								<head>
									<!-- Required meta tags -->
									<meta charset="utf-8">
									<meta http-equiv="X-UA-Compatible" content="IE=edge">
									<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
									<title>Art Caffe | Online Purchuase</title>
									<!-- Bootstrap CSS -->
									<link rel="stylesheet" href="'.$Base_url.'assets/css/bootstrap.min.css">
									<!-- Font Awesome CSS -->
									<link rel="stylesheet" type="text/css" href="'.$Base_url.'assets/fonts/font-awesome/css/font-awesome.min.css">
									<!-- Fonts CSS -->
									<link rel="stylesheet" href="'.$Base_url.'assets/fonts/font.css">
									<!-- Custome CSS -->
									<link rel="stylesheet" href="'.$Base_url.'assets/css/style.css">
									<!-- Responsive CSS -->
									<link rel="stylesheet" href="'.$Base_url.'assets/css/responsive.css">
								</head>
								<body style="background-image:url("'.$Base_url.'assets/img/statement-bg.jpg")">
									
										
										<div class="custom-body">
											<div class="box purchuase-box">
												<h2>Online Purchuase</h2>
												<hr class="hr-space"/>
												<p><b>Dear '.$customer_details->First_name.' '.$customer_details->Last_name.',</b></p>
												<p>Thank you for placing your order online.</p>
												<hr class="hr-space"/>
												<p><b>Date:</b> '.$Transaction_date. '</p>
												<p><b>Order Type:</b> '.$deliveryType. '</p>
												<p><b>Outlet:</b> '.$Outlet_Name. '</p>
												<p><b>Order No:</b> '.$Orderno. '</p>';
												if($POS_Bill_No != "") {

													$html.='<p><b>Bill No:</b> '.$POS_Bill_No. '</p>';
												}
												$html.='
												<hr class="hr-space"/>
												<h2 class="o_total"><b>Order Total:</b> '.$Symbol_of_currency.' '.number_format($_SESSION["Total_Shipping_Cost"]+$subtotal,2).'</h2>';
												
												if($total_loyalty_points != 0 && $company_details->Loyalty_enabled ==1 )
												{
													$html.='<h3>'.$Company_Currency.' Earned: <span class="text-green">'.$total_loyalty_points.'</span></h3>';
												}
												
											$html.='</div>
											<div class="cart-box">';
												$i=1;		
												if ($cart = $this->CI->cart->contents())
												{
													foreach ($cart as $item)
													{
														
														
														$item_id = $item['id'];
														$result = $this->CI->Shopping_model->Get_merchandize_item($item_id,$Company_id);
														$Merchandize_item_name = $result->Merchandize_item_name;
														$Purchase_amount=$item['qty'] * $item['price'];
														$Balance_to_pay = round($grand_total * $Purchase_amount ) / $subtotal;
														$Unit_price =  $item['price'];

															if($item['options']['Item_size'] == 1)
															{
																$size = "Small";
															}
															elseif($item['options']['Item_size'] == 2)
															{	
																$size = "Medium";
															}
															elseif($item['options']['Item_size'] == 3)
															{
																$size = "Large";
															}
															elseif($item['options']['Item_size'] == 4)
															{
																$size = "Extra Large";
															}
															else
															{
																$size = "-";
															}
															/********Calculate Weighted Delivery Cost AMIT 12-12-2017************/
															$Partner_state=$item["options"]["Partner_state"];
															   $Partner_Country_id=$item["options"]["Partner_Country_id"];

															   // if($item["options"]["Redemption_method"]==29)
															   if($To_State == $delivery_outlet_details->State)
															   {
																	$Exist_Delivery_method=1;
																	$Weight_in_KG=0;
																	$Weight=0;
																	foreach($cart as $rec) 
																	{
																		// echo '<br>if('.$rec["options"]["Partner_state"].'=='.$Partner_state.')';

																	   // if(($rec["options"]["Partner_state"]==$Partner_state) && ($rec["options"]["Redemption_method"]==29))
																	  if($To_State == $delivery_outlet_details->State)
																	   {

																			//echo "<br><br><b>Item Weight </b>".$rec["options"]["Item_Weight"]."<b>  Quantity </b>".$rec["qty"]."<b>  Weight_unit_id </b>".$rec["options"]["Weight_unit_id"];
																			// $Total_weight_same_location=$Weight+($rec["options"]["Item_Weight"]*$item["qty"]);

																			$Total_weight_same_location=($rec["options"]["Item_Weight"]*$rec["qty"]);

																			// echo "<br><br><b>Total_weight_same_location </b>".$Total_weight_same_location;

																			$lv_Weight_unit_id=$rec["options"]["Weight_unit_id"];
																			$kg=1;
																			switch ($lv_Weight_unit_id)
																			{
																				case 2://gram
																				$kg=0.001;break;
																				case 3://pound
																				$kg=0.45359237;break;
																			}
																			// $Total_weight_same_location=array_sum($Total_weight_same_location);
																			$Weight_in_KG=($Total_weight_same_location*$kg)+$Weight_in_KG;
																								  // echo "<br><br><b>Total_weight_same_location </b>".$Total_weight_same_location."<b>  Weight_unit_id </b>".$lv_Weight_unit_id."<b>  Weight_in_KG </b>".$Weight_in_KG;
																								  // $Weight=$Total_weight_same_location;
																								  // $Weight=$Weight_in_KG;
																		}
															
															
																	}
														/*******Single Weight convert into KG****/

																	$kg2=1;
																	switch ($item["options"]["Weight_unit_id"])
																	{
																			case 2://gram
																			$kg2=0.001;break;
																			case 3://pound
																			$kg2=0.45359237;break;
																	}
																	$Single_Item_Weight_in_KG=($item["options"]["Item_Weight"]*$item["qty"]*$kg2);
														
																}
																else
																{
																		$Total_Weighted_avg_shipping_cost[]=0;
																		$Weighted_avg_shipping_cost="-";
																}
													
															   /*  if($Shipping_charges_flag==2)//Delivery_price
																{
																	// if($item["options"]["Redemption_method"]==29)
																	if($delivery_type == 0)
																	{

																	   $Get_shipping_cost = $this->CI->Igain_model->Get_delivery_price_master($delivery_outlet_details->Country,$delivery_outlet_details->State,$To_Country,$To_State,$Weight_in_KG,1);
																		$Shipping_cost= $Get_shipping_cost->Delivery_price;
																		// echo"--Shipping_cost------".$Shipping_cost."---<br>";
																		$Weighted_avg_shipping_cost=(($Shipping_cost/$Weight_in_KG)*$Single_Item_Weight_in_KG);
																		$Weighted_avg_shipping_cost=number_format((float)$Weighted_avg_shipping_cost, 2);
																		$Total_Weighted_avg_shipping_cost[]=$Weighted_avg_shipping_cost;

																	}
																}
																else */
																
																if($Shipping_charges_flag==1)//Standard Charges
																{
																		// if($item["options"]["Redemption_method"]==29)
																		if($delivery_type == 0)
																		{
																				$Cost_Threshold_Limit=round($Cost_Threshold_Limit*$Company_Redemptionratio);

																				$Shipping_cost=round($Standard_charges*$Company_Redemptionratio);

																				$Weighted_avg_shipping_cost=round(($Shipping_cost/$Weight_in_KG)*$Single_Item_Weight_in_KG);

																				$Total_Weighted_avg_shipping_cost[]=$Weighted_avg_shipping_cost;
																		}
																}
																else
																{
																	$Shipping_cost=0;
																	$Weighted_avg_shipping_cost=0;
																}
																// echo"--Weighted_avg_shipping_cost------".$Weighted_avg_shipping_cost."---<br>";
																/**Calculate Weighted Delivery Cost AMIT 12-12-2017***END******/
																if($item["options"]['Merchant_flag'] ==1) 
																{
																	$get_enrollment = $this->CI->Igain_model->get_enrollment_details($item["options"]['Seller_id']);
																	$merchant_name = $get_enrollment->First_name.' '.$get_enrollment->Last_name;
																}
																else
																{
																	$merchant_name = "-";
																}
																
																
														
														$html.='<div class="item">
															
															<div class="dtc">
																<h3>'.$Merchandize_item_name.' <span class="kes">'.$Symbol_of_currency.' '.number_format($Purchase_amount,2).'</span></h3>';
																
																if($item["options"]['remark2'] != NULL)
																{
																	$Condiments_name = $item["options"]['remark2'];
																}
																
																
																if($Condiments_name != "") {
																	
																	
																	
																	$Condiments_name= str_replace("+","<br>",$Condiments_name);
																	
																	
																	$html.='<p>+ '.$Condiments_name.'</p>';
																	
																	 if($item['MainItem_TotalPrice'] != "" && $item['SideCondiments_TotalPrice'] != "") { 
																		 $html.='<span class="kes">'.$Symbol_of_currency.' '.number_format( ($item['MainItem_TotalPrice'] + $item['SideCondiments_TotalPrice']) * $item['qty'], 2);
																	 }
																	 
																	// $html.='<p>+ '.$Condiments_name.' <span class="kes">Kes 10,00</span></p>';
																	
																}
																
																
															$html.='</div>
														</div>';
													}
												}	
												
											$html.='</div>
											<div class="box purchuase-box">
												<p><b>Total Due:</b> '.$Symbol_of_currency.' '.number_format($_SESSION["Total_Shipping_Cost"]+$subtotal,2).'</p>';
												if($vouchers != "" && $vouchers != 0)
												{
													$html.='<p><b>Voucher:</b> '.$Symbol_of_currency.' '.$VoucherDiscountAmt.'</p>';
												}
				
												
												$html.='<p><b>Redeem '.$Company_Currency.' ('.$Cust_wish_redeem_point.'  ):</b> '.$Symbol_of_currency.' '.number_format($EquiRedeem,2).'</p>
												<p><b>Mpesa:</b> '.$Symbol_of_currency.' '.number_format($mpesa_BillAmount,2).'</p>
											</div>';
											
											if($delivery_type==29) {
				
				
												$Current_address=App_string_decrypt($customer_delivery_details->Address);
												$str_arr = explode(",",$Current_address);
												$str_arr0 =$str_arr[0];
												$str_arr1 =$str_arr[1];
												$str_arr2 =$str_arr[2];
												$str_arr3 =$str_arr[3];
				
				
												$html .='<div class="box purchuase-box">
															<h2>Delivery Address</h2>
															<h3>'.$delivery_outlet_details->First_name.' '.$delivery_outlet_details->Last_name.'</h3>
															<p><b>Building / Estate:</b> '.$str_arr0.'</p>
															<p><b>Floor / House No.:</b> '.$str_arr1.'</p>
															<p><b>Street / Road:</b> '.$str_arr2.'</p>
															<p><b>Additional:</b> '.$str_arr3.'</p>
														</div>';
												
												
												
											} else {
												
												$Current_address=App_string_decrypt($delivery_outlet_details->Current_address);
												$str_arr = explode(",",$Current_address);
												$str_arr0 =$str_arr[0];
												$str_arr1 =$str_arr[1];
												$str_arr2 =$str_arr[2];
												$str_arr3 =$str_arr[3];
												
												
												if($delivery_type ==107){
													$Address12 ='In-Store Address:';
												} else if($delivery_type == 28 ){
													$Address12 ='Pick-Up:';} 
																
													$html .='<div class="box purchuase-box">
														<h2>'.$Address12.'</h2>
														<h2>'.$delivery_outlet_details->First_name.' '.$delivery_outlet_details->Last_name.'</h2>';
														if($delivery_type ==107 && $_SESSION["TableNo"] != "" ){
																		
															$html .='<p><b>Table No:</b>'.$Email_content['TableNo'].'</p>';
														}
																	
														$html .='<p><b>Building / Estate:</b> '.$str_arr0.'</p>
														<p><b>Floor / House No.:</b> '.$str_arr1.'</p>
														<p><b>Street / Road:</b> '.$str_arr2.'</p>
														<p><b>Additional:</b> '.$str_arr3.'</p>
												</div>';
											}										
											
										$html .='</div>
									
									<!--Main jQuery-->
								   <script src="'.$Base_url.'assets/js/jquery-3.2.1.min.js"></script>
								   <!--Bootstrap Min JS-->
								   <script src="'.$Base_url.'assets/js/popper.min.js"></script>
								   <script src="'.$Base_url.'assets/js/bootstrap.min.js"></script>
								   <!--Validation JS-->
								   
								</body>
								</html>';
			
			// echo"--Purchase_order_to_company--".$html;
		}
		//************* 11-09-2019 sandeep transaction failed send to company ***************
		/**************16-05-2020 nilesh purchase gift card**********************/
		if($Template_type == "Purchase_gift_card") 
		{  
			$Communication_id = 0;
			// $Offer = $Email_content['Notification_type'];
			$Offer = "Thank you for your gift card purchase on ".$company_details->Company_name;
			$Transaction_date = date("d M Y", strtotime($Email_content['Todays_date']));
			// $subject = "Gift Card Purchased from ".$company_details->Company_name;
			$subject = "Thank you for your gift card purchase on ".$company_details->Company_name;
			
			$Customer_name = $customer_details->First_name .' '.$customer_details->Last_name;
			$Merchant_name = $seller_details->First_name ." ".$seller_details->Middle_name." ".$seller_details->Last_name;
			$Customer_name=$Email_content['Gift_card_user'];
			// $User_email_id = $Email_content['Gift_card_Email'];
			
			ob_start();
			include './application/libraries/Email_templates/Purchase_gift_card.php';

			$body = ob_get_contents();
			ob_end_clean();

			/************************************Variable Replace Code***************************** */
			$search_variables = array('$Customer_name', '$Merchant_name', '$Membership_ID', '$Purchase_amount', '$Symbol_currency', '$GiftCardNo', '$GiftCard_balance', '$Valid_till','$Bill_no','$Transaction_date', '$Member_website', '$Company_name', '$Gooogle_Play', '$iOs_app_store', '$Comapany_Currency'); //
			$inserts_contents = array($Customer_name, $Merchant_name, $customer_details->Card_id, $Email_content['Purchase_amount'], $Email_content['Symbol_currency'], $Email_content['GiftCardNo'], $Email_content['GiftCard_balance'],$Email_content['Valid_till'],$Email_content['Bill_no'], $Transaction_date, $Member_website, $Company_name, $Gooogle_Play, $iOs_app_store, $Comapany_Currency);
			$html = str_replace($search_variables, $inserts_contents, $body);
			/************************************Variable Replace Code***************************** */
			// echo $html; die;
      }
	/**************16-05-2020 nilesh purchase gift card**********************/
        /*-------------------------Insert Notification-----------------------*/
		
		if($Enrollement_id != 0 && $customer_details->User_id == 1 && $Template_type != "Contactus" && $Template_type != "Purchase_item_return_initiated_to_admin" && $Template_type != "From_transfer_miles"&& $Template_type != "To_transfer_miles")
		{
			if($Template_type == "Purchase_order_to_company") {
				
				$Enrollement_id = 0;
			}
		
			
			$User_email_id12 = App_string_encrypt($User_email_id);
			$cust_notification = array(
					'Company_id' => $Company_id ,
					'Seller_id' => $Seller_id ,
					'Customer_id' => $Enrollement_id,
					'Communication_id' => $Communication_id ,
					'User_email_id' => $User_email_id12,
					'Offer' => $Offer,
					'Offer_description' => $html,
					'Open_flag' => '0',
					'Date' => $Date,
					'Active_flag' =>1
			);
			// echo"----cust_notification-----<br>";
			// var_dump($cust_notification);
			$customer_notification = $this->CI->Igain_model->insert_customer_notification($cust_notification);
			if($Template_type == "Communication")
			{
				$new_html = str_replace("#User_notification_id",$customer_notification,$html);
				$post_data = array
				(					
					'Offer_description' => $new_html
				);
				$Update_customer_notification = $this->CI->Igain_model->update_customer_notification($customer_notification,$Company_id,$Enrollement_id,$post_data);
				$html = $new_html;
			}
		}
		
		
		
		
        /*-------------------------Insert Notification-----------------------*/
		
			
			
			
					
			
		
		if($Template_type == "Contactus")
		{
			
			$User_email_id  = $company_details->Company_contactus_email_id;
			$Company_primary_email_id= $User_email_id_cont;
		}
		else
		{
			
			// $User_email_id = App_string_decrypt($User_email_id);	
			
			$User_email_id  =$User_email_id; // $com;
			$Company_primary_email_id= $company_details->Company_primary_email_id;
			
		}
		
        //**************************Email Fuction Code*****************************
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'mail.miraclecartes.com';
            $config['smtp_user'] = 'rakeshadmin@miraclecartes.com';
            $config['smtp_pass'] = 'rakeshadmin@123';
            $config['smtp_port'] = 25;
            
            $config['mailtype'] = 'html';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
            $this->CI->load->library('email', $config);
            $this->CI->email->initialize($config);
            //$this->CI->email->set_newline("\r\n");
			/* echo"---Template_type-----".$Template_type."--<br>";
			echo"---User_email_id-----".$User_email_id."--<br>";
			echo"---Partner_contact_person_email-----".$Partner_contact_person_email."--<br>";
			echo"---Admin_email-----".$Admin_email."--<br>";
			echo"---***********************************************--<br>";  */
			
			if($Template_type=="Purchase_item_return_initiated_to_admin")
			{						
				
			
				$Company_primary_email_id=$company_details->Company_primary_email_id;
				$this->CI->email->from($User_email_id);
				$this->CI->email->to($Partner_contact_person_email); 
				$this->CI->email->cc($Admin_email);				
			}
			else
			{
				// echo"---Othera--<br>";
				
				$Company_primary_email_id=$company_details->Company_primary_email_id;
				$this->CI->email->from($Company_primary_email_id);
				$this->CI->email->to($User_email_id);
			}
			if($Template_type == "Purchase_order"){
				
				$this->CI->email->bcc($company_details->Company_contactus_email_id);	
			}
			// echo"---Company_primary_email_id-----".$Company_primary_email_id."--<br>";
			// die;
			//if($company_details->Company_id==9 && ( $Template_type == "Freebies" || $Template_type == "Enroll" ) )
			//{
				//$this->CI->email->bcc('amitk@miraclecartes.com');
				//crhead@vw-worldclassauto.co.in
			//}			
            $this->CI->email->subject($subject);
            $this->CI->email->message($html); 			
			//if($Template_type != "Enroll_Freebies")
			//{
                        //var_dump($this->CI->email->send());
				if ( ! $this->CI->email->send())
				{  
					// echo"Mail Send";
                                    
					return $customer_notification;
				}
				else
				{
				   // echo"Mail Not Send";
                                   
				   return $customer_notification;
				}
			//}
			 //echo $this->CI->email->print_debugger();

        //**************************Email Fuction Code*****************************/
    }
}

