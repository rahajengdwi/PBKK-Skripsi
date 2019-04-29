<?php
class Mhs_dashboard extends CI_Model {

 public function dashboard()
 {
  $this->db->select('*'); 
  $query=$this->db->get('tb_proposal');
  return $query->result();
 }

 public function status($id)
 {
  $this->db->select('*');
  $this->db->where('id_user', $id);
  $query=$this->db->get('tb_proposal');
  return $query->result();
 }

 public function judul_mhs($id)
 {
  $this->db->select('*');
  $this->db->where('id_user', $id);
  $query=$this->db->get('tb_proposal');
  return $query->result();
 }

 public function get_search_proposal($proposal)
	{
		$this->db->select('*');
		$this->db->where('id_proposal',$proposal);
		$res2 = $this->db->get('tb_proposal');
		return $res2;
	}
 
  public function status_sidang($nrp)
 {
    $this->db->select('*');
  $this->db->from('tb_proposal');
   $this->db->where('nrp', $nrp);
  $this->db->join('tbl_sidang', 'tbl_sidang.id_proposal = tb_proposal.id_proposal', 'left');
  $query = $this->db->get(); 
  return $query->result();
 }

} 