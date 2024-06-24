<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Register_saas_company extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();		
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		// $this->load->model('Saas_model');
		$this->load->library('form_validation');	
		$this->load->library('Send_notification');
		$this->load->helper(array('form', 'url','encryption_val'));	
	
	}

	public function index()
	{		
		$FetchCountry = $this->Saas_model->FetchCountry();	
			$data['Country_array'] = $FetchCountry;				
			$data['License_type'] = $this->Saas_model->Get_Code_decode_master(20);		
				
		// $this->load->view('Saas_company/Introduction_Saas_Company',$data);
		$this->load->view('Saas_company/Create_Saas_Company2',$data);
		// $this->load->view('Saas_company/Create_Saas_Company',$data);
		// $this->load->view('Saas_company/Create_Saas_CompanyCopy',$data);
	}
	public function Create_Saas_Company2()
	{		
		

			$FetchCountry = $this->Saas_model->FetchCountry();	
			$data['Country_array'] = $FetchCountry;				
			$data['License_type'] = $this->Saas_model->Get_Code_decode_master(20);
				
				// $this->load->view('Saas_company/Introduction_Saas_Company',$data);
				// $this->load->view('Saas_company/Create_Saas_Company2',$data);
				// $this->load->view('Saas_company/Create_Saas_Company',$data);
				// $this->load->view('Saas_company/Create_Saas_CompanyCopy',$data);
	}
	public function Create_Saas_Company()
	{		
		

			$FetchCountry = $this->Saas_model->FetchCountry();	
			$data['Country_array'] = $FetchCountry;				
			$data['License_type'] = $this->Saas_model->Get_Code_decode_master(20);
				
				$this->load->view('Saas_company/Create_Saas_Company3',$data);
				// $this->load->view('Saas_company/Create_Saas_Company',$data);
				// $this->load->view('Saas_company/Create_Saas_CompanyCopy',$data);
	}
	public function Complete_Saas_Company()
	{		
		

			$FetchCountry = $this->Saas_model->FetchCountry();	
			$data['Country_array'] = $FetchCountry;				
			$data['License_type'] = $this->Saas_model->Get_Code_decode_master(20);
				
				$this->load->view('Saas_company/Complete_Saas_Company',$data);
	}
	
	public function insert_saas_company_master()
	{
	

		//************************Company Setup*****************************
		/*-----------------------File Upload---------------------*/
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1920';
			$config['max_height'] = '1280';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			/*-----------------------File Upload---------------------*/
		/* Create the config for image library */
		
				$configThumb = array();
				$configThumb['image_library'] = 'gd2';
				$configThumb['source_image'] = '';
				$configThumb['create_thumb'] = TRUE;
				$configThumb['maintain_ratio'] = TRUE;
		
				$configThumb['width'] = 128;
				$configThumb['height'] = 128;
				/* Load the image library */
				$this->load->library('image_lib');
				
				
				$upload22 = $this->upload->do_upload('Company_logo');
				$data22 = $this->upload->data();
			   
				if($data22['is_image'] == 1) 
				{						 
					$configThumb['source_image'] = $data22['full_path'];
					$configThumb['source_image'] = './uploads/'.$upload22;
					$this->image_lib->initialize($configThumb);
					$this->image_lib->resize();
					$filepath_logo='uploads/'.$data22['file_name'];
				}
				else
				{
					$filepath_logo = '';
				}
				if($_REQUEST['Joining_bonus']==1)
				{
					$Joining_bonus_points = $_REQUEST['Joining_bonus_points'];
				}
				else
				{
					$_REQUEST['Joining_bonus']=0;
					$Joining_bonus_points = 0;
				}		
		$Post_data1=array(
						'Company_name'=>$_REQUEST['Company_name'],
						'Company_address'=>$_REQUEST['Company_address'],
						'Company_primary_contact_person'=>$_REQUEST['First_name'].''.$_REQUEST['Last_name'],
						'Company_primary_email_id'=>$_REQUEST['Company_primary_email_id'],
						'Company_contactus_email_id'=>$_REQUEST['Company_primary_email_id'],
						'Company_primary_phone_no'=>$_REQUEST['Company_primary_phone_no'],
						'Domain_name'=>$_REQUEST['Domain_name'],
						'App_folder_name'=>$_REQUEST['Domain_name'],
						'Alise_name'=>$_REQUEST['Domain_name'],
						'Company_username'=>$_REQUEST['Domain_name'],
						'Company_password'=>$_REQUEST['Domain_name'].'@2021',
						'Country'=>$_REQUEST['Country'],
						'Seller_licences_limit'=>$_REQUEST['Seller_licences_limit'],
						'Limit_Balance_Merchant'=>$_REQUEST['Seller_licences_limit'],
						'Company_logo'=>$filepath_logo,
						'Localization_logo'=>$filepath_logo,
						'Redemptionratio'=>$_REQUEST['Redemptionratio'],
						'Joining_bonus'=>$_REQUEST['Joining_bonus'],
						'Joining_bonus_points'=>$Joining_bonus_points,
						'Company_License_type'=>$_REQUEST['Company_License_type'],
						'Label_1'=>$_REQUEST['Sector'],
						'Comp_regdate'=> date('Y-m-d H:i:s'),
						'Creation_date_time'=> date('Y-m-d H:i:s'),
						'Saas_company_flag'=> 2,
						'Parent_company'=> 1,
						'Activated'=> 1,
						);
		$Saas_Company_id = $this->Saas_model->insert_saas_company_master($Post_data1);
		
		//************************Enrollment Setup*****************************
		//Enroll Owner as Super Seller
		$Post_data112=array(
						'User_email_id'=> App_string_encrypt($_REQUEST['Company_primary_email_id']),
						'User_pwd'=> App_string_encrypt("outlet@".$_REQUEST['Domain_name']),
						'Seller_Redemptionratio'=>$_REQUEST['Redemptionratio'],
						'joined_date'=> date('Y-m-d H:i:s'),
						'First_name'=>$_REQUEST['First_name'],
						'Last_name'=>$_REQUEST['Last_name'],
						'Country'=>$_REQUEST['Country'],
						'Country_id'=>$_REQUEST['Country'],
						'timezone_entry'=>$_REQUEST['timezone_entry'],
						'User_activated'=> 1,
						'Super_seller'=> 1,
						'User_id'=> 2,
						'Company_id'=>$Saas_Company_id,
						);
			$Owner_id = $this->Saas_model->insert_saas_enroll_master($Post_data112);
			
		//Enroll Outlet as Sub seller	
		for($i=1;$i<=$_REQUEST['Seller_licences_limit'];$i++)
		{
			$User_email_id = "outlet$i@".$_REQUEST['Domain_name'].'.com';
			$Seller_email_id[] = "outlet$i@".$_REQUEST['Domain_name'].'.com';
			$Seller_pass[] = "outlet$i@".$_REQUEST['Domain_name'];
			$Post_data11=array(
						'User_email_id'=> App_string_encrypt($User_email_id),
						'User_pwd'=> App_string_encrypt("outlet$i@".$_REQUEST['Domain_name']),
						'Seller_Redemptionratio'=>$_REQUEST['Redemptionratio'],
						'joined_date'=> date('Y-m-d H:i:s'),
						'Country'=>$_REQUEST['Country'],
						'Country_id'=>$_REQUEST['Country'],
						'timezone_entry'=>$_REQUEST['timezone_entry'],
						'User_activated'=> 1,
						'User_id'=> 2,
						'Sub_seller_Enrollement_id'=> $Owner_id,
						'Sub_seller_admin'=> 1,
						'Super_seller'=> 0,
						'Company_id'=>$Saas_Company_id,
						);
			$Outlet_id = $this->Saas_model->insert_saas_enroll_master($Post_data11);
		}
		
		//************************Loyalty Setup*****************************
		$loyalty_rule_setup = $this->input->post("loyalty_rule_setup");
		$Loyalty_name = $loyalty_rule_setup."-".$this->input->post("Loyalty_name");
					
		$Post_data2=array(
						'Loyalty_name'=>$Loyalty_name,
						'From_date'=> date("Y-m-d H:i:s"),
						'Till_date' => date("Y-m-d",strtotime('+12 month')),
						'Loyalty_at_transaction'=>$_REQUEST['Loyalty_at_transaction'],
						'Company_id'=>$Saas_Company_id,
						'Seller'=>$Owner_id,
						'Active_flag'=> 1,
						);
		$result = $this->Saas_model->insert_saas_loyalty_master($Post_data2);
		
		//************************Refferral Setup*****************************
		$Refferral_bonus = $this->input->post("Refferral_bonus_points");
					
		$Post_data211=array(
						'Customer_topup'=>$Refferral_bonus,
						'Refree_topup'=>$Refferral_bonus,
						'From_date'=> date("Y-m-d H:i:s"),
						'Till_date' => date("Y-m-d",strtotime('+12 month')),
						'Referral_rule_for'=> 1,
						'Company_id'=>$Saas_Company_id,
						'Seller_id'=>$Owner_id,
						);
		$result = $this->Saas_model->insert_saas_refferral_master($Post_data211);
		//************************Tier Setup*****************************
					
		$Post_data2=array(
						'Tier_name'=> 'Bronze',
						'Excecution_time'=> 'Yearly',
						'Tier_criteria'=> 1,
						'Tier_level_id'=> 1,
						'Criteria_value'=> 500,
						'Operator_id'=> 5,
						'Redeemtion_limit'=> 0,
						'Company_id'=>$Saas_Company_id,
						'Create_date'=> date('Y-m-d'),
						'Active_flag'=> 1,
						);
		$result = $this->Saas_model->insert_saas_tier_master($Post_data2);
		//*********************************Assign Menues to Company**************
		$All_Saas_menus = $this->Saas_model->Get_saas_company_menus($_REQUEST['Company_License_type']);
		if($All_Saas_menus != NULL)
		{
			foreach($All_Saas_menus as $menu)
			{
				// Assign to Saas Company
				$Menu_array = array(
					'Company_id' => $Saas_Company_id,
					'Menu_id' => $menu->Menu_id,
					'Menu_level' => $menu->Menu_level,
					'Menu_name' => $menu->Menu_name,
					'Parent_menu_id' => $menu->Parent_menu_id,
					'Menu_href' => $menu->Menu_href,
					'Active_flag' => $menu->Active_flag
				);
				$insert_saas_company_menus = $this->Saas_model->insert_company_menus($Saas_Company_id,$Menu_array);
				
				//******************************** Assign to Super Seller********************************
				$post_data = array(					
					'Company_id' => $Saas_Company_id,
					'User_type_id' => 2,
					'Enrollment_id' => $Owner_id,
					'Menu_id' => $menu->Menu_id,
					'Menu_level' => $menu->Menu_level,
					'Parent_id' => $menu->Parent_menu_id
				);
				$result2 = $this->Saas_model->assign_menu($post_data);
				
				// ********************************Assign to Outlet********************************
				$Outlet_menu_array = array('1','2','3','4','5','6','7','8','9','12','13','83','89','90');
				if(array_search($menu->Menu_id,$Outlet_menu_array) != NULL)
				{
					$post_data = array(					
						'Company_id' => $Saas_Company_id,
						'User_type_id' => 2,
						'Enrollment_id' => $Outlet_id,
						'Menu_id' => $menu->Menu_id,
						'Menu_level' => $menu->Menu_level,
						'Parent_id' => $menu->Parent_menu_id
					);
					$result2 = $this->Saas_model->assign_menu($post_data);
				}
			}
		}
		
		  $Email_content = array(
              'Notification_type' => 'Welcome to '.$_REQUEST['Company_name'],
              'Company_primary_email_id' => $_REQUEST['Company_primary_email_id'],
              'User_pwd' => "outlet@".$_REQUEST['Domain_name'],
              'Seller_email_id' => $Seller_email_id,
              'Seller_pass' => $Seller_pass,
              'Template_type' => 'Saas_company_registration'
          );
		  
		$this->send_notification->send_Notification_email($Owner_id, $Email_content, $Owner_id, $Saas_Company_id);
		redirect('Register_saas_company/Complete_Saas_Company');
				die;
		
	}
	public function Auto_Process_saas_company()
	{
		$this->load->library('user_agent');
		if(!is_dir('amit'))
			{
				$result = mkdir('amit',0,true);
				echo "<br>amit created;<br>";
			}
		if ($this->agent->is_browser())
		{
				$agent = $this->agent->browser().' '.$this->agent->version();
				echo $agent;
				die;
		}
		
		
		 // mkdir("amit");
		//****************Create Customer Website Domain instance********************************
		$Company_details = $this->Saas_model->Fetch_Saas_Company();
		foreach($Company_details as $Company_Records)
		{
				
				$src = 'novacom';
				$Company_id= $Company_Records['Company_id'];
				$Company_name= $Company_Records['Domain_name'];
				if(!is_dir("$Company_name")){
				 mkdir("$Company_name",0777,true);
				 chmod("$Company_name",0755);
				  echo "<br>$Company_name Created";
				}
				else
				{
					 echo "<br>$Company_name Already Created";
				}					
				
				$files1 = scandir($src);
				echo FCPATH;
				$dirPath = "$Company_name";
				// die;
					  foreach($files1 as $file){
						   echo "<br>".$file;
						   echo "<br>";
						  //-------------------------------------------------------------------
						  if(!is_dir("$Company_name/$file")){
							 mkdir("$Company_name/$file",0777,true);
							 chmod("$Company_name/$file",0755);
							}
							$src2 = "$src/$file";
							$dirPath2 = "$dirPath/$file";
							$files2 = glob("$src/$file/*.*");
							if($files2 != NULL){
							foreach($files2 as $file3){
								$file_to_go = str_replace($src2,$dirPath2,$file3);
								copy($file3, $file_to_go);
							}
							}
							//-----------------------------------------------------------
							$files11 = scandir($src2);
							// print_r($files1);
							if($files11 != NULL){
							foreach($files11 as $file2){
							  // echo "<br>".$file2;
								 if(!is_dir("$Company_name/$file/$file2")){
								 mkdir("$Company_name/$file/$file2",0777,true);
								 chmod("$Company_name/$file/$file2",0755);
								}
								$src22 = "$src/$file/$file2";
								$dirPath22 = "$dirPath/$file/$file2";
								$files22 = glob("$src/$file/$file2/*.*");
								if($files22 != NULL){
								foreach($files22 as $file33){
									$file_to_go33 = str_replace($src22,$dirPath22,$file33);
									copy($file33, $file_to_go33);
									// chmod("$Company_name/$file/$file2",0755);
								}
								}
								
								//-----------------------------------------------------------
								$files111 = scandir($src22);
								// print_r($files1);
								if($files111 != NULL){
								foreach($files111 as $file21){
								  // echo "<br>".$file2;
									 if(!is_dir("$Company_name/$file/$file2/$file21")){
									 mkdir("$Company_name/$file/$file2/$file21",0777,true);
									 chmod("$Company_name/$file/$file2/$file21",0755);
									}
									$src221 = "$src/$file/$file2/$file21";
									$dirPath221 = "$dirPath/$file/$file2/$file21";
									$files221 = glob("$src/$file/$file2/$file21/*.*");
									if($files221 != NULL){
									foreach($files221 as $file331){
										$file_to_go331 = str_replace($src221,$dirPath221,$file331);
										copy($file331, $file_to_go331);
										// chmod("$Company_name/$file/$file2",0755);
										}
									}
									
										//-----------------------------------------------------------
									$files1112 = scandir($src221);
									// print_r($files1);
									if($files1112 != NULL){
									foreach($files1112 as $file212){
									  // echo "<br>".$file2;
										 if(!is_dir("$Company_name/$file/$file2/$file21/$file212")){
										 mkdir("$Company_name/$file/$file2/$file21/$file212",0777,true);
										 chmod("$Company_name/$file/$file2/$file21/$file212",0755);
										}
										$src2212 = "$src/$file/$file2/$file21/$file212";
										$dirPath2212 = "$dirPath/$file/$file2/$file21/$file212";
										$files2212 = glob("$src/$file/$file2/$file21/$file212/*.*");
										if($files2212 != NULL){
										foreach($files2212 as $file3312){
											$file_to_go3312 = str_replace($src2212,$dirPath2212,$file3312);
											copy($file3312, $file_to_go3312);
											// chmod("$Company_name/$file/$file2",0755);
											}
										}
										
										
									}
									}
									
									
								}
								}
								
							}
							}
					}
				$Base_url = FCPATH.$Company_name;
				// echo $Base_url;
				$str=file_get_contents($Base_url.'/application/config/config.php');
				
				$str=str_replace("$src", "$Company_name",$str);
				file_put_contents($Base_url.'/application/config/config.php', $str); 
				
		//**************************CUSTOMER WEBSITE END-----------------------
		//**********************************Create CUSTOMER APP Domain instance****************************
				
				$src = 'artcaffeAppnew';
				$Company_name= $Company_Records['Domain_name'].'App';
				if(!is_dir("$Company_name")){
				 mkdir("$Company_name",0777,true);
				 chmod("$Company_name",0755);
				 echo "<br>$Company_name Created";
				}
				else
				{
					// echo "<br>Already Created";
				}					
				
				$files1 = scandir($src);
				// echo FCPATH;
				$dirPath = "$Company_name";
				// die;
					  foreach($files1 as $file){
						   // echo "<br>".$file;
						   // echo "<br>";
						  //-------------------------------------------------------------------
						  if(!is_dir("$Company_name/$file")){
							 mkdir("$Company_name/$file",0777,true);
							 chmod("$Company_name/$file",0755);
							}
							$src2 = "$src/$file";
							$dirPath2 = "$dirPath/$file";
							$files2 = glob("$src/$file/*.*");
							if($files2 != NULL){
							foreach($files2 as $file3){
								$file_to_go = str_replace($src2,$dirPath2,$file3);
								copy($file3, $file_to_go);
							}
							}
							//-----------------------------------------------------------
							$files11 = scandir($src2);
							// print_r($files1);
							if($files11 != NULL){
							foreach($files11 as $file2){
							  // echo "<br>".$file2;
								 if(!is_dir("$Company_name/$file/$file2")){
								 mkdir("$Company_name/$file/$file2",0777,true);
								 chmod("$Company_name/$file/$file2",0755);
								}
								$src22 = "$src/$file/$file2";
								$dirPath22 = "$dirPath/$file/$file2";
								$files22 = glob("$src/$file/$file2/*.*");
								if($files22 != NULL){
								foreach($files22 as $file33){
									$file_to_go33 = str_replace($src22,$dirPath22,$file33);
									copy($file33, $file_to_go33);
									// chmod("$Company_name/$file/$file2",0755);
								}
								}
								
								//-----------------------------------------------------------
								$files111 = scandir($src22);
								// print_r($files1);
								if($files111 != NULL){
								foreach($files111 as $file21){
								  // echo "<br>".$file2;
									 if(!is_dir("$Company_name/$file/$file2/$file21")){
									 mkdir("$Company_name/$file/$file2/$file21",0777,true);
									 chmod("$Company_name/$file/$file2/$file21",0755);
									}
									$src221 = "$src/$file/$file2/$file21";
									$dirPath221 = "$dirPath/$file/$file2/$file21";
									$files221 = glob("$src/$file/$file2/$file21/*.*");
									if($files221 != NULL){
									foreach($files221 as $file331){
										$file_to_go331 = str_replace($src221,$dirPath221,$file331);
										copy($file331, $file_to_go331);
										// chmod("$Company_name/$file/$file2",0755);
									}
									}
									
										//-----------------------------------------------------------
									$files1112 = scandir($src221);
									// print_r($files1);
									if($files1112 != NULL){
									foreach($files1112 as $file212){
									  // echo "<br>".$file2;
										 if(!is_dir("$Company_name/$file/$file2/$file21/$file212")){
										 mkdir("$Company_name/$file/$file2/$file21/$file212",0777,true);
										 chmod("$Company_name/$file/$file2/$file21/$file212",0755);
										}
										$src2212 = "$src/$file/$file2/$file21/$file212";
										$dirPath2212 = "$dirPath/$file/$file2/$file21/$file212";
										$files2212 = glob("$src/$file/$file2/$file21/$file212/*.*");
										if($files2212 != NULL){
										foreach($files2212 as $file3312){
											$file_to_go3312 = str_replace($src2212,$dirPath2212,$file3312);
											copy($file3312, $file_to_go3312);
											// chmod("$Company_name/$file/$file2",0755);
										}
										}
										
										
									}
									}
									
									
								}
								}
								
							}
							}
					}
				$Base_url = FCPATH.$Company_name;
				// echo $Base_url;
				$str=file_get_contents($Base_url.'/application/config/config.php');
				
				$str=str_replace("$src", "$Company_name",$str);
				file_put_contents($Base_url.'/application/config/config.php', $str); 
				
				$Update = $this->Saas_model->Update_saas_company_flag($Company_id);
		//**************************CUSTOMER WEBSITE END----------------------------------------------------		
		}
	}
}
?>
<style>

</style>
	
