<?php
Class Sms_Model extends CI_Model
{
	public function sms_count()
	{
		return $this->db->count_all("igain_sms_configuration");
	}
	
	public function sms_list($limit,$start,$Company_id)
	{
		//$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->order_by('SMS_configuration_id','desc');
		$this->db->from('igain_sms_configuration');
		$this->db->where('Company_id',$Company_id);
		//$this->db->where('Trigger_notification_type',5);
		
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
		
	public function insert_sms_configuration($Logged_user_id,$Company_id)
	{
		
		$today = date("Y-m-d");		
		$insertData = array(
		'Provider_name' => $this->input->post('Provider_name'),
		'Company_id' => $Company_id,
		'SMS_main_url' => $this->input->post('SMS_main_url'),
		'Parameter1' => $this->input->post('Parameter1'),
		'Parameter2' => $this->input->post('Parameter2'),
		'Parameter3' => $this->input->post('Parameter3'),
		'Parameter4' => $this->input->post('Parameter4'),
		'Parameter5' => $this->input->post('Parameter5'),
		'Parameter6' => $this->input->post('Parameter6'),
		'Created_user_id' => $Logged_user_id,
		'Creation_date' => $today
		);
		
		$this->db->insert("igain_sms_configuration",$insertData);
		
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		
		return false;
		
	}
	
	public function edit_SMS_configuration($SMS_configuration_id,$Company_id)
	{
		$this->db->select('*');
		$this->db->from('igain_sms_configuration');
		$this->db->where(array('SMS_configuration_id' => $SMS_configuration_id,'Company_id' => $Company_id));
		
        $query10 = $this->db->get();

        if ($query10->num_rows() > 0)
		{
        	return $query10->row();
        }
        return false;
	}
	
	
	public function Update_SMS_configuration($Logged_user_id,$SMS_configuration_id,$Company_id)
	{
		$today = date("Y-m-d");		
		$UpdateData = array(
		'Provider_name' => $this->input->post('Provider_name'),
		'SMS_main_url' => $this->input->post('SMS_main_url'),
		'Parameter1' => $this->input->post('Parameter1'),
		'Parameter2' => $this->input->post('Parameter2'),
		'Parameter3' => $this->input->post('Parameter3'),
		'Parameter4' => $this->input->post('Parameter4'),
		'Parameter5' => $this->input->post('Parameter5'),
		'Parameter6' => $this->input->post('Parameter6'),
		'Created_user_id' => $Logged_user_id,
		'Creation_date' => $today
		);
		
		$this->db->where(array('SMS_configuration_id' =>$SMS_configuration_id,'Company_id' =>$Company_id));
		$this->db->update("igain_sms_configuration",$UpdateData);
		
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		
		return false;
	}
	
	
	public function delete_SMS_configuration($SMS_configuration_id,$Company_id)
	{
		$this->db->where(array('SMS_configuration_id' =>$SMS_configuration_id,'Company_id' =>$Company_id));
		$this->db->delete("igain_sms_configuration");
		
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		return false;
	}
	public function activate_sms($Logged_user_id,$Company_id, $SMS_configuration_id)
	{
		$today = date("Y-m-d");		
		$UpdateData = array(
		
			'Active_flag' =>1,
			'Created_user_id' => $Logged_user_id,
			'Creation_date' => $today
		);		
		$this->db->where(array('SMS_configuration_id' =>$SMS_configuration_id));
		$this->db->update("igain_sms_configuration",$UpdateData);
		// echo $this->db->last_query();	
		if($this->db->affected_rows() > 0)
		{
			
			
			$today = date("Y-m-d");		
			$UpdateData = array(
			
				'Active_flag' =>0,
				'Created_user_id' => $Logged_user_id,
				'Creation_date' => $today
			);		
			$this->db->where(array('SMS_configuration_id != ' =>$SMS_configuration_id));
			$this->db->update("igain_sms_configuration",$UpdateData);
			
			if($this->db->affected_rows() > 0){
				
				return true;
			}
		}
		
		return false;
	}
	
	
	
}
?>
