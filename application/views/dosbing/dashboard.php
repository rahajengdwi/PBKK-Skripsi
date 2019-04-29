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
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						            <h2 style="color: #000; font-size: 25px; font-weight: bold; text-decoration: underline;">Daftar Judul Tugas Akhir</b></h2>
					         </div>
                   <?php echo form_open(base_url('dosbing/home'), 'class="form-horizontal"' ); ?>
                  <br><br><br><br>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label class="col-sm-2">RMK</label>
                        </div>
                        <div class="col-sm-6">
                          <select name="rmk" class="form-control" required="">
                            <option value="<?php echo $search; ?>"> -- <?php echo $search; ?> -- </option>
                            <option value="ALL">ALL</option>
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
                        <div class="col-sm-1">
                        <input type="submit" value="Tampil" name="submit" class="btn btn-success">
                        </div>
                      </div>
                    </div>
                  </div>
                <?php echo form_close(); ?> 
                </div>
            </div>
            <div class="row">
            <div class="col-sm-11">
            <table id="dataTable" class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                    	<th><center>No</center></th>
                      <th><center>RMK</center></th>
                      <th><center>Status</center></th>
                      <th><center>Nama</center></th>
                      <th><center>Judul TA</center></th>
                      <th><center>Detil Revisi</center></th>
                      <th><center>Ubah Status</center></th>
                      <th><center>Revisi</center></th>
                    </tr>
                </thead>
                <tbody>
                	<?php $no=1; foreach ($dashboard as $key) { ?>
                	<tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->rmk ?></td>
                        <td><?php echo $key->status ?></td>
                        <td><?php echo $key->nama_mhs ?></td>
                        <td><?php echo $key->judul_ta ?></td>
                        <td> <CENTER>
                          <?php 
                          if ($key->revisi == NULL)
                            echo "-";
                          else
                           echo $key->revisi;
                          ?> </CENTER>
                        </td>
            						<td>
            									<center>
            										<a data-toggle="modal" data-target="#modal-edit<?=$key->id_proposal;?>" class="btn btn-success btn-circle" data-popup="tooltip" data-placement="top" title="Edit Status"><i class="fa fa-pencil"></i></a>
            									</center>
								        </td>
        								<td>
        									<center>
        										<a data-toggle="modal" data-target="#modal-revisi<?=$key->id_proposal;?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Revisi"><i class="fa fa-edit"></i></a>
        									</center>
        								</td>
		              </tr> 
		              <?php $no++; }  ?>   
                </tbody>
            </table>
          </div>
        </div>
        </div>
    </div>


<?php $no=0; foreach($dashboard as $key): $no++; ?>
<div class="row">
  <div id="modal-edit<?=$key->id_proposal;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('dosbing/home/update'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Status Tugas Akhir</h4>
        </div>
        <div class="modal-body">

          <input type="hidden" readonly value="<?=$key->id_proposal;?>" name="id_proposal" class="form-control" >

          <div class="form-group">
            <label class='col-md-3'>Status</label>
            <div class='col-md-9'>
						<select name="status" class="form-control" required="">
							<option value="<?php echo $key->status; ?>"> -- <?php echo $key->status; ?> -- </option>
							<option value="Pengajuan Judul OK">Pengajuan Judul OK</option>
							<option value="Revisi Pengajuan Judul">Revisi Pengajuan Judul</option>
							<option value="Pengajuan Judul Ditolak">Pengajuan Judul Ditolak</option>
						</select>
						</div>
          </div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"><i class="icon-pencil5"></i> Update</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php $no=0; foreach($dashboard as $key): $no++; ?>
<div class="row">
  <div id="modal-revisi<?=$key->id_proposal;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('dosbing/home/revisi'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Revisi Judul Tugas Akhir</h4>
        </div>
        <div class="modal-body">

          <input type="hidden" readonly value="<?=$key->id_proposal;?>" name="id_proposal" class="form-control" >

          <div class="form-group">
            <label class='col-md-3'>Revisi</label>
            <div class='col-md-9'>
						<input type="text" name="revisi" class="form-control" >
						</div>
          </div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"><i class="icon-pencil5"></i> Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>