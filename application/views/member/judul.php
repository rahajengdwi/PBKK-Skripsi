<?php
    $id_login   = $this->session->userdata("id");
    $datalogin  = $this->db->get_where("tbl_user", array('id'=> $id_login))->row();
 ?>

 <?php if ($this->session->flashdata('berhasil_simpan')) { ?>
  <?php $this->load->view('alert/berhasil_simpan'); ?>
 <?php } ?>

 <?php if ($this->session->flashdata('berhasil_edit')) { ?>
  <?php $this->load->view('alert/berhasil_edit'); ?>
 <?php } ?>

 <?php if ($this->session->flashdata('berhasil_hapus')) { ?>
  <?php $this->load->view('alert/berhasil_hapus'); ?>
 <?php } ?>

 <?php if ($this->session->flashdata('gagal_cari')) { ?>
  <?php $this->load->view('alert/gagal_cari'); ?>
 <?php } ?>

<div class="container">
		    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <?php
                if(empty($judul)) { ?>
            <div class="panel-heading">
                <div class="panel-title">Form Pengajuan Judul</div>
            </div>  
            <div class="panel-body" >
                
                <?php echo form_open('member/home/judul'); ?>
                    <!-- <form  class="form-horizontal" method="post" > -->
                       <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Nama<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 ">
                                <input type="text" name="nama_mhs" class="input-md emailinput form-control" value="<?php echo $datalogin->first_name; ?>" style="margin-bottom: 10px" readonly autofocus>
                            </div>
                        </div>
                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> NRP<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md form-control" id="id_judul" name="nrp" placeholder="NRP" style="margin-bottom: 10px" type="text" />
                            </div>     
                        </div>
                         <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> RMK<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 "style="margin-bottom: 10px"> 
                                <select name="rmk" class="input-md emailinput form-control" required="">
                                  <option>Pilih RMK</option>
                                  <option value="RPL">RPL</option>
                                  <option value="KBJ">KBJ</option>
                                  <option value="KCV">KCV</option>
                                  <option value="AJK">AJK</option>
                                  <option value="IGS">IGS</option>
                                  <option value="AP">AP</option>
                                  <option value="MI">MI</option>
                                  <option value="DTK">DTK</option>
                                </select>
                            </div>     
                        </div>
                        <br>
                         <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> Judul<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md form-control" id="id_judul" name="judul_ta" placeholder="Judul" style="margin-bottom: 10px" type="text" />
                            </div>     
                        </div>
                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> Abstrak<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 ">
                                <textarea class="input-md form-control" rows=10 id="id_judul" name="abstrak_ta" placeholder="Abstrak" style="margin-bottom: 10px" type="text" /></textarea>
                            </div>     
                        </div>
                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> Dosen Pembimbing 1<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 ">
                                <select name="pembimbing1" class="form-control" required="">
                                  <option>Pilih Dosen Pembimbing</option>
                                  <?php  foreach ($dosen as $value) : ?>
                                  <option value="<?php echo $value['nama_dosen']."+".$value['nip']; ?>"><?php echo "--  "  .$value['nama_dosen']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                                
                        </div>                        
                        <div class="form-group"> 
                            
                            <div class="controls col-md-8">
                                <input type="submit" name="submit" value="Simpan" class="btn btn-primary btn btn-info" id="submit-id-simpan" />
                            </div>
                        </div> 
                            
                    <!-- </form> -->
                    <?php echo form_close(); }
                    else {?>
                        <h3 style="text-align: center;">Mahasiswa telah mengajukan judul</h3>
                    <?php } ?>

            </div>
        </div>
    </div>
</div>
