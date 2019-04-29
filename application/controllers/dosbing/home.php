<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "4") {
            redirect('', 'refresh');
        }
        $this->load->model('Dosbing_dashboard');
        $this->load->model('Mhs_dashboard');
        $this->load->model('Mhs_proposal');
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        if ($this->input->post('submit')) {
            $rmk = $this->input->post('rmk');
            if ($rmk == "ALL") {
                $data['dashboard'] = $this->Dosbing_dashboard->dashboard();
            }
            else{
                
                $data['dashboard'] = $this->Dosbing_dashboard->get_proposal_rmk($rmk);
            }
            $data['search'] = $rmk = $this->input->post('rmk');
        }
        else {
            $data['dashboard'] = $this->Dosbing_dashboard->dashboard();
            $data['search'] = "ALL";
        }

        // $data = array(
        //     'title'     => 'Dashboard | Sistem Informasi Monitoring',
        //     'favicon'   => $site['favicon'],
        //     'site'      => $site,
        //     'dashboard' => $this->Mhs_dashboard->dashboard()
        // );
        $this->template->load('layout/templatedosbing', 'dosbing/dashboard', $data);
    }

    public function get_proposal_result()
    {

            $proposalData = $this->input->post('proposalData');

            if(isset($proposalData) and !empty($proposalData)){
                $records = $this->Dosbing_dashboard->get_search_proposal($proposalData);
                $output = '';
                foreach($records->result_array() as $row){
                    $output .= '    
                        <table class="table">
                            <tr>
                                <td><b>ID Proposal</b></td>
                                <td>'.$row["id_proposal"].'</td>
                            </tr>
                            <tr>
                                <td><b>Nama</b></td>
                                <td>'.$row["nama_mhs"].'</td>                                   
                            </tr>                                   
                            <tr>
                                <td><b>NRP</b></td>
                                <td>'.$row["nrp"].'</td>                                    
                            </tr>   
                            <tr>
                                <td><b>RMK</b></td>
                                <td>'.$row["rmk"].'</td>                                    
                            </tr>
                            <tr>
                                <td><b>Judul</b></td>
                                <td>'.$row['judul_ta'].'</td>                                   
                            </tr>
                            <tr>
                                <td><b>Abstrak</b></td>
                                <td>'.$row['abstrak_ta'].'</td>                                 
                            </tr>                                       
                            <tr>
                                <td><b>Pembimbing 1</b></td>
                                <td>'.$row['pembimbing1_ta'].'</td>                                 
                            </tr>
                            <tr>
                                <td><b>Pembimbing 2</b></td>
                                <td>'.$row["pembimbing2_ta"].'</td>
                            </tr>                                                                       
                            <tr>
                                <td><b>Status</b></td>
                                <td>'.$row["status"].'</td>                                 
                            </tr>                                                       
                        </table>
                    ';

                }               
                echo $output;
            }
            else {
                echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';
            }
 
    }

     public function update()
    {
        $data=array(
            "status"=>$_POST['status']
        );
        $this->db->where('id_proposal', $_POST['id_proposal']);
        $this->db->update('tb_proposal',$data);
        $this->session->set_flashdata('berhasil_edit',"sukses");
        redirect(base_url('dosbing/home'));
    }    

    public function revisi()
    {
        $data=array(
            "revisi"=>$_POST['revisi']
        );
        $this->db->where('id_proposal', $_POST['id_proposal']);
        $this->db->update('tb_proposal',$data);
        $this->session->set_flashdata('berhasil_edit',"sukses");
        redirect(base_url('dosbing/home'));
    } 
}
