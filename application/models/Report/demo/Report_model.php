<?php 
class Report_model extends CI_model
{
	/*********** Akshay Work Start ****************************/
	function get_merchant_report($start_date,$end_date,$Company_id,$seller_id,$transaction_type_id,$report_type,$login_enroll,$flag)
    {
		$this->load->dbforge();		
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));	
		
		
		if($report_type == 1)
		{
			$temp_table = $login_enroll.'seller_igain_summary_rpt';		
			
			if( $this->db->table_exists($temp_table) == TRUE )
			{
				$this->dbforge->drop_table($temp_table);
			}
		
			$fields = array(
						'Trans_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'companyName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'sellerName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'top_up' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'purchase_amt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'reedem_pt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'balance_to_pay' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'loyalty_pts_gain' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'seller_enrollid' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
					);
			$this->dbforge->add_field($fields);		
			$this->dbforge->create_table($temp_table);
		
			if($seller_id == 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');		
				$this->db->where(array('C.Company_id' => $Company_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->group_by("A.Trans_type,A.Seller");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}
			
			if($seller_id != 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');		
				$this->db->where(array('C.Company_id' => $Company_id, 'A.Seller' => $seller_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->group_by("A.Trans_type,A.Seller");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}
			
			if($seller_id == 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');		
				$this->db->where(array('C.Company_id' => $Company_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->group_by("A.Trans_type,A.Seller");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}
			
			if($seller_id != 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');		
				$this->db->where(array('C.Company_id' => $Company_id, 'A.Seller' => $seller_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->group_by("A.Trans_type,A.Seller");
				$this->db->order_by('A.Seller','ASC');
				
				$query = $this->db->get();
				//echo $this->db->last_query();
			}
		
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->Trans_type=='Redemption')
					{
						$lv_Total_Redeem_points=($row->Total_Redeem_points);
					}
					else
					{
						$lv_Total_Redeem_points=($row->Redeem_points);
					}
					
					$data['Trans_type'] = $row->Trans_type;
					$data['companyName'] = $row->Company_name;
					$data['sellerName'] = $row->Seller_name;
					$data['top_up'] = $row->Topup_amount;
					$data['purchase_amt'] = $row->Purchase_amount;
					$data['reedem_pt'] = $lv_Total_Redeem_points;
					$data['balance_to_pay'] = $row->balance_to_pay;
					$data['loyalty_pts_gain'] = $row->Loyalty_pts;
					$data['seller_enrollid'] = $row->Seller;
					$this->db->insert($temp_table, $data);
				}          
			}
		}		
		if($report_type == 0)
		{
			$temp_table = $login_enroll.'seller_igain_detail_rpt';		
			if($flag==0)
			{
				if( $this->db->table_exists($temp_table) == TRUE)
				{
					$this->dbforge->drop_table($temp_table);
				}
				
				$fields = array(
							'Trans_id' => array('type' => 'INT','constraint' => '11','default' => 0),
							'Trans_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'Trans_type_id' => array('type' => 'INT','constraint' => '11','default' => 0),
							'GiftCardNo' => array('type' => 'INT','constraint' => '11','default' => 0),
							'First_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'Middle_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'Last_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'Manual_billno' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'companyName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'sellerName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'top_up' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'purchase_amt' => array('type' => 'DECIMAL','constraint' => '25,0','default' => 0),
							'reedem_pt' => array('type' => 'DECIMAL','constraint' => '25,0','default' => 0),
							'balance_to_pay' => array('type' => 'DECIMAL','constraint' => '25,0','default' => 0),
							'payment_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'cardId' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'Bill_no' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'loyalty_pts_gain' => array('type' => 'DECIMAL','constraint' => '25,0','default' => 0),
							'seller_enrollid' => array('type' => 'INT','constraint' => '11','default' => 0),
							'Enrollement_id' => array('type' => 'INT','constraint' => '11','default' => 0),
							'Quantity' => array('type' => 'INT','constraint' => '11','default' => 0),
							'Trans_date' => array('type' => 'DATETIME','default' =>'CURRENT_TIMESTAMP'),
							'Walkin_customer' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
							'Remarks' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						);
				$this->dbforge->add_field($fields);		
				$this->dbforge->create_table($temp_table);
		}	
			$query2_flag = 0;
			
			if($seller_id == 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity');//, E.Payment_type
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				//$this->db->join('igain_payment_type_master as E', 'E.Payment_type_id = A.Payment_type_id');
				$this->db->where_in('A.Trans_type', array('1','2','3','10'));				
				$this->db->where(array('D.Company_id' => $Company_id));
				$this->db->where('A.Seller <> 0');
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->group_by("A.Bill_no");
				$this->db->order_by('A.Seller','DESC');
				$query = $this->db->get()->result();
			
				$this->db->select('AA.Trans_id, AA.Manual_billno, AA.Enrollement_id, AA.Seller_name, AA.Topup_amount, AA.GiftCardNo, AA.Purchase_amount, AA.Redeem_points, AA.balance_to_pay, AA.Card_id, AA.Bill_no, AA.Loyalty_pts, AA.Seller, AA.Trans_date, BB.Trans_type, BB.Trans_type_id, CC.Company_name,Quantity');
				$this->db->from('igain_transaction as AA');
				$this->db->join('igain_transaction_type as BB', 'BB.Trans_type_id = AA.Trans_type');
				$this->db->join('igain_company_master as CC', 'CC.Company_id = AA.Company_id');
				$this->db->where('AA.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where(array('AA.Company_id' => $Company_id, 'AA.Trans_type' => '4'));
				$query2 = $this->db->get()->result();
			}
			
			if($seller_id != 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->where_in('A.Trans_type', array('1','2','3','10'));
				$this->db->where(array('D.Company_id' => $Company_id, 'A.Seller' => $seller_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->group_by("A.Bill_no");
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
				
				$this->db->select('AA.Remarks,AA.Trans_id, AA.Manual_billno, AA.Enrollement_id, AA.Seller_name, AA.Topup_amount, AA.GiftCardNo, AA.Purchase_amount, AA.Redeem_points, AA.balance_to_pay, AA.Card_id, AA.Bill_no, AA.Loyalty_pts, AA.Seller, AA.Trans_date, BB.Trans_type, BB.Trans_type_id, CC.Company_name,Quantity');
				$this->db->from('igain_transaction as AA');
				$this->db->join('igain_transaction_type as BB', 'BB.Trans_type_id = AA.Trans_type');
				$this->db->join('igain_company_master as CC', 'CC.Company_id = AA.Company_id');
				$this->db->where(array('AA.Company_id' => $Company_id, 'AA.Seller' => $seller_id, 'AA.Trans_type' => '4'));
				$this->db->where('AA.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$query2 = $this->db->get()->result();
			}
			
			if($seller_id == 0 && $transaction_type_id != 0)
			{
				if($transaction_type_id == 4)
				{
					$this->db->select('AA.Remarks,AA.Trans_id, AA.Manual_billno, AA.Enrollement_id, AA.Seller_name, AA.Topup_amount, AA.GiftCardNo, AA.Purchase_amount, AA.Redeem_points, AA.balance_to_pay, AA.Card_id, AA.Bill_no, AA.Loyalty_pts, AA.Seller, AA.Trans_date, BB.Trans_type, BB.Trans_type_id, CC.Company_name,Quantity');
					$this->db->from('igain_transaction as AA');
					$this->db->join('igain_transaction_type as BB', 'BB.Trans_type_id = AA.Trans_type');
					$this->db->join('igain_company_master as CC', 'CC.Company_id = AA.Company_id');
					$this->db->where(array('AA.Company_id' => $Company_id, 'AA.Trans_type' => '4'));
					$this->db->where('AA.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
					$query2 = $this->db->get()->result();
					$query2_flag = 1;
					$query = array();
				}
				else
				{
					$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity');
					$this->db->from('igain_transaction as A');
					$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
					$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
					$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
					//$this->db->where_in('A.Trans_type', array('1','2','3','7'));
					$this->db->where(array('D.Company_id' => $Company_id, 'A.Trans_type' => $transaction_type_id));
					$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
					$this->db->where('A.Seller <> 0');
					$this->db->group_by("A.Bill_no");
					$this->db->order_by('A.Trans_date','DESC');
					$query = $this->db->get()->result();
					$query2 = array();
				}
			}			
			if($seller_id != 0 && $transaction_type_id != 0)
			{
				if($transaction_type_id == 4)
				{
					$this->db->select('AA.Remarks,AA.Trans_id, AA.Manual_billno, AA.Enrollement_id, AA.Seller_name, AA.Topup_amount, AA.GiftCardNo, AA.Purchase_amount, AA.Redeem_points, AA.balance_to_pay, AA.Card_id, AA.Bill_no, AA.Loyalty_pts, AA.Seller, AA.Trans_date, BB.Trans_type, BB.Trans_type_id, CC.Company_name,Quantity');
					$this->db->from('igain_transaction as AA');
					$this->db->join('igain_transaction_type as BB', 'BB.Trans_type_id = AA.Trans_type');
					$this->db->join('igain_company_master as CC', 'CC.Company_id = AA.Company_id');
					$this->db->where(array('AA.Company_id' => $Company_id, 'AA.Seller' => $seller_id, 'AA.Trans_type' => '4'));
					$this->db->where('AA.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
					$query2 = $this->db->get()->result();
					$query2_flag = 1;
					$query = array();
				}
				else
				{
					$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity');
					$this->db->from('igain_transaction as A');
					$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
					$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
					$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
					//$this->db->where_in('A.Trans_type', array('1','2','3','7'));
					$this->db->where(array('D.Company_id' => $Company_id, 'A.Seller' => $seller_id, 'A.Trans_type' => $transaction_type_id));
					$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
					$this->db->group_by("A.Bill_no");
					$this->db->order_by('A.Trans_date','DESC');
					$query = $this->db->get()->result();
					$query2 = array();
				}
			}
			
			/* if($query2_flag == 0)
			{
				$query3 = $query;
			}
			else
			{
				$query3 = array_merge($query, $query2);					
			} */
			
			$query3 = array_merge($query, $query2);
			
			// if ($query->num_rows() > 0)
			if ($query3 != NULL)
			{
				// foreach ($query->result() as $row)
				foreach ($query3 as $row)
				{
					$data['Trans_id'] = $row->Trans_id;
					$data['Trans_type'] = $row->Trans_type;
					$data['Trans_type_id'] = $row->Trans_type_id;
					$data['Enrollement_id'] = $row->Enrollement_id;

					if($row->GiftCardNo == NULL)
					{
						$data['GiftCardNo'] = '0';
					}
					else
					{
						$data['GiftCardNo'] = $row->GiftCardNo;					
					}
					$data['Manual_billno'] = $row->Manual_billno;
					$data['companyName'] = $row->Company_name;
					$data['sellerName'] = $row->Seller_name;
					$data['top_up'] = $row->Topup_amount;
					$data['purchase_amt'] = $row->Purchase_amount;
					$data['reedem_pt'] = $row->Redeem_points;
					$data['balance_to_pay'] = $row->balance_to_pay;
					// $data['payment_type'] = $row->Payment_type;
					
					$data['Bill_no'] = $row->Bill_no;
					$data['loyalty_pts_gain'] = $row->Loyalty_pts;
					$data['seller_enrollid'] = $row->Seller;
					$data['Trans_date'] = $row->Trans_date;
					$data['Quantity'] = $row->Quantity;
					$data['Remarks'] = $row->Remarks;
					
					if($row->Trans_type_id == 4)
					{
						$Gift_card_details = $this->get_giftcard_details($row->GiftCardNo,$Company_id);
						$Customer_name = explode(" ", $Gift_card_details->User_name);
						$data['cardId'] = $Gift_card_details->Gift_card_id;
						$data['First_name'] = $Customer_name[0];
						$data['Middle_name'] = $Customer_name[1];
						if(count($Customer_name) > 2)
						{
							$data['Last_name'] = $Customer_name[2];
						}
					}
					else
					{
						$data['First_name'] = $row->First_name;
						$data['Middle_name'] = $row->Middle_name;
						$data['Last_name'] = $row->Last_name;
						$data['cardId'] = $row->Card_id;
					}
					
						if($row->Enrollement_id == 0)
						{
							$data['Walkin_customer'] = 'Yes';
						}
						else
						{
							$data['Walkin_customer'] = 'No';
						}
					$this->db->insert($temp_table, $data);
				}
			}
		}
		return $this->db->count_all($temp_table);
    }
	
	public function get_seller_report_details($temp_table,$Report_type,$start,$limit)	
	{
		if($Report_type == 1)
		{
			$this->db->order_by('sellerName','DESC');
			$this->db->select('sellerName as Merchant_name,Trans_type,top_up as Bonus_points,purchase_amt,reedem_pt,balance_to_pay,loyalty_pts_gain,seller_enrollid as Merchant_id');
		}
		else
		{
			$this->db->order_by('sellerName,Trans_id' , 'desc');
			$this->db->select("Trans_date,sellerName as Merchant_name,CONCAT(First_name, ' ', Last_name) as Member_name,cardId as Membership_ID,Manual_billno,Trans_type,top_up as Bonus_points,purchase_amt,reedem_pt,balance_to_pay, loyalty_pts_gain,Bill_no,seller_enrollid as Merchant_id,Trans_id,Trans_type_id,Walkin_customer,Quantity,Remarks");
		}
		// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
        $query = $this->db->get($temp_table);
		//echo $this->db->last_query();
        if ($query->num_rows() > 0)
		{
        	foreach ($query->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	
	public function get_seller_excel_report_details($temp_table,$Report_type)	//,$limit,$start
	{
		if($Report_type == 1)
		{
			$this->db->order_by('sellerName','DESC');
			$this->db->select('sellerName as Merchant_name,Trans_type,top_up as Bonus_points,purchase_amt as Purchase_amt,reedem_pt as Reedem_pts,balance_to_pay as Balance_to_pay, loyalty_pts_gain as Loyalty_pts_gain,seller_enrollid as Merchant_id');
			//,seller_enrollid as Merchant_id
			$query = $this->db->get($temp_table);
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->Bonus_points==0)
					{
						$row->Bonus_points="-";
					}
					if($row->Purchase_amt==0)
					{
						$row->Purchase_amt="-";
					}
					if($row->Reedem_pts==0)
					{
						$row->Reedem_pts="-";
					}
					if($row->Balance_to_pay==0)
					{
						$row->Balance_to_pay="-";
					}
					if($row->Loyalty_pts_gain==0)
					{
						$row->Loyalty_pts_gain="-";
					}
					
					$data[] = $row;
				}
				
				
				return $data;
			}
			return false;
		}
		else
		{
			$this->db->order_by('sellerName,Trans_id' , 'desc');
			$this->db->select("Trans_date,sellerName as Merchant_name,CONCAT(First_name, ' ', Last_name) as Member_name,cardId as Membership_ID,Walkin_customer,Manual_billno,Trans_type,top_up as Bonus_points,purchase_amt as Purchase_amt,reedem_pt as Reedem_pts,Quantity,balance_to_pay as Balance_to_pay, loyalty_pts_gain as Loyalty_pts_gain,Remarks as Remarks,seller_enrollid as Merchant_id");
			//,seller_enrollid as Merchant_id
			$query = $this->db->get($temp_table);
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->Manual_billno=="")
					{
						$row->Manual_billno="-";
					}
					if($row->Bonus_points==0)
					{
						$row->Bonus_points="-";
					}
					if($row->Purchase_amt==0)
					{
						$row->Purchase_amt="-";
					}
					if($row->Reedem_pts==0)
					{
						$row->Reedem_pts="-";
					}
					if($row->Quantity==0)
					{
						$row->Quantity="-";
					}
					if($row->Balance_to_pay==0)
					{
						$row->Balance_to_pay="-";
					}
					if($row->Loyalty_pts_gain==0)
					{
						$row->Loyalty_pts_gain="-";
					}
					if($row->Remarks=="")
					{
						$row->Remarks="-";
					}
					
					$data[] = $row;
				}

				return $data;
			}
			return false;
		}
		
        

        
	}
   
	public function get_giftcard_details($Gift_card_id,$Company_id)
	{
		$this->db->from('igain_giftcard_tbl');
		$this->db->where(array('Gift_card_id' => $Gift_card_id, 'Company_id' => $Company_id));
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{			
			return $query->row();
		}
		else
		{
			return 0;
		}
	}
/*********** Akshay Work end ****************************/


/*********** Sandeep Work Start ****************************/
	
	/********* Deposit Seller Topup Report **************/
	
	public function get_deposit_transactions($limit,$start,$Company_id,$start_date,$end_date,$Trans_type,$seller_id,$enrollID)
	{
		$start_date = date("Y-m-d",strtotime($start_date));
		$end_date = date("Y-m-d",strtotime($end_date));
		$this->load->dbforge();
		
		$temp_table = $enrollID.'deposit_topup_rpt';		
			
			if( $this->db->table_exists($temp_table) == TRUE )
			{
				$this->dbforge->drop_table($temp_table);
			}
		
			$fields20 = array(
						'Transaction_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Company_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Merchant_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Transaction_date' => array('type' => 'DATE'),
						'Exception_transaction' => array('type' => 'VARCHAR','constraint' => '20','null' => TRUE),
						'Topup_amount' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						
					);
					
			$this->dbforge->add_field($fields20);
					
			$this->dbforge->create_table($temp_table);
			
				// if($limit != NULL || $start != ""){				
					// $this->db->limit($limit,$start);
				// }
		
		if($Trans_type == 1 && $seller_id == 0) //**** All Transaction Type and All sellers
		{
			$this->db->select("a.*,b.Company_name,c.Trans_type,d.First_name,d.Last_name");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->join("igain_company_master as b","a.Company_id = b.Company_id");
			$this->db->join("igain_transaction_type as c","a.Trans_type = c.Trans_type_id");
			$this->db->join("igain_enrollment_master as d","d.Enrollement_id= a.Seller_id");
			$this->db->where("a.Company_id",$Company_id);
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();

		}
		else if($Trans_type == 1 && $seller_id > 0) //**** All Transaction Type 
		{
			$this->db->select("a.*,b.Company_name,c.Trans_type,d.First_name,d.Last_name");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->join("igain_company_master as b","a.Company_id = b.Company_id");
			$this->db->join("igain_transaction_type as c","a.Trans_type = c.Trans_type_id");
			$this->db->join("igain_enrollment_master as d","d.Enrollement_id= a.Seller_id");
			$this->db->where(array("a.Company_id" => $Company_id, "a.Seller_id" => $seller_id));
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();
			
		}
		
		
		if($Trans_type == 5) //**** Company Deposit Transaction Type 
		{
			$this->db->select("a.*,b.Company_name,c.Trans_type,d.First_name,d.Last_name");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->join("igain_company_master as b","a.Company_id = b.Company_id");
			$this->db->join("igain_transaction_type as c","a.Trans_type = c.Trans_type_id");
			$this->db->join("igain_enrollment_master as d","d.Enrollement_id= a.Seller_id");
			$this->db->where(array("a.Company_id" => $Company_id, "a.Trans_type" => $Trans_type));
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();
			
		}
		
		if($Trans_type == 6 && $seller_id > 0) //**** Seller Deposit Transaction Type 
		{
			$this->db->select("a.*,b.Company_name,c.Trans_type,d.First_name,d.Last_name");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->join("igain_company_master as b","a.Company_id = b.Company_id");
			$this->db->join("igain_transaction_type as c","a.Trans_type = c.Trans_type_id");
			$this->db->join("igain_enrollment_master as d","d.Enrollement_id= a.Seller_id");
			$this->db->where(array("a.Company_id" => $Company_id, "a.Trans_type" => $Trans_type,"a.Seller_id" => $seller_id));
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();
		
		}
		else if($Trans_type == 6 ) //**** Seller Deposit Transaction Type 
		{
			$this->db->select("a.*,b.Company_name,c.Trans_type,d.First_name,d.Last_name");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->join("igain_company_master as b","a.Company_id = b.Company_id");
			$this->db->join("igain_transaction_type as c","a.Trans_type = c.Trans_type_id");
			$this->db->join("igain_enrollment_master as d","d.Enrollement_id= a.Seller_id");
			$this->db->where(array("a.Company_id" => $Company_id, "a.Trans_type" => $Trans_type));
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();
			
		}
		
		//echo $this->db->last_query();
		
			if($deposit_rpt->num_rows() > 0)
			{
				foreach($deposit_rpt->result() as $rowp)
				{
					$except = $rowp->Exception_flag;
								
					if($except == 0)
					{
						$except_rpt='No';
					}
					else
					{									
						$except_rpt='Yes';
					}
								
					$values['Transaction_type'] = $rowp->Trans_type;
					$values['Company_name'] = $rowp->Company_name;
					$values['Merchant_name'] = $rowp->First_name." ".$rowp->Last_name;
					$values['Transaction_date']  = date("Y-m-d",strtotime($rowp->Transaction_date));
					$values['Exception_transaction'] = $except_rpt;
					$values['Topup_amount'] = $rowp->Amt_transaction;
						
					$this->db->insert($temp_table,$values);
					
					$data[] = $rowp;
				}
				
				
				return $data;
			}
			
		
		return false;
	}
	
	public function get_deposit_transactions_count($Company_id,$start_date,$end_date,$Trans_type,$seller_id)
	{
		$start_date = date("Y-m-d",strtotime($start_date));
		$end_date = date("Y-m-d",strtotime($end_date));
		
		if($Trans_type == 1 && $seller_id == 0) //**** All Transaction Type and All sellers
		{
			$this->db->select("*");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->where("a.Company_id",$Company_id);
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();

		}
		else if($Trans_type == 1 && $seller_id > 0) //**** All Transaction Type 
		{
			$this->db->select("*");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->where(array("a.Company_id" => $Company_id, "a.Seller_id" => $seller_id));
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();
			
		}
		
		
		if($Trans_type == 5) //**** Company Deposit Transaction Type 
		{
			$this->db->select("*");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->where(array("a.Company_id" => $Company_id, "a.Trans_type" => $Trans_type));
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();
			
		}
		
		if($Trans_type == 6 && $seller_id > 0) //**** Seller Deposit Transaction Type 
		{
			$this->db->select("*");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->where(array("a.Company_id" => $Company_id, "a.Trans_type" => $Trans_type,"a.Seller_id" => $seller_id));
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();
		
		}
		else if($Trans_type == 6 ) //**** Seller Deposit Transaction Type 
		{
			$this->db->select("*");
			$this->db->from("igain_compseller_trans_tbl as a");
			$this->db->where(array("a.Company_id" => $Company_id, "a.Trans_type" => $Trans_type));
			$this->db->where("a.Transaction_date Between '$start_date'  AND '$end_date' ");
			
			$deposit_rpt = $this->db->get();
			
		}
		
		return $deposit_rpt->num_rows();
	}
	
	public function get_deposit_topup_records($temp_table)	//,$limit,$start
	{

        $query = $this->db->get($temp_table);

        if ($query->num_rows() > 0)
		{
        	foreach ($query->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
		
	/********* Deposit Seller Topup Report **************/
	
	/********* Customer Visit Report **************/
	
	function get_cust_visit_details($Company_id,$Single_cust_membership_id,$start_date,$end_date)
	{
		$From_date=date("Y-m-d",strtotime($start_date));
		$To_date=date("Y-m-d",strtotime($end_date));
		
		$this->db->from("igain_user_visits");
		$this->db->order_by("Enrollement_id");
		$this->db->where("Company_id",$Company_id);
		$this->db->where("Date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Single_cust_membership_id != 0)
		{
			$this->db->where("Card_id",$Single_cust_membership_id);
		}
		
		$isRes = $this->db->get();
		
		if($isRes->num_rows() > 0)
		{
			foreach($isRes->result() as $isRow)
			{
				$isData[] = $isRow;
			}
			
			return $isData;
		}
		
		return false;
	}
	
	/********* Customer Visit Report **************/
	
/*********** Sandeep Work Start ****************************/
	
	/*********** AMIT Start ****************************/
	/************************ Customer Reports ***************************/
	function get_cust_trans_details($Company_id,$From_date,$To_date,$Enrollement_id,$transaction_type_id,$Tier_id,$start,$limit)
	{
	/*
		echo"From_date----".$From_date ."<br>";
		echo"To_date----".$To_date ."<br>";
		echo"Company_id----".$Company_id ."<br>";
		echo"Enrollement_id----".$Enrollement_id ."<br>";
		echo"transaction_type_id----".$transaction_type_id ."<br>";
		echo"Tier_id----".$Tier_id ."<br>";
		*/
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
		// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
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
			$this->db->where_in('IT.Trans_type' , $transaction_type_id);
			
		}
			// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
		
		
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

	function get_cust_trans_details_reports($Company_id,$From_date,$To_date,$Enrollement_id,$transaction_type_id,$Tier_id)
	{
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));
		
		$this->db->select('IT.Trans_date,First_name,Middle_name,Last_name,IT.Card_id AS Membership_ID,Tier_name,TT.Trans_type,Bill_no,Purchase_amount,Paid_amount,Loyalty_pts,Redeem_points,Item_code,Quantity,Voucher_no,Voucher_status,Topup_amount,Card_id2 as Transfer_to,Transfer_points,Remarks,Expired_points');
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_transaction_type as TT','IT.Trans_type=TT.Trans_type_id');
		$this->db->join('igain_tier_master as TM','IE.Tier_id=TM.Tier_id');
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		$this->db->where('IT.Trans_type !=' , 10);
		$this->db->where('IT.Trans_type !=' , 9);
		if($Enrollement_id!=0)//Single Customers
		{
			$this->db->where('IT.Enrollement_id IN('.$Enrollement_id.')');
		}
		if($transaction_type_id!=0)//Single Transaction Type
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		if($Tier_id!=0)//Selected Tier
		{
			$this->db->where('IE.Tier_id' , $Tier_id);
		}
		$this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'desc');
		
		//$this->db->limit($limit,$start);
		$sql51 = $this->db->get();
		// echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			 foreach ($sql51->result() as $row)
			{
				// $this->db->select('IT.Trans_date,First_name,Middle_name,Last_name,IT.Card_id AS Membership_ID,Tier_name,TT.Trans_type,Bill_no,Purchase_amount,Redeem_points,Paid_amount,Topup_amount,Loyalty_pts,Card_id2 as Transfer_to,Transfer_points,Remarks');
				if($row->Purchase_amount==0)
				{
					$row->Purchase_amount="-";
				}
				if($row->Redeem_points==0)
				{
					$row->Redeem_points="-";
				}
				if($row->Paid_amount==0)
				{
					$row->Paid_amount="-";
				}
				if($row->Topup_amount==0)
				{
					$row->Topup_amount="-";
				}
				if($row->Loyalty_pts==0)
				{
					$row->Loyalty_pts="-";
				}
				if($row->Transfer_to=='0')
				{
					$row->Transfer_to="-";
				}
				if($row->Transfer_points==0)
				{
					$row->Transfer_points="-";
				}
				if($row->Bill_no==0)
				{
					$row->Bill_no="-";
				}
				if($row->Quantity==0)
				{
					$row->Quantity="-";
				}
				/*if($row->balance_to_pay==0)
				{
					$row->balance_to_pay="-";
				}*/
				if($row->Expired_points==0)
				{
					$row->Expired_points="-";
				}
				if($row->Remarks=="")
				{
					$row->Remarks="-";
				}
				if($row->Item_code=="")
				{
					$row->Item_code="-";
				}
				if($row->Voucher_no=="")
				{
					$row->Voucher_no="-";
				}
				if($row->Voucher_status=="")
				{
					$row->Voucher_status="-";
				}
				if($row->Remarks=="")
				{
					$row->Remarks="-";
				}
				$Merchandize_item_name="-";
				if($row->Trans_type=='Online Purchase')
				{
					
					//$ci_object = &get_instance();
					$this->load->model('Redemption_Catalogue/Redemption_Model');
					$Item_details = $this->Redemption_Model->Get_Merchandize_Item_details_fromcode($row->Item_code,$Company_id);
					foreach($Item_details as $Item)
					{
						$row->Merchandize_item_name=$Item->Merchandize_item_name;
					}
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
		/************************ Customer Reports ***************************/
	/************************ Nilesh Change 24-11-2017-Customer Redemption Reports start***************************/
	function get_cust_redemption_details($Company_id,$From_date,$To_date,$transaction_type_id,$Single_cust_membership_id,$Delivery_method,$Voucher_status,$Enrollement_id,$Super_seller,$Sub_seller_Enrollement_id,$Sub_seller_admin,$start,$limit)
	{    
		// echo "Delivery_method************".$Delivery_method;
		// echo "transaction_type_id************".$transaction_type_id;
		// echo"----Enrollement_id-----".$Enrollement_id."---<br>";
		// echo"----Super_seller-----".$Super_seller."---<br>";
		// echo"----Sub_seller_Enrollement_id-----".$Sub_seller_Enrollement_id."---<br>";
		// echo"----Sub_seller_admin-----".$Sub_seller_admin."---<br>";
		 
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));
		
		if($Sub_seller_Enrollement_id =='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
		{
			$get_staff=$this->Igain_model->Get_sub_seller_list($Enrollement_id);
			if($get_staff)
			{
				foreach ($get_staff as $staff)
				{
					// echo"--staff--".$staff->Enrollement_id."<br>";	
					$staff_array[] = $staff->Enrollement_id;								
				}
				$NDMembership1_id = "" . implode ( "', '", $staff_array ) . "";
				
				$this->db->select('ITT.Trans_type,IT.Seller,First_name,Middle_name,Last_name,IT.Enrollement_id,IT.Trans_id,IT.Trans_date,Redeem_points,IT.Card_id,IT.Company_id,IT.Update_User_id,Item_code,Voucher_no,ICM.Code_decode as Voucher_status,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch,Merchandize_item_name,Topup_amount,Purchase_amount,Quantity,Item_size,Redeem_points AS Redeem_points_per_Item,Partner_name,IB.Branch_name,IE.Blocked_points,Address,IT.Update_date');
				$this->db->from('igain_transaction as IT');
				$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
				$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code AND IT.Company_id=TT.Company_id ');
				$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
				$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code AND IT.Company_id=IB.Company_id ');
				$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');				
				$this->db->join('igain_transaction_type as ITT','IT.Trans_type=ITT.Trans_type_id');				
				$this->db->where('IB.Company_id' , $Company_id);
				$this->db->where('IT.Company_id' , $Company_id);
				$this->db->where('TT.Company_id' , $Company_id);
				$this->db->where('IE.Company_id' , $Company_id);
				
				
				
				if($transaction_type_id !='0')
				{
					// $this->db->where('IT.Trans_type' , $transaction_type_id);
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN ('".$NDMembership1_id."') AND IT.Trans_type=".$transaction_type_id."  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id." ) OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  IN ('".$NDMembership1_id."' ) AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.") ");
				}
				else
				{
					// $this->db->where('IT.Trans_type IN(10,12,17,20,22)');
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN ('".$NDMembership1_id."') AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  IN ('".$NDMembership1_id."' ) AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id." ) ");
				}
				if($Single_cust_membership_id!='0')
				{
					$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
				}
				if($Voucher_status!='0')
				{
					$this->db->where('IT.Voucher_status' , $Voucher_status);
				}
				if($Delivery_method!='0')
				{
					$this->db->where('IT.Delivery_method' , $Delivery_method);
				}		
				$this->db->order_by('IT.Trans_id' , 'asc');
				// if($limit != NULL || $start != ""){				
					// $this->db->limit($limit,$start);
				// }
				$sql51 = $this->db->get();
				// echo "----For Seller Admin------<br>".$this->db->last_query();
				foreach ($sql51->result() as $row)
				{
					if($row->Item_size==0)
					{
						$row->Item_size='-';
					}
					else if($row->Item_size==1)
					{
						$row->Item_size='Small';
					}
					else if($row->Item_size==2)
					{
						$row->Item_size='Medium';
					}
					else if($row->Item_size==3)
					{
						$row->Item_size='Large';
					}
					else if($row->Item_size==4)
					{
						$row->Item_size='Extra large';
					}
					if($row->Trans_type=="Redemption")
					{
						$row->Total_Redeem_points=($row->Redeem_points_per_Item*$row->Quantity);
					}
					else
					{
						$row->Total_Redeem_points=$row->Redeem_points_per_Item;
					}
					if($row->Redeem_points_per_Item==0)
					{
						$row->Redeem_points_per_Item='-';
					}
					
					if($row->Total_Redeem_points==0)
					{
						$row->Total_Redeem_points='-';
					}
					$data[] = $row;
				}
				
			}
					
				
		}
		else
		{
			
			$this->db->select('ITT.Trans_type,IT.Seller,First_name,Middle_name,Last_name,IT.Enrollement_id,IT.Trans_id,IT.Trans_date,Redeem_points,IT.Card_id,IT.Company_id,IT.Update_User_id,Item_code,Voucher_no,ICM.Code_decode as Voucher_status,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch,Merchandize_item_name,Topup_amount,Purchase_amount,Quantity,Item_size,Redeem_points AS Redeem_points_per_Item,Partner_name,IB.Branch_name,IE.Blocked_points,Address,IT.Update_date');
			$this->db->from('igain_transaction as IT');
			$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
			$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
			$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
			$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
			$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
			$this->db->join('igain_transaction_type as ITT','IT.Trans_type=ITT.Trans_type_id');	
			
			$this->db->where('IB.Company_id' , $Company_id);
			$this->db->where('IT.Company_id' , $Company_id);
			$this->db->where('TT.Company_id' , $Company_id);
			$this->db->where('IE.Company_id' , $Company_id);
			
			/* if($transaction_type_id !='0')
			{
				$this->db->where('IT.Trans_type' ,$transaction_type_id);
			}
			else
			{
				$this->db->where('IT.Trans_type IN(10,12,17,20,22)');
			} */
			if($Voucher_status!='0')
			{
				$this->db->where('IT.Voucher_status' , $Voucher_status);
			}	
			if($Delivery_method!='0')
			{
				$this->db->where('IT.Delivery_method' , $Delivery_method);
			}
			if($Single_cust_membership_id!='0')
			{
				$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
			}
			
			
			if($Sub_seller_Enrollement_id !='0' && $Sub_seller_admin =='1' && $Super_seller !='1') //Staff 
			{
				
				
				if($transaction_type_id !='0')
				{
					// $this->db->where('IT.Trans_type' ,$transaction_type_id);
					$this->db->where(" (IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."'  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id." ) )  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."' AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.") ");
				}
				else
				{
					// $this->db->where('IT.Trans_type IN(10,12,17,20,22)');
					$this->db->where(" (IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Trans_type IN(10,12,17,20,22)  AND IT.Company_id=".$Company_id.")   OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.") ");
				}
				if($Voucher_status!='0')
				{
					$this->db->where('IT.Voucher_status' , $Voucher_status);
				}	
				if($Delivery_method!='0')
				{
					$this->db->where('IT.Delivery_method' , $Delivery_method);
				}
			}
			if($Sub_seller_Enrollement_id =='0' &&  $Sub_seller_admin=='1'  && $Super_seller =='1')
			{
				
				
				if($transaction_type_id !='0')
				{
					// $this->db->where('IT.Trans_type' ,$transaction_type_id);
					// $this->db->where(" (IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Trans_type=".$transaction_type_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."'  AND IT.Trans_type=".$transaction_type_id.")");
					
					$this->db->where(" (IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")");
				}
				else
				{
					// $this->db->where('IT.Trans_type IN(10,12,17,20,22)');
					// $this->db->where(" (IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Trans_type IN(10,12,17,20,22))  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."'  AND IT.Trans_type IN(10,12,17,20,22))");
					$this->db->where(" (IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND  IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")");
				}
				if($Voucher_status!='0')
				{
					$this->db->where('IT.Voucher_status' , $Voucher_status);
				}	
				if($Delivery_method!='0')
				{
					$this->db->where('IT.Delivery_method' , $Delivery_method);
				}
				if($Single_cust_membership_id!='0')
				{
					$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
				}
					
			}
			
			// $this->db->where_OR("IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'");
			
			$this->db->group_by('Trans_id');
			
			if($Single_cust_membership_id!='0')
			{
				$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
			}
			
			$this->db->order_by('IT.Trans_id' , 'asc');
			// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
			$sql51 = $this->db->get();
			// echo "----For Super Admin------<br>".$this->db->last_query();
			if($sql51 -> num_rows() > 0)
			{	
				
				foreach ($sql51->result() as $row)
				{
					if($row->Item_size==0)
					{
						$row->Item_size='-';
					}
					else if($row->Item_size==1)
					{
						$row->Item_size='Small';
					}
					else if($row->Item_size==2)
					{
						$row->Item_size='Medium';
					}
					else if($row->Item_size==3)
					{
						$row->Item_size='Large';
					}
					else if($row->Item_size==4)
					{
						$row->Item_size='Extra large';
					}
					if($row->Trans_type=="Redemption")
					{
						$row->Total_Redeem_points=($row->Redeem_points_per_Item*$row->Quantity);
					}
					else
					{
						$row->Total_Redeem_points=$row->Redeem_points_per_Item;
					}
					if($row->Redeem_points_per_Item==0)
					{
						$row->Redeem_points_per_Item='-';
					}
					
					if($row->Total_Redeem_points==0)
					{
						$row->Total_Redeem_points='-';
					}
					$data[] = $row;
				}					
				
				 // return $data; 
			}
			else
			{
				return false;
			}
		}
		return $data; 
		
	}		
	function get_cust_redemption_details_exports($Company_id,$start_date,$end_date,$transaction_type_id,$Single_cust_membership_id,$Delivery_method,$Voucher_status,$Enrollement_id,$Super_seller,$Sub_seller_Enrollement_id,$Sub_seller_admin)
	{
		
		$From_date=date("Y-m-d",strtotime($start_date));
		$To_date=date("Y-m-d",strtotime($end_date));
		
		if($Sub_seller_Enrollement_id =='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
		{
			$get_staff=$this->Igain_model->Get_sub_seller_list($Enrollement_id);
			if($get_staff)
			{
				foreach ($get_staff as $staff)
				{
					// echo"--staff--".$staff->Enrollement_id."<br>";	
					$staff_array[] = $staff->Enrollement_id;								
				}
				$NDMembership1_id = "" . implode ( "', '", $staff_array ) . "";
				
				$this->db->select('IT.Trans_date,ITT.Trans_type,IT.Card_id as Membership_ID,First_name,Last_name,Merchandize_item_name,Quantity,Item_size,Partner_name,IB.Branch_name,Topup_amount,Purchase_amount,Redeem_points AS Redeem_points_per_Item,Voucher_no,ICM.Code_decode as Voucher_status,IT.Update_date as Utilized_date,IT.Seller AS Issued_Enrollment,IT.Update_User_id AS Updated_Enrollment');
				$this->db->from('igain_transaction as IT');
				$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
				$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
				$this->db->join(' igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
				$this->db->join(' igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');	
				$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');		
				$this->db->join('igain_transaction_type as ITT','IT.Trans_type=ITT.Trans_type_id');	
				
				$this->db->where('IB.Company_id' , $Company_id);
				$this->db->where('IT.Company_id' , $Company_id);
				$this->db->where('TT.Company_id' , $Company_id);					
				
				if($transaction_type_id !='0')
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN ('".$NDMembership1_id."') AND IT.Trans_type=".$transaction_type_id."  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.") OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  IN ('".$NDMembership1_id."' ) AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.") ");
					
				}
				else
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN ('".$NDMembership1_id."') AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  IN ('".$NDMembership1_id."' ) AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.") ");
				}
				
				if($Single_cust_membership_id!='0')
				{
					$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
				}
				if($Voucher_status!='0')
				{
					$this->db->where('IT.Voucher_status' , $Voucher_status);
				}	
				if($Delivery_method!='0')
				{
					$this->db->where('IT.Delivery_method' , $Delivery_method);
				}		
				$this->db->order_by('IT.Trans_id' , 'asc');
				// $this->db->limit($limit,$start);
				$sql51 = $this->db->get();
				// echo $this->db->last_query();
				foreach ($sql51->result() as $row)
				{
					if($row->Voucher_status=="Issued")
					{
						$row->Utilized_date="-";
					}
					$user_details = $this->Igain_model->get_enrollment_details($row->Updated_Enrollment);
					
					$Updated_by = $user_details->First_name.' '.$user_details->Last_name;					
					$user_details = $this->Igain_model->get_enrollment_details($row->Issued_Enrollment);
					$Issued_by = $user_details->First_name.' '.$user_details->Last_name;
					
					$row->Issued_by=$Issued_by;
					$row->Updated_by=$Updated_by;
					if($row->Updated_Enrollment ==0)
					{
						$row->Updated_Enrollment="-";
					}
					if($row->Updated_Enrollment ==0)
					{
						$row->Updated_Enrollment="-";
					}					
					if($Updated_by =='0' || $Updated_by =="")
					{
						$row->Updated_by="-";
						
					}
					if($Issued_by =='0' || $Issued_by =="")
					{
						$row->Issued_by="-";
						
					} 
					
					if($row->Item_size==0)
					{
						$row->Item_size='-';
					}
					else if($row->Item_size==1)
					{
						$row->Item_size='Small';
					}
					else if($row->Item_size==2)
					{
						$row->Item_size='Medium';
					}
					else if($row->Item_size==3)
					{
						$row->Item_size='Large';
					}
					else if($row->Item_size==4)
					{
						$row->Item_size='Extra large';
					}
					
					if($row->Trans_type=="Redemption")
					{
						$row->Total_Redeem_points=($row->Redeem_points_per_Item*$row->Quantity);
					}
					else
					{
						$row->Total_Redeem_points=$row->Redeem_points_per_Item;
					}
					if($row->Redeem_points_per_Item==0)
					{
						$row->Redeem_points_per_Item='-';
					}
					
					if($row->Total_Redeem_points==0)
					{
						$row->Total_Redeem_points='-';
					}
					if($row->Purchase_amount==0)
					{
						$row->Purchase_amount='-';
					}
					
					$data[] = $row;
					
				}	
				return $data; 				
			}					
				
		}
		else
		{
				
				$this->db->select('IT.Trans_date,ITT.Trans_type,IT.Card_id as Membership_ID,First_name,Last_name,Merchandize_item_name,Quantity,Item_size,Partner_name,IB.Branch_name,Topup_amount,Purchase_amount,Redeem_points AS Redeem_points_per_Item,Voucher_no,ICM.Code_decode as Voucher_status,IT.Update_date as Utilized_date,IT.Seller AS Issued_Enrollment,IT.Update_User_id AS Updated_Enrollment');
				$this->db->from('igain_transaction as IT');
				$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
				$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
				$this->db->join(' igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
				$this->db->join(' igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
				$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');	
				$this->db->join('igain_transaction_type as ITT','IT.Trans_type=ITT.Trans_type_id');	
				
				$this->db->where('IB.Company_id' , $Company_id);
				$this->db->where('IT.Company_id' , $Company_id);
				$this->db->where('TT.Company_id' , $Company_id);
				
				/* if($transaction_type_id !='0')
				{
					$this->db->where('IT.Trans_type' ,$transaction_type_id);
				}
				else
				{
					$this->db->where('IT.Trans_type IN(10,12,17,20,22)');
				} */
				if($Voucher_status!='0')
				{
					$this->db->where('IT.Voucher_status' , $Voucher_status);
				}	
				if($Delivery_method!='0')
				{
					$this->db->where('IT.Delivery_method' , $Delivery_method);
				}
				if($Single_cust_membership_id!='0')
				{
					$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
				}
				
				if( $Sub_seller_Enrollement_id !='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
				{
					// $this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' )  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."' ) ");
					if($transaction_type_id!='0')
					{
						
						$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."'  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."'  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.") ");
					}
					else
					{
						$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."'   AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."'  AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  ");
					}
						
					if($Voucher_status!='0')
					{
						$this->db->where('IT.Voucher_status' , $Voucher_status);
					}	
					if($Delivery_method!='0')
					{
						$this->db->where('IT.Delivery_method' , $Delivery_method);
					}
				}
				if( $Sub_seller_Enrollement_id =='0' &&  $Sub_seller_admin=='1'  && $Super_seller =='1')
				{
					
					
					if($transaction_type_id!='0')
					{
						// $this->db->where('IT.Trans_type' , $transaction_type_id);
						// $this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Trans_type=".$transaction_type_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."' AND IT.Trans_type=".$transaction_type_id.") ");
						$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.") ");
					}
					else
					{
						// $this->db->where('IT.Trans_type IN(10,12,17,20,22)');
						// $this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."'  AND IT.Trans_type IN(10,12,17,20,22))  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."'  AND IT.Trans_type IN(10,12,17,20,22)) ");
						$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.") ");
					}
						
					if($Voucher_status!='0')
					{
						$this->db->where('IT.Voucher_status' , $Voucher_status);
					}	
					if($Delivery_method!='0')
					{
						$this->db->where('IT.Delivery_method' , $Delivery_method);
					}
				}
				// $this->db->where_OR("IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'");
				/* if($transaction_type_id!='0')
				{
					$this->db->where('IT.Trans_type' , $transaction_type_id);
				}
				else
				{
					$this->db->where('IT.Trans_type IN(10,12,17,20,22)');
				}
				 */
				$this->db->group_by('Trans_id');
				
				if($Single_cust_membership_id!='0')
				{
					$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
				}
				if($Voucher_status!='0')
				{
					$this->db->where('IT.Voucher_status' , $Voucher_status);
				}	
				if($Delivery_method!='0')
				{
					$this->db->where('IT.Delivery_method' , $Delivery_method);
				}		
				
				$this->db->order_by('IT.Trans_id' , 'asc');
				// $this->db->limit($limit,$start);
				$sql51 = $this->db->get();
				// echo "<br>".$this->db->last_query();
				if($sql51 -> num_rows() > 0)
				{	
					
					foreach ($sql51->result() as $row)
					{
						if($row->Voucher_status=="Issued" || $row->Voucher_status=="Ordered")
						{
							$row->Utilized_date="-";
						}
						
					if($row->Voucher_status=="Issued" || $row->Voucher_status=="Ordered")
					{
						$row->Utilized_date="-";
					}
					if($row->Purchase_amount ==0)
					{
						$row->Purchase_amount='-';
					}
					if($row->Topup_amount==0)
					{
						$row->Topup_amount='-';
					}
						$user_details = $this->Igain_model->get_enrollment_details($row->Updated_Enrollment);
						
						$Updated_by = $user_details->First_name.' '.$user_details->Last_name;					
						$user_details = $this->Igain_model->get_enrollment_details($row->Issued_Enrollment);
						$Issued_by = $user_details->First_name.' '.$user_details->Last_name;
						
						$row->Issued_by=$Issued_by;
						$row->Updated_by=$Updated_by;
						if($row->Updated_Enrollment ==0)
						{
							$row->Updated_Enrollment="-";
						}
						if($row->Updated_Enrollment ==0)
						{
							$row->Updated_Enrollment="-";
						}					
						if($Updated_by =='0' || $Updated_by =="")
						{
							$row->Updated_by="-";
							
						}
						if($Issued_by =='0' || $Issued_by =="")
						{
							$row->Issued_by="-";
							
						}
						
						if($row->Item_size==0)
						{
							$row->Item_size='-';
						}
						else if($row->Item_size==1)
						{
							$row->Item_size='Small';
						}
						else if($row->Item_size==2)
						{
							$row->Item_size='Medium';
						}
						else if($row->Item_size==3)
						{
							$row->Item_size='Large';
						}
						else if($row->Item_size==4)
						{
							$row->Item_size='Extra large';
						}
						
						if($row->Trans_type=="Redemption")
						{
							$row->Total_Redeem_points=($row->Redeem_points_per_Item*$row->Quantity);
						}
						else
						{
							$row->Total_Redeem_points=$row->Redeem_points_per_Item;
						}
						
						if($row->Redeem_points_per_Item==0)
						{
							$row->Redeem_points_per_Item='-';
						}
						
						if($row->Total_Redeem_points==0)
						{
							$row->Total_Redeem_points='-';
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
		return $data;		
	}
	
	function get_cust_redemption_summary($Company_id,$From_date,$To_date,$transaction_type_id,$Single_cust_membership_id,$report_type,$Delivery_method,$Voucher_status,$Enrollement_id,$Super_seller,$Sub_seller_Enrollement_id,$Sub_seller_admin,$start,$limit)
	{
		// echo"---get_cust_redemption_summary---<br>";
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));	
		
		if($Sub_seller_Enrollement_id =='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
		{
			
			$get_staff=$this->Igain_model->Get_sub_seller_list($Enrollement_id);
			if($get_staff)
			{
				foreach ($get_staff as $staff)
				{
					$staff_array[] = $staff->Enrollement_id;						
				}
				$NDMembership1_id = "" . implode ( "', '", $staff_array ) . "";
				
				$this->db->select("First_name,Middle_name,Last_name,Partner_name,IB.Branch_name,IT.Enrollement_id,IT.Trans_id,CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,SUM(Purchase_amount) as total_purchase_amt,SUM(Redeem_points) AS Total_points,IT.Card_id,IE.Blocked_points,Address,,ICM.Code_decode as Voucher_status,count(Voucher_no) AS Total_Quantity,IT.Trans_type as Transaction_type,Quantity");
				
				$this->db->from('igain_transaction as IT');
				$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
				$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
				$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
				$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
				$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');	
				
				$this->db->where('IB.Company_id' , $Company_id);
				$this->db->where('IT.Company_id' , $Company_id);
				$this->db->where('TT.Company_id' , $Company_id);
					
				
			
				if($transaction_type_id!='0')
				{
					// $this->db->where('IT.Trans_type' , $transaction_type_id);
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN ('".$NDMembership1_id."') AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  IN ('".$NDMembership1_id."' AND IT.Trans_type=".$transaction_type_id.") AND IT.Company_id=".$Company_id.") ");
				}
				else
				{
					// $this->db->where('IT.Trans_type IN(10,12,17,22)');
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN ('".$NDMembership1_id."')  AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  IN ('".$NDMembership1_id."' )  AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.") ");
				}
				if($Single_cust_membership_id!='0')
				{
					$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
				}
				if($Voucher_status!='0')
				{
					$this->db->where('IT.Voucher_status' , $Voucher_status);
				}
				if($Delivery_method!='0')
				{
					$this->db->where('IT.Delivery_method' , $Delivery_method);
				}
				// $this->db->group_by("DATE(IT.Trans_date)","asc");
				$this->db->group_by("MONTH(IT.Trans_date)","asc");
				$this->db->group_by("YEAR(IT.Trans_date)","asc");
				$this->db->group_by("IT.Voucher_status","asc");
				$this->db->group_by("IT.Merchandize_Partner_id");
				$this->db->group_by("IT.Merchandize_Partner_branch");
				
				// if($limit != NULL || $start != ""){				
					// $this->db->limit($limit,$start);
				// }
				$sql51 = $this->db->get();
				// echo $this->db->last_query();
				foreach ($sql51->result() as $row)
				{
					if($row->Transaction_type==10)
					{
						$row->Total_points=($row->Total_points*$row->Quantity);
					}
					else
					{
						$row->Total_points=$row->Total_points;
					}
					if($row->Total_points==0)
					{	
						$row->Total_points='-';
					}
					if($row->total_purchase_amt==0)
					{	
						$row->total_purchase_amt='-';
					}
					$data[] = $row;
				}
				
			}
			
		}
		else
		{
			$this->db->select("First_name,Middle_name,Last_name,Partner_name,IB.Branch_name,IT.Enrollement_id,IT.Trans_id,CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,SUM(Purchase_amount) as total_purchase_amt,SUM(Redeem_points) AS Total_points,IT.Card_id,IE.Blocked_points,Address,,ICM.Code_decode as Voucher_status,count(Voucher_no) AS Total_Quantity,IT.Trans_type as Transaction_type,Quantity");
			$this->db->from('igain_transaction as IT');
			
			$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
			$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
			$this->db->join(' igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
			$this->db->join(' igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
			$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
			
			$this->db->where('IB.Company_id' , $Company_id);
			$this->db->where('IT.Company_id' , $Company_id);
			$this->db->where('TT.Company_id' , $Company_id);
			$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		// $this->db->where('IT.Trans_type' , $transaction_type_id);
			/* if($transaction_type_id!='0')
			{
				$this->db->where('IT.Trans_type' , $transaction_type_id);
			}
			else
			{
				$this->db->where('IT.Trans_type IN(10,12,17,22)');
			} */
			
			if($Single_cust_membership_id!='0')
			{
				$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
			}
			if($Voucher_status!='0')
			{
				$this->db->where('IT.Voucher_status' , $Voucher_status);
			}
			if($Delivery_method!='0')
			{
				$this->db->where('IT.Delivery_method' , $Delivery_method);
			}			
			if( $Sub_seller_Enrollement_id !='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
			{			
				
				// $this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.") ");
				
				if($transaction_type_id!='0')
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type=".$transaction_type_id." AND IT.Update_User_id  = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.") ");
				}
				else
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Seller = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.") ");
				}
				
			}
			if( $Sub_seller_Enrollement_id =='0' &&  $Sub_seller_admin=='1'  && $Super_seller =='1')
			{
				// $this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Company_id=".$Company_id.") ");				
				
				if($transaction_type_id!='0')
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.") ");
				}
				else
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.") ");
				}
				
			}
			
			$this->db->group_by("MONTH(IT.Trans_date)","asc");
			$this->db->group_by("YEAR(IT.Trans_date)","asc");
			$this->db->group_by("IT.Voucher_status","asc");
			$this->db->group_by("IT.Merchandize_Partner_id");
			$this->db->group_by("IT.Merchandize_Partner_branch");
			// $this->db->order_by('IT.Trans_id' , 'desc');
			// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
			$sql51 = $this->db->get();
			// echo "------For Company Admin----- <br>".$this->db->last_query();
		
			if($sql51 -> num_rows() > 0)
			{
				//return $sql51->row();
				foreach ($sql51->result() as $row)
				{
					if($row->Transaction_type==10)
					{
						$row->Total_points=($row->Total_points*$row->Quantity);
					}
					else
					{
						$row->Total_points=$row->Total_points;
					}
					if($row->Total_points==0)
					{	
						$row->Total_points='-';
					}
					if($row->total_purchase_amt==0)
					{	
						$row->total_purchase_amt='-';
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
		return $data; 
		
	}
	function get_cust_redemption_summary_exports($Company_id,$From_date,$To_date,$transaction_type_id,$Single_cust_membership_id,$report_type,$Delivery_method,$Voucher_status,$Enrollement_id,$Super_seller,$Sub_seller_Enrollement_id,$Sub_seller_admin)
	{
		/* $From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));
		
		$this->db->select("CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,Partner_name,IB.Branch_name,ICM.Code_decode as Voucher_status,count(Voucher_no) AS Total_Quantity,SUM(Purchase_amount) as total_purchase_amt,SUM(Redeem_points) AS Total_Redeem_points");
		
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		
		$this->db->where('IB.Company_id' , $Company_id);
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		// $this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		// $this->db->where('IT.Trans_type' , $transaction_type_id);
		
		
		
		if( $Sub_seller_Enrollement_id !='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
		{
			$get_staff=$this->Igain_model->Get_sub_seller_list($Enrollement_id);
			if($get_staff)
			{
				foreach ($get_staff as $staff)
				{
					$staff_array[] = $staff->Enrollement_id;						
				}
				$NDMembership1_id = "" . implode ( "', '", $staff_array ) . "";
			}
			// IN ('".$NDMembership1_id."'
			$this->db->where(" IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN '".$Enrollement_id."' AND IT.Company_id=".$Company_id."");
		}
		if( $Sub_seller_Enrollement_id =='0' &&  $Sub_seller_admin=='1'  && $Super_seller =='1')
		{
			$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Company_id=".$Company_id.") ");
		}
		
		if($transaction_type_id!='0')
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		else
		{
			$this->db->where('IT.Trans_type IN(10,12,17,22)');
		}
		if($Single_cust_membership_id!='0')
		{
			$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' , $Voucher_status);
		}
		if($Delivery_method!='0')
		{
			$this->db->where('IT.Delivery_method' , $Delivery_method);
		}
		// $this->db->group_by("DATE(IT.Trans_date)","asc");
		$this->db->group_by("MONTH(IT.Trans_date)","asc");
		$this->db->group_by("YEAR(IT.Trans_date)","asc");
		$this->db->group_by("IT.Voucher_status","asc");
		$this->db->group_by("IT.Merchandize_Partner_id");
		$this->db->group_by("IT.Merchandize_Partner_branch");
		// $this->db->order_by('IT.Trans_date' , 'desc');
		// $this->db->limit($limit,$start);
		$sql51 = $this->db->get();
		//echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				if($row->Transaction_type==10)
				{
					$row->Total_Redeem_points=($row->Total_Redeem_points*$row->Quantity);
				}
				else
				{
					$row->Total_Redeem_points=$row->Total_Redeem_points;
				}
				if($row->Total_Redeem_points==0)
				{
					$row->Total_Redeem_points='-';
				}
				if($row->total_purchase_amt==0)
				{
					$row->total_purchase_amt='-';
				}
                $data[] = $row;
            }
			 return $data; 
		}
		else
		{
			return false;
		} */
				
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));	
		
		if($Sub_seller_Enrollement_id =='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
		{
			
			$get_staff=$this->Igain_model->Get_sub_seller_list($Enrollement_id);
			if($get_staff)
			{
				foreach ($get_staff as $staff)
				{
					$staff_array[] = $staff->Enrollement_id;						
				}
				$NDMembership1_id = "" . implode ( "', '", $staff_array ) . "";
				
				$this->db->select("CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,Partner_name,IB.Branch_name,ICM.Code_decode as Voucher_status,count(Voucher_no) AS Total_Quantity,SUM(Purchase_amount) as total_purchase_amt,SUM(Redeem_points) AS Total_points");
				
				$this->db->from('igain_transaction as IT');
				$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
				$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
				$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
				$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
				$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');	
				
				$this->db->where('IB.Company_id' , $Company_id);
				$this->db->where('IT.Company_id' , $Company_id);
				$this->db->where('TT.Company_id' , $Company_id);
					
				
			
				if($transaction_type_id!='0')
				{
					// $this->db->where('IT.Trans_type' , $transaction_type_id);
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN ('".$NDMembership1_id."') AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  IN ('".$NDMembership1_id."' AND IT.Trans_type=".$transaction_type_id.") AND IT.Company_id=".$Company_id.") ");
				}
				else
				{
					// $this->db->where('IT.Trans_type IN(10,12,17,22)');
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller IN ('".$NDMembership1_id."')  AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  IN ('".$NDMembership1_id."' )  AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.") ");
				}
				if($Single_cust_membership_id!='0')
				{
					$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
				}
				if($Voucher_status!='0')
				{
					$this->db->where('IT.Voucher_status' , $Voucher_status);
				}
				if($Delivery_method!='0')
				{
					$this->db->where('IT.Delivery_method' , $Delivery_method);
				}
				// $this->db->group_by("DATE(IT.Trans_date)","asc");
				$this->db->group_by("MONTH(IT.Trans_date)","asc");
				$this->db->group_by("YEAR(IT.Trans_date)","asc");
				$this->db->group_by("IT.Voucher_status","asc");
				$this->db->group_by("IT.Merchandize_Partner_id");
				$this->db->group_by("IT.Merchandize_Partner_branch");
				
				// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
				$sql51 = $this->db->get();
				// echo $this->db->last_query();
				foreach ($sql51->result() as $row)
				{
					if($row->Transaction_type==10)
					{
						$row->Total_points=($row->Total_points*$row->Quantity);
					}
					else
					{
						$row->Total_points=$row->Total_points;
					}
					if($row->Total_points==0)
					{	
						$row->Total_points='-';
					}
					if($row->total_purchase_amt==0)
					{	
						$row->total_purchase_amt='-';
					}
					$data[] = $row;
				}
				
			}
			
		}
		else
		{
			// $this->db->select("First_name,Middle_name,Last_name,Partner_name,IB.Branch_name,IT.Enrollement_id,IT.Trans_id,CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,SUM(Purchase_amount) as total_purchase_amt,SUM(Redeem_points) AS Total_points,IT.Card_id,IE.Blocked_points,Address,,ICM.Code_decode as Voucher_status,count(Voucher_no) AS Total_Quantity,IT.Trans_type as Transaction_type,Quantity");
			
			$this->db->select("CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,Partner_name,IB.Branch_name,ICM.Code_decode as Voucher_status,count(Voucher_no) AS Total_Quantity,SUM(Purchase_amount) as total_purchase_amt,SUM(Redeem_points) AS Total_points");
			
			$this->db->from('igain_transaction as IT');
			
			$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
			$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
			$this->db->join(' igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
			$this->db->join(' igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
			$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
			
			$this->db->where('IB.Company_id' , $Company_id);
			$this->db->where('IT.Company_id' , $Company_id);
			$this->db->where('TT.Company_id' , $Company_id);
			$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
			
			// $this->db->where('IT.Trans_type' , $transaction_type_id);
			/* if($transaction_type_id!='0')
			{
				$this->db->where('IT.Trans_type' , $transaction_type_id);
			}
			else
			{
				$this->db->where('IT.Trans_type IN(10,12,17,22)');
			} */
			
			if($Single_cust_membership_id!='0')
			{
				$this->db->where('IT.Card_id IN ("'.$Single_cust_membership_id.'")');
			}
			if($Voucher_status!='0')
			{
				$this->db->where('IT.Voucher_status' , $Voucher_status);
			}
			if($Delivery_method!='0')
			{
				$this->db->where('IT.Delivery_method' , $Delivery_method);
			}			
			
			/* if( $Sub_seller_Enrollement_id !='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
			{	
				$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.") ");
			}
			if( $Sub_seller_Enrollement_id =='0' &&  $Sub_seller_admin=='1'  && $Super_seller =='1')
			{
				$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Company_id=".$Company_id.") ");
			} */
			
			if( $Sub_seller_Enrollement_id !='0' && $Sub_seller_admin =='1' && $Super_seller !='1'  )
			{							
				
				// $this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Update_User_id  = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.") ");
				
				if($transaction_type_id!='0')
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type=".$transaction_type_id." AND IT.Update_User_id  = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.") ");
				}
				else
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Seller = '".$Enrollement_id."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Seller = '".$Enrollement_id."' AND IT.Company_id=".$Company_id.") ");
				}
				
			}
			if( $Sub_seller_Enrollement_id =='0' &&  $Sub_seller_admin=='1'  && $Super_seller =='1')
			{
				// $this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Company_id=".$Company_id.") ");				
				
				if($transaction_type_id!='0')
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'  AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type=".$transaction_type_id." AND IT.Company_id=".$Company_id.") ");
				}
				else
				{
					$this->db->where(" ( IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.")  OR ( IT.Update_date BETWEEN '".$From_date."' AND '".$To_date."' AND IT.Trans_type IN(10,12,17,20,22) AND IT.Company_id=".$Company_id.") ");
				}
				
			}
			
			$this->db->group_by("MONTH(IT.Trans_date)","asc");
			$this->db->group_by("YEAR(IT.Trans_date)","asc");
			$this->db->group_by("IT.Voucher_status","asc");
			$this->db->group_by("IT.Merchandize_Partner_id");
			$this->db->group_by("IT.Merchandize_Partner_branch");
			// $this->db->order_by('IT.Trans_id' , 'desc');
		/* 	if($limit != NULL || $start != ""){				
			$this->db->limit($limit,$start);
		} */
			$sql51 = $this->db->get();
			// echo "<br>".$this->db->last_query();
			if($sql51 -> num_rows() > 0)
			{
				//return $sql51->row();
				foreach ($sql51->result() as $row)
				{
					if($row->Transaction_type==10)
					{
						$row->Total_points=($row->Total_points*$row->Quantity);
					}
					else
					{
						$row->Total_points=$row->Total_points;
					}
					if($row->Total_points==0)
					{	
						$row->Total_points='-';
					}
					if($row->total_purchase_amt==0)
					{	
						$row->total_purchase_amt='-';
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
		return $data; 
	}
	/************* 24-11-2017-Nilesh Change Customer Redemption Reports end**************/
	/************************ Partner Redemption Reports start*************************/
	function get_partner_redemption_details($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status)
	{
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));  
		$this->db->select('First_name,Middle_name,Last_name,IT.Enrollement_id,IT.Trans_id,IT.Trans_date,Redeem_points,IT.Card_id,IT.Company_id,Item_code,Voucher_no,ICM.Code_decode as Voucher_status,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch,Merchandize_item_name,Quantity,Redeem_points AS Redeem_points_per_Item,Partner_name,IB.Branch_name,Cost_payable_to_partner');
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		$this->db->where('IB.Company_id' , $Company_id);
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		if($Partner_id!=0)
		{
			$this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		}
		if($partner_branches!='0')
		{
			$this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' , $Voucher_status);
		}
		$this->db->where('IT.Trans_type' , 10);
		// if($limit != NULL || $start != ""){				
			// $this->db->limit($limit,$start);
		// }
		$this->db->group_by('Trans_id');
		//$this->db->order_by('IT.Trans_date,IT.Enrollement_id,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch' , 'desc');
		
		$this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'desc');
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
	function get_partner_redemption_details_exports($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status)
	{
		  $From_date=date("Y-m-d",strtotime($From_date));
		  $To_date=date("Y-m-d",strtotime($To_date));
		  $this->db->select('IT.Trans_date,IT.Card_id as Membership_ID,First_name,Middle_name,Last_name,Partner_name,IB.Branch_name,Item_code,Merchandize_item_name,Redeem_points,Redeem_points AS Redeem_points_per_Item,(Redeem_points*Quantity) as Total_Redeemed_Points,Voucher_no,ICM.Code_decode as Voucher_status,(Cost_payable_to_partner*Quantity) as Cost_payable_to_partner,Quantity,Quantity_balance');
		  $this->db->from('igain_transaction as IT');
		  $this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		  $this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		  $this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		  $this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		  $this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		  $this->db->where('IB.Company_id' , $Company_id);
		  $this->db->where('IT.Company_id' , $Company_id);
		  $this->db->where('TT.Company_id' , $Company_id);
		  $this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		  if($Partner_id!=0)
		  {
		   $this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		  }
		  if($partner_branches!='0')
		  {
		   $this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		  }
		  if($Voucher_status!='0')
		  {
		   $this->db->where('IT.Voucher_status' , $Voucher_status);
		  }
		  $this->db->group_by('Trans_id');
		  //$this->db->order_by('IT.Trans_date,IT.Enrollement_id,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch' , 'desc');
		 
		  $this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'desc');
		  $sql51 = $this->db->get();
		  
		  //echo "<br>".$this->db->last_query();
		 
		  if($sql51 -> num_rows() > 0)
		  {
		   //return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				$row->Used_quantity = $row->Quantity - $row->Quantity_balance;
				$data[] = $row;
			}
			return $data; 
		  }
		  else
		  {
		   return false;
		  }
	}			
	/************************ Partner Redemption Reports end***************************/		
	/********************Nilesh start partner merchandize catlouge report*****************/	
	function get_partner_merchandzie_catalogue_details($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status,$transaction_type_id,$Delivery_method,$start,$limit)
	{ 
		$From_date=date("Y-m-d",strtotime($From_date));  
		$To_date=date("Y-m-d",strtotime($To_date));
		
		$this->db->select('First_name,Middle_name,Last_name,IT.Enrollement_id,IT.Trans_id,IT.Trans_date,Redeem_points,IT.Card_id,IT.Company_id,Item_code,Voucher_no,Voucher_status,ICM.Code_decode as Status,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch,Merchandize_item_name,Quantity,IT.Item_size,IT.Purchase_amount,IT.Shipping_cost,Partner_name,IB.Branch_name,Cost_payable_to_partner,IT.Remarks,ITT.Trans_type,IT.Cost_payable_partner,IT.Payment_to_partner_flag,ICMM.Code_decode as Delivery_method');
		
		$this->db->from('igain_transaction as IT'); 
		
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');	
		$this->db->join('igain_codedecode_master as ICMM','IT.Delivery_method=ICMM.Code_decode_id');	
		$this->db->join('igain_transaction_type as ITT','IT.Trans_type=ITT.Trans_type_id');
		
		$this->db->where('IB.Company_id' , $Company_id);
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Partner_id!=0)
		{
			$this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		}
		if($partner_branches!='0')
		{
			$this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		}
		if($transaction_type_id!='0')
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		else
		{
			$this->db->where('IT.Trans_type IN(10,12)');
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' , $Voucher_status);
		}
		if($Delivery_method !='0')
		{
			$this->db->where('IT.Delivery_method' ,$Delivery_method);
		}
		// if($limit != NULL || $start != ""){				
			// $this->db->limit($limit,$start);
		// }
		$this->db->group_by('Trans_id');
		$this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'asc');
		$sql51 = $this->db->get();
		// echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				if($row->Trans_type=="Redemption")
				{
					$row->Total_Redeem_points=$row->Redeem_points*$row->Quantity;
				}
				else 
				{
					$row->Total_Redeem_points=$row->Redeem_points;
				}
				if($row->Total_Redeem_points==0)
				{	
					$row->Total_Redeem_points='-';
				}
				if($row->Payment_to_partner_flag==1)
				{
					$row->Payment_to_partner_flag='Paid';
				}
				else
				{
					$row->Payment_to_partner_flag='Pending';
				}
				if($row->Item_size==0)
				{
					$row->Item_size='-';
				}
				else if($row->Item_size==1)
				{
					$row->Item_size='Small';
				}
				else if($row->Item_size==2)
				{
					$row->Item_size='Medium';
				}
				else if($row->Item_size==3)
				{
					$row->Item_size='Large';
				}
				else if($row->Item_size==4)
				{
					$row->Item_size='Extra large';
				}
				  
				if($row->Purchase_amount==0)
				{
					$row->Purchase_amount='-';
				}
				if($row->Redeem_points ==0)
				{
					$row->Redeem_points ='-';
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
	function get_partner_merchandzie_catalogue_summary($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status,$transaction_type_id,$Delivery_method,$start,$limit)
	{   
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));	 
		
		$this->db->select("IT.Enrollement_id,IT.Trans_id,CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,SUM(Redeem_points*Quantity) AS Total_points,SUM(Redeem_points) as Redeem_points ,IT.Card_id,Voucher_status,ICM.Code_decode as Status,SUM(Quantity) AS Total_Quantity,Quantity,Voucher_no,count(Voucher_no) as total_voucher,SUM(IT.Purchase_amount) as total_purchase_amt,SUM(Cost_payable_partner) as Total_cost_pay_to_partnet,SUM(Shipping_cost) as total_shipping_cost,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch,Partner_name,IB.Branch_name,IT.Trans_type");
		
		$this->db->from('igain_transaction as IT');
		
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		
		$this->db->where('IB.Company_id' , $Company_id);
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Partner_id!=0)
		{
			$this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		}
		if($partner_branches!='0')
		{
			$this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		}
		if($transaction_type_id!='0')
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		else
		{
			$this->db->where('IT.Trans_type IN(10,12)');
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' ,$Voucher_status);
		}
		if($Delivery_method !='0')
		{
			$this->db->where('IT.Delivery_method' ,$Delivery_method);
		}
		// if($limit != NULL || $start != ""){				
			// $this->db->limit($limit,$start);
		// }
		
		$this->db->group_by("MONTH(IT.Trans_date)","asc");
		$this->db->group_by("YEAR(IT.Trans_date)","asc");
		// $this->db->group_by("YEAR(IT.Trans_date)","asc");
		$this->db->group_by("IT.Voucher_status");
		$this->db->group_by("IT.Merchandize_Partner_id");
		$this->db->group_by("IT.Merchandize_Partner_branch");
		$this->db->order_by('IT.Voucher_status' , 'asc');
		
		$sql51 = $this->db->get();
		
		// echo "<br>".$this->db->last_query();
		
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			 foreach ($sql51->result() as $row)
			{
				if($row->Trans_type==10)
				{
					$row->Total_points=$row->Total_points;
				}
				else 
				{
					$row->Total_points=$row->Redeem_points;
				}
				
				if($row->Total_points==0)
				{
					$row->Total_points='-';
				}
				
				if($row->total_purchase_amt==0)
				{
					$row->total_purchase_amt='-';
				}
				
                $data[] = $row;
            }
			 return $data; 
		}
		else
		{
			return false;
		}	
		 return $data; 
	}
	function get_partner_merchandzie_catalogue_details_exports($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status,$transaction_type_id,$Delivery_method)
	{ 
		  $From_date=date("Y-m-d",strtotime($From_date));
		  $To_date=date("Y-m-d",strtotime($To_date));  
		  
		  $this->db->select('IT.Trans_date,ITT.Trans_type ,Partner_name,IB.Branch_name,IT.Card_id as Membership_ID,First_name,Last_name,Item_code,Merchandize_item_name,Quantity,IT.Item_size,IT.Purchase_amount,IT.Shipping_points,IT.Shipping_cost,Redeem_points,Voucher_no,ICM.Code_decode as Status,IT.Cost_payable_partner,IT.Payment_to_partner_flag as Payment_status,ICMM.Code_decode as Delivery_method,IT.Remarks,ITT.Trans_type');
		  
		  $this->db->from('igain_transaction as IT');
		  
		  $this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		  $this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		  $this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		  $this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		  $this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		  $this->db->join('igain_transaction_type as ITT','IT.Trans_type=ITT.Trans_type_id');
		  $this->db->join('igain_codedecode_master as ICMM','IT.Delivery_method=ICMM.Code_decode_id');
		  
		  $this->db->where('IB.Company_id' , $Company_id);
		  $this->db->where('IT.Company_id' , $Company_id);
		  $this->db->where('TT.Company_id' , $Company_id);
		  $this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		  
		  if($Partner_id!=0)
		  {
		   $this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		  }
		  if($partner_branches!='0')
		  {
		   $this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		  }
		  if($transaction_type_id!='0')
		  {
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		  }
		  else
			{
				$this->db->where('IT.Trans_type IN(10,12)');
			}
		  if($Voucher_status!='0')
		  {
		   $this->db->where('IT.Voucher_status' , $Voucher_status);
		  }
		  if($Delivery_method !='0')
		  {
			$this->db->where('IT.Delivery_method' ,$Delivery_method);
		  }
		  $this->db->group_by('Trans_id');
		  $this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'asc');
		  
		  $sql51 = $this->db->get();
		  
		  //echo "<br>".$this->db->last_query();
		  if($sql51 -> num_rows() > 0)
		  {
			foreach ($sql51->result() as $row)
		    {
				if($row->Trans_type=="Redemption")
				{
					$row->Total_Redeem_points=$row->Redeem_points*$row->Quantity;
				}
				else 
				{
					$row->Total_Redeem_points=$row->Redeem_points;
				}
				if($row->Total_Redeem_points==0)
				{
					$row->Total_Redeem_points='-';
				}
				
				if($row->Payment_status==1)
				{
					$row->Payment_status='Paid';
				}
				else
				{
					$row->Payment_status='Pending';
				}
				
				if($row->Item_size==0)
				{
					$row->Item_size='-';
				}
				else if($row->Item_size==1)
				{
					$row->Item_size='Small';
				}
				else if($row->Item_size==2)
				{
					$row->Item_size='Medium';
				}
				else if($row->Item_size==3)
				{
					$row->Item_size='Large';
				}
				else if($row->Item_size==4)
				{
					$row->Item_size='Extra large';
				}
				
				if($row->Purchase_amount==0)
				{
					$row->Purchase_amount='-';
				}
				if($row->Redeem_points ==0)
				{
					$row->Redeem_points ='-';
				}
				if($row->Shipping_points ==0)
				{
					$row->Shipping_points ='-';
				}	
				if($row->Shipping_cost ==0)
				{
					$row->Shipping_cost ='-';
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
	function get_partner_merchandzie_catalogue_summary_exports($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status,$transaction_type_id,$Delivery_method)
	{  
		$From_date=date("Y-m-d",strtotime($From_date)); 
		$To_date=date("Y-m-d",strtotime($To_date));	 
		
		$this->db->select("CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,Partner_name,IB.Branch_name,ICM.Code_decode as Status,count(Voucher_no) as total_voucher,SUM(IT.Purchase_amount) as total_purchase_amt,SUM(Redeem_points) as Redeem_points,SUM(Redeem_points*Quantity) AS Total_points,SUM(Cost_payable_partner) as Total_cost_pay_to_partnet,IT.Trans_type");
		
		$this->db->from('igain_transaction as IT');
		
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		
		$this->db->where('IB.Company_id' , $Company_id);
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Partner_id!=0)
		{
			$this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		}
		if($partner_branches!='0')
		{
			$this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		}
		if($transaction_type_id!='0')
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		else
		{
			$this->db->where('IT.Trans_type IN(10,12)');
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' , $Voucher_status);
		}
		if($Delivery_method !='0')
		{
			$this->db->where('IT.Delivery_method' ,$Delivery_method);
		}
	
		$this->db->group_by("MONTH(IT.Trans_date)","asc");
		$this->db->group_by("YEAR(IT.Trans_date)","asc");
		$this->db->group_by("IT.Merchandize_Partner_id");
		$this->db->group_by("IT.Merchandize_Partner_branch");
		$this->db->group_by("IT.Voucher_status");
		$this->db->order_by('IT.Voucher_status' , 'asc');
		
		$sql51 = $this->db->get();
		// echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			foreach ($sql51->result() as $row)
			{
				if($row->Trans_type==10)
				{
					// $row->Total_points=$row->Total_points*$row->Total_Quantity;
					$row->Total_points=$row->Total_points;
				}
				else 
				{
					// $row->Total_points=$row->Total_points;
					$row->Total_points=$row->Redeem_points;
				}
				  
				if($row->Total_points==0)
				{
					$row->Total_points='-';
				}
				
				if($row->total_purchase_amt==0)
				{
					$row->total_purchase_amt='-';
				}
				
                $data[] = $row;
            }
			 return $data; 
		}
		else
		{
			return false;
		}	
		 return $data; 
	}
	
	/********************Nilesh end partner merchandize ctelogue report*******************/
	
	public function get_cust_high_value_trans_report($Company_id,$start_date,$end_date,$Value_type,$Operatorid,$Criteria,$Criteria_value,$Criteria_value2,$start,$limit,$Enrollement_id)
	{
		$From_date=date("Y-m-d",strtotime($start_date));
		$To_date=date("Y-m-d",strtotime($end_date));
		if($Value_type==1)//High Value_type
		{
			$this->db->select('IT.Trans_date,IT.Card_id as Membership_ID,First_name,Middle_name,Last_name,TT.Trans_type,Bill_no,`Purchase_amount`,`Redeem_points`,`Loyalty_pts`,balance_to_pay,IT.Enrollement_id');
		}
		else
		{
			$this->db->select('IT.Trans_date,IT.Card_id as Membership_ID,First_name,Middle_name,Last_name,TT.Trans_type,SUM(`Purchase_amount`) AS Total_Purchase_Amount,SUM(`Loyalty_pts`) AS Total_Gained_Points,SUM(Redeem_points) as Total_Redeemed_Points,SUM(balance_to_pay) as Total_balance_to_pay');
			$this->db->group_by('IT.Enrollement_id');
		}
		
		
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_transaction_type as TT','IT.Trans_type=TT.Trans_type_id');
		$this->db->where('IT.Company_id' , $Company_id);
		if($Enrollement_id!=0)
		{
			$this->db->where('IT.Enrollement_id IN('.$Enrollement_id.')');
		}
		$this->db->where('IT.Trans_type' , 2);//Purchase
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		if($Value_type==1)//High Value_type
		{
			if($Criteria==1)//Purchase
			{
				if($Operatorid=="Between")
				{
					$this->db->where("IT.Purchase_amount BETWEEN '".$Criteria_value."' AND '".$Criteria_value2."'");
				}
				else
				{
					$this->db->where('IT.Purchase_amount '.$Operatorid , $Criteria_value);
				}
			}
			else //gained points
			{
				if($Operatorid=="Between")
				{
					$this->db->where("IT.Loyalty_pts BETWEEN '".$Criteria_value."' AND '".$Criteria_value2."'");
				}
				else
				{
					$this->db->where('IT.Loyalty_pts '.$Operatorid , $Criteria_value);
				}
			}
		}
		
		// if($limit != NULL || $start != ""){				
			// $this->db->limit($limit,$start);
		// }
		$this->db->order_by('IT.Trans_date' , 'desc');
		//$this->db->group_by('IT.Enrollement_id');
		$sql51 = $this->db->get();
		//echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			 foreach ($sql51->result() as $row)
			{
				$Show_member=0;
				if($Value_type==2)//Total High Value_type
				{
					if($Criteria==1)//Purchase
					{
						$Total_value=$row->Total_Purchase_Amount;
					}	
					else //Gained Points
					{
						$Total_value=$row->Total_Gained_Points;
					}
					
					if($Operatorid=="<")
					{
						if($Total_value < $Criteria_value)
						{
							$Show_member=1;
						}
					}
					if($Operatorid=="<=")
					{
						if($Total_value <= $Criteria_value)
						{
							$Show_member=1;
						}
					}
					if($Operatorid==">")
					{
						if($Total_value > $Criteria_value)
						{
							$Show_member=1;
						}
					}
					if($Operatorid==">=")
					{
						if($Total_value >= $Criteria_value)
						{
							$Show_member=1;
						}
					}
					if($Operatorid=="=")
					{
						if($Total_value == $Criteria_value)
						{
							$Show_member=1;
						}
					}
					if($Operatorid=="!=")
					{
						if($Total_value != $Criteria_value)
						{
							$Show_member=1;
						}
					}
					if($Operatorid=="Between")
					{
						if(($Total_value >= $Criteria_value) && ($Total_value <= $Criteria_value2))
						{
							$Show_member=1;
						}
					}
					
					
					if($Show_member==1)
					{
					 $data[] = $row;
					}
				}			
               else
			   {
					 $data[] = $row;
			   }
               
            }
			 return $data; 
		}
		else
		{
			return false;
		}
	}	   
	public function get_cust_enrollment_report($Company_id,$start_date,$end_date,$Source,$start,$limit)
	{
		 $this->db->select('IE.Card_id as Membership_ID,First_name,Middle_name,Last_name,Tier_name,joined_date,IE.Current_address as Current_address,ICity.name as City,IState.name as State,IE.Phone_no as Phone_no,User_email_id,total_purchase AS Total_Purchase_Amount, SUM(`Loyalty_pts`+`Topup_amount`+`Transfer_points`) AS Total_Gained_Points,Total_reddems as Total_Redeemed_Points,(Current_balance- (Blocked_points + Debit_points) ) as Total_current_balance,Total_wallet_topup as Total_wallet_credit ,(Total_wallet_topup-Wallet_balance) as Total_wallet_debit ,Wallet_balance,User_activated,IE.Create_user_id as Enrolled_by,IE.source as Gift_card_purchase_amt,IE.source as Gift_card_redeem_amt,IE.source as Source,IE.Email_verified,IE.Mobile_verified');
		   
		$this->db->from('igain_enrollment_master as IE');
		$this->db->join('igain_transaction as IT','IE.Enrollement_id=IT.Enrollement_id','LEFT');
		$this->db->join('igain_tier_master as TM','IE.Tier_id=TM.Tier_id','LEFT');
		$this->db->join('igain_city_master as ICity','IE.City=ICity.id','LEFT');
		$this->db->join('igain_state_master as IState','IE.State=IState.id','LEFT');
		
		//$this->db->join('igain_company_master as IC','IE.Company_id=IT.Company_id','LEFT');
		
		$this->db->where('IE.Company_id' , $Company_id);
		if($Source != '0')
		{
			$this->db->where('IE.source' , $Source);
		}
		$this->db->where('IE.User_id' , 1);
		$this->db->where("joined_date BETWEEN '".$start_date."' AND '".$end_date."'");
		$this->db->order_by('IE.Enrollement_id' , 'desc');
		$this->db->group_by('IE.Enrollement_id');
		// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
		// }
		$sql51 = $this->db->get();
		  // echo "<br>".$this->db->last_query();die;
		if($sql51 -> num_rows() > 0)
		{
			
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				if($row->User_activated==1)
				{
				 $row->User_activated="Yes";
				}
				else
				{
				 $row->User_activated="No";
				} 
				if($row->Email_verified==1)
				{
				 $row->Email_verified="Yes";
				}
				else
				{
				 $row->Email_verified="No";
				} 
				if($row->Mobile_verified==1)
				{
				 $row->Mobile_verified="Yes";
				}
				else
				{
				 $row->Mobile_verified="No";
				} 
				if($row->Total_Purchase_Amount==0)
				{
				 $row->Total_Purchase_Amount="-";
				}
				else
				{
					$row->Total_Purchase_Amount = number_format(round($row->Total_Purchase_Amount),2); 
				}
				if($row->Total_wallet_debit==0)
				{
				 $row->Total_wallet_debit="-";
				}
				else
				{
					$row->Total_wallet_debit = number_format((float)$row->Total_wallet_debit, 2, '.', ''); 
				}
				if($row->Wallet_balance==0)
				{
				 $row->Wallet_balance="-";
				}
				else
				{
					$row->Wallet_balance= $row->Wallet_balance;
				}
				if($row->Total_wallet_credit==0)
				{
				 $row->Total_wallet_credit="-";
				}
				else
				{
					$row->Total_wallet_credit= $row->Total_wallet_credit;
				}
				$row->Gift_card_purchase_amt='-';
				 $row->Gift_card_redeem_amt='-';
				 
				$result2 = $this->Report_model->Get_gift_card_trans($Company_id,$row->Membership_ID);
				if($result2 != NULL)
				{
					$row->Gift_card_purchase_amt= number_format(round($result2->PurchaseGC),2); 
					$row->Gift_card_redeem_amt= number_format(round($result2->redeemGC),2);
					
				}
				if($row->Source=="APK")
				{
				 $row->Source = "APP";
				}
				else
				{
					$row->Source = "Website";
				}	
				 		
				if($row->Total_Redeemed_Points==0)
				{
				 $row->Total_Redeemed_Points="-";
				}
				else
				{
					$row->Total_Redeemed_Points= (int)$row->Total_Redeemed_Points;
				}
				if($row->Total_Gained_Points==0)
				{
				 $row->Total_Gained_Points="-";
				}
				else
				{
					$row->Total_Gained_Points= round($row->Total_Gained_Points);
				}
				/* if($row->Total_balance_to_pay==0)
				{
				 $row->Total_balance_to_pay="-";
				} */				
				if($row->Enrolled_by != '0')
				{
					$user_details = $this->Igain_model->get_enrollment_details($row->Enrolled_by);						
					$row->Enrolled_by = $user_details->First_name.' '.$user_details->Last_name;
				}
				else
				{
					 $row->Enrolled_by="-";
				}
				if($row->Current_address=="")
				{
				 $row->Current_address="-";
				}
				else{
					$row->Current_address = App_string_decrypt($row->Current_address);
				}
				
				if($row->City=="")
				{
				 $row->City="-";
				}
				
				/* if($row->District=="")
				{
				 $row->District="-";
				} */
				if($row->State=="")
				{
				 $row->State="-";
				}
				if($row->Phone_no=='0')
				{
				 $row->Phone_no="-";
				}
				else
				{
					$row->Phone_no = App_string_decrypt($row->Phone_no);
				}
				
				if($row->User_email_id != null)
				{
					$row->User_email_id = App_string_decrypt($row->User_email_id);
				}
				

				
				
				
				 
				 $row->User_activate=$row->User_activated;
				 $row->Enroll_by=$row->Enrolled_by;
				$data[] = $row;
			}
			
			return $data; 
		}
		else
		{
		   return false;
		}
	}
	
	public function get_cust_expiry_report($Company_id,$start_date,$end_date,$start,$limit)
	{
		$this->db->select('IT.Trans_date as Expired_Date,First_name,Middle_name,Last_name,IT.Card_id  as Membership_ID,Expired_points,User_email_id,(Current_balance - (Blocked_points + Debit_points )) AS Total_Balance');
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('IT.Trans_type' , 14);
		$this->db->where("IT.Trans_date BETWEEN '".$start_date."' AND '".$end_date."'");
		$this->db->order_by('IT.Trans_id' , 'desc');
		// if($limit != NULL || $start != ""){				
			// $this->db->limit($limit,$start);
		// }
		$sql51 = $this->db->get();
		//echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			 foreach ($sql51->result() as $row)
			{	
				$row->User_email_id = App_string_decrypt($row->User_email_id);
                $data[] = $row;
            }
			
			 return $data; 
		}
		else
		{
			return false;
		}
	}
	function get_all_cust_last_points_used($Company_id,$start,$limit)
	{
		$this->db->select('First_name,Last_name,Trans_id,Trans_type,Redeem_points,MAX(Trans_date) as Trans_date ,T.Enrollement_id,T.Card_id as Membership_ID,Current_balance,Blocked_points,Debit_points,User_email_id,(Current_balance- (Blocked_points + Debit_points) ) AS Total_Balance');
		$this->db->from('igain_transaction as T');
		$this->db->join('igain_enrollment_master as E','T.Enrollement_id=E.Enrollement_id');
		$this->db->order_by('Trans_id','desc');
		$this->db->group_by('T.Enrollement_id');
		$this->db->where(array('T.Company_id'=>$Company_id,'Redeem_points!='=>0,'Trans_type IN (2,3,10)'));
		// if($limit != NULL || $start != ""){				
			// $this->db->limit($limit,$start);
		// }
		$sql51=$this->db->get();
		//echo "<br><br>Transcation Query-->".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			 foreach ($sql51->result() as $row)
			{
				$row->User_email_id = App_string_decrypt($row->User_email_id);
                $data[] = $row;
            }
			 return $data; 
		}
		else
		{
			return false;
		}
		
			
	}
		
