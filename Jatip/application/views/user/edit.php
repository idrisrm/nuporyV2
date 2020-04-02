<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Admin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
						</div>
						<div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" id="foto" name="foto" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label><br>
                            <input type="password" id="password" name="password" class="form-control" required> 
						</div>
						<div class="form-group">
                            <label for="level">Sebagai</label><br>
                            <input type="number" id="level" name="level" class="form-control" required> 
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