<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
        $this->load->model('Mhs_dashboard');
        $this->load->model('Mhs_proposal');
        $this->load->model('MDosen');
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Dashboard | Sistem Informasi Monitoring',
            'favicon'   => $site['favicon'],
            'site'      => $site,
            'dashboard' => $this->Mhs_dashboard->dashboard()
        );
        $this->template->load('layout/templatemhs', 'member/dashboard', $data);
    }
    public function judul()
    {
        $id_login   = $this->session->userdata("id");
        $data = array(
            
            'dosen' => $this->MDosen->tampil()->result_array(),
            'judul' => $this->Mhs_dashboard->judul_mhs($id_login),
        );
        if ($this->input->post('submit')) {
   
               $a = $this->input->post('nama_mhs');
               $e = $this->input->post('nrp');
               $j = $this->input->post('rmk');
               $c = $this->input->post('judul_ta');
               $b = $this->input->post('abstrak_ta');
               $f = $this->input->post('pembimbing1');
               
               $val1 = explode('+', $f);
               $dosen1 = $val1[0];
               $nip1 = $val1[1]; 
               
               date_default_timezone_set('Asia/Jakarta');
               $date = date('Y-m-d H:i:s');
               $objek = array(
                    'id_user' => $id_login,
                   'nama_mhs' => $a,
                   'nrp' => $e,
                   'rmk' => $j,
                   'judul_ta' => $c,
                   'abstrak_ta' => $b,
                   'pembimbing1_ta' => $dosen1,
                   'nip1' => $nip1,
                   'status' => 'Mengusulkan judul',
                   'created_at' => $date,
                   'updated_at' => $date
                    );
   
               $query = $this->Mhs_proposal->judul($objek);
   
               if ($query) {
                   $this->session->set_flashdata('berhasil_simpan', 'sukses');
                   redirect(base_url('member/home/judul'));
               }
   
           }
           else
           {
              $this->template->load('layout/templatemhs', 'member/judul', $data);    
           }

        
    }

    public function proposal()
    {
        $id_login   = $this->session->userdata("id");
        
        $data = array(
            
             'dosen' => $this->MDosen->tampil()->result_array(),
            //'proposal' => $this->Mhs_proposal->proposal()

        );
        if ($this->input->post('submit')) {
   
               $a = $this->input->post('nama_mhs');
               $e = $this->input->post('nrp');
               $j = $this->input->post('rmk');
               $c = $this->input->post('judul_ta');
               $s = $this->input->post('abstrak_ta');
               $f = $this->input->post('pembimbing1');
               $b = $this->input->post('proposal_ta');
               $val1 = explode('+', $f);
               $dosen1 = $val1[0];
               $nip1 = $val1[1];
               $d = $this->input->post('pembimbing2');
               $val2 = explode('+', $d);
               $dosen2 = $val2[0];
               $nip2 = $val2[1]; 
               
               date_default_timezone_set('Asia/Jakarta');
               $date = date('Y-m-d H:i:s');
               $objek = array(
                   'nama_mhs' => $a,
                   'nrp' => $e,
                   'rmk' => $j,
                   'judul_ta' => $c,
                   'abstrak_ta' => $s,
                   'pembimbing1_ta' => $dosen1,
                   'nip1' => $nip1,
                   'pembimbing2_ta' => $dosen2,
                   'nip2' => $nip2,
                   'status' => 'Mengusulkan proposal',
                   'proposal_ta' => $b,
                   'updated_at' => $date
                    );
                $this->db->where('id_user', $id_login);
               $query = $this->db->update('tb_proposal', $objek);
   
               if ($query) {
                   $this->session->set_flashdata('berhasil_simpan', 'sukses');
                   redirect(base_url('member/home/proposal'));
               }
   
           }
           else
           {
            $this->template->load('layout/templatemhs', 'member/proposal', $data);
           }
        
    }

    public function status()
    {
        $id_login   = $this->session->userdata("id");

        $data = array(
            'status' => $this->Mhs_dashboard->status($id_login)
        );
        $this->template->load('layout/templatemhs', 'member/status', $data);
    }

    public function daftar()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Dashboard | Sistem Informasi Monitoring',
            'favicon'   => $site['favicon'],
            'site'      => $site,
            'dashboard' => $this->Mhs_dashboard->dashboard()
        );
        $this->template->load('layout/templatemhs', 'member/daftar', $data);
    }
}
 