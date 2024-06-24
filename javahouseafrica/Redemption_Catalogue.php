<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redemption_Catalogue extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('login/Login_model');
		$this->load->model('Igain_model');
		$this->load->library('cart');
		$this->load->model('Redemption_Catalogue/Redemption_Model');
		$this->load->library('Send_notification');
	}
	
/************************************************AMIT Start***********************************************/

	function index()
	{
		if($this->session->userdata('cust_logged_in'))
		{	
			$session_data = $this->session->userdata('cust_logged_in');
			$data['username'] = $session_data['username'];			
			$data['enroll'] = $session_data['enroll'];
			$data['userId']= $session_data['userId'];
			$data['Card_id']= $session_data['Card_id'];
			$data['Company_id']= $session_data['Company_id'];
			$data['smartphone_flag']= $session_data['smartphone_flag'];
			
			$data["Enroll_details"] = $this->Igain_model->get_enrollment_details($data['enroll']);
			$data["Trans_details"] = $this->Igain_model->FetchTransactionDetails($data['enroll'],$data['Card_id']);
			$data["NotificationsCount"] = $this->Igain_model->Fetch_Open_Notification_Count($data['enroll'],$session_data['Company_id']);
			$data["NotificationsDetails"] = $this->Igain_model->FetchNotificationDetails($data['enroll'],$session_data['Company_id']);
			
			$data["Merchandize_category"] = $this->Redemption_Model->Get_Merchandize_Category($data['Company_id']);
			$Merchandize_category_id=0;
			$Sort_by=0;
			if(isset($_REQUEST["Sort_by_category_flag"]))
			{
				$Merchandize_category_id=$_REQUEST["Sort_by_category_flag"];
			}
			if(isset($_REQUEST["Sort_by_points_flag"]))
			{
				$Sort_by=$_REQUEST["Sort_by_points_flag"];
			}
			
			/*-----------------------Pagination---------------------*/			
			$config = array();
			$config["base_url"] = base_url() . "/index.php/Redemption_Catalogue/index";
			$total_row = $this->Redemption_Model->Get_Merchandize_Items_Count($data['Company_id']);
			//echo "total_row ".$total_row;
			$config["total_rows"] = $total_row;
			$config["per_page"] = 8;
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
		
			
			$data["pagination"] = $this->pagination->create_links();
			/*-----------------------Pagination---------------------*/
			
			
			
			$Redemption_Items = $this->Redemption_Model->get_all_items($config["per_page"],$page,$data['Company_id'],$Merchandize_category_id,$Sort_by);
			$data['Redemption_Items'] = $Redemption_Items;
			if($Redemption_Items != NULL)
			{
				foreach ($Redemption_Items as $product)
				{
					$itemCode = $product['Company_merchandize_item_code'];
					$Redemption_Items_branches_array[$itemCode] = $this->Redemption_Model->get_all_items_branches($product['Company_merchandize_item_code'],$product['Company_id']);
				}
				
				$data['Redemption_Items_branches'] = $Redemption_Items_branches_array;
				$Item_array=$data['Redemption_Items'];
			}
			$this->load->view('Redemption_Catalogue/Redemption_Catalogue_View', $data);		
		}
		else
		{
			redirect('Login', 'refresh');
		}
	}	
	function Proceed_Redemption_Catalogue()
	{
		if($this->session->userdata('cust_logged_in'))
		{	
			$session_data = $this->session->userdata('cust_logged_in');
			$data['username'] = $session_data['username'];			
			$data['enroll'] = $session_data['enroll'];
			$data['userId']= $session_data['userId'];
			$data['Card_id']= $session_data['Card_id'];
			$data['Company_id']= $session_data['Company_id'];
			$data['smartphone_flag']= $session_data['smartphone_flag'];
			
			$data["Enroll_details"] = $this->Igain_model->get_enrollment_details($data['enroll']);
			$data["Trans_details"] = $this->Igain_model->FetchTransactionDetails($data['enroll'],$data['Card_id']);
			$data["NotificationsCount"] = $this->Igain_model->Fetch_Open_Notification_Count($data['enroll'],$session_data['Company_id']);
			$data["NotificationsDetails"] = $this->Igain_model->FetchNotificationDetails($data['enroll'],$session_data['Company_id']);
			
			$data["Merchandize_category"] = $this->Redemption_Model->Get_Merchandize_Category($data['Company_id']);
			$Merchandize_category_id=0;
			
			$Company_details = $this->Igain_model->get_company_details($data['Company_id']);
			$data["Pin_no_applicable"]=$Company_details->Pin_no_applicable;
			$data["Cust_Pin"]=$data["Enroll_details"]->pinno;
			$Cust_Tier_id=$data["Enroll_details"]->Tier_id;
			
			$data["Tier_details"] = $this->Redemption_Model->Get_tier_details($data['Company_id'],$Cust_Tier_id);
			foreach($data["Tier_details"] as $Tier_details)
			{
				$data["Redeemtion_limit"]=$Tier_details->Redeemtion_limit;
				$data["Tier_name"]=$Tier_details->Tier_name;
			}
			
			
			$data["Redemption_Items"] = $this->Redemption_Model->get_total_redeeem_points($data['enroll']);
			
			$data["Total_Redeem_points"] =$_REQUEST["Total_Redeem_points"];
			//echo "pinno ".$data["Enroll_details"]->pinno;
			$this->load->view('Redemption_Catalogue/Redemption_Checkout', $data);		
		}
		else
		{
			redirect('Login', 'refresh');
		}
	}	
	
	
	
	public function add_to_cart()
	{
		$session_data = $this->session->userdata('cust_logged_in');
		$data['username'] = $session_data['username'];			
		$data['enroll'] = $session_data['enroll'];
		$data['userId']= $session_data['userId'];
		$data['Card_id']= $session_data['Card_id'];
		$data['Company_id']= $session_data['Company_id'];
		$data['smartphone_flag']= $session_data['smartphone_flag'];
		
		
		$insert_data = array(
			'Item_code' => $this->input->post('Company_merchandize_item_code'),
			'Redemption_method' => $this->input->post('Delivery_method'),
			'Branch' => $this->input->post('location'),
			'Points' => $this->input->post('Points'),
			'Company_id' => $data['Company_id'],
			'Enrollment_id' => $data['enroll']
		);		
		$Total_balance=$this->input->post('Total_balance');
		$Current_redeem_points=$this->input->post('Current_redeem_points');
	
		if($Current_redeem_points<=$Total_balance)
		{
			$result = $this->Redemption_Model->insert_item_catalogue($insert_data);
			$Redeemtion_details = $this->Redemption_Model->get_total_redeeem_points($data['enroll']);
		
			$Total_Redeem_points=0;
			//echo "dsfdsfdsf".count($Redeemtion_details);
			 if(count($Redeemtion_details)!=0)
			{
				foreach($Redeemtion_details as $Redeemtion_details)
				{
					//echo "<br>".$Redeemtion_details["Points"];
					//$Total_Redeem_points=$Total_Redeem_points+$Redeemtion_details["Points"];
					$Total_Redeem_points=$Total_Redeem_points+$Redeemtion_details["Total_points"];
				}
			} 
			
			$item_list='Loading Page';
			if($result)
			{
				// $this->output->set_output("1");
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('cart_success_flag'=> '1', 'cart_total' => $Total_Redeem_points, 'item_list' => $item_list)));
			}
			else    
			{
				// $this->output->set_output("0");
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('cart_success_flag'=> '0', 'cart_total' => $Total_Redeem_points, 'item_list' => $item_list)));
			}
		}
		
		
		
		
	}	
	public function delete_item_catalogue()
	{
		$session_data = $this->session->userdata('cust_logged_in');
		$data['enroll'] = $session_data['enroll'];
		$data['Company_id']= $session_data['Company_id'];
		$data['smartphone_flag']= $session_data['smartphone_flag'];
		
		$Item_code=$_REQUEST["Item_code"];
		$Branch=$_REQUEST["Branch"];
		$Total_Redeem_points=$_REQUEST["Total_Redeem_points"];
	
		$result = $this->Redemption_Model->delete_item_catalogue($Item_code,$data['enroll'],$data['Company_id'],$Branch);
		
		redirect("Redemption_Catalogue/Proceed_Redemption_Catalogue/?Total_Redeem_points=".$Total_Redeem_points);
	}
	
	public function view_cart()
	{
				error_reporting(0);
				$session_data = $this->session->userdata('cust_logged_in');
				$Logged_user_enroll = $session_data['enroll'];
				$data['smartphone_flag']= $session_data['smartphone_flag'];
				
				
				$data['Redeemtion_details2'] = $this->Redemption_Model->get_total_redeeem_points($Logged_user_enroll);
				
				//$data['lp_array'] = $ref_array;

				$this->load->view('Redemption_Catalogue/view_item_list', $data);		
	}
	function Update_Merchandize_Cart()
	{
		$session_data = $this->session->userdata('cust_logged_in');
		$data['enroll'] = $session_data['enroll'];
		$data['Company_id']= $session_data['Company_id'];
		$data['smartphone_flag']= $session_data['smartphone_flag'];
		
		
		$Qty = $_REQUEST['Qty'];
		$Item_code = $_REQUEST['Item_code'];
		$Branch = $_REQUEST['Branch'];
		$Points = $_REQUEST['Points'];
		//$data["Total_Redeem_points"] =$_REQUEST["Total_Redeem_points"];
		
 		/***************Remove all records of same Item code************************/
			$result1 = $this->Redemption_Model->delete_item_catalogue($Item_code,$data['enroll'],$data['Company_id'],$Branch);
		/****************************************************************/
 		for($i=0;$i<$Qty;$i++)
		{	
			  $insert_data = array(
			'Item_code' => $Item_code,
			'Redemption_method' => 1,
			'Branch' => $Branch,
			'Points' => $Points,
			'Company_id' => $data['Company_id'],
			'Enrollment_id' => $data['enroll']
			);	         
			
			$result = $this->Redemption_Model->insert_item_catalogue($insert_data);
		}
		redirect('Redemption_Catalogue/Proceed_Redemption_Catalogue/?Total_Redeem_points='.$_REQUEST["Total_Redeem_points"]);   
	}
	
	
	
	
	public function Merchandize_Item_details()
	{
		if($this->session->userdata('cust_logged_in'))
		{
			$session_data = $this->session->userdata('cust_logged_in');
			$data['username'] = $session_data['username'];			
			$data['enroll'] = $session_data['enroll'];
			$data['userId']= $session_data['userId'];
			$data['Card_id']= $session_data['Card_id'];
			$data['Company_id']= $session_data['Company_id'];
			$data['smartphone_flag']= $session_data['smartphone_flag'];
			
			$data["Enroll_details"] = $this->Igain_model->get_enrollment_details($data['enroll']);
			$data["NotificationsCount"] = $this->Igain_model->Fetch_Open_Notification_Count($data['enroll'],$session_data['Company_id']);
			$data["NotificationsDetails"] = $this->Igain_model->FetchNotificationDetails($data['enroll'],$session_data['Company_id']);
			
			
			$Redemption_Items = $this->Redemption_Model->Get_Merchandize_Item_details($_GET['Company_merchandise_item_id']);
			$data['Redemption_Items'] = $Redemption_Items;
			
			foreach ($Redemption_Items as $product)
			{
				
				$itemCode = $product->Company_merchandize_item_code;
				
				 $Redemption_Items_branches_array[$itemCode] = $this->Redemption_Model->get_all_items_branches($product->Company_merchandize_item_code,$product->Company_id);
						
			}
			
			$data['Redemption_Items_branches'] = $Redemption_Items_branches_array;
			
			if($_GET['Company_merchandise_item_id'] != "")
			{
				
				$data["Item_details"] = $this->Redemption_Model->Get_Merchandize_Item_details($_GET['Company_merchandise_item_id']);
				$this->load->view('Redemption_Catalogue/Merchandize_item_details', $data);
			}
			else
			{
				redirect('Redemption_Catalogue');   
			}
		}
		else
		{
			redirect('Login', 'refresh');
		}
	}
	
	
	
	public function Insert_Redeem_Items()
	{
		if($this->session->userdata('cust_logged_in'))
		{
			$session_data = $this->session->userdata('cust_logged_in');
			$data['username'] = $session_data['username'];			
			$data['enroll'] = $session_data['enroll'];
			$data['userId']= $session_data['userId'];
			$data['Card_id']= $session_data['Card_id'];
			$data['Company_id']= $session_data['Company_id'];
			$emailid= $session_data['username'];
			$data['smartphone_flag']= $session_data['smartphone_flag'];
			
			$Company_website = base_url();
			$Current_balance=$this->input->post("Current_balance");
			$Full_name=$this->input->post("Full_name");
			$Total_Redeem_points=$this->input->post("Total_Redeem_points");
			
			$Company_details = $this->Igain_model->get_company_details($data['Company_id']);
			$Evoucher_expiry_period=$Company_details->Evoucher_expiry_period;
			
			$Trans_date=date("Y-m-d");
			$Trans_date12=date("d M Y");
			$Evoucher_expiry_date=date("Y-m-d",strtotime("+".$Evoucher_expiry_period." days"));
			
				
			
			$data["Item_details"] = $this->Redemption_Model->get_total_redeeem_points($data['enroll']);
			foreach($data["Item_details"] as $Item_details)
			{
				$characters = 'A123B56C89';
				$string = '';
				$Voucher_no="";
				for ($i = 0; $i < 16; $i++) 
				{
					$Voucher_no .= $characters[mt_rand(0, strlen($characters) - 1)];
				}
				$Voucher_status="Issued";
				
				 $insert_data = array(
				'Company_id' => $data['Company_id'],
				'Trans_type' => 10,
				'Redeem_points' => $Item_details["Points"],
				'Quantity' => $Item_details["Quantity"],
				'Trans_date' => $Trans_date,
				'Create_user_id' => $data['enroll'],
				'Enrollement_id' => $data['enroll'],
				'Card_id' => $data['Card_id'],
				'Item_code' => $Item_details["Item_code"],
				'Voucher_no' => $Voucher_no,
				'Voucher_status' => $Voucher_status,
				'Merchandize_Partner_id' => $Item_details["Partner_id"],
				'Merchandize_Partner_branch' => $Item_details["Branch"]
				);
				 $Insert = $this->Redemption_Model->Insert_Redeem_Items_at_Transaction($insert_data);
				$Current_balance=($Current_balance-$Item_details["Total_points"]);
				  $Voucher_array[]=$Voucher_no;
			}
			foreach($data["Item_details"] as $Item_details)
			{
				$Delete = $this->Redemption_Model->delete_item_catalogue($Item_details["Item_code"],$data['enroll'],$data['Company_id'],$Item_details["Branch"]);
			}
			/************************Update Current balance & Total Redeems*************/
			$data["Enroll_details"] = $this->Igain_model->get_enrollment_details($data['enroll']);
			$lv_Total_reddems=($data['Enroll_details']->Total_reddems+$Total_Redeem_points);
			$lv_Blocked_points=$data['Enroll_details']->Blocked_points;
			$Avialable_balance=($Current_balance-$lv_Blocked_points);
			$Update = $this->Redemption_Model->Update_Customer_Balance($Current_balance,$lv_Total_reddems,$data['enroll']);
			/*****************************************************************/
			$subject = "Redemption Transaction from Merchandizing Catalogue  of our ".$Company_details->Company_name ;
					$html = '<html xmlns="http://www.w3.org/1999/xhtml">';
					$html .= '<head><meta charset="utf-8"><meta name="viewport" content="width=device-width"><meta http-equiv="X-UA-Compatible" content="IE=edge"><link href="'.base_url().'assets/css/email_template2.css" rel="stylesheet" /></head>';
					
					$html .= '<body style="width: 100% !important;min-width: 100%;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100% !important;margin: 0;padding: 0;background-color: #FFFFFF">
					<table class="body" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;height: 100%;width: 100%;table-layout: fixed" cellpadding="0" cellspacing="0" width="100%" border="0">
						<tbody>
							<tr style="vertical-align: top">
								<td class="center" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;background-color: #FFFFFF" align="center" valign="top">

									<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: transparent" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
									<tbody>
									<tr style="vertical-align: top">
										<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%">
											<table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 1000px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%"><table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 1000px;color: #000000;background-color: transparent" cellpadding="0" cellspacing="0" width="100%" bgcolor="transparent"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0"><div class="col num12" style="display: inline-block;vertical-align: top;width: 100%"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent">						
											<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;width: 100%;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px" align="center">
											<div style="font-size:12px" align="center">
												<a href="#" target="_blank">
													<img class="center fullwidth" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;margin: 0 auto;float: none;width: 100% !important;max-width: 1000px" align="center" border="0" src="'.base_url().'images/redemption.jpg" alt="Image" title="Image" width="500">
												</a>
											</div></td></tr></tbody></table>
											</td></tr></tbody></table></div></td></tr></tbody></table></td></tr></tbody></table>
										</td>
									</tr>
									</tbody></table>
									
									<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: transparent" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
									<tbody><tr style="vertical-align: top">
										<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%">
											<table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 1000px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%"><table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 1000px;color: #333;background-color: #61626F" cellpadding="0" cellspacing="0" width="100%" bgcolor="#61626F"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0"><div class="col num12" style="display: inline-block;vertical-align: top;width: 100%"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
											<tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 20px;padding-right: 20px;padding-bottom: 20px;padding-left: 20px">
												<div style="color:#ffffff;line-height:120%;font-family:Helvetica;">            
													<div style="font-size:12px;line-height:14px;color:#ffffff;font-family:Helvetica;text-align:left;"><p style="margin: 0;font-size: 18px;line-height: 22px;text-align: left"><span style="font-size: 18px; line-height: 28px;"><strong>
														Dear  '.$Full_name.',
													</strong></span></p></div>
												</div>
											</td></tr></tbody></table>
											<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
											  <tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 0px;padding-right: 20px;padding-bottom: 20px;padding-left: 20px">
													<div style="color:#B8B8C0;line-height:150%;font-family:Helvetica;">            
														<div style="font-size:14px;line-height:18px;color:#B8B8C0;font-family:Helvetica;text-align:left;"><p style="margin: 0;font-size: 14px;line-height: 21px;text-align: left"><span style="font-size: 14px; line-height: 21px;">													
															
														Thank You for Redeeming  Item(s)  from our Merchandize Catalogue. Please find below the details of your transaction. <br><br>
														<strong>Redemption Date:</strong> '.$Trans_date. '<br><br>
														
														<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;" bordercolor="#FFFFFF" cellpadding="0" cellspacing="0" width="100%">
														
														<tbody>
															<tr style="vertical-align: top">
																
																<td style="color: #fff; font-family: Helvetica; border: 1px solid #eee; text-align: center; font-size: 14px; font-weight: 600; line-height: 20px;">
																	Merchandize Item
																</td>
																<td style="color: #fff; font-family: Helvetica; border: 1px solid #eee; text-align: center; font-size: 14px; font-weight: 600; line-height: 20px;">
																	E-Voucher No.
																</td>
																<td style="color: #fff; font-family: Helvetica; border: 1px solid #eee; text-align: center; font-size: 14px; font-weight: 600; line-height: 20px;padding: 5px;">
																	Quantity
																</td>
																<td style="color: #fff; font-family: Helvetica; border: 1px solid #eee; text-align: center; font-size: 14px; font-weight: 600; line-height: 20px;">
																	Redeem Points
																</td>
																<td style="color: #fff; font-family: Helvetica; border: 1px solid #eee; text-align: center; font-size: 14px; font-weight: 600; line-height: 20px;">
																	Total Redeem Points
																</td>
																<td style="color: #fff; font-family: Helvetica; border: 1px solid #eee; text-align: center; font-size: 14px; font-weight: 600; line-height: 20px;">
																	Partner Branch
																</td>
																<td style="color: #fff; font-family: Helvetica; border: 1px solid #eee; text-align: center; font-size: 14px; font-weight: 600; line-height: 20px;">
																	Branch Address
																</td>
																<td style="color: #fff; font-family: Helvetica; border: 1px solid #eee; text-align: center; font-size: 14px; font-weight: 600; line-height: 20px;">
																	Status
																</td>
															
															<tr>';
															
															$i=0;		
															
															foreach($data["Item_details"] as $Item_details)
															{																
																$Grand_Total_Redeem_points[]=$Item_details["Total_points"];
																
																
																$html .= "
																			<tr style='vertical-align: top'>
																				<td style='color: #fff; font-family: Helvetica; border: 1px solid #eee; font-size: 14px; line-height: 20px; text-align: left; padding: 5px;'>
																					".$Item_details["Merchandize_item_name"]. "
																				</td>
																				<td style='color: #fff; font-family: Helvetica; text-align: center; border: 1px solid #eee; font-size: 14px; line-height: 20px; text-align: left; padding: 5px;'>
																					".$Voucher_array[$i]. "
																				</td>
																				<td style='color: #fff; font-family: Helvetica; text-align: center; border: 1px solid #eee; font-size: 14px; line-height: 20px; padding: 5px;'>
																					".$Item_details["Quantity"]. "
																				</td>
																				<td style='color: #fff; font-family: Helvetica; text-align: center; border: 1px solid #eee; font-size: 14px; line-height: 20px; padding: 5px;'>
																					".$Item_details["Points"]. "
																				</td>
																				<td style='color: #fff; font-family: Helvetica; text-align: center; border: 1px solid #eee; font-size: 14px; line-height: 20px; padding: 5px;'>
																					".$Item_details["Total_points"]. "
																				</td>
																				<td style='color: #fff; font-family: Helvetica; text-align: center; border: 1px solid #eee; font-size: 14px; line-height: 20px; padding: 5px;'>
																					".$Item_details["Branch_name"]. "
																				</td>
																				<td style='color: #fff; font-family: Helvetica; text-align: center; border: 1px solid #eee; font-size: 14px; line-height: 20px; padding: 5px;'>
																					".$Item_details["Address"]. "
																				</td>
																				
																				<td style='color: #fff; font-family: Helvetica; text-align: center; border: 1px solid #eee; font-size: 14px; line-height: 20px; padding: 5px;'>
																					Issued
																				</td>
																			</tr>";
																	$i++;	
																
															}
															
													$html .='												
															<tr style="vertical-align: top">															
																<td style="color: #fff; font-family: Helvetica; text-align: right; border: 1px solid #eee; font-size: 14px; line-height: 20px; text-align: left; padding: 5px;">
																	<strong>Grand Total Points : </strong>
																</td>
																<td colspan="5" style="color: #fff; font-family: Helvetica; border: 1px solid #eee; font-size: 14px; line-height: 20px; text-align: left; padding: 5px;">
																	&nbsp;&nbsp;&nbsp;<strong>'.$Total_Redeem_points.' Points</strong>
																</td>															
															<tr>
															
															<tr style="vertical-align: top">															
																<td style="color: #fff; font-family: Helvetica; text-align: right; border: 1px solid #eee; font-size: 14px; line-height: 20px; text-align: left; padding: 5px;">
																	<strong>Available Balance : </strong>
																</td>
																<td colspan="5" style="color: #fff; font-family: Helvetica; border: 1px solid #eee; font-size: 14px; line-height: 20px; text-align: left; padding: 5px;">
																	&nbsp;&nbsp;&nbsp;<strong>'.$Avialable_balance.' Points</strong>
																</td>															
															<tr>
															
															</tbody>
														
														</table>
														
												</td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></td></tr></tbody></table>
										</td></tr></tbody></table>
										
										<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: transparent" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
										<tbody><tr style="vertical-align: top">
											<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%">';
										
										$html .='<table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 1000px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%"><table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 1000px;color: #333;background-color: #F0F0F0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F0F0F0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0"><div class="col num12" style="display: inline-block;vertical-align: top;width: 100%"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 0px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent">';
										
										$html .='<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
											<tbody><tr style="vertical-align: top">
												<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 15px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px">
													<div style="color:#959595;line-height:150%;font-family:Helvetica;">            
														<div style="font-size:12px;line-height:18px;color:#959595;font-family:Helvetica;text-align:left;">
															<div class="txtTinyMce-wrapper" style="font-size:12px; line-height:18px;">
																<p style="margin: 0;font-size: 14px;line-height: 21px;text-align: center">You can also visit the below link using your login credentials and check details.</strong> Visit <span style="text-decoration: underline; font-size: 14px; line-height: 21px;">
																	<a style="color:#C7702E" title="Customer Website" href="'.$Company_details->Website.'" target="_blank">Customer Website</a></span>
																</p>
																
																<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
																<tbody><tr style="vertical-align: top">
																	<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
																		<div style="height: 1px;">
																			<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 1px solid #DADADA;width: 100%" align="center" border="0" cellspacing="0">
																				<tbody><tr style="vertical-align: top">
																					<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" align="center"></td>
																				</tr>
																			</tbody></table>
																		</div>
																	</td>
																</tr></tbody>
																</table>';
													
													if( $Company_details->Cust_apk_link != "" || $Company_details->Cust_ios_link != "")
													{
														$html .='<p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center"><strong><span style="font-size: 18px; line-height: 28px;">You can also download Android & iOS App</span></strong></p>
														
														<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" align="center" valign="top">
														  <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" border="0" cellspacing="0" cellpadding="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;max-width: 156px" align="center" valign="top">
																<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" width="100%" align="left" cellpadding="0" cellspacing="0" border="0">
																<tbody><tr style="vertical-align: top">
																	<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" align="left" valign="middle">';
																	
																	if($Company_details->Cust_apk_link != "")
																	{
																		$html .='<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 5px 0" align="left" border="0" cellspacing="0" cellpadding="0" height="37">
																		<tbody><tr style="vertical-align: top">
																			<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="37" align="left" valign="middle">
																				<a href="'.$Company_details->Cust_apk_link.'" title="Google Play" target="_blank">
																					<img style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important" src="'.base_url().'images/Gooogle_Play.png" alt="Google Play" title="Google Play" width="32">
																				</a>
																			</td>
																		  </tr>
																		</tbody></table>';
																	}
																	
																	if($Company_details->Cust_ios_link != "")
																	{
																		$html .='<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;padding: 0 5px 5px 0" align="left" border="0" cellspacing="0" cellpadding="0" height="37">
																		<tbody><tr style="vertical-align: top">
																			<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="37" align="left" valign="middle">
																				<a href="'.$Company_details->Cust_ios_link.'" title="App Store" target="_blank">
																					<img style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;max-width: 32px !important" src="'.base_url().'images/iOs_app_store.png" alt="App Store" title="App Store" width="32">
																				</a>
																			</td>
																		  </tr>
																		</tbody></table>';
																	}
																	
																$html .='</td>
																  </tr></tbody>
																</table></td></tr></tbody>
															</table></td></tr></tbody>
														</table>';
													}
													
													$html .='</div>
														</div>
													</div>
												</td>
											  </tr></tbody>
											</table>
											
											</td></tr></tbody></table></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody>
										</table>
										
										<table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: #ffffff" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
										<tbody><tr style="vertical-align: top">
											<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%">
												<table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 1000px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%"><table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 1000px;color: #333;background-color: #2C2D37" cellpadding="0" cellspacing="0" width="100%" bgcolor="#2C2D37"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0"><div class="col num12" style="display: inline-block;vertical-align: top;width: 100%"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 15px;padding-right: 0px;padding-bottom: 15px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
												<tbody><tr style="vertical-align: top">
												<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 0px;padding-right: 15px;padding-bottom: 0px;padding-left: 15px">
													<div style="color:#959595;line-height:150%;font-family:Helvetica;">            
														<div style="font-size:12px;line-height:18px;color:#959595;font-family:Helvetica;text-align:left;"><div class="txtTinyMce-wrapper" style="font-size:12px; line-height:18px;"><p style="margin: 0;font-size: 14px;line-height: 21px;text-align: left"><span style="font-size: 12px; line-height: 18px;"><em>
															<strong>DISCLAIMER:</strong> This e-mail message is proprietary to '.$Company_details->Company_name.' and is intended solely for the use of the entity to whom it is addressed. It may contain privileged or confidential information exempt from disclosure as per applicable law. 
															If you are not the intended recipient or responsible for delivery to the intended recipient,
															you may not copy, deliver, distribute or print this message. The message and its contents have been virus checked. But the recipients may conduct their own. '.$Company_details->Company_name.' will not accept any claims for damages arising out of viruses.<br>
															Thank you for your cooperation.
														</em></span></p></div></div>
													</div>
												</td>
											  </tr></tbody></table>
										</td></tr></tbody></table></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></table></td></tr></tbody>
									</table>
								</td>
							</tr>
						</tbody>
						</table>
					</body>
					</html>';
		
			
			
			
							//echo "<br>".$html;	
						
							
					$Email_content = array(
						'Redemption_details' => $html,
						'subject' => $subject,
						'Notification_type' => 'Redemption',
						'Template_type' => 'Redemption'
					);
					
					$Notification=$this->send_notification->send_Notification_email($data['enroll'],$Email_content,'0',$data['Company_id']);
			
		
		
			//die;
			
			// var_dump($Update);
			// die;
			if($Insert == true)
			{
				//$this->session->set_flashdata("upload_error_code",$this->upload->display_errors());
				$this->session->set_flashdata("Redeem_flash","Your have redeemed successfully, please check your email for your  voucher number(s). Once received kindly visit the Merchandize Partner Location for your item(s) within ".$Evoucher_expiry_period." days !!");
			}
			else
			{
				$this->session->set_flashdata("Redeem_flash","Redeem  Error!!");
			}
			redirect('Redemption_Catalogue'); 
			
		}
		else
		{
			redirect('Login', 'refresh');
		}
	}
	
	
	
	/************************************************AMIT*****************************************************************/
	
	
	
	
	
	
	
	
	
	
	
}
