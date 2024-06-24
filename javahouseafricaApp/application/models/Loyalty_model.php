<?php 
class Loyalty_model extends CI_Model
{
	function Get_merchandize_item($Item_code,$Company_id)
	{
	  $Todays_date=date("Y-m-d");
	  $this->db->select('*');
	  $this->db->from('igain_company_merchandise_catalogue');
	  $this->db->where(array('Company_merchandize_item_code' => $Item_code, 'Company_id' => $Company_id,'Active_flag'=>1,'Ecommerce_flag'=>1,'Valid_from <='=>$Todays_date,'Valid_till >='=>$Todays_date));
	  $query11 = $this->db->get();

		if($query11 -> num_rows() == 1)
		{
			return $query11->row();
		}
		else
		{
			return false;
		}
	}
	function get_items_branches($Company_merchandize_item_code,$Merchandize_partner_id,$Company_id)
	{
		$this->db->select('*');
		$this->db->from('igain_merchandize_item_child');
		$this->db->where(array('Partner_id' =>$Merchandize_partner_id, 'Merchandize_item_code '=>$Company_merchandize_item_code,'Company_id'=>$Company_id));
		$sql = $this->db->get();
		//echo $this->db->last_query();//DIE;
		if($sql -> num_rows() > 0)
		{
			return $sql->row();
		}
		else
		{
			return false;
		}
	}
	public function Get_Seller_details($Seller_id,$Company_id)
	{
		  $this->db->select('*');
		  $this->db->from('igain_enrollment_master');
		  $this->db->where(array('Enrollement_id' => $Seller_id, 'Company_id' => $Company_id));
		  $query11 = $this->db->get();
		 
			// echo $this->db->last_query();

		if($query11 -> num_rows() == 1)
		{
			return $query11->row();
		}
		else
		{
			return false;
		}
	}
	function get_tierbased_loyalty($Company_id,$Seller_id,$TierID,$Todays_date)
	{
		//$this->db->select('distinct(Loyalty_name),Loyalty_id,Till_date,From_date');
		$this->db->select('distinct(Loyalty_name)');
		$this->db->from('igain_loyalty_master');
		$this->db->where(" '".$Todays_date."' BETWEEN From_date AND Till_date ");
		$this->db->where(array('Company_id' => $Company_id,'Seller' => $Seller_id, 'Active_flag' => 1, "Tier_id IN ('0','".$TierID."') "));
		$query444 = $this->db->get();

		if($query444 -> num_rows() > 0)
		{
			return $query444->result_array();
		}
		else
		{
			return false;
		}
	}
	public function get_loyalty_program_details($Company_id,$seller_id,$Loyalty_names,$Todays_date)
	{
			$this->db->Select("*");
			$this->db->from("igain_loyalty_master");
			$this->db->where_in('Loyalty_name',$Loyalty_names);
			$this->db->where(" '".$Todays_date."' BETWEEN From_date AND Till_date ");
			$this->db->where(array('Seller' => $seller_id,'Active_flag' => 1,'Company_id' => $Company_id));
			$this->db->order_by('Loyalty_at_value');
                        
			$edit_sql = $this->db->get();

			if($edit_sql->num_rows() > 0)
			{
				return $edit_sql->result_array();
			}
			else
			{
				return false;
			}
	}
	public function get_discount($transaction_amt,$discount)
	{
		return ($transaction_amt/100) * $discount;
	}
	public function edit_segment_id($Company_id,$Segment_code)
	{
		$this->db->select('*');
		$this->db->from('igain_segment_master');
		$this->db->where(array('Company_id'=>$Company_id, 'Segment_code' =>$Segment_code));
		$this->db->join('igain_segment_type_master', 'igain_segment_master.Segment_type_id = igain_segment_type_master.Segment_type_id');
        $query = $this->db->get();
		// echo"---seg--SQL---".$this->db->last_query()."--<br>";		
		if($query -> num_rows() > 0)
		{
			foreach ($query->result() as $row)
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
	function get_cust_trans_summary_all($Company_id,$Enrollement_id,$start_date,$end_date,$transaction_type_id,$Tier_id,$start,$limit)
	{
		$start_date=date("Y-m-d",strtotime($start_date));
		$end_date=date("Y-m-d",strtotime($end_date));
                //IE.Enrollement_id,Transfer_points,
		$this->db->select('IE.First_name,IE.Middle_name,IE.Last_name,IT.Card_id AS Membership_ID,TT.Trans_type,SUM(Redeem_points) AS Total_Redeem,SUM(Loyalty_pts) as Total_Gained_Points,SUM(Topup_amount) as Total_Bonus_Points,SUM(Purchase_amount) as Total_Purchase_Amount,SUM(Transfer_points) AS Total_Transfer_Points,SUM(Expired_points) AS Total_Expired_points,Tier_name,IT.Enrollement_id');
		//,IE.Current_balance,Card_id2 as Transfer_to
		$this->db->from('igain_transaction as IT');
		
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_transaction_type as TT','IT.Trans_type=TT.Trans_type_id');
		$this->db->join('igain_tier_master as TM','IE.Tier_id=TM.Tier_id');
		$this->db->where('IT.Trans_type !=' , 10);
		$this->db->where('IT.Trans_type !=' , 9);
		$this->db->group_by('IT.Card_id');
		$this->db->group_by('IT.Trans_type');
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$start_date."' AND '".$end_date."'");
		if($Enrollement_id!=0)//Single Customers
		{
			$this->db->where('IT.Enrollement_id IN('.$Enrollement_id.')');
		}
		if($Tier_id!=0)//Selected Tier 
		{
			$this->db->where('IE.Tier_id' , $Tier_id);
		}
		if($transaction_type_id!=0)//Single Transaction Type
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
			
		}
		// $this->db->limit($limit,$start);
		if($limit!=NULL && $start!=NULL)
		{
			 $this->db->limit($limit,$start);
		}
		
		$sql51 = $this->db->get();
		// echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				if($row->Total_Redeem==0)
				{
					$row->Total_Redeem="-";
				}
				if($row->Total_Gained_Points==0)
				{
					$row->Total_Gained_Points="-";
				}
				if($row->Total_Purchase_Amount==0)
				{
					$row->Total_Purchase_Amount="-";
				}
				if($row->Total_Transfer_Points==0)
				{
					$row->Total_Transfer_Points="-";
				}
				if($row->Total_Bonus_Points==0)
				{
					$row->Total_Bonus_Points="-";
				}
                $data[] = $row;
            }
			 return $data;
		}
		else
		{
			return false;
		}
	}
	function get_cust_trans_details($Company_id,$From_date,$To_date,$Enrollement_id,$transaction_type_id,$Tier_id,$start,$limit)
	{
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));
		$this->db->select('First_name,Middle_name,Last_name,IT.Enrollement_id,IT.Trans_id,IT.Trans_date,Purchase_amount,Redeem_points,Paid_amount,Topup_amount,Loyalty_pts,Bill_no,TT.Trans_type_id,Seller,TT.Trans_type,IT.Card_id as Membership_ID,IT.Company_id,Card_id2 as Transfer_to,Transfer_points,TM.Tier_name,IT.Remarks as Remarks,balance_to_pay,Item_code,Quantity,Voucher_no,Voucher_status,Expired_points');
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_transaction_type as TT','IT.Trans_type=TT.Trans_type_id');
		$this->db->join('igain_tier_master as TM','IE.Tier_id=TM.Tier_id');
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		$this->db->where('IT.Trans_type !=' , 10);
		$this->db->where('IT.Trans_type !=' , 9);
		if($transaction_type_id!=0)//Single Transaction Type
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		if($Tier_id!=0)//Selected Tier 
		{
			$this->db->where('IE.Tier_id' , $Tier_id);
		}
		if($Enrollement_id!=0)//Single Customers
		{
			$this->db->where('IT.Enrollement_id IN('.$Enrollement_id.')');
		}
		$this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'desc');
		if($limit!=NULL && $start!=NULL)
		{
			 $this->db->limit($limit,$start);
		}
		// $this->db->limit($limit,$start);
		$sql51 = $this->db->get();
		// echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			 foreach ($sql51->result() as $row)
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
	function Get_segment_based_customers($lv_Cust_value,$Operator,$Value,$Value1,$Value2)
	{
		$access=0;
		if($Operator=="<")
		{
			if($lv_Cust_value<$Value)
			{
				$access=1;
			}
			
		}
		if($Operator=="=")
		{
			if($lv_Cust_value==$Value)
			{
				$access=1;
			}
		}
		if($Operator=="<=")
		{
			if($lv_Cust_value<=$Value)
			{
				$access=1;
			}
		}
		
		
		if($Operator==">")
		{
			if($lv_Cust_value>$Value)
			{
				$access=1;
			}
		}
		if($Operator==">=")
		{
			if($lv_Cust_value>=$Value)
			{
				$access=1;
			}
		}
		if($Operator=="!=")
		{
			if($lv_Cust_value!=$Value)
			{
				$access=1;
			}
		}
		
		if($Operator=="Between")
		{
			if($lv_Cust_value>=$Value1 && $lv_Cust_value<=$Value2)
			{
				$access=1;
			}
		}
		
		return $access;
	}
	public function Get_Seller($seller_flag,$Company_id)
	{
		  $this->db->select('Enrollement_id,First_name,Last_name,Purchase_Bill_no,Seller_Redemptionratio,User_email_id');
		  $this->db->from('igain_enrollment_master');
		  $this->db->where(array('Super_seller' => $seller_flag, 'Company_id' => $Company_id));
		  $query11 = $this->db->get();
		 
			//echo $this->db->last_query();

		 if($query11 -> num_rows() == 1)
			{
				return $query11->row();
			}
			else
			{
				return false;
			}
	}
	public function Insert_online_purchase_transaction($data)
	{
		$this->db->insert('igain_transaction', $data);		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();
		}
		else
		{
			return 0;
		}
	}
	function Insert_log_table($Company_id,$From_enroll_id,$From_username,$LogginUserName,$lv_date_time,$what,$where,$From_userid,$opration,$opval,$firstName,$lastName,$To_enroll_id)
	{
		$data['Company_id'] = $Company_id;
		$data['From_enrollid'] = $From_enroll_id;
		$data['From_emailid'] = $From_username;
		$data['From_userid'] = $From_userid;
		$data['To_enrollid'] = $To_enroll_id;
		$data['Transaction_by'] = $LogginUserName;
		$data['Transaction_to'] =  $firstName.' '.$lastName;  
		$data['Transaction_type'] = $what;
		$data['Transaction_from'] = $where;
		$data['Operation_type'] = $opration;
		$data['Operation_value'] = $opval;
		$data['Date'] = $lv_date_time;
		$this->db->insert('igain_log_tbl', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
	}
    function Get_loyalty_details_for_online_purchase($Loyalty_id)
	{
		//$this->db->select('distinct(Loyalty_name),Loyalty_id,Till_date,From_date');
		
		$this->db->select('Loyalty_at_transaction,discount,Loyalty_name');
		$this->db->from('igain_loyalty_master');
		$this->db->where(array('Loyalty_id' => $Loyalty_id));
		$query444 = $this->db->get();
		// echo $this->db->last_query();
		if($query444 -> num_rows() > 0)
		{
			return $query444->result_array();
		}
		else
		{
			return false;
		}
	}
	public function insert_loyalty_transaction_child($child_data)
	{
		$this->db->insert('igain_transaction_child', $child_data);	
			
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function Fetch_city_state_country($Company_id,$Customer_enroll_id)
	{
		$this->db->select("*,igain_state_master.name as State_name,igain_city_master.name as City_name,igain_country_master.name as Country_name");
		$this->db->from('igain_enrollment_master');
		$this->db->where(array('User_activated' => '1','User_id' => '1','Company_id' => $Company_id,'Enrollement_id' => $Customer_enroll_id));
		$this->db->join('igain_country_master', 'igain_enrollment_master.Country = igain_country_master.id');
		$this->db->join('igain_state_master', 'igain_enrollment_master.State = igain_state_master.id');
		$this->db->join('igain_city_master', 'igain_enrollment_master.City = igain_city_master.id');
		
		$SubsellerSql = $this->db->get();		
		if($SubsellerSql->num_rows() == 1)
		{
			return $SubsellerSql->row();
		}
		else
		{
			return 0;
		}
	}
	public function update_cust_balance($up,$cust_enrollment_id,$company_id)
	{
		$this->db->where('Enrollement_id', $cust_enrollment_id, 'Company_id', $company_id); 
		$this->db->update('igain_enrollment_master', $up); 
		return true;
	}
	public function update_billno($Seller_id,$Bill_no)
	{
		$data = array(
			'Purchase_Bill_no' => $Bill_no
		);
		$this->db->where(array('Enrollement_id' => $Seller_id));
		$this->db->update("igain_enrollment_master", $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function delete_claimed_bill($Bill_no,$Claim_code)
	{
		$this->db->where(array('Bill_no' => $Bill_no,'Claim_code'=>$Claim_code));
		$this->db->delete('igain_pos_transaction_temp');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
	}
}
?>