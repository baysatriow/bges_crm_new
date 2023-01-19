<?php
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
  
    // $query = mysqli_query($koneksi, "select * from tb_user where id_user='$id'");
    // $user = mysqli_fetch_array($query);
    // $pw_lama = $_POST['password_lama'];
    // $pw_baru = password_hash($_POST['password_baru'])
    $id = $_POST['id_user'];;
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

    // if ($exec) {
    //     if (!password_verify($pw_lama, $user['password'])){
    //         $data3 = [
    //             'password'          => password_hash($_POST['password_baru']),
    //         ];
    //         $exec = update($koneksi, 'tb_user', $data, $where);
    //     }
    
    // }
    if ($exec) {
        $ektensi = ['jpg', 'png'];
        if ($_FILES['profile']['name'] <> '') {
            $profile = $_FILES['profile']['name'];
            $temp = $_FILES['profile']['tmp_name'];
            $ukuran = $_FILES['profile']['size'];
            $ext = explode('.', $profile);
            $ext = end($ext);

            if($ukuran < 1044070) {
                if (in_array($ext, $ektensi)) {
                    $dest = 'assets/uploaded/profile/' . $profile;
                    $upload = move_uploaded_file($temp, '../../' . $dest);
                    if ($upload) {
                        $data2 = [
                            'photo' => $profile
                        ];
                        $exec = update($koneksi, 'tb_user', $data2, $where);
                        if($exec){
                            
                        }
                    } else {
                        echo "gagal";
                    }
                }
                
               
            }else{
                echo "ukuran";
            }
            
        }
    } else {
        echo "Gagal menyimpan";
    }
}