<div class="container">
	
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2 style="color: #000; font-size: 25px; font-weight: bold; text-decoration: underline;">Daftar Tugas Akhir</b></h2>
					</div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-11">
            <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                    	<th>No</th>
                    	<th>Status</th>
                        <th>RMK</th>
						<th>Nama</th>
                        <th>NRP</th>
                        <th>Judul TA</th>
                        <th>Dosen Pembimbing 1</th>
                        <th>Dosen Pembimbing 2</th>
                        <th>Dosen Penguji 1</th>
                        <th>Dosen Penguji 2</th>
                        <th>Tanggal Sidang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $no=1; foreach ($dashboard as $key) { ?>
                		<tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->status ?></td>
                        <td><?php echo $key->rmk ?></td>
                        <td><?php echo $key->nama_mhs ?></td>
                        <td><?php echo $key->nrp ?></td>
                        <td><?php echo $key->judul_ta ?></td>
                        <td><?php echo $key->pembimbing1_ta ?></td>
                        <td><?php echo $key->pembimbing2_ta ?></td>
						<td><?php echo $key->dospeng1 ?></td>
                        <td><?php echo $key->dospeng2 ?></td>
                        <td><?php echo $key->tanggal_sidang ?></td>
                        <td>
										<center>
											<a data-toggle="modal" data-target="#modal-edit<?=$key->id_proposal;?>" class="btn btn-success btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
										</center>
						</td>
                    </tr>
                	<?php $no++; }  ?>

                    
                </tbody>
            </table>
			
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

<?php $no=0; foreach($dashboard as $row): ?>
<div class="row">
  <div id="modal-edit<?=$row->id_proposal;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo base_url('admin/home/jadwal'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sidang Tugas Akhir</h4>
        </div>
        <div class="modal-body">

          <input type="hidden" readonly value="<?php echo $row->id_proposal; ?>" name="id" class="form-control" >

          <div class="form-group">
            <label class='col-md-4'>Dosen Penguji 1</label>
            <div class='col-md-8'>
						<select name="penguji1" class="form-control" required="">
							<option>--Dosen Penguji--</option>
							<?php  foreach ($dosen as $dos) : ?>
							<option value="<?php echo $dos['nama_dosen']; ?>"><?php echo "--  "  .$dos['nama_dosen']; ?></option>
							<?php endforeach; ?>
						</select>
						</div>
          </div>

          <br><br>
					<div class="form-group">
            <label class='col-md-4'>Dosen Penguji 2</label>
            <div class='col-md-8'>
						<select name="penguji2" class="form-control" required="">
							<option>--Dosen Penguji--</option>
							<?php  foreach ($dosen as $value) : ?>
							<option value="<?php echo $value['nama_dosen']; ?>"><?php echo "--  "  .$value['nama_dosen']; ?></option>
							<?php endforeach; ?>
						</select>
						</div>
          </div>
					<br><br>
					<div class="form-group">
            <label class='col-md-4'>Tanggal Sidang TA</label>
            <div class='col-md-8'>
							<div class="form-group">
									<div class='input-group date' id='datetimepicker1'>
											
												<input type='date' name="tgl_sidang_ta" class="form-control" />
											
											<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
											</span>
									</div>
							</div>
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
<?php $no++; endforeach;?>