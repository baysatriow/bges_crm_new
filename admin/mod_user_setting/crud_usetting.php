<?php
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $id = $_POST['id_user'];
    $data = [
        'nama'          => $_POST['nama'],
        'username'      => $_POST['username'],
        'email'         => $_POST['email'],
        'phone'         => $_POST['phone'],
    ];
    $where = [
        'id_user' => $id,
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
                $dest = 'assets/uploaded/profile/' . $profile;
                $upload = move_uploaded_file($temp, '../../' . $dest);
                if ($upload) {
                    $data2 = [
                        'photo' => $profile
                    ];
                    $exec = update($koneksi, 'tb_user', $data2, $where);
                } else {
                    echo "gagal";
                }
            }
        }
        // if ($_FILES['ttd']['name'] <> '') {
        //     $profile = $_FILES['ttd']['name'];
        //     $temp = $_FILES['ttd']['tmp_name'];
        //     $ext = explode('.', $profile);
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
if ($pg == 'infobayar') {
    $data = [
        'infobayar' => $_POST['info']
    ];
    $where = [
        'id_setting' => 1
    ];
    $exec = update($koneksi, 'tb_setting', $data, $where);

    if ($exec) {
        echo "ok";
    } else {
        echo "Gagal menyimpan";
    }
}
if ($pg == 'syarat') {
    $data = [
        'syarat' => $_POST['syarat']
    ];
    $where = [
        'id_setting' => 1
    ];
    $exec = update($koneksi, 'tb_setting', $data, $where);

    if ($exec) {
        echo "ok";
    } else {
        echo "Gagal menyimpan";
    }
}
