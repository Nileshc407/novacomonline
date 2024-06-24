<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beneficiary_model extends CI_Model
{
	
	public function Get_Beneficiary_Company($companyID)
	{
		$this->db->select("*");
		$this->db->from("igain_register_beneficiary_company as a");
		$this->db->join("igain_beneficiary_company as b","a.Register_beneficiary_id = b.Register_beneficiary_id");
		//$this->db->join("igain_company_master as c","a.Igain_company_id = c.Company_id");
		$this->db->where(array("b.Company_id" =>$companyID));
		$query = $this->db->get();
		// echo $this->db->last_query()."<br>";		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {                    
				 $data[] = $row;
			}
			return $data;
		}
	}
	public function Get_Beneficiary_Company_Category($companyID,$Publishers_category,$Enrollment_id)
	{ 
            $this->db->select("*");
            $this->db->from("igain_register_beneficiary_company as a");
            
            $this->db->join("igain_beneficiary_company as b","a.Register_beneficiary_id = b.Register_beneficiary_id");
            
            $this->db->join("igain_cust_beneficiary_account as c","a.Register_beneficiary_id = c.Beneficiary_company_id","LEFT");
            
            $this->db->where(array("b.Company_id" =>$companyID, "a.Publishers_category" =>$Publishers_category));
            
            $this->db->group_by('a.Register_beneficiary_id','desc');
            $query = $this->db->get();
            //echo $this->db->last_query()."-------------<br>";		
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {                    
                     $data[] = $row;
                }
                return $data;
            }
	}	
	public function Get_Beneficiary_Company_2($companyID)
	{
            $this->db->select("*");
            $this->db->from("igain_register_beneficiary_company as a");
            $this->db->join("igain_beneficiary_company as b","a.Register_beneficiary_id = b.Register_beneficiary_id");
            //$this->db->join("igain_company_master as c","a.Igain_company_id = c.Company_id");
            $this->db->where(array("a.Register_beneficiary_id" =>$companyID));
            $query = $this->db->get();
          // echo $this->db->last_query()."<br>";		
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {                    
                     $data[] = $row;
                }
                return $data;
            }
	}
	
	public function Get_Beneficiary_members($companyID,$Enrollment_id,$Publishers_category)
	{
		$this->db->select("*");
		$this->db->from("igain_cust_beneficiary_account as a");
		$this->db->join("igain_register_beneficiary_company as b","a.Beneficiary_company_id = b.Register_beneficiary_id");
		//$this->db->join("igain_company_master as c","a.Company_id = c.Company_id");
		$this->db->where(array("a.Company_id" =>$companyID,"a.Enrollment_id" =>$Enrollment_id,"a.Active_flag" =>1, "b.Publishers_category" =>$Publishers_category));
		$this->db->order_by('Beneficiary_account_id','desc');
		$query = $this->db->get();
		// echo $this->db->last_query()."<br>";
	
		if ($query->num_rows() > 0)
			   {
			   foreach ($query->result() as $row)
					   {
			   $data[] = $row;
		   }
		   return $data;
	   }
 
	}
	public function Get_Beneficiary_members_linkage($companyID,$Enrollment_id,$Publishers_category)
	{
		$this->db->select("*");
		$this->db->from("igain_cust_beneficiary_account as a");
		$this->db->join("igain_register_beneficiary_company as b","a.Beneficiary_company_id = b.Register_beneficiary_id");
		//$this->db->join("igain_company_master as c","a.Company_id = c.Company_id");
		$this->db->where(array("a.Self_enroll" =>1,"a.Company_id" =>$companyID,"a.Enrollment_id" =>$Enrollment_id,"b.Publishers_category" =>$Publishers_category));
		$this->db->order_by('Beneficiary_account_id','desc');
		$query = $this->db->get();
		// echo $this->db->last_query();
	
		if ($query->num_rows() > 0)
			   {
			   foreach ($query->result() as $row)
					   {
			   $data[] = $row;
		   }
		   return $data;
	   }
 
	}
	public function Get_Beneficiary_members_account($companyID,$Enrollment_id)
	{  
		$this->db->select("*");
		$this->db->from("igain_cust_beneficiary_account as a");
		$this->db->join("igain_register_beneficiary_company as b","a.Beneficiary_company_id = b.Register_beneficiary_id");
		//$this->db->join("igain_company_master as c","a.Company_id = c.Company_id");
		$this->db->where(array("a.Company_id" =>$companyID,"a.Enrollment_id" =>$Enrollment_id,"a.Active_flag" =>1));
		$this->db->order_by('Beneficiary_account_id','desc');
		$query = $this->db->get();
		// echo $this->db->last_query();
	
		if($query->num_rows() > 0)
			   {
			   foreach ($query->result() as $row)
					   {
			   $data[] = $row;
		   }
		   return $data;
	   }

	}	
	public function Get_Beneficiary_members_2($To_Beneficiary_company_id,$Beneficiary_membership_id,$Enrollment_id)
	{
            $this->db->select("*");
            $this->db->from("igain_cust_beneficiary_account as a");
            $this->db->join("igain_register_beneficiary_company as b","a.Beneficiary_company_id = b.Register_beneficiary_id");
            $this->db->join("igain_beneficiary_company as c","a.Beneficiary_company_id = c.Register_beneficiary_id");
            $this->db->where(array("a.Beneficiary_company_id" =>$To_Beneficiary_company_id,"a.Beneficiary_membership_id" =>$Beneficiary_membership_id,"a.Enrollment_id" =>$Enrollment_id,"a.Active_flag" =>1));
            $this->db->order_by('Beneficiary_account_id','desc');
            $query = $this->db->get();
          //  echo "<br>".$this->db->last_query();
		
            if ($query->num_rows() > 0)
            {
        	$result=$query->row();
                return $result;
            } else {
               return false;
            }

	}	
	
	public function insert_Beneficairy($data)
	{
            $this->db->insert('igain_cust_beneficiary_account',$data);
            // echo $this->db->last_query();	
            if($this->db->affected_rows() > 0)
            {
                return true;
            }
	}
	
	public function Delete_Beneficiary_account($Beneficiary_account_id)
	{
		$data = array(
                                'Active_flag' => 0,
                                'Update_date' => date("Y-m-d H:i:s")
				);
		$this->db->where(array('Beneficiary_account_id' => $Beneficiary_account_id));
		$this->db->update('igain_cust_beneficiary_account',$data);
		// echo $this->db->last_query();	
			if($this->db->affected_rows() > 0)
			{
				return true;
			}

	}
	public function activate_Beneficiary_account($Beneficiary_account_id)
	{
		$data = array(
						'Active_flag' => 1,
						'Update_date' => date("Y-m-d H:i:s")
				);
		$this->db->where(array('Beneficiary_account_id' => $Beneficiary_account_id));
		$this->db->update('igain_cust_beneficiary_account',$data);
		// echo $this->db->last_query();	
		if($this->db->affected_rows() > 0)
		{
			return true;
		}

	}	
	function Check_beneficiary_customer($MembershipID,$Company_id,$lv_Beneficiary_name)
	{
		$this->db->select("*");
		$this->db->from('igain_enrollment_master');
		$this->db->where(array('Card_id' => $MembershipID,'Company_id' => $Company_id,'User_activated' => 1));		
		// $this->db->where("CONCAT( First_name,  ' ', Last_name ) LIKE  '%$lv_Beneficiary_name%'");	
		$exp=explode(' ',$lv_Beneficiary_name);
		// print_r($exp);
		if(count($exp)==1)
		{
			$First_name=$exp[0];
			$this->db->where(" First_name LIKE  '%$First_name%'");
		}			
		if(count($exp)==3)
		{
			$First_name=$exp[0];
			$this->db->where(" First_name LIKE  '%$First_name%'");
			
			$Middle_name=$exp[1];
			$this->db->where(" Middle_name LIKE  '%$Middle_name%'");
			
			$Last_name=$exp[2];
			$this->db->where(" Last_name LIKE  '%$Last_name%'");
		}			
		if(count($exp)==2)
		{
			$First_name=$exp[0];
			$this->db->where(" First_name LIKE  '%$First_name%'");
			
			$Last_name=$exp[1];
			$this->db->where(" Last_name LIKE  '%$Last_name%'");
		}			
		
		//$this->db->where("CONCAT_WS(' ', First_name,Middle_name, Last_name ) LIKE  '%$lv_Beneficiary_name%'");		
		$sql = $this->db->get();
		  // echo $this->db->last_query();		
		
		return $sql -> num_rows();
		
	}
	function Check_beneficiary_customer_membershipid($MembershipID,$Company_id,$lv_Beneficiary_name)
	{
		$this->db->select("*");
		$this->db->from('igain_enrollment_master');
		$this->db->where(array('Card_id' => $MembershipID,'Company_id' => $Company_id,'User_activated' => 1));		
		$sql = $this->db->get();
		 // echo $this->db->last_query();		
		
		return $sql -> num_rows();
		
	}
	function Check_beneficiary_customer_exist($MembershipID,$Company_id,$Beneficiary_name)
	{
		$this->db->select("*");
		$this->db->from('igain_cust_beneficiary_account');
		$this->db->where(array('Membership_id' => $MembershipID,'Company_id' => $Company_id,'Beneficiary_name' =>$Beneficiary_name));		
		$sql = $this->db->get();
		 // echo $this->db->last_query();		
		
		return $sql -> num_rows();
		
	}	
	function Check_beneficiary_customer_name($MembershipID,$Company_id,$lv_Beneficiary_name)
	{
		$this->db->select("*");
		$this->db->from('igain_enrollment_master');
		$this->db->where(array('Company_id' => $Company_id,'User_activated' => 1));	
		
		$exp=explode(' ',$lv_Beneficiary_name);
		// print_r($exp);
		if(count($exp)==1)
		{
			$First_name=$exp[0];
			$this->db->where(" First_name LIKE  '%$First_name%'");
		}			
		if(count($exp)==3)
		{
			$First_name=$exp[0];
			$this->db->where(" First_name LIKE  '%$First_name%'");
			
			$Middle_name=$exp[1];
			$this->db->where(" Middle_name LIKE  '%$Middle_name%'");
			
			$Last_name=$exp[2];
			$this->db->where(" Last_name LIKE  '%$Last_name%'");
		}			
		if(count($exp)==2)
		{
			$First_name=$exp[0];
			$this->db->where(" First_name LIKE  '%$First_name%'");
			
			$Last_name=$exp[1];
			$this->db->where(" Last_name LIKE  '%$Last_name%'");
		}
		
		// $this->db->where("CONCAT_WS(' ', First_name,Middle_name, Last_name ) LIKE  '%$lv_Beneficiary_name%'");		
		$sql = $this->db->get();
		 // echo $this->db->last_query();		
		
		return $sql -> num_rows();
		
	}
        public function Check_Beneficiary_members_exist($companyID,$Enrollment_id,$Beneficiary_membership_id,$Beneficiary_company_id)
	{
		$this->db->select("*");
		$this->db->from("igain_cust_beneficiary_account as a");
		$this->db->where(array("a.Company_id" =>$companyID,"a.Beneficiary_membership_id" =>$Beneficiary_membership_id,"a.Enrollment_id" =>$Enrollment_id,"a.Active_flag" =>1,"a.Beneficiary_status !="=>2,"a.Beneficiary_company_id ="=>$Beneficiary_company_id ));
		 $query = $this->db->get();
		// echo $this->db->last_query();		die;
		return $query -> num_rows();

	}
	function Get_Beneficiary_Company_details($Reference_company_id,$Igain_enroll_id)
	{
		
		$this->db->from('igain_reference_enrollment');
		$this->db->where(array('Reference_company_id' => $Reference_company_id,'Igain_enroll_id' => $Igain_enroll_id));
		$query = $this->db->get();		
		if($query->num_rows() == 1)
		{			
			foreach ($query->result() as $row)
			{
               $result[] = array("Reference_current_balance" => $row->Reference_current_balance);
            }			
			return json_encode($result);
		}
		else
		{
			return 0;
		}
	}
	
	function Get_Beneficiary_reference_enrollment_details($Reference_company_id,$Igain_enroll_id)
	{
		
		$this->db->from('igain_reference_enrollment');
		$this->db->where(array('Reference_company_id' => $Reference_company_id,'Igain_enroll_id' => $Igain_enroll_id));
		$query = $this->db->get();		
		// echo "<br>".$this->db->last_query();	
		 if ($query->num_rows() > 0)
		{
        	foreach ($query->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
            }
	}
	function get_received_points_beneficiary($Manual_billno,$From_Beneficiary_company_id,$To_Beneficiary_company_id)
	{
		$this->db->select("Topup_amount");
		$this->db->from('igain_transaction');
		$this->db->where(array('Bill_no' => $Manual_billno,'From_Beneficiary_company_id' => $From_Beneficiary_company_id,'To_Beneficiary_company_id' => $To_Beneficiary_company_id,'Trans_type' => 1));
		$query = $this->db->get();		
		// echo "<br>".$this->db->last_query();
		$result=$query->row();
		return $result->Topup_amount;
	}
	public function Update_member_balance_reference_enrollment($Enrollment_id,$From_Beneficiary_company_id,$Latest_Reference_current_balance)
	{
		$data=array('Reference_current_balance' => $Latest_Reference_current_balance);
		$this->db->where(array('Igain_enroll_id' => $Enrollment_id,'Reference_company_id' => $From_Beneficiary_company_id));
		$this->db->update('igain_reference_enrollment',$data);
		//echo "<br>".$this->db->last_query();	
		if($this->db->affected_rows() > 0)
		{
			return true;
		}		
	}
    public function Get_Beneficiary_Trans_points_history($companyID,$Enrollment_id) {
		$this->db->select("*");
		$this->db->from("igain_transaction as T");
		// $this->db->join("igain_register_beneficiary_company as b","a.Beneficiary_company_id = b.Register_beneficiary_id");
		$this->db->where(array("T.Company_id" =>$companyID,"T.Enrollement_id" =>$Enrollment_id));
		$this->db->where("T.Trans_type IN(21,24)");
		$this->db->order_by('Trans_id','desc');
        $query = $this->db->get();
		// echo "<br>********************************".$this->db->last_query();	
		
        if ($query->num_rows() > 0)
		{
        	foreach ($query->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }

    }
    public function Insert_sent_otp($data) {
        
        $this->db->insert('igain_sent_otp',$data);
       //echo $this->db->last_query();	
        if($this->db->affected_rows() > 0)
        {
            return true;
        }

    }
    function Check_OTP($Membership_id,$Beneficiary_company_id,$Beneficiary_membership_id,$Company_id,$Phone_no,$Enter_OPT) {
		
        $this->db->select("*");
	$this->db->from('igain_sent_otp');
	$this->db->where(array('From_membership_id' => $Membership_id,'Beneficiary_company_id' => $Beneficiary_company_id,'Phone_no' =>$Phone_no,'OPT_code' =>$Enter_OPT));		
	$sql = $this->db->get();
	 // echo $this->db->last_query();
	return $sql ->num_rows();
		
    }
	function Get_Publishers_Category($Code_decode_type_id)
	{
		$this->db->select('*');
		$this->db->from('igain_codedecode_master');
		$this->db->where(array('Code_decode_type_id'=>$Code_decode_type_id));
		$sql=$this->db->get();
		// echo $this->db->last_query()."---<br>";
		if($sql->num_rows()>0)
		{
			foreach ($sql->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
		}
		else
		{
			return false;
		}		
	}
	public function Get_Beneficiary_members_inactive_account($companyID,$Enrollment_id)
	{  
		$this->db->select("*");
		$this->db->from("igain_cust_beneficiary_account as a");
		$this->db->join("igain_register_beneficiary_company as b","a.Beneficiary_company_id = b.Register_beneficiary_id");
		//$this->db->join("igain_company_master as c","a.Company_id = c.Company_id");
		$this->db->where(array("a.Company_id" =>$companyID,"a.Enrollment_id" =>$Enrollment_id,"a.Active_flag" =>0));
		$this->db->order_by('Beneficiary_account_id','desc');
		$query = $this->db->get();
		// echo $this->db->last_query();
	
		if($query->num_rows() > 0)
			   {
			   foreach ($query->result() as $row)
					   {
			   $data[] = $row;
		   }
		   return $data;
	   }

	}
    
}

?>