/*********** AMIT END ****************************/

/*********** Ravi --31-08-2016 ****************************/
	public function get_worry_customers($Company_id,$months)
	{	
		$this->load->dbforge();	
		$this->load->model('igain_model');
		$temp_table = $Company_id.'inactive_worry_customer';				
		if( $this->db->table_exists($temp_table) == TRUE )
		{
			$this->dbforge->drop_table($temp_table);
		}		
		$fields = array(
					'Worry_Customer_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
					'Card_id' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
					'User_id' => array('type' => 'VARCHAR','constraint' => '20','null' => TRUE),
					'City' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
					'Phone_no' => array('type' => 'VARCHAR','constraint' => '20','null' => TRUE),
					'Current_balance' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
					'Total_reddems' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
					'Total_topup_amt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
					'Customer_last_visit' => array('type' => 'Date','',''),'Membership_date' => array('type' => 'Date','','')
				);
		$this->dbforge->add_field($fields);		
		$this->dbforge->create_table($temp_table);
		$i = 0; $j = 0;  $custenroll_ids = array();  $cust_array = array();  $Total_Purchase_amount = array();  $Total_Loyalty_pts = array();
		$lastmonth = date("Y-m-d 00:00:00", strtotime("-$months month")); /** last 1 month **/
		$thismonth = date("Y-m-d 23:59:29");

		$Trans_type = array('2','3','7','8','9','10','12','13','15');
		
		$this->db->select('Enrollement_id');
		$this->db->where(array('User_id' => '1', 'Company_id' => $Company_id, 'User_activated' => '1'));
		$this->db->where("joined_date <= '".$lastmonth."' ");
		$query = $this->db->get('igain_enrollment_master');
		
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{			
			foreach ($query->result_array() as $row)
			{
				$cust_array1[] = $row['Enrollement_id'];
			}
		}		
		$this->db->select('A.Enrollement_id');
		$this->db->from('igain_transaction as A');
		$this->db->join('igain_enrollment_master as B', 'B.Enrollement_id = A.Enrollement_id');
		$this->db->where(array('B.User_activated' => '1', 'B.User_id' => '1', 'A.Company_id' => $Company_id));
		$this->db->where("A.Trans_date BETWEEN '".$lastmonth."' AND '".$thismonth."' ");
		$this->db->where_in('A.Trans_type', $Trans_type);
		$query1 = $this->db->get();
		
		//echo $this->db->last_query();
		
		if($query1->num_rows() > 0)
		{
			foreach ($query1->result_array() as $row1)
			{
				$custenroll_ids[$i] = $row1['Enrollement_id'];
				$i++;

			}
		}
		$custenroll_ids = array_unique($custenroll_ids);		
		$Worry_cust = array_diff($cust_array1,$custenroll_ids);
		foreach($Worry_cust as $cust1)
		{
			$this->db->limit(1);
			$this->db->select("B.First_name, B.Last_name, B.User_email_id, B.Phone_no,B.Card_id,B.User_id,B.joined_date as Membership_date,B.City,B.Phone_no,B.Current_balance, B.Total_reddems,B.Total_topup_amt, A.Trans_date,C.name as City");
			$this->db->from('igain_transaction as A');
			$this->db->join('igain_enrollment_master as B', 'B.Enrollement_id = A.Enrollement_id');	
			$this->db->join('igain_city_master as C','B.City = C.id','LEFT');
			$this->db->where(array('A.Enrollement_id' => $cust1, 'A.Company_id' => $Company_id));
			$this->db->order_by("Trans_id DESC");
			$query2 = $this->db->get();
			
			if($query2->num_rows() > 0)
			{
				foreach ($query2->result_array() as $row2)
				{
					$Customer_name[$j] = $row2['First_name']." ".$row2['Last_name'];
					$Card_id[$j] = $row2['Card_id'];
					$User_id[$j] = $row2['User_id'];
					$City[$j] = $row2['City'];
					$Phone_no[$j] = App_string_decrypt($row2['Phone_no']);
					$Current_balance[$j] = $row2['Current_balance'];
					$Total_reddems[$j] = $row2['Total_reddems'];
					$Total_topup_amt[$j] = $row2['Total_topup_amt'];
					$Customer_last_visit[$j] = $row2['Trans_date'];
					$Membership_date[$j] = $row2['Membership_date'];
					
					if($Customer_name[$j] != NULL)
					{
						$data['Worry_Customer_name'] = $Customer_name[$j];
						$data['Card_id'] = $Card_id[$j];		
						$data['User_id'] = $User_id[$j];		
						$data['City'] = $City[$j];		
						$data['Phone_no'] = $Phone_no[$j];		
						$data['Total_reddems'] = $Total_reddems[$j];		
						$data['Current_balance'] = $Current_balance[$j];		
						$data['Total_topup_amt'] = $Total_topup_amt[$j];		
						$data['Customer_last_visit'] = $Customer_last_visit[$j];
						$data['Membership_date'] = $Membership_date[$j];
						// echo $this->db->last_query();
						$this->db->insert($temp_table,$data);
					}
					
					
					$j++;
					
				}
			}
			else
			{
				$cust_details = $this->igain_model->get_enrollment_details($cust1);
				$Customer_name[$j] = $cust_details->First_name." ".$cust_details->Last_name;
				$Card_id[$j] = $cust_details->Card_id;
				$User_id[$j] = $cust_details->User_id;
				$City[$j] = $cust_details->City;
				$Phone_no[$j] = App_string_decrypt($cust_details->Phone_no);
				$Current_balance[$j] = $cust_details->Current_balance;
				$Total_reddems[$j] = $cust_details->Total_reddems;
				$Total_topup_amt[$j] = $cust_details->Total_topup_amt;
				$Customer_last_visit[$j] = $cust_details->joined_date;
				$Membership_date[$j] = $cust_details->joined_date;
				
				
				if($Customer_name[$j] != NULL)
				{
					$data['Worry_Customer_name'] = $Customer_name[$j];
					$data['Card_id'] = $Card_id[$j];		
					$data['User_id'] = $User_id[$j];		
					$data['City'] = $City[$j];		
					$data['Phone_no'] = $Phone_no[$j];		
					$data['Total_reddems'] = $Total_reddems[$j];		
					$data['Current_balance'] = $Current_balance[$j];		
					$data['Total_topup_amt'] = $Total_topup_amt[$j];		
					$data['Customer_last_visit'] = $Customer_last_visit[$j];
					$data['Membership_date'] = $Membership_date[$j];
					// echo $this->db->last_query();
					$this->db->insert($temp_table,$data);
				}
				
				
				$j++;
			}			
			
				
			
		}		
		$data['User_name'] = $Customer_name;
		$data['Card_id'] = $Card_id;		
		$data['User_id'] = $User_id;		
		$data['City'] = $City;		
		$data['Phone_no'] = $Phone_no;		
		$data['Total_reddems'] = $Total_reddems;		
		$data['Current_balance'] = $Current_balance;		
		$data['Total_topup_amt'] = $Total_topup_amt;		
		$data['Customer_last_visit'] = $Customer_last_visit;	
		$data['Membership_date'] = $Membership_date;	
			
		return $data;
	}
	
	function get_temptable_worry_customers($Company_id)
	{
		$temp_table = $Company_id.'inactive_worry_customer';
		
		$this->db->select('Worry_Customer_name as User_name,Card_id as Membership_id,Membership_date,City,Phone_no,Current_balance,Total_reddems,Total_topup_amt,Customer_last_visit,User_id');
		$this->db->from($temp_table);
		$sql51=$this->db->get();
		if($sql51 -> num_rows() > 0)
		{
			foreach ($sql51->result() as $row)
			{
				if($row->User_name=="")
				{
					$row->User_name="-";
				}
				if($row->Membership_id =="")
				{
					$row->Membership_id="-";
				}
				if($row->User_id==1)
				{
					$row->User_id="Member";
				}
				if($row->City=="")
				{
					$row->City="-";
				}
				if($row->Phone_no=="")
				{
					$row->Phone_no="-";
				}
				if($row->Current_balance==0)
				{
					$row->Current_balance="-";
				}
				if($row->Total_reddems==0)
				{
					$row->Total_reddems="-";
				}
				if($row->Total_topup_amt==0)
				{
					$row->Total_topup_amt="-";
				}
				if($row->Customer_last_visit=="")
				{
					$row->Customer_last_visit="-";
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
	/*********** Ravi --31-08-2016 ****************************/
	/***********AMIT 11-05-2017 Booking Appointments******/
	public function get_all_cust_booking_appointments($start_date,$end_date,$start,$limit)
	{
		$this->db->select('Appointment_date,Customer_name,Membership_id,O.Phone_no,Email_id, CONCAT(First_name," ",Last_name) AS Service_center,Vehicle_no,Status,O.Create_date,Booking_id,Appointment_time,Pickup_flag as Pickup');
		$this->db->from('igain_online_booking_appointment as O');
		$this->db->join('igain_enrollment_master as E','E.Enrollement_id=O.Seller_id');
		if($start_date !="" && $end_date !="")
		{
			$this->db->where("Appointment_date BETWEEN '".$start_date."' AND '".$end_date."'");
		}
		
		$this->db->order_by('Booking_id' , 'desc');
		// if($limit != NULL || $start != ""){				
			// $this->db->limit($limit,$start);
		// }
		$sql51 = $this->db->get();
		  // echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			 foreach ($sql51->result() as $row)
			{
				
				if($row->Membership_id=="")
				{
					$row->Membership_id="-";
					
				}
				if($row->Pickup==1)
				{
					$row->Pickup="Yes";					
				}
				else
				{
					$row->Pickup="No";
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
	public function Update_booing_appointment($Booking_id,$Status,$Appointment_date,$Appointment_time,$Update_user_id)
	{
		$Update_date=date("Y-m-d H:i:s");
		$Data = array(
		'Appointment_date' => $Appointment_date,
		'Appointment_time' => $Appointment_time,
		'Status' => $Status,
		'Update_user_id' => $Update_user_id,
		'Update_date' => $Update_date
		);
				
				
		$this->db->where(array('Booking_id'=>$Booking_id));
		$this->db->update("igain_online_booking_appointment",$Data);
		// echo "<br>".$this->db->last_query();
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		return false;
	}
	
	/********************Nilesh start Audit tracking report report 26/06/2017***************************/
	
	public function Audit_Tracking_Report($Company_id,$start_date,$end_date,$Transaction_from,$enter_user,$User_type,$Mode,$start,$limit)
	{ 	
		$this->db->select('Date,Transaction_by,From_userid,Transaction_type,Transaction_from,Transaction_to,Operation_type,Operation_value');
	   
		$this->db->from('igain_log_tbl');
		$this->db->where('Company_id' , $Company_id);	
		$this->db->where("Date BETWEEN '".$start_date."' AND '".$end_date."'");
		if($Transaction_from != "0")
		{
			$this->db->where('Transaction_from', $Transaction_from);
		}
		if($User_type != "0")
		{
			$this->db->where('From_userid' ,$User_type);
		}
		if($Mode != "0")
		{
			$this->db->where('Operation_type' ,$Mode);
		}
		if($enter_user != "")
		{
			$this->db->where('Transaction_by',$enter_user);
		} 
		$this->db->order_by('id','desc');
		
		// if($limit != "" || $start != "")
		// {
			// $this->db->limit($limit,$start);
		// }
		
		$sql51 = $this->db->get();
		// echo "---Sql Query---".$this->db->last_query()."<br>";
		if($sql51 -> num_rows() > 0)
		{
			foreach ($sql51->result() as $row)
			{
				if($row->Operation_type == 1)
				{
					$row->Operation_type = "Insert";
				}
				if($row->Operation_type == 2)
				{
					$row->Operation_type = "Update";
				}
				if($row->Operation_type == 3)
				{
					$row->Operation_type = "Delete";
				}
				if($row->From_userid == 1)
				{
				   $row->From_userid = "Customer";
				}
				if($row->From_userid == 2)
				{
				   $row->From_userid = "Merchant";
				}
				if($row->From_userid == 3)
				{
				  $row->From_userid = "Admin";
				}
				if($row->From_userid == 4)
				{
				   $row->From_userid = "Partner admin";
				}
				if($row->From_userid == 5)
				{
				   $row->From_userid = "Merchandize Partner User";
				}
				if($row->From_userid == 6)
				{
				   $row->From_userid = "Call Center User";
				}
				if($row->From_userid == 7)
				{
				   $row->From_userid = "Staff Users";
				}		
			   // $row->id = " ";
			   // $row->Company_id = " ";
				
				$data[] = $row;
			}
			return $data; 
		}
		else
		{
		   return false;
		}	
	}
	/********************Nilesh igain Log Table report 26/06/2017***************************/
	/******************Nilesh work start Call Center report 31/07/2017************************/

	public function Cc_query_status_reports($Company_id,$start_date,$end_date,$Query_Type,$Membership,$Query_status,$start,$limit)
	{ 		 
		$this->db->select("qchild.Querylog_ticket,qmstr.Querylog_ticket,qmstr.Membership_id,CONCAT(enrol.First_name,' ',enrol.Last_name) as Full_name,CONCAT(enrol1.First_name,' ',enrol1.Last_name) as Full_name1,qrtyp.Query_type_name,sqrtyp.Sub_query,qmstr.Query_details,qchild.Query_interaction,qmstr.Call_type,qmstr.Communication_type,qchild.Query_status,qchild.Creation_date,qchild.Closure_date");
		
		$this->db->from('igain_callcenter_querylog_child as qchild');
		$this->db->join('igain_callcenter_querylog_master as qmstr','qmstr.Querylog_ticket=qchild.Querylog_ticket');
		$this->db->join('igain_enrollment_master as enrol','enrol.Card_id=qchild.Membership_id');
		$this->db->join('igain_enrollment_master as enrol1','enrol1.Enrollement_id=qchild.Enrollment_id');
		$this->db->join('igain_callcenter_querytype_master as qrtyp','qrtyp.Query_type_id=qmstr.Query_type_id');
		$this->db->join('igain_callcenter_querysetup_master as sqrtyp','sqrtyp.Query_id=qmstr.Sub_query_type_id');
		$this->db->where("qchild.Creation_date BETWEEN '".$start_date."' AND '".$end_date."'");
		$this->db->where('qchild.Company_id', $Company_id);
		if($Query_Type != 0)
		{
			$this->db->where('qmstr.Query_type_id', $Query_Type);
		}
		if($Query_status != 0)
		{
			$this->db->where('qmstr.Query_status' ,$Query_status);
		}
		if($Membership != NULL)
		{
			$this->db->where('qmstr.Membership_id',$Membership);
		} 
		/* if($limit != NULL || $start != ""){				
			$this->db->limit($limit,$start);
		} */
		$sql51 = $this->db->get();
		if($sql51 -> num_rows() > 0)
		{
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
	public function Cc_member_interaction_reports($Company_id,$Query_Type,$Membership,$Sub_query_type,$start,$limit)
	{ 		 
		$this->db->select("DISTINCT(qchild.Querylog_ticket),qmstr.Membership_id,CONCAT(enrol.First_name,' ',enrol.Last_name) as Full_name,CONCAT(enrol1.First_name,' ',enrol1.Last_name) as Full_name1,qrtyp.Query_type_name,sqrtyp.Sub_query,qmstr.Query_details,qchild.Query_interaction,qmstr.Call_type,qmstr.Communication_type,qchild.Query_status,qchild.Creation_date,qchild.Closure_date");
		
		$this->db->from('igain_callcenter_querylog_child as qchild');
		$this->db->join('igain_callcenter_querylog_master as qmstr','qmstr.Querylog_ticket=qchild.Querylog_ticket');
		$this->db->join('igain_enrollment_master as enrol','enrol.Card_id=qchild.Membership_id');
		$this->db->join('igain_enrollment_master as enrol1','enrol1.Enrollement_id=qchild.Enrollment_id');
		$this->db->join('igain_callcenter_querytype_master as qrtyp','qrtyp.Query_type_id=qmstr.Query_type_id');
		$this->db->join('igain_callcenter_querysetup_master as sqrtyp','sqrtyp.Query_id=qmstr.Sub_query_type_id');
		$this->db->where('qchild.Company_id', $Company_id);
		
		if($Query_Type != NULL)
		{
			$this->db->where('qmstr.Query_type_id', $Query_Type);
		}
		if($Sub_query_type != NULL)
		{
			$this->db->where('qmstr.Sub_query_type_id' ,$Sub_query_type);
		}
		if($Membership != NULL)
		{
			$this->db->where('qmstr.Membership_id',$Membership);
		} 
		/* if($limit != NULL || $start != ""){				
			$this->db->limit($limit,$start);
		} */
		$sql51 = $this->db->get();
		if($sql51 -> num_rows() > 0)
		{
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
/******************************Nilesh Work end Call Center*********************************/

/********************Nilesh Strart partner merchandize ctelogue report**********************/
	function Get_Voucher_status($Delivery_method,$Company_id)
	{
		
		if($Delivery_method == 28){ $code_decode_type_id = 7; }
		if($Delivery_method == 29){ $code_decode_type_id = 5; }
		
		$this->db->select('*');
		$this->db->from('igain_transaction as T');
		
		$this->db->join('igain_codedecode_master as C','C.Code_decode_id=T.Voucher_status');
		
		//$this->db->where(array('T.Delivery_method'=>$Delivery_method,'T.Company_id'=>$Company_id));
		$this->db->where(array('C.Code_decode_type_id'=>$code_decode_type_id,'T.Company_id'=>$Company_id));
		
		$this->db->group_by('Voucher_status');
		$sql=$this->db->get();
	
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
/******************************Nilesh end partner merchandize ctelogue report******************************/	
	function get_dial_code($Country_id)
	 {
		$query =  $this->db->select('*')
				   ->from('igain_country_master')
				   ->where(array('id' => $Country_id))->get();
				   if($query->num_rows() > 0)
				   {
						return $query->row();
				   }
				   else
				   {
						return false;
				   }
	 }
	function get_partener_update_voucher_status($Company_id,$Card_id,$Voucher_no)
	{
		$this->db->select('UV.Update_date,UV.Voucher_no,UV.Updated_quantity,EN.First_name,EN.Last_name');
		$this->db->from('igain_update_evoucher_status UV');
		$this->db->where(array('UV.CompanyId'=>$Company_id,'UV.MembershipID'=>$Card_id,'UV.Voucher_no'=>$Voucher_no));
		$this->db->join('igain_enrollment_master as EN','UV.MembershipID=EN.Card_id');
		$sql=$this->db->get();	
		// echo "********".$this->db->last_query();die;
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
	function get_partner_update_breakup_evoucher_exports($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status)
	{
		  /* $From_date=date("Y-m-d",strtotime($From_date));
		  $To_date=date("Y-m-d",strtotime($To_date));
		  $this->db->select('IT.Trans_date,IT.Card_id as Membership_ID,First_name,Middle_name,Last_name,Partner_name,IB.Branch_name,Item_code,Merchandize_item_name,Quantity,Redeem_points,Redeem_points AS Redeem_points_per_Item,(Redeem_points*Quantity) as Total_Redeemed_Points,Voucher_no,Voucher_status,(Cost_payable_to_partner*Quantity) as Cost_payable_to_partner');
		  $this->db->from('igain_transaction as IT');
		  $this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		  $this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		  $this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		  $this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		  $this->db->where('IB.Company_id' , $Company_id);
		  $this->db->where('IT.Company_id' , $Company_id);
		  $this->db->where('TT.Company_id' , $Company_id);
		  $this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		  if($Partner_id!=0)
		  {
		   $this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		  }
		  if($partner_branches!='0')
		  {
		   $this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		  }
		  if($Voucher_status!='0')
		  {
		   $this->db->where('IT.Voucher_status' , $Voucher_status);
		  }
		  $this->db->group_by('Trans_id');
		  //$this->db->order_by('IT.Trans_date,IT.Enrollement_id,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch' , 'desc');
		  $this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'desc');
		  $sql51 = $this->db->get();
		  //echo "<br>".$this->db->last_query();
		  if($sql51 -> num_rows() > 0)
		  {
		   //return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				if($row->Voucher_status=='30')
				{
					$row->Voucher_status ='Issued';
				}
				if($row->Voucher_status=='31')
				{
					$row->Voucher_status ='Used';
				}				
				$data[] = $row;
			}
			return $data; 
		  }
		  else
		  {
		   return false;
		  } */
		
		$this->db->select('UV.Update_date,UV.Voucher_no,,Quantity,Quantity_balance,UV.Updated_quantity,EN.First_name,EN.Last_name,Partner_name,Merchandize_item_name');
		$this->db->from('igain_update_evoucher_status UV');
		$this->db->join('igain_enrollment_master as EN','UV.MembershipID=EN.Card_id');
		$this->db->join('igain_transaction as IT','IT.Voucher_no=UV.Voucher_no');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_company_merchandise_catalogue', 'IT.Item_code = igain_company_merchandise_catalogue.Company_merchandize_item_code AND IT.Company_id = igain_company_merchandise_catalogue.Company_id');
		 $this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		$this->db->where(array('UV.CompanyId'=>$Company_id));
		if($Partner_id!=0)
		{
			$this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		}
		if($partner_branches!='0')
		{
			$this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' , $Voucher_status);
		}
		 // $this->db->where("UV.Update_date BETWEEN '".$From_date."' AND '".$To_date."'");
		 // $this->db->where("UV.Update_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		$sql=$this->db->get();	
		 //echo $this->db->last_query();die;
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
	
	/******************************Nilesh Start partner shipping ctelogue report******************************/
	
	function Get_Company_Shipping_Partners($limit,$start,$Company_id)
	{
		$this->db->select('*');
		$this->db->from('igain_partner_master');
		$this->db->where(array('Active_flag'=>1,'Company_id'=>$Company_id,'Partner_type'=>4));
		$this->db->order_by('Partner_id','desc');
		// $this->db->limit($limit,$start);
		$sql=$this->db->get();
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
	function get_partner_shipping_catalogue_details($Company_id,$From_date,$To_date,$Partner_id,$transaction_type_id,$start,$limit)
	{
		$From_date=date("Y-m-d",strtotime($From_date));  
		$To_date=date("Y-m-d",strtotime($To_date));
		
		$this->db->select('First_name,Middle_name,Last_name,IT.Enrollement_id,IT.Trans_id,IT.Trans_date,Redeem_points,IT.Card_id,IT.Company_id,Item_code,Voucher_no,IT.Merchandize_Partner_id,Merchandize_item_name,Quantity,IT.Item_size,IT.Purchase_amount,IT.Shipping_cost,Partner_name,Cost_payable_to_partner,IT.Remarks,ITT.Trans_type,IT.Shipping_cost,IT.Shipping_payment_flag,ICM.Code_decode as Voucher_status');
		
		$this->db->from('igain_transaction as IT'); 
		
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Shipping_partner_id=IP.Partner_id');	
		$this->db->join('igain_transaction_type as ITT','IT.Trans_type=ITT.Trans_type_id');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Partner_id!=0)
		{
			$this->db->where('IT.Shipping_partner_id' , $Partner_id);
		}
		if($transaction_type_id!='0')
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		else
		{
			$this->db->where('IT.Trans_type IN(10,12)');
		}
		
		/* if($limit != NULL || $start != ""){				
			$this->db->limit($limit,$start);
		} */
		$this->db->group_by('Trans_id');
		$this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'asc');
		$sql51 = $this->db->get();
		// echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				if($row->Trans_type=="Redemption")
				{
					$row->Total_Redeem_points=$row->Redeem_points*$row->Quantity;
				}
				else 
				{
					$row->Total_Redeem_points=$row->Redeem_points;
				}
				if($row->Total_Redeem_points==0)
				{	
					$row->Total_Redeem_points='-';
				}
				if($row->Shipping_payment_flag==1)
				{
					$row->Shipping_payment_flag='Paid';
				}
				else
				{
					$row->Shipping_payment_flag='Pending';
				}
				if($row->Item_size==0)
				{
					$row->Item_size='-';
				}
				else if($row->Item_size==1)
				{
					$row->Item_size='Small';
				}
				else if($row->Item_size==2)
				{
					$row->Item_size='Medium';
				}
				else if($row->Item_size==3)
				{
					$row->Item_size='Large';
				}
				else if($row->Item_size==4)
				{
					$row->Item_size='Extra large';
				}
				  
				if($row->Purchase_amount==0)
				{
					$row->Purchase_amount='-';
				}
				if($row->Redeem_points ==0)
				{
					$row->Redeem_points ='-';
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
	function get_partner_shipping_catalogue_summary($Company_id,$From_date,$To_date,$Partner_id,$transaction_type_id,$start,$limit)
	{   
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));	 
		
		/* $this->db->select("IT.Enrollement_id,IT.Trans_id,CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,if(Trans_type='0',((select SUM(Redeem_points*Quantity) from igain_transaction where Trans_type=10 and Company_id='".$Company_id."' and `Trans_date` BETWEEN '".$From_date."' AND '".$To_date."')+(select SUM(Redeem_points) from igain_transaction where Trans_type=12 and Company_id='".$Company_id."' and `Trans_date` BETWEEN '".$From_date."' AND '".$To_date."')),SUM(Redeem_points*Quantity)) AS Total_points,IT.Card_id,Voucher_status,ICM.Code_decode as Status,SUM(Quantity) AS Total_Quantity,Quantity,Voucher_no,count(Voucher_no) as total_voucher,SUM(IT.Purchase_amount) as total_purchase_amt,SUM(Shipping_cost) as Total_cost_pay_to_partnet,SUM(Shipping_cost) as total_shipping_cost,IT.Shipping_partner_id,,Partner_name,IT.Trans_type"); */
	
		$this->db->select("IT.Enrollement_id,IT.Trans_id,CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,IT.Card_id,Voucher_status,ICM.Code_decode as Status,SUM(Quantity) as Total_Quantity,Quantity,Voucher_no,count(Voucher_no) as total_voucher,SUM(IT.Purchase_amount) as total_purchase_amt,SUM(Shipping_cost) as Total_cost_pay_to_partnet,SUM(Shipping_cost) as total_shipping_cost,IT.Shipping_partner_id,,Partner_name,IT.Trans_type");
		
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Shipping_partner_id=IP.Partner_id');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Partner_id!=0)
		{
			$this->db->where('IT.Shipping_partner_id' , $Partner_id);
		}
		if($transaction_type_id!='0')
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		else
		{
			$this->db->where('IT.Trans_type IN(10,12)');
		}
		
		/* if($limit != NULL || $start != ""){				
			$this->db->limit($limit,$start);
		} */
		$this->db->group_by("MONTH(IT.Trans_date)","asc");
		$this->db->group_by("YEAR(IT.Trans_date)","asc");
		// $this->db->group_by("YEAR(IT.Trans_date)","asc");
		$this->db->group_by("IT.Voucher_status");
		$this->db->group_by("IT.Shipping_partner_id");
		// $this->db->group_by("IT.Trans_type");
		$this->db->order_by('IT.Voucher_status' , 'asc');	
		$sql51 = $this->db->get();
		   // echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				// if($row->Total_points==0)
				// {
					// $row->Total_points='-';
				// }
				if($row->total_purchase_amt==0)
				{
					$row->total_purchase_amt='-';
				}	
                $data[] = $row;
            }
			 return $data; 
		}
		else
		{
			return false;
		}	
		 return $data; 
	}
	function get_partner_shipping_catalogue_details_exports($Company_id,$From_date,$To_date,$Partner_id,$transaction_type_id)
	{  
		  $From_date=date("Y-m-d",strtotime($From_date));
		  $To_date=date("Y-m-d",strtotime($To_date));  
		  
		  $this->db->select('IT.Trans_date,ITT.Trans_type ,Partner_name,IT.Card_id as Membership_ID,First_name,Last_name,Merchandize_item_name,Quantity,IT.Item_size,IT.Purchase_amount,IT.Shipping_cost,Redeem_points,IT.Shipping_payment_flag as Payment_status,Voucher_no,ICM.Code_decode as Status,IT.Remarks,ITT.Trans_type');
		  
		  $this->db->from('igain_transaction as IT');
		  
		  $this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		  $this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		  $this->db->join('igain_partner_master as IP','IT.Shipping_partner_id=IP.Partner_id');		 
		  $this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		  $this->db->join('igain_transaction_type as ITT','IT.Trans_type=ITT.Trans_type_id');
		 
		  $this->db->where('IT.Company_id' , $Company_id);
		  $this->db->where('TT.Company_id' , $Company_id);
		  $this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		  
		  if($Partner_id!=0)
		  {
		   $this->db->where('IT.Shipping_partner_id' , $Partner_id);
		  }
		 
		  if($transaction_type_id!='0')
		  {
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		  }
		  else
		  {
				$this->db->where('IT.Trans_type IN(10,12)');
		  }
		  
		  $this->db->group_by('Trans_id');
		  $this->db->order_by('IT.Enrollement_id,IT.Trans_id' , 'asc');
		  
		  $sql51 = $this->db->get();
		  
		  // echo "<br>".$this->db->last_query();
		  if($sql51 -> num_rows() > 0)
		  {
			foreach ($sql51->result() as $row)
		    {
				if($row->Trans_type=="Redemption")
				{
					$row->Total_Redeem_points=$row->Redeem_points*$row->Quantity;
				}
				else 
				{
					$row->Total_Redeem_points=$row->Redeem_points;
				}
				if($row->Total_Redeem_points==0)
				{
					$row->Total_Redeem_points='-';
				}
				
				if($row->Payment_status==1)
				{
					$row->Payment_status='Paid';
				}
				else
				{
					$row->Payment_status='Pending';
				}
				
				if($row->Item_size==0)
				{
					$row->Item_size='-';
				}
				else if($row->Item_size==1)
				{
					$row->Item_size='Small';
				}
				else if($row->Item_size==2)
				{
					$row->Item_size='Medium';
				}
				else if($row->Item_size==3)
				{
					$row->Item_size='Large';
				}
				else if($row->Item_size==4)
				{
					$row->Item_size='Extra large';
				}
				
				if($row->Purchase_amount==0)
				{
					$row->Purchase_amount='-';
				}
				if($row->Redeem_points ==0)
				{
					$row->Redeem_points ='-';
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
	function get_partner_shipping_catalogue_summary_exports($Company_id,$From_date,$To_date,$Partner_id,$transaction_type_id)
	{   
		$From_date=date("Y-m-d",strtotime($From_date)); 
		$To_date=date("Y-m-d",strtotime($To_date));	 
		 
		$this->db->select("CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,Partner_name,ICM.Code_decode as Voucher_status,count(Voucher_no) as Total_voucher,SUM(IT.Purchase_amount) as Total_purchase_amount,SUM(Shipping_cost) as Total_shipping_cost");
		
		$this->db->from('igain_transaction as IT');
		
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Shipping_partner_id=IP.Partner_id');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Partner_id!=0)
		{
			$this->db->where('IT.Shipping_partner_id' , $Partner_id);
		}
		
		if($transaction_type_id!='0')
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		else
		{
			$this->db->where('IT.Trans_type IN(10,12)');
		}
		
		$this->db->group_by("MONTH(IT.Trans_date)","asc");
		$this->db->group_by("YEAR(IT.Trans_date)","asc");
		$this->db->group_by("IT.Shipping_partner_id");
		$this->db->group_by("IT.Voucher_status");
		$this->db->order_by('IT.Voucher_status' , 'asc');
		
		$sql51 = $this->db->get();
		// echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			foreach ($sql51->result() as $row)
			{
				// if($row->Total_points==0)
				// {
					// $row->Total_points='-';
				// }
				if($row->Total_purchase_amount==0)
				{
					$row->Total_purchase_amount='-';
				}
				
                $data[] = $row;
            }
			 return $data; 
		}
		else
		{
			return false;
		}	
		 return $data; 
	}
	/************************************Nilesh Work End 9-1-2018 Shipping report**********************************/
	/************************************Nilesh START MCCIA**********************************/
	function get_mccia_partner_redemption_details($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status,$start,$limit)
	{ 
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));  
		$this->db->select('CONCAT(IE.First_name," ",IE.Middle_name," ",IE.Last_name) AS Company_name,Trans_date,IT.Company_id,Voucher_no,Voucher_status,IT.Merchandize_Partner_id,IT.Merchandize_Partner_branch,Merchandize_item_name,Quantity,(Quantity-Quantity_balance) as Used_Quantity,Partner_name,IB.Branch_name,IT.Customer_name,IT.Customer_phone,IT.Customer_email');
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		$this->db->where('IB.Company_id' , $Company_id);
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		if($Partner_id!=0)
		{
			$this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		}
		if($partner_branches!='0')
		{
			$this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' , $Voucher_status);
		}
		$this->db->where('IT.Trans_type' , 10);
		
		// $this->db->limit($limit,$start);
		$this->db->group_by('Trans_id');
		$this->db->order_by('IT.Trans_id' , 'desc');
		$sql51 = $this->db->get();
		
		if($sql51 -> num_rows() > 0)
		{		
			foreach ($sql51->result() as $row)
			{
				if($row->Voucher_status=='30')
				{
					$row->Voucher_status ='Issued';
				}
				if($row->Voucher_status=='31')
				{
					$row->Voucher_status ='Used';
				}
				if($row->Customer_phone=='0')
				{
					$row->Customer_phone ='-';
				}
				if($row->Customer_name=='')
				{
					$row->Customer_name ='-';
				}
				if($row->Customer_email=='')
				{
					$row->Customer_email ='-';
				}
				if($row->Used_Quantity==0)
				{
					$row->Used_Quantity ='-';
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
	function get_mccia_partner_redemption_details_exports($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status)
	{
		  $From_date=date("Y-m-d",strtotime($From_date));
		  $To_date=date("Y-m-d",strtotime($To_date));
		  $this->db->select('IT.Trans_date,Partner_name,CONCAT(IE.First_name," ",IE.Middle_name," ",IE.Last_name) AS Company_name,IT.Customer_name,IT.Customer_phone,IT.Customer_email,Merchandize_item_name,Quantity as Issued_Quantity,(Quantity-Quantity_balance) as Used_Quantity');
		  $this->db->from('igain_transaction as IT');
		  $this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		  $this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		  $this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		  $this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		  $this->db->where('IB.Company_id' , $Company_id);
		  $this->db->where('IT.Company_id' , $Company_id);
		  $this->db->where('TT.Company_id' , $Company_id);
		  $this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		  if($Partner_id!=0)
		  {
		   $this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		  }
		  if($partner_branches!='0')
		  {
		   $this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		  }
		  if($Voucher_status!='0')
		  {
		   $this->db->where('IT.Voucher_status' , $Voucher_status);
		  }
		  
		  $this->db->where('IT.Trans_type' , 10);
		  
		  $this->db->group_by('Trans_id');
		  $this->db->order_by('IT.Trans_id' , 'desc');
		  $sql51 = $this->db->get();

		  if($sql51 -> num_rows() > 0)
		  {
		   
			foreach ($sql51->result() as $row)
			{
				// if($row->Voucher_status=='30')
				// {
					// $row->Voucher_status ='Issued';
				// }
				// if($row->Voucher_status=='31')
				// {
					// $row->Voucher_status ='Used';
				// }
				if($row->Customer_phone=='0')
				{
					$row->Customer_phone ='-';
				}
				if($row->Customer_name=='')
				{
					$row->Customer_name ='-';
				}
				if($row->Customer_email=='')
				{
					$row->Customer_email ='-';
				}
				if($row->Used_Quantity==0)
				{
					$row->Used_Quantity ='-';
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
	function get_mccia_partner_redemption_summary($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status,$start,$limit)
	{   
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));	 
		
		$this->db->select("CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,Partner_name,CONCAT(IE.First_name,' ',IE.Middle_name,' ',IE.Last_name) AS Company_name,count(Voucher_no) as total_voucher,ICM.Code_decode as Status");
		
		$this->db->from('igain_transaction as IT');
		
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		
		$this->db->where('IB.Company_id' , $Company_id);
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Partner_id!=0)
		{
			$this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		}
		if($partner_branches!='0')
		{
			$this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' ,$Voucher_status);
		}
		
		$this->db->where('IT.Trans_type' , 10);
		
		/* if($limit != NULL || $start != ""){				
			$this->db->limit($limit,$start);
		} */
		
		$this->db->group_by("MONTH(IT.Trans_date)","asc");
		$this->db->group_by("YEAR(IT.Trans_date)","asc");
		$this->db->group_by("IT.Voucher_status");
		$this->db->group_by("IT.Merchandize_Partner_id");
		$this->db->group_by("IT.Enrollement_id");
		$this->db->order_by('IT.Voucher_status' , 'asc');
		
		$sql51 = $this->db->get();
		
		if($sql51 -> num_rows() > 0)
		{
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
		 return $data; 
	}
	function get_mccia_partner_redemption_summary_exports($Company_id,$From_date,$To_date,$Partner_id,$partner_branches,$Voucher_status)
	{  
		$From_date=date("Y-m-d",strtotime($From_date)); 
		$To_date=date("Y-m-d",strtotime($To_date));	 
		
		$this->db->select("CONCAT(MONTHNAME(IT.Trans_date),'-',YEAR(IT.Trans_date)) AS Trans_monthyear,Partner_name,CONCAT(IE.First_name,' ',IE.Middle_name,' ',IE.Last_name) AS Company_name,count(Voucher_no) as total_voucher,ICM.Code_decode as Status");
			
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_company_merchandise_catalogue as TT','IT.Item_code=TT.Company_merchandize_item_code');
		$this->db->join('igain_partner_master as IP','IT.Merchandize_Partner_id=IP.Partner_id');
		$this->db->join('igain_branch_master as IB','IT.Merchandize_Partner_branch=IB.Branch_code');
		$this->db->join('igain_codedecode_master as ICM','IT.Voucher_status=ICM.Code_decode_id');
		
		$this->db->where('IB.Company_id' , $Company_id);
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where('TT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		if($Partner_id!=0)
		{
			$this->db->where('IT.Merchandize_Partner_id' , $Partner_id);
		}
		if($partner_branches!='0')
		{
			$this->db->where('IT.Merchandize_Partner_branch' , $partner_branches);
		}
		if($Voucher_status!='0')
		{
			$this->db->where('IT.Voucher_status' , $Voucher_status);
		}
		
		$this->db->where('IT.Trans_type' , 10);
		$this->db->group_by("MONTH(IT.Trans_date)","asc");
		$this->db->group_by("YEAR(IT.Trans_date)","asc");
		$this->db->group_by("IT.Merchandize_Partner_id");
		$this->db->group_by("IT.Enrollement_id");
		$this->db->group_by("IT.Voucher_status");
		$this->db->order_by('IT.Voucher_status' , 'asc');
		
		$sql51 = $this->db->get();
	
		if($sql51 -> num_rows() > 0)
		{
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
		 return $data; 
	}
	/************************************Nilesh Work MCCIA**********************************/
	/***********************Nilesh Start for Beneficiary Transfer Point report**************/
	function get_Cust_beneficiary_transfer_point_details($Company_id,$From_date,$To_date,$Enrollement_id,$transaction_type_id,$Tier_id,$start,$limit)
	{  
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));
		
		$this->db->select('First_name,Middle_name,Last_name,IT.Enrollement_id,IT.Trans_id,IT.Trans_date,From_Beneficiary_company_name,To_Beneficiary_company_name,Paid_amount,To_Beneficiary_cust_name,Bill_no,TT.Trans_type_id,Seller,IT.Card_id as Membership_ID,TT.Trans_type,IT.Company_id,Card_id2 as Transfer_to,Topup_amount as Recived_point,Transfer_points,TM.Tier_name,IT.Remarks as Remarks');
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_transaction_type as TT','IT.Trans_type=TT.Trans_type_id');
		$this->db->join('igain_tier_master as TM','IE.Tier_id=TM.Tier_id');
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
		
		
		$this->db->where("IT.Trans_type IN('21','24','1')");
		$this->db->where('IT.From_Beneficiary_company_id !=' , 0);
		$this->db->where('IT.To_Beneficiary_company_id !=' , 0);  
		
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
			$this->db->where('IT.Enrollement_id' , $Enrollement_id);
		}
		$this->db->order_by('IT.Trans_id' , 'desc');
		/* if($limit != NULL || $start != ""){				
			$this->db->limit($limit,$start);
		} */
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
	function get_cust_beneficiary_transfer_points_summary_all($Company_id,$Enrollement_id,$start_date,$end_date,$transaction_type_id,$Tier_id,$start,$limit)
	{ 
		$start_date=date("Y-m-d",strtotime($start_date));
		$end_date=date("Y-m-d",strtotime($end_date));
               
		$this->db->select('IC.Company_name,SUM(Transfer_points) AS Total_Transfer_Points,SUM(Topup_amount) AS Total_Recived_Points,IT.Company_id');
		//,IE.Current_balance,Card_id2 as Transfer_to
		$this->db->from('igain_transaction as IT');
		
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_transaction_type as TT','IT.Trans_type=TT.Trans_type_id');
		$this->db->join('igain_tier_master as TM','IE.Tier_id=TM.Tier_id');
		$this->db->join('igain_company_master as IC','IT.Company_id=IC.Company_id');
		
		$this->db->where("IT.Trans_type IN('21','24','1')");
		$this->db->where('IT.From_Beneficiary_company_id !=' , 0);
		$this->db->where('IT.To_Beneficiary_company_id !=' , 0); 
		
		$this->db->group_by('IT.Company_id');
		// $this->db->group_by('IT.Trans_type');
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$start_date."' AND '".$end_date."'");
		if($Enrollement_id!=0)//Single Customers
		{
			$this->db->where('IT.Enrollement_id' , $Enrollement_id);
		}
		if($Tier_id!=0)//Selected Tier 
		{
			$this->db->where('IE.Tier_id' , $Tier_id);
		}
		if($transaction_type_id!=0)//Single Transaction Type
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);	
		}
	
		/* if($limit != NULL || $start != ""){				
				$this->db->limit($limit,$start);
			} */
		
		//echo "<br>".$this->db->last_query();
		$sql51 = $this->db->get();
		
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				
				if($row->Total_Transfer_Points==0)
				{
					$row->Total_Transfer_Points="-";
				}
				if($row->Total_Recived_Points==0)
				{
					$row->Total_Recived_Points="-";
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
	function get_cust_beneficiary_transfer_points_details_reports($Company_id,$From_date,$To_date,$Enrollement_id,$transaction_type_id,$Tier_id)
	{  
		$From_date=date("Y-m-d",strtotime($From_date));
		$To_date=date("Y-m-d",strtotime($To_date));
		

		$this->db->select('IT.Trans_date,First_name,Last_name,IT.Card_id AS Membership_ID,From_Beneficiary_company_name,To_Beneficiary_company_name,To_Beneficiary_cust_name,Card_id2 as Transfer_to,Transfer_points,Topup_amount as Recived_point,Remarks');
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_enrollment_master as IE','IT.Enrollement_id=IE.Enrollement_id');
		$this->db->join('igain_transaction_type as TT','IT.Trans_type=TT.Trans_type_id');
		$this->db->join('igain_tier_master as TM','IE.Tier_id=TM.Tier_id');
		$this->db->where('IT.Company_id' , $Company_id);
		$this->db->where("IT.Trans_date BETWEEN '".$From_date."' AND '".$To_date."'");
			
		$this->db->where("IT.Trans_type IN('21','24','1')");
		
		$this->db->where('IT.From_Beneficiary_company_id !=' , 0);
		$this->db->where('IT.To_Beneficiary_company_id !=' , 0); 
		
		if($Enrollement_id!=0)//Single Customers
		{
			$this->db->where('IT.Enrollement_id' , $Enrollement_id);
		}
		if($transaction_type_id!=0)//Single Transaction Type
		{
			$this->db->where('IT.Trans_type' , $transaction_type_id);
		}
		if($Tier_id!=0)//Selected Tier
		{
			$this->db->where('IE.Tier_id' , $Tier_id);
		}
		$this->db->order_by('IT.Trans_id' , 'desc');
		
		//$this->db->limit($limit,$start);
		$sql51 = $this->db->get();
		//echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				
				$this->db->select('IT.Trans_date,First_name,Middle_name,Last_name,IT.Card_id AS Membership_ID,Tier_name,From_Beneficiary_company_name,To_Beneficiary_company_name,To_Beneficiary_cust_name,Card_id2 as Transfer_to,Transfer_points,Topup_amount as Recived_point,Remarks');
			
				if($row->Transfer_to=='0')
				{
					$row->Transfer_to="-";
				}
				if($row->Transfer_points==0)
				{
					$row->Transfer_points="-";
				}
				if($row->Recived_point==0)
				{
					$row->Recived_point="-";
				}
				
				if($row->Remarks=="")
				{
					$row->Remarks="-";
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
	/*function Get_Beneficiary_Company_Details()
	{
		$this->db->select("IT.Company_id,IC.Company_id as E_Company_id,IC.Company_name as E_Company_name");
		$this->db->from('igain_transaction as IT');
		$this->db->join('igain_company_master as IC','IT.Company_id=IC.Company_id');
		$this->db->where('IT.Trans_type',21);
		$this->db->group_by('IT.Company_id');
		$sql = $this->db->get();
		
		if ($sql->num_rows() > 0)
		{
        	foreach ($sql->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	
	}*/
	function Get_Beneficiary_Company_Details($Reference_company_id)
	{
		$this->db->select("IC.Company_id as E_Company_id,IC.Company_name as E_Company_name");
		$this->db->from('igain_register_beneficiary_company as IT');
		$this->db->join('igain_company_master as IC','IT.Igain_company_id=IC.Company_id');
		$this->db->where('IT.Register_beneficiary_id',$Reference_company_id);
		// $this->db->group_by('IT.Company_id');
		$sql = $this->db->get();
		
		if ($sql->num_rows() > 0)
		{
        	foreach ($sql->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	
	}
	function Get_Beneficiary_Company_Details1($Company_id)
	{
		$this->db->select("Reference_company_id");
		$this->db->from('igain_reference_enrollment');
		$this->db->where('Igain_company_id',$Company_id);
		$this->db->group_by('Reference_company_id');
		$sql = $this->db->get();
		
		if ($sql->num_rows() > 0)
		{
        	foreach ($sql->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	
	}
	/******************Nilesh End for Beneficiary Transfer Point report***************/
	/*********************Nilesh Start for Joy report 12-09-2018**********************/
	function get_points_issuance_report($start_date,$end_date,$Company_id,$seller_id,$transaction_type_id,$report_type,$login_enroll)
    {
		$this->load->dbforge();		
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));	
				
		if($report_type == 1)
		{	
			$temp_table = $login_enroll.'retailer_igain_points_issuance_summary_rpt';		
			
			if( $this->db->table_exists($temp_table) == TRUE )
			{
				$this->dbforge->drop_table($temp_table);
			}		
			$fields = array(
						'Trans_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'companyName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'sellerName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'top_up' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'purchase_amt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'reedem_pt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'balance_to_pay' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'loyalty_pts_gain' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'coalition_Loyalty_pts' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'seller_enrollid' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
					);
			$this->dbforge->add_field($fields);		
			$this->dbforge->create_table($temp_table);		
			if($seller_id == 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, SUM(A.Coalition_Loyalty_pts) as Coalition_Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_enrollment_master as E', 'E.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->where_in('A.Trans_type', array('1','2'));				
				$this->db->where(array('C.Company_id' => $Company_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where('A.Bill_no <> 0');
				$this->db->group_by("A.Trans_type,A.Seller");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}			
			if($seller_id != 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, SUM(A.Coalition_Loyalty_pts) as Coalition_Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_enrollment_master as E', 'E.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');	
				$this->db->where_in('A.Trans_type', array('1','2'));
				$this->db->where(array('C.Company_id' => $Company_id, 'A.Seller' => $seller_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where('A.Bill_no <> 0');
				$this->db->group_by("A.Trans_type,A.Seller");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}			
			if($seller_id == 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, SUM(A.Coalition_Loyalty_pts) as Coalition_Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_enrollment_master as E', 'E.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');		
				$this->db->where(array('C.Company_id' => $Company_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where('A.Bill_no <> 0');
				$this->db->group_by("A.Trans_type,A.Seller");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}			
			if($seller_id != 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts,  SUM(A.Coalition_Loyalty_pts) as Coalition_Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_enrollment_master as E', 'E.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');		
				$this->db->where(array('C.Company_id' => $Company_id, 'A.Seller' => $seller_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where('A.Bill_no <> 0');
				$this->db->group_by("A.Trans_type,A.Seller");
				$this->db->order_by('A.Seller','ASC');
				
				$query = $this->db->get();
				//echo $this->db->last_query();
			}		
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->Trans_type=='Redemption')
					{
						$lv_Total_Redeem_points=($row->Total_Redeem_points);
					}
					else
					{
						$lv_Total_Redeem_points=($row->Redeem_points);
					}
					
					$data['Trans_type'] = $row->Trans_type;
					$data['companyName'] = $row->Company_name;
					$data['sellerName'] = $row->Seller_name;
					$data['top_up'] = $row->Topup_amount;
					$data['purchase_amt'] = $row->Purchase_amount;
					$data['reedem_pt'] = $lv_Total_Redeem_points;
					$data['balance_to_pay'] = $row->balance_to_pay;
					$data['loyalty_pts_gain'] = $row->Loyalty_pts;
					$data['coalition_Loyalty_pts'] = $row->Coalition_Loyalty_pts;
					$data['seller_enrollid'] = $row->Seller;
					$this->db->insert($temp_table, $data);
				}          
			}
		}		
		if($report_type == 0)
		{		
			$temp_table = $login_enroll.'retailer_igain_points_issuance_detail_rpt';		
			if( $this->db->table_exists($temp_table) == TRUE )
			{
				$this->dbforge->drop_table($temp_table);
			}
			
			$fields = array(
						'Trans_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'Trans_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Trans_type_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'GiftCardNo' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'First_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Middle_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Last_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Manual_billno' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'companyName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'sellerName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'top_up' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'purchase_amt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'reedem_pt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'balance_to_pay' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'payment_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'cardId' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Bill_no' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'loyalty_pts_gain' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'coalition_Loyalty_pts' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'seller_enrollid' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'Enrollement_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'Quantity' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'Trans_date' => array('type' => 'DATE'),
						'Walkin_customer' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Remarks' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
					);
			$this->dbforge->add_field($fields);		
			$this->dbforge->create_table($temp_table);
			$query2_flag = 0;
			
			if($seller_id == 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts,A.Coalition_Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity');//, E.Payment_type
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
								
				$this->db->where_in('A.Trans_type', array('1','2'));				
				$this->db->where(array('D.Company_id' => $Company_id));
				$this->db->where('A.Seller <> 0');
				$this->db->where('A.Bill_no <> 0');
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
			}
			
			if($seller_id != 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts,A.Coalition_Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
			
				$this->db->where_in('A.Trans_type', array('1','2'));
				$this->db->where(array('D.Company_id' => $Company_id, 'A.Seller' => $seller_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where('A.Bill_no <> 0');
				
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
				
			}			
			if($seller_id == 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts,A.Coalition_Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				
				$this->db->where(array('D.Company_id' => $Company_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where('A.Seller <> 0');
				$this->db->where('A.Bill_no <> 0');
				//$this->db->group_by("A.Bill_no");
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
				
			}			
			if($seller_id != 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts,A.Coalition_Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
			
				$this->db->where(array('D.Company_id' => $Company_id, 'A.Seller' => $seller_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where('A.Bill_no <> 0');
				//$this->db->group_by("A.Bill_no");
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
				
				
			}
			if ($query != NULL)
			{
				foreach ($query as $row)
				{
					$data['Trans_id'] = $row->Trans_id;
					$data['Trans_type'] = $row->Trans_type;
					$data['Trans_type_id'] = $row->Trans_type_id;
					$data['Enrollement_id'] = $row->Enrollement_id;
					$data['Manual_billno'] = $row->Manual_billno;
					$data['companyName'] = $row->Company_name;
					$data['sellerName'] = $row->Seller_name;
					$data['top_up'] = $row->Topup_amount;
					$data['purchase_amt'] = $row->Purchase_amount;
					$data['reedem_pt'] = $row->Redeem_points;
					$data['balance_to_pay'] = $row->balance_to_pay;	
					$data['Bill_no'] = $row->Bill_no;
					$data['loyalty_pts_gain'] = $row->Loyalty_pts;
					$data['coalition_Loyalty_pts'] = $row->Coalition_Loyalty_pts;
					$data['seller_enrollid'] = $row->Seller;
					$data['Trans_date'] = $row->Trans_date;
					$data['Quantity'] = $row->Quantity;
					$data['Remarks'] = $row->Remarks;
					$data['First_name'] = $row->First_name;
					$data['Middle_name'] = $row->Middle_name;
					$data['Last_name'] = $row->Last_name;
					$data['cardId'] = $row->Card_id;
				
					$this->db->insert($temp_table, $data);
				}
			}
		}
		return $this->db->count_all($temp_table);
    }
	public function get_points_issuance_report_details($temp_table,$Report_type,$start,$limit)	
	{ 
		if($Report_type == 1)
		{
			$this->db->order_by('sellerName','DESC');
			$this->db->select('sellerName as Merchant_name,Trans_type,top_up as Bonus_points,purchase_amt,loyalty_pts_gain,reedem_pt,seller_enrollid as Merchant_id');
		}
		else
		{
			$this->db->order_by('Trans_id' , 'desc');
			$this->db->select("Trans_date,sellerName as Merchant_name,CONCAT(First_name, ' ', Last_name) as Member_name,cardId as Membership_ID,Manual_billno,Trans_type,top_up as Bonus_points,purchase_amt,reedem_pt,balance_to_pay, loyalty_pts_gain,coalition_Loyalty_pts,Bill_no,seller_enrollid as Merchant_id,Trans_id,Trans_type_id,Walkin_customer,Quantity,Remarks");
		}
		/* if($limit != NULL || $start != ""){

			$this->db->limit($limit,$start);
		} */
		
        $query = $this->db->get($temp_table);
		
        if ($query->num_rows() > 0)
		{
        	foreach ($query->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	public function Export_retailer_Coins_issuance_report($temp_table,$Report_type)	
	{
		if($Report_type == 1)
		{
			$this->db->order_by('sellerName','DESC');
			$this->db->select('sellerName as Merchant_name,Trans_type,top_up as Bonus_points,purchase_amt as Purchase_amt,loyalty_pts_gain,reedem_pt as Reedem_pts,seller_enrollid as Merchant_id');
			$query = $this->db->get($temp_table);
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->Bonus_points==0)
					{
						$row->Bonus_points="-";
					}
					if($row->Purchase_amt==0)
					{
						$row->Purchase_amt="-";
					}
					if($row->Reedem_pts==0)
					{
						$row->Reedem_pts="-";
					}
					if($row->loyalty_pts_gain==0)
					{
						$row->loyalty_pts_gain="-";
					}
					
					$data[] = $row;
				}	
				return $data;
			}
			return false;
		}
		else
		{
			$this->db->order_by('Trans_id' , 'desc');
			$this->db->select("Trans_date,sellerName as Merchant_name,CONCAT(First_name, ' ', Last_name) as Member_name,cardId as Membership_ID,Bill_no,Manual_billno,Trans_type,top_up as Bonus_points,purchase_amt as Purchase_amt,loyalty_pts_gain,reedem_pt as Reedem_pts,Remarks as Remarks,seller_enrollid as Merchant_id");
			
			$query = $this->db->get($temp_table);
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->Manual_billno=="")
					{
						$row->Manual_billno="-";
					}
					if($row->Bonus_points==0)
					{
						$row->Bonus_points="-";
					}
					if($row->Purchase_amt==0)
					{
						$row->Purchase_amt="-";
					}
					if($row->loyalty_pts_gain==0)
					{
						$row->loyalty_pts_gain="-";
					}
					if($row->Reedem_pts==0)
					{
						$row->Reedem_pts="-";
					}
					if($row->Remarks=="")
					{
						$row->Remarks="-";
					}	
					$data[] = $row;
				}

				return $data;
			}
			return false;
		}
	}
	function get_loyalty_publishers($Company_id)
	{
	  $this->db->select("A.Register_beneficiary_id as Publishers_id,B.Beneficiary_company_name as Publishers_name");
	  $this->db->from('igain_beneficiary_company as A');
	  $this->db->join('igain_register_beneficiary_company as B', 'B.Register_beneficiary_id = A.Register_beneficiary_id');
	  $this->db->where(array('A.Company_id' => $Company_id));
	  $sql = $this->db->get();
	  
			if ($sql->num_rows() > 0)
			{         
				return  $sql->result_array();
			}
			return false;
	}
	function Get_Buy_Miles_Status($Code_decode_type_id)
	{
		$this->db->select('*');
		$this->db->from('igain_codedecode_master');
		$this->db->where(array('Code_decode_type_id'=>$Code_decode_type_id));
		$sql=$this->db->get();
		// echo $this->db->last_query();
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
	function get_points_usage_report($start_date,$end_date,$Company_id,$seller_id,$transaction_type_id,$Usage_status,$report_type,$login_enroll)
    {
		$this->load->dbforge();		
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));	
				
		if($report_type == 1)
		{	
			$temp_table = $login_enroll.'publishers_igain_points_usage_summary_rpt';		
			
			if( $this->db->table_exists($temp_table) == TRUE )
			{
				$this->dbforge->drop_table($temp_table);
			}		
			$fields = array(
						'Trans_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'companyName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'sellerName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Publishers_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'PublishersName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'top_up' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'purchase_amt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'reedem_pt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'balance_to_pay' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'loyalty_pts_gain' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'coalition_Loyalty_pts' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'seller_enrollid' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'status' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
					);
			$this->dbforge->add_field($fields);		
			$this->dbforge->create_table($temp_table);		
			if($seller_id == 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, SUM(A.Coalition_Loyalty_pts) as Coalition_Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points,A.To_Beneficiary_company_id as Publishers_id,A.To_Beneficiary_company_name as PublishersName,CC.Code_decode as Voucher_status');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_enrollment_master as E', 'E.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_codedecode_master as CC', 'CC.Code_decode_id = A.Voucher_status');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->where_in('A.Trans_type', array('25'));				
				$this->db->where(array('C.Company_id' => $Company_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				if($Usage_status!=0)
				{
				  $this->db->where('A.Voucher_status',$Usage_status);
				}
				$this->db->group_by("A.To_Beneficiary_company_id,A.Trans_type,A.Voucher_status");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}			
			if($seller_id != 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, SUM(A.Coalition_Loyalty_pts) as Coalition_Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points,A.To_Beneficiary_company_id as Publishers_id,A.To_Beneficiary_company_name as PublishersName,CC.Code_decode as Voucher_status');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_enrollment_master as E', 'E.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->join('igain_codedecode_master as CC', 'CC.Code_decode_id = A.Voucher_status');				
				$this->db->where_in('A.Trans_type', array('25'));
				$this->db->where(array('C.Company_id' => $Company_id, 'A.To_Beneficiary_company_id' => $seller_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				if($Usage_status != 0)
				{
				  $this->db->where('A.Voucher_status',$Usage_status);
				}
				$this->db->group_by("A.To_Beneficiary_company_id,A.Trans_type,A.Voucher_status");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}			
			if($seller_id == 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts, SUM(A.Coalition_Loyalty_pts) as Coalition_Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points,A.To_Beneficiary_company_id as Publishers_id,A.To_Beneficiary_company_name as PublishersName,CC.Code_decode as Voucher_status');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_enrollment_master as E', 'E.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->join('igain_codedecode_master as CC', 'CC.Code_decode_id = A.Voucher_status');				
				$this->db->where(array('C.Company_id' => $Company_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				if($Usage_status!=0)
				{
				  $this->db->where('A.Voucher_status',$Usage_status);
				}
				$this->db->group_by("A.To_Beneficiary_company_id,A.Trans_type,A.Voucher_status");
				$this->db->order_by('A.Seller','ASC');
				$query = $this->db->get();
			}			
			if($seller_id != 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Seller_name, SUM(A.Topup_amount) as Topup_amount, SUM(A.Purchase_amount) as Purchase_amount, SUM(A.Redeem_points) as Redeem_points, SUM(A.balance_to_pay) as balance_to_pay, SUM(A.Loyalty_pts) as Loyalty_pts,  SUM(A.Coalition_Loyalty_pts) as Coalition_Loyalty_pts, A.Seller, B.Trans_type, C.Company_name,SUM(Redeem_points*Quantity) as Total_Redeem_points,A.To_Beneficiary_company_id as Publishers_id,A.To_Beneficiary_company_name as PublishersName,CC.Code_decode as Voucher_status');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Seller');
				$this->db->join('igain_enrollment_master as E', 'E.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');		
				$this->db->where(array('C.Company_id' => $Company_id, 'A.To_Beneficiary_company_id' => $seller_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->join('igain_codedecode_master as CC', 'CC.Code_decode_id = A.Voucher_status');
			
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				if($Usage_status!=0)
				{
				  $this->db->where('A.Voucher_status',$Usage_status);
				}
				$this->db->group_by("A.To_Beneficiary_company_id,A.Trans_type,A.Voucher_status");
				$this->db->order_by('A.Seller','ASC');
				
				$query = $this->db->get();
				//echo $this->db->last_query();
			}		
			if($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->Trans_type=='Redemption')
					{
						$lv_Total_Redeem_points=($row->Total_Redeem_points);
					}
					else
					{
						$lv_Total_Redeem_points=($row->Redeem_points);
					}
					
					$data['Trans_type'] = $row->Trans_type;
					$data['companyName'] = $row->Company_name;
					$data['sellerName'] = $row->Seller_name;
					$data['top_up'] = $row->Topup_amount;
					$data['purchase_amt'] = $row->Purchase_amount;
					$data['reedem_pt'] = $lv_Total_Redeem_points;
					$data['balance_to_pay'] = $row->balance_to_pay;
					$data['loyalty_pts_gain'] = $row->Loyalty_pts;
					$data['coalition_Loyalty_pts'] = $row->Coalition_Loyalty_pts;
					$data['seller_enrollid'] = $row->Seller;
					$data['Publishers_id'] = $row->Publishers_id;
					$data['PublishersName'] = $row->PublishersName;
					$data['status'] = $row->Voucher_status;
					$this->db->insert($temp_table, $data);
				}          
			}
		}		
		if($report_type == 0)
		{		
			$temp_table = $login_enroll.'publishers_igain_points_usage_detail_rpt';		
			if( $this->db->table_exists($temp_table) == TRUE )
			{
				$this->dbforge->drop_table($temp_table);
			}
			
			$fields = array(
						'Trans_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'Trans_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Trans_type_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'GiftCardNo' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'First_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Middle_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Last_name' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Manual_billno' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Company_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'companyName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Publishers_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'PublishersName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'sellerName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'top_up' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'purchase_amt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'reedem_pt' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'balance_to_pay' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'payment_type' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'cardId' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'cardId2' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'ToCustName' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'Bill_no' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'loyalty_pts_gain' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'coalition_Loyalty_pts' => array('type' => 'DECIMAL','constraint' => '25,0','DEFAULT' => 0),
						'seller_enrollid' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'Enrollement_id' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'Quantity' => array('type' => 'INT','constraint' => '11','DEFAULT' => 0),
						'Trans_date' => array('type' => 'DATE'),
						'Walkin_customer' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
						'status' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),'Remarks' => array('type' => 'VARCHAR','constraint' => '50','null' => TRUE),
					);
			$this->dbforge->add_field($fields);		
			$this->dbforge->create_table($temp_table);
			$query2_flag = 0;
			
			if($seller_id == 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts,A.Coalition_Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity,A.Card_id2,A.To_Beneficiary_company_id,A.To_Beneficiary_company_name,A.To_Beneficiary_cust_name,CCC.Code_decode as Voucher_status,A.Company_id');//, E.Payment_type
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->join('igain_codedecode_master as CCC', 'CCC.Code_decode_id = A.Voucher_status');
				
				$this->db->where_in('A.Trans_type', array('25'));				
				$this->db->where(array('D.Company_id' => $Company_id));
				$this->db->where('A.Seller <> 0');
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				if($Usage_status!=0)
				{
				  $this->db->where('A.Voucher_status',$Usage_status);
				}
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
			}
			
			if($seller_id != 0 && $transaction_type_id == 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts,A.Coalition_Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity,A.Card_id2,A.To_Beneficiary_company_id,A.To_Beneficiary_company_name,A.To_Beneficiary_cust_name,CCC.Code_decode as Voucher_status,A.Company_id');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->join('igain_codedecode_master as CCC', 'CCC.Code_decode_id = A.Voucher_status');
				$this->db->where_in('A.Trans_type', array('25'));
				$this->db->where(array('D.Company_id' => $Company_id, 'A.To_Beneficiary_company_id' => $seller_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				if($Usage_status!=0)
				{
				  $this->db->where('A.Voucher_status',$Usage_status);
				}
				
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
			
			}			
			if($seller_id == 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts,A.Coalition_Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity,A.Card_id2,A.To_Beneficiary_company_id,A.To_Beneficiary_company_name,A.To_Beneficiary_cust_name,CC.Code_decode as Voucher_status,A.Company_id');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->join('igain_codedecode_master as CC', 'CC.Code_decode_id = A.Voucher_status');
				$this->db->where(array('D.Company_id' => $Company_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->where('A.Seller <> 0');
				if($Usage_status!=0)
				{
				  $this->db->where('A.Voucher_status',$Usage_status);
				}
				//$this->db->group_by("A.Bill_no");
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
				
			}			
			if($seller_id != 0 && $transaction_type_id != 0)
			{
				$this->db->select('A.Remarks,A.Trans_id, A.Manual_billno, A.Enrollement_id, A.Seller_name, A.Topup_amount, A.GiftCardNo, A.Purchase_amount, A.Redeem_points, A.balance_to_pay, A.Card_id, A.Bill_no, A.Loyalty_pts,A.Coalition_Loyalty_pts, A.Seller, A.Trans_date, B.Trans_type, B.Trans_type_id, C.Company_name, D.First_name, D.Middle_name, D.Last_name,Quantity,A.Card_id2,A.To_Beneficiary_company_id,A.To_Beneficiary_company_name,A.To_Beneficiary_cust_name,CC.Code_decode as Voucher_status,A.Company_id');
				$this->db->from('igain_transaction as A');
				$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = A.Trans_type');
				$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = A.Enrollement_id');
				$this->db->join('igain_company_master as C', 'C.Company_id = D.Company_id');
				$this->db->join('igain_codedecode_master as CC', 'CC.Code_decode_id = A.Voucher_status');
			
				$this->db->where(array('D.Company_id' => $Company_id, 'A.To_Beneficiary_company_id' => $seller_id, 'A.Trans_type' => $transaction_type_id));
				$this->db->where('A.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				if($Usage_status!=0)
				{
				  $this->db->where('A.Voucher_status',$Usage_status);
				}
				//$this->db->group_by("A.Bill_no");
				$this->db->order_by('A.Trans_date','DESC');
				$query = $this->db->get()->result();
					
			}
				// echo"---get_points_usage_report-----".$this->db->last_query()."---<br>";
			if ($query != NULL)
			{
				foreach ($query as $row)
				{ 
					$data['Trans_id'] = $row->Trans_id;
					$data['Trans_type'] = $row->Trans_type;
					$data['Trans_type_id'] = $row->Trans_type_id;
					$data['Enrollement_id'] = $row->Enrollement_id;
					$data['Manual_billno'] = $row->Manual_billno;
					$data['Company_id'] = $row->Company_id;
					$data['companyName'] = $row->Company_name;
					$data['sellerName'] = $row->Seller_name;
					$data['top_up'] = $row->Topup_amount;
					$data['purchase_amt'] = $row->Purchase_amount;
					$data['reedem_pt'] = $row->Redeem_points;
					$data['balance_to_pay'] = $row->balance_to_pay;	
					$data['Bill_no'] = $row->Bill_no;
					$data['loyalty_pts_gain'] = $row->Loyalty_pts;
					$data['coalition_Loyalty_pts'] = $row->Coalition_Loyalty_pts;
					$data['seller_enrollid'] = $row->Seller;
					$data['Trans_date'] = $row->Trans_date;
					$data['Quantity'] = $row->Quantity;
					$data['Remarks'] = $row->Remarks;
					$data['First_name'] = $row->First_name;
					$data['Middle_name'] = $row->Middle_name;
					$data['Last_name'] = $row->Last_name;
					$data['cardId'] = $row->Card_id;
					$data['cardId2'] = $row->Card_id2;
					$data['ToCustName'] = $row->To_Beneficiary_cust_name;
					$data['Publishers_id'] = $row->To_Beneficiary_company_id;
					$data['PublishersName'] = $row->To_Beneficiary_company_name;
					$data['status'] = $row->Voucher_status;
				
					$this->db->insert($temp_table, $data);
				}
			}
		}
		
		
		return $this->db->count_all($temp_table);
    }
	public function get_points_usage_report_details($temp_table,$Report_type,$start,$limit)	
	{ 
		if($Report_type == 1)
		{
			$this->db->order_by('Publishers_id','DESC');
			$this->db->select('sellerName as Merchant_name,Trans_type,top_up as Bonus_points,purchase_amt,loyalty_pts_gain,reedem_pt,seller_enrollid as Merchant_id,Publishers_id,PublishersName,status');
		}
		else
		{ 
			$this->db->order_by('PublishersName' , 'desc');
			$this->db->select("Trans_date,sellerName as Merchant_name,CONCAT(First_name, ' ', Last_name) as Member_name,cardId as Membership_ID,Manual_billno,Trans_type,top_up as Bonus_points,purchase_amt,reedem_pt,balance_to_pay, loyalty_pts_gain,coalition_Loyalty_pts,Bill_no,seller_enrollid as Merchant_id,Trans_id,Trans_type_id,Walkin_customer,Quantity,Remarks,PublishersName,status");
			
		}
		// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
        $query = $this->db->get($temp_table);
		// echo"---get_points_usage_report_details-----".$this->db->last_query()."---<br>";
	
        if ($query->num_rows() > 0)
		{
        	foreach ($query->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	public function Export_points_usage_report($temp_table,$Report_type)	
	{
		if($Report_type == 1) // summary
		{		
			$this->db->order_by('Publishers_id','DESC');
			$this->db->select('PublishersName,Trans_type,purchase_amt as Purchase_miles,reedem_pt as Used_points,Publishers_id,status');
			
			$query = $this->db->get($temp_table);
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					
					if($row->Purchase_miles==0)
					{
						$row->Purchase_miles="-";
					}
					if($row->Used_points==0)
					{
						$row->Used_points="-";
					}
					
					
					$data[] = $row;
				}	
				return $data;
			}
			return false;
		}
		else
		{
			$this->db->order_by('PublishersName' , 'desc');
			$this->db->select("Trans_date,PublishersName,CONCAT(First_name, ' ', Last_name) as Member_name,cardId as Membership_ID,Bill_no,Manual_billno,Trans_type,purchase_amt as Purchase_miles,reedem_pt as Used_points,status,Remarks as Remarks");
			
			$query = $this->db->get($temp_table);
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->Manual_billno=="")
					{
						$row->Manual_billno="-";
					}
					if($row->Used_points==0)
					{
						$row->Used_points="-";
					}
					if($row->Purchase_miles==0)
					{
						$row->Purchase_miles="-";
					}
					if($row->Remarks=="")
					{
						$row->Remarks="-";
					}	
					$data[] = $row;
				}

				return $data;
			}
			return false;
		}
	}
	function get_points_liability_report($start_date,$end_date,$Company_id,$seller_id)
    {
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));	
					
		$this->db->select("CONCAT(B.First_name, ' ', B.Last_name) as Merchant_name,SUM(Loyalty_pts) as Total_points_issued,B.Seller_Billingratio as Merchant_billratio,SUM(Loyalty_pts*B.Seller_Billingratio) as EquivalentAED");
		$this->db->from('igain_transaction as A');
		$this->db->join('igain_enrollment_master as B', 'B.Enrollement_id = A.Seller');
		$this->db->where(array('A.Company_id' => $Company_id, 'A.Trans_type' => 2));
		// $this->db->where_in('Trans_type', array('2'));
		$this->db->where('Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');	
		$this->db->group_by("A.Seller");
		$query = $this->db->get()->result();
		
		foreach($query as $row)
		{		
			if($row->Total_points_issued==0)
			{
				$row->Total_points_issued="-";
			}
			$data[] = $row;
		}
		return $data;
    }
	function get_points_liability_report1($start_date,$end_date,$Company_id,$seller_id)
    {
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));	
	
		$query=$this->db->query("select To_Beneficiary_company_id as Beneficiary_company,(select SUM(Redeem_points) from igain_transaction where Company_id='".$Company_id."' and Trans_type=25 and Voucher_status=44 AND To_Beneficiary_company_id=Beneficiary_company AND Trans_date BETWEEN '".$start_date."' and '".$end_date."') as Pending_Redeem_points,(select SUM(Redeem_points) from igain_transaction where Company_id='".$Company_id."' and Trans_type=25 and Voucher_status=45 AND To_Beneficiary_company_id=Beneficiary_company AND Trans_date BETWEEN '".$start_date."' and '".$end_date."') as Approved_Redeem_points ,(select SUM(Redeem_points) from igain_transaction where Company_id='".$Company_id."' and Trans_type=25 and Voucher_status=46 AND To_Beneficiary_company_id=Beneficiary_company AND Trans_date BETWEEN '".$start_date."' and '".$end_date."') as Cancelled_Redeem_points from igain_transaction where Company_id='".$Company_id."' and Trans_type=25 AND Trans_date BETWEEN '".$start_date."' and '".$end_date."' group by To_Beneficiary_company_id");
		
		if($query->result() != NULL)
		{
			foreach($query->result() as $row)
			{	
				$this->db->select('Beneficiary_company_name');
				$this->db->from('igain_register_beneficiary_company');
				$this->db->where('Register_beneficiary_id',$row->Beneficiary_company);
				$Publisher = $this->db->get();
				if($Publisher->num_rows() > 0)
				{
					$PublisherQ = $Publisher->row();
					$Publisher_name = $PublisherQ->Beneficiary_company_name;
				}
				else
				{
					$Publisher_name = "-";
				}
				
				$row->Publisher_name=$Publisher_name;
				
				if($row->Pending_Redeem_points==0)
				{
					$row->Pending_Redeem_points="-";
				}
				if($row->Approved_Redeem_points==0)
				{
					$row->Approved_Redeem_points="-";
				}
				if($row->Cancelled_Redeem_points==0)
				{
					$row->Cancelled_Redeem_points="-";
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
	function get_points_liability_report2($start_date,$end_date,$Company_id,$seller_id)
    {
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));	
		
		$query=$this->db->query("select Seller as Merchant_id,(select SUM(Redeem_points*Quantity) from igain_transaction where Company_id='".$Company_id."' and Trans_type=10 and (Voucher_status=18 OR Voucher_status=19 OR Voucher_status=30) AND Seller=Merchant_id  AND Trans_date BETWEEN '".$start_date."' and '".$end_date."') as Ordered_Redeem_points,(select SUM(Redeem_points*Quantity) from igain_transaction where Company_id='".$Company_id."' and Trans_type=10 and (Voucher_status=20 OR Voucher_status=31) AND Seller=Merchant_id AND Trans_date BETWEEN '".$start_date."' and '".$end_date."') as Fulfilled_Redeem_points from igain_transaction where Company_id='".$Company_id."' and Trans_type=10 AND Trans_date BETWEEN '".$start_date."' and '".$end_date."' group by Seller");
		
		foreach($query->result() as $row)
		{	
			$this->db->select("CONCAT(First_name, ' ', Last_name) as Merchant_name");
			$this->db->from('igain_enrollment_master');
			$this->db->where('Enrollement_id',$row->Merchant_id);
			$Merchant = $this->db->get();
			if($Merchant->num_rows() > 0)
			{
				$MerchantQ = $Merchant->row();
				$Merchant_name = $MerchantQ->Merchant_name;
			}
			else
			{
				$Merchant_name = "-";
			}
			
			$row->Merchant_name=$Merchant_name;
			
			if($row->Ordered_Redeem_points==0)
			{
				$row->Ordered_Redeem_points="-";
			}
			if($row->Fulfilled_Redeem_points==0)
			{
				$row->Fulfilled_Redeem_points="-";
			}
			
			$data[] = $row;
		}
		return $data;
    }
	function get_points_liability_report3($start_date,$end_date,$Company_id,$seller_id)
    {
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));	
		
		$query=$this->db->query("select Seller_id as Merchant_id,(select SUM(Bill_amount) from igain_merchant_billing where Company_id='".$Company_id."' and Merchant_publisher_type=52 AND Seller_id=Merchant_id  AND Creation_date BETWEEN '".$start_date."' and '".$end_date."') as MInvoiced_AED,(select SUM(Settlement_amount) from igain_merchant_billing where Company_id='".$Company_id."' and Merchant_publisher_type=52  AND Seller_id=Merchant_id AND Creation_date BETWEEN '".$start_date."' and '".$end_date."') as MSettled_AED from igain_merchant_billing where Company_id='".$Company_id."' and Merchant_publisher_type=52 AND Creation_date BETWEEN '".$start_date."' and '".$end_date."' group by Seller_id");
		
		foreach($query->result() as $row)
		{	
			$this->db->select("CONCAT(First_name, ' ', Last_name) as Merchant_name");
			$this->db->from('igain_enrollment_master');
			$this->db->where('Enrollement_id',$row->Merchant_id);
			$Merchant = $this->db->get();
			if($Merchant->num_rows() > 0)
			{
				$MerchantQ = $Merchant->row();
				$Merchant_name = $MerchantQ->Merchant_name;
			}
			else
			{
				$Merchant_name = "-";
			}
			
			$row->Merchant_name=$Merchant_name;
			
			if($row->MInvoiced_AED==0)
			{
				$row->MInvoiced_AED="-";
			}
			if($row->MSettled_AED==0)
			{
				$row->MSettled_AED="-";
			}
			
			$data[] = $row;
		}
		return $data;
    }
	function get_points_liability_report4($start_date,$end_date,$Company_id,$seller_id)
    {
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));	
		
		$query=$this->db->query("select Seller_id as Publisher_id,(select SUM(Bill_amount) from igain_merchant_billing where Company_id='".$Company_id."' and Merchant_publisher_type=53 AND Seller_id=Publisher_id  AND Creation_date BETWEEN '".$start_date."' and '".$end_date."') as PInvoiced_AED,(select SUM(Settlement_amount) from igain_merchant_billing where Company_id='".$Company_id."' and Merchant_publisher_type=53  AND Seller_id=Publisher_id AND Creation_date BETWEEN '".$start_date."' and '".$end_date."') as PSettled_AED from igain_merchant_billing where Company_id='".$Company_id."' and Merchant_publisher_type=53 AND Creation_date BETWEEN '".$start_date."' and '".$end_date."' group by Seller_id");
		
		foreach($query->result() as $row)
		{	
			$this->db->select("Beneficiary_company_name");
			$this->db->from('igain_register_beneficiary_company');
			$this->db->where('Register_beneficiary_id',$row->Publisher_id);
			$Publisher1 = $this->db->get();
			if($Publisher1->num_rows() > 0)
			{
				$PublisherP = $Publisher1->row();
				$Publisher_name1 = $PublisherP->Beneficiary_company_name;
			}
			else
			{
				$Publisher_name1 = "-";
			}
			
			$row->Publisher_name1=$Publisher_name1;
			
			if($row->PInvoiced_AED==0)
			{
				$row->PInvoiced_AED="-";
			}
			if($row->PSettled_AED==0)
			{
				$row->PSettled_AED="-";
			}
			
			$data[] = $row;
		}
		return $data;
    }	
	function Get_merchant_billing_settlement_report($Company_id,$seller_id,$Billing_status,$start_date,$end_date,$report_type,$start,$limit)
    {
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));
		
		if($report_type==0) //Detail Report
		{
			$this->db->select("B.Creation_date as Bill_Creation_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,B.Bill_no,B.Joy_coins_issued,B.Bill_purchased_amount,B.Bill_amount,B.Settlement_amount,B.Settlement_flag,B.Seller_id");
			
			$this->db->from('igain_merchant_billing as B'); 
		
			$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = B.Seller_id');
		
			$this->db->where(array('B.Company_id' => $Company_id, 'B.Merchant_publisher_type' => 52));
			$this->db->where('B.Creation_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
			
			if($seller_id !=0)
			{
				$this->db->where('B.Seller_id',$seller_id);
			}
			if($Billing_status !=2)
			{
				$this->db->where('B.Settlement_flag',$Billing_status);
			}
			
			// if($limit != NULL || $start != ""){
				
				// $this->db->limit($limit,$start);
			// }
			$this->db->order_by('B.Bill_id','DESC');
			$query = $this->db->get()->result();
			
			foreach($query as $row)
			{
				if($row->Settlement_flag==0)
				{
					$row->Settlement_flag="Pending";
				}
				else if($row->Settlement_flag==1)
				{
					$row->Settlement_flag="Settled";
				}
				
				$row->Paid_amount="-";
				$row->Pay_type="-";
				$row->Bank_name="-";
				$row->Branch_name="-";
				$row->Credit_Cheque_number="-";
				
				$data[] = $row;
				
				$this->db->select("A.Creation_date as Settlement_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,A.Bill_no,A.Remarks as Joy_coins_issued,A.Bill_purchased_amount,A.Bill_amount,A.Paid_amount,A.Remarks as Settlement_flag,A.Remarks as Seller_id3,A.Remarks as Seller_id1,P.Payment_type as Pay_type,A.Bank_name,A.Branch_name,A.Credit_Cheque_number");
				
				$this->db->from('igain_billing_payment_method as A'); 
				$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = A.Seller_id');
				
				$this->db->join('igain_payment_type_master as P', 'P.Payment_type_id = A.Payment_type');
				
				$this->db->where(array('A.Company_id' => $Company_id, 'A.Merchant_publisher_type' => 52, "Bill_no" =>$row->Bill_no, "Seller_id" =>$row->Seller_id));
				
				$query1 = $this->db->get()->result();
				
				foreach($query1 as $row1)
				{
					$row1->Joy_coins_issued="-";
					$row1->Seller_id3="-";
					$row1->Seller_id1="-";
					
					$row1->Settlement_flag="-";
					
					$row1->Settlement_amount="-";
					
					if($row1->Bank_name=="")
					{
						$row1->Bank_name="-";
					}
					if($row1->Branch_name=="")
					{
						$row1->Branch_name="-";
					}
					if($row1->Credit_Cheque_number=="")
					{
						$row1->Credit_Cheque_number="-";
					}
					
					$data[] = $row1;
				}	
			}
			return $data;	
		}
		else if($report_type==1) // Summary Report
		{
			$this->db->select("B.Creation_date as Bill_Creation_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,B.Bill_no,B.Joy_coins_issued,B.Bill_purchased_amount,B.Bill_amount,B.Settlement_amount,B.Settlement_flag,B.Seller_id");
			
			$this->db->from('igain_merchant_billing as B'); 
			$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = B.Seller_id');
			
			$this->db->where(array('B.Company_id' => $Company_id, 'B.Merchant_publisher_type' => 52));
			$this->db->where('B.Creation_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
			
			if($seller_id !=0)
			{
				$this->db->where('B.Seller_id',$seller_id);
			}
			if($Billing_status !=2)
			{
				$this->db->where('B.Settlement_flag',$Billing_status);
			}
			
			// if($limit != NULL || $start != ""){
				
				// $this->db->limit($limit,$start);
			// }
			$this->db->order_by('B.Bill_id','DESC');
			$query = $this->db->get()->result();
		
			foreach($query as $row)
			{
				if($row->Settlement_flag==0)
				{
					$row->Settlement_flag="Pending";
				}
				else if($row->Settlement_flag==1)
				{
					$row->Settlement_flag="Settled";
				}
				
				$data[] = $row;
			}
			return $data;
		}
    }
	function Count_records_merchant_settlement_report($Company_id,$seller_id,$Billing_status,$start_date,$end_date,$report_type,$start,$limit)
    {
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));
			
		$this->db->select("B.Creation_date as Bill_Creation_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,B.Bill_no,B.Joy_coins_issued,B.Bill_purchased_amount,B.Bill_amount,B.Settlement_amount,B.Settlement_flag,B.Seller_id");
		
		$this->db->from('igain_merchant_billing as B'); 
		$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = B.Seller_id');
		
		$this->db->where(array('B.Company_id' => $Company_id, 'B.Merchant_publisher_type' => 52));
		$this->db->where('B.Creation_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
		
		if($seller_id !=0)
		{
			$this->db->where('B.Seller_id',$seller_id);
		}
		if($Billing_status !=2)
		{
			$this->db->where('B.Settlement_flag',$Billing_status);
		}
		
		// if($limit != NULL || $start != ""){
			
			// $this->db->limit($limit,$start);
		// }
		$this->db->order_by('B.Bill_id','DESC');
		$query = $this->db->get()->result();
	
		foreach($query as $row)
		{
			if($row->Settlement_flag==0)
			{
				$row->Settlement_flag="Pending";
			}
			else if($row->Settlement_flag==1)
			{
				$row->Settlement_flag="Settled";
			}
			
			$data[] = $row;
		}
		return $data;
    }
	function Get_merchant_debit_billing_settlement_report($Company_id,$seller_id,$Billing_status,$start_date,$end_date,$report_type,$start,$limit)
    { 
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));
		 
		if($report_type==0) //Detail Report
		{
			$this->db->select("B.Creation_date as Bill_Creation_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,B.Bill_no,B.Joy_coins_issued as Point_debited,B.Bill_purchased_amount as Cancellation_amount,B.Bill_amount,B.Settlement_amount,B.Settlement_flag,B.Seller_id");
			
			$this->db->from('igain_merchant_billing as B'); 
		
			$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = B.Seller_id');
		
			$this->db->where(array('B.Company_id' => $Company_id, 'B.Merchant_publisher_type' => 54));
			$this->db->where('B.Creation_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
			
			if($seller_id !=0)
			{
				$this->db->where('B.Seller_id',$seller_id);
			}
			if($Billing_status !=2)
			{
				$this->db->where('B.Settlement_flag',$Billing_status);
			}
			
			// if($limit != NULL || $start != ""){
				
				// $this->db->limit($limit,$start);
			// }
			$this->db->order_by('B.Bill_id','DESC');
			$query = $this->db->get()->result();
			
			foreach($query as $row)
			{
				if($row->Settlement_flag==0)
				{
					$row->Settlement_flag="Pending";
				}
				else if($row->Settlement_flag==1)
				{
					$row->Settlement_flag="Settled";
				}
				
				$row->Paid_amount="-";
				$row->Pay_type="-";
				$row->Bank_name="-";
				$row->Branch_name="-";
				$row->Credit_Cheque_number="-";
				
				$data[] = $row;
				
				$this->db->select("A.Creation_date as Settlement_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,A.Bill_no,A.Remarks as Point_debited,A.Bill_purchased_amount as Cancellation_amount,A.Bill_amount,A.Paid_amount,A.Remarks as Settlement_flag,A.Remarks as Seller_id3,A.Remarks as Seller_id1,P.Payment_type as Pay_type,A.Bank_name,A.Branch_name,A.Credit_Cheque_number");
				
				$this->db->from('igain_billing_payment_method as A'); 
				$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = A.Seller_id');
				
				$this->db->join('igain_payment_type_master as P', 'P.Payment_type_id = A.Payment_type');
				
				$this->db->where(array('A.Company_id' => $Company_id, 'A.Merchant_publisher_type' => 54, "Bill_no" =>$row->Bill_no, "Seller_id" =>$row->Seller_id));
				
				$query1 = $this->db->get()->result();
				
				foreach($query1 as $row1)
				{
					$row1->Point_debited="-";
					$row1->Seller_id3="-";
					$row1->Seller_id1="-";
					
					$row1->Settlement_flag="-";
					
					$row1->Settlement_amount="-";
					
					if($row1->Bank_name=="")
					{
						$row1->Bank_name="-";
					}
					if($row1->Branch_name=="")
					{
						$row1->Branch_name="-";
					}
					if($row1->Credit_Cheque_number=="")
					{
						$row1->Credit_Cheque_number="-";
					}
					
					$data[] = $row1;
				}	
			}
			return $data;	
		}
		else if($report_type==1) // Summary Report
		{ 
			$this->db->select("B.Creation_date as Bill_Creation_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,B.Bill_no,B.Joy_coins_issued as Point_debited,B.Bill_purchased_amount as Cancellation_amount,B.Bill_amount,B.Settlement_amount,B.Settlement_flag,B.Seller_id");
			
			$this->db->from('igain_merchant_billing as B'); 
			$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = B.Seller_id');
			
			$this->db->where(array('B.Company_id' => $Company_id, 'B.Merchant_publisher_type' => 54));
			$this->db->where('B.Creation_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
			
			if($seller_id !=0)
			{
				$this->db->where('B.Seller_id',$seller_id);
			}
			if($Billing_status !=2)
			{
				$this->db->where('B.Settlement_flag',$Billing_status);
			}
			
			// if($limit != NULL || $start != ""){
				
				// $this->db->limit($limit,$start);
			// }
			$this->db->order_by('B.Bill_id','DESC');
			$query = $this->db->get()->result();
		
			foreach($query as $row)
			{
				if($row->Settlement_flag==0)
				{
					$row->Settlement_flag="Pending";
				}
				else if($row->Settlement_flag==1)
				{
					$row->Settlement_flag="Settled";
				}
				
				$data[] = $row;
			}
			return $data;
		}
    }
	function Count_records_debit_settlement_report($Company_id,$seller_id,$Billing_status,$start_date,$end_date,$report_type,$start,$limit)
    { 
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));
		  
		$this->db->select("B.Creation_date as Bill_Creation_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,B.Bill_no,B.Joy_coins_issued as Point_debited,B.Bill_purchased_amount as Cancellation_amount,B.Bill_amount,B.Settlement_amount,B.Settlement_flag,B.Seller_id");
		
		$this->db->from('igain_merchant_billing as B'); 
		$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = B.Seller_id');
		
		$this->db->where(array('B.Company_id' => $Company_id, 'B.Merchant_publisher_type' => 54));
		$this->db->where('B.Creation_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
		
		if($seller_id !=0)
		{
			$this->db->where('B.Seller_id',$seller_id);
		}
		if($Billing_status !=2)
		{
			$this->db->where('B.Settlement_flag',$Billing_status);
		}
		
		// if($limit != NULL || $start != ""){
			
			// $this->db->limit($limit,$start);
		// }
		$this->db->order_by('B.Bill_id','DESC');
		$query = $this->db->get()->result();
	
		foreach($query as $row)
		{
			if($row->Settlement_flag==0)
			{
				$row->Settlement_flag="Pending";
			}
			else if($row->Settlement_flag==1)
			{
				$row->Settlement_flag="Settled";
			}
			
			$data[] = $row;
		}
		return $data;
    }
	function Get_Publisher_billing_settlement_report($Company_id,$seller_id,$Billing_status,$start_date,$end_date,$report_type,$start,$limit)
    {
		
		// echo"report_type---".$report_type."<br>";
		$start_date=date("Y-m-d", strtotime($start_date));
		$end_date=date("Y-m-d", strtotime($end_date));
		
		if($report_type==0) //Detail Report
		{
			$this->db->select("B.Creation_date as Bill_Creation_date,C.Beneficiary_company_name as Publisher_name,B.Bill_no,B.Joy_coins_issued as Purchased_miles,B.Bill_purchased_amount,B.Bill_amount,B.Settlement_amount,B.Settlement_flag,B.Seller_id");
			
			$this->db->from('igain_merchant_billing as B'); 
		
			$this->db->join('igain_register_beneficiary_company as C', 'C.Register_beneficiary_id = B.Seller_id');
		
			$this->db->where(array('B.Company_id' => $Company_id, 'B.Merchant_publisher_type' => 53));
			$this->db->where('B.Creation_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
			
			if($seller_id !=0)
			{
				$this->db->where('B.Seller_id',$seller_id);
			}
			if($Billing_status !=2)
			{
				$this->db->where('B.Settlement_flag',$Billing_status);
			}
			
			// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
			$this->db->order_by('B.Bill_id','DESC');
			$query = $this->db->get()->result();
			// echo"query---".$this->db->last_query()."<br>";
			foreach($query as $row)
			{
				if($row->Settlement_flag==0)
				{
					$row->Settlement_flag="Pending";
				}
				else if($row->Settlement_flag==1)
				{
					$row->Settlement_flag="Settled";
				}
				
				$row->Paid_amount="-";
				$row->Pay_type="-";
				$row->Bank_name="-";
				$row->Branch_name="-";
				$row->Credit_Cheque_number="-";
				
				$data[] = $row;
				
				$this->db->select("A.Creation_date as Settlement_date,C.Beneficiary_company_name as Publisher_name,A.Bill_no,A.Remarks as Purchased_miles,A.Bill_purchased_amount,A.Bill_amount,A.Paid_amount,A.Remarks as Settlement_flag,A.Remarks as Seller_id3,A.Remarks as Seller_id1,P.Payment_type as Pay_type,A.Bank_name,A.Branch_name,A.Credit_Cheque_number");
				
				$this->db->from('igain_billing_payment_method as A'); 
				$this->db->join('igain_register_beneficiary_company as C', 'C.Register_beneficiary_id = A.Seller_id');
				
				$this->db->join('igain_payment_type_master as P', 'P.Payment_type_id = A.Payment_type');
				
				$this->db->where(array('A.Company_id' => $Company_id, 'A.Merchant_publisher_type' => 53, "Bill_no" =>$row->Bill_no, "Seller_id" =>$row->Seller_id));
				
				$query1 = $this->db->get()->result();
				
				foreach($query1 as $row1)
				{
					$row1->Purchased_miles="-";
					$row1->Seller_id3="-";
					$row1->Seller_id1="-";
					
					$row1->Settlement_flag="-";
					
					$row1->Settlement_amount="-";
					
					if($row1->Bank_name=="")
					{
						$row1->Bank_name="-";
					}
					if($row1->Branch_name=="")
					{
						$row1->Branch_name="-";
					}
					if($row1->Credit_Cheque_number=="")
					{
						$row1->Credit_Cheque_number="-";
					}
					
					$data[] = $row1;
				}	
			}
			return $data;	
		}
		else if($report_type==1) // Summary Report
		{
			$this->db->select("B.Creation_date as Bill_Creation_date,C.Beneficiary_company_name as Publisher_name,B.Bill_no,B.Joy_coins_issued as Purchased_miles,B.Bill_purchased_amount,B.Bill_amount,B.Settlement_amount,B.Settlement_flag,B.Seller_id");
			
			$this->db->from('igain_merchant_billing as B'); 
			$this->db->join('igain_register_beneficiary_company as C', 'C.Register_beneficiary_id = B.Seller_id');
			$this->db->where(array('B.Company_id' => $Company_id, 'B.Merchant_publisher_type' => 53));
			$this->db->where('B.Creation_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
			
			if($seller_id !=0)
			{
				$this->db->where('B.Seller_id',$seller_id);
			}
			if($Billing_status !=2)
			{
				$this->db->where('B.Settlement_flag',$Billing_status);
			}
			
			// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
			// }
			$this->db->order_by('B.Bill_id','DESC');
			$query = $this->db->get()->result();
		
			foreach($query as $row)
			{
				if($row->Settlement_flag==0)
				{
					$row->Settlement_flag="Pending";
				}
				else if($row->Settlement_flag==1)
				{
					$row->Settlement_flag="Settled";
				}
				
				$data[] = $row;
			}
			return $data;
		}
    }
	function Get_debit_transaction_report($Company_id,$seller_id,$start_date,$end_date,$report_type,$start,$limit)
    {
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));
		
		if($report_type==0) //Detail Report
		{
			$this->db->select("B.Trans_date,CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,CONCAT(D.First_name, ' ', D.Last_name) as Member_name,B.Card_id as Membership_Id,B.Manual_billno as Bill_no,B.Purchase_amount as Cancellation_amount,B.Loyalty_pts as Debited_points,B.Redeem_points as Credited_redeem_points,B.Remarks,B.Seller as Seller_id");
			
			$this->db->from('igain_transaction as B'); 
		
			$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = B.Seller');
			
			$this->db->join('igain_enrollment_master as D', 'D.Enrollement_id = B.Enrollement_id');
		
			$this->db->where(array('B.Company_id' => $Company_id, 'B.Trans_type' => 26));
			$this->db->where('B.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
			
			if($seller_id !=0)
			{
				$this->db->where('B.Seller',$seller_id);
			}
			
			// if($limit != NULL || $start != ""){
				
				// $this->db->limit($limit,$start);
			// }
			$this->db->order_by('B.Trans_id','DESC');
			$query = $this->db->get()->result();
			
			foreach($query as $row)
			{
				if($row->Cancellation_amount==0)
				{
					$row->Cancellation_amount="-";
				}
				if($row->Debited_points==0)
				{
					$row->Debited_points="-";
				}
				if($row->Credited_redeem_points==0)
				{
					$row->Credited_redeem_points="-";
				}
				if($row->Remarks=="")
				{
					$row->Remarks="-";
				}
				
				$data[] = $row;	
			}
			return $data;	
		}
		else if($report_type==1) // Summary Report
		{
			$this->db->select("CONCAT(C.First_name, ' ', C.Last_name) as Merchant_name,SUM(B.Purchase_amount) as Total_cancellation_amount,SUM(B.Loyalty_pts) as Total_debited_points,SUM(B.Redeem_points) as Total_credited_points,B.Seller as Seller_id");
			
			$this->db->from('igain_transaction as B'); 
			$this->db->join('igain_enrollment_master as C', 'C.Enrollement_id = B.Seller');
			
			$this->db->where(array('B.Company_id' => $Company_id, 'B.Trans_type' => 26));
			$this->db->where('B.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
			
			if($seller_id !=0)
			{
				$this->db->where('B.Seller',$seller_id);
			}
			// if($limit != NULL || $start != ""){
				
				// $this->db->limit($limit,$start);
			// }
			$this->db->group_by('B.Seller');
			$query = $this->db->get()->result();
		
			foreach($query as $row)
			{
				if($row->Total_cancellation_amount==0)
				{
					$row->Total_cancellation_amount="-";
				}
				if($row->Total_debited_points==0)
				{
					$row->Total_debited_points="-";
				}
				if($row->Total_credited_points==0)
				{
					$row->Total_credited_points="-";
				}
				
				$data[] = $row;
			}
			return $data;
		}
    }
	/************AMIT KAMBLE 06-1-2020*******************/
	function get_cust_order_transaction_details($Company_id, $start_date, $end_date, $transaction_from, $membership_id, $Voucher_status,$Outlet_id,$start, $limit,$Channel_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date)); 
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));
		
		// $this->db->select("t.Trans_date as Order_date,t.Bill_no as Order_no,t.Manual_billno as Pos_billno,t.Trans_type,t.Card_id as Membership_ID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,t.Seller,t.Seller_name as Outlet,t.Item_code,t.remark2 as condiments,t.Quantity,t.Purchase_amount,t.Enrollement_id,t.Voucher_status as Order_status,t.Delivery_method as Order_type");
		$this->db->select("t.Card_id as Membership_ID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,t.Seller_name as Outlet,t.Trans_date as Order_date,t.Bill_no as Order_no,t.Manual_billno as Pos_billno,t.Trans_type,t.Item_code,t.Quantity,t.Purchase_amount,t.Enrollement_id,t.Delivery_method as Order_type,t.Voucher_status as Order_status,t.Channel_id");
		
		$this->db->from('igain_transaction as t'); 
		$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Enrollement_id');
		//$this->db->join('igain_company_merchandise_catalogue as m','t.Item_code=m.Company_merchandize_item_code','LEFT');
		$this->db->where(array('t.Company_id' => $Company_id));
		if($transaction_from > 0){
			$this->db->where(array('t.Trans_type' => $transaction_from));
			
			if($transaction_from == 29){
			$this->db->where_in('t.Channel_id', $Channel_id);
			}
		}
		else
		{
			$this->db->where_in('t.Trans_type',array(2,12,29));
		}
		
		if($membership_id != ""){
			$this->db->where(array('t.Card_id' => $membership_id));
		}
		
		if($Voucher_status > 0){
			$this->db->where(array('t.Voucher_status' => $Voucher_status));
		}
		
		if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('t.Seller',$Outlet_id);
			}
		
		$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		/* if($limit != NULL || $start != ""){
				
				$this->db->limit($limit,$start);
			} */
		$this->db->order_by('t.Trans_id','DESC');
			$query58 = $this->db->get()->result();
		//echo $this->db->last_query(); die;
		
			foreach($query58 as $row58)
			{
				$this->db->select("DISTINCT(Merchandize_item_name),c.Merchandize_category_id,Merchandize_category_name");
				$this->db->from("igain_company_merchandise_catalogue as c");
				$this->db->join("igain_merchandize_category as m",'c.Company_id=m.Company_id AND c.Merchandize_category_id=m.Merchandize_category_id');

				$this->db->where(array('Company_merchandize_item_code'=>$row58->Item_code,'c.Company_id'=>$Company_id));

				$this->db->limit(1,0);
				$sql62 = $this->db->get();
			//	echo $this->db->last_query(); die;
				foreach ($sql62->result() as $row62)
				{
					$row58->Menu_name = $row62->Merchandize_item_name;
					$row58->Category = $row62->Merchandize_category_name;
				
				}
				
				$data58[] = $row58;
			}
			return $data58;
			
	}
	
	function get_cust_order_transaction_summary($Company_id, $start_date, $end_date, $transaction_from, $membership_id, $Voucher_status,$Outlet_id,$start, $limit,$Channel_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));

		// loyalty sum(t.Redeem_amount) as Total_redeem_amount,sum(t.Loyalty_pts) as Total_gained_pts,
		
		// $this->db->select("t.Trans_date as Order_date,t.Bill_no as Order_no,t.Manual_billno as Pos_billno,t.Trans_type,t.Card_id as Membership_ID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,t.Seller,t.Seller_name as Outlet,SUM(t.Purchase_amount) as Total_purchase_amount,sum(t.Shipping_cost) as Total_shipping_cost,t.Total_discount as Total_discount_amount,sum(t.Redeem_amount) as Total_redeem_amount,sum(t.Loyalty_pts) as Total_gained_pts,t.Mpesa_TransID,sum(t.Mpesa_Paid_Amount) as Total_mpesa_amount,sum(t.COD_Amount) as Total_cash_amount,sum(t.Paid_amount) as Total_paid_amount,t.Enrollement_id,t.Voucher_status as Order_status,t.Delivery_method as Order_type");
		
		$this->db->select("t.Card_id as Membership_ID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,t.Seller,t.Seller_name as Outlet,t.Trans_date as Order_date,t.Bill_no as Order_no,t.Manual_billno as Pos_billno,t.Trans_type,SUM(t.Purchase_amount) as Total_purchase_amount,sum(t.Shipping_cost) as Total_Delivery_cost,t.Total_discount as Total_discount_amount,sum(t.Loyalty_pts) as Total_gained_pts,sum(t.Redeem_points) as Redeemed_points,sum(t.Redeem_amount) as Total_redeem_amount,Voucher_no,sum(t.Voucher_discount) as Voucher_amount,t.Mpesa_TransID,sum(t.Mpesa_Paid_Amount) as Total_mpesa_amount,sum(t.COD_Amount) as Total_cash_amount,sum(t.Paid_amount) as Total_paid_amount,t.Enrollement_id,t.Delivery_method as Order_type,t.Voucher_status as Order_status,t.Channel_id");
		
		$this->db->from('igain_transaction as t'); 
		$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Enrollement_id');

		$this->db->where(array('t.Company_id' => $Company_id));
		if($transaction_from > 0){
			$this->db->where(array('t.Trans_type' => $transaction_from));
			
			if($transaction_from == 29){
			$this->db->where_in('t.Channel_id', $Channel_id);
			}
		}
		else
		{
			$this->db->where_in('t.Trans_type',array(2,12,29));
		}
		
		if($membership_id != ""){
			$this->db->where(array('t.Card_id' => $membership_id));
		}
		
		if($Voucher_status > 0){
			$this->db->where(array('t.Voucher_status' => $Voucher_status));
		}
		
		if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('t.Seller',$Outlet_id);
			}
		
		
		$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		/*  if($limit != NULL || $start != ""){
				
				$this->db->limit($limit,$start);
			} */
		$this->db->order_by('t.Trans_id','DESC');
		$this->db->group_by("t.Bill_no");
		
			$query58 = $this->db->get()->result();
		//echo $this->db->last_query(); die;
		
			foreach($query58 as $row58)
			{
				$row58->Total_gained_pts = floor($row58->Total_gained_pts);
				
				$data58[] = $row58;
			}
			return $data58;
			
	}
	
	/************AMIT KAMBLE 06-1-2020******XXX*************/
	//**************** order transaction report 18-09-2019 *sandeep**********************
	public function get_order_details($Bill_no,$enroll_id,$Company_id) 
	{
		$this->db->select('T.*,TC3.Cust_name,TC3.Cust_address,TC3.Cust_city,TC3.Cust_zip,TC3.Cust_state,TC3.Cust_country,TC3.Cust_phnno,TC3.Cust_email, T.Voucher_no,T.Trans_date,T.Delivery_status,T.Shipping_cost,T.Purchase_amount,ICM.name as Country_name,ISM.name as State_name,IC.name as City_name');
		$this->db->from('igain_transaction as T');
		$this->db->join('igain_transaction_child3 as TC3', 'T.Bill_no = TC3.Transaction_id AND T.Enrollement_id = TC3.Enrollment_id','LEFT');
		$this->db->join('igain_country_master as ICM', 'TC3.Cust_country = ICM.id','LEFT');
		$this->db->join('igain_state_master as ISM', 'TC3.Cust_state = ISM.id','LEFT');
		$this->db->join('igain_city_master as IC', 'TC3.Cust_city = IC.id','LEFT');
		
		$this->db->where(array('T.Bill_no' => $Bill_no,'T.Enrollement_id' => $enroll_id,'T.Company_id' => $Company_id));
		$sql = $this->db->get();
		if($sql->num_rows() > 0)
		{			
			return $sql->row();
		}
		else
		{
			return 0;
		}
	}
	public function get_order_details2($Bill_no,$Enrollement_id,$Company_id)
	{  		
		$this->db->select('P.Company_merchandise_item_id,P.Merchandize_item_name,P.Thumbnail_image1,P.Billing_price,P.Item_Weight,P.Weight_unit_id,T.Merchandize_Partner_id,T.Merchandize_Partner_branch,P.Seller_id,P.Merchant_flag,P.Cost_price,P.VAT,P.Merchandize_category_id,P.Item_image1,T.Quantity,T.Purchase_amount,T.Redeem_points,T.Paid_amount,T.Company_id,T.Bill_no,T.Manual_billno,T.Quantity,T.Voucher_no,T.Voucher_status,T.Item_code,T.Item_size,T.Item_size,Shipping_cost,PM.Country_id as Partner_Country,PM.State as Partner_state,T.Seller,T.Delivery_method,T.remark2,T.remark3,T.Mpesa_Paid_Amount,T.COD_Amount,T.Mpesa_TransID,T.Table_no,T.Redeem_amount,T.Total_discount');
		$this->db->from('igain_transaction as T');
		
		$this->db->join('igain_company_merchandise_catalogue as P', 'T.Item_code = P.Company_merchandize_item_code','LEFT');		
		$this->db->join('igain_partner_master as PM', 'P.Partner_id = PM.Partner_id','LEFT');		
	
		$this->db->where(array('T.Bill_no' => $Bill_no, 'T.Enrollement_id' => $Enrollement_id, 'T.Company_id' => $Company_id));
		
		$sql = $this->db->get();
		if($sql->num_rows() > 0)
		{			
			return $sql->result_array();
		}
		else
		{
			return 0;
		}
	}
	public function GetTakeAwayAddress($Company_id,$Seller_id) 
	{
		$this->db->select('T.Current_address,T.Zipcode,T.Phone_no,T.User_email_id,CONCAT(T.First_name, " ", T.Last_name) as Seller_name,ICM.name as Country_name,ISM.name as State_name,IC.name as City_name');
		$this->db->from('igain_enrollment_master as T');
		$this->db->join('igain_country_master as ICM', 'T.Country = ICM.id','LEFT');
		$this->db->join('igain_state_master as ISM', 'T.State = ISM.id','LEFT');
		$this->db->join('igain_city_master as IC', 'T.City = IC.id','LEFT');
		$this->db->where(array('T.Enrollement_id' => $Seller_id , 'T.Company_id' => $Company_id));
		$sql = $this->db->get();
		
		if($sql->num_rows() > 0)
		{			
			return $sql->row();
		}
		else
		{
			return 0;
		}
	}
	
	//************* 17-04-2020 sandeep ************************
	function get_item_sales_report($Company_id, $start_date, $end_date, $Outlet_id,$channel,$Bene_Channel_id)
	{ 
	
		$Todays_date=date("Y-m-d h:i:s");
		$this->db->select('T.Item_code,T.Item_code as Item_name,T.Item_code as Category,sum(T.Quantity) as Qty_sold,sum(T.Purchase_amount) as Value_sold,T.Item_code as Brand,CONCAT(First_name,Last_name) as Outlet,T.Trans_type as Channel,T.Channel_id');
		
		//`A`.`Merchandize_item_name` as Item_name,`B`.`Merchandize_category_name` as Category,
		
		$this->db->from('igain_transaction as T');
		$this->db->join('igain_enrollment_master as IE','T.Seller = IE.Enrollement_id');
		$this->db->where(array('T.Company_id'=>$Company_id)); //'A.Active_flag'=>1
		
		if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
			$this->db->where_in('T.Seller',$Outlet_id);
		}
		
		if($channel > 0){
			$this->db->where(array('T.Trans_type' => $channel));
			
			 if($channel == 29){
			$this->db->where_in('T.Channel_id', $Bene_Channel_id);
			}
		}
		else
		{
			$this->db->where_in('T.Trans_type',array(2,12,29));
		}
		
		$this->db->where('T.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
		
		$this->db->group_by('T.Item_code');
		$this->db->order_by('Qty_sold','DESC');
		$sql=$this->db->get();
		
		// echo $this->db->last_query(); //exit;
		
		if($sql->num_rows()>0)
		{
			foreach ($sql->result() as $row)
			{
				
				$this->db->select("DISTINCT(Merchandize_item_name),Merchandize_category_id");
				$this->db->from("igain_company_merchandise_catalogue");
				$this->db->where(array('Company_merchandize_item_code'=>$row->Item_code,'Company_id'=>$Company_id));
				$this->db->limit(1,0);
				$sql62 = $this->db->get();
			//	echo $this->db->last_query(); die;
				foreach ($sql62->result() as $row62)
				{
					$row->Item_name = $row62->Merchandize_item_name;
					
					$this->db->select("DISTINCT(Merchandize_category_name),Merchandize_category_code");
					$this->db->from("igain_merchandize_category");
					$this->db->where(array('Merchandize_category_id'=>$row62->Merchandize_category_id,'Company_id'=>$Company_id));
					$this->db->limit(1,0);
					$sql63 = $this->db->get();
					//echo $this->db->last_query();
					foreach ($sql63->result() as $row63)
					{
						$row->Category = $row63->Merchandize_category_name;
					}
				
				}
				
				if($Outlet_id[0] == 0)
				{
					$row->Outlet = "All";
				}
				
				$row->Brand = "";
                $data[] = $row;
            }

            return $data;
		}
		else
		{
			return false;
		}	
	}
	
	
	function get_member_order_report($Company_id, $start_date, $end_date, $transaction_from, $membership_id,$Outlet_id,$report_type,$Redemptionratio,$enrollID,$Channel_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));

		// loyalty sum(t.Redeem_amount) as Total_redeem_amount,sum(t.Loyalty_pts) as Total_gained_pts,sum(t.Shipping_cost) as Total_shipping_cost
		
		if($report_type == 1)
		{
			$this->db->select("t.Bill_no as Sequence_no,t.Trans_date as Date,t.Manual_billno as POS_bill_no,t.Card_id as Membership_ID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,t.Trans_type as Channel,t.Seller,t.Seller_name as Outlet,SUM(t.Purchase_amount) as Bill_amt,t.Total_discount as Discount_amt,t.Voucher_discount as Voucher_amt,sum(t.Paid_amount) as Paid_amt,sum(t.Loyalty_pts) as Earned_pts,sum(t.Loyalty_pts) as Earned_amt,sum(t.Redeem_points) as Redeemed_pts,sum(t.Redeem_amount) as Redeemed_amt,sum(t.Mpesa_Paid_Amount) as Total_mpesa_amount,sum(t.COD_Amount) as Total_cash_amount,t.Enrollement_id,t.Voucher_status as Order_status,t.Delivery_method as Order_type,t.Channel_id");
			
			$this->db->from('igain_transaction as t'); 
			$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Enrollement_id');

			$this->db->where(array('t.Company_id' => $Company_id));
			if($transaction_from > 0){
				$this->db->where(array('t.Trans_type' => $transaction_from));
				if($transaction_from == 29){
				$this->db->where_in('t.Channel_id', $Channel_id);
				}
			}
			else
			{
				$this->db->where_in('t.Trans_type',array(2,12,29));
			}
			
			if($membership_id != ""){
				$this->db->where(array('t.Card_id' => $membership_id));
			}

			if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('t.Seller',$Outlet_id);
			}

			
			$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

			/*  if($limit != NULL || $start != ""){
					
					$this->db->limit($limit,$start);
				} */
			$this->db->order_by('t.Trans_id','DESC');
			$this->db->group_by("t.Bill_no");
			
				$query59 = $this->db->get()->result();
			// echo $this->db->last_query(); die;
			
				foreach($query59 as $row59)
				{
					$row59->Earned_pts = round($row59->Earned_pts);
					$row59->Earned_amt = round($row59->Earned_pts / $Redemptionratio);
					$data59[] = $row59;
				}
				return $data59;
		}
		
		if($report_type == 2) // summary
		{
			$this->db->select("t.Card_id as Membership_ID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,SUM(t.Purchase_amount) as Bill_amt,sum(t.Redeem_points) as Redeemed_pts,sum(t.Redeem_amount) as Redeemed_amt,sum(t.Paid_amount) as Paid_amt,sum(t.Loyalty_pts) as Earned_pts,(Current_balance- (Blocked_points + Debit_points) ) as Current_points,t.Channel_id");
			//sum(t.Shipping_cost) as Total_shipping_cost,sum(t.Mpesa_Paid_Amount) as Total_mpesa_amount,sum(t.COD_Amount) as Total_cash_amount,t.Enrollement_id
			
			$this->db->from('igain_transaction as t'); 
			$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Enrollement_id');

			$this->db->where(array('t.Company_id' => $Company_id));
			if($transaction_from > 0){
				$this->db->where(array('t.Trans_type' => $transaction_from));
				if($transaction_from == 29){
				$this->db->where_in('t.Channel_id', $Channel_id);
				}
			}
			else
			{
				$this->db->where_in('t.Trans_type',array(2,12,29));
			}
			
			if($membership_id != ""){
				$this->db->where(array('t.Card_id' => $membership_id));
			}

			
			if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('t.Seller',$Outlet_id);
			}
			
			$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

			/*  if($limit != NULL || $start != ""){
					
					$this->db->limit($limit,$start);
				} */
			$this->db->order_by('t.Trans_id','DESC');
			$this->db->group_by("t.Enrollement_id");
			
				$query60 = $this->db->get()->result();
			// echo $this->db->last_query(); die;

				$this->load->dbforge();
				$this->dbforge->drop_table($enrollID.'Temp_Member_Points_Summary_Report',TRUE);
				

				$this->dbforge->add_field("Membership_ID VARCHAR(16) NOT NULL, Member_name VARCHAR(50) NOT NULL,Bill_amt DECIMAL(25,2) NOT NULL,Online_Bill_amt DECIMAL(25,2) NULL,POS_Bill_amt DECIMAL(25,2) NULL,Redeemed_pts INT(11) NOT NULL, Redeemed_amt DECIMAL(25,2) NOT NULL,Paid_amt DECIMAL(25,2) NOT NULL,Voucher_amt DECIMAL(25,2) NOT NULL,Discount_amt DECIMAL(25,2) NOT NULL,Earned_pts INT(11) NOT NULL,Earned_amt DECIMAL(25,2) NOT NULL,Outlet_visits INT(11) NOT NULL,Online_purchased INT(11) NOT NULL,Current_points INT(11) NOT NULL,Channel_id INT(11) NOT NULL");
				$this->dbforge->create_table($enrollID.'Temp_Member_Points_Summary_Report', TRUE);
				
				
				foreach($query60 as $row60)
				{
					$this->db->select("t.Card_id as Membership_ID,SUM(t.Purchase_amount) as Online_Bill_amt");
					$this->db->from('igain_transaction as t'); 
					$this->db->where(array('t.Company_id' => $Company_id,'t.Card_id' => $row60->Membership_ID));
					
					$this->db->where_in('t.Trans_type',array(12,29));
					
					if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
						$this->db->where_in('t.Seller',$Outlet_id);
					}

					$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
					
						$query622 = $this->db->get()->result();
						foreach($query622 as $row622)
						{
							$row60->Online_Bill_amt = $row622->Online_Bill_amt;
						}
						
					
					$this->db->select("t.Card_id as Membership_ID,SUM(t.Purchase_amount) as POS_Bill_amt");
					$this->db->from('igain_transaction as t'); 
					$this->db->where(array('t.Company_id' => $Company_id,'t.Card_id' => $row60->Membership_ID,'t.Trans_type' => 2));
					
					if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
						$this->db->where_in('t.Seller',$Outlet_id);
					}

					$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
					
						$query622 = $this->db->get()->result();
						foreach($query622 as $row622)
						{
							$row60->POS_Bill_amt = $row622->POS_Bill_amt;
						}
						
						
					$total_store_visits = $this->get_member_store_visits($row60->Membership_ID,$Company_id, $start_date, $end_date,$Outlet_id);
									
							$total_online_visits = $this->get_member_online_visits($row60->Membership_ID,$Company_id, $start_date, $end_date,$Outlet_id);
							
							$discount = $this->get_member_discountAmt($row60->Membership_ID,$Company_id, $start_date, $end_date);
							
							$row60->Earned_pts = round($row60->Earned_pts);
							$row60->Earned_amt = round($row60->Earned_pts / $Redemptionratio);
							
							$row60->Voucher_amt = number_format(round($discount['totalVoucherDiscount']),2);
							$row60->Discount_amt = number_format(round($discount['totalDiscount']),2);
							$row60->Outlet_visits = $total_store_visits;
							$row60->Online_purchased = $total_online_visits;
							$row60->Current_points =round($row60->Current_points);
				//	print_r($row60);echo "-*********-" .PHP_EOL; //die;
					$this->db->insert($enrollID."Temp_Member_Points_Summary_Report",$row60);
					
			//		echo $this->db->last_query(); echo "----------------------";
					
				}
				
				$this->db->select("Membership_ID,Member_name,Outlet_visits,Online_purchased,Online_Bill_amt,POS_Bill_amt,Bill_amt,Discount_amt,Voucher_amt,Paid_amt,Earned_pts,Earned_amt,Redeemed_pts,Redeemed_amt,Current_points,Channel_id");
				$this->db->from($enrollID.'Temp_Member_Points_Summary_Report');
				$this->db->order_by("Membership_ID",'ASC');
				
				$query606 = $this->db->get()->result();
				foreach($query606 as $row606)
				{
					$data606[] = $row606;
					
				}
				return $data606;
		}
			
	}
	
	function get_member_store_visits($membership_id,$Company_id,$start_date,$end_date,$Outlet_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));
		
		$this->db->select('DISTINCT(Bill_no)');
		$this->db->from('igain_transaction'); 
			
		$this->db->where(array('Company_id' => $Company_id,'Trans_type' => 2,'Card_id' => $membership_id));
		$this->db->where('Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
		
		if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('Seller',$Outlet_id);
			}
		$sql21 = $this->db->get();
		//echo $this->db->last_query();
		return $sql21->num_rows();
	}
	
	function get_member_online_visits($membership_id,$Company_id,$start_date,$end_date,$Outlet_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));
		
		$this->db->select('DISTINCT(Bill_no)');
		$this->db->from('igain_transaction'); 
			
		$this->db->where(array('Company_id' => $Company_id,'Trans_type' => 12,'Card_id' => $membership_id));
		$this->db->where('Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
			$this->db->where_in('Seller',$Outlet_id);
		}
		$sql21 = $this->db->get();
		//echo $this->db->last_query();
		return $sql21->num_rows();
	}
	
	function get_member_discountAmt($membership_id,$Company_id,$start_date,$end_date)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));
		
		$this->db->select('Total_discount');
		$this->db->from('igain_transaction'); 
			
		$this->db->where(array('Company_id' => $Company_id,'Card_id' => $membership_id));
		$this->db->where('Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
		$this->db->group_by('Bill_no');
		$sql21 = $this->db->get();
		//echo $this->db->last_query();
		
		$totalDiscount = 0;
		$info = [];
		if($sql21->num_rows() > 0)
		{
			foreach ($sql21->result_array() as $row2)
			{
				$totalDiscount = $totalDiscount + $row2['Total_discount'];
			}
			
			$info['totalDiscount'] = $totalDiscount;
		}
		
		//echo "------------------".$totalDiscount;
		
		
		//SELECT sum(Card_value) FROM `igain_giftcard_tbl` WHERE `Company_id`=3 and `Card_id`='2019000000000' AND Payment_Type_id=99 AND `Create_date` BETWEEN "2020-03-24 00:00:00" AND "2020-03-26 23:59:59" 
		
		$this->db->select('sum(Card_value)');
		$this->db->from('igain_giftcard_tbl'); 
			
		$this->db->where(array('Company_id' => $Company_id,'Card_id' => $membership_id,'Payment_Type_id' => 99));
		$this->db->where('Create_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		$sql22 = $this->db->get();
		if($sql22->num_rows() > 0)
		{
			foreach ($sql22->result_array() as $row3)
			{
				$totalVoucherDiscount = $row3['sum(Card_value)'];
			}
			
			$info['totalVoucherDiscount'] = $totalVoucherDiscount;
		}
		
		return $info;
	}
	//************* 17-04-2020 sandeep ************************
	
	// AMIT KAMBLE 17-04-2020
	function Get_loyalty_order_trans_records($Company_id, $start_date, $end_date, $transaction_from,$Outlet_id,$Redemptionratio,$Channel_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));

		
		$this->db->select("Seller,CONCAT(e.First_name,' ',e.Last_name) as Outlet,t.Trans_type as Channel,COUNT(Trans_type) AS Visits,COUNT(Trans_type) AS Online_purchase,SUM(t.Purchase_amount) as Bill_amount_visit,SUM(t.Purchase_amount) as Bill_amount_online,SUM(t.Purchase_amount) as Total_spend,SUM(t.Total_discount) as Total_discount_amount,sum(t.Loyalty_pts) as Earn_points,sum(t.Loyalty_pts) as Earned_amt,sum(t.Redeem_points) as Redeem_points,sum(t.Redeem_amount) as Redeem_amount,sum(t.Voucher_discount) as Voucher_amount,sum(t.Paid_amount) as Paid_amount,t.Channel_id"); 
		
		$this->db->from('igain_transaction as t'); 
		$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Seller'); 

		$this->db->where(array('t.Company_id' => $Company_id));
		if($transaction_from > 0){
			$this->db->where(array('t.Trans_type' => $transaction_from));
			if($transaction_from == 29){
			$this->db->where_in('t.Channel_id', $Channel_id);
			}
		}
		else
		{
			$this->db->where_in('t.Trans_type',array(2,12,29));
		}
		
		
		if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('t.Seller',$Outlet_id);
		}
		
		$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		$this->db->group_by("t.Seller");
		$this->db->order_by("Total_spend",'desc');
		// $this->db->group_by("t.Trans_type");
		
			$query58 = $this->db->get()->result();
		// echo $this->db->last_query(); die;
		if($query58 != NULL )
		{
			foreach($query58 as $row58)
			{
				$val = array();
				// $row58->Earn_points = floor($row58->Earn_points);
				// $row58->Earned_amt = ($row58->Earn_points / $Redemptionratio);
				
				$this->db->select("sum(t.Loyalty_pts) as Earn_points"); 
				$this->db->from('igain_transaction as t'); 
				$this->db->where(array('t.Company_id' => $Company_id));
				if($transaction_from > 0){
					$this->db->where(array('t.Trans_type' => $transaction_from));
					if($transaction_from == 29){
					$this->db->where_in('t.Channel_id', $Channel_id);
					}
				}
				else
				{
					$this->db->where_in('t.Trans_type',array(2,12,29));
				}
				
				$this->db->where('t.Seller',$row58->Seller);
				$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
				$this->db->group_by("t.Bill_no");
				$query589 = $this->db->get()->result();
				// echo "<BR><BR>".$this->db->last_query();
				if($query589 != NULL )
				{
					foreach($query589 as $row589)
					{
						$val[] = floor($row589->Earn_points);
					}
					
				}
				$row58->Earn_points = array_sum($val);
				
				$row58->Earned_amt = ($row58->Earn_points / $Redemptionratio);
				$data58[] = $row58;
			}
			return $data58;
		}
		else
		{
			return 0;
		}			
	}
	// AMIT KAMBLE 17-04-2020
	function Get_outlet_pos_online_summary($Company_id, $start_date, $end_date, $transaction_from,$Outlet_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));

		
		$this->db->select("COUNT(Trans_type) AS Visits,COUNT(Trans_type) AS Online_purchase,SUM(t.Purchase_amount) as Bill_amount_visit,SUM(t.Purchase_amount) as Bill_amount_online"); 
		
		$this->db->from('igain_transaction as t'); 
		// $this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Seller'); 

		$this->db->where(array('t.Company_id' => $Company_id));
		$this->db->where(array('t.Trans_type' => $transaction_from));
		$this->db->where('t.Seller',$Outlet_id);
		
		
		$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		$this->db->group_by("t.Seller");
		
		$query58 = $this->db->get()->result();
		// echo $this->db->last_query(); die;
		
			foreach($query58 as $row58)
			{
				$data58[] = $row58;
			}
			return $data58;
			
	}
	function Get_items_summary_trans_records($Company_id, $start_date, $end_date, $Category,$Item,$MembershipID)
	{
		
		
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));

		
		// $this->db->select("Card_id as MembershipID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,Phone_no,Merchandize_category_name as Menu_group,COUNT(Item_code) AS Times_purchased,SUM(t.Purchase_amount) as Menu_group_value"); 
		$this->db->select("t.Card_id as MembershipID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,Phone_no,Item_code,Merchandize_item_name,COUNT(Item_code) AS Times_purchased,SUM(t.Purchase_amount) as Item_value,c.Merchandize_category_id,Merchandize_category_name as Menu_group,e.Enrollement_id as Cat_Times_purchased,Purchase_amount as Cat_value"); 
		
		$this->db->from('igain_transaction as t'); 
		$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Enrollement_id'); 
		$this->db->join('igain_company_merchandise_catalogue as c', 'c.Company_merchandize_item_code = t.Item_code AND c.Company_id=t.Company_id'); 
		$this->db->join('igain_merchandize_category as m', 'm.Merchandize_category_id = c.Merchandize_category_id AND m.Company_id=c.Company_id'); 

		$this->db->where(array('t.Company_id' => $Company_id,'c.Active_flag' => 1));
		$this->db->where_in('t.Trans_type',array(2,12));
		if($Category != 0){	$this->db->where_in('t.Item_code',$Item); }
		if($MembershipID != NULL){	$this->db->where('t.Card_id',$MembershipID); }

		$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		$this->db->group_by("t.Item_code");
		$this->db->group_by("t.Enrollement_id");
		$this->db->order_by("e.Enrollement_id");
		$this->db->order_by("c.Merchandize_category_id");
		
		$query58 = $this->db->get();
		 // echo $this->db->last_query(); die;
		if($query58->num_rows() > 0)
		{
			$lv_MembershipID='0';
			$lv_category_id='0';
			foreach ($query58->result() as $row)
			{
				$MembershipID=$row->MembershipID;
				$Merchandize_category_id=$row->Merchandize_category_id;
				$row->Phone_no = App_string_decrypt($row->Phone_no);
				$row->Item_value = number_format(round($row->Item_value),2);
				/*if($MembershipID == $lv_MembershipID && $lv_category_id == $Merchandize_category_id)
				{  //die;
					$Times_purchased[]=$row->Times_purchased;
					$Item_value[]=$row->Item_value;
				}
				else
				{
					$Item_value = array();
					$Times_purchased = array();
					$Times_purchased[]=$row->Times_purchased;
					$Item_value[]=$row->Item_value;
				}

				$row->Cat_Times_purchased = array_sum($Times_purchased);
				$row->Cat_value = array_sum($Item_value);
				*/
				
                $data[] = $row;
				$lv_MembershipID=$MembershipID;
				$lv_category_id=$Merchandize_category_id;
            }
            return $data;
		}
		return false;	
	}
	
	function Get_cat_summary_trans_records($Company_id, $start_date, $end_date, $Category,$Item,$MembershipID)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));

		
		// $this->db->select("Card_id as MembershipID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,Phone_no,Merchandize_category_name as Menu_group,COUNT(Item_code) AS Times_purchased,SUM(t.Purchase_amount) as Menu_group_value"); 
		$this->db->select("t.Card_id as MembershipID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,Phone_no,Item_code,COUNT(Item_code) AS Times_purchased,SUM(t.Purchase_amount) as Item_value,Merchandize_item_name,Merchandize_category_name as Menu_group,c.Merchandize_category_id"); 
		
		$this->db->from('igain_transaction as t'); 
		$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Enrollement_id'); 
		$this->db->join('igain_company_merchandise_catalogue as c', 'c.Company_merchandize_item_code = t.Item_code AND c.Company_id=t.Company_id'); 
		$this->db->join('igain_merchandize_category as m', 'm.Merchandize_category_id = c.Merchandize_category_id AND m.Company_id=c.Company_id'); 

		$this->db->where(array('t.Company_id' => $Company_id,'c.Active_flag' => 1));
		$this->db->where_in('t.Trans_type',array(2,12));
		if($Category != 0){	$this->db->where('c.Merchandize_category_id',$Category); }
		if($MembershipID != NULL){	$this->db->where('t.Card_id',$MembershipID); }

		$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		$this->db->group_by("t.Item_code");
		$this->db->group_by("t.Enrollement_id");
		$this->db->order_by("e.Enrollement_id");
		$this->db->order_by("c.Merchandize_category_id");
		
		$query58 = $this->db->get();
		// echo $this->db->last_query(); die;
		if($query58->num_rows() > 0)
		{
			$lv_MembershipID='0';
			$lv_category_id='0';
			foreach ($query58->result() as $row)
			{
				$MembershipID=$row->MembershipID;
				$Merchandize_category_id=$row->Merchandize_category_id;
				if($MembershipID == $lv_MembershipID && $lv_category_id == $Merchandize_category_id)
				{  //die;
					$Times_purchased[]=$row->Times_purchased;
					$Item_value[]=$row->Item_value;
				}
				else
				{
					$Item_value = array();
					$Times_purchased = array();
					$Times_purchased[]=$row->Times_purchased;
					$Item_value[]=$row->Item_value;
				}

				$row->Cat_Times_purchased = array_sum($Times_purchased);
				$row->Cat_value = array_sum($Item_value);
				
				
                $data[] = $row;
				$lv_MembershipID=$MembershipID;
				$lv_category_id=$Merchandize_category_id;
            }
            return $data;
		}
		return false;	
	}
	
		function Get_member_category_reports($Company_id, $start_date, $end_date, $Category,$MembershipID)
	{
		
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));

		$this->db->select("t.Card_id as MembershipID,CONCAT(e.First_name,' ',e.Last_name) as Member_name,Phone_no,Item_code,Merchandize_category_name  as Menu_group,COUNT(Item_code) AS Times_purchased,SUM(t.Purchase_amount) as Value,c.Merchandize_category_id"); 
		
		$this->db->from('igain_transaction as t'); 
		$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Enrollement_id'); 
		$this->db->join('igain_company_merchandise_catalogue as c', 'c.Company_merchandize_item_code = t.Item_code AND c.Company_id=t.Company_id'); 
		$this->db->join('igain_merchandize_category as m', 'm.Merchandize_category_id = c.Merchandize_category_id AND m.Company_id=c.Company_id'); 

		$this->db->where(array('t.Company_id' => $Company_id,'c.Active_flag' => 1));
		$this->db->where_in('t.Trans_type',array(2,12));
		if($Category != 0){	$this->db->where('c.Merchandize_category_id',$Category); }
		if($MembershipID != NULL){	$this->db->where('t.Card_id',$MembershipID); }

		$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

		$this->db->group_by("c.Merchandize_category_id");
		$this->db->group_by("t.Enrollement_id");
		$this->db->order_by("e.Enrollement_id");
		$this->db->order_by("c.Merchandize_category_id");
		
		$query58 = $this->db->get();
		 // echo $this->db->last_query(); die;
		if($query58->num_rows() > 0)
		{
			foreach ($query58->result() as $row)
			{
				$row->Phone_no = App_string_decrypt($row->Phone_no);
				$row->Value = number_format(round($row->Value),2);
				
                $data[] = $row;
            }
            return $data;
		}
		return false;	
	}
	
	
	function get_outlet_by_subadmin($Company_id,$Enrollement_id)
	{
		$this->db->select("Enrollement_id,First_name,Middle_name,Last_name,Super_seller");
		$this->db->from('igain_enrollment_master');
		$this->db->where(array('User_id' => '2','User_activated' => '1','Sub_seller_Enrollement_id' => $Enrollement_id));
		$sql = $this->db->get();
		// echo $this->db->last_query();die;
		if ($sql->num_rows() > 0)
		{
        	foreach ($sql->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	
	function get_category_by_subadmin($Company_id,$Enrollement_id)
	{
		$this->db->select("DISTINCT(m.Merchandize_category_id),Merchandize_category_code,Merchandize_category_name");
		$this->db->from('igain_merchandize_category as m');
		$this->db->join('igain_company_merchandise_catalogue as c', 'c.Merchandize_category_id = m.Merchandize_category_id AND c.Company_id=m.Company_id'); 		
		$this->db->where(array('m.Company_id' => $Company_id,'m.Active_flag' => '1','c.Active_flag' => '1','m.Seller_id' => $Enrollement_id));
		$sql = $this->db->get();
		// echo $this->db->last_query();die;
		if ($sql->num_rows() > 0)
		{
        	foreach ($sql->result() as $row)
			{
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	
	function Get_Linked_Items_for_category($Merchandize_category_id,$Company_id)
	{
		$this->db->select('A.Merchandize_category_id,Company_merchandize_item_code,Merchandize_item_name,C.Merchandize_category_name');
		$this->db->from('igain_company_merchandise_catalogue as A');
		$this->db->join('igain_merchandize_category as C','A.Merchandize_category_id=C.Merchandize_category_id and  A.Company_id=C.Company_id');
		
		$this->db->where(array('A.Active_flag'=>1,'A.Merchandize_category_id'=>$Merchandize_category_id,'A.Company_id'=>$Company_id,'A.Merchandize_item_type <>' => 119));
		
		
		$sql=$this->db->get();
		  // echo "<br><br><br>".$this->db->last_query();//die;
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
	//********** 28-04-2020****** sandeep **********
	function get_deactivated_members($Company_id)
	{
		$this->db->select('Company_id,Enrollement_id,CONCAT(First_name," ",Last_name) as Name,Card_id as Membership_id,joined_date as Membership_date,Phone_no,User_email_id,(Current_balance- (Blocked_points + Debit_points) ) as Current_balance,total_purchase,Total_topup_amt,Total_reddems');
		  $this->db->from('igain_enrollment_master');
		 
		  $this->db->where(array('User_activated'=>'0', 'Company_id' =>$Company_id,'User_id' => 1 ));
			  
		  $inactive_users = $this->db->get();	
	//	 echo $this->db->last_query();		  
		  if($inactive_users->num_rows() > 0)
		  {
			foreach($inactive_users->result() as $rowsd)
			{
				if($rowsd->Membership_id=='0')
				{
				 $rowsd->Membership_id="-";
				}
				if($rowsd->total_purchase==0)
				{
				 $rowsd->total_purchase="-";
				}
				if($rowsd->Total_topup_amt==0)
				{
				 $rowsd->Total_topup_amt="-";
				}
				if($rowsd->Total_reddems==0)
				{
				 $rowsd->Total_reddems="-";
				}
				if($rowsd->Current_balance==0)
				{
				 $rowsd->Current_balance="-";
				}
				
				$rowsd->Phone_no = App_string_decrypt($rowsd->Phone_no);
				$rowsd->User_email_id = App_string_decrypt($rowsd->User_email_id);
				
				$rowsd->User_type="Member";
				

				$data[] = $rowsd;
			}
		   
		   return $data;
		  }
		  
		  return false;
	}
	function Get_voucher_report_records($Company_id, $start_date, $end_date, $Status,$Outlet_id,$Stamp_flag)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));
		$Payment_Type_id = array('99','997','998');
		 if($Stamp_flag==1)//For Stamp Report
		{
			$Payment_Type_id = array('997');
		} 
		
		
		$this->db->select("Gift_card_id as Voucher_no,CONCAT(First_name,' ',Last_name) as Issued_to,g.Create_date as Issued_on,Card_value as Value,Card_balance,g.Discount_percentage,g.Update_user_id,g.Update_date,Payment_Type_id,g.Seller_id"); 
		
		$this->db->from('igain_giftcard_tbl as g'); 
		$this->db->join('igain_enrollment_master as e', 'e.Card_id = g.Card_id AND e.Company_id = g.Company_id'); 
		// $this->db->join('igain_transaction as t', 'g.Gift_card_id = t.Voucher_no AND g.Company_id = t.Company_id'); 
		if($Stamp_flag==1)//For Stamp Report
		{
			$this->db->select("v.Item_name,v.Quantity,v.Cost_price,v.Valid_from,v.Valid_till");
			$this->db->join('igain_company_send_voucher as v', 'v.Voucher_code = g.Gift_card_id AND e.Company_id = g.Company_id'); 
		} 
		$this->db->where(array('g.Company_id' => $Company_id));
		$this->db->where_in('g.Payment_Type_id', $Payment_Type_id);
		 if($Status == 2){
			$this->db->where('g.Card_balance = "0.00" ');
		}
		if($Status == 1){
			$this->db->where('g.Card_balance != "0.00" ');
		}
		
		if(count($Outlet_id) > 0 && $Outlet_id[0] > 0 && $Status != 1){
			 
				$Outlet_id[]='0';
				$this->db->where_in('g.Update_user_id',$Outlet_id);
			 
		}

		
		
		$this->db->where('g.Create_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
		 
		$this->db->order_by("id",'desc');
		
		$query58 = $this->db->get()->result();
		 // echo $this->db->last_query(); die;
		if($query58 != NULL )
		{
			foreach($query58 as $row58)
			{
				/* if($row58->Payment_Type_id == '99'){$row58->Type = 'Discount Voucher(Value)';}
				if($row58->Payment_Type_id == '996'){$row58->Type = 'Product Voucher(Percentage)';}
				if($row58->Payment_Type_id == '997'){$row58->Type = 'Product Voucher(Value)';}
				if($row58->Payment_Type_id == '998'){$row58->Type = 'Revenue Voucher(Value)';}
				if($row58->Payment_Type_id == '999'){$row58->Type = 'Discount Voucher(Percentage)';}
				 */
				if($row58->Payment_Type_id == '99'){$row58->Type = 'Discount Voucher';}
				// if($row58->Payment_Type_id == '996'){$row58->Type = 'Product Voucher(Percentage)';}
				if($row58->Payment_Type_id == '997'){$row58->Type = 'Product Voucher';}
				if($row58->Payment_Type_id == '998'){$row58->Type = 'Revenue Voucher';}
				// if($row58->Payment_Type_id == '999'){$row58->Type = 'Discount Voucher(Percentage)';}
				
				$this->db->select("CONCAT(First_name,' ',Last_name) as Outlet");
				$this->db->from("igain_enrollment_master");
				$this->db->where(array('Enrollement_id'=>$row58->Seller_id,'Company_id'=>$Company_id));
				$this->db->limit(1,0);
				$sql631 = $this->db->get();
				//echo $this->db->last_query();
				foreach ($sql631->result() as $row631)
				{
					$row58->Issud_Outlet = $row631->Outlet;
				}	
				
				if($row58->Card_balance == '0.00')
				{
					$row58->Status = 'Used';
					
					$this->db->select("CONCAT(First_name,' ',Last_name) as Outlet");
					$this->db->from("igain_enrollment_master");
					$this->db->where(array('Enrollement_id'=>$row58->Update_user_id,'Company_id'=>$Company_id));
					$this->db->limit(1,0);
					$sql63 = $this->db->get();
					//echo $this->db->last_query();
					foreach ($sql63->result() as $row63)
					{
						$row58->Used_Outlet = $row63->Outlet;
					}
					$row58->Used_date = $row58->Update_date;
					
				}
				else
				{
					$row58->Status = 'Issued';
					$row58->Used_Outlet = '-';
					$row58->Used_date = '-';
				}
				
					
				$data58[] = $row58;
			}
			return $data58;
		}
		else
		{
			return 0;
		}			
	}
	
	function Get_Voucher_report_summary($Company_id, $start_date, $end_date,$membership_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));
		$Payment_Type_id = array('99','997','998');
		
		
		
		$this->db->select("CONCAT(First_name,' ',Last_name) as Issued_to,g.Card_id,(SELECT COUNT(*) FROM `igain_giftcard_tbl` as `gg`  WHERE `gg`.`Company_id` = '$Company_id' AND `gg`.`Payment_Type_id` IN('99', '997', '998') AND `gg`.`Card_balance` != '0.00' AND `gg`.`Create_date` BETWEEN '$start_date' AND '$end_date' AND gg.Card_id=g.Card_id GROUP BY `gg`.`Card_id` ) as Total_Issued_vouchers,(SELECT COUNT(*) FROM `igain_giftcard_tbl` as `gg`  WHERE `gg`.`Company_id` = '$Company_id' AND `gg`.`Payment_Type_id` IN('99', '997', '998') AND `gg`.`Card_balance` = '0.00' AND `gg`.`Create_date` BETWEEN '$start_date' AND '$end_date' AND gg.Card_id=g.Card_id GROUP BY `gg`.`Card_id` ) as Total_Used_vouchers,(SELECT COUNT(*) FROM `igain_giftcard_tbl` as `gg`  WHERE `gg`.`Company_id` = '$Company_id' AND `gg`.`Payment_Type_id` IN('99', '997', '998') AND `gg`.`Card_balance` != '0.00' AND `gg`.`Discount_percentage` = '0.00' AND `gg`.`Create_date` BETWEEN '$start_date' AND '$end_date' AND gg.Card_id=g.Card_id GROUP BY `gg`.`Card_id` ) as Total_Issued_Value_Vouchers,(SELECT SUM(Card_value) FROM `igain_giftcard_tbl` as `gg`  WHERE `gg`.`Company_id` = '$Company_id' AND `gg`.`Payment_Type_id` IN('99', '997', '998') AND `gg`.`Card_balance` = '0.00' AND `gg`.`Discount_percentage` = '0.00' AND  `gg`.`Create_date` BETWEEN '$start_date' AND '$end_date' AND gg.Card_id=g.Card_id GROUP BY `gg`.`Card_id` ) as Used_Value_Vouchers,(SELECT SUM(Card_value) FROM `igain_giftcard_tbl` as `gg`  WHERE `gg`.`Company_id` = '$Company_id' AND `gg`.`Payment_Type_id` IN('99', '997', '998') AND `gg`.`Card_balance` != '0.00' AND `gg`.`Discount_percentage` = '0.00' AND `gg`.`Create_date` BETWEEN '$start_date' AND '$end_date' AND gg.Card_id=g.Card_id GROUP BY `gg`.`Card_id` ) as Available_Value_Vouchers,(SELECT COUNT(*) FROM `igain_giftcard_tbl` as `gg`  WHERE `gg`.`Company_id` = '$Company_id' AND `gg`.`Payment_Type_id` IN('99', '997', '998') AND `gg`.`Card_balance` != '0.00' AND `gg`.`Discount_percentage` != '0.00' AND `gg`.`Create_date` BETWEEN '$start_date' AND '$end_date' AND gg.Card_id=g.Card_id GROUP BY `gg`.`Card_id` ) as Total_Issued_Percenatage_Vouchers,(SELECT SUM(Discount_percentage) FROM `igain_giftcard_tbl` as `gg`  WHERE `gg`.`Company_id` = '$Company_id' AND `gg`.`Payment_Type_id` IN('99', '997', '998') AND `gg`.`Card_balance` = '0.00' AND `gg`.`Discount_percentage` != '0.00' AND `gg`.`Create_date` BETWEEN '$start_date' AND '$end_date' AND gg.Card_id=g.Card_id GROUP BY `gg`.`Card_id` ) as Used_Percentage_Vouchers,(SELECT SUM(Discount_percentage) FROM `igain_giftcard_tbl` as `gg`  WHERE `gg`.`Company_id` = '$Company_id' AND `gg`.`Payment_Type_id` IN('99', '997', '998') AND `gg`.`Card_balance` != '0.00' AND `gg`.`Discount_percentage` != '0.00' AND `gg`.`Create_date` BETWEEN '$start_date' AND '$end_date' AND gg.Card_id=g.Card_id GROUP BY `gg`.`Card_id` ) as Unused_Percentage_Vouchers"); 
		
		$this->db->from('igain_giftcard_tbl as g'); 
		$this->db->join('igain_enrollment_master as e', 'e.Card_id = g.Card_id AND e.Company_id = g.Company_id'); 

		$this->db->where(array('g.Company_id' => $Company_id));
		$this->db->where_in('g.Payment_Type_id', $Payment_Type_id);

		
		if($membership_id != '' ){
			 
				$this->db->where_in('g.Card_id',$membership_id);
			 
		}

		
		$this->db->where('g.Create_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
		
		$this->db->group_by('g.Card_id');	
		// $this->db->order_by("id",'desc');
		
		
		$query58 = $this->db->get()->result();
		 // echo $this->db->last_query(); die;
		if($query58 != NULL )
		{
			foreach($query58 as $row)
			{

				
					if($row->Total_Issued_vouchers==''){$row->Total_Issued_vouchers=0;}
					if($row->Total_Used_vouchers==''){$row->Total_Used_vouchers=0;}
					if($row->Total_Issued_Value_Vouchers==''){$row->Total_Issued_Value_Vouchers=0;}
					if($row->Used_Value_Vouchers==''){$row->Used_Value_Vouchers=0;}
					if($row->Available_Value_Vouchers==''){$row->Available_Value_Vouchers=0;}
					if($row->Total_Issued_Percenatage_Vouchers==''){$row->Total_Issued_Percenatage_Vouchers=0;}
					if($row->Used_Percentage_Vouchers==''){$row->Used_Percentage_Vouchers=0;}
					if($row->Unused_Percentage_Vouchers==''){$row->Unused_Percentage_Vouchers=0;}
					
					
				$data58[] = $row;
			}
			return $data58;
		}
		else
		{
			return 0;
		}			
	}
	
	//********** 16-05-2020****** amit kamble **********
	function Get_gift_card_trans($Company_id,$Card_id)
	{
		$this->db->select("SUM(Card_value) AS PurchaseGC,(SUM(Card_value)-SUM(Card_balance)) AS redeemGC");
		$this->db->from('igain_giftcard_tbl');
		$this->db->where(array('Card_id' => $Card_id,'Company_id' => $Company_id));
		$this->db->where_not_in('Payment_Type_id',array(997,99,998));
		$this->db->group_by('Card_id');
		$this->db->group_by('Company_id');

		$sql = $this->db->get();
		 // echo $this->db->last_query();die;
		if ($sql->num_rows() > 0)
		{
        	return $sql->row();
        }
        return false;
	}
	
	function get_members_feedbacks($Company_id, $start_date, $end_date, $membership_id)
	{
		$this->db->select("CONCAT(p.First_name,' ',p.Last_name) as Member_name,k.Membership_id,p.Phone_no,p. User_email_id,k.Header_type as Feedback_type,k.Content_description as Feedback_comment,k.Creation_date as Comment_date");
		$this->db->from("igain_contact_us_tbl as k");
		$this->db->join("igain_enrollment_master as p","k.Enrollment_id=p.Enrollement_id");
		$this->db->where(array("k.Company_id"=>$Company_id,"k.Creation_date BETWEEN ".$start_date." AND ".$end_date));
		
		if($membership_id > 0)
		{
			$this->db->where(array("k.Membership_id"=>$membership_id));
		}
		$this->db->order_by("k.Creation_date","DESC");
		$feed_users = $this->db->get();	
	//	 echo $this->db->last_query();		  
		  if($feed_users->num_rows() > 0)
		  {
			foreach($feed_users->result() as $rowszd)
			{
				$rowszd->Phone_no = App_string_decrypt($rowszd->Phone_no);
				$rowszd->User_email_id = App_string_decrypt($rowszd->User_email_id);
				
				if($rowszd->Feedback_type == 1)
				{
					$rowszd->Feedback_type = "Feedback";
				}
				if($rowszd->Feedback_type == 2)
				{
					$rowszd->Feedback_type = "Request";
				}
				if($rowszd->Feedback_type == 3)
				{
					$rowszd->Feedback_type = "Suggestion";
				}
				
				$rowszd->Comment_date = date("Y-m-d",strtotime($rowszd->Comment_date));
				
				$dataG[] = $rowszd;
			}
			
			return $dataG;
		  }
		
		return false;
	}
	public function get_company_Channel_partner_details($Company_id)
	{
		$query = $this->db->select("rc.Register_beneficiary_id,Beneficiary_company_name");
		$query = $this->db->from("igain_beneficiary_company as bc");
		$query = $this->db->join("igain_register_beneficiary_company as rc","bc.Register_beneficiary_id=rc.Register_beneficiary_id");
		$query = $this->db->where("bc.Company_id",$Company_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		return false;	
	}
	public function Get_beneficiary_company($Register_beneficiary_id)
	{
		$this->db->select("Beneficiary_company_name");
		$this->db->from("igain_register_beneficiary_company as A");
		$this->db->where(array("A.Register_beneficiary_id"=>$Register_beneficiary_id));
		
		$edit_sql = $this->db->get();
				
		if($edit_sql -> num_rows() == 1)
		{
			return $edit_sql->row();
		}
		else
		{
			return false;
		}		
	}
	function Get_Gift_card_report_records($Company_id, $start_date, $end_date, $Status)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));
		$Payment_Type_id = array('3','4','5');
		
		// $this->db->select("g.Card_id as Membership_id,CONCAT(First_name,' ',Last_name) as Member_name,Gift_card_id as Gift_card_no,g.Create_date as Purchase_date,Card_value as Purchase_amount,Card_balance,g.Update_user_id,g.Update_date,Send_to_giftcard");
		
		$this->db->select("g.Card_id as Membership_id,User_name as Member_name,Gift_card_id as Gift_card_no,g.Create_date as Purchase_date,Card_value as Purchase_amount,Card_balance,g.Update_user_id,g.Update_date,Send_to_giftcard,Send_to_user"); 
		
		$this->db->from('igain_giftcard_tbl as g'); 
		// $this->db->join('igain_enrollment_master as e', 'e.Card_id = g.Card_id AND e.Company_id = g.Company_id'); 

		$this->db->where(array('g.Company_id' => $Company_id));
		$this->db->where_in('g.Payment_Type_id', $Payment_Type_id);
		 if($Status == 2){
			$this->db->where('g.Card_balance = "0.00" ');
		}
		if($Status == 1){
			$this->db->where('g.Card_balance != "0.00" ');
		}
		
		$this->db->where('g.Create_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');
		 
		$this->db->order_by("id",'desc');
		
		
		$query58 = $this->db->get()->result();
		 // echo $this->db->last_query(); die;
		if($query58 != NULL )
		{
			foreach($query58 as $row58)
			{
				
				if($row58->Card_balance == '0.00')
				{
					$row58->Status = 'Used';
					
					$this->db->select("CONCAT(First_name,' ',Last_name) as Outlet");
					$this->db->from("igain_enrollment_master");
					$this->db->where(array('Enrollement_id'=>$row58->Update_user_id,'Company_id'=>$Company_id));
					$this->db->limit(1,0);
					$sql63 = $this->db->get();
					// echo $this->db->last_query();
					foreach ($sql63->result() as $row63)
					{
						$row58->Used_Outlet = $row63->Outlet;
					}
					$row58->Used_date = $row58->Update_date;
					$row58->Used_by = '-';
					
				}
				else
				{
					$row58->Status = 'Issued';
					$row58->Used_Outlet = '-';
					$row58->Used_date = '-';
					$row58->Used_by = '-';
					
				}
				if($row58->Send_to_giftcard != '')
				{
					$row58->Status = 'Sent';
					$row58->Used_Outlet = '-';
					$row58->Used_date = '-';
					$row58->Used_by = $row58->Send_to_user;
				}
					
				$data58[] = $row58;
			}
			return $data58;
		}
		else
		{
			return 0;
		}			
	}
	public function Get_Customer_birthday_anniversary_report($Company_id,$start_date,$end_date,$Birth_anni_flag)
	{
		$start_date=date("m-d", strtotime($start_date));
		$end_date=date("m-d", strtotime($end_date));
		
		 $this->db->select('IE.Card_id as Membership_ID,First_name,Last_name,Date_of_birth,Wedding_annversary_date AS Anniversary_date,joined_date,SUM(Purchase_amount) AS Total_Purchase_Amount,SUM(Paid_amount) AS Total_Paid_Amount, SUM(`Loyalty_pts`+`Topup_amount`+`Transfer_points`) AS Total_Gained_Points,SUM(Redeem_points) as Total_Redeemed_Points');
		   
		$this->db->from('igain_enrollment_master as IE');
		$this->db->join('igain_transaction as IT','IE.Enrollement_id=IT.Enrollement_id AND IE.Company_id=IT.Company_id','left');
		
		
		$this->db->where('IE.Company_id' , $Company_id);
		if($Birth_anni_flag == 'Birthday')
		{
			$this->db->where("Date_of_birth != ''");
			$this->db->where("Date_of_birth not like '%1970-01-01%'");
			$this->db->where("DATE_FORMAT(Date_of_birth, '%m-%d') BETWEEN '".$start_date."' AND '".$end_date."'");
			$this->db->order_by('IE.Date_of_birth' , 'asc');
		}
		else
		{
			$this->db->where("Wedding_annversary_date != ''");
			$this->db->where("Wedding_annversary_date not like '%1970-01-01%'");
			$this->db->where("DATE_FORMAT(Wedding_annversary_date, '%m-%d') BETWEEN '".$start_date."' AND '".$end_date."'");
			$this->db->order_by('IE.Wedding_annversary_date' , 'asc');
		}
		$this->db->where('IE.User_id' , 1);
		$this->db->where('IE.User_activated' , 1);
		
		
		$this->db->group_by('IT.Enrollement_id');
		
		$sql51 = $this->db->get();
		  // echo "<br>".$this->db->last_query();
		if($sql51 -> num_rows() > 0)
		{
			
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				
				if($row->Total_Purchase_Amount==0)
				{
				 $row->Total_Purchase_Amount="-";
				}
				else
				{
					$row->Total_Purchase_Amount = number_format(round($row->Total_Purchase_Amount),2); 
				}
				if($row->Total_Paid_Amount==0)
				{
				 $row->Total_Paid_Amount="-";
				}
				else
				{
					$row->Total_Paid_Amount = number_format(round($row->Total_Paid_Amount),2); 
				}
				if($row->Total_Redeemed_Points==0)
				{
				 $row->Total_Redeemed_Points="-";
				}
				else
				{
					$row->Total_Redeemed_Points= (int)$row->Total_Redeemed_Points;
				}
				if($row->Total_Gained_Points==0)
				{
				 $row->Total_Gained_Points="-";
				}
				else
				{
					$row->Total_Gained_Points= round($row->Total_Gained_Points);
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
	function get_yearly_loyalty_report($Company_id,$Outlet_id,$Year,$Tier,$seller_id,$Brand_name,$Redemptionratio)
	{
	
			$this->db->select("YEAR(Trans_date) as TransYear, MONTHNAME(Trans_date) as TransMONTH,Seller_name as Brand,Seller_name as Outlet,Tier_name, sum(t.Loyalty_pts) as Earned_pts, t.Loyalty_pts as Earned_amt,  sum(t.Redeem_points) as Redeemed_pts,  sum(t.Redeem_amount) as Redeem_amount");
			
			$this->db->from('igain_transaction as t'); 
			$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Enrollement_id AND e.Company_id=t.Company_id');
			$this->db->join('igain_tier_master as tm', 'e.Tier_id = tm.Tier_id AND e.Company_id=tm.Company_id');

			$this->db->where(array('t.Company_id' => $Company_id,'YEAR(Trans_date)' => $Year));
			
			if($Tier > 0){
				$this->db->where('e.Tier_id' ,$Tier);
			}
			if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('t.Seller',$Outlet_id);
			}
			
			$this->db->order_by('t.Trans_id','DESC');
			$this->db->group_by("TransYear");
			$this->db->group_by("TransMONTH");
			
			$query60 = $this->db->get()->result();
			// echo $this->db->last_query(); die;
			foreach($query60 as $row58)
			{
				$row58->Brand = $Brand_name;
				
				$row58->Earned_amt = ($row58->Earned_pts / $Redemptionratio);
				$row58->Earned_pts = round($row58->Earned_pts);
				if($seller_id==0)
				{
					$row58->Outlet='All';
					$row58->Brand='All';
				}
				
				if($Tier==0)
				{
					$row58->Tier_name='All';
				}
				$data58[] = $row58;
			}
			return $data58;
		
		
			
	}
	function get_trans_year($Company_id)
	{
		$this->db->select("YEAR(Trans_date) as TransYear");
		$this->db->from('igain_transaction as t'); 
		$this->db->where(array('t.Company_id' => $Company_id));
		$this->db->group_by("TransYear");
		$this->db->order_by('t.Trans_id','DESC');
		$query60 = $this->db->get()->result();
		foreach($query60 as $row58)
			{
				
				$data58[] = $row58;
			}
			return $data58;
	}
	
	public function get_cust_balance_report($Company_id,$Source,$Tier_id,$Single_cust_membership_id)
	{
		 $this->db->select('IE.Card_id as Membership_ID,First_name,Middle_name,Last_name,Tier_name,joined_date,IE.Current_address as Current_address,ICity.name as City,IState.name as State,IE.Phone_no as Phone_no,User_email_id,total_purchase AS Total_Purchase_Amount, SUM(`Loyalty_pts`+`Topup_amount`+`Transfer_points`) AS Total_Gained_Points,Total_reddems as Total_Redeemed_Points,(Current_balance- (Blocked_points + Debit_points) ) as Total_current_balance,User_activated,IE.Create_user_id as Enrolled_by,IE.source as Source');
		   
		$this->db->from('igain_enrollment_master as IE');
		$this->db->join('igain_transaction as IT','IE.Enrollement_id=IT.Enrollement_id','LEFT');
		$this->db->join('igain_tier_master as TM','IE.Tier_id=TM.Tier_id','LEFT');
		$this->db->join('igain_city_master as ICity','IE.City=ICity.id','LEFT');
		$this->db->join('igain_state_master as IState','IE.State=IState.id','LEFT');
		
		//$this->db->join('igain_company_master as IC','IE.Company_id=IT.Company_id','LEFT');
		
		$this->db->where('IE.Company_id' , $Company_id);
		if($Source != '0')
		{
			$this->db->where('IE.source' , $Source);
		}
		if($Tier_id != '0')
		{
			$this->db->where('IE.Tier_id' , $Tier_id);
		}
		if($Single_cust_membership_id != '0')
		{
			$this->db->where('IE.Card_id' , $Single_cust_membership_id);
		}
		$this->db->where('IE.User_id' , 1);
		// $this->db->where("joined_date BETWEEN '".$start_date."' AND '".$end_date."'");
		$this->db->order_by('IE.Enrollement_id' , 'desc');
		$this->db->group_by('IE.Enrollement_id');
		// if($limit != NULL || $start != ""){				
				// $this->db->limit($limit,$start);
		// }
		$sql51 = $this->db->get();
		  // echo "<br>".$this->db->last_query();die;
		if($sql51 -> num_rows() > 0)
		{
			
			//return $sql51->row();
			foreach ($sql51->result() as $row)
			{
				if($row->User_activated==1)
				{
				 $row->User_activated="Yes";
				}
				else
				{
				 $row->User_activated="No";
				} 
				if($row->Total_Purchase_Amount==0)
				{
				 $row->Total_Purchase_Amount="-";
				}
				else
				{
					$row->Total_Purchase_Amount = number_format(round($row->Total_Purchase_Amount),2); 
				}
				if($row->Total_Redeemed_Points==0)
				{
				 $row->Total_Redeemed_Points="-";
				}
				else
				{
					$row->Total_Redeemed_Points= (int)$row->Total_Redeemed_Points;
				}
				if($row->Total_Gained_Points==0)
				{
				 $row->Total_Gained_Points="-";
				}
				else
				{
					$row->Total_Gained_Points= round($row->Total_Gained_Points);
				}
				/* if($row->Total_balance_to_pay==0)
				{
				 $row->Total_balance_to_pay="-";
				} */				
				if($row->Enrolled_by != '0')
				{
					$user_details = $this->Igain_model->get_enrollment_details($row->Enrolled_by);						
					$row->Enrolled_by = $user_details->First_name.' '.$user_details->Last_name;
				}
				else
				{
					 $row->Enrolled_by="-";
				}
				if($row->Current_address=="")
				{
				 $row->Current_address="-";
				}
				else{
					$row->Current_address = App_string_decrypt($row->Current_address);
				}
				
				if($row->City=="")
				{
				 $row->City="-";
				}
				if($row->Source=="APK")
				{
				 $row->Source = "APP";
				}
				else
				{
					$row->Source = "Website";
				}
				/* if($row->District=="")
				{
				 $row->District="-";
				} */
				if($row->State=="")
				{
				 $row->State="-";
				}
				if($row->Phone_no=='0')
				{
				 $row->Phone_no="-";
				}
				else
				{
					$row->Phone_no = App_string_decrypt($row->Phone_no);
				}
				
				if($row->User_email_id != null)
				{
					$row->User_email_id = App_string_decrypt($row->User_email_id);
				}
				

				
				$row->Gift_card_purchase_amt=0;
				 $row->Gift_card_redeem_amt=0;
				 
				$result2 = $this->Report_model->Get_gift_card_trans($Company_id,$row->Membership_ID);
				if($result2 != NULL)
				{
					$row->Gift_card_purchase_amt= number_format(round($result2->PurchaseGC),2); 
					$row->Gift_card_redeem_amt= number_format(round($result2->redeemGC),2);
					
				}	 
				 $row->User_activate=$row->User_activated;
				 $row->Enroll_by=$row->Enrolled_by;
				$data[] = $row;
			}
			
			return $data; 
		}
		else
		{
		   return false;
		}
	}
	//-------------------------------AMIT 20-12-21 UNCLAIMED REPORT--------------------
	function get_uncliamed_points_report($Company_id, $start_date, $end_date, $transaction_from,$Outlet_id,$report_type,$Channel_id)
	{
		$start_date=date("Y-m-d 00:00:00", strtotime($start_date));
		$end_date=date("Y-m-d 23:59:59", strtotime($end_date));

		
		if($report_type == 1)
		{
			$this->db->select("Trans_date,B.Trans_type as Trans_NAME,Bill_no,CONCAT(e.First_name,' ',e.Last_name) as Outlet_name,Merchandize_item_name as Item_name,Quantity,Item_rate,(Item_rate * Quantity) as Purchase_amount");
			
			$this->db->from('igain_pos_transaction_temp as t'); 
			$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Outlet_id');
			$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = t.Trans_type');
			$this->db->join('igain_company_merchandise_catalogue as C', 'C.Company_merchandize_item_code = t.Item_code AND C.Company_id = t.Company_id');
			
			$this->db->where(array('t.Company_id' => $Company_id));
			if($transaction_from > 0){
				$this->db->where(array('t.Trans_type' => $transaction_from));
				if($transaction_from == 29){
				$this->db->where_in('t.Channel_id', $Channel_id);
				}
			}
			else
			{
				$this->db->where_in('t.Trans_type',array(2,12,29));
			}
			
			if($membership_id != ""){
				$this->db->where(array('t.Card_id' => $membership_id));
			}

			if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('t.Outlet_id',$Outlet_id);
			}

			
			$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

			
			$this->db->order_by('t.Trans_id','DESC');
			// $this->db->group_by("t.Bill_no");
			
				$query59 = $this->db->get()->result();
			// echo $this->db->last_query(); die;
			
				foreach($query59 as $row59)
				{
					$data59[] = $row59;
				}
				return $data59;
		}
		
		if($report_type == 2) // summary
		{
			$this->db->select("Trans_date,B.Trans_type as Trans_NAME,Bill_no,CONCAT(e.First_name,' ',e.Last_name) as Outlet_name,Bill_total,Pos_discount");
			
			$this->db->from('igain_pos_transaction_temp as t'); 
			$this->db->join('igain_enrollment_master as e', 'e.Enrollement_id = t.Outlet_id');
			$this->db->join('igain_transaction_type as B', 'B.Trans_type_id = t.Trans_type');
			
			$this->db->where(array('t.Company_id' => $Company_id));
			if($transaction_from > 0){
				$this->db->where(array('t.Trans_type' => $transaction_from));
				if($transaction_from == 29){
				$this->db->where_in('t.Channel_id', $Channel_id);
				}
			}
			else
			{
				$this->db->where_in('t.Trans_type',array(2,12,29));
			}
			
			if($membership_id != ""){
				$this->db->where(array('t.Card_id' => $membership_id));
			}

			if(count($Outlet_id) > 0 && $Outlet_id[0] > 0){
				$this->db->where_in('t.Outlet_id',$Outlet_id);
			}

			
			$this->db->where('t.Trans_date BETWEEN "'.$start_date.'" AND  "'.$end_date.'" ');

			
			$this->db->order_by('t.Trans_id','DESC');
			$this->db->group_by("t.Bill_no");
			
				$query59 = $this->db->get()->result();
			// echo $this->db->last_query(); die;
			
				foreach($query59 as $row59)
				{
					$data59[] = $row59;
				}
				return $data59;
		}
			
	}
	
}
?>