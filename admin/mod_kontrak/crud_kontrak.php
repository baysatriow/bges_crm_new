<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/function_sekolah.php");
require("../../config/functions.crud.php");
session_start();
$id = $_SESSION['id_user'];
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
    $exec = insert($koneksi, 'sekolah', $data, ['npsn' => $npsn]);
    echo $exec;
}
// SCRIPT PERCOBAAN
// if ($pg == 'tambah') {
//     $data = [
//         'no_order'      => $_POST['no_order'],
//         'kb'            => $_POST['kb'],
//         'ba_ren'        => $_POST['ba_ren'],
//         'ba_do'         => $_POST['ba_do'],
//         'baso'          => $_POST['baso'],
//         'ba_pen'        => $_POST['ba_pen'],
//         'po'            => $_POST['po'],
//         'kl'            => $_POST['kl'],
//         'sph'           => $_POST['sph'],
//         'skm'           => $_POST['skm'],
//         'baa'           => $_POST['baa'],
//         'bai'           => $_POST['bai'],
//         'baut'          => $_POST['baut'],
//         'bast'          => $_POST['bast'],
//         'bard'          => $_POST['bard'],
//     ];
//     $exec = insert($koneksi, 'tb_kontrak', $data);
//     echo $exec;
// }


// if ($pg == 'tambah_aja') {
//     $data = [
//         'no_order'      => $_POST['no_order'],
//         'kb'            => $_FILES['kb']['name'],
//         'ba_ren'        => $_FILES['ba_ren']['name'],
//         'ba_do'         => $_FILES['ba_do']['name'],
//         'baso'          => $_FILES['baso']['name'],
//         'ba_pen'        => $_FILES['ba_pen']['name'],
//         'po'            => $_FILES['po']['name'],
//         'kl'            => $_FILES['kl']['name'],
//         'sph'           => $_FILES['sph']['name'],
//         'skm'           => $_FILES['skm']['name'],
//         'baa'           => $_FILES['baa']['name'],
//         'bai'           => $_FILES['bai']['name'],
//         'baut'          => $_FILES['baut']['name'],
//         'bast'          => $_FILES['bast']['name'],
//         'bard'          => $_FILES['bard']['name'],
//     ];

//     $ekstensi_diperbolehkan    = array('pdf');
//     $x        = explode('.', $nama_file);
//     $ekstensi    = strtolower(end($x));
//     $nama_file = $_FILES['kb']['name'];
//     $ukuran_file = $_FILES['kb']['size'];
//     $tipe_file = $_FILES['kb']['type'];
//     $tmp_file = $_FILES['kb']['tmp_name'];

//     $path = "../../assets/uploaded/files/".$nama_file;

//     if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
//         // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
//         if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
//             // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
//             // Proses upload
//             if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
//             // Jika gambar berhasil diupload, Lakukan :  
//             // Proses simpan ke Database
//                 $exec = insert($koneksi, 'tb_kontrak', $data);
//                 // echo $exec;
//             if($exec){ // Cek jika proses simpan ke database sukses atau tidak
//                 // Jika Sukses, Lakukan :
//             }else{
//                 // Jika Gagal, Lakukan :
//             }
//             }else{
//             // Jika gambar gagal diupload, Lakukan :
//             }
//         }else{
//             // Jika ukuran file lebih dari 1MB, lakukan :
//         }
//         }else{
//         // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
//         }
//     // $exec = insert($koneksi, 'tb_user', $data);
//     // echo $exec;
// }

// if  ($pg == 'tambah_aja1'){
//      $data = [
//         'no_order'      => $_POST['no_order'],
//         'kb'            => $_FILES['kb']['name'],
//         'ba_ren'        => $_FILES['ba_ren']['name'],
//         'ba_do'         => $_FILES['ba_do']['name'],
//         'baso'          => $_FILES['baso']['name'],
//         'ba_pen'        => $_FILES['ba_pen']['name'],
//         'po'            => $_FILES['po']['name'],
//         'kl'            => $_FILES['kl']['name'],
//         'sph'           => $_FILES['sph']['name'],
//         'skm'           => $_FILES['skm']['name'],
//         'baa'           => $_FILES['baa']['name'],
//         'bai'           => $_FILES['bai']['name'],
//         'baut'          => $_FILES['baut']['name'],
//         'bast'          => $_FILES['bast']['name'],
//         'bard'          => $_FILES['bard']['name'],
//     ];
    
