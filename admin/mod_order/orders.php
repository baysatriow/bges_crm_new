<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Order</h4>
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
				<a href="?pg=siswa">Data Order</a>
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
				                <form id="form-tambah">
				                    <div class="modal-header">
				                        <h5 class="modal-title">Tambah Data Sekolah</h5>
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
				                            <label>NIS</label>
				                            <input type="number" name="nis" class="form-control" required="">
				                        </div>
				                        <div class="form-group">
				                            <label>NIK</label>
				                            <input type="number" name="nik" class="form-control">
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
									<th>Tanggal Input</th>
									<th>Segmen</th>
									<th>Nama AM</th>
									<th>Nama Pelanggan</th>
									<th>Layanan</th>
									<th>Harga OTC</th>
									<th>Harga Monthly</th>
									<th>Status Layanan</th>
									<th>Customer Account</th>
									<th>Customer Account Site</th>
									<th>Customer Account Nipnas</th>
									<th>Billing Account</th>
									<th>Billing Account Site</th>
									<th>Nomor Quote</th>
									<th>Nomor Aggrement</th>
									<th>Nomor Order</th>
									<th>Status Order</th>
									<th>Date Prov Contrac</th>
									<th>Date End Contract</th>
									<th>No Order Lama</th>
									<th>Sid</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
		                            $query = mysqli_query($koneksi, "SELECT * FROM tb_order INNER JOIN tb_pelanggan ON tb_order.no_order=tb_pelanggan.nomor_order INNER JOIN tb_am ON tb_order.nama_am=tb_am.nama_am ");
		                            $no = 0;
		                            while ($order = mysqli_fetch_array($query)) {
		                                $no++;
		                            ?>
								<tr>
									<td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $order['id_order'] ?>"></td>
									<td><?= $no; ?></td>
									<td><?= $order['tgl_input'] ?></td>
									<td><?= $order['segmen'] ?></td>
									<td><?= $order['nama_am'] ?></td>
									<td><?= $order['nama_pel'] ?></td>
									<td><?= $order['layanan'] ?></td>
									<td><?= $order['hrg_otc'] ?></td>
									<td><?= $order['hrg_mountly'] ?></td>
									<td><?= $order['status_lyn'] ?></td>
									<td><?= $order['ca'] ?></td>
									<td><?= $order['ca_site'] ?></td>
									<td><?= $order['ca_nipnas'] ?></td>
									<td><?= $order['ba'] ?></td>
									<td><?= $order['ba_site'] ?></td>
									<td><?= $order['nomor_quote'] ?></td>
									<td><?= $order['nomor_aggre'] ?></td>
									<td><?= $order['nomor_order'] ?></td>
									<td><?= $order['status_order'] ?></td>
									<td><?= $order['date_prov'] ?></td>
									<td><?= $order['date_end'] ?></td>
									<td><?= $order['order_lama'] ?></td>
									<td><?= $order['sid'] ?></td>
									<td><?= $order['ket'] ?></td>  
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail&id=<?= enkripsi($order['id_order']) ?>"><i class="fas fa-info-circle"></i></button>
										<!-- Modal Here -->
										<div class="modal fade bd-example-modal-lg" id="detail&id=<?= enkripsi($order['id_order']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
									        <div class="modal-dialog" role="document">
									            <div class="modal-content">
									            	<!-- Desc -->
									            	
									                <form id="form-detail">
									                    <div class="modal-header">
									                        <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Siswa <b><?= $order['nama'] ?></b></h5>
									                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                            <span aria-hidden="true">&times;</span>
									                        </button>
									                    </div>
									                    <div class="modal-body">
									                        <div class="form-group">
									                            <label>Nama</label>
									                            <input type="text" name="nama" class="form-control" value="<?= $order['nama'] ?>" readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>NIS</label>
									                            <input type="number" name="nis" class="form-control" value="<?= $order['nis'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>NISN</label>
									                            <input type="number" name="nis" class="form-control" value="<?= $order['nisn'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>NIK</label>
									                            <input type="number" name="nik" class="form-control" value="<?= $order['nik'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>KELAS</label>
									                            <input type="text" name="nik" class="form-control" value="<?= $order['kelas'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>JURUSAN</label>
									                            <input type="text" name="nik" class="form-control" value="<?= $order['jurusan'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>TEMPAT LAHIR</label>
									                            <input type="text" name="nik" class="form-control" value="<?= $order['tempat_lahir'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>TGL. LAHIR</label>
									                            <input type="text" name="nik" class="form-control" value="<?= $order['tgl_lahir'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>AGAMA</label>
									                            <input type="text" name="nik" class="form-control" value="<?= $order['agama'] ?>"readonly>
									                        </div>
									                        <div class="form-group">
									                            <label>ALAMAT</label>
									                            <input type="text" name="nik" class="form-control" value="<?= $order['alamat'] ?>"readonly>
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
                url: "mod_siswa/crud_siswa.php?pg=hapusdaftar",
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
	$('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_siswa/crud_siswa.php?pg=tambah',
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
            url: 'mod_siswa/crud_siswa.php?pg=import',
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