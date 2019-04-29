<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->model('Mhs_dashboard');
        $this->load->model('MDosen');
        $this->load->model('Mhs_sidang');
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $idLogin = $this->session->userdata('NRP');
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Dashboard | MONTA',
            'favicon'   => $site['favicon'],
            'site'      => $site,
            'dashboard' => $this->Mhs_sidang->index(),
            'dosen' => $this->MDosen->tampil()->result_array(),
            'sidang' => $this->Mhs_sidang->sidang($idLogin)
        );
        // var_dump($data);
        $this->template->load('layout/template', 'admin/tabelsidang', $data);
    }

    public function jadwal()
    {
        $id_login   = $this->session->userdata("NRP");
       
               $a = $this->input->post('penguji1');
               $b = $this->input->post('penguji2');
               $c = $this->input->post('tgl_sidang_ta');
               $d = $this->input->post('id');
               
               $objek = array(
                    'id_proposal' => $d,
                   'dospeng1' => $a,
                   'dospeng2' => $b,
                   'tanggal_sidang' => $c,
                    );
   
               $this->load->model('Mhs_sidang');
               if($id_sidang  ){
                  // $this->Mhs_sidang->insert_sidang($d, $objek,'tbl_sidang');
                  $this->Mhs_sidang->update_sidang($d,$objek,'tbl_sidang');
                  $this->session->set_flashdata('berhasil_simpan', 'sukses');
                   redirect(base_url('admin/home'));
                }else{
                    // $this->Mhs_sidang->update_sidang($d,$objek,'tbl_sidang');
                    $this->Mhs_sidang->insert_sidang($objek,'tbl_sidang');
                   $this->session->set_flashdata('berhasil_simpan', 'sukses');
                   redirect(base_url('admin/home'));
                }
               
   
               // if ($query) {
               // }
   
           
    }
}