//     $ekstensi_diperbolehkan    = array('pdf');
//     $nama    = $_FILES['kb']['name'];
//     $x        = explode('.', $nama);
//     $ekstensi    = strtolower(end($x));
//     $ukuran        = $_FILES['kb']['size'];
//     $file_tmp    = $_FILES['kb']['tmp_name']; 
    
    
//     if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
//         if($ukuran < 1044070){ 
//             move_uploaded_file($file_tmp, '../../assets/uploaded/files/'.$nama);
//             $exec = insert($koneksi, 'tb_kontrak', $data);
//             echo $exec;
//             if($exec){
//                 // file berhasil di upload
//             }
//             else{
//             // Jika gagal di Upload
//             }
//         }
//         else{
//             // Jika file terlalu besar
//         }
//     }
//     else{
//         // Ekstensi tidak di dukung
//     }
// }

// if  ($pg == 'tambah_aja2'){
//     $ektensi = ['pdf'];
//     if ($_POST['no_order'] <> '') {
//         $filename = $_FILES['kb']['name'];
//         $ukuran = $_FILES['kb']['size'];
//         $temp = $_FILES['kb']['tmp_name'];
//         $ext = explode('.', $filename);
//         $ext = end($ext);
//         if ($ukuran < 1044070) {
//             if (in_array($ext, $ektensi)) {
//                 $dest = 'assets/uploaded/files/kb/' . $filename;
//                 $upload = move_uploaded_file($temp, '../../' . $dest);
//                 if ($upload) {
//                     $data2 = [
//                         'no_order'      => $_POST['no_order'],
//                         'kb' => $dest
//                     ];
//                     $exec = insert($koneksi, 'tb_kontrak', $data2);
//                 }
//                 echo "OK";
//             }
//         }else{
//             echo "Ukuran";
//         }
//     }

// }

