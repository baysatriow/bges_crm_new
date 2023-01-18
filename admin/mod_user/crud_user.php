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
// Edit Data
if ($pg == 'ubah') {
    $data = [
        'nama'          => $_POST['nama'],
        'email'         => $_POST['email'],
        'username'      => $_POST['username'],
        'phone'         => $_POST['phone'],
        'level'         => $_POST['Roles'],
        'Roles'         => $_POST['Roles'],
    ];
    $where = [
        'username' => $_POST['username'],
    ];
    $exec = update($koneksi, 'tb_user', $data, $where);
    echo mysqli_error($koneksi);
    if ($exec) {
        $ektensi = ['jpg', 'png'];
        if ($_FILES['profile']['name'] <> '') {
            $profile = $_FILES['profile']['name'];
            $temp = $_FILES['profile']['tmp_name'];
            $ext = explode('.', $profile);
            $ext = end($ext);
            if (in_array($ext, $ektensi)) {
                $dest = "assets/uploaded/profile/".$profile;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data2 = [
                        'profile' => $dest
                    ];
                    $exec = update($koneksi, 'tb_user', $data2, $where);
                } else {
                    echo "gagal";
                }
            }
        }
        // if ($_FILES['ttd']['name'] <> '') {
        //     $logo = $_FILES['ttd']['name'];
        //     $temp = $_FILES['ttd']['tmp_name'];
        //     $ext = explode('.', $logo);
        //     $ext = end($ext);
        //     if (in_array($ext, $ektensi)) {
        //         $dest = 'dist/img/ttd' . '.' . $ext;
        //         $upload = move_uploaded_file($temp, '../' . $dest);
        //     }
        // }
    } else {
        echo "Gagal menyimpan";
    }
}

// Add Data User
if ($pg == 'tambah_aja') {

    $data = [
        'nama'          => $_POST['nama'],
        'email'         => $_POST['email'],
        'username'      => $_POST['username'],
        'password'      => password_hash($_POST['password'],PASSWORD_DEFAULT),
        'phone'         => $_POST['phone'],
        'level'         => $_POST['Roles'],
        'Roles'         => $_POST['Roles'],
        'photo'         => $_FILES['profile']['name'],
    ];

    $nama_file = $_FILES['profile']['name'];
    $ukuran_file = $_FILES['profile']['size'];
    $tipe_file = $_FILES['profile']['type'];
    $tmp_file = $_FILES['profile']['tmp_name'];

    $path = "../../assets/uploaded/profile/".$nama_file;

    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 2097152){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :  
            // Proses simpan ke Database
                $exec = insert($koneksi, 'tb_user', $data);
                echo $exec;
            if($exec){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
            }else{
                // Jika Gagal, Lakukan :
            }
            }else{
            // Jika gambar gagal diupload, Lakukan :
            }
        }else{
            // Ukuran Gambar Terlalu Besar
            echo "ukuran";
        }
        }else{
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        }
    // $exec = insert($koneksi, 'tb_user', $data);
    // echo $exec;
}
if ($pg == 'hapus') {
    $npsn = $_POST['npsn'];
    delete($koneksi, 'sekolah', ['npsn' => $npsn]);
}

if ($pg == 'hapusdaftar') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from tb_user where id_user in (" . $kode . ")");
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}