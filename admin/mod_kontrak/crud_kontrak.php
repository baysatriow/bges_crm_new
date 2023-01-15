<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/function_sekolah.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_sekolah' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'status' => $status
    ];
    $npsn = $_POST['npsn'];
    $exec = update($koneksi, 'sekolah', $data, ['npsn' => $npsn]);
    echo $exec;
}
if ($pg == 'tambah') {
    $data = [
        'no_order'      => $_POST['no_order'],
        'kb'            => $_POST['kb'],
        'ba_ren'        => $_POST['ba_ren'],
        'ba_do'         => $_POST['ba_do'],
        'baso'          => $_POST['baso'],
        'ba_pen'        => $_POST['ba_pen'],
        'po'            => $_POST['po'],
        'kl'            => $_POST['kl'],
        'sph'           => $_POST['sph'],
        'skm'           => $_POST['skm'],
        'baa'           => $_POST['baa'],
        'bai'           => $_POST['bai'],
        'baut'          => $_POST['baut'],
        'bast'          => $_POST['bast'],
        'bard'          => $_POST['bard'],
    ];
    $exec = insert($koneksi, 'tb_kontrak', $data);
    echo $exec;
}
if ($pg == 'tambah_aja') {
    $data = [
        'no_order'      => $_POST['no_order'],
        'kb'            => $_FILES['kb']['name'],
        'ba_ren'        => $_FILES['ba_ren']['name'],
        'ba_do'         => $_FILES['ba_do']['name'],
        'baso'          => $_FILES['baso']['name'],
        'ba_pen'        => $_FILES['ba_pen']['name'],
        'po'            => $_FILES['po']['name'],
        'kl'            => $_FILES['kl']['name'],
        'sph'           => $_FILES['sph']['name'],
        'skm'           => $_FILES['skm']['name'],
        'baa'           => $_FILES['baa']['name'],
        'bai'           => $_FILES['bai']['name'],
        'baut'          => $_FILES['baut']['name'],
        'bast'          => $_FILES['bast']['name'],
        'bard'          => $_FILES['bard']['name'],
    ];

    $ekstensi_diperbolehkan    = array('pdf');
    $x        = explode('.', $nama_file);
    $ekstensi    = strtolower(end($x));
    $nama_file = $_FILES['kb']['name'];
    $ukuran_file = $_FILES['kb']['size'];
    $tipe_file = $_FILES['kb']['type'];
    $tmp_file = $_FILES['kb']['tmp_name'];

    $path = "../../assets/uploaded/files/".$nama_file;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :  
            // Proses simpan ke Database
                $exec = insert($koneksi, 'tb_kontrak', $data);
                // echo $exec;
            if($exec){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
            }else{
                // Jika Gagal, Lakukan :
            }
            }else{
            // Jika gambar gagal diupload, Lakukan :
            }
        }else{
            // Jika ukuran file lebih dari 1MB, lakukan :
        }
        }else{
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        }
    // $exec = insert($koneksi, 'tb_user', $data);
    // echo $exec;
}