if  ($pg == 'tambah'){

    $ektensi = ['pdf'];
    if ($_POST['no_order'] <> '') {

        // $ukuran = $_FILES['kb']['size'];

        $file1=$_FILES['kb']['name'];
        $file_tmp1=$_FILES['kb']['tmp_name'];
        $ukuran1 = $_FILES['kb']['size'];

        $file2=$_FILES['ba_ren']['name'];
        $file_tmp2=$_FILES['ba_ren']['tmp_name'];
        $ukuran2 = $_FILES['ba_ren']['size'];

        $file3=$_FILES['ba_do']['name'];
        $file_tmp3=$_FILES['ba_do']['tmp_name'];
        $ukuran3 = $_FILES['ba_do']['size'];
        
        $file4=$_FILES['baso']['name'];
        $file_tmp4=$_FILES['baso']['tmp_name'];
        $ukuran4 = $_FILES['baso']['size'];

        $file5=$_FILES['ba_pen']['name'];
        $file_tmp5=$_FILES['ba_pen']['tmp_name'];
        $ukuran5 = $_FILES['ba_pen']['size'];

        $file6=$_FILES['po']['name'];
        $file_tmp6=$_FILES['po']['tmp_name'];
        $ukuran6 = $_FILES['po']['size'];

        $file7=$_FILES['kl']['name'];
        $file_tmp7=$_FILES['kl']['tmp_name'];
        $ukuran7 = $_FILES['kl']['size'];

        $file8=$_FILES['sph']['name'];
        $file_tmp8=$_FILES['sph']['tmp_name'];
        $ukuran8 = $_FILES['sph']['size'];

        $file9=$_FILES['skm']['name'];
        $file_tmp9=$_FILES['skm']['tmp_name'];
        $ukuran9 = $_FILES['skm']['size'];

        $file10=$_FILES['baa']['name'];
        $file_tmp10=$_FILES['baa']['tmp_name'];
        $ukuran10 = $_FILES['baa']['size'];

        $file11=$_FILES['bai']['name'];
        $file_tmp11=$_FILES['bai']['tmp_name'];
        $ukuran11 = $_FILES['bai']['size'];

        $file12=$_FILES['baut']['name'];
        $file_tmp12=$_FILES['baut']['tmp_name'];
        $ukuran12 = $_FILES['baut']['size'];

        $file13=$_FILES['bast']['name'];
        $file_tmp13=$_FILES['bast']['tmp_name'];
        $ukuran13 = $_FILES['bast']['size'];

        $file14=$_FILES['bard']['name'];
        $file_tmp14=$_FILES['bard']['tmp_name'];
        $ukuran14 = $_FILES['bard']['size'];

        $allsize = [
            $ukuran1,
            $ukuran2,
            $ukuran3,
            $ukuran4,
            $ukuran5,
            $ukuran6,
            $ukuran7,
            $ukuran8,
            $ukuran9,
            $ukuran10,
            $ukuran11,
            $ukuran12,
            $ukuran13,
            $ukuran14,
        ];
        $allext = [
            $file1,
            $file2,
            $file3,
            $file4,
            $file5,
            $file6,
            $file7,
            $file8,
            $file9,
            $file10,
            $file11,
            $file12,
            $file13,
            $file14,
        ];
        $ext = explode('.', $file1);
        $ext = end($ext);

        if ($ukuran1 < 1044070) {
            if (in_array($ext, $ektensi)) {

                $location1='assets/uploaded/files/kb/' . $file1;
                $location2='assets/uploaded/files/ba_ren/' . $file2;
                $location3='assets/uploaded/files/ba_do/' . $file3;
                $location4='assets/uploaded/files/baso/' . $file4;
                $location5='assets/uploaded/files/ba_pen/' . $file5;
                $location6='assets/uploaded/files/po/' . $file6;
                $location7='assets/uploaded/files/kl/' . $file7;
                $location8='assets/uploaded/files/sph/' . $file8;
                $location9='assets/uploaded/files/skm/' . $file9;
                $location10='assets/uploaded/files/baa/' . $file10;
                $location11='assets/uploaded/files/bai/' . $file11;
                $location12='assets/uploaded/files/baut/' . $file12;
                $location13='assets/uploaded/files/bast/' . $file13;
                $location14='assets/uploaded/files/bard/' . $file14;

                $dest = 'assets/uploaded/files/' . $file1;
                $data2 = [
                    'no_order'      => $_POST['no_order'],
                    'kb'            => $file1,
                    'ba_ren'        => $file2,
                    'ba_do'         => $file3,
                    'baso'          => $file4,
                    'ba_pen'        => $file5,
                    'po'            => $file6,
                    'kl'            => $file7,
                    'sph'           => $file8,
                    'skm'           => $file9,
                    'baa'           => $file10,
                    'bai'           => $file11,
                    'baut'          => $file12,
                    'bast'          => $file13,
                    'bard'          => $file14,
                ];
                $exec = insert($koneksi, 'tb_kontrak', $data2);

                
                // $upload = move_uploaded_file($temp, '../../' . $dest);
                // if ($upload) {
                //     // $data2 = [
                //     //     'no_order'      => $_POST['no_order'],
                //     //     'kb' => $dest
                //     // ];
                //     // $exec = insert($koneksi, 'tb_kontrak', $data2);
                // }

                if ($exec){
                    move_uploaded_file($file_tmp1, '../../' . $location1);
                    move_uploaded_file($file_tmp2, '../../' . $location2);
                    move_uploaded_file($file_tmp3, '../../' . $location3);
                    move_uploaded_file($file_tmp4, '../../' . $location4);
                    move_uploaded_file($file_tmp5, '../../' . $location5);
                    move_uploaded_file($file_tmp6, '../../' . $location6);
                    move_uploaded_file($file_tmp7, '../../' . $location7);
                    move_uploaded_file($file_tmp8, '../../' . $location8);
                    move_uploaded_file($file_tmp9, '../../' . $location9);
                    move_uploaded_file($file_tmp10, '../../' . $location10);
                    move_uploaded_file($file_tmp11, '../../' . $location11);
                    move_uploaded_file($file_tmp12, '../../' . $location12);
                    move_uploaded_file($file_tmp13, '../../' . $location13);
                    move_uploaded_file($file_tmp14, '../../' . $location14);
                    
                    echo "OK";
                }
            }
        }else{
            echo "Ukuran";
        }
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
// BLM JADI
if ($pg == 'hapus') {
    $id=$_POST['id'];
    $id = mysql_escape_string($id);

    $query = mysqli_query($koneksi, "DELETE from tb_kontrak where id_kontrak in = ".$id."");
    
    // $result = mysql_query($del);
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