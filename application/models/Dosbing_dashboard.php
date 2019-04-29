<?php
class Dosbing_dashboard extends CI_Model {

 public function dashboard()
 {
  $this->db->select('*'); 
  $query=$this->db->get_where('tb_proposal', array('status' => 'Mengusulkan judul'));
  return $query->result();
 }

 public function get_search_proposal($proposal)
	{
		$this->db->select('*');
		$this->db->where('id_proposal',$proposal);
		$res2 = $this->db->get_where('tb_proposal', array('status' => 'Mengusulkan judul'));
		return $res2;
	}

 public function get_proposal_rmk($rmk)
	{
		$this->db->select('*');
		$this->db->where('rmk',$rmk);
	    $query = $this->db->get_where('tb_proposal', array('status' => 'Mengusulkan judul'));
	    return $query->result();

	}

}