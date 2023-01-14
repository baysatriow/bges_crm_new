<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Account Manager</h4>
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
				<a href="?pg=siswa">Data Account Manager</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<?php 
					if($user['level'] == "admin"){
					?>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#importdata"><i class="fas fa-upload"></i> Import</button>
					<button class="btn btn-dark btn-xs" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-square"></i> Tambah</button>
					<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
					<?php } ?>
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
				                <form id="form-tambah">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Tambah Data AM</h5>
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            <span aria-hidden="true">&times;</span>
				                        </button>
				                    </div>
				                    <div class="modal-body">
				                        <div class="form-group">
				                            <label>Nama AM</label>
				                            <input type="text" name="nama_am" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>NIK</label>
				                            <input type="number" name="nik" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>Segmen</label>
											<!-- <select name="segmen" id="" class="form-control" required=''>
												<option value="DBS">DBS</option>
												<option value="DGS">DGS</option>
												<option value="DES">DES</option>
											</select> -->
				                            <input type="text" name="segmen" class="form-control">
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
						<table id="basic-datatables" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th><input type='checkbox' id='ceksemua'></th>
									<th>#</th>
									<th>Nama AM</th>
									<th>NIK</th>
									<th>Segmen</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
		                            $query = mysqli_query($koneksi, "select * from tb_am");
		                            $no = 0;
		                            while ($am = mysqli_fetch_array($query)) {
		                                $no++;
		                            ?>
								<tr>
									<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $am['id_am'] ?>"></td>
									<td><?= $no; ?></td>
									<td><?= $am['nama_am'] ?></td>
									<td><?= $am['nik'] ?></td>
									<td><?= $am['segmen'] ?></td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($am['id_am']) ?>"><i class="fas fa-info-circle"></i></button>
										<button type="button" id="btnedit" class="btn btn-warning btn-xs"><i class="fas fa-trash    "></i> Edit</button>
										<button type="button" id="btnhapus" class="btn btn-dark btn-xs"><i class="fas fa-trash    "></i> Hapus</button>
										<!-- Modal Here -->
										<div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($am['id_am']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-detail">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail AM <b><?= $am['nama_am'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
									                            <label>Nama</label>
									                            <input type="text" name="nama_am" class="form-control" value="<?= $am['nama_am'] ?>" readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>NIK</label>
									                            <input type="number" name="nik" class="form-control" value="<?= $am['nik'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>Segmen</label>
									                            <input type="text" name="segmen" class="form-control" value="<?= $am['segmen'] ?>"readonly>
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
                url: "mod_am/crud_am.php?pg=hapusdaftar",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
					
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
                        })
                    }setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
            return false;
        })
    });
	$('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_am/crud_am.php?pg=tambah',
            data: $(this).serialize(),
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
            url: 'mod_am/crud_am.php?pg=import',
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