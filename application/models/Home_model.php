<?php 

/**
 * HOME MODEL
 */
class Home_model extends CI_Model {
	
	public function getUser($ue, $up){
		$this->db->where('ue', $ue);
		$this->db->where('up', $up);
		$res = $this->db->get('users');
		if ($res->num_rows() == 1) {
			return $res->row();
		} else {
			return false;
		}
	}

	public function setUser($data){
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	public function getMsg(){
		$this->db->select('message.*');
		$this->db->select('users.un');
		$this->db->from('message');
		$this->db->join('users', 'users.id = message.uid', 'inner');		
		$this->db->order_by('message.id', 'desc');
		$res = $this->db->get();
		return $res->result();
	}

	public function getLastMsg($lid){
		$sql = '
			SELECT
			    message.*,
			    users.un
			FROM
			    message
			INNER JOIN users ON users.id = message.uid
			WHERE message.id > ' . $lid .'
			ORDER BY 
				message.id
		';
		$res = $this->db->query($sql);
		return $res->result();

	}

	public function setMsg($data){
		$this->db->insert('message', $data);
		return $this->db->insert_id();
	}


}