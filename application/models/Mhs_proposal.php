<?php
class Mhs_proposal extends CI_Model {


  public function judul($data)
 {
 	return $this->db->insert('tb_proposal', $data);

 }

 public function proposal()
 {
  return $this->db->update('tb_proposal', $data);
 }

 public function sidang()
 {
  return $this->db->insert('tb_proposal', $data);
 }
 
 public function get_proposal_rmk($rmk)
 {
	$this->db->select('*');
	$this->db->where('rmk',$rmk);
	$query = $this->db->get('tb_proposal');
	return $query->result();
 }

}