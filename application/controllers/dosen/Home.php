<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "3") {
            redirect('', 'refresh');
        }
        $this->load->model('Mhs_dashboard');
        $this->load->model('Mhs_proposal');
        $this->load->model('MDosen');
        $this->load->helper(array('url','download'));
    
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        if ($this->input->post('submit')) {
            $rmk = $this->input->post('rmk');
            if ($rmk == "ALL") {
                $data['dashboard'] = $this->Mhs_dashboard->dashboard();
            }
            else{
                
                $data['dashboard'] = $this->Mhs_proposal->get_proposal_rmk($rmk);
            }
            $data['search'] = $rmk = $this->input->post('rmk');
        }
        else {
            $data['dashboard'] = $this->Mhs_dashboard->dashboard();
            $data['search'] = "ALL";
        }

        // $data = array(
        //     'title'     => 'Dashboard | Sistem Informasi Monitoring',
        //     'favicon'   => $site['favicon'],
        //     'site'      => $site,
        //     'dashboard' => $this->Mhs_dashboard->dashboard()
        // );
        $this->template->load('layout/templatedsn', 'dosen/daftar', $data);
    }

    public function update()
    {
        $data=array(
            "status"=>$_POST['status']
        );
        $this->db->where('id_proposal', $_POST['id_proposal']);
        $this->db->update('tb_proposal',$data);
        $this->session->set_flashdata('berhasil_edit',"sukses");
        redirect(base_url('dosen/home'));
    }    

    public function revisi()
    {
        $data=array(
            "revisi"=>$_POST['revisi']
        );
        $this->db->where('id_proposal', $_POST['id_proposal']);
        $this->db->update('tb_proposal',$data);
        $this->session->set_flashdata('berhasil_edit',"sukses");
        redirect(base_url('dosen/home'));
    } 

    public function download()
    {
        /*$pdf = 'file/'.$file;
        force_download($pdf, NULL);*/
        force_download('assets/ta/segmentasi citra digital.pdf',NULL);
    }
}
