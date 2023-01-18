<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data User</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href=".">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="?pg=user">Data User</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
					<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
					<!-- Modal Area -->
					<!-- Modal Import -->
				    <div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				        <div class="modal-dialog" role="document">
				            <div class="modal-content">
				                <form id="form-import">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Import Data</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label for="file">Import File Excel</label>
				                            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
				                            <small id="helpfile" class="form-text text-muted">File harus .xlx</small>
				                        </div>
				                        <a href="template_excel/importsekolah.xls">Download template Excel</a>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				                        <button type="submit" class="btn btn-dark">Save</button>
				                    </div>
				                </form>
				            </div>
				        </div>
				    </div>

				    <!-- Modal Tambah -->
				    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				        <div class="modal-dialog" role="document">
				            <div class="modal-content">
				                <form id="form-tambah" enctype='multipart/form-data'>
				                    <div class="modal-header">
				                        <h5 class="modal-title">Tambah Data User</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label>Nama</label>
				                            <input type="text" name="nama" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>Email</label>
				                            <input type="email" name="email" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Username</label>
				                            <input type="text" name="username" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Password</label>
				                            <input type="password" name="password" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Phone</label>
				                            <input type="text" name="phone" class="form-control" required="">
				                        </div>
										<div class="form-group">
				                            <label>Roles</label>
				                            <!-- <input type="text" name="Roles" class="form-control" required=""> -->
											<select name="Roles" id="" class="form-control" required=''>
												<option value="Admin">Admin</option>
												<option value="AM">AM</option>
												<option value="Office">Office</option>
											</select>
				                        </div>
										<div class="form-group">
										<label >Photo</label>
				                            <!-- <input type="text" name="photo" class="form-control" required=""> -->
										<div class="custom-file">
											<input type="file" name="profile" class="custom-file-input" id="customFile">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
				                        </div>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				                        <button type="submit" class="btn btn-dark">Save</button>
				                    </div>
				                </form>
				            </div>
				        </div>
				    </div>
					<!-- End Modal Area -->
				</div>
				<div class="card-body">
					<!-- Tabel Start -->
					<div class="table-responsive">
						<table id="basic-datatables1" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th><input type='checkbox' id='ceksemua'></th>
									<th>#</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Username</th>
									<th>Phone</th>
									<th>Roles</th>
									<th>Photo</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
		                            $query = mysqli_query($koneksi, "select * from tb_user");
		                            $no = 0;
		                            while ($user = mysqli_fetch_array($query)) {
		                                $no++;
		                            ?>
								<tr>
									<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $user['id_user'] ?>"></td>
									<td><?= $no; ?></td>
									<td><?= $user['nama'] ?></td>
									<td><?= $user['email'] ?></td>
									<td><?= $user['username'] ?></td>
									<td><?= $user['phone'] ?></td>
									<td><?= $user['Roles'] ?></td>
									<td><img src="../assets/uploaded/profile/<?= $user['photo'] ?>" alt="Profile" class="img-thumbnail" width="100px"></td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($user['id_user']) ?>"><i class="fas fa-info-circle"></i></button>
										<!-- Modal Here -->
										<div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($user['id_user']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-detail">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Siswa <b><?= $user['nama'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
									                            <label>Nama</label>
									                            <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>Email</label>
									                            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>"readonly>
									                        </div>
															<div class="form-group">
									                            <label>Username</label>
									                            <input type="email" name="username" class="form-control" value="<?= $user['username'] ?>"readonly>
									                        </div>
															
									                        <div class="form-group">
									                            <label>Phone</label>
									                            <input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>Roles</label>
									                            <input type="text" name="Roles" class="form-control" value="<?= $user['Roles'] ?>"readonly>
									                        </div>
															<div class="form-group align-items-center">
																<label class="form-control-label">Photo</label>
																<div>
																	<img src="../assets/img/uploaded/profile/<?= $user['photo'] ?>" class="img-thumbnail" width="500">
																</div>
															</div>
									                    </div>
									                    <div class="modal-footer">
									                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
										<!-- Modal End -->
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- End -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Script -->
<script>
	// Custom File Value
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	$('#ceksemua').change(function() {
        $(this).parents('#basic-datatables:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });
    $(function() {
        $("#btnhapus").click(function() {
            id_array = new Array();
            i = 0;
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
            $.ajax({
                url: "mod_user/crud_user.php?pg=hapusdaftar",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
                        })
                    }
                }
            });
            return false;
        })
    });
	$('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_user/crud_user.php?pg=tambah_aja',
			data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                if (data == 'OK') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil ditambahkan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#tambahdata').modal('hide');
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal ditambahkan',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    //IMPORT FILE PENDUKUNG 
    $('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_user/crud_user.php?pg=import',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                $('#importdata').modal('hide');
                iziToast.success({
                    title: 'Mantap!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>
<!-- End -->