if  ($pg == 'tambah_aja1'){
     $data = [
        'no_order'      => $_POST['no_order'],
        'kb'            => $_FILES['kb']['name'],
        'ba_ren'        => $_FILES['ba_ren']['name'],
        'ba_do'         => $_FILES['ba_do']['name'],
        'baso'          => $_FILES['baso']['name'],
        'ba_pen'        => $_FILES['ba_pen']['name'],
        'po'            => $_FILES['po']['name'],
        'kl'            => $_FILES['kl']['name'],
        'sph'           => $_FILES['sph']['name'],
        'skm'           => $_FILES['skm']['name'],
        'baa'           => $_FILES['baa']['name'],
        'bai'           => $_FILES['bai']['name'],
        'baut'          => $_FILES['baut']['name'],
        'bast'          => $_FILES['bast']['name'],
        'bard'          => $_FILES['bard']['name'],
    ];
    
    $ekstensi_diperbolehkan    = array('pdf');
    $nama    = $_FILES['kb']['name'];
    $x        = explode('.', $nama);
    $ekstensi    = strtolower(end($x));
    $ukuran        = $_FILES['kb']['size'];
    $file_tmp    = $_FILES['kb']['tmp_name']; 
    
    
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){ 
            move_uploaded_file($file_tmp, '../../assets/uploaded/files/'.$nama);
            $exec = insert($koneksi, 'tb_kontrak', $data);
            echo $exec;
            if($exec){
                // file berhasil di upload
            }
            else{
            // Jika gagal di Upload
            }
        }
        else{
            // Jika file terlalu besar
        }
    }
    else{
        // Ekstensi tidak di dukung
    }
}
if ($pg == 'import') {
    if (isset($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = explode('.', $file);
        $ext = end($ext);
        if ($ext <> 'xls') {
            echo "harap pilih file excel .xls";
        } else {
            $data = new Spreadsheet_Excel_Reader($temp);
            $hasildata = $data->rowcount($sheet_index = 0);
            $sukses = $gagal = 0;

            mysqli_query($koneksi, "truncate sekolah");
            for ($i = 2; $i <= $hasildata; $i++) {
                $no_daftar=$data->val($i, 2);
                $nik=addslashes($data->val($i,3));
                $nisn=addslashes($data->val($i,4));
                $nama=addslashes($data->val($i,5));
                $foto=addslashes($data->val($i,6));
                $jenkel=addslashes($data->val($i,7));
                $tempat_lahir=addslashes($data->val($i,8));
                $tgl_lahir=addslashes($data->val($i,9));
                $kelas=addslashes($data->val($i,10));
                $jurusan=addslashes($data->val($i,11));
                $jenjang=addslashes($data->val($i,12));
                $agama=addslashes($data->val($i,13));
                $alamat=addslashes($data->val($i,14));
                $rt=addslashes($data->val($i,15));
                $rw=addslashes($data->val($i,16));
                $desa=addslashes($data->val($i,17));
                $kecamatan=addslashes($data->val($i,18));
                $kode_pos=addslashes($data->val($i,19));
                $transportasi=addslashes($data->val($i,20));
                $no_hp=addslashes($data->val($i,21));
                $tinggal=addslashes($data->val($i,22));
                $nik_ayah=addslashes($data->val($i,23));
                $nama_ayah=addslashes($data->val($i,24));
                $tgl_lahir_ayah=addslashes($data->val($i,25));
                $pendidikan_ayah=addslashes($data->val($i,26));
                $pekerjaan_ayah=addslashes($data->val($i,27));
                $penghasilan_ayah=addslashes($data->val($i,28));
                $nik_ibu=addslashes($data->val($i,29));
                $nama_ibu=addslashes($data->val($i,30));
                $tgl_lahir_ibu=addslashes($data->val($i,31));
                $pendidikan_ibu=addslashes($data->val($i,32));
                $pekerjaan_ibu=addslashes($data->val($i,33));
                $penghasilan_ibu=addslashes($data->val($i,34));
                $nik_wali=addslashes($data->val($i,35));
                $nama_wali=addslashes($data->val($i,36));
                $tgl_lahir_wali=addslashes($data->val($i,37));
                $pendidikan_wali=addslashes($data->val($i,38));
                $pekerjaan_wali=addslashes($data->val($i,39));
                $penghasilan_wali=addslashes($data->val($i,40));
                $no_kip=addslashes($data->val($i,41));
                $password=addslashes($data->val($i,42));
                $aktivasi=addslashes($data->val($i,43));
                $password_cbt=addslashes($data->val($i,44));

                
                    $datax = [
                        'no_daftar'=> $no_daftar,
                        'nik'=> $nik,
                        'nisn'=> $nisn,
                        'nama'=> $nama,
                        'foto'=> $foto,
                        'jenkel'=> $jenkel,
                        'tempat_lahir'=> $tempat_lahir,
                        'tgl_lahir'=> $tgl_lahir,
                        'kelas'=> $kelas,
                        'jurusan'=> $jurusan,
                        'jenjang'=> $jenjang,
                        'agama'=> $agama,
                        'alamat'=> $alamat,
                        'rt'=> $rt,
                        'rw'=> $rw,
                        'desa'=> $desa,
                        'kecamatan'=> $kecamatan,
                        'kode_pos'=> $kode_pos,
                        'transportasi'=> $transportasi,
                        'no_hp'=> $no_hp,
                        'tinggal'=> $tinggal,
                        'nik_ayah'=> $nik_ayah,
                        'nama_ayah'=> $nama_ayah,
                        'tgl_lahir_ayah'=> $tgl_lahir_ayah,
                        'pendidikan_ayah'=> $pendidikan_ayah,
                        'pekerjaan_ayah'=> $pekerjaan_ayah,
                        'penghasilan_ayah'=> $penghasilan_ayah,
                        'nik_ibu'=> $nik_ibu,
                        'nama_ibu'=> $nama_ibu,
                        'tgl_lahir_ibu'=> $tgl_lahir_ibu,
                        'pendidikan_ibu'=> $pendidikan_ibu,
                        'pekerjaan_ibu'=> $pekerjaan_ibu,
                        'penghasilan_ibu'=> $penghasilan_ibu,
                        'nik_wali'=> $nik_wali,
                        'nama_wali'=> $nama_wali,
                        'tgl_lahir_wali'=> $tgl_lahir_wali,
                        'pendidikan_wali'=> $pendidikan_wali,
                        'pekerjaan_wali'=> $pekerjaan_wali,
                        'penghasilan_wali'=> $penghasilan_wali,
                        'no_kip'=> $no_kip,
                        'password'=> $password,
                        'aktivasi'=>$aktivasi,
                        'password_cbt'=>$password_cbt,
                        'status'=> 1
                    ];
                    $exec = insert($koneksi, 'daftar', $datax);
                    ($exec) ? $sukses++ : $gagal++;
                
            }
            $total = $hasildata - 1;
            echo "Berhasil: $sukses | Gagal: $gagal | Dari: $total";
        }
    } else {
        echo "gagal";
    }
}
if ($pg == 'hapusdaftar') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from tb_kontrak where id_kontrak in (" . $kode . ")");
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}